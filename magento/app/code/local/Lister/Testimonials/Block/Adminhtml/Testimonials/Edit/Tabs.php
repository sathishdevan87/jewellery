<?php

class Lister_Testimonials_Block_Adminhtml_Testimonials_Edit_Tabs extends Mage_Adminhtml_Block_Widget_Tabs
{
   public function __construct()
   {
      parent::__construct();
      $this->setId('testimonials_tabs');
      $this->setDestElementId('edit_form');
      $this->setTitle(Mage::helper('testimonials')->__('Manage Testimonials'));
   }

   protected function _beforeToHtml()
   {
      $this->addTab('form_section', array(
          'label'     => Mage::helper('testimonials')->__('Testimonial Details'),
          'title'     => Mage::helper('testimonials')->__('Testimonials'),
          'content'   => $this->getLayout()->createBlock('testimonials/adminhtml_testimonials_edit_tab_form')->toHtml(),
          ));
      return parent::_beforeToHtml();
   }
}