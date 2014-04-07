<?php
/**
 * AdminController
 * 
 * @category   Storefront
 * @package    LOJAMOBLY_Controllers
 * @copyright  Copyright (c) 2008 Keith Pope (http://www.thepopeisdead.com)
 * @license    http://www.thepopeisdead.com/license.txt     New BSD License
 */
class LOJAMOBLY_AdminController extends Zend_Controller_Action 
{
	/**
	 * The default action - show the home page
	 */
	public function indexAction() 
	{
        // @TODO Resolver problema de permissao	
        //if (!$this->_helper->acl('Admin')) {
            //throw new LOJAMOBLY_Acl_Exception('Accesso negado');
        //}
	}
}
