<?php

class Lister_Testimonials_Block_Adminhtml_Testimonials_Edit_Tab_Form extends Mage_Adminhtml_Block_Widget_Form
{
   protected function _prepareForm()
   {
        if (Mage::registry('testimonials_data'))
        {
            $data = Mage::registry('testimonials_data')->getData();
        }
        else
        {
            $data = array();
        }
      $form = new Varien_Data_Form();
      $this->setForm($form);
      $fieldset = $form->addFieldset('testimonials_form', array(
            'legend' =>Mage::helper('testimonials')->__('Customertestimonials')
       ));
 
        
        $fieldset->addField('customer_first_name', 'text', array(
             'label'     => Mage::helper('testimonials')->__('Customer First Name'),
             'class'     => 'required-entry',
             'required'  => true,
             'name'      => 'customer_first_name',
        ));
 
        $fieldset->addField('customer_last_name', 'text', array(
             'label'     => Mage::helper('testimonials')->__('Customer last Name'),
             'class'     => 'required-entry',
             'required'  => true,
             'name'      => 'customer_last_name',
        ));
        
        $fieldset->addField('customer_email', 'text', array(
             'label'     => Mage::helper('testimonials')->__('Customer Email'),
             'class'     => 'required-entry',
             'required'  => true,
             'name'      => 'customer_email',
        ));
        
        $fieldset->addField('customer_phone_number', 'text', array(
             'label'     => Mage::helper('testimonials')->__('Customer Phone Number'),
             'class'     => 'required-entry',
             'required'  => true,
             'name'      => 'customer_phone_number',
        ));
        
        $fieldset->addField('content', 'textarea', array(
             'label'     => Mage::helper('testimonials')->__('Testimonial'),
             'class'     => 'required-entry',
             'required'  => true,
             'name'      => 'content',
        ));
 
        $fieldset->addField('status', 'radios', array(
            'label'     => $this->__('Status'),
            'name'      => 'status',
            'values'    => array(
                          array('value'=>'1','label'=>'Approved'),
                          array('value'=>'0','label'=>'Rejected'),
                     ),
            'disabled'  => false,
            'readonly'  => false,
        ));
        $form->setValues($data);
        return parent::_prepareForm();
   }
}