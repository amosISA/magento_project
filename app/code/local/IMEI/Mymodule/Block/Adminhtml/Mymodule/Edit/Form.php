<?php
class IMEI_Mymodule_Block_Adminhtml_Mymodule_Edit_Form extends Mage_Adminhtml_Block_Widget_Form
{
    /**
     * Init class
     */
    public function __construct()
    {
        parent::__construct();

        $this->setId('imei_mymodule_mymodule_form');
        $this->setTitle($this->__('IMEI Information'));
    }

    protected function _prepareForm()
    {
        $model = Mage::registry('imei_data');

        //Creamos el form sin inputs
        $form = new Varien_Data_Form(
            array(
                'id' => 'edit_form',
                'action' => $this->getUrl('*/*/save', array('id' => $this->getRequest()->getParam('id'))
                ),
                'method' => 'post',
            )
        );

        $fieldset = $form->addFieldset('mymodule_form',
            array('legend'=>'IMEI información'));

        $fieldset->addField('imei_code', 'text',
            array(
                'label' => 'IMEI',
                'class' => 'required-entry',
                'required' => true,
                'name' => 'imei_code',
            ));

        $fieldset->addField('estado', 'text',
            array(
                'label' => 'Estado',
                'class' => 'required-entry',
                'required' => true,
                'name' => 'estado',
            ));

        $fieldset->addField('customer', 'text',
            array(
                'label' => 'Customer',
                'class' => 'required-entry',
                'required' => true,
                'name' => 'customer',
            ));

        $form->setValues($model->getData());
        $form->setUseContainer(true);
        $this->setForm($form);
        return parent::_prepareForm();
    }
}