<?php

$installer = $this;

$installer->startSetup();

//$table = $installer->getConnection()
//   ->addColumn($installer->getTable('news/news'), 'status', array(
//        'type'    => Varien_Db_Ddl_Table::TYPE_SMALLINT,
//        'nullable'  => false,
//        'primary'   => true,
//        'unsigned'  => true,
//    ));
// 
//$installer->getConnection()->updateTable($table);
//$installer->endSetup();

$installer->run("
ALTER TABLE {$installer->getTable('news/news')} 
ADD COLUMN `status` INT UNSIGNED NOT NULL ; ");

$installer->endSetup();
