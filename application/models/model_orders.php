<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_orders extends CI_Model {

    public function insertOrder($order_id,$date_checkout, $date_expired, $total, $status, $paymentMethod, $customer_id,$addr_fname, $addr_lname, $addr_contact, $addr_num, $addr_prov, $addr_mun, $addr_brgy, $addr_landmark, $addr_instruc,$addr_fname_ship, $addr_lname_ship, $addr_contact_ship, $addr_num_ship, $addr_prov_ship, $addr_mun_ship,$addr_brgy_ship, $addr_landmark_ship, $addr_instruc_ship){

        $query = $this->db->query("
                        INSERT INTO orders(
                                order_id,
                                order_date_checkout, order_date_expired,
                                order_total, order_status, order_payment_method, customers_cust_id,  
                                order_ship_to, order_ship_contact, order_ship_address_number,
                                order_ship_address_baranggay, order_ship_address_municipal, order_ship_address_province,
                                order_ship_message, 
                                order_bill_to, order_bill_contact, order_bill_address_number,
                                order_bill_address_baranggay, order_bill_address_municipal, order_bill_address_province,
                                order_bill_message
                            )
                        VALUES(
                            ".$order_id.",
                            '".$date_checkout."', '".$date_expired."',
                            ".$total.", '".$status."', '".$paymentMethod."', ".$customer_id.", 
                            '".$addr_fname_ship.' '.$addr_lname_ship."', '".$addr_contact_ship."', '".$addr_num_ship."',
                            '".$addr_brgy_ship."', '".$addr_mun_ship."','".$addr_prov_ship."', 
                            '".$addr_instruc_ship."', 
                            '".$addr_fname.' '.$addr_lname."', '".$addr_contact."', '".$addr_num."',
                             '".$addr_brgy."', '".$addr_mun."','".$addr_prov."', 
                            '".$addr_instruc."'
                            )
                    ");
    }

    public function updateOrderAddress($order_id, $addr_name_ship, $addr_contact_ship, $addr_num_ship, $addr_prov_ship, $addr_instruc_ship){
     
        $query = $this->db->query("
                        UPDATE orders SET
                            order_ship_to = '".$addr_name_ship."', 
                            order_ship_contact = '".$addr_contact_ship."', 
                            order_ship_address_number = '".$addr_num_ship."',
                            order_ship_address_province = '".$addr_prov_ship."', 
                            order_ship_message = '".$addr_instruc_ship."'
                        WHERE order_id = '".$order_id."'
                            
                    ");
    }

    public function getAllOrdersByUser($customer_id){
        $query = $this->db->query('
                        SELECT *
                        FROM orders
                        WHERE customers_cust_id = '.$customer_id.'
                        ORDER BY order_date_checkout DESC'
                    );
        return $query->result();
    }

    public function getOrderDetailsForMessagePage($customer_id,$order_id){
        $query = $this->db->query('
                        SELECT o.order_id, o.order_total, p.payment_name,p.payment_content
                        FROM orders o JOIN payment_method p 
                        ON o.order_payment_method = p.payment_name
                        WHERE o.customers_cust_id = '.$customer_id.'
                        AND o.order_id = "'.$order_id.'"
                        LIMIT 0,1
                        '
                    );
        return $query->result();
    }

    public function getOrderAddressAndTotal($order_id){
        $query = $this->db->query('
                        SELECT  o.order_total, o.order_status, p.payment_title,
                                o.order_ship_to, o.order_ship_contact,o.order_ship_address_number,
                                o.order_ship_address_baranggay, o.order_ship_address_municipal, o.order_ship_address_province,
                                o.order_ship_message,
                                o.order_bill_to, o.order_bill_contact, o.order_bill_address_number,
                                o.order_bill_address_baranggay, o.order_bill_address_municipal, o.order_bill_address_province,
                                o.order_bill_message
                        FROM orders o
                        JOIN payment_method p
                        ON o.order_payment_method = p.payment_name
                        WHERE order_id = "'.$order_id.'"
                        '
                    );
        return $query->result();
    }

    public function getAllOrders(){
        $query = $this->db->query('
                        SELECT DISTINCT o.order_id, o.order_status, o.order_date_checkout, o.order_total, p.payment_title, c.confirm_order_number
                        FROM orders o
                        INNER JOIN payment_method p
                        ON o.order_payment_method = p.payment_name
                        LEFT JOIN confirm_payments c
                        ON c.confirm_order_number = o.order_id
                        ORDER BY 
                        FIELD(order_status, "Waiting Confirmation", "Approved", "Cancelled"), order_date_checkout DESC
                        '
                    );
        return $query->result();
    }

    public function getAllWaitingOrdersCount(){
        $query = $this->db->query("SELECT count(*) AS order_count
                                    FROM orders
                                    WHERE order_status = 'Pending Approval'");
        return $query->result();
    }

    public function updateOrderStatus($order_id,$status){
        $query = $this->db->query(
                'UPDATE orders SET order_status = "'.$status.'" WHERE order_id = "'.$order_id.'"'
            );
    }

    public function checkOrderNumber($order_number){
        $query = $this->db->query('
                        SELECT count(*) as or_count
                        FROM orders
                        WHERE order_id = "'.$order_number.'"
                    ');
        return $query->result_array();
    }

}









?>