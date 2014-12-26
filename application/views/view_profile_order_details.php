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
		                    				foreach($orders as $p):?>
		                    					Shipping Address: <br>
		                    					<?
		                    						echo $p->order_bill_to.', '.$p->order_bill_contact.br();
													echo $p->order_bill_address_number.br();
													echo $p->order_bill_address_baranggay.', '.$p->order_bill_address_municipal.', '.$p->order_bill_address_province.br(2);
		                    					?>

		                    					Billing Address: <br>
		                    					<?
		                    						echo $p->order_bill_to.', '.$p->order_bill_contact.br();
													echo $p->order_bill_address_number.br();
													echo $p->order_bill_address_baranggay.', '.$p->order_bill_address_municipal.', '.$p->order_bill_address_province.br(2);
		                    					?>

                                                Payment Method: <br>
                                                <?
                                                    echo $p->payment_title.br(2);
                                                ?>

                                                Order Status: <br>
                                                <?echo $p->order_status.br(5)?>
		                    				<?
		                    				endforeach;
		                    			}

										 if(!empty($orders_details)){
		                    				foreach($orders_details as $p):?>

												<img src="<?php echo base_url('assets/products').'/'.$p->color_photo_url?>" class="img-responsive" style="width:150px">
												<br>
												Name: <?echo $p->prod_name.br(1)?>
												Quantity: <?echo $p->or_det_quantity.br(1)?>
												Size: <?echo $p->or_det_size.br(1)?>

												Status: <br>

												Price: <?echo $p->or_det_price.br(3)?>
											<?
		                    				endforeach;
		                    			}

		                    			if(!empty($orders)){
		                    					foreach($orders as $p):?>
		                    						Total: <?echo $p->order_total.br(3)?>
		                    					<?
		                    					endforeach;
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





















