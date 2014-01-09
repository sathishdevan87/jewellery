<?php
class Lister_CustomerTestimonials_Block_Adminhtml_CustomerTestimonials_Grid extends Mage_Adminhtml_Block_Widget_Grid{
     
    public function __construct()
    {
        parent::__construct();
        $this->setId('testimonialGrid');
        $this->setDefaultSort('customer_id');
        $this->setDefaultDir('ASC');
        $this->setSaveParametersInSession(true);
        
    }
   protected function _prepareCollection()
   {  
     
      $collection = Mage::getModel('customertestimonials/remarks')->getCollection();
      $this->setCollection($collection);
      return parent::_prepareCollection();
    }
   protected function _prepareColumns()
   {
       $this->addColumn('customer_id',
             array(
                    'header' => 'customer_id',
                    'align' =>'right',
                    'width' => '50px',
                    'index' => 'customer_id',
               ));
       $this->addColumn('customer_name',
               array(
                    'header' => 'customer_name',
                    'align' =>'left',
                    'index' => 'customer_name',
              ));
       $this->addColumn('customer_email', 
               array(
                    'header' => 'customer_email',
                    'align' =>'left',
                    'index' => 'customer_email',
             ));
        $this->addColumn('customer_number',
                array(
                     'header' => 'customer_number',
                     'align' =>'left',
                     'index' => 'customer_number',
          ));
        $this->addColumn('customer_remarks',
                array(
                     'header' => 'customer_remarks',
                     'align' =>'left',
                     'index' => 'customer_remarks',
          ));
        $this->addColumn('status',
                array(
                     'header' => 'status',
                     'align' =>'left',
                     'index' => 'status',
          ));
        

         
         return parent::_prepareColumns();
    }
    public function getRowUrl($row)
    {
         return $this->getUrl('*/*/edit', array('id' => $row->getId()));
    }

    
}
?>
