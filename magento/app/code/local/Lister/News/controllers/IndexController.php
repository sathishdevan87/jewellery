<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of IndexController
 *
 * @author subhasri
 */
class Lister_News_IndexController extends Mage_Core_Controller_Front_Action {
  
  public function indexAction()
    {
        $this->loadLayout();
        //$block = $this->getLayout()->createBlock('news/news')->setTemplate('news/news_links.phtml');
        //$this->getLayout()->getBlock('content')->append($block);
        $this->renderLayout();
    }
    
    public function viewAction()
    {
      $news_id = $this->getRequest()->getParam('news_id');
      Mage::register('news_id', $news_id);
      
      $this->loadLayout();   
      //$block = $this->getLayout()->createBlock('news/news')->setTemplate('news/view_news.phtml');
      //$this->getLayout()->getBlock('content')->append($block);
      $this->renderLayout();
    }
}
