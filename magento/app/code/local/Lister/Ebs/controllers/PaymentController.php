<?php
class Lister_Ebs_Payment extends Mage_Core_Controller_Front_Action {
    
    public function indexAction(){
        
        $this->loadLayout();
        $this->renderLayout();
        
    }
    
    public function redirectAction(){
       
        $customerDetails=$this->getRequest()->getParams();
        $customer = Mage::getModel('customertestimonials/remarks')->insertData($customerDetails);
        $message = 'Thanks for the providing feedback.';
        Mage::getSingleton('core/session')->addSuccess(Mage::helper('customertestimonials')->__($message));
        $this->_redirect("*/*/index");
  
    }
    
    public function retrieveAction(){
  
        $this->loadLayout();
        $this->renderLayout();
     
    }
    
}
?>
