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
									<h3 style="margin-left:20px" >Profile</h3>

									<div class="col-md-3" style="padding: 30px;">
										Orders
									</div>

									<div class="col-md-9" style="padding: 30px;">
										<?php

										 if(!empty($orders)){
		                    					foreach($orders as $p){
		                    						echo $p->order_id.br();
		                    						echo "Date - ".$p->order_date_checkout.br();
		                    						echo "Address - ".$p->order_ship_address_number.br();
		                    						echo $p->order_ship_address_baranggay.' '.
		                    							$p->order_ship_address_municipal.' '.
		                    							$p->order_ship_address_province.br();
		                    						echo "Order Total - ".$p->order_total.br();

		                    						if($p->order_date_paid == '0000-00-00 00:00:00'){
		                    							if($p->order_date_checkout >= $p->order_date_expired){
		                    								echo "Status - Order Closed".br();
		                    							}else{
		                    								echo "Status - ".$p->order_status.br();
		                    							}					
		                    						}
		                    						
		                    						echo '<a href="'.site_url('home/myorders/'.$p->order_id).'">View order</a>'.br(3);
		                    					}
		                    				}

										?>
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





















