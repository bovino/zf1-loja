<?php
/**
 * LOJAEXEMPLOZF_Resource_Category
 * 
 * @category   Storefront
 * @package    LOJAEXEMPLOZF_Model_Resource
 * @copyright  Copyright (c) 2008 Keith Pope (http://www.thepopeisdead.com)
 * @license    http://www.thepopeisdead.com/license.txt     New BSD License
 */
class LOJAEXEMPLOZF_Resource_Category extends LOJAEXEMPLOZF_Model_Resource_Db_Table_Abstract implements LOJAEXEMPLOZF_Resource_Category_Interface 
{
    protected $_name = 'category';
    protected $_primary = 'categoryId';
    protected $_rowClass = 'LOJAEXEMPLOZF_Resource_Category_Item';
    
    protected $_referenceMap = array(
        'SubCategory' => array(
            'columns' => 'parentId',
            'refTableClass' => 'LOJAEXEMPLOZF_Resource_Category',
            'refColumns' => 'categoryId',
        )
    );
    
    public function getCategoriesByParentId($parentId)
    {
        $select = $this->select()
                        ->where('parentId = ?', $parentId)
                        ->order('name');
                        
        return $this->fetchAll($select);
    }
    
    public function getCategoryByIdent($ident)
    {
        $select = $this->select()
                       ->where('ident = ?', $ident);
                       
        return $this->fetchRow($select);
    }
    
    public function getCategoryById($id)
    {
        $select = $this->select()
                       ->where('categoryId = ?', $id);
                       
        return $this->fetchRow($select);
    }

    public function getCategories()
    {
        $select = $this->select()
                       ->order('name');

        return $this->fetchAll($select);
    }
}
