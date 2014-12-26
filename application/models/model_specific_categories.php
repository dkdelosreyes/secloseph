<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_specific_categories extends CI_Model {

    public function getSpecificCategories(){
        $query = $this->db->query('
                        SELECT spec_cat_id, spec_cat_name
                        FROM specific_categories
                        ORDER BY spec_cat_name
                        '
                    );
        return $query->result();
    }

}
?>