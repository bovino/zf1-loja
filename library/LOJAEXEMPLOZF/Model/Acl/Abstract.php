<?php
/**
 * LOJAEXEMPLOZF_Model_Acl_Abstract
 *
 * Base model class for models that have acl support
 *
 * @category   Storefront
 * @package    LOJAEXEMPLOZF_Model
 * @copyright  Copyright (c) 2008 Keith Pope (http://www.thepopeisdead.com)
 * @license    http://www.thepopeisdead.com/license.txt     New BSD License
 */
abstract class LOJAEXEMPLOZF_Model_Acl_Abstract extends LOJAEXEMPLOZF_Model_Abstract implements LOJAEXEMPLOZF_Model_Acl_Interface, Zend_Acl_Resource_Interface
{
    /**
     * @var Zend_Acl
     */
    protected $_acl;

    /**
     * @var string
     */
    protected $_identity;

    /**
     * Set the identity of the current request
     *
     * @param array|string|null|Zend_Acl_Role_Interface $identity
     * @return LOJAEXEMPLOZF_Model_Abstract
     */
    public function setIdentity($identity)
    {
        if (is_array($identity)) {
            if (!isset($identity['role'])) {
                $identity['role'] = 'Guest';
            }
            $identity = new Zend_Acl_Role($identity['role']);
        } elseif (is_scalar($identity) && !is_bool($identity)) {
            $identity = new Zend_Acl_Role($identity);
        } elseif (null === $identity) {
            $identity = new Zend_Acl_Role('Guest');
        } elseif (!$identity instanceof Zend_Acl_Role_Interface) {
            throw new LOJAEXEMPLOZF_Model_Exception('Invalid identity provided');
        }
        $this->_identity = $identity;
        return $this;
    }

    /**
     * Get the identity, if no ident use guest
     *
     * @return string
     */
    public function getIdentity()
    {
        if (null === $this->_identity) {
            $auth = Zend_Auth::getInstance();
            if (!$auth->hasIdentity()) {
                return 'Guest';
            }
            $this->setIdentity($auth->getIdentity());
        }
        return $this->_identity;
    }

    /**
     * Check the acl
     *
     * @param string $action
     * @return boolean
     */
    public function checkAcl($action)
    {
        return $this->getAcl()->isAllowed(
            $this->getIdentity(),
            $this,
            $action
        );
    }
}