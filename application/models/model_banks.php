<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_banks extends CI_Model {

    public function getBanks(){
        $query = $this->db->query('
                        SELECT bank_id, bank_name
                        FROM banks'
                    );
        return $query->result();
    }

}
?>