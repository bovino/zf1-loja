<?php
/**
 * LOJAEXEMPLOZF_Service_ProductSearcher
 *
 * Creates valid queries for the products index
 *
 * @category   Storefront
 * @package    LOJAEXEMPLOZF_Service
 * @copyright  Copyright (c) 2008 Keith Pope (http://www.thepopeisdead.com)
 * @license    http://www.thepopeisdead.com/license.txt     New BSD License
 */
class LOJAEXEMPLOZF_Service_ProductSearcher implements LOJAEXEMPLOZF_Search_Searcher_Interface
{
    /**
     * @var array
     */
    protected $_data;
	
	/**
     * @var LOJAEXEMPLOZF_Model_Product
     */
    protected $_catalogModel;
    
    /**
     * Constructor
     * 
     * @param array $data 
     */
    public function __construct(array $data)
    {
        $this->_data = $data;
		$this->_catalogModel = new LOJAEXEMPLOZF_Model_Catalog();
		
    }
	
	/**
     * Get a product by name and price range
     *
     * @param string $name, $pricefrom, $priceto
     * @return LOJAEXEMPLOZF_Resource_Product_Item|null
     */
    public function getProductBySearch( )
    {
        $data = $this->_data;
		$hits = $this->_catalogModel->getProductBySearch( $data );
		return $hits;	
        
    }
	
    public function parse()
    {
        $data = $this->_data;

        $query = Zend_Search_Lucene_Search_QueryParser::parse($data['query']);

        if ('' != $data['pricefrom'] && '' != $data['priceto']) {
            $from = new Zend_Search_Lucene_Index_Term(
                $this->_formatPrice($data['pricefrom']),
                'price'
            );
            $to = new Zend_Search_Lucene_Index_Term(
                $this->_formatPrice($data['priceto']),
                'price'
            );
            $q = new Zend_Search_Lucene_Search_Query_Range(
                 $from, $to, true // inclusive
             );
            $query = Zend_Search_Lucene_Search_QueryParser::parse($data['query'] . ' +' . $q);
        }
        
        return $query;
    }

    protected function _formatPrice($price)
    {
        $price = (int) $price;
        return str_pad(str_replace('.','',$price * 100), 10, '0', STR_PAD_LEFT);
    }
}