<?php
/**
 * Magento
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Open Software License (OSL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/osl-3.0.php
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@magentocommerce.com so we can send you a copy immediately.
 *
 * @category   Mage
 * @package    Lister_Ebs
 * @copyright  Copyright (c) 2008 Irubin Consulting Inc. DBA Varien (http://www.varien.com)
 * @license    http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */

/**
 * Ebs Standard Model
 *
 * @category   Mage
 * @package    Lister_Ebs
 * @name       Lister_Ebs_Model_Standard
 * @author     Magento Core Team <core@magentocommerce.com>
 */
class Lister_Ebs_Model_Standard extends Mage_Payment_Model_Method_Abstract
{
    protected $_code  = 'ebs_standard';
    protected $_formBlockType = 'ebs/standard_form';

    protected $_isGateway               = false;
    protected $_canAuthorize            = true;
    protected $_canCapture              = true;
    protected $_canCapturePartial       = false;
    protected $_canRefund               = false;
    protected $_canVoid                 = false;
    protected $_canUseInternal          = false;
    protected $_canUseCheckout          = true;
    protected $_canUseForMultishipping  = false;

    protected $_order = null;


    /**
     * Get Config model
     *
     * @return object Lister_Ebs_Model_Config
     */
    public function getConfig()
    {
        return Mage::getSingleton('ebs/config');
    }

    /**
     * Payment validation
     *
     * @param   none
     * @return  Lister_Ebs_Model_Standard
     */
    public function validate()
    {
        parent::validate();
        $paymentInfo = $this->getInfoInstance();
        if ($paymentInfo instanceof Mage_Sales_Model_Order_Payment) {
            $currency_code = $paymentInfo->getOrder()->getBaseCurrencyCode();
        } else {
            $currency_code = $paymentInfo->getQuote()->getBaseCurrencyCode();
        }
       // if ($currency_code != $this->getConfig()->getCurrency()) {
         //   Mage::throwException(Mage::helper('ebs')->__('Selected currency //code ('.$currency_code.') is not compatabile with SecureEbs'));
       // }
        return $this;
    }

    /**
     * Capture payment
     *
     * @param   Varien_Object $orderPayment
     * @return  Mage_Payment_Model_Abstract
     */
    public function capture (Varien_Object $payment, $amount)
    {
        $payment->setStatus(self::STATUS_APPROVED)
            ->setLastTransId($this->getTransactionId());

        return $this;
    }

    /**
     *  Returns Target URL
     *
     *  @return	  string Target URL
     */
    public function getEbsUrl ()
    {
        return 'https://secure.ebs.in/pg/ma/sale/pay/';
    }

    /**
     *  Return URL for Ebs success response
     *
     *  @return	  string URL
     */
    protected function getSuccessURL ()
    {
        return Mage::getUrl('ebs/standard/success', array('_secure' => true));
    }

    /**
     *  Return URL for Ebs notification
     *
     *  @return	  string Notification URL
     */
    protected function getNotificationURL ()
    {
        return Mage::getUrl('ebs/standard/notify', array('_secure' => true));
    }

    /**
     *  Return URL for Ebs failure response
     *
     *  @return	  string URL
     */
    protected function getFailureURL ()
    {
        return Mage::getUrl('ebs/standard/failure', array('_secure' => true));
    }

    /**
     *  Form block description
     *
     *  @return	 object
     */
    public function createFormBlock($name)
    {
        $block = $this->getLayout()->createBlock('ebs/form_standard', $name);
        $block->setMethod($this->_code);
        $block->setPayment($this->getPayment());
        return $block;
    }
    
    public function getCheckoutRedirectUrl()
    {

        return Mage::getUrl('ebs/standard/redirect');
    }

    /**
     *  Return Order Place Redirect URL
     *
     *  @return	  string Order Redirect URL
     */
    public function getOrderPlaceRedirectUrl()
    {
        return Mage::getUrl('ebs/standard/redirect');
    }

    /**
     *  Return Standard Checkout Form Fields for request to Ebs
     *
     *  @return	  array Array of hidden form fields
     */
    public function getStandardCheckoutFormFields ()
    {
        $order = $this->getOrder();
        if (!($order instanceof Mage_Sales_Model_Order)) {
            Mage::throwException($this->_getHelper()->__('Cannot retrieve order object'));
        }

        $billingAddress = $order->getBillingAddress();
	$shippingAddress = $order->getShippingAddress();

        $streets = $billingAddress->getStreet();
        $street = isset($streets[0]) && $streets[0] != ''
                  ? $streets[0]
                  : (isset($streets[1]) && $streets[1] != '' ? $streets[1] : '');


	

        if ($this->getConfig()->getDescription()) {
            $transDescription = $this->getConfig()->getDescription();
        } else {
            $transDescription = Mage::helper('ebs')->__('Order #%s', $order->getRealOrderId());
        }

        if ($order->getCustomerEmail()) {
            $email = $order->getCustomerEmail();
        } elseif ($billingAddress->getEmail()) {
            $email = $billingAddress->getEmail();
        } else {
            $email = '';
        }

        $fields = array(
			'account_id'       => $this->getConfig()->getAccountId(),
                       	'return'           => Mage::getUrl('ebs/standard/success',array('_secure' => true)),
                        'product_name'     => $transDescription,
                        'product_price' => number_format($order->getBaseGrandTotal(), 2, '.', ''),
                        'language'         => $this->getConfig()->getLanguage(),
                        'f_name'           => $billingAddress->getFirstname(),
                        's_name'           => $billingAddress->getLastname(),
                        'street'           => $billingAddress->getStreet(1),
                        'city'             => $billingAddress->getCity(),
                        'state'            => $billingAddress->getRegion(),
                        'zip'              => $billingAddress->getPostcode(),
                        'country'          => $billingAddress->getCountryModel()->getIso3Code(),
                        'phone'            => $billingAddress->getTelephone(),
                        'email'            => $email,
                        'cb_url'           => $this->getNotificationURL(),
                        'cb_type'          => 'P', // POST method used (G - GET method)
                        'decline_url'      => $this->getFailureURL(),
                      	'cs1'              => $order->getRealOrderId(),   
		'ship_name'	=> $shippingAddress->getFirstname().$shippingAddress->getLastname(),
			
			'ship_address'	=> $shippingAddress->getStreet(1),
			'ship_city'	=> $shippingAddress->getCity(),
			'ship_state'	=> $shippingAddress->getRegion(),
			'ship_postal_code'=> $shippingAddress->getPostcode(),
			'ship_country'     => $shippingAddress->getCountryModel()->getIso3Code(),
                        'ship_phone'           => $shippingAddress->getTelephone(),
			

			


            );

        if ($this->getConfig()->getDebug()) {
            $debug = Mage::getModel('ebs/api_debug')
                ->setRequestBody($this->getEbsUrl()."\n".print_r($fields,1))
                ->save();
            $fields['cs2'] = $debug->getId();
        }

        return $fields;
    }

}
