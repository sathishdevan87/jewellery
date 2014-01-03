<?php

class Lister_Feedback_Adminhtml_FeedbackController extends Mage_Adminhtml_Controller_Action {

  public function indexAction() {
    $this->_title($this->__('Feedback'))->_title($this->__('Customer'));
    $this->loadLayout();
    $this->_setActiveMenu('customer/customer');
    $this->_addBreadcrumb('Feedback', 'Feedback');
    $this->_addContent($this->getLayout()->createBlock('feedback/adminhtml_feedback'));
    $this->renderLayout();
  }

  public function gridAction() {
    $this->loadLayout();
    $this->getResponse()->setBody(
        $this->getLayout()->createBlock('feedback/adminhtml_feedback')->toHtml()
    );
  }

  public function exportCsvAction() {
    $fileName = 'feedback.csv';
    $grid = $this->getLayout()->createBlock('feedback/adminhtml_feedback_grid');
    $this->_prepareDownloadResponse($fileName, $grid->getCsvFile());
  }

  public function exportExcelAction() {
    $fileName = 'feedback.xml';
    $grid = $this->getLayout()->createBlock('feedback/adminhtml_feedback_grid');
    $this->_prepareDownloadResponse($fileName, $grid->getExcelFile($fileName));
  }

}
