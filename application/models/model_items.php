<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_items extends CI_Model {

    public function getItemsByColor($color_id){
        $query = $this->db->query('
                        SELECT i.item_id, i.item_stock, s.size_name
                        FROM colors c JOIN items i JOIN sizes s
                        ON i.colors_color_id = c.color_id
                        AND s.size_id = i.sizes_size_id
                        WHERE c.color_id = '.$color_id.'
                        ORDER BY s.size_name'
                    );
        return $query->result_array();
    }

    public function updateStocks($item_id, $qty){
        $query = $this->db->query("
                        UPDATE items
                        SET item_stock = item_stock - ".$qty."
                        WHERE item_id = ".$item_id);
    }

}
?>