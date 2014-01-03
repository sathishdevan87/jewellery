<?php

class Lister_Feedback_Block_Adminhtml_Feedback_Grid extends Mage_Adminhtml_Block_Widget_Grid {

  public function __construct() {
    parent::__construct();
    $this->setId('feedbackGrid');
    $this->setDefaultSort('feedback_id');
    $this->setDefaultDir('DESC');
    $this->setSaveParametersInSession(true);
    $this->setUseAjax(true);
  }

  protected function _prepareCollection() {
    $collection = Mage::getModel('feedback/feedback')->getCollection();
    $this->setCollection($collection);
    return parent::_prepareCollection();
  }

  protected function _prepareColumns() {
    $this->addColumn('feedback_id', array(
      'header' => 'Feedback ID',
      'align' => 'right',
      'width' => '50px',
      'index' => 'feedback_id',
    ));
    $this->addColumn('customer_name', array(
      'header' => 'Name',
      'align' => 'left',
      'index' => 'customer_name',
    ));
    $this->addColumn('email', array(
      'header' => 'Email',
      'align' => 'left',
      'index' => 'email',
    ));
    $this->addColumn('customer_id', array(
      'header' => 'Customer Id',
      'align' => 'left',
      'index' => 'customer_id',
    ));
    $this->addColumn('feedback', array(
      'header' => 'Feedback',
      'align' => 'left',
      'index' => 'feedback',
    ));
    $this->addExportType('*/*/exportCsv', Mage::helper('feedback')->__('CSV'));
    $this->addExportType('*/*/exportExcel', Mage::helper('feedback')->__('Excel XML'));
    return parent::_prepareColumns();
  }

  public function getGridUrl() {
    return $this->getUrl('*/*/grid', array('_current' => true));
  }

}