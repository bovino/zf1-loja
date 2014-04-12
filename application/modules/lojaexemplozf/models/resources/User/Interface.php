<?php
/**
 * LOJAEXEMPLOZF_Resource_User_Interface
 * 
 * @category   Storefront
 * @package    LOJAEXEMPLOZF_Model_Resource
 * @copyright  Copyright (c) 2008 Keith Pope (http://www.thepopeisdead.com)
 * @license    http://www.thepopeisdead.com/license.txt     New BSD License
 */
interface LOJAEXEMPLOZF_Resource_User_Interface extends LOJAEXEMPLOZF_Model_Resource_Db_Interface 
{
    public function getUserById($id);
    public function getUserByEmail($email, $ignoreUser=null);
    public function getUsers($paged=false, $order=null);
}
