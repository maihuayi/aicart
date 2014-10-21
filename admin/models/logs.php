<?php
/**
 * @copyright Copyright &copy; 2014
 * @license http://gnu.org/licenses/gpl-2.0.html GNU/GPL Version 2
 * @author bsdnemo
 * @link maihuayi.com
 */

defined('_JEXEC') or die;

class AiCartModelLogs extends JModelList
{
	public function __construct($config = array())
	{
		$config['filter_fields'] = array(
			'id', 'logs.id',
			'username', 'username',
			'name', 'name',
			'coupon_name', 'coupon_name',
			'coupon_code', 'logs.coupon_code',
			'created', 'logs.created',
		);
		parent::__construct($config);
	}
	
	protected function populateState($ordering = null, $direction = null)
	{
		$search = $this->getUserStateFromRequest($this->context . '.filter.search', 'filter_search');
		$this->setState('filter.search', $search);

        $user_id = $this->getUserStateFromRequest($this->context . '.filter.user_id', 'filter_user_id');
        $this->setState('filter.user_id', $published);
		
		$params = JComponentHelper::getParams('com_aicart');
		$this->setState('params', $params);
		
		parent::populateState('logs.id', 'DESC');
	}
	
	protected function getStoreId($id = '')
	{
		$id .= ':' . $this->getState('filter.search');
		
		return parent::getStoreId($id);
	}
	
	protected function getListQuery()
	{
		$db = $this->getDbo();
		$query = $db->getQuery(true);
		$user = JFactory::getUser();
		
		$query->select(
			$this->getState(
				'list.select',
				'logs.id, logs.user_id, logs.coupon_id, logs.coupon_code, logs.created, users.name AS name, users.username AS username, coupons.name AS coupon_name, coupons.alias AS coupons_alias'
			)
		);
		$query->from($db->quoteName('#__seecoupon_logs') . ' AS logs');
		$query->join('INNER', $db->quoteName('#__users'). ' AS users ON logs.user_id = users.id');
        $query->join('INNER', $db->quoteName('#__cmgroupbuying_free_coupons') . ' AS coupons ON logs.coupon_id = coupons.id');
		
		$search = $this->getState('filter.search');
		if (!empty($search))
		{
			$search = $db->quote('%' . $db->escape($search, true) . '%');
			$query->where('(users.username LIKE ' . $search . ' OR users.name LIKE ' . $search . ' OR coupons.name LIKE ' . $search . ')');
		}
        
        $user_id = $this->getState('filter.user_id');
        if (!empty($user_id))
        {
            $query->where('users.id = ' . (int)$user_id);
        }
		
		$orderCol = $this->state->get('list.ordering');
		$orderDirn = $this->state->get('list.direction');
		$query->order($db->escape($orderCol . ' ' . $orderDirn));
		//echo nl2br($query);
		return $query;
	}
}