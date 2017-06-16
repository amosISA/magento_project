<?php
class IMEI_Mymodule_Block_Adminhtml_Mymodule_Edit_Tab_Form extends Mage_Adminhtml_Block_Widget_Form
{
    protected function _prepareForm()
    {
        $form = new Varien_Data_Form();
        $this->setForm($form);

        $fieldset = $form->addFieldset('mymodule_form',
            array('legend'=>'IMEI información'));

        $fieldset->addField('estado', 'text',
        array(
            'label' => 'Estado',
            'class' => 'required-entry',
            'required' => true,
            'name' => 'estado',
        ));

        if (Mage::registry('imei_data'))
        {
            $form->setValues(Mage::registry('imei_data')->getData());
        }

        return parent::_prepareForm();
    }
}