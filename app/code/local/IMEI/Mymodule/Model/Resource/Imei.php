<?php
/**
 * Created by PhpStorm.
 * User: AMOS
 * Date: 08/06/2017
 * Time: 9:39
 */

class IMEI_Mymodule_Model_Resource_Imei extends Mage_Core_Model_Resource_Db_Abstract{
    public function _construct()
    {
        $this->_init('mymodule/imei', 'id');
    }
}