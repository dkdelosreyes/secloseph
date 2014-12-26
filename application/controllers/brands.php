<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Brands extends CI_Controller {

	public function __construct() {

		parent::__construct();
		$this->load->model('model_customers');
		$this->load->model('model_products');
		$this->load->model('model_items');
		$this->load->model("model_brands");
		$this->load->model('model_specific_categories');
		
		$brands = $this->db->get('brands')->result();
	} # End construct

	public function index($id) {
		$brand_id = $this->uri->segment(2);

		//brand info
		$brand = $this->model_brands->get_brand_by_id($brand_id);

		# Declare data
		$data['page_title'] = $brand->brand_name;
		$data['specific_categories'] = $this->model_specific_categories->getSpecificCategories();
		$data['latest_products'] = $this->model_products->getLatestProducts();

		$data['brand_id'] = $brand->brand_id;
		$data['brand_url'] = $brand->brand_url;
		$data['brand_photo_url'] = $brand->brand_photo_url;
		$data['brand_name'] = $brand->brand_name;
		$data['brand_description'] = $brand->brand_description;

		$data['controller_link'] = site_url('brands/'.$data['brand_url']);
		
		// ====== FOR RECENT ITEMS
		$data['top_recent_products'] = $this->model_products->getTopRecentProduct($data['brand_id']);

		$sessdata = array('kueenie_shop_more_page_url'=>"http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]");
		$this->session->set_userdata($sessdata);

		// FOR SORTING
		$sort_category_id = $this->uri->segment(3);

		if($sort_category_id=='all' || $sort_category_id==''){
			$data['all_products'] = $this->model_products->getAllProductsByBrand($data['brand_id'],'');
		}else{
			$data['all_products'] = $this->model_products->getAllProductsByBrand($data['brand_id'],$sort_category_id);
		}

		$this->load->view('view_brands', $data);
	} # End index




}

