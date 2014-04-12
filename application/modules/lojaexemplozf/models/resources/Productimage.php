<?php
/**
 * LOJAEXEMPLOZF_Resource_ProductImage
 * 
 * @category   Storefront
 * @package    LOJAEXEMPLOZF_Model_Resource
 * @copyright  Copyright (c) 2008 Keith Pope (http://www.thepopeisdead.com)
 * @license    http://www.thepopeisdead.com/license.txt     New BSD License
 */
class LOJAEXEMPLOZF_Resource_Productimage extends LOJAEXEMPLOZF_Model_Resource_Db_Table_Abstract implements LOJAEXEMPLOZF_Resource_Productimage_Interface
{
    protected $_name = 'productImage';
    protected $_primary = 'imageId';
    protected $_rowClass = 'LOJAEXEMPLOZF_Resource_Productimage_Item';

    protected $_referenceMap = array(
        'Image' => array(
            'columns' => 'productId',
            'refTableClass' => 'LOJAEXEMPLOZF_Resource_Product',
            'refColumns' => 'productId',
        )
    );

    public function setDefault($image, $product)
    {
        if ($image instanceof LOJAEXEMPLOZF_Resource_Productimage_Item) {
            $imageId =$image->imageId;
        } else {
            $imageId = (int) $image;
        }

        if ($product instanceof LOJAEXEMPLOZF_Resource_Product_Item) {
            $productId =$product->productId;
        } else {
            $productId = (int) $product;
        }

        //reset defaults
        $data = array('isDefault' => 'No');
        $where = $this->getAdapter()->quoteInto('productId = ?', $productId);
        $this->update($data, $where);

        $data = array('isDefault' => 'Yes');
        $where = $this->getAdapter()->quoteInto('imageId = ?', $imageId);

        return $this->update($data, $where);
    }
}