<?php
$installer = $this;
$installer->startSetup();
$installer->run("
    CREATE TABLE IF NOT EXISTS`{$installer->getTable('customertestimonials/remarks')}` (
      `customer_id` int(11) NOT NULL auto_increment,
      `customer_name` text NOT NULL,
      `customer_email` text NOT NULL,
      `customer_number` text NOT NULL,
      `customer_remarks` text NOT NULL,
      `status` text,
      PRIMARY KEY  (`customer_id`)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8;
    
");
$installer->endSetup();
?>
