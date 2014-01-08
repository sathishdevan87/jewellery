<?php

class Lister_CustomerTestimonials_Block_Adminhtml_Testimonial extends Mage_Adminhtml_Block_Widget_Grid_Container {

  public function __construct() {
    
    $this->_blockGroup = 'customertestimonials';
    $this->_controller = 'adminhtml_customertestimonials';
    $this->_headerText = Mage::helper('customertestimonials')->__('Testimonials Manager');
    parent::__construct();
    $this->_removeButton('add');
  }

}
