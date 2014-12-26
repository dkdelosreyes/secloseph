<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_customers extends CI_Model {


    public function insertUser($fname, $lname, $gender, $pass, $email){
        $query = $this->db->query("
                        INSERT INTO customers(cust_fname, cust_lname, cust_gender, cust_email,cust_password)
                        VALUES('".$fname."',
                                '".$lname."',
                                '".$gender."',
                                '".$email."',
                                '".$pass."'
                            )
                    ");
    }

    public function checkFacebookExist($email){
        $query = $this->db->query('
                        SELECT count(*) as usercount
                        FROM customers
                        WHERE cust_email = "'.$email.'"
                    ');
        return $query->result_array();
    }

    public function checkLogin($email, $pass){
        $query = $this->db->query('
                        SELECT count(*) as usercount
                        FROM customers
                        WHERE cust_email = "'.$email.'"
                        AND cust_password = "'.$pass.'"
                    ');
        return $query->result_array();
    }

    public function getUserInfo($email, $pass){
        $query = $this->db->query('
                        SELECT cust_id, cust_fname, cust_lname
                        FROM customers
                        WHERE cust_email = "'.$email.'"
                        AND cust_password = "'.$pass.'"
                    ');
        return $query->result_array();   
    }

    public function getFacebookUserInfo($email){
        $query = $this->db->query('
                        SELECT cust_id, cust_fname, cust_lname
                        FROM customers
                        WHERE cust_email = "'.$email.'"
                    ');
        return $query->result_array();   
    }

    public function getUserInfoByOrderId($order_id){
        $query = $this->db->query('
                        SELECT c.cust_id, c.cust_fname, c.cust_lname, c.cust_email, c.cust_gender, c.cust_date_created
                        FROM customers c JOIN orders o
                        ON o.customers_cust_id = c.cust_id
                        WHERE o.order_id= "'.$order_id.'"
                    ');
        return $query->result();   
    }

    


    

}
?>