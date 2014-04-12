<?php
/**
 * The base search form
 *
 * @category   Storefront
 * @package    LOJAEXEMPLOZF_Form
 * @copyright  Copyright (c) 2008 Keith Pope (http://www.thepopeisdead.com)
 * @license    http://www.thepopeisdead.com/license.txt     New BSD License
 */
class LOJAEXEMPLOZF_Form_Contact_Base extends LOJAEXEMPLOZF_Form_Abstract
{
    public function init()
    {
			
		//validaçao de caracteres alfa numericos permitindo espaços em branco	
		$validatorAlpha = new Zend_Validate_Alpha(array('allowWhiteSpace' => true));	
        
		// add path to custom validators
        $this->addElementPrefixPath(
            'LOJAEXEMPLOZF_Validate',
            APPLICATION_PATH . '/modules/lojaexemplozf/models/validate/',
            'validate'
        );

        $this->addElement('text', 'title', array(
            'filters'    => array('StringTrim'),
            'validators' => array(
                $validatorAlpha,
                array('StringLength', true, array(3, 128))
            ),
            'required'   => true,
            'label'      => 'Título',
        ));
		
		$this->addElement('text', 'subject', array(
            'filters'    => array('StringTrim'),
            'validators' => array(
                $validatorAlpha,
                array('StringLength', true, array(3, 128))
            ),
            'required'   => true,
            'label'      => 'Assunto',
        ));


        $this->addElement('text', 'email', array(
            'filters'    => array('StringTrim', 'StringToLower'),
            'validators' => array(
                array('StringLength', true, array(3, 128)),
                array('EmailAddress'),
            ),
            'required'   => true,
            'label'      => 'Email',
        ));
		
		$this->addElement('textarea', 'message', array(
            'filters'    => array('StringTrim'),
            'validators' => array(
                $validatorAlpha,
                array('StringLength', true, array(3, 128))
            ),
            'required'   => true,
            'label'      => 'Mensagem',
        ));

        $this->addElement('submit', 'submit', array(
            'required' => false,
            'ignore'   => true,
            'label'      => 'Enviar mensagem',
            'decorators' => array('ViewHelper',array('HtmlTag', array('tag' => 'dd', 'value'=>'Cadastrar','id' => 'form-submit')))
        ));
		
		
    }
}