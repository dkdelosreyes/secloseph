<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Brands extends CI_Controller {

	public function __construct() {

		parent::__construct();
		$this->load->model('model_customers');
		$this->load->model('model_products');
		$this->load->model('model_items');
		$this->load->model("model_brands");
		$this->load->model('model_specific_categories');
		$this->load->model('model_sub_categories');
		$this->load->model('model_images');
		
		$brands = $this->db->get('brands')->result();
	} # End construct

	public function index($id) {
		$sort_specific_category_id  = '';
		$sort_sub_category_id  = '';

		$get = $this->uri->uri_to_assoc(); # transform uri to array

		$brand_id = $this->uri->segment(2);
		$sort_specific_category_id = isset($get['specific']) ? $get['specific'] : '';
		$sort_sub_category_id = isset($get['sub']) ? $get['sub'] : '';

		# brand info
		$brand = $this->model_brands->get_brand_by_id($brand_id);

		# Declare data
		$data['page_title'] = $brand->brand_name;
		$data['specific_categories'] = $this->model_specific_categories->getSpecificCategories();
		$data['sub_categories'] = $this->model_sub_categories->getSubCategories($brand_id);

		$data['brand_id'] = $brand->brand_id; 						# ex. 1
		$data['brand_url'] = $brand->brand_url; 					# ex. hyperasia
		$data['brand_photo_url'] = $brand->brand_photo_url; 		# ex. hyperasia1.png
		$data['brand_name'] = $brand->brand_name; 					# ex. Hyper Asia
		$data['brand_description'] = $brand->brand_description;

		$data['controller_link'] = site_url('brands/'.$data['brand_url']);
		$data['current_link'] = $data['controller_link'].'/'.$this->uri->assoc_to_uri($get);
		
		# ====== FOR 5 RECENT ITEMS
		$data['top_recent_products'] = $this->model_products->getTopRecentProduct($data['brand_id']);
		if(!empty($data['top_recent_products'])){
            $a = 0;
            foreach ($data['top_recent_products'] as $v) {
                $top_preview_photo[$a++] = $this->model_images->getProductColorPreviewPhoto($v->color_id);
            }
            $data['top_preview_photo'] = $top_preview_photo;
        }

		# ====== SAVE LINK FOR CONTINUE SHOPPING BUTTON
		$sessdata = array('kueenie_shop_more_page_url'=>"http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]");
		$this->session->set_userdata($sessdata);

		# ====== FOR SORT BY CATEGORY
		$data['all_products'] = $this->model_products->getAllProductsByBrand($data['brand_id'],$sort_sub_category_id,$sort_specific_category_id);
		if(!empty($data['all_products'])){
            $a = 0;
            foreach ($data['all_products'] as $v) {
                $preview_photo[$a++] = $this->model_images->getProductColorPreviewPhoto($v->color_id);
            }
            $data['preview_photo'] = $preview_photo;
        }
		
		$this->load->view('view_brands', $data);
	} # End index




}

