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
        
		            // add path to custom validators
        $this->addElementPrefixPath(
            'LOJAEXEMPLOZF_Validate',
            APPLICATION_PATH . '/modules/lojaexemplozf/models/validate/',
            'validate'
        );

        $this->addElement('text', 'titulo', array(
            'filters'    => array('StringTrim'),
            'validators' => array(
                'Alpha',
                array('StringLength', true, array(3, 128))
            ),
            'required'   => true,
            'label'      => 'Título',
        ));
		
		$this->addElement('text', 'assunto', array(
            'filters'    => array('StringTrim'),
            'validators' => array(
                'Alpha',
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
		
		$this->addElement('textarea', 'mensagem', array(
            'filters'    => array('StringTrim'),
            'validators' => array(
                'Alpha',
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