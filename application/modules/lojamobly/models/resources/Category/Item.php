<?php
class LOJAMOBLY_Resource_Category_Item extends LOJAMOBLY_Model_Resource_Db_Table_Row_Abstract implements LOJAMOBLY_Resource_Category_Item_Interface
{
    public function getParentCategory()
    {
        return $this->findParentRow('LOJAMOBLY_Resource_Category', 'SubCategory');
    }
}