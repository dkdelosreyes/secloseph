<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><?php echo $page_title ?></title>

	<!-- css-->
	<?php include 'includes/view_css.php'; ?>
	  

</head>
<body>
	
		<div class="header-bg"></div>
	
		<div class="container-fluid">
			
			<!-- Navbar-->
			<?php require 'includes/view_navbar.php'; ?>

			<div class="row">
				<div class="decoyNav"></div>
			</div>

			<?php require 'includes/view_secondary_navbar.php'; ?>	
			
			
		<!-- CART BLOCK =================================================================================================-->
			<div class="row">
				<div class="brandsWrapper">
					<div class="brandsInner">
						<div class="container">
							<div class="row">
								<div class="col-md-12 register-div shopping-cart">
									<h3 style="margin-left:20px" >Order Received</h3>

									<div class="col-md-2" style="padding: 30px;"> </div>

									<div class="col-md-10" style="padding: 30px;">
										<div style="border-left:2px solid #D9D9D9 ; padding:30px; float:left;width:630px ">
									    	<p>Dear <span style="font-weight:700">
												<? echo $customer_name?>
									    	,</span></p>
									    	<p style="margin-top:20px;">Thank you for your order. Your order confirmation number is: <span  style="font-weight:700">
									    		<? 
									    			$payment_message = '';
									    			$payment_method = '';
									    			$order_total = 0;
									    			if(!empty($orders)){
		                    							foreach($orders as $p){
		                    								echo $p->order_id.br();
		                    								$order_total = $p->order_total;
		                    								$payment_message = $p->payment_content;
		                    								$payment_method = $p->payment_name;
		                    							}					
		                    						}
									    		?>
									    	</span></p>

									    	<span  style="font-weight:700">TOTAL : PHP <? echo number_format($order_total, 2)?></span> 
									    	<br>
									    	<?if($payment_method != 'cod'){?>
									    		<b>After payment has been made, kindly provide your payment details by clicking <a href="<? echo site_url('products/confirm_payment')?>"><u>here</u></a>.</b>
									    	<?}?>
											<br>
											<!-- MESSAGE HERE -->
												<? 
									    			echo $payment_message;
									    		?>
											<!-- END OF MESSAGE HERE -->
											<br>
											<p>Thank you for shopping at Secret Closet!</p>
											<p style="margin-top:20px;">Sincerely,</p>
											<p>Secret Closet</p>
										</div>

									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		<!-- END OF CART BLOCK =======================================================================================-->

			
			<!-- Footer-->
			<div class="row">
				<div class="footerWrapper">
					<div class="footerInner">
						<div class="container">
							<?php include 'includes/view_footer.php'; ?>
						</div>
					</div>
				</div>
			</div>


			
			


<!-- SCRIPTS SECTION ======================================================================================================= -->
		
		<!-- scripts-->
		<?php include 'includes/view_scripts.php'; ?>
		
		<!-- Modal login-->
		<?php include 'includes/view_login.php'; ?>

	
	
</body>


</html>





















