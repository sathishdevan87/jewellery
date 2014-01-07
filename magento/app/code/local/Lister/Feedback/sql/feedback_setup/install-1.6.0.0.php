<?php

$installer = $this;

$installer->startSetup();

$table = $installer->getConnection()
    ->newTable($installer->getTable('feedback/feedback'))
    ->addColumn('feedback_id', Varien_Db_Ddl_Table::TYPE_INTEGER, null, array(
      'auto_increment' => true,
      'unsigned' => true,
      'nullable' => false,
      'primary' => true,
        ), 'Feedback Id')
    ->addColumn('customer_name', Varien_Db_Ddl_Table::TYPE_TEXT, 255, array(
      'nullable' => false,
      'unsigned' => true,
        ), 'Customer Name')
    ->addColumn('email', Varien_Db_Ddl_Table::TYPE_TEXT, 255, array(
        ), 'Customer Email')
    ->addColumn('feedback', Varien_Db_Ddl_Table::TYPE_TEXT, '64k', array(
      'nullable' => false,
      'unsigned' => true,
        ), 'Feedback')
    ->addColumn('customer_id', Varien_Db_Ddl_Table::TYPE_INTEGER, null, array(
      'nullable' => true,
        ), 'Customer Id')
    ->addColumn('created_at', Varien_Db_Ddl_Table::TYPE_TIMESTAMP, null, array(
      'nullable' => false,
        ), 'Created At')
    ->setComment('Feedbacks');
$installer->getConnection()->createTable($table);

$installer->endSetup();
