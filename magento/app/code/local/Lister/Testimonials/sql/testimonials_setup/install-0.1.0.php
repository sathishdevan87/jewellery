<?php

$installer = $this;

$installer->startSetup();

$table = $installer->getConnection()
    ->newTable($installer->getTable('testimonials/testimonials'))
    ->addColumn('testimonials_id', Varien_Db_Ddl_Table::TYPE_SMALLINT, null, array(
        'auto_increment' => true,  
        'nullable'  => false,
        'primary'   => true,
        ), 'Testimonial ID')
    ->addColumn('customer_name', Varien_Db_Ddl_Table::TYPE_TEXT, 255, array(
        'unsigned'  => true,
        'nullable'  => false,
        'primary'   => false,
        ), 'Customer Name')
    ->addColumn('customer_email', Varien_Db_Ddl_Table::TYPE_TEXT, 255, array(
        'unsigned'  => true,
        'nullable'  => false,
        'primary'   => false,
        ), 'Customer Email')
    ->addColumn('phone_number', Varien_Db_Ddl_Table::TYPE_TEXT, 255, array(
        'unsigned'  => true,
        'nullable'  => false,
        'primary'   => false,
        ), 'Phone Number')
    ->addColumn('remarks', Varien_Db_Ddl_Table::TYPE_TEXT, '64k', array(
        'unsigned'  => true,
        'nullable'  => false,
        'primary'   => false,
        ), 'Remarks')
    ->addColumn('status', Varien_Db_Ddl_Table::TYPE_INTEGER, null, array(
        'unsigned'  => true,
        'nullable'  => false,
        'primary'   => false,
        ), 'Status')
    ->setComment('Custom table to store Customer Testimonials');
$installer->getConnection()->createTable($table);

$installer->endSetup();
