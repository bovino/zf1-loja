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
	
	 /**
     * @var array
     */
    protected $_forms = array();
    
    public function init()
    {
        // get the default model
        $this->_model = new LOJAEXEMPLOZF_Model_Contact();

        // add forms
        $this->view->contactForm = $this->getContactForm();
        
    }
    
	public function indexAction(){
	}
	
	public function sendAction(){
		
		$request = $this->getRequest();

        if (!$request->isPost()) {
            return $this->_helper->redirector('index');
        }

        if (false === $this->_model->save( $this->view->contactForm, $request->getPost(), array('role' => 'Guest'))) {
            return $this->render('index');
        }
		
	}
	
    public function getContactForm()
    {
        $urlHelper = $this->_helper->getHelper('url');
        
        $this->_forms['contact'] = $this->_model->getForm('contactBase');
		
        $this->_forms['contact']->setAction($urlHelper->url(array(
            'controller' => 'contact',
            'action'     => 'send',
            ), 
            'default'
        ));
        $this->_forms['contact']->setMethod('post');
        
        return $this->_forms['contact'];
    }
}
