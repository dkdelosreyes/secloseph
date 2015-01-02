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

								<form  action="<?php echo site_url('products/order')?>" method="post" id="checkoutForm" name="checkoutForm">

								<div class="col-md-12 register-div shopping-cart" style="padding:50px;">

									<!-- SUMMARY 
									======================================================= -->
									<div class="col-md-5" style="padding: 5px;">
										<span style="font-size: 16px;"><b>SUMMARY</b></span> 	
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
													<td colspan="2">
													<span style="font-size: 16px;"><b>CART OVERVIEW</b></span>
											<div style="max-height: 150px; overflow: scroll; width: 100%;">
											<table style="margin-top: 0px;">
											<thead>
											<tr>
												<td>Item(s)</td>
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
													<td style="width: 40%;">
													
														<div style="float: left;">
															<?php echo form_hidden('[rowid]', $items['rowid']); ?>
														
														<img src="<?php echo base_url('assets/products').'/'.$items['image']?>" class="img-responsive" style="vertical-align: middle; width: 30px;">
													<br>
													
														</div>
														
													
													<div style="float: left; padding: 0 15px; font-size: 10px;">
														<b><? echo $items['brand_name']?></b><br />
														<span style="font-size: 12px;"><i><? echo $items['name'] ?></i></span><br />
														<? if ($this->cart->has_options($items['rowid']) == TRUE): ?>

															<?php foreach ($this->cart->product_options($items['rowid']) as $option_name => $option_value): ?>

																
																
																<strong><?php echo $option_name; ?>:</strong> <?php echo $option_value; ?><br />

															<?php endforeach; ?>
														<? endif; ?>
														<br>
														
													</div>
													

													</td>
													
													
													<td>
														<? echo $items['qty'] ?>
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
													</td>
												</tr>
												<tr>
													<td><span style="font-size: 16px;"><b>Grand Total</b></span></td>
													<td class="right"><span style="font-size: 16px;">PHP <? echo $this->cart->format_number($this->session->userdata('new_total')) ?></span></td>
												</tr>
											</table>
										</div>
										<a href="" class="shop-more">&laquo;   SHOP MORE</a>
		                    			<input type="submit" id="btnOrder" class="ordernow" data-loading-text="Processing..." value="ORDER NOW    &raquo;">

									</div>

									<!-- END OF SUMMARY
									======================================================= -->

									<!-- CUSTOMER INFORMATION 
									======================================================= -->
									<div class="col-md-4" style="padding: 5px;">
										<span style="font-size: 16px;"><b>CUSTOMER INFORMATION</b></span>

										<div class="cart-summary">

											<?php
												$bill_address_adder_toggable = $isBillAddressAdderToggable == 'yes'?'id="addBillingAddress" ':'';
												$ship_address_adder_toggable = $isBillAddressAdderToggable == 'yes'?'id="addShippingAddress" ':'';
												$address_visibility = $isAddressVisible != 'yes' ? 'display:none':''; 			 	/**FOR BILLING ADDRESS*/ 
												$register_form_visibility = $isRegisterFormVisible != 'yes' ? 'display:none':''; 	/**FOR GUEST AND FB-login USERS*/
											?>

											<!-- BILLING INFO
											=============================================================== -->
											<span style="font-size: 13px;"><b>BILLING INFORMATION</b></span> <br><br>

											<!-- NOTIFICATIONS -->
									    		<div class="notification" style="margin-left:15px">

									              <div class="alert alert-danger" id="msg" style="display:none"></div>
									              <div class="progress progress-striped active" id="waiting" >
									                <div class="progress-bar"  role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
									                  Please wait...
									                </div>
									              </div>
									              <noscript>Please enable your JavaScript</noscript>
									            </div>
									        <!-- END OF NOTIFICATIONS -->

											<span style="font-size: 12px;">PERSONAL INFORMATION</span><? echo br(2) ?>
											
											<?php
													if(!empty($shippingAddress)){
														$bill_address_adder_visibility = '';
			                    						foreach($shippingAddress as $p):
			                    							$checked_bill = $p->ship_billing_address_used == 'yes' ? 'checked' : ''; /**TO AUTO CHECKED THE DECLARED DEFAULT BILL ADDRESS*/
			                    			?>
																<div class="row">
																	<div class="col-md-2"><input type="radio" name="billingAddress" value="<? echo $p->ship_id ?>" <?echo $checked_bill ?> ></div>
																	<div class="col-md-10" style="font-size: 11px;">
																		<?
																			echo $p->ship_fname.' '.$p->ship_lname.br();
																			echo $p->ship_address.br();
																			echo $p->ship_address_baranggay.' '.$p->ship_address_municipal.' '.$p->ship_address_province.br();
																			
																			echo $p->ship_contact.br();
																		?>
																	</div>
																</div>	
		                    				<?php
			                    						endforeach;
			                    					}else{
			                    						$bill_address_adder_visibility = 'display:none';
			                    					}
											?>



											<!-- ============================================================= -->

											<div class="col-md-12"  style="<? echo $register_form_visibility ?>">

									    		<br>

									    			<div class="register-body" style="padding: 0px">

									    				<div class="form-group form-email has-feedback">
									    					<label class="control-label" id="msgErrorEmail" style="font-size:12px;margin-bottom:0px"></label>
									                      	<input type="email" id="email" name="email" class="form-control form-control-register " placeholder="Enter email" autocomplete="off" value="<?php echo set_value('fname'); ?>">
									                      	<span class="glyphicon form-control-feedback glyphicon-email"></span>
													    	<p class="help-block">We will send messages to the above email address. 
															Please ensure the email address is accessible and 
															up-to-date.</p>
													  	</div>
													  	<div class="form-group form-pass has-feedback">
													    	<label class="control-label" id="msgErrorPass" style="font-size:12px;margin-bottom:0px"></label>
									                      	<input type="password" name="pass" class="form-control form-control-register " id="" placeholder="Password">
									                      	<span class="glyphicon form-control-feedback glyphicon-pass"></span>
													  	</div>
													  	<div class="form-group form-conPass has-feedback">
													    	<label class="control-label" for="inputSuccess2" id="msgErrorConPass" style="font-size:12px;margin-bottom:0px"></label>
									                      	<input type="password" name="conPass" class="form-control form-control-register " id="" placeholder="Confirm Password">
									                      	<span class="glyphicon form-control-feedback glyphicon-conPass"></span>
													  	</div>
													  	<font class="font-note-login">Additional Information</font>
													  	<hr>
													  	<div class="row">
														  	<div class="col-md-6">
														  		<div class="form-group form-fname">
															    	<label class="control-label" id="msgErrorFname" style="font-size:12px;margin-bottom:0px"></label>
									                      			<input type="text" name="fname" class="form-control form-control-register" id="fname" placeholder="First Name">
															  	</div>
														  	</div>
														  	<div class="col-md-6">
														  		<div class="form-group form-lname">
															    	<label class="control-label" id="msgErrorLname" style="font-size:12px;margin-bottom:0px"></label>
									                      			<input type="text" name="lname" class="form-control form-control-register" id="lname" placeholder="Last Name">
															  	</div>
														  	</div>
													  	</div>
													  	<div class="radio-inline">
														  <label>
														    <input type="radio" id="genderF" name="gender" value="female" checked>Female
														  </label>
														</div>
														<div class="radio-inline">
														  <label>
														    <input type="radio" id="genderM" name="gender" value="male">Male
														  </label>
														</div>
									    			</div>

											</div>
											<!-- ============================================================= -->

											
											<? echo br(2) ?>
											<div <?echo $bill_address_adder_toggable?> style="font-size: 12px;"><b><span class="glyphicon glyphicon-plus"></span><? echo nbs(3) ?>ADD A NEW BILLING ADDRESS</b></div> 
											<? $billingAddressState = $bill_address_adder_toggable != ''? 'hidden' : 'visible';?>

											<div id="formAddBill" style="<? echo $address_visibility ?>">
												<input type="hidden" name="billingAddressState" id="billingAddressState" value="<?echo $billingAddressState?>">
												
												<div class="row">
													<div class="col-md-6">
														<div class="form-group form-addr-fname">
															<label class="control-label" id="msgErrorAddrFname" style="font-size:12px;margin-bottom:0px"></label>
															<input type="text" name="addr_fname" class="form-control form-control-register" id="" placeholder="First Name">
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group form-addr-lname">
															<label class="control-label" id="msgErrorAddrLname" style="font-size:12px;margin-bottom:0px"></label>
															<input type="text" name="addr_lname" class="form-control form-control-register" id="" placeholder="Last Name">
														</div>
													</div>
												</div>

												<div class="form-group form-addr-contact">
													<label class="control-label" id="msgErrorAddrContact" style="font-size:12px;margin-bottom:0px"></label>
													<input type="text" name="addr_contact" class="form-control form-control-register" id="" placeholder="Contact Number">
												</div>

												<div class="form-group form-addr-num">
													<label class="control-label" id="msgErrorAddrNum" style="font-size:12px;margin-bottom:0px"></label>
													<input type="text" name="addr_num" class="form-control form-control-register" id="" placeholder="Street No., Street Name, House/Lot#, Building Name">
												</div>
												<div class="form-group form-addr-prov">
													<label class="control-label" id="msgErrorAddrProv" style="font-size:12px;margin-bottom:0px"></label>
													<input type="text" name="addr_prov" class="form-control form-control-register" id="" placeholder="Province">
												</div>
												<div class="form-group form-addr-mun">
													<label class="control-label" id="msgErrorAddrMun" style="font-size:12px;margin-bottom:0px"></label>
													<input type="text" name="addr_mun" class="form-control form-control-register" id="" placeholder="Municipality">
												</div>
												<div class="form-group form-addr-brgy">
													<label class="control-label" id="msgErrorAddrBrgy" style="font-size:12px;margin-bottom:0px"></label>
													<input type="text" name="addr_brgy" class="form-control form-control-register" id="" placeholder="Baranggay">
												</div>
												<div class="form-group form-addr-landmark">
													<label class="control-label" id="msgErrorAddrLandmark" style="font-size:12px;margin-bottom:0px"></label>
													<input type="text" name="addr_landmark" class="form-control form-control-register" id="" placeholder="Landmark">
												</div>
												<input type="text" name="addr_instruc" class="form-control form-control-register" id="" placeholder="Delivery Instructions">

												<!-- <select name="addr_prov" id="addr_prov" class="form-control">
				                    				<option value="" >Choose a Province</option>
				                    			</select> -->
											</div>
											

											<!-- SOME TEXTY
											=============================================================== -->
											<br>
											<div class="row" style="text-align: center; background: #9D9D93; padding: 10px 0; color: white;">
												<span style="font-size: 13px;">NOT AT HOME DURING THE DAY?</span> <br>
												<span style="font-size: 13px;">Have us deliver your order directly to your office</span> <br>	
											</div>
											<br>



											<!-- SHIPPING INFO
											=============================================================== -->
											<span style="font-size: 13px;"><b>SHIPPING INFORMATION</b></span> <br><br>

											<div class="row">
												<input type="checkbox" name="shippingAddressCheck" id="shippingAddressCheck" value="same address" checked>
													<span style="font-size: 11px;">Deliver to the same address</span>
											</div>	
											<br>

											<div class="row" class="shippingAddress" id="shippingAddress" style="display:none">
												<span style="font-size: 13px;">SELECT SHIPPING ADDRESS</span> <br>
												<?php
														if(!empty($shippingAddress)){
															$ship_address_adder_visibility = '';
				                    						foreach($shippingAddress as $p):
				                    							$checked_ship = $p->ship_shipping_address_used == 'yes' ? 'checked' : '';
				                    			?>
																	<div class="row">
																		<div class="col-md-2"><input type="radio" name="shippingAddress" value="<? echo $p->ship_id ?>" <?echo $checked_ship ?> ></div>
																		<div class="col-md-10">
																			<?
																				echo $p->ship_fname.' '.$p->ship_lname.br();
																				echo $p->ship_address.br();
																				echo $p->ship_address_baranggay.' '.$p->ship_address_municipal.' '.$p->ship_address_province.br();
																				echo $p->ship_contact.br();
																			?>
																		</div>
																	</div>	
			                    				<?php
				                    						endforeach;
				                    					}else{
				                    						$ship_address_adder_visibility = 'display:none';
				                    					}
												?>

												<div <?echo $ship_address_adder_toggable?>  style="font-size: 12px;" ><b><span class="glyphicon glyphicon-plus"></span><? echo nbs(3) ?>ADD A NEW SHIPPING ADDRESS</b></div>
												
												<? $shippingAddressState = $ship_address_adder_toggable != ''? 'hidden' : 'visible';?>

												<div id="formAddShip" style="<? echo $address_visibility ?>">
													<input type="hidden" name="shippingAddressState" id="shippingAddressState" value="<?echo $shippingAddressState?>">
													
													<div class="row">
														<div class="col-md-6">
															<div class="form-group form-addr-fname-ship">
																<label class="control-label" id="msgErrorAddrFnameShip" style="font-size:12px;margin-bottom:0px"></label>
																<input type="text" name="addr_fname_ship" class="form-control form-control-register" id="" placeholder="First Name">
															</div>
														</div>
														<div class="col-md-6">
															<div class="form-group form-addr-lname-ship">
																<label class="control-label" id="msgErrorAddrLnameShip" style="font-size:12px;margin-bottom:0px"></label>
																<input type="text" name="addr_lname_ship" class="form-control form-control-register" id="" placeholder="Last Name">
															</div>
														</div>
													</div>
													<div class="form-group form-addr-contact-ship">
														<label class="control-label" id="msgErrorAddrContactShip" style="font-size:12px;margin-bottom:0px"></label>
														<input type="text" name="addr_contact_ship" class="form-control form-control-register" id="" placeholder="Contact Number">
													</div>
													<div class="form-group form-addr-num-ship">
														<label class="control-label" id="msgErrorAddrNumShip" style="font-size:12px;margin-bottom:0px"></label>
														<input type="text" name="addr_num_ship" class="form-control form-control-register" id="" placeholder="Street No., Street Name, House/Lot#, Building Name">
													</div>
													<div class="form-group form-addr-prov-ship">
														<label class="control-label" id="msgErrorAddrProvShip" style="font-size:12px;margin-bottom:0px"></label>
														<input type="text" name="addr_prov_ship" class="form-control form-control-register" id="" placeholder="Province">
													</div>
													<div class="form-group form-addr-mun-ship">
														<label class="control-label" id="msgErrorAddrMunShip" style="font-size:12px;margin-bottom:0px"></label>
														<input type="text" name="addr_mun_ship" class="form-control form-control-register" id="" placeholder="Municipality">
													</div>
													<div class="form-group form-addr-brgy-ship">
														<label class="control-label" id="msgErrorAddrBrgyShip" style="font-size:12px;margin-bottom:0px"></label>
														<input type="text" name="addr_brgy_ship" class="form-control form-control-register" id="" placeholder="Baranggay">
													</div>
													<div class="form-group form-addr-landmark-ship">
														<label class="control-label" id="msgErrorAddrLandmarkShip" style="font-size:12px;margin-bottom:0px"></label>
														<input type="text" name="addr_landmark_ship" class="form-control form-control-register" id="" placeholder="Landmark">
													</div>
													<input type="text" name="addr_instruc_ship" class="form-control form-control-register" id="" placeholder="Delivery Instructions">

												</div>
											</div>
											<br>
										</div>
									</div>

									<!-- END OF CUSTOMER INFORMATION
									======================================================= -->




									<div class="col-md-3" style="padding: 5px;">
										<span style="font-size: 16px;"><b>PAYMENT METHOD</b></span>
											<div class="cart-summary">
												<ul class="pay-method">
													<li><input type="radio" name="paymentMethod" value="cod" checked>&nbsp;CASH ON DELIVERY</li>
													<li><input type="radio" name="paymentMethod" value="bank">&nbsp;BANK DEPOSIT</li>
													<li><input type="radio" name="paymentMethod" value="gcash">&nbsp;GCASH</li>
													<li><input type="radio" name="paymentMethod" value="western">&nbsp;WESTERN UNION</li>
													<li><input type="radio" name="paymentMethod" value="lbc">&nbsp;LBC</li>
													<li><input type="radio" name="paymentMethod" value="paypal">&nbsp;PAYPAL</li>
												</ul>

												<div class="row" style="padding-top:30px">
													<span style="font-size: 13px;">SAFE SHOPPING GURANTEE</span> <br>
												</div>	
											</div>										
										</div>




								</div>


								</form>

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
			  var paymentMethod = '';
		      $(document).ready(function(){
		      	

		      	$('input:radio[name="paymentMethod"]').change(function(){
		      		paymentMethod = $(this).val();
			       
			    });

		   	  // FOR SHIPPING ADDRESS CHECKBOX========================================================
		      
		      $('#checkoutForm #shippingAddressCheck').click(function() {
				    var $this = $(this);
				    // $this will contain a reference to the checkbox   
				    if ($this.is(':checked')) {
				        // the checkbox was checked 
				        $(".form-addr-fname-ship, .form-addr-lname-ship, .form-addr-contact-ship, .form-addr-num-ship, .form-addr-prov-ship, .form-addr-mun-ship, .form-addr-brgy-ship, .form-addr-landmark-ship").removeClass("has-error").removeClass("has-success");
						$('#msgErrorAddrFnameShip,#msgErrorAddrLnameShip,#msgErrorAddrContactShip,#msgErrorAddrNumShip, #msgErrorAddrProvShip, #msgErrorAddrMunShip, #msgErrorAddrBrgyShip, #msgErrorAddrLandmarkShip').hide();
      					$('#shippingAddress').hide();
				    } else {
				        $('#shippingAddress').show();
				    }

				    if('<? echo $ship_address_adder_toggable ?>' != ''){
					    $("#formAddShip").hide();
					    $('#shippingAddressState').val('hidden');
					}else{
						$('#shippingAddressState').val('visible');
					}
				});

			  // END SHIPPING ADDRESS CHECKBOX========================================================

			  // FOR ADD ADRESS TOGGLE========================================================
			  	$("#addBillingAddress").click(function(){
			  		console.log('togle');
				  $("#formAddBill").toggle('fast',function(){
				  	if ($(this).is(':hidden')) {
						$('#billingAddressState').val('hidden');
					} else {
						$('#billingAddressState').val('visible');
					}
					return false;
				  });
				});

			  	$("#addShippingAddress").click(function(){
				  $("#formAddShip").toggle('fast',function(){
				  	if ($(this).is(':hidden')) {
						console.log('hidden');
						$('#shippingAddressState').val('hidden');
					} else {
						console.log('visible');
						$('#shippingAddressState').val('visible');
					}
					return false;
				  });
				});

		    });
		</script>




		<!-- FOR CHECKOUT -->
    <script type="text/javascript">
      $(document).ready(function(){

        var base = "<?php echo base_url()?>";
        
      $('#waiting').hide(500);
      $('#msgErrorFname, #msgErrorLname, #msgErrorEmail, #msgErrorPass, #msgErrorConPass, #msgErrorAddrFname,#msgErrorAddrLname,#msgErrorAddrContact,#msgErrorAddrNum, #msgErrorAddrProv, #msgErrorAddrMun, #msgErrorAddrBrgy, #msgErrorAddrLandmark, #msgErrorAddrFnameShip,#msgErrorAddrLnameShip,#msgErrorAddrContactShip,#msgErrorAddrNumShip, #msgErrorAddrProvShip, #msgErrorAddrMunShip, #msgErrorAddrBrgyShip, #msgErrorAddrLandmarkShip').hide();
      $('.glyphicon-email, .glyphicon-pass, .glyphicon-conPass').hide();


		// form checkout========================================================
      $('#checkoutForm').submit(function(e){
      	e.preventDefault();

      	console.log('paymentMethod -- '+paymentMethod);
      	if(paymentMethod != 'paypal'){
      		console.log('sht');
	        $('#waiting').show(500);
	        $("#btnOrder").button('loading');

	        $.post($('#checkoutForm').attr('action'), $('#checkoutForm').serialize(), function( data ) {
	          $("#btnOrder").button('reset');
	          $('#waiting').fadeOut("slow", function(){
	            if(data.stat == 0){
	              // ======== REGISTER FORM THINGY ======================================================
	              if(data.msgErrorFname != ""){
	                $('#msgErrorFname').html(data.msgErrorFname);
	                $(".form-fname").removeClass("has-success").addClass("has-error");
	              }else{
	                $('#msgErrorFname').text('Correct');
	                $(".form-fname").removeClass("has-error").addClass("has-success");
	              }

	              if(data.msgErrorLname != ""){
	                $('#msgErrorLname').html(data.msgErrorLname);
	                $(".form-lname").removeClass("has-success").addClass("has-error");
	              }else{
	                $('#msgErrorLname').text('Correct');
	                $(".form-lname").removeClass("has-error").addClass("has-success");
	              }

	              if(data.msgErrorEmail != ""){
	                $('#msgErrorEmail').html(data.msgErrorEmail);
	                $(".form-email").removeClass("has-success").addClass("has-error");
	                $(".glyphicon-email").show().addClass("glyphicon-remove");
	              }else{
	                $('#msgErrorEmail').text('Correct');
	                $(".form-email").removeClass("has-error").addClass("has-success");
	                $(".glyphicon-email").show().addClass("glyphicon-ok");
	              }

	              if(data.msgErrorPass != ""){
	                $('#msgErrorPass').html(data.msgErrorPass);
	                $(".form-pass").removeClass("has-success").addClass("has-error");
	                $(".glyphicon-pass").show().addClass("glyphicon-remove");
	              }else{
	                $('#msgErrorPass').text('Correct');
	                $(".form-pass").removeClass("has-error").addClass("has-success");
	                $(".glyphicon-pass").show().addClass("glyphicon-ok");
	              }

	              if(data.msgErrorConPass != ""){
	                $('#msgErrorConPass').html(data.msgErrorConPass);
	                $(".form-conPass").removeClass("has-success").addClass("has-error");
	                $(".glyphicon-conPass").show().addClass("glyphicon-remove");
	              }else{
	                $('#msgErrorConPass').text('Correct');
	                $(".form-conPass").removeClass("has-error").addClass("has-success");
	                $(".glyphicon-conPass").show().addClass("glyphicon-ok");
	              }

	              // ======== BILLING ADDRESS THINGY ======================================================
	              if(data.msgErrorAddrFname != ""){
	                $('#msgErrorAddrFname').html(data.msgErrorAddrFname);
	                $(".form-addr-fname").removeClass("has-success").addClass("has-error");
	              }else{
	                $('#msgErrorAddrFname').text('Correct');
	                $(".form-addr-fname").removeClass("has-error").addClass("has-success");
	              }

	              if(data.msgErrorAddrLname != ""){
	                $('#msgErrorAddrLname').html(data.msgErrorAddrLname);
	                $(".form-addr-lname").removeClass("has-success").addClass("has-error");
	              }else{
	                $('#msgErrorAddrLname').text('Correct');
	                $(".form-addr-lname").removeClass("has-error").addClass("has-success");
	              }

	              if(data.msgErrorAddrContact != ""){
	                $('#msgErrorAddrContact').html(data.msgErrorAddrContact);
	                $(".form-addr-contact").removeClass("has-success").addClass("has-error");
	              }else{
	                $('#msgErrorAddrContact').text('Correct');
	                $(".form-addr-contact").removeClass("has-error").addClass("has-success");
	              }

	              if(data.msgErrorAddrNum != ""){
	                $('#msgErrorAddrNum').html(data.msgErrorAddrNum);
	                $(".form-addr-num").removeClass("has-success").addClass("has-error");
	              }else{
	                $('#msgErrorAddrNum').text('Correct');
	                $(".form-addr-num").removeClass("has-error").addClass("has-success");
	              }

	              if(data.msgErrorAddrProv != ""){
	                $('#msgErrorAddrProv').html(data.msgErrorAddrProv);
	                $(".form-addr-prov").removeClass("has-success").addClass("has-error");
	              }else{
	                $('#msgErrorAddrProv').text('Correct');
	                $(".form-addr-prov").removeClass("has-error").addClass("has-success");
	              }

	              if(data.msgErrorAddrMun != ""){
	                $('#msgErrorAddrMun').html(data.msgErrorAddrMun);
	                $(".form-addr-mun").removeClass("has-success").addClass("has-error");
	              }else{
	                $('#msgErrorAddrMun').text('Correct');
	                $(".form-addr-mun").removeClass("has-error").addClass("has-success");
	              }

	              if(data.msgErrorAddrBrgy != ""){
	                $('#msgErrorAddrBrgy').html(data.msgErrorAddrBrgy);
	                $(".form-addr-brgy").removeClass("has-success").addClass("has-error");
	              }else{
	                $('#msgErrorAddrBrgy').text('Correct');
	                $(".form-addr-brgy").removeClass("has-error").addClass("has-success");
	              }

	              if(data.msgErrorAddrLandmark != ""){
	                $('#msgErrorAddrLandmark').html(data.msgErrorAddrLandmark);
	                $(".form-addr-landmark").removeClass("has-success").addClass("has-error");
	              }else{
	                $('#msgErrorAddrLandmark').text('Correct');
	                $(".form-addr-landmark").removeClass("has-error").addClass("has-success");
	              }

	              // ======== SHIPPING ADDRESS THINGY ======================================================
		              if(!$('#shippingAddressCheck').is(':checked')){
		              	if(data.msgErrorAddrFnameShip != ""){
		                $('#msgErrorAddrFnameShip').html(data.msgErrorAddrFnameShip);
		                $(".form-addr-fname-ship").removeClass("has-success").addClass("has-error");
		              }else{
		                $('#msgErrorAddrFnameShip').text('Correct');
		                $(".form-addr-fname-ship").removeClass("has-error").addClass("has-success");
		              }

		              if(data.msgErrorAddrLnameShip != ""){
		                $('#msgErrorAddrLnameShip').html(data.msgErrorAddrLnameShip);
		                $(".form-addr-lname-ship").removeClass("has-success").addClass("has-error");
		              }else{
		                $('#msgErrorAddrLnameShip').text('Correct');
		                $(".form-addr-lname-ship").removeClass("has-error").addClass("has-success");
		              }

		              if(data.msgErrorAddrContactShip != ""){
		                $('#msgErrorAddrContactShip').html(data.msgErrorAddrContactShip);
		                $(".form-addr-contact-ship").removeClass("has-success").addClass("has-error");
		              }else{
		                $('#msgErrorAddrContactShip').text('Correct');
		                $(".form-addr-contact-ship").removeClass("has-error").addClass("has-success");
		              }

		              if(data.msgErrorAddrNumShip != ""){
		                $('#msgErrorAddrNumShip').html(data.msgErrorAddrNumShip);
		                $(".form-addr-num-ship").removeClass("has-success").addClass("has-error");
		              }else{
		                $('#msgErrorAddrNumShip').text('Correct');
		                $(".form-addr-num-ship").removeClass("has-error").addClass("has-success");
		              }

		              if(data.msgErrorAddrProvShip != ""){
		                $('#msgErrorAddrProvShip').html(data.msgErrorAddrProvShip);
		                $(".form-addr-prov-ship").removeClass("has-success").addClass("has-error");
		              }else{
		                $('#msgErrorAddrProvShip').text('Correct');
		                $(".form-addr-prov-ship").removeClass("has-error").addClass("has-success");
		              }

		              if(data.msgErrorAddrMunShip != ""){
		                $('#msgErrorAddrMunShip').html(data.msgErrorAddrMunShip);
		                $(".form-addr-mun-ship").removeClass("has-success").addClass("has-error");
		              }else{
		                $('#msgErrorAddrMunShip').text('Correct');
		                $(".form-addr-mun-ship").removeClass("has-error").addClass("has-success");
		              }

		              if(data.msgErrorAddrBrgyShip != ""){
		                $('#msgErrorAddrBrgyShip').html(data.msgErrorAddrBrgyShip);
		                $(".form-addr-brgy-ship").removeClass("has-success").addClass("has-error");
		              }else{
		                $('#msgErrorAddrBrgyShip').text('Correct');
		                $(".form-addr-brgy-ship").removeClass("has-error").addClass("has-success");
		              }

		              if(data.msgErrorAddrLandmarkShip != ""){
		                $('#msgErrorAddrLandmarkShip').html(data.msgErrorAddrLandmarkShip);
		                $(".form-addr-landmark-ship").removeClass("has-success").addClass("has-error");
		              }else{
		                $('#msgErrorAddrLandmarkShip').text('Correct');
		                $(".form-addr-landmark-ship").removeClass("has-error").addClass("has-success");
		              }
		          }

	              // ======== FADING ANIMATION THINGY ======================================================
	              $( "#msgErrorFname, #msgErrorLname, #msgErrorEmail, #msgErrorPass, #msgErrorConPass, #msgErrorAddrFname,#msgErrorAddrLname,#msgErrorAddrContact,#msgErrorAddrNum, #msgErrorAddrProv, #msgErrorAddrMun, #msgErrorAddrBrgy, #msgErrorAddrLandmark" ).hide().fadeIn( "slow");
	              if(!$('#shippingAddressCheck').is(':checked')){
	              	$( "#msgErrorAddrFnameShip,#msgErrorAddrLnameShip,#msgErrorAddrContactShip,#msgErrorAddrNumShip, #msgErrorAddrProvShip, #msgErrorAddrMunShip, #msgErrorAddrBrgyShip, #msgErrorAddrLandmarkShip" ).hide().fadeIn( "slow");
	              }
	            }
	                
	            if(data.stat == 1){
	              //making forms appear success
	                $('#msgErrorFname, #msgErrorLname, #msgErrorEmail, #msgErrorPass, #msgErrorConPass, #msgErrorAddrFname,#msgErrorAddrLname,#msgErrorAddrContact, #msgErrorAddrNum, #msgErrorAddrProv, #msgErrorAddrMun, #msgErrorAddrBrgy, #msgErrorAddrLandmark, #msgErrorAddrFnameShip,#msgErrorAddrLnameShip,#msgErrorAddrContactShip, #msgErrorAddrNumShip, #msgErrorAddrProvShip, #msgErrorAddrMunShip, #msgErrorAddrBrgyShip, #msgErrorAddrLandmarkShip').hide();
	      			$('.glyphicon-email, .glyphicon-pass, .glyphicon-conPass').hide();
	              
	                $(".form-group").removeClass("has-error").removeClass("has-success");
	                $('#checkoutForm').trigger("reset");
	                $( "#msg" ).removeClass("alert-danger").addClass("alert-success");
	                $( "#msg" ).hide().fadeIn( "slow").text("Processed Successfully.");
	                document.location = "<?php echo base_url()?>products/order_received/"+data.order_id;
	            }


	            // if(data.st == 2){
	            //   $( "#msg" ).hide().fadeIn( "slow").text("Error: ".data.errorMail);
	            // }
	          });
	        }, 'json');

		}else{
			$.post($('#checkoutForm').attr('action'), $('#checkoutForm').serialize(), function(data){
				document.location = data;
			});
		}
        return false;     
      });
// END formCheckout========================================================
	
    });
    </script>
<!-- END FOR CHECKOUT -->

		
	
</body>


</html>





















 