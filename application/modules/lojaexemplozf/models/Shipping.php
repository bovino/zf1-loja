<?php
/**
 * LOJAEXEMPLOZF_Model_Shipping
 *
 * @category   Storefront
 * @package    LOJAEXEMPLOZF_Model
 * @copyright  Copyright (c) 2008 Keith Pope (http://www.thepopeisdead.com)
 * @license    http://www.thepopeisdead.com/license.txt     New BSD License
 */
class LOJAEXEMPLOZF_Model_Shipping extends LOJAEXEMPLOZF_Model_Abstract
{
    /**
     * @var array
     */
    protected $_shippingData = array(
        ' Entrega padrão ' => 1.99,
        ' Entrega especial do CorreioMAX '  => 5.99,
        ' SEDEX 10 '  => 10.99,
    );

    /**
     * Get the shipping options
     * 
     * @return array
     */
    public function getShippingOptions()
    {
        return $this->_shippingData;
    }
}