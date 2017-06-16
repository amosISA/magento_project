<?php
class IMEI_Mymodule_Block_Adminhtml_Grid extends Mage_Adminhtml_Block_Widget_Grid_Container
{
    //GRID CONTAINER
    public function _construct()
    {
        $this->_blockGroup = 'mymodule';
        $this->_controller = 'adminhtml_mymodule';

        $this->_headerText = 'Gestionar los IMEI';
        $this->_addButtonLabel = 'Añadir IMEI';

        parent::_construct();
    }
}