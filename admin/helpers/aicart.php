<?php
/**
 * @copyright Copyright &copy; 2014
 * @license http://gnu.org/licenses/gpl-2.0.html GNU/GPL Version 2
 * @author bsdnemo
 * @link maihuayi.com
 */

defined('_JEXEC') or die;

class AiCartHelper
{
	public static function addSubmenu($name = 'cpanel')
	{
		JHtmlSidebar::addEntry(
			JText::_('COM_AICART_SUBMENU_LOGS'),
			'index.php?option=com_aicart&view=cpanel',
			$name == 'logs'
		);
	}
	
	public static function getActions($categoryId = 0)
	{
		$user = JFactory::getUser();
		$result = new JObject();
		
		//$assetName = 'com_joomchinese_server';
		//$level = 'component';
		if (empty($categoryId))
		{
			$assetName = 'com_aicart';
			$level = 'component';
		}
		else
		{
			$assetName = 'com_aicart.category.'.(int) $categoryId;
			$level = 'category';
		}
		
		$actions = JAccess::getActions('com_aicart', $level);
		
		foreach($actions as $action)
		{
			$result->set($action->name, $user->authorise($action->name, $assetName));
		}
		
		return $result;
	}
}
