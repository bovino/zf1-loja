<?php
/**
 * The registration form
 * 
 * @category   Storefront
 * @package    LOJAMOBLY_Form
 * @copyright  Copyright (c) 2008 Keith Pope (http://www.thepopeisdead.com)
 * @license    http://www.thepopeisdead.com/license.txt     New BSD License
 */
class LOJAMOBLY_Form_User_Register extends LOJAMOBLY_Form_User_Base
{
    public function init()
    {
        // make sure parent is called!
        parent::init();

        // specialize this form
        $this->removeElement('userId');
        $this->getElement('submit')->setLabel('Cadastrar');
        $this->removeElement('role');
    }
}
