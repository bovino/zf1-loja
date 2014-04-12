<?php
/**
 * Simple base form class to provide model injection
 *
 * @category   Storefront
 * @package    LOJAEXEMPLOZF_Form
 * @copyright  Copyright (c) 2008 Keith Pope (http://www.thepopeisdead.com)
 * @license    http://www.thepopeisdead.com/license.txt     New BSD License
 */
class LOJAEXEMPLOZF_Form_Abstract extends Zend_Form
{
    /**
     * @var LOJAEXEMPLOZF_Model_Interface
     */
    protected $_model;

    /**
     * Model setter
     * 
     * @param LOJAEXEMPLOZF_Model_Interface $model 
     */
    public function setModel(LOJAEXEMPLOZF_Model_Interface $model)
    {
        $this->_model = $model;
    }

    /**
     * Model Getter
     * 
     * @return LOJAEXEMPLOZF_Model_Interface 
     */
    public function getModel()
    {
        return $this->_model;
    }
}