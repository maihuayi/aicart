<?php
/**
 * @copyright Copyright &copy; 2014
 * @license http://gnu.org/licenses/gpl-2.0.html GNU/GPL Version 2
 * @author bsdnemo
 * @link maihuayi.com
 */

defined('_JEXEC') or die;

class AiCartController extends JControllerLegacy
{
	public function display($cacheable = false, $urlparams = false)
	{
		require_once JPATH_COMPONENT . '/helpers/aicart.php';
		
		$view = $this->input->get('view', 'logs');
		$layout = $this->input->get('layout', 'default');
		
		parent::display();
		return $this;
	}
}