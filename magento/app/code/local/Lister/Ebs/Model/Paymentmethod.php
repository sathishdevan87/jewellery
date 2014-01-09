<?php
class Lister_Ebs_Model_Paymentmethod extends Mage_Payment_Model_Method_Abstract {
    protected $_code = 'ebs';
    protected $_isInitializeNeeded      = true;
    protected $_canUseInternal          = false;
    protected $_canUseForMultishipping  = false;
    /**
    * Return Order place redirect url
    *
    * @return string
    */
    public function getOrderPlaceRedirectUrl()
    {
    //when you click on place order you will be redirected on this url, if you don't want this action remove this method
    return Mage::getUrl('ebs/payment/redirect', array('_secure' => true));
    }
}