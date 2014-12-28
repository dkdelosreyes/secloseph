<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><?php echo $page_title ?> | Secret Closet</title>

	<?php require 'includes/view_css.php'; ?>
</head>
<body>
	

	<div class="container-fluid">
		
		<?php require 'includes/view_navbar.php'; ?>

		<div class="row">
			<div class="decoyNav"></div>
		</div>

		<div class="row">

				<div class="navbar navbar-default redNav" role="navigation">
					<div class="container">
						<div class="row">
							<div class="navbar-header">
								<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-2">
								<span class="sr-only">Toggle navigation</span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
								</button>
								
							</div>
						</div>
						<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-2">
							<ul class="nav navbar-nav">
								<li class="active"><a href="<?php echo site_url()?>">Home</a></li>
								<li><a href="#about">About</a></li>
								<li><a href="#contact">Contact Us</a></li>
							</ul>
							
							<ul class="nav navbar-nav navbar-right">
								<!-- <li><a href="#">Wishlist</a></li> -->
								<li><a href="<? echo base_url('products/confirm_payment')?>">Confirm Payment</a></li>
								<li><a href="#" data-toggle="modal" data-target="#loginModal">Login</a></li>
								<li><a href="<?php echo base_url('home/register')?>">Register</a></li>
							</ul>
						</div><!--/.nav-collapse -->


				    </div>
				</div>
				
			</div>

			<div class="row">
				<div id="wrapper">
						<div id="sidebar-wrapper">
							<ul class="sidebar-nav">
								<li class="sidebar-brand">
									 <img src="<?php echo base_url('assets/img').'/'.$brand_url.'.png'?>" alt="" class="img-responsive">
								</li>

								<?php
									if(!empty($sub_categories)){
				                    	foreach($sub_categories as $p):?>
				                    		<li><a href="<?echo $controller_link.'/sub/'.$p->sub_cat_id?>">
				                   				<?echo $p->sub_cat_name.br();?></a>
											</li>
				           				<?endforeach;
				                   	}else{?>
										<li><a href="#">
			                   				No Categories under this brand</a>
										</li>
				           				<?
				                   	}
								?>
							</ul>
						</div>
						
						<!-- Page content -->
						<div id="page-content-wrapper">
						
							
							<div class="row">
								<div class="col-md-6 brands-banner-left">
									<a id="menu-toggle" href="#" class="btn btn-default"><span class="glyphicon glyphicon-th-list"></span></a>
									<img src="<?php echo base_url('assets/img/'.$brand_photo_url); ?>" alt="" class="img-responsive">

								</div>

								<div class="col-md-6 brands-banner-right">
									<h1><?php echo $brand_name?></h1>
									<hr>
									<p>
										<?php echo $brand_description ?>
									</p>
									<span class="label">RECENT ITEMS</span>
									<hr>
									<?
										if(!empty($top_recent_products)){
											$counter = 0;
		                    				foreach($top_recent_products as $p):?>

		                    					<div class="col-md-2 col-xs-2">
		                    						<a href="<?php echo base_url('products/viewProduct/'.$p->color_id)?>">
		                    							<?php
															if(!empty($top_preview_photo[$counter])){
																foreach ($top_preview_photo[$counter] as $q) :?>
																	<img src="<?php echo base_url('assets/products/'.$q->img_photo_url)?>" alt="" >
																<?endforeach;
																$counter++;
															}else{?>
																<img src="<?php echo base_url('assets/img/product_default.png')?>" alt="" >
															<?}
														?>
		                    						</a>
		                    					</div>

			                   				<?endforeach; 
		                    			}else{
		                   					echo "<div>No Products Yet</div>";
		                   				}
		                   			?>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12 breads">
									<ol class="breadcrumb">
									<li><a href="<?php echo site_url()?>">Home</a></li>
									<li><a href="<?php echo site_url()?>">Brands</a></li>
									<li class="active"><?php echo $brand_name?></li>
									
									</ol>

								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									Sort by category: <select name="sort-category" id="sort-category">
										<option value="">Select Category</option>
										<option value="">All Categories</option>
										<?php
										if(!empty($specific_categories)){
				                    		foreach($specific_categories as $p):?>
												<option value="<?echo $p->spec_cat_id;?>">
													<?echo $p->spec_cat_name.br();?>
												</option>
				           					<?endforeach;
				                    	}else{?>
												<option value="">
													No Categories Yet
												</option>
				           					<?
				                    	}
									?>
									</select>
								</div>
							</div>

							<div class="row">
								<div class="col-md-12">
									<hr>
								</div>
							</div>

							<!-- PRODUCTS LIST 
							=================================================== -->

							<?php 
							if(!empty($all_products)){
								$counter = 0;
								foreach ($all_products as $a) : ?>
							
									<div class="col-md-4 brand-products">
										<a href="<?php echo site_url('products/viewProduct/'.$a->color_id)?>">
										<div class="product-img" style="height:371px;overflow:hidden">
											<?php
												if(!empty($preview_photo[$counter])){
													foreach ($preview_photo[$counter] as $p) :?>
														<img src="<?php echo base_url('assets/products/'.$p->img_photo_url)?>" alt="" class="img-responsive">
													<?endforeach;
													$counter++;
												}else{?>
													<img src="<?php echo base_url('assets/img/product_default.png')?>" alt="" class="img-responsive">
												<?}
											?>
										</div>
										<div class="product-details">
											<span class="product-name"><?php echo $a->prod_name?></span>
											<br>
											<span class="product-desc"><?php echo $a->spec_cat_name?></span>
											<hr style="margin-top:3px">
											<span class="product-desc">
											<? echo $a->prod_short_description ?>
											</span><br><br>
											<div class="col-md-12" style="text-align: left; padding: 10px 0;">
												<span class="product-price">PHP <?php echo number_format($a->prod_price_ret, 2)?></span>
											</div>
										</div>
										</a>
									</div>

							<?  endforeach;
							}else{
								echo "<center>No Products Available for this category</center>";
							}?>

							<!-- END PRODUCTS LIST -->
							

							<!-- FOOTER 
							=================================================== -->
							<div class="col-md-12">
								
								<div class="footerWrapper">
									<div class="footerInner">

											<? include 'includes/view_footer.php'; ?>



									</div>
								</div>
							</div>
						</div><!-- page-content-wrapper -->


					</div>
						
			</div>



	</div><!-- container fluid -->
	
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
				$('#sidebar-wrapper').css("margin-top", "-50px");
		} 	else {
				$('#sidebar-wrapper').css("margin-top", "0px");
			}
		});

		if ($(window).scrollTop() > 50) {
				$('#sidebar-wrapper').css("margin-top", "-50px");
		} 	else {
				$('#sidebar-wrapper').css("margin-top", "0px");
		}

		// FOR SORT====================================================
		$("#sort-category").change(function(){
			var category_id = $('option:selected', this).attr('value');
			// document.location = "<?php echo $controller_link?>/"+category_id;
			document.location = "<?php echo $current_link?>/specific/"+category_id;
		});

	});
    </script>
</body>
</html>