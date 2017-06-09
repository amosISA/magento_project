<?php

/**
 * Created by PhpStorm.
 * User: AMOS
 * Date: 07/06/2017
 * Time: 8:48
 */

class IMEI_Mymodule_Model_Imei extends Mage_Core_Model_Abstract {
    public function _construct()
    {
        $this->_init('mymodule/imei');
    }
}