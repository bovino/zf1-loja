<?php
/**
 * LOJAEXEMPLOZF_Resource_User_Interface
 * 
 * @category   Storefront
 * @package    LOJAEXEMPLOZF_Model_Resource
 * @copyright  Copyright (c) 2008 Keith Pope (http://www.thepopeisdead.com)
 * @license    http://www.thepopeisdead.com/license.txt     New BSD License
 */
interface LOJAEXEMPLOZF_Resource_Contact_Interface extends LOJAEXEMPLOZF_Model_Resource_Db_Interface 
{
    public function getContactById($id);
    public function getContacts($paged=false, $order=null);
}
