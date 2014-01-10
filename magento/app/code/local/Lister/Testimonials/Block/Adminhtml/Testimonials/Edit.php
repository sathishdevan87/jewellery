<?php

class Lister_Testimonials_Block_Adminhtml_Testimonials_Edit extends Mage_Adminhtml_Block_Widget_Form_Container
{
   public function __construct()
   {
      parent::__construct();
      $this->_objectId = 'testimonial_id';
      $this->_blockGroup = 'testimonials';
      $this->_controller = 'adminhtml_testimonials';
    }
}
?>
