<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_featurette extends CI_Model {

    public function getFeaturette(){
        $query = $this->db->query('
                        SELECT fea_title, fea_content, fea_photo_url
                        FROM featurette'
                    );
        return $query->result();
    }

}
?>