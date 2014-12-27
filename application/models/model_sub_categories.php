<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_sub_categories extends CI_Model {

    public function getSubCategories($brand_url){
        $query = $this->db->query('
                        SELECT sub.sub_cat_id, sub.sub_cat_name
                        FROM brands b JOIN sub_categories sub
                        ON b.main_categories_main_cat_id = sub.main_categories_main_cat_id
                        WHERE b.brand_url = "'.$brand_url.'"
                        ORDER BY sub_cat_name
                        '
                    );
        return $query->result();
    }

}
?>