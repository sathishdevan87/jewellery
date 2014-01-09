<?php

class Lister_CustomerTestimonials_Model_Resource_Remarks_Collection extends Mage_Core_Model_Resource_Db_Collection_Abstract {
    protected function _construct()
    {
            $this->_init('customertestimonials/remarks');
    }
}
?>