<?php
class IMEI_Mymodule_Adminhtml_MymoduleController extends Mage_Adminhtml_Controller_Action
{
    function indexAction()
    {
        $this->loadLayout();
        $this->renderLayout();
    }

    public function editAction()
    {
        $imeiId = $this->getRequest()->getParam('id');
        $imeiModel = Mage::getModel('mymodule/imei')->load($imeiId);

        if ($imeiModel->getId() || $imeiId == 0)
        {
            Mage::register('imei_data', $imeiModel);
            $this->loadLayout();

            $this->_setActiveMenu('mymodule/set_time');
            $this->_addBreadcrumb('mymodule Manager', 'imei Manager');
            $this->_addBreadcrumb('Imei Description', 'Imei Description');
            $this->getLayout()->getBlock('head')->setCanLoadExtJs(true);

            $this->_addContent($this->getLayout()
                                    ->createBlock('imei_mymodule/adminhtml_mymodule_edit'))
                                    ->_addLeft($this->getLayout()
                                    ->createBlock('imei_mymodule/adminhtml_mymodule_edit_tabs')
                );
            $this->renderLayout();
        }
        else
        {
            Mage::getSingleton('adminhtml/session')->addError('No existe dicho IMEI');
            $this->_redirect('*/*/');
        }
    }
}