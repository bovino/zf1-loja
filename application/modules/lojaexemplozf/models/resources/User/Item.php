<?php
class LOJAEXEMPLOZF_Resource_User_Item extends LOJAEXEMPLOZF_Model_Resource_Db_Table_Row_Abstract implements LOJAEXEMPLOZF_Resource_User_Item_Interface, Zend_Acl_Role_Interface
{
    public function getFullname()
    {
        return $this->getRow()->title . ' ' . $this->getRow()->firstname . ' ' . $this->getRow()->lastname;
    }

    public function getRoleId()
    {
        if (null === $this->getRow()->role) {
            return 'Guest';
        }
        return $this->getRow()->role;
    }
}