<?php

$installer = $this;
$installer->startSetup();
$installer->run("
    CREATE TABLE `{$installer->getTable('mymodule/imei')}` (
      `id` int(11) NOT NULL auto_increment PRIMARY KEY,
            `imei_code` VARCHAR( 255 ) NOT NULL,
            `created` datetime NOT NULL,
            `estado` VARCHAR( 255 ) NOT NULL 
        ) ENGINE = InnoDB DEFAULT CHARSET = utf8;
");
$installer->endSetup();