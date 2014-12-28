<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_products extends CI_Model {

    // FOR BRANDS
    public function getTopRecentProduct($brand_id){

        $query = $this->db->query('
                        SELECT c.color_id, c.color_photo_url
                        FROM products p JOIN colors c JOIN brands b
                        ON p.prod_id = c.products_prod_id
                        AND b.brand_id = p.brands_brand_id
                        WHERE p.brands_brand_id = '.$brand_id.'
                        AND p.prod_record_status = "ACTIVE"
                        GROUP BY c.products_prod_id
                        ORDER BY p.prod_date_added DESC, p.prod_date_updated DESC
                        LIMIT 0,5'
                    );
        return $query->result_array();
    }

    public function getAllProductsByBrand($brand_id,$sub_category_id,$specific_category_id){
        $sub_category_sort = $sub_category_id != '' ? 'AND sub.sub_cat_id = "'.$sub_category_id.'"' : '';
        $specific_category_sort = $specific_category_id != '' ? 'AND p.categories_cat_id = "'.$specific_category_id.'"' : '';
        $query_string = '
                        SELECT c.color_id, c.color_name, c.color_photo_url, p.prod_name, p.prod_price_ret, 
                                p.prod_short_description, s.spec_cat_name
                        FROM products p JOIN colors c JOIN specific_categories s JOIN sub_categories sub
                        ON p.prod_id = c.products_prod_id 
                        AND p.categories_cat_id = s.spec_cat_id
                        AND s.sub_categories_sub_cat_id = sub.sub_cat_id
                        WHERE p.brands_brand_id = '.$brand_id.'
                        '.$specific_category_sort.'
                        '.$sub_category_sort.'
                        AND p.prod_record_status = "ACTIVE"
                        GROUP BY c.products_prod_id
                        ORDER BY p.prod_date_added DESC, p.prod_date_updated DESC
                        ';

        $query = $this->db->query($query_string);
        return $query->result();
    }








    public function getProduct($color_id){

        $query = $this->db->query('
                        SELECT *
                        FROM products p JOIN colors c JOIN brands b
                        ON p.prod_id = c.products_prod_id
                        AND b.brand_id = p.brands_brand_id
                        WHERE c.color_id = '.$color_id
                    );
        return $query->result_array();
    }


	public function getProductById($item_id){
        
        $query = $this->db->query('
                        SELECT * 
                        FROM products p
                        JOIN colors c ON c.products_prod_id = p.prod_id
                        JOIN items i ON i.colors_color_id = c.color_id
                        JOIN brands b ON p.brands_brand_id = b.brand_id
                        WHERE i.item_id = '.$item_id
        );

        return $query->row();

    }

    public function getProductByColor($prod_id){
        $query = $this->db->query('
                        SELECT color_id, color_name, color_photo_url, color_photo_palette
                        FROM colors
                        WHERE products_prod_id = '.$prod_id
                    );
        return $query->result_array();
    }

    public function getBrandOfProduct($id) {

        //$this->db->select('b.brand_name');
        $this->db->where('c.color_id', $id);
        $this->db->join('products p', 'c.products_prod_id = p.prod_id');
        $this->db->join('brands b', 'b.brand_id = p.brands_brand_id');

        return $this->db->get('colors c')->row();
    }

    public function getStocks($item_id){
        $query = $this->db->query('
                        SELECT item_stock
                        FROM items
                        WHERE item_id = '.$item_id
                    );
        return $query->result_array();
    }

    public function getProductNameAndColor($color_id){
        $query = $this->db->query('
                        SELECT p.prod_name, c.color_name
                        FROM products p JOIN colors c
                        ON p.prod_id = c.products_prod_id
                        WHERE c.color_id = '.$color_id
                    );
        return $query->result_array();
    }

    public function setDateAdded($primary_key,$date_added){
        $this->db->query('
                        UPDATE products 
                        SET prod_date_added = "'.$date_added.'",
                        prod_date_updated = "'.$date_added.'"
                        WHERE prod_id = '.$primary_key
                        );
    }

    public function setDateUpdated($primary_key,$date_updated){
        $this->db->query('
                        UPDATE products 
                        SET prod_date_updated = "'.$date_updated.'"
                        WHERE prod_id = '.$primary_key
                        );
    }

    public function getProductById2($item_id){
        
        $query = $this->db->query('
                        SELECT * 
                        FROM products p
                        JOIN colors c ON c.products_prod_id = p.prod_id
                        JOIN items i ON i.colors_color_id = c.color_id
                        JOIN brands b ON p.brands_brand_id = b.brand_id
                        WHERE i.item_id = '.$item_id
        );

        return $query->result_array();

    }
    

    public function getLatestProducts(){
        $query = $this->db->query('
                        SELECT *
                        FROM products
                        ORDER BY prod_date_added DESC, prod_name 
                        LIMIT 0,28
                        '
                    );
        return $query->result();
    }








    //FOR WOMEN AND MEN

    public function getTopRecentProductByCategory($category){

        $query = $this->db->query('
                        SELECT c.color_id, c.color_photo_url
                        FROM products p 
                            JOIN colors c 
                            JOIN specific_categories spe 
                            JOIN sub_categories sub 
                            JOIN main_categories mai
                                ON p.prod_id = c.products_prod_id
                                AND spe.spec_cat_id = p.categories_cat_id
                                AND sub.sub_cat_id = spe.sub_categories_sub_cat_id
                                AND mai.main_cat_id = sub.main_categories_main_cat_id
                        WHERE mai.main_cat_name = "'.$category.'"
                        GROUP BY c.products_prod_id
                        ORDER BY p.prod_date_added DESC, p.prod_date_updated DESC
                        LIMIT 0,5
                    ');

        return $query->result_array();
    }

    public function getAllProductsByCategory($category,$sort_category_id){
        $where_sort = $sort_category_id != ''? 'AND p.categories_cat_id = "'.$sort_category_id.'"' : '';
        $query_string = '
                        SELECT c.color_id, c.color_name, c.color_photo_url, p.prod_name, p.prod_price_ret, 
                                p.prod_short_description, spe.spec_cat_name
                        FROM products p 
                            JOIN colors c 
                            JOIN specific_categories spe 
                            JOIN sub_categories sub 
                            JOIN main_categories mai
                                ON p.prod_id = c.products_prod_id
                                AND spe.spec_cat_id = p.categories_cat_id
                                AND sub.sub_cat_id = spe.sub_categories_sub_cat_id
                                AND mai.main_cat_id = sub.main_categories_main_cat_id
                        WHERE mai.main_cat_name = "'.$category.'"
                        '.$where_sort.'
                        GROUP BY c.products_prod_id
                        ORDER BY p.prod_date_added DESC, p.prod_date_updated DESC
                        ';

        $query = $this->db->query($query_string);
        return $query->result();
    }


    // FOR NEW ARRIVALS

    public function getTopRecentNewArrival(){

        $query = $this->db->query('
                        SELECT *
                        FROM products p 
                            JOIN colors c 
                            JOIN specific_categories spe 
                            JOIN sub_categories sub 
                            JOIN main_categories mai
                        ON p.prod_id = c.products_prod_id
                        AND spe.spec_cat_id = p.categories_cat_id
                        AND sub.sub_cat_id = spe.sub_categories_sub_cat_id
                        AND mai.main_cat_id = sub.main_categories_main_cat_id
                        GROUP BY c.products_prod_id
                        ORDER BY p.prod_date_added DESC, p.prod_date_updated DESC
                        LIMIT 0,5
                    ');

        return $query->result_array();
    }

    public function getNewArrivals($sort_category_id){
        $where_sort = $sort_category_id != ''? 'WHERE p.categories_cat_id = "'.$sort_category_id.'"' : '';
        $query_string = '
                        SELECT *
                        FROM products p 
                            JOIN colors c 
                            JOIN specific_categories spe 
                            JOIN sub_categories sub 
                            JOIN main_categories mai
                        ON p.prod_id = c.products_prod_id
                        AND spe.spec_cat_id = p.categories_cat_id
                        AND sub.sub_cat_id = spe.sub_categories_sub_cat_id
                        AND mai.main_cat_id = sub.main_categories_main_cat_id
                        '.$where_sort.'
                        GROUP BY c.products_prod_id
                        ORDER BY p.prod_date_added DESC, p.prod_date_updated DESC
                        LIMIT 0,20
                    ';
        $query = $this->db->query($query_string);

        return $query->result();
    }

    public function getLikeProducts($prod_id,$brand_id){
        $query = $this->db->query('
                        SELECT c.color_id, c.color_name, c.color_photo_url, p.prod_name, p.prod_price_ret, 
                                p.prod_short_description, s.spec_cat_name
                        FROM products p 
                            JOIN colors c 
                            JOIN specific_categories s
                            JOIN sub_categories sub 
                            JOIN main_categories mai
                                ON p.prod_id = c.products_prod_id 
                                AND p.categories_cat_id = s.spec_cat_id
                                AND sub.sub_cat_id = s.sub_categories_sub_cat_id
                                AND mai.main_cat_id = sub.main_categories_main_cat_id
                        WHERE p.prod_id != 17 AND p.brands_brand_id = 6
                        GROUP BY p.prod_name
                        ORDER BY p.prod_date_added DESC, p.prod_date_updated DESC,
                            CASE p.categories_cat_id
                                WHEN 17 THEN 0
                                ELSE 2147483647
                            END
                        LIMIT 0,5
                    ');


        return $query->result();
    }


}
















?>