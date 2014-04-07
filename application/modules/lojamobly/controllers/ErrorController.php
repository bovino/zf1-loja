<?php
class LOJAMOBLY_ErrorController extends Zend_Controller_Action 
{
    public function errorAction()
    {
        $errors = $this->_getParam('error_handler');

        switch (get_class($errors->exception)) {
            case 'Zend_Controller_Dispatcher_Exception':
                // send 404
                $this->getResponse()
                     ->setRawHeader('HTTP/1.1 404 Not Found');
                $this->view->message = '404 página não encontrada.';
                break;
            case 'LOJAMOBLY_Exception_404':
                // send 404
                $this->getResponse()
                     ->setRawHeader('HTTP/1.1 404 Not Found');
                $this->view->message = $errors->exception->getMessage();
                break;
            case 'LOJAMOBLY_Acl_Exception':
                $this->_helper->layout->setLayout('main');
                $this->view->message = $errors->exception->getMessage();
                break;
            default:
                // application error
                $this->view->message = $errors->exception->getMessage();
                break;
        }
    }
}