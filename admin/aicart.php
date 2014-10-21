<?php
/**
 * @copyright Copyright &copy; 2014
 * @license http://gnu.org/licenses/gpl-2.0.html GNU/GPL Version 2
 * @author bsdnemo
 * @link maihuayi.com
 */

defined('_JEXEC') or die;

if (!JFactory::getUser()->authorise('core.manage', 'com_aicart'))
{
	return JError::raiseWarning(404, JText::_('JERROR_ALERTNOAUTHOR'));
}

$controller = JControllerLegacy::getInstance('AiCart', array('default_view'=> 'cpanel'));
$controller->execute(JFactory::getApplication()->input->get('task'));
$controller->redirect();
