<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_confirm_payments extends CI_Model {

     public function insertPayment($data){
     	// print_r($data);
        $query = $this->db->query("
                        INSERT INTO confirm_payments(confirm_order_number, confirm_bank, confirm_branch, confirm_name,confirm_amount,confirm_date,confirm_message,confirm_deposit_slip)
                        VALUES('".$data['order_number']."',
                                '".$data['bank']."',
                                '".$data['branch']."',
                                '".$data['name']."',
                                '".$data['amount']."',
                                '".$data['date']."',
                                '".$data['message']."',
                                '".$data['deposit_slip']."'
                                
                            )
                    ");
    }

    public function getConfirmedPaymentsByOrderId($order_id){
        $query = $this->db->query("
                        SELECT  *
                        FROM confirm_payments 
                        WHERE confirm_order_number = '".$order_id."'"
                    );
        return $query->result();
    }

}
?>