<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_images extends CI_Model {

	public function getProductColorPreviewPhoto($color_id){
        $query = $this->db->query('
                        SELECT img_photo_url
                        FROM images
                        WHERE colors_color_id = '.$color_id.'
                        ORDER BY img_priority
                        LIMIT 0,1
                        '
                    );
        return $query->result();
    }

    public function getProductColorPreviewPhotoByItemId($item_id){
        $query = $this->db->query('
                        SELECT img.img_photo_url
                        FROM images img JOIN items itm
                        ON img.colors_color_id = itm.colors_color_id
                        WHERE itm.item_id = '.$item_id.'
                        ORDER BY img.img_priority
                        LIMIT 0,1
                        '
                    );
        return $query->result();
    }

    public function getProductColorImages($color_id){
        $query = $this->db->query('
                        SELECT img_photo_url
                        FROM images
                        WHERE colors_color_id = '.$color_id.'
                        ORDER BY img_priority
                        LIMIT 0,4
                        '
                    );
        return $query->result();
    }
}
?>