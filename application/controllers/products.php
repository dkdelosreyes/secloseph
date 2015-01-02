<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Products extends CI_Controller {
	
	public function __construct() {
		
		parent::__construct();

		$this->load->model('model_products');
		$this->load->model('model_brands');
		$this->load->model('model_items');
		$this->load->model('model_shippings');
		$this->load->model('model_orders');
		$this->load->model('model_customers');
		$this->load->model('model_order_details');
		$this->load->model('model_specific_categories');
		$this->load->model('model_banks');
		$this->load->model('model_confirm_payments');
		$this->load->model('model_images');
		
	} # End construct

	public function index() {

	} # End index

	public function allProducts() {

		# Declare data
		$data['page_title'] = 'Secret Closet | Products';
		$data['specific_categories'] = $this->model_specific_categories->getSpecificCategories();
		$data['latest_products'] = $this->model_products->getLatestProducts();

		$brand_id = $this->uri->segment(3);

		$data['all_products'] = $this->model_products->getAllProductsByBrand($brand_id,'','');
			
		$this->load->view('view_all_products', $data);
	} # End allProducts

	public function viewProduct($id) {
		# Declare data
		$data['specific_categories'] = $this->model_specific_categories->getSpecificCategories();
		$data['latest_products'] = $this->model_products->getLatestProducts();

		$brand = $this->model_products->getBrandOfProduct($id);

		$data['product'] = $this->model_products->getProduct($id);
		$data['images'] = $this->model_images->getProductColorImages($id);
		$data['you_may_also_like_products'] = $this->model_products->getAllProductsByBrand($data['product'][0]['brands_brand_id'],'','');
		
		# YOU MAY ALSO LIKE - PREVIEW PHOTO
		if(!empty($data['you_may_also_like_products'])){
            $a = 0;
            foreach ($data['you_may_also_like_products'] as $v) {
                $like_preview_photo[$a++] = $this->model_images->getProductColorPreviewPhoto($v->color_id);
            }
            $data['like_preview_photo'] = $like_preview_photo;
        }

        # PRODUCT COLOR
		foreach ($data['product'] as $p) {
			$data['color'] = $this->model_products->getProductByColor($p['prod_id']);
			$product_name  = $p['prod_name'];
		}

		$data['brand']        = $brand;
		$data['product_name'] = $product_name;
		$data['page_title']   = $brand->brand_name . ' | ' . $product_name;
		
		$data['sizes']        = $this->model_items->getItemsByColor($id);
			
		$this->load->view('view_product', $data);
	} # End viewProduct

	public function addToCart(){
		//FOR RETAIL
			$this->form_validation->set_rules('size-retail', 'Size', 'required');
			$this->form_validation->set_rules('quantity-retail', 'Quantity', 'required|callback_within_stock_available');

			if ($this->form_validation->run() == FALSE){
				$data['stat'] = 0;
				$data['msgErrorSizeRetail'] = strip_tags(form_error('size-retail'));
				$data['msgErrorQuantityRetail'] = strip_tags(form_error('quantity-retail'));
                echo json_encode($data);
			}else{
				$size = $this->input->post('size-retail');
				$quantity = $this->input->post('quantity-retail');
				$itemId = $this->input->post('itemId');
				$itemPrice = $this->input->post('itemPrice');
				$itemName = $this->input->post('itemName');
				$itemColor = $this->input->post('itemColor');
				$deliveryInfo = $this->input->post('deliveryInfo');

				$product = $this->model_products->getProductById($itemId);

				//get the discount percentage
				
				$newItemPrice = 0;
				$discountPercentage = 0;
				if ($quantity >= 12) {
					$wholenumber = floor($quantity/12);

						if($wholenumber<=6){ //for 12 to 72 pcs(5% - 30%)
							$discountPercentage = $wholenumber * 5;
						}else if($wholenumber>6){ //for 73 and above pcs (30%)
							$discountPercentage = 30;
						}
						
						$discount = $discountPercentage * 0.01;
						$totalDiscount = $itemPrice * $discount;
						$newItemPrice = $itemPrice - $totalDiscount;
				}

				//saving area...
				$data = array(
					'id'               => $itemId,
					'qty'              => $quantity,
					'price'            => $itemPrice,
					'name'             => $itemName,
					'image'            => $product->color_photo_url,
					'brand_name'       => $product->brand_name,
					'discount_price'   => $newItemPrice,
					'discount_percent' => $discountPercentage,
					'delivery_info'	   => $deliveryInfo,
					'options'          => array('Size' => $size, 'Color' => $itemColor)
	            );
				$this->cart->insert($data);

				$dummyTotal = 0;

				foreach ($this->cart->contents() as $items):
					if ($items['discount_price'] > 0) 
						$dummyTotal += $items['discount_price'] * $items['qty'];
					else
						$dummyTotal += $items['price'] * $items['qty'];
				endforeach;

				$this->session->set_userdata('new_total', $dummyTotal);
				
				$data['stat'] = 1;

				//$this->cart->destroy();

				echo json_encode($data);
				
			}
	} # End addToCart

	public function within_stock_available($qty)
	{
		$itemId = $this->input->post('itemId');

		if($itemId != ""){
			$stocks = $this->model_products->getStocks($itemId);
			foreach ($stocks as $r) {
				$result_stocks = $r['item_stock'];
			}

			if ($result_stocks < $qty){
				$this->form_validation->set_message('within_stock_available', 'Not enough stocks for the quantity selected.');
				return FALSE;
			}
			else{
				return TRUE;
			}
		}
	} # End within_stock_available


	public function cart() {
		# Declare data
		$data['page_title'] = 'Cart';
		$data['specific_categories'] = $this->model_specific_categories->getSpecificCategories();
		$data['latest_products'] = $this->model_products->getLatestProducts();

		$this->load->view('view_cart', $data);
	} # End cart

	public function updateCart(){
			$i = 1;
			foreach ($this->cart->contents() as $items){
					$itemId = $this->input->post($i.'itemid');
					$quantity = $this->input->post($i.'qty');
					$itemPrice = $this->input->post($i.'itemprice');

					$size = $this->input->post($i.'itemsize');
					$itemName = $this->input->post($i.'itemname');
					$itemColor = $this->input->post($i.'itemcolor');
					$retailPrice = $this->input->post($i.'retailprice');

					if($quantity<12){
						// REMOVE ITEM FROM CART======================
						$data = array(
			               'rowid' => $items['rowid'],
			               'qty'   => 0
			            );
			            $this->cart->update($data);

			            $data = array(
			               'id'      => $itemId,
			               'qty'     => $quantity,
			               'price'   => $retailPrice,
			               'name'    => $itemName,
			               'options' => array('Size' => $size, 'Color' => $itemColor)
			            );
						$this->cart->insert($data);

					}else{
						// REMOVE ITEM FROM CART======================
						$data = array(
			               'rowid' => $items['rowid'],
			               'qty'   => 0
			            );
			            $this->cart->update($data);

			            // RE-INSERT ITEM=============================
						//get the discount percentage
						$wholenumber = floor($quantity/12);
						if($wholenumber<=6){ //for 12 to 72 pcs(5% - 30%)
							$discountPercentage = $wholenumber * 5;
						}else if($wholenumber>6){ //for 73 and above pcs (30%)
							$discountPercentage = 30;
						}
						$discount = $discountPercentage * 0.01;
						$totalDiscount = $itemPrice * $discount;
						$newItemPrice = $itemPrice - $totalDiscount;

						//saving area...
						$data = array(
			               'id'      => $itemId,
			               'qty'     => $quantity,
			               'price'   => $newItemPrice,
			               'name'    => $itemName,
			               'options' => array('Size' => $size, 'Color' => $itemColor, 'Retail Price' => $retailPrice, 'Discount' => $discountPercentage."%")
			            );
						$this->cart->insert($data);
					}
			
				$i++;
			}
			$this->load->view('view_cart', $data);
			
	} # End updateCart
	
	public function checkout() {
		# Declare data
		$data['page_title'] = 'Secret Closet | Check Out';
		$data['specific_categories'] = $this->model_specific_categories->getSpecificCategories();
		$data['latest_products'] = $this->model_products->getLatestProducts();

		# initialization
		$data['isAddressVisible'] = 'no';
		$data['isRegisterFormVisible'] = 'no'; //--- if [yes] - visible to unregistered users
		$data['isBillAddressAdderToggable'] = 'no'; // --- makes the 'Add a New Billing Address' non toggable

		$customer_id = $this->session->userdata('kueenie_cust_id');

		if($customer_id){ /** IF A USER IS LOGGED IN*/
			$data['shippingAddress'] = $this->model_shippings->getShippingAddress($customer_id);

			if(!$data['shippingAddress']){ //---there's no address yet
				$data['isAddressVisible'] = 'yes';
			}else{
				$data['isAddressVisible'] = 'no';
				$data['isBillAddressAdderToggable'] = 'yes';
			}

			$this->load->view('view_checkout', $data);

		}else if($this->session->userdata('checkout_user_type') == 'guest'){ /** IF A USER IS A GUEST*/
			$data['isAddressVisible'] = 'yes';
			$data['isRegisterFormVisible'] = 'yes';
			$this->load->view('view_checkout', $data);	

		}else if($this->session->userdata('checkout_user_type') == 'fb-user'){ /** IF A USER IS A GUEST-FB-USER*/
			$data['isAddressVisible'] = 'yes';
			$data['isRegisterFormVisible'] = 'yes';
			$this->load->view('view_checkout', $data);	

		}else{ /** USER IS NOT LOGGED IN */
			$this->load->view('view_login_checkout', $data);
		}

	} # End checkout

	public function checkout_new_customer() {
		if($this->uri->segment(2) == 'fblogin'){ /** NOT YET WORKING*/
			$this->session->set_userdata('checkout_user_type','fb-user');
			$this->checkout();
		}else{
			$this->session->set_userdata('checkout_user_type','guest');
			$this->checkout();	
		}

	} # End checkout_new_customer

	
	public function order() {

		$customer_id = $this->session->userdata('kueenie_cust_id');
		$new_user_type = $this->session->userdata('checkout_user_type');
		$shippingAddressCheck = $this->input->post('shippingAddressCheck')!=''?$this->input->post('shippingAddressCheck'):'';

		$registerState = 'hidden';
		$billingAddressState = $this->input->post('billingAddressState');
		$shippingAddressState = $this->input->post('shippingAddressState');

		//-- VALUES OF THESE WILL COME FROM ADDRESS ID IN RADIO BUTTON
		$billingAddress = '';
		$shippingAddress = '';

		$total = $this->session->userdata('new_total');//$this->cart->total();
		$status = 'Pending Approval';
		$paymentMethod = $this->input->post('paymentMethod');

		$addr_fname = ''; $addr_lname = ''; $addr_contact = ''; $addr_num = ''; $addr_prov = ''; $addr_mun = ''; $addr_brgy = ''; $addr_landmark = ''; $addr_instruc = '';
		$addr_fname_ship = ''; $addr_lname_ship = ''; $addr_contact_ship = ''; $addr_num_ship = ''; $addr_prov_ship = ''; $addr_mun_ship = ''; $addr_brgy_ship = ''; $addr_landmark_ship = ''; $addr_instruc_ship = '';

		# ===== APPLYING FORM VALIDATION
	if($paymentMethod != 'paypal'){
		if($customer_id){ /** IF A USER IS LOGGED IN*/
			/**TO CHECK FOR RADIO BUTTON ADDRESS OR FIELD ADDRESS TO BE USED*/
			if($billingAddressState == 'hidden'){ /**GO FOR SELECTED RADIO ADDRESS*/
				$this->form_validation->set_rules('billingAddress', 'Billing Address', 'trim|required');
				$billingAddress = $this->input->post('billingAddress');
				//fetch address credentials for bill
				//insert to shippings table

			}else if($billingAddressState == 'visible'){ /**GO FOR INPUTED ADDRESS*/
				$this->form_validation->set_rules('addr_fname', 'First name', 'trim|required|callback_name_check|htmlspecialchars|xss_clean');
        		$this->form_validation->set_rules('addr_lname', 'Last name', 'trim|required|callback_name_check|htmlspecialchars|xss_clean');
        		$this->form_validation->set_rules('addr_contact', 'Contact Number', 'trim|required|htmlspecialchars|xss_clean');
        		$this->form_validation->set_rules('addr_num', 'Street No., Street Name, House/Lot#, Building Name', 'trim|required|htmlspecialchars|xss_clean');
		        $this->form_validation->set_rules('addr_prov', 'Province', 'trim|required|htmlspecialchars|xss_clean');
		        $this->form_validation->set_rules('addr_mun', 'Municipality', 'trim|required|htmlspecialchars|xss_clean');
		        $this->form_validation->set_rules('addr_brgy', 'Baranggay', 'trim|required|htmlspecialchars|xss_clean');
		        $this->form_validation->set_rules('addr_landmark', 'Landmark', 'trim|required|htmlspecialchars|xss_clean');
		        //insert to shippings  table
			}

			if($shippingAddressCheck != 'same address'){ /**FOR checkbox 'Deliver to the same address'*/
				if($shippingAddressState == 'hidden'){ /**GO FOR SELECTED RADIO ADDRESS*/
					$shippingAddress = $this->input->post('shippingAddress');
					//fetch address credentials for ship
					//insert to shippings table

				}else if($shippingAddressState == 'visible'){ /**GO FOR INPUTED ADDRESS*/
					$this->form_validation->set_rules('addr_fname_ship', 'First name', 'trim|required|callback_name_check|htmlspecialchars|xss_clean');
	        		$this->form_validation->set_rules('addr_lname_ship', 'Last name', 'trim|required|callback_name_check|htmlspecialchars|xss_clean');
	        		$this->form_validation->set_rules('addr_contact_ship', 'Contact Number', 'trim|required|htmlspecialchars|xss_clean');
        			$this->form_validation->set_rules('addr_num_ship', 'Street No., Street Name, House/Lot#, Building Name', 'trim|required|htmlspecialchars|xss_clean');
				    $this->form_validation->set_rules('addr_prov_ship', 'Province', 'trim|required|htmlspecialchars|xss_clean');
				    $this->form_validation->set_rules('addr_mun_ship', 'Municipality', 'trim|required|htmlspecialchars|xss_clean');
				    $this->form_validation->set_rules('addr_brgy_ship', 'Baranggay', 'trim|required|htmlspecialchars|xss_clean');
				    $this->form_validation->set_rules('addr_landmark_ship', 'Landmark', 'trim|required|htmlspecialchars|xss_clean');
				    //insert to shippings  table
				}
			}else{
				$shippingAddress = $this->input->post('billingAddress');/**SAME AS BILLING ADDRESS WILL BE USED*/
				//fetch address credentials same as bill
				//insert to shippings table
			}

		}else if($new_user_type == 'guest' || $new_user_type == 'fb-user'){ /** IF A USER IS A GUEST*/
			$this->form_validation->set_rules('fname', 'First name', 'trim|required|callback_name_check|htmlspecialchars|xss_clean');
	        $this->form_validation->set_rules('lname', 'Last name', 'trim|required|callback_name_check|htmlspecialchars|xss_clean');
	        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[customers.cust_email]|htmlspecialchars|xss_clean');
	        $this->form_validation->set_rules('pass', 'Password', 'trim|required|min_length[6]|xss_clean|md5');
	        $this->form_validation->set_rules('conPass', 'Password', 'trim|required|matches[pass]|xss_clean|md5');
	        //insert to customers table
	        //log it as user

	        $this->form_validation->set_rules('addr_fname', 'First name', 'trim|required|callback_name_check|htmlspecialchars|xss_clean');
        	$this->form_validation->set_rules('addr_lname', 'Last name', 'trim|required|callback_name_check|htmlspecialchars|xss_clean');
        	$this->form_validation->set_rules('addr_contact', 'Contact Number', 'trim|required|htmlspecialchars|xss_clean');
        	$this->form_validation->set_rules('addr_num', 'Street No., Street Name, House/Lot#, Building Name', 'trim|required|htmlspecialchars|xss_clean');
	        $this->form_validation->set_rules('addr_prov', 'Province', 'trim|required|htmlspecialchars|xss_clean');
	        $this->form_validation->set_rules('addr_mun', 'Municipality', 'trim|required|htmlspecialchars|xss_clean');
	        $this->form_validation->set_rules('addr_brgy', 'Baranggay', 'trim|required|htmlspecialchars|xss_clean');
	        $this->form_validation->set_rules('addr_landmark', 'Landmark', 'trim|required|htmlspecialchars|xss_clean');
	        //insert to shippings  table

	        if($shippingAddressCheck != 'same address'){
	        	$this->form_validation->set_rules('addr_fname_ship', 'First name', 'trim|required|callback_name_check|htmlspecialchars|xss_clean');
	        	$this->form_validation->set_rules('addr_lname_ship', 'Last name', 'trim|required|callback_name_check|htmlspecialchars|xss_clean');
	        	$this->form_validation->set_rules('addr_contact_ship', 'Contact Number', 'trim|required|htmlspecialchars|xss_clean');
        		$this->form_validation->set_rules('addr_num_ship', 'Street No., Street Name, House/Lot#, Building Name', 'trim|required|htmlspecialchars|xss_clean');
		        $this->form_validation->set_rules('addr_prov_ship', 'Province', 'trim|required|htmlspecialchars|xss_clean');
		        $this->form_validation->set_rules('addr_mun_ship', 'Municipality', 'trim|required|htmlspecialchars|xss_clean');
		        $this->form_validation->set_rules('addr_brgy_ship', 'Baranggay', 'trim|required|htmlspecialchars|xss_clean');
		        $this->form_validation->set_rules('addr_landmark_ship', 'Landmark', 'trim|required|htmlspecialchars|xss_clean');
		        //insert to shippings  table	
	        }

	        $this->form_validation->set_message('is_unique', 'This email address exists');
	        $this->form_validation->set_message('matches', 'Did not match the above password');
	        $this->form_validation->set_message('name_check', 'Names should only contain letters and spaces');

	        $registerState = 'visible';

		}	


		# ===== FINAL JUDGEMENT FOR VALDATIONS
		if ($this->form_validation->run() == FALSE){
			$data['stat'] = 0;
			if($registerState == 'visible'){
				$data['msgErrorFname'] = strip_tags(form_error('fname'));
				$data['msgErrorLname'] = strip_tags(form_error('lname'));
				$data['msgErrorEmail'] = strip_tags(form_error('email'));
				$data['msgErrorPass'] = strip_tags(form_error('pass'));
				$data['msgErrorConPass'] = strip_tags(form_error('conPass'));
			}

			if($billingAddressState == 'visible'){
				$data['msgErrorAddrFname'] = strip_tags(form_error('addr_fname'));
				$data['msgErrorAddrLname'] = strip_tags(form_error('addr_lname'));
				$data['msgErrorAddrContact'] = strip_tags(form_error('addr_contact'));
				$data['msgErrorAddrNum'] = strip_tags(form_error('addr_num'));
				$data['msgErrorAddrProv'] = strip_tags(form_error('addr_prov'));
				$data['msgErrorAddrMun'] = strip_tags(form_error('addr_mun'));
				$data['msgErrorAddrBrgy'] = strip_tags(form_error('addr_brgy'));
				$data['msgErrorAddrLandmark'] = strip_tags(form_error('addr_landmark'));
			}

			if($shippingAddressCheck != 'same address'){
				if($shippingAddressState == 'visible'){
					$data['msgErrorAddrFnameShip'] = strip_tags(form_error('addr_fname_ship'));
					$data['msgErrorAddrLnameShip'] = strip_tags(form_error('addr_lname_ship'));
					$data['msgErrorAddrContactShip'] = strip_tags(form_error('addr_contact_ship'));
					$data['msgErrorAddrNumShip'] = strip_tags(form_error('addr_num_ship'));
					$data['msgErrorAddrProvShip'] = strip_tags(form_error('addr_prov_ship'));
					$data['msgErrorAddrMunShip'] = strip_tags(form_error('addr_mun_ship'));
					$data['msgErrorAddrBrgyShip'] = strip_tags(form_error('addr_brgy_ship'));
					$data['msgErrorAddrLandmarkShip'] = strip_tags(form_error('addr_landmark_ship'));
				}
			}
		    echo json_encode($data);

		}else{

			if($customer_id){ /** IF A USER IS LOGGED IN*/
				/**TO CHECK FOR RADIO BUTTON ADDRESS OR FIELD ADDRESS TO BE USED*/
				if($billingAddressState == 'hidden'){ /**GO FOR SELECTED RADIO ADDRESS*/
					//fetch address credentials for bill
					$chosen_billing_address_info = $this->model_shippings->getChosenShippingAddress($billingAddress);
					foreach ($chosen_billing_address_info as $c) {
						$addr_fname = $c->ship_fname;
						$addr_lname = $c->ship_lname;
						$addr_contact = $c->ship_contact;
      					$addr_num = $c->ship_address;
						$addr_prov = $c->ship_address_province;
						$addr_mun = $c->ship_address_municipal;
						$addr_brgy = $c->ship_address_baranggay;
						$addr_landmark = $c->ship_address_landmark;
						$addr_instruc = $c->ship_instruction;
					}

				}else if($billingAddressState == 'visible'){ /**GO FOR INPUTED ADDRESS*/
			        $addr_fname = $this->input->post('addr_fname');
					$addr_lname = $this->input->post('addr_lname');
					$addr_contact = $this->input->post('addr_contact');
					$addr_num = $this->input->post('addr_num');
					$addr_prov = $this->input->post('addr_prov');
					$addr_mun = $this->input->post('addr_mun');
					$addr_brgy = $this->input->post('addr_brgy');
					$addr_landmark = $this->input->post('addr_landmark');
					$addr_instruc = $this->input->post('addr_instruc');
				}

				if($shippingAddressCheck != 'same address'){ /**--unchecked - FOR checkbox 'Deliver to the same address'*/
					if($shippingAddressState == 'hidden'){ /**GO FOR SELECTED RADIO ADDRESS*/
						//fetch address credentials for ship
						$chosen_shipping_address_info = $this->model_shippings->getChosenShippingAddress($shippingAddress);
						foreach ($chosen_shipping_address_info as $c) {
							$addr_fname_ship = $c->ship_fname;
							$addr_lname_ship = $c->ship_lname;
							$addr_contact_ship = $c->ship_contact;
	      					$addr_num_ship = $c->ship_address;
							$addr_prov_ship = $c->ship_address_province;
							$addr_mun_ship = $c->ship_address_municipal;
							$addr_brgy_ship = $c->ship_address_baranggay;
							$addr_landmark_ship = $c->ship_address_landmark;
							$addr_instruc_ship = $c->ship_instruction;
						}

					}else if($shippingAddressState == 'visible'){ /**GO FOR INPUTED ADDRESS*/
					    $addr_fname_ship = $this->input->post('addr_fname_ship');
						$addr_lname_ship = $this->input->post('addr_lname_ship');
						$addr_contact_ship = $this->input->post('addr_contact_ship');
						$addr_num_ship = $this->input->post('addr_num_ship');
						$addr_prov_ship = $this->input->post('addr_prov_ship');
						$addr_mun_ship = $this->input->post('addr_mun_ship');
						$addr_brgy_ship = $this->input->post('addr_brgy_ship');
						$addr_landmark_ship = $this->input->post('addr_landmark_ship');
						$addr_instruc_ship = $this->input->post('addr_instruc_ship');
					}
				}else{
					//fetch address credentials same as bill
					$addr_fname_ship = $addr_fname;
					$addr_lname_ship = $addr_lname;
					$addr_contact_ship = $addr_contact;
	      			$addr_num_ship = $addr_num;
					$addr_prov_ship = $addr_prov;
					$addr_mun_ship = $addr_mun;
					$addr_brgy_ship = $addr_brgy;
					$addr_landmark_ship = $addr_landmark;
					$addr_instruc_ship = $addr_instruc;
				}




			}else if($new_user_type == 'guest' || $new_user_type == 'fb-user'){ /** IF A USER IS A GUEST*/
				$fname = $this->input->post('fname');
				$lname = $this->input->post('lname');
				$gender = $this->input->post('gender');
				$pass = $this->input->post('pass');
				$email = $this->input->post('email');

		        //---insert to customers table
		        $this->model_customers->insertUser($fname, $lname, $gender, $pass, $email);

		        //---log it as user
		        $user = $this->model_customers->getUserInfo($email, $pass);
				foreach ($user as $r) {
					$cust_id = $r['cust_id'];$cust_fname = $r['cust_fname'];$cust_lname = $r['cust_lname'];
				}
		        $sessdata = array('kueenie_cust_id'=>$cust_id,'kueenie_cust_fname'=>$cust_fname,'kueenie_cust_lname'=>$cust_lname);
				$this->session->set_userdata($sessdata);

		        $addr_fname = $this->input->post('addr_fname');
				$addr_lname = $this->input->post('addr_lname');
				$addr_contact = $this->input->post('addr_contact');
				$addr_num = $this->input->post('addr_num');
				$addr_prov = $this->input->post('addr_prov');
				$addr_mun = $this->input->post('addr_mun');
				$addr_brgy = $this->input->post('addr_brgy');
				$addr_landmark = $this->input->post('addr_landmark');
				$addr_instruc = $this->input->post('addr_instruc');

		        if($shippingAddressCheck != 'same address'){
			        $addr_fname_ship = $this->input->post('addr_fname_ship');
					$addr_lname_ship = $this->input->post('addr_lname_ship');
					$addr_contact_ship = $this->input->post('addr_contact_ship');
					$addr_num_ship = $this->input->post('addr_num_ship');
					$addr_prov_ship = $this->input->post('addr_prov_ship');
					$addr_mun_ship = $this->input->post('addr_mun_ship');
					$addr_brgy_ship = $this->input->post('addr_brgy_ship');
					$addr_landmark_ship = $this->input->post('addr_landmark_ship');
					$addr_instruc_ship = $this->input->post('addr_instruc_ship');
		        }else{
					//fetch address credentials same as bill
					$addr_fname_ship = $addr_fname;
					$addr_lname_ship = $addr_lname;
					$addr_contact_ship = $addr_contact;
	      			$addr_num_ship = $addr_num;
					$addr_prov_ship = $addr_prov;
					$addr_mun_ship = $addr_mun;
					$addr_brgy_ship = $addr_brgy;
					$addr_landmark_ship = $addr_landmark;
					$addr_instruc_ship = $addr_instruc;
				}

			}
		}
	}

			# ===================== SAVING AREA
			date_default_timezone_set('Asia/Manila');
			$date_checkout = date('Y-m-d H:i:s');
			$startDate = time();
			$date_expired = date('Y-m-d H:i:s', strtotime('+1 day', $startDate));
			$order_id = date("Y").random_string('numeric', 5);

			//...save values to database 
			$this->model_orders->insertOrder(
					$order_id,
					$date_checkout, $date_expired,
					$total, $status, $paymentMethod, $this->session->userdata('kueenie_cust_id'),
					$addr_fname, $addr_lname, $addr_contact, $addr_num, $addr_prov, $addr_mun, $addr_brgy, $addr_landmark, $addr_instruc,
					$addr_fname_ship, $addr_lname_ship, $addr_contact_ship, $addr_num_ship, $addr_prov_ship, $addr_mun_ship, $addr_brgy_ship, $addr_landmark_ship, $addr_instruc_ship);

			//..loop through cart and insert to order_details
			foreach ($this->cart->contents() as $items):
				$item_price = $items['discount_price'] > 0 ? $items['discount_price'] : $items['price'];
				$this->model_order_details->insertOrderItem(
					$items['qty'], $item_price, 
					$items['options']['Size'], $items['options']['Color'],
					$order_id, $items['id']);
				
			endforeach;
			

			if($paymentMethod != 'paypal'){
				$this->cart->destroy();
				$this->session->unset_userdata('checkout_user_type');
				$this->session->set_userdata('new_total', '0.00');

				// $ret = $this->sendToEmail($email,$fname,$lname, $gender,$pass);
				// if($ret == true)
							echo json_encode(array('stat' => 1,'msg' => 'Registered Successfully', 'order_id' => $order_id));
				// else
				// 	echo json_encode(array('stat'=>2, 'msg' => 'Failed to Register', 'errorMail' => $ret));
			
			}else{
				$config['business']             = 'diannekatherinedelosreyes-facilitator@gmail.com'; //Your PayPal account
				$config['cpp_header_image']     = base_url('assets/img/secretcloset-paypal.png'); //Image header url [750 pixels wide by 90 pixels high]
				$config['return']               = base_url('products/success_payment');
				$config['production']           = FALSE; //Its false by default and will use sandbox
				$config["invoice"]              = $order_id; //The invoice id
				$config["currency_code"]		= 'PHP';
				$config["lc"]					= 'PH';
				$config["cpp_cart_border_color"] = 'ffffff';
				$config["no_note"]				= 0; //[0,1] 0 show, 1 hide

			
				$this->load->library('paypal',$config);

				foreach ($this->cart->contents() as $items){
					$item_price = $items['discount_price'] > 0 ? $items['discount_price'] : $items['price'];
					$this->paypal->add( $items['name'], $item_price, $items['qty']);
				}

				// $this->cart->destroy();
				// $this->session->unset_userdata('checkout_user_type');
				// $this->session->set_userdata('new_total', '0.00');

				$vars =  http_build_query($this->paypal->config);

		        if($this->paypal->config['production'] == TRUE){
		            echo $this->paypal->production_url.$vars;
		        }else{
		            echo $this->paypal->sandbox_url.$vars;
		        }
			}
		

	} # End order

	public function name_check($str)
	{
		return ( ! preg_match("/^([a-zA-Z ])+$/i", $str)) ? FALSE : TRUE;
	} # End name_check

	public function sendToEmail($recipient,$fname,$lname, $gender,$pass){

		//FOR PHP MAILER
					$senderName = "Kueenie"; //Enter the sender name
		            $username = 'theggera@theggera.com'; //Enter your Email
		            $password = 'anggandamo123!';// Enter the Password
		            $title = "Kueenie - Your Account Has Been Created";
		            $message = 
							"
							<html>
							<head>
							  <title>Your Account Has Been Created</title>
							</head>
							<body>
							  <p>Congratulations, your Kueenie account has been created!</p>

							  <table>
							    <tr>
							      <th>Account Details:</th>
							    </tr>
							    <tr>
							      <td>Name:</td><td>".$fname." ".$lname."</td>
							    </tr>
							    <tr>
							      <td>Gender:</td><td>".$gender."</td>
							    </tr>
							  </table>
							  
							  <br><br>
							  <p><i>Sent from kueenie.com</i></p>
							</body>
							</html>
							";

		            $recipients = array(
		                $recipient => $fname." ".$lname
		            );

		            if($this->mailer($username, $password,$title,$message,$recipients,$senderName))
		            	return true;
		            else
		            	return false;
	} # End sendToEmail

	public function mailer($username, $password,$title,$message,$recipients,$senderName)
	{   
		            //Create a new PHPMailer instance
		            $mail = new PHPMailer();

		            // Set up SMTP
		            $mail->IsSMTP();
		            $mail->SMTPAuth   = true;
		            $mail->SMTPSecure = "tls";
		            $mail->Host       = "ssl://mail.theggera.com";
		            $mail->Port       = 465;
		            $mail->Username   = $username;
		            $mail->Password   = $password;
		            $mail->IsHTML(true);

		            // Build the message
		            $mail->Subject = $title;
		            $mail->Body    = $message;

		            // Set the from/to
		            $mail->setFrom($username, $senderName);
		            foreach ($recipients as $address => $name) {
		                $mail->addAddress($address, $name);
		            }

		            //send the message, check for errors
		            if (!$mail->send()) {
						return false;
					}else {
			           return true;
					}
	} # End mailer

	public function order_received() {
		# Declare data
		$data['page_title'] = 'Order Received';
		$data['specific_categories'] = $this->model_specific_categories->getSpecificCategories();
		$data['latest_products'] = $this->model_products->getLatestProducts();

		$order_id = $this->uri->segment(3);

		$data['customer_name'] = $this->session->userdata('kueenie_cust_fname').' '.$this->session->userdata('kueenie_cust_lname');
		$data['orders'] = $this->model_orders->getOrderDetailsForMessagePage($this->session->userdata('kueenie_cust_id'),$order_id);
	
		$this->load->view('view_order_received', $data);

	} # End order_received

	public function confirm_payment() {
		# Declare data
		$data['page_title'] = 'Payment Confirmation';
		$data['specific_categories'] = $this->model_specific_categories->getSpecificCategories();
		$data['latest_products'] = $this->model_products->getLatestProducts();

		$data['banks'] = $this->model_banks->getBanks();
	
		$this->load->view('view_confirm_payment', $data);

	} # End confirm_payment


	public function checkConfirmPayment(){
		$this->form_validation->set_rules('order_number', 'Order Number', 'trim|required|callback_order_number_check|htmlspecialchars|xss_clean');
        $this->form_validation->set_rules('bank', 'Bank', 'trim|required|htmlspecialchars|xss_clean');
        $this->form_validation->set_rules('branch', 'Branch', 'trim|required|htmlspecialchars|xss_clean');
        $this->form_validation->set_rules('name', 'Name', 'trim|required|htmlspecialchars|xss_clean');
        $this->form_validation->set_rules('amount', 'Amount', 'trim|required|numeric|htmlspecialchars|xss_clean');
        $this->form_validation->set_rules('date', 'Payment Date', 'trim|required|htmlspecialchars|xss_clean');
        $this->form_validation->set_rules('message', 'Message', 'trim|htmlspecialchars|xss_clean');
        // $this->form_validation->set_rules('deposit_slip', 'Deposit Slip', 'trim|required|htmlspecialchars|xss_clean');
       

        if ($this->form_validation->run() == FALSE)
		{
				$data['stat'] = 0;
				$data['msgErrorOrderNumber'] = strip_tags(form_error('order_number'));
				$data['msgErrorBank'] = strip_tags(form_error('bank'));
				$data['msgErrorBranch'] = strip_tags(form_error('branch'));
				$data['msgErrorName'] = strip_tags(form_error('name'));
				$data['msgErrorAmount'] = strip_tags(form_error('amount'));
				$data['msgErrorDate'] = strip_tags(form_error('date'));
				$data['msgErrorMessage'] = strip_tags(form_error('message'));
				// $data['msgErrorDepositSlip'] = strip_tags(form_error('deposit_slip'));
                echo json_encode($data);
		}
		else
		{
			$data['order_number'] = $this->input->post('order_number');
			$data['bank'] = $this->input->post('bank');
			$data['branch'] = $this->input->post('branch');
			$data['name'] = $this->input->post('name');
			$data['amount'] = $this->input->post('amount');

			$date = DateTime::createFromFormat('d-m-Y', $this->input->post('date'))->format('Y-m-d');
			$data['date'] = $date;
			$data['message'] = $this->input->post('message');
			// $data['deposit_slip'] = $this->input->post('deposit_slip');
			
			//...save values to database 
			$this->model_confirm_payments->insertPayment($data);

			// $ret = $this->sendToEmail($email,$fname,$lname, $gender,$pass);
			// if($ret == true)
				echo json_encode(array('stat' => 1,'msg' => 'Confirmed Successfully'));
			// else
			// 	echo json_encode(array('stat'=>2, 'msg' => 'Failed to Register', 'errorMail' => $ret));
		}
	} # checkConfirmPayment

	public function order_number_check($order_number){
		$count = $this->model_orders->checkOrderNumber($order_number);
		foreach ($count as $r) {
			$result_count = $r['or_count'];
		}

		if ($result_count == 0){
			$this->form_validation->set_message('order_number_check', 'This order number does not exist');
			return FALSE;
		}
		else{
			return TRUE;
		}
	} # End order_number_check





	public function clear_cart() {

		$this->cart->destroy();
		$this->session->set_userdata('new_total', '0.00');

		redirect('cart','refresh');
	} # End clear_cart

	public function remove_item() {

		$item = $this->input->post('rowid');

		$data = array(
			'rowid'	=>	$item,
			'qty'	=>	0
		);

		$this->cart->update($data);

		$dummyTotal = 0;

				foreach ($this->cart->contents() as $items):
					if ($items['discount_price'] > 0) 
						$dummyTotal += $items['discount_price'] * $items['qty'];
					else
						$dummyTotal += $items['price'] * $items['qty'];
				endforeach;

				$this->session->set_userdata('new_total', $dummyTotal);

	} # End remove_item

	public function success_payment(){
		$data['page_title'] = 'Order Received';
		$data['specific_categories'] = $this->model_specific_categories->getSpecificCategories();
		$data['latest_products'] = $this->model_products->getLatestProducts();

		$order_id = $this->input->post('invoice');

		if($this->session->userdata('kueenie_cust_id')){
			$data['customer_name'] =  $this->input->post('address_name');
			$data['orders'] = $this->model_orders->getOrderDetailsForMessagePage($this->session->userdata('kueenie_cust_id'),$order_id);
		
		}

		if($this->input->post('payment_status') != 'Failed'){
			$this->model_orders->updateOrderAddress(
						$this->input->post('invoice'),
						$this->input->post('address_name'), $this->input->post('payer_email'), 
						$this->input->post('address_street'), $this->input->post('address_city'),
						$this->input->post('memo'));
		}else{
			$data['paypal_payment_status'] = $this->input->post('payment_status');
			$data['pending_reason'] = $this->input->post('pending_reason');
		}

		$this->load->view('view_order_received', $data);
		
	} # End success_payment

} # End class































