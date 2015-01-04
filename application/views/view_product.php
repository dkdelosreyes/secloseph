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
			
			
			<!-- PRODUCT BLOCK =================================================================================================-->
			<div class="row">
				<div class="brandsWrapper">
					<div class="brandsInner">
						<div class="container">
							<div class="row">
								<div class="col-md-12 product-div">
									<div class="row">
										<div class="col-md-12 breads">
											<ol class="breadcrumb">
											<li><a href="<?php echo site_url()?>">Home</a></li>
											<li><a href="<?php echo site_url()?>">Brands</a></li>
											<li><a href="<?php echo site_url('brands/'. $brand->brand_url); ?>"><?php echo $brand->brand_name; ?></a></li>
											<li class="active"><?php echo $product_name; ?></li>
											</ol>

										</div>

										<form action="<?php echo site_url('products/addToCart'); ?>" method="post" role="form" id="formAddToCart">
											<?php
												$stockStatus = "";

												if(!empty($product)){
		                    						foreach($product as $p){
			                    						$color_photo_palette = $p['color_photo_palette'] != '' ? site_url('assets/palette/'.$p['color_photo_palette']) : '';
			                    						$color_name = $p['color_name'];
			                    						$brand_sell_type = $p['brand_sell_type'];
			                    						$prod_name = $p['prod_name'];
			                    						$retail_rate = $p['prod_price_ret'];
			                    						$prod_price_ret = $p['prod_price_ret'];
			                    						$prod_delivery_info = $p['prod_delivery_info'];
			                    						$prod_short_description = $p['prod_short_description'];
			                    						$prod_description = $p['prod_description'];
			                    						$prod_delivery_amount_free = $p['prod_delivery_amount_free'];
			                    						$prod_days_return_free = $p['prod_days_return_free'];
			                    						$prod_cod_allowed = $p['prod_cod_allowed'];

		                    						}
		                    					}	
		                    					$preview_photo = '';
		                    					if(!empty($images)){
				                    				foreach($images as $p){
				                    					$preview_photo = base_url('assets/products/'.$p->img_photo_url);
				                    					break;
				                    				}
				                    			}else{
				                    				$preview_photo = base_url('assets/img/product_default.png');	
				                    			}
			                    			?>

			                    						<input type="hidden" name="itemPrice" id="itemPrice" value="<?php echo $prod_price_ret; ?>">
														<input type="hidden" name="itemName" id="itemName" value="<?php echo $prod_name; ?>">
														<input type="hidden" name="itemColor" id="itemColor" value="<?php echo $color_name; ?>">
														<input type="hidden" id="itemId" name="itemId" value="">
														<input type="hidden" name="deliveryInfo" id="deliveryInfo" value="<?php echo $prod_delivery_info; ?>">
														

														<!-- ITEM IMAGE
														=============================================================== -->
														<div class="col-md-1" style="padding-right:0px">
			                    							<?php
			                    								if(!empty($images)){
				                    								foreach($images as $p): ?>
				                    									<div class="img-thumb-wrapper">
						                    								<img src="<?php echo base_url('assets/products/'.$p->img_photo_url); ?>" class="img-thumb" alt="">
						                    							</div>
				                    								<?php endforeach;
				                    							}else{ ?>
				                    								<div class="img-thumb-wrapper">
						                    							<img src="<?php echo base_url('assets/img/product_default.png'); ?>" class="img-thumb" alt="">
						                    						</div>
				                    							<?php }
				                    						?>
														</div>

														<div class="col-md-4" style="text-align: center;">
															<img src="<?php echo $preview_photo; ?>" class="img-responsive" id="img-zoom" data-large="<?php echo $preview_photo?>">
														</div> 

														<!-- ITEM DESCRIPTION
														=============================================================== -->
			                    						<div class="col-md-4">
			                    							<span class="prod-name"><?php echo $prod_name.br(); ?></span>
			                    							PHP <?php echo number_format($prod_price_ret, 2); ?>

			                    							<hr>

			                    							<p class="description">
			                    								<?php
																	echo $prod_short_description.br(2);	
					                    							echo $prod_description.br();
			                    								 ?>
			                    							</p>

			                    							<div class="delivery-info">
				                    							<span class="label">Delivery Info:</span><br><br>
				                    							<span class="description"><?php echo $prod_delivery_info; ?></span><br><br>

				                    							<div class="row">
					                    							<div class="col-md-10">Delivery above P<?php echo $prod_delivery_amount_free; ?></div>
																	<div class="col-md-2">Free</div>
																</div>
																<div class="row">
					                    							<div class="col-md-10"><?php echo $prod_days_return_free; ?> Days Return</div>
																	<div class="col-md-2">Free</div>
																</div>
																<div class="row">
					                    							<div class="col-md-10">Cash On Delivery</div>
																	<div class="col-md-2"><?php echo $prod_cod_allowed; ?></div>
																</div>
			                    							</div>
															

			                    							<span class="label">Color:</span><br><br>
			                    							<div class="color-box">
																<div class="color-box" style="margin:3px 3px 0px 0px;height:40x;width:50px;overflow:hidden">
																	<?php if($color_photo_palette==''){ ?>
																		<img src="<?php echo $preview_photo; ?>" alt="<?php echo $color_name; ?>" title="<?php echo $color_name; ?>" style="width:100%;">
																	<?php }else{ ?>
																		<img src="<?php echo $color_photo_palette; ?>" alt="<?php echo $color_name; ?>" title="<?php echo $color_name; ?>" style="width:100%;">
																	<?php } ?>
																</div>
																<div class="clearfix"></div>
															</div>

			                    						</div>

		                    						<?php //endforeach; 
		                    					//}?>


													<!-- ITEM COLORS
													=============================================================== -->
												<div class="col-md-3">
													
												
		                    					<?php  

		                    					if(!empty($color)){ ?>
		                    						<span class="label">Colors Available:</span><br><br>

		                    						<?php 
		                    						foreach($color as $p){ ?>
		                    								
															<!-- <a href="<?php echo base_url('products/viewProduct/'.$p['color_id'])?>" style="float: left;">
																<div class="color-box" style="margin:3px 3px 0px 0px">
																	<img src="<?php echo site_url('assets/palette/'.$p['color_photo_palette'])?>" alt="<?php echo $p['color_name']?>" title="<?php echo $p['color_name']?>" style="width:50px;height:40px">
																</div>
																<div class="clearfix"></div>
															</a> -->

															<a href="<?php echo base_url('products/viewProduct/'.$p['color_id']); ?>" style="float: left;">
																<div class="color-box" style="margin:3px 3px 0px 0px;height:40x;width:50px;overflow:hidden">
																	<?php if($p['color_photo_palette']==''){ ?>
																		<img src="<?php echo $preview_photo; ?>" alt="<?php echo $p['color_name']; ?>" title="<?php echo $p['color_name']; ?>" style="width:100%;">
																	<?php }else{ ?>
																		<img src="<?php echo site_url('assets/palette/'.$p['color_photo_palette']); ?>" alt="<?php echo $p['color_name']; ?>" title="<?php echo $p['color_name']; ?>"  style="width:100%;">
																	<?php } ?>
																</div>
																<div class="clearfix"></div>
															</a>


		                    						<?php }
		                    					}?>

											<br><br><br><br>


										<!--DIV RETAIL-->
											<div id="divRetail">
												<!-- <h3>RETAIL</h3> -->

												<?php if(!empty($sizes)){
		                    						foreach($sizes as $p){
		                    							// Determining if the product has sizes
		                    							if($p['size_name'] != "No Size"){ ?>

		                    								<div class="form-group form-size-retail">
		                    									<select name="size-retail" id="size-retail" class="form-control">
				                    								<option value="" >Choose Size</option>
				                    									<?php foreach($sizes as $p):
				                    									if($p['item_stock'] != 0){?>
							                    					<option value="<?php echo $p['size_name']; ?>" data-stocks="<?php echo $p['item_stock']; ?>" data-item-id="<?php echo $p['item_id']; ?>"><?php echo $p['size_name']; ?></option>
						                    							<?php }else{ ?>
						                    						<option value="<?php echo $p['size_name']; ?>" data-stocks="<?php echo $p['item_stock']; ?>" data-item-id="<?php echo $p['item_id']; ?>" disabled><?php echo $p['size_name']; ?></option>
						                    							<?php }
						                    							endforeach; ?>
				                    							</select>
				                    							<label class="control-label" id="msgErrorSizeRetail" style="font-size:12px;margin-bottom:0px"></label><br>
				                    						</div>

		                    							<?php
		                    							} // If sizes is not applicable to a product
		                    							else{ 
		                    								if($p['item_stock'] > 10){
												            	$stockStatus = 'Your selection: <font style="color:green">Currently Available</font>';
												        	}else if ($p['item_stock'] > 1 && $p['item_stock'] < 11){
												            	$stockStatus = 'Your selection: <font style="color:red">Only '.$p['item_stock'].' items in stock</font>';
												            }else{
												            	$stockStatus = 'Your selection: <font style="color:red">Only '.$p['item_stock'].' item in stock</font>';
												            }
		                    							}
		                    							break;
		                    						}
		                    					}
												?>
											
												
												<br>
												<div class="form-group form-quantity-retail">
													Input Quantity: 
													<input type="number" name="quantity-retail" id="quantity-retail" value="1" class="form-control" disabled="">
													<label class="control-label" id="msgErrorQuantityRetail" style="font-size:12px;margin-bottom:0px"></label>
													<span id="quantityStatus" style="font-size: 11px;"></span>
												</div>
											</div>
										<!--END OF DIV RETAIL-->

										
											<br>
											<button class="wishlistBtn" style="padding: 14px 20px;"><span class="glyphicon glyphicon-heart" style="font-size: 10px;"></span>     <span style="font-size: 12px;">WISHLIST</span></button>
		                    				<input type="submit" class="submitBtn" id="btnAddToCart"  data-loading-text="Processing..."  style="font-size: 12px;" value="ADD TO BAG">
											<div class="clearfix"></div>
											<br />
											<span id="stockStatus" style="font-size: 11px;"><?php echo $stockStatus; ?></span>
		                    			</form>
		                    		</div>
		                    	</div>


		                    	<div class="row">
		                    		<div class="col-md-12">
		                    			<br><br><span class="label">YOU MAY ALSO LIKE</span><br>
		                    			<hr>

		                    			<div id="carousel-example-generic2" class="carousel slide" data-ride="carousel" style="padding:20px 100px 0px 100px;clear:both">
        

									    <!-- Wrapper for slides -->
										<div class="carousel-inner">

										  <?php
											if(!empty($you_may_also_like_products)){
												$firstLoop = true; $counter = 0; $total = 0;$remainder=0; $ctr=0;

												foreach($you_may_also_like_products as $p){
													$total++;
												}
												$remainder = $total % 4;

									        	foreach($you_may_also_like_products as $p){
									        		if($counter  == 0){
										        		if($firstLoop){?>
											            	<div class="item active"> <div class="row">
															    <?php $firstLoop = false; 
										        		}else{?>
															<div class="item"> <div class="row">
														<?php 
														}
													}?>

														<a href="<?php echo site_url('products/viewProduct/'.$p->color_id)?>">
															<div class="col-xs-3">
											                    <div class="thumbnail" style="height:450px;">
															    	<div style="width:100%; height:300px;overflow:hidden;text-align: center;">
															    		<?php
																			if(!empty($like_preview_photo[$ctr])){
																				foreach ($like_preview_photo[$ctr] as $q) :?>
																					<img src="<?php echo base_url('assets/products/'.$q->img_photo_url)?>" alt="" style="vertical-align: middle;margin:0px;width:100%;height:auto">
																				<?php endforeach;
																				$ctr++;
																			}else{ ?>
																				<img src="<?php echo base_url('assets/img/product_default.png'); ?>" alt="" style="vertical-align: middle;margin:0px;width:100%;height:auto" >
																			<?php }
																		?>
															    		
															      	</div>

																    <div class="caption" style="height:150px;overflow:hidden;">
																    	<span class="product-name" style="font-size: 18px;"><?php echo $p->prod_name; ?></span>
																		<br>
																		<span class="product-desc" style="color: #969696;"><?php echo $p->spec_cat_name; ?></span>
																		<hr style="margin-top:1px; margin-bottom:5px">
																		<span class="product-desc" style="color: #969696; font-size:10px">
																		<?php echo $p->prod_short_description; ?>
																		</span>
																		<br>
																		<div class="col-md-12" style="text-align: left; padding: 10px 0;">
																			<span class="product-price">PHP <?php echo number_format($p->prod_price_ret, 2); ?></span>
																		</div>
																    </div>

															    </div>
															</div>
														</a>

													<?php
													$counter++;
													$total--;

													if($counter  == 4){ ?>
														</div> </div> 
														<?php $counter = 0;

													}else if ($total == 0 && $remainder>0) { ?>
														</div> </div> 
													<?php }

												} // == END OF FOREACH
											}?>

										  </div>

										  <!-- Controls -->
										  <a class="left carousel-control" href="#carousel-example-generic2" data-slide="prev" style="background:transparent; width:8%; color:#222">
										    <span class="glyphicon glyphicon-chevron-left"></span>
										  </a>
										  <a class="right carousel-control" href="#carousel-example-generic2" data-slide="next" style="background:transparent; width:8%; color:#222">
										    <span class="glyphicon glyphicon-chevron-right"></span>
										  </a>
										</div>







		                    		</div>
		                    	</div>
										
									
									
							</div>

						</div>
					</div>
				</div>
			</div>
			<!-- END OF PRODUCT BLOCK =======================================================================================-->

		</div>
		

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
		<script src="<?php echo base_url('assets/js/zoom.js')?>"></script>
		
		<!-- Modal login-->
		<?php include 'includes/view_login.php'; ?>

		<script type="text/javascript">

		// ADD TO CART========================================================
	      $('#formAddToCart').submit(function(){
	        $("#btnAddToCart").button('loading');
	        $('#msgErrorSizeRetail,#msgErrorSizeWholesale,#msgErrorQuantityRetail,#msgErrorQuantityWholesale').html("");
            $(".form-size-retail,.form-size-wholesale").removeClass("has-error");
            $(".form-quantity-retail,.form-quantity-wholesale").removeClass("has-error");
            console.log('before post');
	        $.post($('#formAddToCart').attr('action'), $('#formAddToCart').serialize(), function( data ) {
	        	console.log('after post');
	          $("#btnAddToCart").button('reset');
	        	if(data.stat == 0){
	        		if(data.msgErrorSizeRetail != ""){
	        			$('#msgErrorSizeRetail').html(data.msgErrorSizeRetail);
	        			$(".form-size-retail").addClass("has-error");

	        		}
	        		if(data.msgErrorSizeWholesale!= ""){
	        			$('#msgErrorSizeWholesale').html(data.msgErrorSizeWholesale); //for wholesale
	        			$(".form-size-wholesale").addClass("has-error");

	        		}
	        		if(data.msgErrorQuantityRetail != ""){
	        			$('#msgErrorQuantityRetail').html(data.msgErrorQuantityRetail); //for retail
	        			$(".form-quantity-retail").addClass("has-error");

	        		}
	        		if(data.msgErrorQuantityWholesale != ""){
	        			$('#msgErrorQuantityWholesale').html(data.msgErrorQuantityWholesale); //for wholesale
	        			$(".form-quantity-wholesale").addClass("has-error");
	        		}
	        	}else{
               		document.location = "<?php echo base_url()?>cart";
	        	}
	              
	        }, 'json');
	        return false;     
	      });
		// END ADD TO CART========================================================

		
		// FOR SIZE SELECT LIST====================================================
		var stock;
		$("#size-retail").change(function(){
			$('#msgErrorSize').html("");
        	$(".form-size").removeClass("has-error");

        	var size = $('#size-retail').val();
        	if(size == ''){
        		$("#quantity-retail").attr("disabled", "");
        		var quantity = $("#quantity-retail").val()
        		if(quantity == NaN || quantity == 0){
        			$("#quantity-retail").val(1);
        		}
        		$('#stockStatus').html('');
        		$('#quantityStatus').html('');

        	}else{
        		stock = parseInt($('option:selected', this).attr('data-stocks'));
				var itemId = $('option:selected', this).attr('data-item-id');
			 	if(stock != undefined){
			 		$("#quantity-retail").removeAttr("disabled");

					if(stock >= 12){
				    	$('#stockStatus').html('Your selection: <font style="color:green">Currently Available</font>');
					}else if (stock > 1 && stock < 12){
					    $('#stockStatus').html('Your selection: <font style="color:red">Only '+stock+' items in stock</font>');
					}else{
					    $('#stockStatus').html('Your selection: <font style="color:red">Only '+stock+' item in stock</font>');
					}
				}else{
					$('#stockStatus').html("");
					$("#quantity-retail").attr("disabled", "");
				}
				$('#itemId').val(itemId);

        	}
			
		});

		// FOR QUANTITY INPUT FIELD====================================================
		$('#quantity-retail').keyup(function() {
			var quantityValue = parseInt(this.value);
			$('#msgErrorQuantityRetail').html("");
            $(".form-quantity").removeClass("has-error");
          
			if(!isNaN(quantityValue) && stock != undefined && quantityValue != 0){
				if(quantityValue > stock){
					$('#quantityStatus').html('Not enough Stocks');	
				}else{
					$('#quantityStatus').html('<font style="color:green">Currently Available</font>');	
				}
			}
			else{
				$('#quantityStatus').html("Please specify a valid quantity");
			}
		})
		// END QUANTITY INPUT FIELD====================================================


		// IMAGE ZOOM ====================================================
		$('#img-zoom').imagezoomsl();
		$('.img-thumb').mouseenter(function(){
			var image_source = $(this).attr('src');
			$("#img-zoom").fadeOut("fast",function(){
				$("#img-zoom").attr("src",image_source);
				$("#img-zoom").attr("data-large",image_source);	
				$("#img-zoom").fadeIn()	
			})
			
		});
		// IMAGE ZOOM ====================================================

	</script>



	
</body>
</html>