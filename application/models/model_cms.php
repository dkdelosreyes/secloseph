<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_cms extends CI_Model {

    public function getTermsOfSale(){
        $query = $this->db->query('
                        SELECT cms_content, cms_date_updated
                        FROM cms 
                        WHERE cms_title = "terms_of_sale"'
                    );
        return $query->result();
    }

    public function getAbout(){
        $query = $this->db->query('
                        SELECT cms_content, cms_date_updated, cms_photo_url
                        FROM cms 
                        WHERE cms_title = "about"'
                    );
        return $query->result();
    }

    public function getContact(){
        $query = $this->db->query('
                        SELECT cms_content, cms_date_updated, cms_photo_url
                        FROM cms 
                        WHERE cms_title = "contact"'
                    );
        return $query->result();
    }

}
?>