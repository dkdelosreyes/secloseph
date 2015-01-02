<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_paypal_facilitator extends CI_Model {

    public function getPaypalAccount(){
        $query = $this->db->query('
                        SELECT paypal_email
                        FROM paypal_facilitator 
                        WHERE paypal_name = "facilitator"
                    ');
        return $query->row();
    }

}
?>