<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_shippings extends CI_Model {

    public function getShippingAddress($cust_id){
        $query = $this->db->query('
                        SELECT *
                        FROM shippings
                        WHERE customers_cust_id = '.$cust_id
                    );
        return $query->result();
    }

    public function getChosenShippingAddress($billingAddress){
        $query = $this->db->query('
                        SELECT ship_fname, ship_lname, ship_contact, ship_address, ship_address_landmark,
                        		ship_address_baranggay,ship_address_municipal,ship_address_province,
                        		ship_instruction
                        FROM shippings
                        WHERE ship_id = '.$billingAddress
                    );
        return $query->result();
    }

    

}
?>