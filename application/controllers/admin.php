<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct() {

		parent::__construct();
		$this->load->library('My_PHPMailer');
		$this->load->library('grocery_CRUD');
       	$this->load->library('image_CRUD');
		$this->load->model('model_customers');
		$this->load->model('model_products');
		$this->load->model('model_items');
		$this->load->model('model_sizes');

	} # End construct

	public function index() {

		$this->main_categories();
	} # End index

	public function main_categories(){
			$crud = new grocery_CRUD();

			$crud->set_theme('datatables');
			$crud->set_table('main_categories');
			$crud->set_subject('Main Categories');

			$output = $crud->render();
			$this->tableOutput($output);
	} # End categories

	public function sub_categories(){
			$crud = new grocery_CRUD();

			$crud->set_theme('datatables');
			$crud->set_table('sub_categories');
			$crud->set_subject('Sub-Categories');

			$crud->set_relation('main_categories_main_cat_id','main_categories','main_cat_name');

			$output = $crud->render();
			$this->tableOutput($output);
	} # End categories
	
	public function specific_categories(){
			$crud = new grocery_CRUD();

			$crud->set_theme('datatables');
			$crud->set_table('specific_categories');
			$crud->set_subject('Specific Categories');

			$crud->set_relation('sub_categories_sub_cat_id','sub_categories','sub_cat_name');

			$output = $crud->render();
			$this->tableOutput($output);
	} # End categories

	public function brands(){
			$crud = new grocery_CRUD();

			$crud->set_theme('datatables');
			$crud->set_table('brands');
			$crud->set_subject('Brands');

			$crud->set_field_upload('brand_photo_url','assets/img');

			if ($crud->getState() == 'add' || $crud->getState() == 'insert') {
                $crud->callback_add_field('brand_description',array($this,'brand_description_textarea'));
                $crud->callback_field('brand_sell_type',array($this,'brand_sell_type_callback')); 
            
            }else if ($crud->getState() == 'edit' || $crud->getState() == 'update') {
                $crud->callback_edit_field('brand_description',array($this,'brand_description_textarea')); 
                $crud->callback_field('brand_sell_type',array($this,'brand_sell_type_callback')); 

            }else if ($crud->getState() == 'read') {
            	
            }

			$output = $crud->render();
			$this->tableOutput($output);
	} # End brands

	function brand_description_textarea($value, $primary_key){
        return '<textarea name="brand_description" >'.$value.'</textarea>';
    }

    function brand_sell_type_callback($value = ''){
        $options = array('R' => 'Retail Only' , 'WR' => 'Wholesale and Retail');
        return form_dropdown('brand_sell_type', $options, $value);
    }

	public function sizes(){
			$crud = new grocery_CRUD();

			$crud->set_theme('datatables');
			$crud->set_table('sizes');
			$crud->set_subject('Sizes');

			$output = $crud->render();
			$this->tableOutput($output);
	} # End sizes






	public function products(){
			$crud = new grocery_CRUD();

			$crud->set_theme('datatables');
			$crud->set_table('products');
			$crud->set_subject('Products');

			$crud->unset_columns('prod_short_description','prod_description','prod_delivery_info');
			$crud->display_as('prod_name', 'Product')
				 ->display_as('prod_price_ret', 'Retail Price')
				 ->display_as('prod_short_description', 'Short Description')
				 ->display_as('prod_description', 'Long Description')
				 ->display_as('prod_delivery_info', 'Delivery Information')
				 ->display_as('categories_cat_id', 'Specific Category')
				 ->display_as('brands_brand_id', 'Brand Name')
				 ->display_as('prod_delivery_amount_free', 'Free Delivery Min Amount')
				 ->display_as('prod_days_return_free', 'Days for Free Return')
				 ->display_as('prod_cod_allowed', 'Cash On Delivery')
				 ;

			$crud->set_relation('categories_cat_id','specific_categories','spec_cat_name');
			$crud->set_relation('brands_brand_id','brands','brand_name');

			$crud->unset_columns('prod_delivery_amount_free','prod_days_return_free','prod_cod_allowed','prod_short_description','prod_description','prod_delivery_info');

			if ($crud->getState() == 'add' || $crud->getState() == 'insert') {
                $crud->callback_add_field('prod_description',array($this,'prod_description_textarea')); 
                $crud->callback_add_field('prod_delivery_info',array($this,'prod_delivery_info_textarea')); 
                $crud->callback_field('prod_cod_allowed',array($this,'prod_cod_allowed_callback'));
                $crud->callback_field('prod_record_status',array($this,'prod_record_status_callback'));
                $crud->unset_fields('prod_date_updated','prod_date_added');
            
            }else if ($crud->getState() == 'edit' || $crud->getState() == 'update') {
                $crud->callback_edit_field('prod_description',array($this,'prod_description_textarea')); 
                $crud->callback_edit_field('prod_delivery_info',array($this,'prod_delivery_info_textarea')); 
                $crud->callback_field('prod_cod_allowed',array($this,'prod_cod_allowed_callback'));
                $crud->callback_field('prod_record_status',array($this,'prod_record_status_callback'));
                $crud->unset_fields('prod_date_updated','prod_date_added');

            }else if ($crud->getState() == 'read') {
            	
            }

            $crud->callback_after_insert(array($this, 'date_added_callback'));
            $crud->callback_after_update(array($this, 'date_updated_callback'));

			$output = $crud->render();
			$this->tableOutput($output);
	} # End products

	function date_added_callback($post_array,$primary_key){
		date_default_timezone_set('Asia/Manila');
		$date_added = date('Y-m-d H:i:s');
        $this->model_products->setDateAdded($primary_key,$date_added);
            
        return true;
    }

    function date_updated_callback($post_array,$primary_key){
		date_default_timezone_set('Asia/Manila');
		$date_updated = date('Y-m-d H:i:s');
        $this->model_products->setDateUpdated($primary_key,$date_updated);
            
        return true;
    }

	function prod_cod_allowed_callback($value = ''){
        $options = array('Yes' => 'Yes' , 'No' => 'No');
        return form_dropdown('prod_cod_allowed', $options, $value);
    }

    function prod_record_status_callback($value = ''){
        $options = array('ACTIVE' => 'ACTIVE' , 'INACTIVE' => 'INACTIVE');
        return form_dropdown('prod_record_status', $options, $value);
    }

	function prod_description_textarea($value, $primary_key){
        return '<textarea name="prod_description" >'.$value.'</textarea>';
    }

    function prod_delivery_info_textarea($value, $primary_key){
        return '<textarea name="prod_delivery_info" >'.$value.'</textarea>';
    }

	public function colors(){
			$crud = new grocery_CRUD();

			$crud->set_theme('datatables');
			$crud->set_table('colors');
			$crud->set_subject('Colors');

			$crud->display_as('color_name', 'Product Color')
				 ->display_as('color_photo_url', 'Product Photo')
				 ->display_as('products_prod_id', 'Product Name')
				 ;

			$crud->set_field_upload('color_photo_url','assets/products');
			$crud->set_field_upload('color_photo_palette','assets/palette');
			$crud->set_relation('products_prod_id','products','prod_name');

            if ($crud->getState() == 'add' || $crud->getState() == 'insert') {
                $crud->set_relation_n_n('Sizes', 'items ', 'sizes', 'colors_color_id', 'sizes_size_id', 'size_name');
            
            }else if ($crud->getState() == 'edit' || $crud->getState() == 'update') {
                $crud->set_relation_n_n('Sizes', 'items ', 'sizes', 'colors_color_id', 'sizes_size_id', 'size_name');

            }else if ($crud->getState() == 'read') {

            }
            else{
            	$crud->set_relation_n_n('Sizes', 'items ', 'sizes', 'colors_color_id', 'sizes_size_id', 'size_name');
            }

			$output = $crud->render();
			$this->tableOutput($output);
	} # End colors
	

	public function items(){
			$crud = new grocery_CRUD();

			$crud->set_theme('datatables');
			$crud->set_table('items');
			$crud->set_subject('Items');

			$crud->display_as('item_stock', 'Stocks')
				 ->display_as('colors_color_id', 'Product Name and Color')
				 ->display_as('sizes_size_id', 'Size')
				 ;

			$crud->set_relation('sizes_size_id','sizes','size_name');
			$crud->unset_add();

			
			if ($crud->getState() == 'edit' || $crud->getState() == 'update') {
            	$crud->callback_edit_field('colors_color_id',array($this,'color_id_callback'));
            	$crud->callback_edit_field('sizes_size_id',array($this,'size_id_callback'));
            }else if ($crud->getState() == 'read') {
            	$crud->callback_field('colors_color_id',array($this,'color_id_callback'));
            	$crud->callback_field('sizes_size_id',array($this,'size_id_callback'));
            }
            else{
            	$crud->callback_column('colors_color_id',array($this,'color_id_callback'));
            }

			$output = $crud->render();
			$this->tableOutput($output);
	} # End items

	public function color_id_callback($value, $row){
		$product_name_and_color = $this->model_products->getProductNameAndColor($value);
		foreach ($product_name_and_color as $p) {
			return $p['prod_name'].' - '.$p['color_name'];
		}
        
    } # End color_id_callback

    public function size_id_callback($value, $row){
		$size_name = $this->model_sizes->getSizeName($value);
		foreach ($size_name as $p) {
			return $p['size_name'];
		}
    } # End size_id_callback

    public function content_management(){
    		$crud = new grocery_CRUD();

			$crud->set_theme('datatables');
			$crud->set_table('cms');
			$crud->set_subject('Content Management');
			$crud->unset_add();
			$crud->unset_delete();

			$crud->set_field_upload('cms_photo_url','assets/cms');

			$crud->unset_columns('cms_date_updated');
			if ($crud->getState() == 'edit' || $crud->getState() == 'update') {
            	$crud->unset_edit_fields('cms_title','cms_date_updated');

            }

			$output = $crud->render();
			$this->tableOutput($output);	
    } # End content_management

    public function articles(){
    		$crud = new grocery_CRUD();

			$crud->set_theme('datatables');
			$crud->set_table('articles');
			$crud->set_subject('Articles');
			$crud->unset_add();
			$crud->unset_delete();

			$crud->unset_columns('article_name','article_date_updated');
			if ($crud->getState() == 'edit' || $crud->getState() == 'update') {
            	$crud->unset_edit_fields('article_name','article_date_updated');
            	$crud->callback_edit_field('article_content',array($this,'article_content_textarea'));

            }

			$output = $crud->render();
			$this->tableOutput($output);	
    } # End articles
     
	function article_content_textarea($value, $primary_key){
        return '<textarea name="article_content" >'.$value.'</textarea>';
    }

    public function featurette(){
    		$crud = new grocery_CRUD();

			$crud->set_theme('datatables');
			$crud->set_table('featurette');
			$crud->set_subject('Featurette');
			$crud->unset_add();
			$crud->unset_delete();

			$crud->unset_columns('article_name');
			$crud->set_field_upload('fea_photo_url','assets/featurette');

			if ($crud->getState() == 'edit' || $crud->getState() == 'update') {
            	$crud->unset_edit_fields('fea_name');
            	$crud->callback_edit_field('fea_content',array($this,'fea_content_textarea'));

            }

			$output = $crud->render();
			$this->tableOutput($output);	
    } # End featurette

    function fea_content_textarea($value, $primary_key){
        return '<textarea name="fea_content" >'.$value.'</textarea>';
    }

    public function payment(){
    		$crud = new grocery_CRUD();

			$crud->set_theme('datatables');
			$crud->set_table('payment_method');
			$crud->set_subject('Payment Method');
			$crud->unset_add();
			$crud->unset_delete();

			// $crud->unset_columns('article_name');

			if ($crud->getState() == 'edit' || $crud->getState() == 'update') {
            	$crud->unset_edit_fields('payment_name');

            }

			$output = $crud->render();
			$this->tableOutput($output);	
    } # End payment

    public function bank(){
    		$crud = new grocery_CRUD();

			$crud->set_theme('datatables');
			$crud->set_table('banks');
			$crud->set_subject('Bank');


			$output = $crud->render();
			$this->tableOutput($output);	
    } # End payment

	// TABLE OUTPUT FOR GROCERY CRUD ======================================================
	public function tableOutput($output = null)
	{
		$this->load->view('admin/view_admin_tables',$output);
	}

	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */



















