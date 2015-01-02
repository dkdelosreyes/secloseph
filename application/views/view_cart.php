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

									<div class="col-md-4" style="padding: 30px;">
										<span style="font-size: 16px;"><b>CART SUMMARY</b></span>
										<div class="cart-summary">
											<table>
												<tr>
													<td><span style="font-size: 16px;"><b>Overall Total</b></span></td>
													<td class="right"><span style="font-size: 16px;">PHP <? echo number_format($this->cart->total(), 2) ?></span></td>
												</tr>
												<tr>
													<td>Delivery</td>
													<td class="right">Free</td>
												</tr>
												<tr>
													<td>Discount</td>
													<td class="right">
													<? if ($this->cart->total_items() > 0) { ?>

														<? foreach ($this->cart->contents() as $items): ?>
															
															<? if ($items['discount_percent'] > 0) { ?>
															<b><? echo $items['name'] ?></b><? echo nbs(5) ?>
															<? echo $items['options']['Size'] ?><? echo nbs(5) ?>
															<? echo $items['discount_percent'] . '%' ?><br>
															<? } ?>
														<? endforeach; ?>
													<? } else { ?>
													0%
													<? } ?>
													</td>
												</tr>
												<tr>
													<td>Total number of items</td>
													<td class="right"><? echo $this->cart->total_items() ?></td>
												</tr>
												<tr>
													<td colspan="2"><hr></td>
												</tr>
												<tr>
													<td><span style="font-size: 16px;"><b>Grand Total</b></span></td>
													<td class="right"><span style="font-size: 16px;">PHP <? echo $this->cart->format_number($this->session->userdata('new_total')) ?></span></td>
												</tr>
											</table>
										</div>
										<a href="<?echo $this->session->userdata("kueenie_shop_more_page_url")?>" class="shop-more">&laquo;   SHOP MORE</a>
		                    			<a href="<? echo site_url('products/checkout')?>" class="checkout">CHECK OUT   &raquo;</a>
										

		                    			<? echo br(5) ?>
										<span style="font-size: 16px;"><b>PAYMENT OPTIONS</b></span><br><br>
										<img src="<?php echo base_url('assets/icons/facebook.png')?>" alt="">
										<img src="<?php echo base_url('assets/icons/Spotify.png')?>" alt="">
										<img src="<?php echo base_url('assets/icons/twitter.png')?>" alt="">
										<img src="<?php echo base_url('assets/icons/Tumblr.png')?>" alt="">
									</div>

									<div class="col-md-8" style="padding: 30px;">
										<span style="font-size: 16px;"><b>YOUR SHOPPING CART</b></span>
										<a href="<? echo site_url('clear_cart'); ?>"><span style="float:right; color:#474843; text-decoration:none; font-size: 11px">
										<span class="glyphicon glyphicon-remove"></span><? echo nbs(2) ?>Empty Cart</span></a><? echo nbs(5) ?>
										<table>
											<thead>
											<tr>
												<td>Item(s)</td>
												<td>Retail Price</td>
												<td>Delivery Info</td>
												<td>Quantity</td>
												<td>Sub-total</td>
											</tr>
											</thead>
											<tbody>
												<? if ($this->cart->total_items() > 0) { ?>
												<?php $i = 1; ?>
												<? $dummyTotal = 0; ?>
												
												<?php foreach ($this->cart->contents() as $items): ?>
												<tr>
													<td>
													
														<div style="float: left;">
															<?php echo form_hidden('[rowid]', $items['rowid']); 
																$preview_photo_link  = $items['image'] != '' ? base_url('assets/products/'.$items['image']) : base_url('assets/img/product_default.png');
															?>
														
														<img src="<?php echo $preview_photo_link?>" class="img-responsive" style="vertical-align: middle;">
													<br>
													<a id="remove-item" style="text-decoration: underline; color: #474843; cursor:pointer;">Remove</a>
														</div>
														
													
													<div style="float: left; padding: 0 15px;">
														<b><? echo $items['brand_name']?></b><br />
														<span style="font-size: 14px;"><i><? echo $items['name'] ?></i></span><br />
														<? if ($this->cart->has_options($items['rowid']) == TRUE): ?>

															<?php foreach ($this->cart->product_options($items['rowid']) as $option_name => $option_value): ?>

																
																
																<strong><?php echo $option_name; ?>:</strong> <?php echo $option_value; ?><br />

															<?php endforeach; ?>
														<? endif; ?>
														<br>
														
													</div>
													

													</td>
													<td>
														<? if ($items['discount_price'] > 0) { ?>
														<span style="color: darkred;"><strike>PHP <? echo $this->cart->format_number($items['price']) ?></strike><br>
														PHP <? echo $this->cart->format_number($items['discount_price']) ?>
														</span>
														<? } else {  ?>
														<span style="color: darkred;">PHP <? echo $this->cart->format_number($items['price']) ?><br>
														<? } ?>
													</td>
													<td>
														<div style="font-size:9px"><? echo $items['delivery_info']?></div>

													</td>
													<td>
														<input type="text" name="<? echo $i.'[qty]'?>" id="" style="max-width: 70px;" value="<? echo $items['qty'] ?>" maxlength="3" class="form-control">
													</td>
													<td>
														<? if ($items['discount_price'] > 0)  { ?>
														PHP <? echo $this->cart->format_number($items['discount_price'] * $items['qty']) ?><br>
														<? } else {  ?>
														PHP <? echo $this->cart->format_number($items['price'] * $items['qty']) ?><br>
														<? } ?>
													</td>
												</tr>
												<?php $i++; ?>
												<?php endforeach;?>
												<? } else { ?>
													<tr>
													<td colspan="5">No items to display</td>
													</tr>
												<? } ?>
											</tbody>
										</table>
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

		<script type="text/javascript">
			$(document).ready(function(){

				$('a#remove-item').on('click', function(){


					var index_of_a = $('a#remove-item').index(this);
					var index_of_input = $('input[name="[rowid]"]:eq('+(index_of_a)+')').index('input[name="[rowid]"]');
					var value_of_input = $('input[name="[rowid]"]:eq('+index_of_input+')').val();

					$.post(
					'<? echo site_url("products/remove_item") ?>',
					{rowid : value_of_input},
					function(){
						window.location.href = '<? echo site_url("cart") ?>';
					});
			
				});
			});
		</script>

	
	
</body>


</html>





















