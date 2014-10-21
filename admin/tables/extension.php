<?php
/**
 * @copyright Copyright &copy; 2014
 * @license http://gnu.org/licenses/gpl-2.0.html GNU/GPL Version 2
 * @author bsdnemo
 * @link maihuayi.com
 */

defined('_JEXEC') or die;

Class AiCartTableLogs extends JTable
{
	public function __construct(&$db)
	{
		parent::__construct('#__aicart_logs', 'id', $db);
	}
	
}
