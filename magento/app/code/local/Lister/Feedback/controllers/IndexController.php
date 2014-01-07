<?php

class Lister_Feedback_IndexController extends Mage_Core_Controller_Front_Action {

  public function indexAction() {
    $this->loadLayout();
    $this->renderLayout();
  }

  public function saveAction() {
    $form_values = $this->getRequest()->getParams();
    Mage::getModel('feedback/feedback')->addfeedback($form_values);
    Mage::getSingleton('core/session')
        ->addSuccess('Your feedback has been recorded.');
    $this->_redirect('feedback');
  }

}
