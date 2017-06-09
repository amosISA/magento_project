<?php
class IMEI_Mymodule_Model_Resource_Imei_Collection extends Mage_Core_Model_Resource_Db_Collection_Abstract {
    protected function _construct()
    {
        $this->_init('mymodule/imei');
    }
}