<?php

class Lister_Testimonials_Block_Adminhtml_Testimonials_Grid extends Mage_Adminhtml_Block_Widget_Grid
{
   public function __construct()
   {
      parent::__construct();
      
      $this->setId('testimonialsGrid');
      $this->setDefaultSort('testimonials_id');
      $this->setDefaultDir('ASC');
      $this->setSaveParametersInSession(true);
   }
  
   protected function _prepareCollection()
   {
       
      $collection = Mage::getModel('testimonials/testimonials')->getCollection();
      $this->setCollection($collection);
      
      return parent::_prepareCollection();
   }
   

   protected function _prepareColumns()
   {
      
       $this->addColumn('testimonials_id', array(
          'header'    => Mage::helper('testimonials')->__('Testimonial ID'),
          'align'     =>'right',
          'width'     => '20px',
          'index'     => 'testimonials_id',
      ));
	 $this->addColumn('customer_name', array(
          'header'    => Mage::helper('testimonials')->__('Customer Name'),
          'align'     =>'right',
          'width'     => '50px',
          'index'     => 'customer_name',
      )); 
          $this->addColumn('Email', array(
            'header'    =>  Mage::helper('testimonials')->__('Email'),
            'width'     =>  '100px',
            'align'     =>'right',
            'index'     =>  'Email',
        ));
	
      $this->addColumn('action',
            array(
            'header'    =>  Mage::helper('testimonials')->__('Action'),
            'width'     => '100px',
            'type'      => 'action',
            'getter'    => 'getId',
            'actions'   => array(
                    array(
                            'caption'   => Mage::helper('testimonials')->__('Approve'),
                            'url'       => array('base'=> '*/*/approve'),
                            'field'     => 'testimonials_id'
                    ),
                array(
                            'caption'   => Mage::helper('testimonials')->__('Reject'),
                            'url'       => array('base'=> '*/*/reject'),
                            'field'     => 'testimonials_id'
                    )
            ),
            'filter'    => false,
            'sortable'  => false,
            'index'     => 'stores',
            'is_system' => true,
    ));
      $this->addExportType('*/*/exportCsv', Mage::helper('testimonials')->__('CSV'));
      $this->addExportType('*/*/exportXml', Mage::helper('testimonials')->__('XML'));
	  
      return parent::_prepareColumns();
   }
   
  }