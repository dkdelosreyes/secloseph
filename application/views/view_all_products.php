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
			<?php include 'includes/view_navbar.php'; ?>	
			
			
		<!-- PRODUCTS BLOCK =================================================================================================-->
			<div class="row">
				<div id="wrapper">
						<div id="sidebar-wrapper">
							<ul class="sidebar-nav">
								<li class="sidebar-brand"><a href="#">Kueenie</a>
								</li>
								<li><a href="#">Dashboard</a>
								</li>
								<li><a href="#">Shortcuts</a>
								</li>
								<li><a href="#">Overview</a>
								</li>
								<li><a href="#">Events</a>
								</li>
								<li><a href="#">About</a>
								</li>
								<li><a href="#">Services</a>
								</li>
								<li><a href="#">Contact</a>
								</li>
							</ul>
						</div>
						
						<!-- Page content -->
						<div id="page-content-wrapper">
						
							
							<div class="col-md-12">
								<img src="<?php echo base_url('assets/img/kueenie1.png')?>" alt="" class="img-responsive">
							</div>
							<div class="col-md-12 breads">
								<ol class="breadcrumb">
								<li><a id="menu-toggle" href="#" class="btn btn-default"><i class="icon-reorder"></i></a></li>
								<li><a href="#">Home</a></li>
								<li class="active">Kueenie</li>
								</ol>

							</div>
							<div class="col-md-12">
								Sort by: <select name="" id="">
									<option value="">Popularity</option>
									<option value="">Popularity</option>
								</select>
							</div>

							<!-- PRODUCTS LIST 
							=================================================== -->
							<?php
											if(!empty($all_products)){
	                    						foreach($all_products as $p){
	                    							echo '
	                    							<div class="col-md-4 brand-products">
														<div class="product-img">
															<img src="'.base_url('assets/products/'.$p['color_photo_url']).'" alt="" class="img-responsive">
														</div>
														<div class="product-details">
															<span class="product-name">'.$p['prod_name'].'</span>
															<hr>
															<span class="product-desc">Color: '.$p['color_name'].br().$p['prod_short_description'].'</span><br><br>
															<div class="col-md-12" style="text-align: left; padding: 10px 0;">
																<span class="product-price">PHP '.$p['prod_price_ws'].'</span>
																<a href="'.base_url('home/viewProduct/'.$p['color_id']).'" type="button" class="btn btn-warning" style="float: right;">View Product</a>
															</div>
														</div>
													</div>';
	                    						}
	                    					}else{
	                    						echo "No Products Yet";
	                    					}
										?>

							<!-- END PRODUCTS LIST -->
							

						</div><!-- page-content-wrapper -->


					</div>
			</div>
		<!-- END OF PRODUCTS BLOCK =======================================================================================-->



			
			<!-- Footer-->
			<?php include 'includes/view_footer.php'; ?>


			
			


<!-- SCRIPTS SECTION ======================================================================================================= -->
		
		<!-- scripts-->
		<?php include 'includes/view_scripts.php'; ?>
		
		<!-- Modal login-->
		<?php include 'includes/view_login.php'; ?>

		<script type="text/javascript">
		    $(document).ready(function(){

		    	$("#menu-toggle").click(function(e) {
			        e.preventDefault();
			        $("#wrapper").toggleClass("active");
			    });

				$(window).scroll(function(){
					if ($(this).scrollTop() > 50) {
						$('#wrapper').css("margin-top", "-50px");
				} 	else {
						$('#wrapper').css("margin-top", "0px");
					}
				});

			});
		</script>

	
	
</body>


</html>





















