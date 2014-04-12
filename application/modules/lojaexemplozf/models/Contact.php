<?php
/**
 * LOJAEXEMPLOZF_Model_User
 *
 * @category   Storefront
 * @package    LOJAEXEMPLOZF_Model_Resource
 * @copyright  Copyright (c) 2008 Keith Pope (http://www.thepopeisdead.com)
 * @license    http://www.thepopeisdead.com/license.txt     New BSD License
 */
class LOJAEXEMPLOZF_Model_Contact extends LOJAEXEMPLOZF_Model_Acl_Abstract
{    

    /**
     * Save the data to db
     *
     * @param  Zend_Form $form The Validator
     * @param  array     $info The data
     * @param  array     $defaults Default values
     * @return false|int 
     */
    public function save($form, $info, $defaults=array())
    {       
        if (!$form->isValid($info)) {
            return false;
        }

        // get filtered values
        $data = $form->getValues();

        // apply any defaults
        foreach ($defaults as $col => $value) {
            $data[$col] = $value;
        }

        $contact = null;
        return $this->getResource('Contact')->saveRow($data, $contact);
    }


    /**
     * Implement the Zend_Acl_Resource_Interface, make this model
     * an acl resource
     * 
     * @return string The resource id 
     */
    public function getResourceId()
    {
        return 'Contact';
    }

    /**
     * Injector for the acl, the acl can be injected either directly
     * via this method or by passing the 'acl' option to the models
     * construct.
     *
     * We add all the access rule for this resource here, so we
     * add $this as the resource, plus its rules.
     * 
     * @param LOJAEXEMPLOZF_Acl_Interface $acl
     * @return LOJAEXEMPLOZF_Model_Abstract
     */
    public function setAcl(LOJAEXEMPLOZF_Acl_Interface $acl)
    {
        if (!$acl->has($this->getResourceId())) {
            $acl->add($this)
                ->allow('Guest', $this, array('send','index'))
                ->allow('Admin', $this);
        }
        $this->_acl = $acl;
        return $this;
    }

    /**
     * Get the acl and automatically instantiate the default acl if one
     * has not been injected.
     * 
     * @return Zend_Acl
     */
    public function getAcl()
    {
        if (null === $this->_acl) {
            $this->setAcl(new LOJAEXEMPLOZF_Model_Acl_Lojaexemplozf());
        }
        return $this->_acl;
    }
    
}