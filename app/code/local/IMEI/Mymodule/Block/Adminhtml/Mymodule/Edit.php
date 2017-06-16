<?php
class IMEI_Mymodule_Block_Adminhtml_Mymodule_Edit extends Mage_Adminhtml_Block_Widget_Form_Container
{
    //FORM CONTAINER -> recice the forms
    public function __construct()
    {
        $this->_objectId = 'id';
        $this->_blockGroup = 'mymodule';
        $this->_controller = 'adminhtml_mymodule';

        parent::__construct();

        $this->_updateButton('save', 'label', 'Guardar IMEI');
        $this->_updateButton('delete', 'label', 'Borrar IMEI');
    }

    /* Here, we look at whether it was transmitted item to form
        * to put the right text in the header (Add or Edit)
        */
    public function getHeaderText()
    {
        if (Mage::registry('imei_data') && Mage::registry('imei_data')->getId()) {
            return 'Editar el IMEI ' . $this->htmlEscape(Mage::registry('imei_data')->getTitle());
        } else {
            return 'Añadir el IMEI';
        }
    }
}