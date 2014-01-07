<?php

class Lister_News_Helper_Data extends Mage_Core_Helper_Abstract {
  
  public function getStatus()
  {
    if($this->_status == 1)
      return 'Disable';
    else
      if($this->_status == 0)
        return 'Enable';
  }
}