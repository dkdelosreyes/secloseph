<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Orderadmin extends CI_Controller {

	public function __construct() {

		parent::__construct();
		$this->load->library('My_PHPMailer');
		$this->load->library('grocery_CRUD');
       	$this->load->library('image_CRUD');
		$this->load->model('model_customers');
		$this->load->model('model_products');
		$this->load->model('model_items');
		$this->load->model('model_sizes');
		$this->load->model('model_orders');
		$this->load->model('model_order_details');
		$this->load->model('model_confirm_payments');

	} # End construct

	public function index() {

		$this->items();
	} # End index

	public function orders(){
		#DATA
		$data['waiting_order_count'] = $this->model_orders->getAllWaitingOrdersCount();
		$data['page_title'] = "Secret Closet | Orders";

		$data['orders'] = $this->model_orders->getAllOrders();
		
		$this->load->view('orderadmin/view_orderadmin_orders',$data);
	} # End orders

	public function view_order(){
		#DATA
		$data['waiting_order_count'] = $this->model_orders->getAllWaitingOrdersCount();
		$data['page_title'] = "Secret Closet | Order Details";

		$order_id = $this->uri->segment(3);

		$data['orders_details'] = $this->model_order_details->getAllOrderDetails($order_id);
		$data['orders'] = $this->model_orders->getOrderAddressAndTotal($order_id);
		$data['customer_info'] = $this->model_customers->getUserInfoByOrderId($order_id);
		$data['confirmed_payments'] = $this->model_confirm_payments->getConfirmedPaymentsByOrderId($order_id);
		$data['order_id'] = $order_id;
		
		$this->load->view('orderadmin/view_orderadmin_each_order',$data);
	} # End view_order

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

	public function approve_order(){
		$order_id = $this->input->post("orderId");
		$status = "Order Approved";
		$this->model_orders->updateOrderStatus($order_id,$status);

		//some stocks deduction here
		$product = $this->input->post("product");
		foreach ( $product as $p) {
			$or_det_id = $p;
			$data = $this->model_order_details->getQuantityAndItemID($or_det_id);
			foreach ($data as $d) {
				$this->model_items->updateStocks($d->items_item_id, $d->or_det_quantity);
			}
		}

		$data['status'] = $status;
		$data['err'] = 1;

		echo json_encode($data);
    } # End approve_order

    public function reject_order(){
		$order_id = $this->input->post("orderId");
		$status = "Order Closed";
		$this->model_orders->updateOrderStatus($order_id,$status);

		$data['status'] = $status;

		echo json_encode($data);
    } # End approve_order







	// TABLE OUTPUT FOR GROCERY CRUD ======================================================
	public function tableOutput($output = null)
	{
		#DATA
		$output->waiting_order_count = $this->model_orders->getAllWaitingOrdersCount();
		$output->page_title = "Secret Closet | Stocks";

		$this->load->view('orderadmin/view_orderadmin_tables',$output);
	}

	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */



















