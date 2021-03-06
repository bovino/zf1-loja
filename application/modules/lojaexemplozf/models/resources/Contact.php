<?php
/**
 * LOJAEXEMPLOZF_Resource_User
 * 
 * @category   Storefront
 * @package    LOJAEXEMPLOZF_Model_Resource
 * @copyright  Copyright (c) 2008 Keith Pope (http://www.thepopeisdead.com)
 * @license    http://www.thepopeisdead.com/license.txt     New BSD License
 */
class LOJAEXEMPLOZF_Resource_Contact extends LOJAEXEMPLOZF_Model_Resource_Db_Table_Abstract implements LOJAEXEMPLOZF_Resource_Contact_Interface 
{
    protected $_name = 'contact';
    protected $_primary = 'contactId';
    protected $_rowClass = 'LOJAEXEMPLOZF_Resource_Contact_Item';

    public function getContactById($id)
    {
        return $this->find($id)->current();
    }
    
    
    public function getContacts($paged=null, $order=null)
    {
        $select = $this->select();
        
        if (true === is_array($order)) {
            $select->order($order);
        }
        
        if (null !== $paged) {
			$adapter = new Zend_Paginator_Adapter_DbTableSelect($select);
			$count = clone $select;
			$count->reset(Zend_Db_Select::COLUMNS);
			$count->reset(Zend_Db_Select::FROM);
			$count->from('user', new Zend_Db_Expr('COUNT(*) AS `zend_paginator_row_count`'));
			$adapter->setRowCount($count);

			$paginator = new Zend_Paginator($adapter);
			$paginator->setItemCountPerPage(5)
		          	  ->setCurrentPageNumber((int) $paged);
			return $paginator;
		}
        return $this->fetchAll($select);
    }
}