<?php
/**
 * LOJAMOBLY_Resource_User_Interface
 * 
 * @category   Storefront
 * @package    LOJAMOBLY_Model_Resource
 * @copyright  Copyright (c) 2008 Keith Pope (http://www.thepopeisdead.com)
 * @license    http://www.thepopeisdead.com/license.txt     New BSD License
 */
interface LOJAMOBLY_Resource_User_Interface extends LOJAMOBLY_Model_Resource_Db_Interface 
{
    public function getUserById($id);
    public function getUserByEmail($email, $ignoreUser=null);
    public function getUsers($paged=false, $order=null);
}
