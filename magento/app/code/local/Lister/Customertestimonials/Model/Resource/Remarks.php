<?php
class Lister_CustomerTestimonials_Model_Resource_Remarks extends Mage_Core_Model_Resource_Db_Abstract{
    
    public function _construct(){
        
        $this->_init('customertestimonials/remarks','customer_id');
        
    }
    
//    public function sendDetails($details){       
//        
//        $tableName = Mage::getSingleton('core/resource')->getTableName('customertestimonials/remarks');
//        $result = $this->_getWriteAdapter()->insert($tableName, $details); 
//    }
    
}
?>