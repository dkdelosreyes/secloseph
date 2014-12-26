<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Category extends CI_Controller {

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

		$sort_category_id = $this->uri->segment(3);

		# Declare data
		$data['specific_categories'] = $this->model_specific_categories->getSpecificCategories();
		$data['latest_products'] = $this->model_products->getLatestProducts();

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

			if($sort_category_id=='all' || $sort_category_id==''){
				$data['all_products'] = $this->model_products->getNewArrivals('');
			}else{
				$data['all_products'] = $this->model_products->getNewArrivals($sort_category_id);
			}
			$data['controller_link'] = site_url('category/newarrivals');

		}else if($id == 'women' || $id == 'men'){
			$data['brand'] = $id == 'women'? "Women" : "Men";
			$data['controller_link'] = $id == 'women'? site_url('category/women') : site_url('category/men');

			$data['page_title'] = $data['brand'];
			$data['top_recent_products'] = $this->model_products->getTopRecentProductByCategory($data['brand']);

			if($sort_category_id=='all' || $sort_category_id==''){
				$data['all_products'] = $this->model_products->getAllProductsByCategory($data['brand'],'');
			}else{
				$data['all_products'] = $this->model_products->getAllProductsByCategory($data['brand'],$sort_category_id);
			}

			
		}

		$data['brand_name'] = $data['brand'];


		$this->load->view('view_brands', $data);
	} # End index




}

