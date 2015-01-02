<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_order_details extends CI_Model {

    public function insertOrderItem($qty, $price, $size, $color, $order_id, $item_id){

        $query = $this->db->query("
                        INSERT INTO order_details(
                                or_det_quantity, or_det_price, or_det_size, or_det_color, orders_order_id, items_item_id
                            )
                        VALUES(
                            ".$qty.", ".$price.", '".$size."', '".$color."', ".$order_id.", ".$item_id."
                            )
                    ");
    }

    public function getProductById2($item_id){
        
        $query = $this->db->query('
                        SELECT count(*) as itemCount,items_item_id
                        FROM order_details
                        GROUP BY products_prod_id
                        ORDER BY itemCount DESC
                        LIMIT 0,5
        ');

        return $query->result_array();

    }

    public function getAllOrderDetails($order_id){
        $query = $this->db->query('
                        SELECT  od.or_det_id,od.or_det_quantity, od.or_det_size, od.or_det_price, i.item_stock,
                                (SELECT img_photo_url FROM images WHERE colors_color_id = c.color_id LIMIT 0,1) AS color_photo_url
                                ,p.prod_name
                        FROM order_details od 
                        JOIN orders o
                        JOIN items i
                        JOIN colors c
                        JOIN products p
                        ON o.order_id = od.orders_order_id
                        AND i.item_id = od.items_item_id
                        AND c.color_id = i.colors_color_id
                        AND p.prod_id = c.products_prod_id
                        WHERE orders_order_id = '.$order_id
                    );
        return $query->result();
    }

    public function getQuantityAndItemID($or_det_id){
        $query = $this->db->query('
                        SELECT  or_det_quantity, items_item_id
                        FROM order_details 
                        WHERE or_det_id = '.$or_det_id
                    );
        return $query->result();
    }
}
?>