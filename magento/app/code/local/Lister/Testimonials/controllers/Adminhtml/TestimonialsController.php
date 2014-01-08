<?php
class Lister_Testimonials_Adminhtml_TestimonialsController extends Mage_Adminhtml_Controller_Action
{
    protected function _initAction() {
      $this->loadLayout()
              ->_setActiveMenu('testimonials/testimonials');
      return $this;
   }   
 
   public function indexAction() {
      
      $this->_initAction()
	  	   ->_addContent($this->getLayout()->createBlock('testimonials/adminhtml_testimonials'))
           ->renderLayout();
   }
   
//   public function editAction() {
//      $id     = $this->getRequest()->getParam('id');
//      
//      $model  = Mage::getModel('testimonials/testimonials')->load($id);
//            
//      if ($model->getId() || $id == 0) {
//         $data = Mage::getSingleton('adminhtml/session')->getFormData(true);
//         
//         if (!empty($data)) {
//            $model->setData($data);
//         }
//         Mage::register('testimonials_data', $model);
//	
//         $this->loadLayout();
//     
//         $this->getLayout()->getBlock('head')->setCanLoadExtJs(true);
//	
//         $this->_addContent($this->getLayout()->createBlock('testimonials/adminhtml_testimonials_edit'))
//                 ->_addLeft($this->getLayout()->createBlock('testimonials/adminhtml_testimonials_edit_tabs'));
//			
//         $this->renderLayout();
//      } 
//      else {
//         Mage::getSingleton('adminhtml/session')->addError(Mage::helper('testimonials')->__('Testimonial does not exist'));
//         $this->_redirect('*/*/');
//      }
//   }
//   public function saveAction()
//   {
//       $id = $this->getRequest()->getParam('testimonials_id');
//       $data = Mage::getModel('testimonials/testimonials')->load($id);
//       $data->setTitle($this->getRequest()->getParam('title'));
//       $data->setCategory($this->getRequest()->getParam('category'));
//       $data->setContent($this->getRequest()->getParam('content'));
//       $data->setStatus($this->getRequest()->getParam('status'));
//       $data->save();
//       
//       if(is_numeric($id))
//        $message = 'The news item has been updated.';
//      else 
//        $message = 'The news item has been added.';
//      
//       Mage::getSingleton('adminhtml/session')->addSuccess(Mage::helper('news')->__($message));
//       $this->_redirect("*/*/index");
//       return;
//   }
   
//   public function deleteAction()
//   {
//     $id = $this->getRequest()->getParam('id');
//     Mage::getModel('news/news')->load($id)->delete();
//     $message = 'The news item has been deleted.';
//     Mage::getSingleton('adminhtml/session')->addSuccess(Mage::helper('news')->__($message));
//     $this->_redirect("*/*/index");
//     return;
//   }
   
  
    public function exportCsvAction() {
    $fileName = 'testimonials.csv';
    $grid = $this->getLayout()->createBlock('testimonials/adminhtml_testimonials_grid');
    $this->_prepareDownloadResponse($fileName, $grid->getCsvFile());
  }

  public function exportExcelAction() {
    $fileName = 'testimonials.xml';
    $grid = $this->getLayout()->createBlock('testimonials/adminhtml_testimonials_grid');
    $this->_prepareDownloadResponse($fileName, $grid->getExcelFile($fileName));
  }

public function approveAction()
    {
        $id = $this->getRequest()->getParam('testimonials_id');
        $data = Mage::getModel('testimonials/testimonials');
        $data->load($id);
        $data->setStatus(1);
        $data->save();
        $this->_redirect("*/*/index");
    }
    public function rejectAction()
    {
        $id = $this->getRequest()->getParam('testimonials_id');
        $data = Mage::getModel('testimonials/testimonials');
        $data->load($id);
        $data->setStatus(0);
        $data->save();
        $this->_redirect("*/*/index");
    }
}