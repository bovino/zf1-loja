<?php
/**
 * LOJAEXEMPLOZF_View_Helper_Cart
 *
 * Helper for all shopping cart
 *
 * @category   Storefront
 * @package    LOJAEXEMPLOZF_View_Helper
 * @copyright  Copyright (c) 2008 Keith Pope (http://www.thepopeisdead.com)
 * @license    http://www.thepopeisdead.com/license.txt     New BSD License
 */
class LOJAEXEMPLOZF_View_Helper_Cart extends Zend_View_Helper_Abstract
{
    public $cartModel;

    public function Cart()
    {
        $this->cartModel = new LOJAEXEMPLOZF_Model_Cart();

        return $this;
    }

    public function getSummary()
    {
        $currency = new Zend_Currency();
        $itemCount = count($this->cartModel);

        if (0 == $itemCount) {
            return '<p>Nenhum produto </p>';
        }

        $html  = '<p> Produtos: ' . $itemCount;
        $html .= ' | Valor Total: '.$currency->toCurrency($this->cartModel->getSubTotal());
        $html .= '<br /><a href="';
        $html .= $this->view->url(array(
            'controller' => 'cart', 
            'action' => 'view',
            'module' => 'lojaexemplozf'
            ),
            'default',
            true
        );
        $html .= '">Ver carrinho </a></p>';

        return $html;
    }

    public function addForm(LOJAEXEMPLOZF_Resource_Product_Item $product)
    {
        $form = $this->cartModel->getForm('cartAdd');
        $form->populate(array(
            'productId' => $product->productId,
            'returnto' => $this->view->url()
        ));
        $form->setAction($this->view->url(array(
            'controller' => 'cart',
            'action' => 'add',
            'module' => 'lojaexemplozf'
            ),
            'default',
            true
        ));
        return $form;
    }

    public function cartTable()
    {
        $cartTable = $this->cartModel->getForm('cartTable');
        $cartTable->setAction($this->view->url(array(
            'controller' => 'cart' ,
            'action' => 'update'
            ),
            'default'
        ));

        // add qty elements, use subform so we can easily get them later
        $qtys = new Zend_Form_SubForm();

        foreach($this->cartModel as $item) {
            $qtys->addElement('text', (string) $item->productId,
                array(
                    'value' => $item->qty,
                    'belongsTo' => 'quantity',
                    'style' => 'width: 20px;',
                    'decorators' => array(
                        'ViewHelper'
                    ),
                )
            );
        }
        $cartTable->addSubForm($qtys, 'qtys');

        // add shipping options
        $cartTable->addElement('select', 'shipping', array(
            'decorators' => array(
                'ViewHelper'
            ),
            'MultiOptions' => $this->_getShippingMultiOptions(),
            'onChange' => 'this.form.submit();',
            'style' => 'background-color:#CEECF5',
            'value' => $this->cartModel->getShippingCost()
        ));

        return $cartTable;
    }

    public function formatAmount($amount)
    {
        $currency = new Zend_Currency();
        return $currency->toCurrency($amount);
    }

    private function _getShippingMultiOptions()
    {
        $currency = new Zend_Currency();
        $shipping = new LOJAEXEMPLOZF_Model_Shipping();
        $options = array(0 => 'Por favor selecione');

        foreach($shipping->getShippingOptions() as $key => $value) {
            $options["$value"] = $key . ' - ' . $currency->toCurrency($value);
        }

        return $options;
    }
}
