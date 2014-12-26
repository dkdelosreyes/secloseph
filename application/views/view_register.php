<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><?php echo $page_title ?></title>

	<!-- css-->
	<?php include 'includes/view_css.php'; ?>
	
	<?php include 'includes/view_script_fblogin.php'; ?>
  

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
			
			
		<!-- REGISTER BLOCK =================================================================================================-->
			<div class="row">
				<div class="brandsWrapper">
					<div class="brandsInner">
						<div class="container">
							<div class="row">
								<div class="col-md-12">

									<div class="col-md-7 register-photo">
										<img src="<?php echo base_url('assets/img/dara.jpg')?>">
									</div>

									<div class="col-md-5 register-div">

										<div class="register-title">
							    			<font class="font-title-register" >REGISTER</font>
							    		</div>

							    		<div class="row register-div-facebook">
							    			<div class="col-md-6">
							    				<font class="font-note-register">Are you on facebook?</font>
							    			</div>
							    			<div class="col-md-6">
							    				<div class="fb-login-button" scope="public_profile,email"  onlogin="checkLoginState();" data-max-rows="1" data-size="large" data-show-faces="false" data-auto-logout-link="false"></div>
							    			</div>
							    			<p class="help-block" style="clear:both">We will never share any information without your permission.</p>
							    		</div>
							    		<br>
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

							    		<form action="<?php echo base_url('home/checkRegister')?>" method="post" role="form" id="formRegister">
							    			<div class="register-body">

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
												<div class="div-footer-register">
													<input type="submit" class="btn btn-danger btn-lg" id="btnRegister" data-loading-text="Processing..." value="Register">
												</div>
							    			</div>
							    		</form>

									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		<!-- END OF REGISTER BLOCK =======================================================================================-->



			
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
	

	<!-- FOR REGISTER -->
    <script type="text/javascript">
      $(document).ready(function(){
        var base = "<?php echo base_url()?>";
        
      $('#waiting').hide(500);
      $('#msgErrorFname, #msgErrorLname, #msgErrorEmail, #msgErrorPass, #msgErrorConPass').hide();
      $('.glyphicon-email, .glyphicon-pass, .glyphicon-conPass').hide();


		// formRegister========================================================
      $('#formRegister').submit(function(){
        $('#waiting').show(500);
        $("#btnRegister").button('loading');

        $.post($('#formRegister').attr('action'), $('#formRegister').serialize(), function( data ) {
          $("#btnRegister").button('reset');
          $('#waiting').fadeOut("slow", function(){
            if(data.stat == 0){
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


              $( "#msgErrorFname" ).hide().fadeIn( "slow");
              $( "#msgErrorLname" ).hide().fadeIn( "slow");
              $( "#msgErrorCnum" ).hide().fadeIn( "slow");
              $( "#msgErrorEmail" ).hide().fadeIn( "slow");
              $( "#msgErrorPass" ).hide().fadeIn( "slow");
              $( "#msgErrorConPass" ).hide().fadeIn( "slow");
            }
                
            if(data.stat == 1){
              //making forms appear success
                $('#msgErrorFname, #msgErrorLname, #msgErrorEmail, #msgErrorPass, #msgErrorConPass').hide();
      			$('.glyphicon-email, .glyphicon-pass, .glyphicon-conPass').hide();
              
                $(".form-group").removeClass("has-error").removeClass("has-success");
                $('#formRegister').trigger("reset");
                $( "#msg" ).removeClass("alert-danger").addClass("alert-success");
                $( "#msg" ).hide().fadeIn( "slow").text("Registered Successfully.");
                document.location = "<?php echo base_url()?>home";
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

	
	
</body>


</html>





















