<?php
/**
 * Add new category
 *
 * @category   Storefront
 * @package    LOJAMOBLY_Form
 * @copyright  Copyright (c) 2008 Keith Pope (http://www.thepopeisdead.com)
 * @license    http://www.thepopeisdead.com/license.txt     New BSD License
 */
class LOJAMOBLY_Form_Catalog_Category_Add extends LOJAMOBLY_Form_Abstract
{
    public function init()
    {
        // add path to custom validators & filters
        $this->addElementPrefixPath(
            'LOJAMOBLY_Validate',
            APPLICATION_PATH . '/modules/lojamobly/models/validate/',
            'validate'
        );

        $this->addElementPrefixPath(
            'LOJAMOBLY_Filter',
            APPLICATION_PATH . '/modules/lojamobly/models/filter/',
            'filter'
        );
        
        $this->setMethod('post');
        $this->setAction('');

        $this->addElement('text', 'name', array(
            'label' => 'Name',
            'filters' => array('StringTrim'),
            'required' => true,
        ));
        $this->addElement('text', 'ident', array(
            'label' => 'Ident',
            'filters' => array('StringTrim','Ident'),
            'validators' => array(
                    array('UniqueIdent', true, array($this->getModel(), 'getCategoryByIdent'))
            ),
            'required' => true,
        ));

        // get the select
        $form = new LOJAMOBLY_Form_Catalog_Category_Select(
            array('model' => $this->getModel())
        );
        $element = $form->getElement('categoryId');
        $element->clearDecorators()->loadDefaultDecorators();
        $element->setName('parentId')
                ->setRequired(true)
                ->setLabel('Selecionar categoria pai');
        $this->addElement($element,'parentId');

        $this->addElement('submit', 'add', array(
            'label' => 'Adicionar Categoria',
            'decorators' => array('ViewHelper',array('HtmlTag',array('tag' => 'dd'))),
        ));
    }
}
