<?php

class Lister_News_Model_News extends Mage_Core_Model_Abstract {

  protected function _construct() {
    $this->_init('news/news');
  }

  public function getAllNews() {
    $data = Mage::getModel('news/news')->getCollection()
            ->addFieldToFilter('status',array('eq'=>1))
            ->addFieldToSelect('news_id')->addFieldToSelect('title');
    return $data;
  }

  public function getNews($news_id) {
    
    $details = Mage::getModel('news/news')->load($news_id);
    return $details;
  }
}