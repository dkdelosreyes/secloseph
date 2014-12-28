<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_sub_categories extends CI_Model {

    public function getAllSubCategories(){
        $query = $this->db->query('
                        SELECT sub_cat_id, sub_cat_name
                        FROM sub_categories 
                        ORDER BY sub_cat_name
                        '
                    );
        return $query->result();
    }

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

    public function getSubCategoriesByMainCategory($main_cat_name){
        $query = $this->db->query('
                        SELECT sub.sub_cat_id, sub.sub_cat_name
                        FROM sub_categories sub JOIN main_categories m
                        ON sub.main_categories_main_cat_id = m.main_cat_id
                        WHERE m.main_cat_name  = "'.$main_cat_name.'"
                        ORDER BY sub.sub_cat_name
                        '
                    );
        return $query->result();
    }

}
?>