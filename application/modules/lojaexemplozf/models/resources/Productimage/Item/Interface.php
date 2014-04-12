<?php
/**
 * LOJAEXEMPLOZF_Resource_ProductImage_Item_Interface
 * 
 * @category   Storefront
 * @package    LOJAEXEMPLOZF_Model_Resource
 * @copyright  Copyright (c) 2008 Keith Pope (http://www.thepopeisdead.com)
 * @license    http://www.thepopeisdead.com/license.txt     New BSD License
 */
interface LOJAEXEMPLOZF_Resource_Productimage_Item_Interface
{
    public function getThumbnail();
    public function getFull();
    public function isDefault();
}