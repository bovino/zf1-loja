<?php
/**
 * Simple base form class to provide model injection
 *
 * @category   Storefront
 * @package    LOJAMOBLY_Form
 * @copyright  Copyright (c) 2008 Keith Pope (http://www.thepopeisdead.com)
 * @license    http://www.thepopeisdead.com/license.txt     New BSD License
 */
class LOJAMOBLY_Form_Abstract extends Zend_Form
{
    /**
     * @var LOJAMOBLY_Model_Interface
     */
    protected $_model;

    /**
     * Model setter
     * 
     * @param LOJAMOBLY_Model_Interface $model 
     */
    public function setModel(LOJAMOBLY_Model_Interface $model)
    {
        $this->_model = $model;
    }

    /**
     * Model Getter
     * 
     * @return LOJAMOBLY_Model_Interface 
     */
    public function getModel()
    {
        return $this->_model;
    }
}