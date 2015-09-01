<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct() {

		parent::__construct();
		$this->load->library('My_PHPMailer');
		$this->load->model('model_customers');
		$this->load->model('model_products');
		$this->load->model('model_items');
		$this->load->model('model_brands');
		$this->load->model('model_cms');
		$this->load->model('model_orders');
		$this->load->model('model_articles');
		$this->load->model('model_featurette');
		$this->load->model('model_specific_categories');
		$this->load->model('model_order_details');

	} # End construct

	public function index() {
		// # Declare data
		$data['page_title'] = 'Secret Closet | Home';
		$data['specific_categories'] = $this->model_specific_categories->getSpecificCategories();
		$data['latest_products'] = $this->model_products->getLatestProducts();

		$brands = $this->model_brands->get_all_brands();

		$data['brands'] = $brands;

		$data['articles'] = $this->model_articles->getArticles();
		$data['featurette'] = $this->model_featurette->getFeaturette();
		
		$this->load->view('view_home', $data);
	} # End index

	public function register() {
		if(!$this->session->userdata('kueenie_cust_id')){ 
			# Declare data
			$data['page_title'] = 'Secret Closet | Registration';
			$data['specific_categories'] = $this->model_specific_categories->getSpecificCategories();
			$data['latest_products'] = $this->model_products->getLatestProducts();
			
			$this->load->view('view_register', $data);
		}else{
			$this->index();
		}
	} # End register

	public function checkLogin(){
		$this->form_validation->set_rules('email', 'Email', 'trim|callback_login_check|htmlspecialchars|xss_clean');
        $this->form_validation->set_rules('pass', 'Password', 'trim|xss_clean|md5');

        if ($this->form_validation->run() == FALSE)
		{
				$data['stat'] = 0;
                echo json_encode($data);
		}
		else
		{	
			$cust_id = "";
			$cust_fname = "";
			$cust_lname = "";

			$email = $this->input->post('email');
			$pass = $this->input->post('pass');

			$user = $this->model_customers->getUserInfo($email, $pass);
			foreach ($user as $r) {
				$cust_id = $r['cust_id'];
				$cust_fname = $r['cust_fname'];
				$cust_lname = $r['cust_lname'];
			}

			$sessdata = array(
		                    'kueenie_cust_id'=>$cust_id,
							'kueenie_cust_fname'=>$cust_fname,
		                    'kueenie_cust_lname'=>$cust_lname,
						);
			$this->session->set_userdata($sessdata);

			$data['stat'] = 1;
            echo json_encode($data);
		}
	} # End login

	public function login_check($email)
	{
		$pass = md5($this->input->post('pass'));

		$count = $this->model_customers->checkLogin($email, $pass);
		foreach ($count as $r) {
			$result_count = $r['usercount'];
		}

		if ($result_count == 0){
			$this->form_validation->set_message('login_check', 'Invalid Credentials');
			return FALSE;
		}
		else{
			return TRUE;
		}
	} # End login_check

	public function logout(){
        $this->session->unset_userdata('kueenie_cust_id');
        $this->session->unset_userdata('kueenie_cust_fname');
        $this->session->unset_userdata('kueenie_cust_lname');
        $this->session->unset_userdata('checkout_user_type');
        echo json_encode();
	} # End logout

	public function checkFacebookExist(){
		$email = $this->input->post('email');

		$count = $this->model_customers->checkFacebookExist($email);
		foreach ($count as $r) {
			$result_count = $r['usercount'];
		}

		if($result_count != 0){
			$user = $this->model_customers->getFacebookUserInfo($email);
			foreach ($user as $r) {
				$cust_id = $r['cust_id'];
				$cust_fname = $r['cust_fname'];
				$cust_lname = $r['cust_lname'];
			}

			$sessdata = array(
		                    'kueenie_cust_id'=>$cust_id,
							'kueenie_cust_fname'=>$cust_fname,
		                    'kueenie_cust_lname'=>$cust_lname,
						);
			$this->session->set_userdata($sessdata);

			$data['exist'] = true;
		}
		else
			$data['exist'] = false;

		echo json_encode($data);

	} # End checkFacebookExist

	public function checkRegister(){
		$this->form_validation->set_rules('fname', 'First name', 'trim|required|callback_name_check|htmlspecialchars|xss_clean');
        $this->form_validation->set_rules('lname', 'Last name', 'trim|required|callback_name_check|htmlspecialchars|xss_clean');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[customers.cust_email]|htmlspecialchars|xss_clean');
        $this->form_validation->set_rules('pass', 'Password', 'trim|required|min_length[6]|xss_clean|md5');
        $this->form_validation->set_rules('conPass', 'Password', 'trim|required|matches[pass]|xss_clean|md5');

        $this->form_validation->set_message('is_unique', 'This email address exists');
        $this->form_validation->set_message('matches', 'Did not match the above password');
        $this->form_validation->set_message('name_check', 'Names should only contain letters and spaces');


        if ($this->form_validation->run() == FALSE)
		{
				$data['stat'] = 0;
				$data['msgErrorFname'] = strip_tags(form_error('fname'));
				$data['msgErrorLname'] = strip_tags(form_error('lname'));
				$data['msgErrorEmail'] = strip_tags(form_error('email'));
				$data['msgErrorPass'] = strip_tags(form_error('pass'));
				$data['msgErrorConPass'] = strip_tags(form_error('conPass'));
                echo json_encode($data);
		}
		else
		{
			$fname = $this->input->post('fname');
			$lname = $this->input->post('lname');
			$gender = $this->input->post('gender');
			$pass = $this->input->post('pass');
			$email = $this->input->post('email');
			
			//...save values to database 
			$this->model_customers->insertUser($fname, $lname, $gender, $pass, $email);

			$ret = $this->sendToEmail($email,$fname,$lname, $gender,$pass);
			if($ret == true)
				echo json_encode(array('stat' => 1,'msg' => 'Registered Successfully'));
			else
				echo json_encode(array('stat'=>2, 'msg' => 'Failed to Register', 'errorMail' => $ret));
		}
    
	} # End checkRegister

	public function name_check($str)
	{
		return ( ! preg_match("/^([a-zA-Z ])+$/i", $str)) ? FALSE : TRUE;
	} # End name_check

	public function sendToEmail($recipient,$fname,$lname, $gender,$pass){

		//FOR PHP MAILER
					$senderName = "Secret Closet"; //Enter the sender name
		            $username = 'theggera@theggera.com'; //Enter your Email
		            $password = 'anggandamo123!';// Enter the Password
		            $title = "Secret Closet - Your Account Has Been Created";
		            $message = 
							"
							<html>
							<head>
							  <title>Your Account Has Been Created</title>
							</head>
							<body>
							  <p>Congratulations, your Secret Closet account has been created!</p>

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
	} # End sendMail

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

	public function terms_of_sale() {

		# Declare data
		$data['page_title'] = 'Secret Closet | Terms of Sale and Shop Policy';
		$data['specific_categories'] = $this->model_specific_categories->getSpecificCategories();
		$data['latest_products'] = $this->model_products->getLatestProducts();
		
		$data['terms'] = $this->model_cms->getTermsOfSale();

		$this->load->view('view_terms_of_sale', $data);
		
	} # End terms_of_sale

	public function profile(){
        if($this->session->userdata('kueenie_cust_id')){ 

			# Declare data
			$data['page_title'] = 'Secret Closet | My Account';
			$data['specific_categories'] = $this->model_specific_categories->getSpecificCategories();
			$data['latest_products'] = $this->model_products->getLatestProducts();
			
			$data['orders'] = $this->model_orders->getAllOrdersByUser($this->session->userdata('kueenie_cust_id'));

			$this->load->view('view_profile', $data);
		}else{
			$this->index();
		}
	} # End profile

	public function myorders(){
        if($this->session->userdata('kueenie_cust_id')){ 

			# Declare data
			$data['page_title'] = 'Secret Closet | My Account | Order Details';
			$data['specific_categories'] = $this->model_specific_categories->getSpecificCategories();
			$data['latest_products'] = $this->model_products->getLatestProducts();

			$order_id = $this->uri->segment(3);
			
			$data['orders_details'] = $this->model_order_details->getAllOrderDetails($order_id);
			$data['orders'] = $this->model_orders->getOrderAddressAndTotal($order_id);

			$this->load->view('view_profile_order_details', $data);
		}else{
			$this->index();
		}
	} # End myorders

	public function about() {
		
		# Declare data
		$data['page_title'] = 'Secret Closet | About';
		$data['specific_categories'] = $this->model_specific_categories->getSpecificCategories();
		$data['latest_products'] = $this->model_products->getLatestProducts();
		
		$data['about'] = $this->model_cms->getAbout();

		$this->load->view('view_about', $data);
		
	} # End about

	public function contact() {

		# Declare data
		$data['page_title'] = 'Secret Closet | Contact';
		$data['specific_categories'] = $this->model_specific_categories->getSpecificCategories();
		$data['latest_products'] = $this->model_products->getLatestProducts();
		
		$data['contact'] = $this->model_cms->getContact();

		$this->load->view('view_contact', $data);
		
	} # End contact
	

	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */



















