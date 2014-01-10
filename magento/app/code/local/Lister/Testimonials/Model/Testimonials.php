<?php

class Lister_Testimonials_Model_Testimonials extends Mage_Core_Model_Abstract {

  protected function _construct() {
    $this->_init('testimonials/testimonials');
  }

  public function getAllTestimonials() {
    
    $data = Mage::getModel('testimonials/testimonials')->getCollection()
            ->addFieldToFilter('status',array('eq'=>1))
            ->addFieldToSelect('testimonials_id')
            ->addFieldToSelect('customer_name')
            ->addFieldToSelect('remarks');
    return $data;
  }
}