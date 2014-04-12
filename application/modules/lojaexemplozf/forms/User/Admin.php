<?php
/**
 * LOJAEXEMPLOZF_Form_User_Admin
 *
 * The edit user form for admin user
 *
 * @category   Storefront
 * @package    LOJAEXEMPLOZF_Form
 * @copyright  Copyright (c) 2008 Keith Pope (http://www.thepopeisdead.com)
 * @license    http://www.thepopeisdead.com/license.txt     New BSD License
 */
class LOJAEXEMPLOZF_Form_User_Admin extends LOJAEXEMPLOZF_Form_User_Base
{
    public function init()
    {
        //call the parent init
        parent::init();

        // customize
        $this->getElement('passwd')->setRequired(false);
        $this->getElement('passwdVerify')->setRequired(false);
        $this->getElement('submit')->setLabel('Editar cadastro do usuário');
    }
}