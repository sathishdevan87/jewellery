<?php
class Lister_Testimonials_IndexController extends Mage_Core_Controller_Front_Action {
       public function indexAction()
    {
        $this->loadLayout();
     //   echo "<pre>"; print_r($this->getLayout()); exit;
        $this->renderLayout();
    }

    public function postAction()
    {
        $post = $this->getRequest()->getPost();
            try {
                $data = Mage::getModel('testimonials/testimonials');
        $data->setCustomerName($post['customer_name']);
    $data->setEmail($post['email']);
    //$data->setCustomerCategory($post['category']);
    $data->setPhoneNumber($post['phone_number']);
    $data->setRemarks($post['remarks']);
    $data->setStatus(0);
    $data->save();
    Mage::getSingleton('customer/session')->addSuccess(Mage::helper('testimonials')->__('Your inquiry was submitted and will be responded to as soon as possible. Thank you for contacting us.'));
                $this->_redirect('*/*/');
               // return;
            } 
            catch (Exception $e) {
     Mage::getSingleton('customer/session')->addError(Mage::helper('testimonials')->__($e));
      $this->_redirect('*/*/');
                return;
            }

        } 
   public function viewAction()
   {
       $this->loadLayout();
       $this->renderLayout();
   }

}