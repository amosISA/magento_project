<?php

$installer = $this;
$installer->startSetup();

$installer->getConnection()
    ->addColumn($installer->getTable('mymodule/imei'),
        'customer',
        array(
            'type' => Varien_Db_Ddl_Table::TYPE_TEXT,
            'nullable' => true,
            'default' => null,
            'comment' => 'Client'
        )
    );

$installer->endSetup();