<?php
class Lister_News_Model_Resource_News extends Mage_Core_Model_Resource_Db_Abstract{
    protected function _construct()
    {
        $this->_init('news/news', 'news_id');
    }
}
