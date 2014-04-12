<?php
/**sadf
 * CustomerController
 * 
 * @category   Storefront
 * @package    LOJAEXEMPLOZF_Controllers
 * @copyright  Copyright (c) 2008 Keith Pope (http://www.thepopeisdead.com)
 * @license    http://www.thepopeisdead.com/license.txt     New BSD License
 */
class LOJAEXEMPLOZF_ContactController extends Zend_Controller_Action 
{
    protected $_model;
    protected $_authService;
    
    public function init()
    {
        // get the default model
        $this->_model = new LOJAEXEMPLOZF_Model_Contact();
        $this->_authService = new LOJAEXEMPLOZF_Service_Authentication();

        // add forms
        $this->view->contactForm = $this->getContactForm();
        
    }
    
	public function send(){
		
		echo "Contato enviado"; die();
	}
	
    public function getContactForm()
    {
        $urlHelper = $this->_helper->getHelper('url');
        
        $this->_forms['login'] = $this->_model->getForm('userLogin');
		
        $this->_forms['login']->setAction($urlHelper->url(array(
            'controller' => 'contact',
            'action'     => 'send',
            ), 
            'default'
        ));
        $this->_forms['contact']->setMethod('post');
        
        return $this->_forms['contact'];
    }
}
