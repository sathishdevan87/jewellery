<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Lister_Communitypoll
 *
 * @author adithya
 */
class Lister_Communitypoll_Block_Communitypoll extends Mage_Core_Block_Template {
  
  public function prod()
    { 
        $products = Mage::getModel('communitypoll/communitypoll')->productcatlist();
        return $products;
        
    }
    
        
}

?>
