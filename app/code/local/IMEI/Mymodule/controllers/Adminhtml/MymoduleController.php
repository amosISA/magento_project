<?php
class IMEI_Mymodule_Adminhtml_MymoduleController extends Mage_Adminhtml_Controller_Action
{
    function indexAction()
    {
        $this->loadLayout();
        $this->renderLayout();
    }

    public function newAction()
    {
        $this->_forward('edit');
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

    public function saveAction()
    {
        if ($postData = $this->getRequest()->getPost()) {
            $model = Mage::getSingleton('mymodule/imei');
            $model->setData($postData);

            try {
                $model->save();

                Mage::getSingleton('adminhtml/session')->addSuccess($this->__('The imei has been saved.'));
                $this->_redirect('*/*/');

                return;
            }
            catch (Mage_Core_Exception $e) {
                Mage::getSingleton('adminhtml/session')->addError($e->getMessage());
            }
            catch (Exception $e) {
                Mage::getSingleton('adminhtml/session')->addError($this->__('An error occurred while saving this imei.'));
            }

            Mage::getSingleton('adminhtml/session')->setBazData($postData);
            $this->_redirectReferer();
        }
    }

    public function deleteAction()
    {
        if($this->getRequest()->getParam('id') > 0)
        {
            try
            {
                $filmsModel = Mage::getModel('mymodule/imei');
                $filmsModel->setId($this->getRequest()->getParam('id'))->delete();
                Mage::getSingleton('adminhtml/session')->addSuccess('successfully deleted');
                $this->_redirect('*/*/');
            }
            catch (Exception $e)
            {
                Mage::getSingleton('adminhtml/session')->addError($e->getMessage());
                $this->_redirect('*/*/edit', array('id' => $this->getRequest()->getParam('id')));
            }
        }
        $this->_redirect('*/*/');
    }
}