<?php
/**
 * @copyright Copyright &copy; 2014
 * @license http://gnu.org/licenses/gpl-2.0.html GNU/GPL Version 2
 * @author bsdnemo
 * @link maihuayi.com
 */

defined('_JEXEC') or die;

class AiCartViewLogs extends JViewLegacy
{
	protected $items;
	protected $pagination;
	protected $state;
	
	public function display($tpl = null)
	{
		$this->state = $this->get('State');
		$this->items = $this->get('Items');
		$this->pagination = $this->get('Pagination');
		
		SeeCouponHelper::addSubmenu('logs');
		
		if(count($errors = $this->get('Errors')))
		{
			JError::raiseError(500, implode('\n', $errors));
			return false;
		}
		
		$this->addToolbar();
		$this->sidebar = JHtmlSidebar::render();
		parent::display($tpl);
	}
	
	protected function addToolbar()
	{
		require_once JPATH_COMPONENT . '/helpers/aicart.php';
		
		$state = $this->get('State');
		$canDo = SeeCouponHelper::getActions();
		$user  = JFactory::getUser();
		$bar = JToolBar::getInstance('toolbar');
		
		JToolbarHelper::title(JText::_('COM_AICART_MANAGER_LOGS'));
		
		



		if($canDo->get('core.admin'))
		{
			JToolbarHelper::preferences('com_aicart');
		}

		JHtmlSidebar::setAction('index.php?option=com_aicart&view=logs');

		JHtmlSidebar::addFilter(
			JText::_('COM_AICART_SELECT_USER'),
			'filter_user_id',
			JHtml::_('select.options', JHTML::_('user.userlist'), 'value', 'text', $this->state->get('filter.user_id'), true)
		);
        /*
		JHtmlSidebar::addFilter(
			JText::_('JOPTION_SELECT_CATEGORY'),
			'filter_category_id',
			JHtml::_('select.options', JHtml::_('category.options', 'com_joomchinese_server'), 'value', 'text', $this->state->get('filter.category_id'))
		);
         * 
         */
	}
	
	protected function getSortFields()
	{
		return array(
			'username' => JText::_('COM_AICART_HEADING_USERNAME'),
			'coupon_name' => JText::_('COM_AICART_HEADING_COUPON_NAME'),
			'logs.coupon_code' => JText::_('COM_AICART_HEADING_COUPON_CODE'),
			'logs.created' => JText::_('COM_AICART_HEADING_CREATED'),
			'logs.id' => JText::_('JGRID_HEADING_ID')
		);
	}
}