<?php
class Cms_Model_Page extends LOJAEXEMPLOZF_Model_Abstract
{
    public function getPageById($id)
    {
        $id = (int) $id;
        return $this->getResource('page')->getPageById($id);
    }
}
