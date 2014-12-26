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
									<h3 style="margin-left:20px" >Confirm Payment</h3>

									<div class="col-md-2" style="padding: 30px;">
										
									</div>

									<div class="col-md-8" style="padding: 30px;">




									<!-- FORMS AREA -->
							    		<form action="<?php echo base_url('products/checkConfirmPayment')?>" method="post" role="form" id="formConfirmPayment" enctype="multipart/form-data">
							    			<div class="register-body">


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

											  	<div class="form-group form-order-number has-feedback">
											    	<label class="control-label" id="msgErrorOrderNumber" style="font-size:12px;margin-bottom:0px"></label>
							                      	<input type="text" name="order_number" class="form-control form-control-order-number " id="order_number" placeholder="Order Number">
							                      	<span class="glyphicon form-control-feedback glyphicon-order-number"></span>
											  	</div>

											  	<div class="form-group form-bank has-feedback">
											    	<label class="control-label" id="msgErrorBank" style="font-size:12px;margin-bottom:0px"></label>
							                      	<select name="bank" id="bank" class="form-control">
				                    					<option value="" >Choose Bank</option>
				                    					<?foreach($banks as $p):?>
							                    			<option value="<? echo $p->bank_name;?>" > <? echo $p->bank_name?></option>
						                    			<?endforeach;?>
				                    				</select>
							                      	<span class="glyphicon form-control-feedback glyphicon-bank"></span>
											  	</div>

											  	<div class="form-group form-branch has-feedback">
											    	<label class="control-label" id="msgErrorBranch" style="font-size:12px;margin-bottom:0px"></label>
							                      	<input type="text" name="branch" class="form-control form-control-branch " id="branch" placeholder="Branch Name/ Branch Code">
							                      	<span class="glyphicon form-control-feedback glyphicon-branch"></span>
											  	</div>

											  	<div class="form-group form-name has-feedback">
											    	<label class="control-label" id="msgErrorName" style="font-size:12px;margin-bottom:0px"></label>
							                      	<input type="text" name="name" class="form-control form-control-name " id="name" placeholder="Customer Name">
							                      	<span class="glyphicon form-control-feedback glyphicon-name"></span>
											  	</div>

							                    <div class="form-group form-amount has-feedback">
							                    	<label class="control-label" id="msgErrorAmount" style="font-size:12px;margin-bottom:0px"></label>
												    <div class="input-group col-md-5">
												    	<div class="input-group-addon" style="font-size:20px">&#8369;</div>
													    	<input class="form-control form-control-amount" name="amount" id="amount" type="number" placeholder="Enter Amount">
													    </div>
												    <span class="glyphicon form-control-feedback glyphicon-amount"></span>
												</div>

											  	<div class="form-group form-date has-feedback">
							                    	<label class="control-label" id="msgErrorDate" style="font-size:12px;margin-bottom:0px"></label>
												    <div class="input-group col-md-5">
												    	<div class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></div>
												    	<div class="input-append date " id="datepicker" data-date="dateValue: Customer.DateOfBirth" data-date-format="dd-mm-yyyy">
														    <input class="span2 form-control" name="date" id="date" size="16" type="text" data-bind="value: Customer.DateOfBirth" readonly="readonly" style="border-radius:0px 3px 3px 0px;background:white" />
														    <span class="add-on"><i class="icon-calendar"></i></span>
														</div>   
													</div>
												    <span class="glyphicon form-control-feedback glyphicon-date"></span>
												</div>


											  	<div class="form-group form-message has-feedback">
							                      	<textarea class="form-control" name="message" id="message" placeholder="Message"></textarea>
											  	</div>

											  	<!-- <div class="form-group form-pass has-feedback"> -->
											    	<!-- <label class="control-label" id="msgErrorDepositSlip" style="font-size:12px;margin-bottom:0px"></label>
							                      	<input type="file" name="deposit_slip"  id="deposit_slip" placeholder="Upload deposit slip">
							                      	<span class="glyphicon form-control-feedback glyphicon-deposit-slip"></span> -->
											  	<!-- </div> -->

											  	<div class="div-footer-register">
													<input type="submit" class="btn btn-danger btn-lg" id="btnConfirmPayment" data-loading-text="Processing..." value="Confirm Payment">
												</div>

							    			</div>
							    		</form>

									<!-- END FORMS AREA -->
										


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

		<script src="<?php echo base_url('assets/js/bootstrap-datepicker.js')?>"></script>

		<script type="text/javascript">
			$('#datepicker').datepicker();
		</script>

		<!-- FOR REGISTER -->
    <script type="text/javascript">
      $(document).ready(function(){
        var base = "<?php echo base_url()?>";
        
      $('#waiting').hide(500);
      $('#msgErrorOrderNumber, #msgErrorBank, #msgErrorBranch, #msgErrorName, #msgErrorAmount, #msgErrorDate, #msgErrorDepositSlip').hide();
      $('.glyphicon-order-number, .glyphicon-bank, .glyphicon-branch, .glyphicon-name, .glyphicon-amount, .glyphicon-date, .glyphicon-deposit-slip').hide();


		// formRegister========================================================
      $('#formConfirmPayment').submit(function(){
        $('#waiting').show(500);
        $("#btnConfirmPayment").button('loading');

        $.post($('#formConfirmPayment').attr('action'), $('#formConfirmPayment').serialize(), function( data ) {
          $("#btnConfirmPayment").button('reset');
          $('#waiting').fadeOut("slow", function(){

            if(data.stat == 0){
            	if(data.msgErrorOrderNumber != ""){
	            	$('#msgErrorOrderNumber').html(data.msgErrorOrderNumber);
	                $(".form-order-number").removeClass("has-success").addClass("has-error");
	            }else{
	                $('#msgErrorOrderNumber').text('Correct');
	                $(".form-order-number").removeClass("has-error").addClass("has-success");
	            }

         		if(data.msgErrorBank != ""){
	            	$('#msgErrorBank').html(data.msgErrorBank);
	                $(".form-bank").removeClass("has-success").addClass("has-error");
	            }else{
	                $('#msgErrorBank').text('Correct');
	                $(".form-bank").removeClass("has-error").addClass("has-success");
	            }

	            if(data.msgErrorBranch != ""){
	            	$('#msgErrorBranch').html(data.msgErrorBranch);
	                $(".form-branch").removeClass("has-success").addClass("has-error");
	            }else{
	                $('#msgErrorBranch').text('Correct');
	                $(".form-branch").removeClass("has-error").addClass("has-success");
	            }

	            if(data.msgErrorName != ""){
	            	$('#msgErrorName').html(data.msgErrorName);
	                $(".form-name").removeClass("has-success").addClass("has-error");
	            }else{
	                $('#msgErrorName').text('Correct');
	                $(".form-name").removeClass("has-error").addClass("has-success");
	            }

	            if(data.msgErrorAmount != ""){
	            	$('#msgErrorAmount').html(data.msgErrorAmount);
	                $(".form-amount").removeClass("has-success").addClass("has-error");
	            }else{
	                $('#msgErrorAmount').text('Correct');
	                $(".form-amount").removeClass("has-error").addClass("has-success");
	            }

	            if(data.msgErrorDate != ""){
	            	$('#msgErrorDate').html(data.msgErrorDate);
	                $(".form-date").removeClass("has-success").addClass("has-error");
	            }else{
	                $('#msgErrorDate').text('Correct');
	                $(".form-date").removeClass("has-error").addClass("has-success");
	            }

	            if(data.msgErrorDepositSlip != ""){
	            	$('#msgErrorDepositSlip').html(data.msgErrorDepositSlip);
	                // $(".form-de").removeClass("has-success").addClass("has-error");
	            }else{
	                $('#msgErrorDepositSlip').text('Correct');
	                // $(".form-date").removeClass("has-error").addClass("has-success");
	            }


              $( "#msgErrorOrderNumber" ).hide().fadeIn( "slow");
              $( "#msgErrorBank" ).hide().fadeIn( "slow");
              $( "#msgErrorBranch" ).hide().fadeIn( "slow");
              $( "#msgErrorName" ).hide().fadeIn( "slow");
              $( "#msgErrorAmount" ).hide().fadeIn( "slow");
              $( "#msgErrorDate" ).hide().fadeIn( "slow");
              $( "#msgErrorDepositSlip" ).hide().fadeIn( "slow");
            }
                
            if(data.stat == 1){
              //making forms appear success
                $('#msgErrorOrderNumber, #msgErrorBank, #msgErrorBranch, #msgErrorName, #msgErrorAmount, #msgErrorDate, #msgErrorDepositSlip').hide();
      			$('.glyphicon-order-number, .glyphicon-bank, .glyphicon-branch, .glyphicon-name, .glyphicon-amount, .glyphicon-date, .glyphicon-deposit-slip').hide();
              
                $(".form-group").removeClass("has-error").removeClass("has-success");
                $('#formConfirmPayment').trigger("reset");
                $( "#msg" ).removeClass("alert-danger").addClass("alert-success");
                $( "#msg" ).hide().fadeIn( "slow").text("Payment Confirmed Successfully.");
                // document.location = "<?php echo base_url()?>home";
            }

            if(data.st == 2){
              $( "#msg" ).hide().fadeIn( "slow").text("Error: ".data.errorMail);
            }
          });
              
        }, 'json');
        return false;     
      });
// END formRegister========================================================
    });
    </script>
<!-- END FOR REGISTER -->
		
		<!-- Modal login-->
		<?php include 'includes/view_login.php'; ?>

		
	
</body>


</html>





















