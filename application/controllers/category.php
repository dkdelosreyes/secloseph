<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Category extends CI_Controller {

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
		$sort_specific_category_id = isset($get['specific']) ? $get['specific'] : '';
		$sort_sub_category_id = isset($get['sub']) ? $get['sub'] : '';

		# Declare data
		$data['specific_categories'] = $this->model_specific_categories->getSpecificCategories();

		$data['brand_url'] = 'secretcloset2';
		$data['brand_photo_url'] = 'banner2.png';
		$data['brand_description'] = '';

		$sessdata = array('kueenie_shop_more_page_url'=>"http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]");
		$this->session->set_userdata($sessdata);

		if($id == 'newarrivals'){
			$data['brand'] = "New Arrivals";
			$data['page_title'] = $data['brand'];

			// ====== FOR RECENT ITEMS
			$data['top_recent_products'] = $this->model_products->getTopRecentNewArrival();
			$data['sub_categories'] = $this->model_sub_categories->getAllSubCategories();

			$data['all_products'] = $this->model_products->getNewArrivals($sort_sub_category_id,$sort_specific_category_id);
			
			$data['controller_link'] = site_url('category/newarrivals');

		}else if($id == 'women' || $id == 'men'){
			$data['brand'] = $id == 'women'? "Women" : "Men";
			$data['controller_link'] = $id == 'women'? site_url('category/women') : site_url('category/men');

			$data['page_title'] = $data['brand'];
			$data['top_recent_products'] = $this->model_products->getTopRecentProductByCategory($data['brand']);
			$data['sub_categories'] = $this->model_sub_categories->getSubCategoriesByMainCategory($data['brand']);

			$data['all_products'] = $this->model_products->getAllProductsByCategory($data['brand'],$sort_sub_category_id,$sort_specific_category_id);
			
		}

		# TOP RECENT PRODUCTS - PREVIEW PHOTO
		if(!empty($data['top_recent_products'])){
	        $a = 0;
	        foreach ($data['top_recent_products'] as $v) {
	            $top_preview_photo[$a++] = $this->model_images->getProductColorPreviewPhoto($v->color_id);
	        }
	        $data['top_preview_photo'] = $top_preview_photo;
	    }

	    # PRODUCTS - PREVIEW PHOTO
	    if(!empty($data['all_products'])){
            $a = 0;
            foreach ($data['all_products'] as $v) {
                $preview_photo[$a++] = $this->model_images->getProductColorPreviewPhoto($v->color_id);
            }
            $data['preview_photo'] = $preview_photo;
        }

		$data['brand_name'] = $data['brand'];
		$data['current_link'] = $data['controller_link'].'/'.$this->uri->assoc_to_uri($get);


		$this->load->view('view_brands', $data);
	} # End index




}

