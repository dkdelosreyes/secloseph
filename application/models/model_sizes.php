<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_sizes extends CI_Model {

    public function getSizeName($size_id){
        $query = $this->db->query('
                        SELECT size_name
                        FROM sizes
                        WHERE size_id = '.$size_id
                    );
        return $query->result_array();
    }
}
?>