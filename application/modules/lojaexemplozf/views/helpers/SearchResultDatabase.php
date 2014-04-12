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
class LOJAEXEMPLOZF_View_Helper_SearchResultDatabase extends Zend_View_Helper_Abstract
{
	
	public function searchResultDatabase($hit)
    {
        
		$this->view->assign( 'produtos', $hit->toArray());
        return $this->view->render('index/_result_database.phtml');
        
    }
}