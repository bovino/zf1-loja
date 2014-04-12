<?php
/**
 * LOJAEXEMPLOZF_View_Helper_SearchResult
 *
 * Display the search result
 *
 * @category   Storefront
 * @package    LOJAEXEMPLOZF_View_Helper
 * @copyright  Copyright (c) 2008 Keith Pope (http://www.thepopeisdead.com)
 * @license    http://www.thepopeisdead.com/license.txt     New BSD License
 */
class LOJAEXEMPLOZF_View_Helper_SearchResult extends Zend_View_Helper_Abstract
{
    public function searchResult($hit)
    {
        $catalog = new LOJAEXEMPLOZF_Model_Catalog();
        $product = $catalog->getProductById($hit->productId);

        if (null !== $product) {
            $category = $catalog->getCategoryById($product->categoryId);
            $this->view->product = $product;
            $this->view->category = $category;
            return $this->view->render('index/_result.phtml');
        }
    }
	
}