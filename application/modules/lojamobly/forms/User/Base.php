<?php
/**
 * The base user form
 *
 * @category   Storefront
 * @package    LOJAMOBLY_Form
 * @copyright  Copyright (c) 2008 Keith Pope (http://www.thepopeisdead.com)
 * @license    http://www.thepopeisdead.com/license.txt     New BSD License
 */
class LOJAMOBLY_Form_User_Base extends LOJAMOBLY_Form_Abstract
{
    public function init()
    {
        // add path to custom validators
        $this->addElementPrefixPath(
            'LOJAMOBLY_Validate',
            APPLICATION_PATH . '/modules/lojamobly/models/validate/',
            'validate'
        );

        $this->addElement('select', 'title', array(
            'required'   => true,
            'label'      => 'Como gostaria de ser chamado:',
            'multiOptions' => array('Sr' => 'Sr','Sra' => 'Sra','Senhorita' => 'Senhorita','Senhora' => 'Senhora'),
        ));

        $this->addElement('text', 'firstname', array(
            'filters'    => array('StringTrim'),
            'validators' => array(
                'Alpha',
                array('StringLength', true, array(3, 128))
            ),
            'required'   => true,
            'label'      => 'Nome',
        ));

        $this->addElement('text', 'lastname', array(
            'filters'    => array('StringTrim'),
            'validators' => array(
                'Alpha',
                array('StringLength', true, array(3, 128))
            ),
            'required'   => true,
            'label'      => 'Sobrenome',
        ));

        $this->addElement('text', 'email', array(
            'filters'    => array('StringTrim', 'StringToLower'),
            'validators' => array(
                array('StringLength', true, array(3, 128)),
                array('EmailAddress'),
                array('UniqueEmail', false, array(new LOJAMOBLY_Model_User())),
            ),
            'required'   => true,
            'label'      => 'Email',
        ));

        $this->addElement('password', 'passwd', array(
            'filters'    => array('StringTrim'),
            'validators' => array(
                array('StringLength', true, array(6, 128))
            ),
            'required'   => true,
            'label'      => 'Senha',
        ));

        $this->addElement('password', 'passwdVerify', array(
            'filters'    => array('StringTrim'),
            'validators' => array(
               'PasswordVerification',
            ),
            'required'   => true,
            'label'      => 'Confirmação de senha',
        ));

        $this->addElement('select', 'role', array(
            'required'   => true,
            'label'      => 'Nível de acesso',
            'multiOptions' => array('Customer' => 'Customer', 'Admin' => 'Admin'),
        ));

        $this->addElement('submit', 'submit', array(
            'required' => false,
            'ignore'   => true,
            'label'      => 'Cadastrar',
            'decorators' => array('ViewHelper',array('HtmlTag', array('tag' => 'dd', 'value'=>'Cadastrar','id' => 'form-submit')))
        ));

         $this->addElement('hidden', 'userId', array(
            'filters'    => array('StringTrim'),
            'required'   => true,
            'decorators' => array('viewHelper',array('HtmlTag', array('tag' => 'dd', 'class' => 'noDisplay')))
        ));
    }
}
