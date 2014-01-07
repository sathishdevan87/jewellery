<?php

class Lister_CustomerTestimonials_Block_Receiveblock extends Mage_Core_Block_Template {
    
    public function displayDetails(){
         $this->_prepareLayout();
         $collection = Mage::getModel('customertestimonials/remarks')->displaydetails();
    }
}

?>