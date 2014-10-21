<?php
/**
 * @copyright Copyright &copy; 2014
 * @license http://gnu.org/licenses/gpl-2.0.html GNU/GPL Version 2
 * @author bsdnemo
 * @link maihuayi.com
 */

defined('_JEXEC') or die;

class com_AiCartInstallerScript
{
	public function install()
	{
		echo '<p>' . JText::_('COM_AICART_INSTALL_PROMPT') . '</p>';
	}
	
	public function update()
	{
		echo '<p>' . JText::_('COM_AICART_UPDATE_PROMPT') . '</p>';
	}
	
	public function uninstall()
	{
		echo '<p>' . JText::_('COM_AICART_UNINSTALL_PROMPT') . '</p>';
	}
}
