<?php

class Lister_Feedback_Model_Feedback extends Mage_Core_Model_Abstract {

  protected function _construct() {
    $this->_init('feedback/feedback');
  }

  protected function _customerExists($email, $websiteId = null) {
    $customer = Mage::getModel('customer/customer');
    if ($websiteId) {
      $customer->setWebsiteId($websiteId);
    }
    $customer->loadByEmail($email);
    if ($customer->getId()) {
      return $customer;
    }
    return false;
  }

  public function addfeedback($formvalues) {
    $websiteId = Mage::app()->getWebsite()->getId();
    if ($user_present = $this->_customerExists($formvalues['email'], $websiteId)) {
      $formvalues['customer_name'] = $user_present->getFirstname();
      $formvalues['customer_id'] = $user_present->getId();
    }
    else {
      $formvalues['customer_id'] = NULL;
    }
    $formvalues['created_at'] = time();
    $this->setData($formvalues)
        ->save();
    return true;
  }

}

?>
