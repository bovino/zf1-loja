<?php
/**
 * LOJAEXEMPLOZF_Service_Search
 *
 * Provides search on the index
 *
 * @category   Storefront
 * @package    LOJAEXEMPLOZF_Service
 * @copyright  Copyright (c) 2008 Keith Pope (http://www.thepopeisdead.com)
 * @license    http://www.thepopeisdead.com/license.txt     New BSD License
 */
class LOJAEXEMPLOZF_Service_Search
{
    protected $_index;

    public function __construct($index)
    {
        $this->_index = $index;
    }

    public function query( LOJAEXEMPLOZF_Search_Searcher_Interface $searcher )
    {
        //print_r( $searcher->getProductBySearch() ); die();	       	
        $hits  = $searcher->getProductBySearch();
        //$hits  = $this->_index->find($searcher->parse());
		//$hits  = $this->_index->find($searcher->getProductBySearch( $searcher ));
        //$hits = $this->getResource('Product')->getProductBySearch( $searcher );
        return $hits;
    }
	
}