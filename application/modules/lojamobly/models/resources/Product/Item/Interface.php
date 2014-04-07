<?php
/**
 * LOJAMOBLY_Resource_Product_Item_Interface
 * 
 * @category   Storefront
 * @package    LOJAMOBLY_Model_Resource
 * @copyright  Copyright (c) 2008 Keith Pope (http://www.thepopeisdead.com)
 * @license    http://www.thepopeisdead.com/license.txt     New BSD License
 */
interface LOJAMOBLY_Resource_Product_Item_Interface
{
    public function getImages($includeDefault=false);
    public function getDefaultImage();
    public function getPrice($withDiscount=true,$withTax=true);
    public function isDiscounted();
    public function isTaxable();
}