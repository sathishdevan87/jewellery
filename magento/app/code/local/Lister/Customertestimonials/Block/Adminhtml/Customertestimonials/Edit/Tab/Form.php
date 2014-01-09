<?php

class Lister_CustomerTestimonials_Block_Adminhtml_CustomerTestimonials_Edit_Tab_Form extends Mage_Adminhtml_Block_Widget_Form
{
   protected function _prepareForm()
   {
      $form = new Varien_Data_Form();
      $this->setForm($form);
     
      if (Mage::registry('customertestimonials_data'))
        {
            $data = Mage::registry('customertestimonials_data')->getData();
            
        }
        else
        {
            $data = array();
        }
          $fieldset = $form->addFieldset('customertestimonials_form', array('legend'=>Mage::helper('customertestimonials')->__('Customer Testimonials Item Information')));
       
          $fieldset->addField('customer_name', 'text', array(
          'label'     => Mage::helper('customertestimonials')->__('Name'),
          'class'     => 'required-entry',
          'required'  => true,
          'name'      => 'customer_name',
          )); 
          
	  $fieldset->addField('customer_email', 'text', array(
          'label'     => Mage::helper('customertestimonials')->__('Email'),
          'class'     => 'required-entry',         
          'required'  => true,
          'name'      => 'customer_email',
          ));
          
          $fieldset->addField('customer_number', 'text', array(
          'label'     => Mage::helper('customertestimonials')->__('Number'),
          'class'     => 'required-entry',         
          'required'  => true,
          'name'      => 'customer_number',
          ));
          
	  $fieldset->addField('customer_remarks', 'textarea', array(
          'label'     => Mage::helper('customertestimonials')->__('Remarks'),
          'class'     => 'required-entry',
          'required'  => true,
          'name'      => 'customer_remarks',
          ));
          
          $fieldset->addField('status', 'select', array(
            'label'     => Mage::helper('customertestimonials')->__('Status'),
            'name'      => 'status',
            'values'    => array(
                array(
                    'value'     => 'approved',
                    'label'     => Mage::helper('customertestimonials')->__('Approved'),
                ),

                array(
                    'value'     => 'Rejected',
                    'label'     => Mage::helper('customertestimonials')->__('Rejected'),
                ),
            ),
        ));
          
     
          $form->setValues($data);
	 

      return parent::_prepareForm();
   }
}