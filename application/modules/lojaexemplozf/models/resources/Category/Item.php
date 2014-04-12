<?php
class LOJAEXEMPLOZF_Resource_Category_Item extends LOJAEXEMPLOZF_Model_Resource_Db_Table_Row_Abstract implements LOJAEXEMPLOZF_Resource_Category_Item_Interface
{
    public function getParentCategory()
    {
        return $this->findParentRow('LOJAEXEMPLOZF_Resource_Category', 'SubCategory');
    }
}