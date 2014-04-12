<?php
/**
 * LOJAEXEMPLOZF_Model_Interface
 * 
 * All models use this interface
 * 
 * @category   Storefront
 * @package    LOJAEXEMPLOZF_Model
 * @copyright  Copyright (c) 2008 Keith Pope (http://www.thepopeisdead.com)
 * @license    http://www.thepopeisdead.com/license.txt     New BSD License
 */
interface LOJAEXEMPLOZF_Model_Interface
{
    public function __construct($options = null);
    public function getResource($name);
    public function getForm($name);
    public function init();
}
