<?php
class Lister_CustomerTestimonials_Model_Remarks extends Mage_Core_Model_Abstract {
    
    public function _construct(){
        
        $this->_init('customertestimonials/remarks');
    }
    
    public function insertData($var){
        //$customer = Mage::getResourceModel('customertestimonials/remarks')->sendDetails($var);
        $customer = Mage::getModel('customertestimonials/remarks')->setData($var);
        $customer->save();
    }
    
    public function displaydetails(){
        $testimonial = Mage::getModel('customertestimonials/remarks')->getCollection()
                        ->addFieldToFilter('status',array('like'=>'%approved%'));
        foreach($testimonial as $blogpost){
        echo '<h3>'. 'Name of the customer : ' .'</h3>' .$blogpost->getcustomer_name();
        echo '<h3>'. 'Remarks of the customer : ' .'</h3>'.$blogpost->getcustomer_remarks();
        }
    }
    
}
?>