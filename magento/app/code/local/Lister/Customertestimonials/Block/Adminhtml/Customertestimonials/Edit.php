<?php

class Lister_CustomerTestimonials_Block_Adminhtml_CustomerTestimonials_Edit extends Mage_Adminhtml_Block_Widget_Form_Container
{
   	
   public function __construct()
   {
      parent::__construct();
       
      $this->_objectId = 'customer_id';
      $this->_blockGroup = 'customertestimonials';
      $this->_controller = 'adminhtml_customertestimonials';
       
    }
    
    public function getHeaderText()
    {
       if( Mage::registry('customertestimonials_data') && Mage::registry('customertestimonials_data')->getId() ) {
          return Mage::helper('customertestimonials')->__("Edit Customer Remark From User '%s'", $this->htmlEscape(Mage::registry('customertestimonials_data')->getCustomerEmail()));
      } 
      else {
         return Mage::helper('customertestimonials')->__('Add Customer testimonials Item');
      }
   }
}
?>
