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
 * Redirect to Ebs
 *
 * @category    Mage
 * @package     Lister_Ebs
 * @name        Lister_Ebs_Block_Standard_Redirect
 * @author      Magento Core Team <core@magentocommerce.com>
 */

class Lister_Ebs_Block_Standard_Redirect extends Mage_Core_Block_Abstract
{

    protected function _toHtml()
    {
  
        $standard = Mage::getModel('ebs/standard');
        $form = new Varien_Data_Form();
        $form->setAction($standard->getEbsUrl())
            ->setId('ebs_standard_checkout')
            ->setName('ebs_standard_checkout')
            ->setMethod('POST')
            ->setUseContainer(true);
        foreach ($standard->getStandardCheckoutFormFields() as $field => $value) {

		if($field == 'return')
        	{
        		$returnurl=$value."?DR={DR}";
        	}

		
		if($field == 'product_price')
			{
				$amount=$value;
			}
		if($field == 'cs1')
			{
				$referenceno=$value;
			}
		if($field == 'f_name')
			{
				$fname=$value;
			}
		if($field == 's_name')
			{
				$lname=$value;
			}
	     if($field == 'product_name')
			{
			$desc=$value;
			}		 	
        if($field == 'zip')
			{
			$postalcode=$value;
			}
        if($field == 'street')
			{
			$street=$value;
			}
        if($field == 'street')
			{
			$street=$value;
			}
        if($field == 'city')
			{
			$city=$value;
			}	
        if($field == 'state')
			{
			$state=$value;
			}	
		   $form->addField($field, 'hidden', array('name' => $field, 'value' => $value));
        }

		$name=$fname." ".$lname;
		$address=$street.",".$city.",".$state;		
		$mode=Mage::getSingleton('ebs/config')->getTransactionMode();
		
		$hash = Mage::getSingleton('ebs/config')->getSecretKey()."|".Mage::getSingleton('ebs/config')->getAccountId()."|".$amount."|".$referenceno."|".$returnurl."|".$mode;

		$secure_hash = md5($hash);	
		
        $form->addField('reference_no', 'hidden', array('name'=>'reference_no', 'value'=>$referenceno));
        $form->addField('amount', 'hidden', array('name'=>'amount', 'value'=>$amount));
        $form->addField('mode', 'hidden', array('name'=>'mode', 'value'=>$mode));
        $form->addField('return_url', 'hidden', array('name'=>'return_url', 'value'=>$returnurl));
        $form->addField('name', 'hidden', array('name'=>'name', 'value'=>$name));
        $form->addField('description', 'hidden', array('name'=>'description', 'value'=>$desc));
        $form->addField('address', 'hidden', array('name'=>'address', 'value'=>$address));
        $form->addField('postal_code', 'hidden', array('name'=>'postal_code', 'value'=>$postalcode));
	$form->addField('secure_hash','hidden',array('name'=>'secure_hash','value'=>$secure_hash));
       
        $html = '<html><body>';
        $html.= $this->__('You will be redirected to E-Billing Solutions in a few seconds.');
        $html.= $form->toHtml();
       // $html.= '<script type="text/javascript">document.getElementById("ebs_standard_checkout").submit();</script>';
        $html.= '</body></html>';

        return $html;
    }
}
