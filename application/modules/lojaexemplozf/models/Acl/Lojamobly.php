<?php
/**
 * LOJAEXEMPLOZF_Model_Acl_Storefront
 *
 * @category   Storefront
 * @package    LOJAEXEMPLOZF_Model_Acl
 * @copyright  Copyright (c) 2008 Keith Pope (http://www.thepopeisdead.com)
 * @license    http://www.thepopeisdead.com/license.txt     New BSD License
 */
//class LOJAEXEMPLOZF_Model_Acl_Storefront extends Zend_Acl implements LOJAEXEMPLOZF_Acl_Interface
 class LOJAEXEMPLOZF_Model_Acl_Lojaexemplozf extends Zend_Acl implements LOJAEXEMPLOZF_Acl_Interface
{
    /**
     * Add the roles to the acl and deny all by default
     */
    public function __construct()
    {
        // Define roles:
        $this->addRole(new LOJAEXEMPLOZF_Model_Acl_Role_Guest)
             ->addRole(new LOJAEXEMPLOZF_Model_Acl_Role_Customer, 'Guest')
             ->addRole(new LOJAEXEMPLOZF_Model_Acl_Role_Admin, 'Customer');
		
		// Deny privileges by default; i.e., create a whitelist
        $this->deny();

        // Add permission for non Model access restrictions
        $this->add(new LOJAEXEMPLOZF_Model_Acl_Resource_Admin)
             ->allow('Admin');
    }
}