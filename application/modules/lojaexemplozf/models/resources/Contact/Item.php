<?php
class LOJAEXEMPLOZF_Resource_Contact_Item extends LOJAEXEMPLOZF_Model_Resource_Db_Table_Row_Abstract 
                                          implements LOJAEXEMPLOZF_Resource_Contact_Item_Interface, Zend_Acl_Role_Interface
{

    public function getRoleId()
    {
        if (null === $this->getRow()->role) {
            return 'Guest';
        }
        return $this->getRow()->role;
    }
}