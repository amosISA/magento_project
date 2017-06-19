<?php

$installer = $this;
$installer->startSetup();

$installer->getConnection()
    ->changeColumn($installer->getTable('mymodule/imei'),
        'created',
        'created',
        array(
            'type' => Varien_Db_Ddl_Table::TYPE_DATE,
            'nullable' => true,
            'comment' => 'Created'
        )
    );

$installer->endSetup();