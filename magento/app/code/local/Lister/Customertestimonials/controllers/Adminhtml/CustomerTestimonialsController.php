<?php
class Lister_CustomerTestimonials_Adminhtml_CustomerTestimonialsController extends Mage_Adminhtml_Controller_Action {
    
    public function indexAction()
    {
        $this->_title($this->__('Manage'))->_title($this->__('Testimonials'));
        $this->loadLayout();
        $this->_setActiveMenu('customertestimonials/manage');
        $this->_addBreadcrumb(Mage::helper('adminhtml')->__('Testimonial Manager'), Mage::helper('adminhtml')->__('Testimonial Manager'));
        
        $this->_addContent($this->getLayout()->createBlock('customertestimonials/adminhtml_testimonial'));
        $this->renderLayout();
    } 
    public function gridAction() {
        $this->loadLayout();
        $this->getResponse()->setBody(
        $this->getLayout()->createBlock('customertestimonials/adminhtml_customertestimonials')->toHtml()
    );
  }
   
    public function editAction() {
     $id = $this->getRequest()->getParam('id');
      
      $model  = Mage::getModel('customertestimonials/remarks')->load($id);
     
      if ($model->getId() || $id == 0) {
         $data = Mage::getSingleton('adminhtml/session')->getFormData(true);
         
         if (!empty($data)) {
            $model->setData($data);
         }
       //  Mage::helper('staticblock/data')->showme($model);
         Mage::register('customertestimonials_data', $model);
	
         $this->loadLayout();
     
         $this->getLayout()->getBlock('head')->setCanLoadExtJs(true);
	
         $this->_addContent($this->getLayout()->createBlock('customertestimonials/adminhtml_customertestimonials_edit'))
                 ->_addLeft($this->getLayout()->createBlock('customertestimonials/adminhtml_customertestimonials_edit_tabs'));
			
         $this->renderLayout();
      } 
      else {
         Mage::getSingleton('adminhtml/session')->addError(Mage::helper('customertestimonials')->__('This item does not exist'));
         $this->_redirect('*/*/');
      }
   }
   
   public function saveAction()
   {
       $id = $this->getRequest()->getParam('customer_id');
       
       $data = Mage::getModel('customertestimonials/remarks')->load($id);
       $data->setCustomerName($this->getRequest()->getParam('customer_name'));
       $data->setCustomerEmail($this->getRequest()->getParam('customer_email'));
       $data->setCustomerNumber($this->getRequest()->getParam('customer_number'));
       $data->setCustomerRemarks($this->getRequest()->getParam('customer_remarks'));
       $data->setStatus($this->getRequest()->getParam('status'));
       $data->save();
       
       if(is_numeric($id))
        $message = 'The customer testimonials item has been updated.';
      else 
        $message = 'The customer testimonials item has been added.';
      
       Mage::getSingleton('adminhtml/session')->addSuccess(Mage::helper('customertestimonials')->__($message));
       $this->_redirect("*/*/index");
       return;
   }
   
   public function deleteAction()
   {
     $id = $this->getRequest()->getParam('id');
     Mage::getModel('customertestimonials/remarks')->load($id)->delete();
     $message = 'The customer testimonials has been deleted.';
     Mage::getSingleton('adminhtml/session')->addSuccess(Mage::helper('customertestimonials')->__($message));
     $this->_redirect("*/*/index");
     return;
   }
    
}
?>
