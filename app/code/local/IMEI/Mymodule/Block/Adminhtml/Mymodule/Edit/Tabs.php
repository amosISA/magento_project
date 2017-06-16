<?php
class IMEI_Mymodule_Block_Adminhtml_Mymodule_Edit_Tabs extends Mage_Adminhtml_Block_Widget_Tabs
{
    public function __construct()
    {
        parent::__construct();
        $this->setId('mymodule_tabs');
        $this->setDestElementId('edit_form');
        $this->setTitle('Información del IMEI');
    }

    protected function _beforeToHtml()
    {
        $this->addTab('form_section', array(
            'label' => 'Acerca del IMEI',
            'title' => 'Acerca del IMEI',
            'content' => $this->getLayout()
                ->createBlock('imei_mymodule/adminhtml_mymodule_edit_tab_form')
                ->toHtml()
        ));

        return parent::_beforeToHtml();
    }
}