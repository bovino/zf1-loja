<?php
/**
 * LOJAEXEMPLOZF_Resource_Category_Interface
 * 
 * @category   Storefront
 * @package    LOJAEXEMPLOZF_Model_Resource
 * @copyright  Copyright (c) 2008 Keith Pope (http://www.thepopeisdead.com)
 * @license    http://www.thepopeisdead.com/license.txt     New BSD License
 */
interface LOJAEXEMPLOZF_Resource_Category_Interface 
{
    public function getCategoriesByParentId($parentId);
    public function getCategoryByIdent($ident);
    public function getCategoryById($id);
    public function getCategories();
}