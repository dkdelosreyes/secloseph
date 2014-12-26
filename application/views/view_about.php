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
								<div class="row register-div shopping-cart">
									<h3 style="margin-left:20px" >About</h3>

									<div class="col-md-8" style="padding: 30px;">
										<?php
											$cms_photo_url='';
											if(!empty($about)){
		                    					foreach($about as $p){
		                    						echo $p->cms_content;
		                    						$cms_photo_url = $p->cms_photo_url;
		                    					}
		                    				}
										?>
									</div>

									<div class="col-md-4">
										<img src="<?echo base_url('assets/cms/'.$cms_photo_url)?>" style="width:100%">
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





















