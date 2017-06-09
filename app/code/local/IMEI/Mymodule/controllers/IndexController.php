<?php

/**
 * Created by PhpStorm.
 * User: AMOS
 * Date: 06/06/2017
 * Time: 9:51
 */

class IMEI_Mymodule_IndexController extends Mage_Core_Controller_Front_Action
{
    public function indexAction()
    {
        $this->loadLayout();
        $this->renderLayout();
    }

    public function saveAction()
    {
        $data = $this->getRequest()->getPost();
        $input = $data['reg_imei'];
        $date = date('Y-m-d H:i:s');

        if (strlen($input) == 15)
        {
            $imei = Mage::getModel('mymodule/imei');
            $imei->setImeiCode($input);
            $imei->setCreated($date);
            $imei->setEstado('Pendiente');
            $imei->save();
            print_r($imei->load(1));
        }else {
            echo "La longitud del texto introducido no es válida";
        }
    }

    public function testAction () {
        /*$imei = Mage::getModel('mymodule/imei');
        print_r($imei->load(1));
        echo get_class($imei);*/

        $imei = Mage::getModel('mymodule/imei')->getCollection();
        foreach($imei as $reg){
            echo '<h3>'.$reg->getImeiCode().'</h3>';
        }
    }
}