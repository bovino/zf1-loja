<?php
/**
 * LOJAEXEMPLOZF_Model_Acl_Role_Guest
 *
 * @category   Storefront
 * @package    LOJAEXEMPLOZF_Model_Acl
 * @copyright  Copyright (c) 2008 Keith Pope (http://www.thepopeisdead.com)
 * @license    http://www.thepopeisdead.com/license.txt     New BSD License
 */
class LOJAEXEMPLOZF_Model_Acl_Role_Guest implements Zend_Acl_Role_Interface
{
    public function getRoleId()
    {
        return 'Guest';
    }
}