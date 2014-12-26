<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><?php echo $page_title ?></title>

	<!-- css-->
	<?php include 'includes/view_css.php'; ?>
	
	<!-- <script>
		var fblogin_redirect_page = "<?php echo base_url()?>checkout_new_customer/fblogin";
	</script> -->
	<!-- css-->
	<?php //include 'includes/view_script_fblogin.php'; ?>

	<!-- FACEBOOK LOGIN script -->
    <script>
    // This is called with the results from from FB.getLoginStatus().
    function statusChangeCallback(response) {
      if (response.status === 'connected') {
        // Logged into your app and Facebook.
        testAPI();
      } 
    }

    function checkLoginState() {
      FB.getLoginStatus(function(response) {
        statusChangeCallback(response);
      });
    }

    window.fbAsyncInit = function() {
    FB.init({
      appId      : '745267372185565',
      cookie     : true,  // enable cookies to allow the server to access 
                          // the session
      xfbml      : true,  // parse social plugins on this page
      version    : 'v2.0' // use version 2.0
    });

    };

    // Load the SDK asynchronously
    (function(d, s, id) {
      var js, fjs = d.getElementsByTagName(s)[0];
      if (d.getElementById(id)) return;
      js = d.createElement(s); js.id = id;
      js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&appId=745267372185565&version=v2.0";
      fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));

    // Here we run a very simple test of the Graph API after login is
    // successful.  See statusChangeCallback() for when this call is made.
    function testAPI() {
      $('#waiting').show(500);
      FB.api('/me', function(response) {

      	   $.post("<?php echo base_url()?>home/checkFacebookExist", {
              email: response.email
            }, function( data ) {
            	$('#waiting').fadeOut("slow");

                // if(data.exist){
                	document.location = "<?php echo base_url()?>checkout_new_customer";
     //            }else{
				 //    var email = document.getElementById("email");
				 //    var fname = document.getElementById("fname");
				 //    var lname = document.getElementById("lname");
				 //    var genderF = document.getElementById("genderF");
				 //    var genderM = document.getElementById("genderM");

					// email.value = response.email;
					// fname.value = response.first_name;
					// lname.value = response.last_name;

					// if(response.gender == "female")
				 //    	genderF.checked = true;
				 //    else
				 //    	genderM.checked = true;
     //            }
            }, 'json'
          );

      });
    }
</script>
  <!-- END FACEBOOK LOGIN script -->


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
									<div class="col-md-12" style="padding: 10px 20px;">
										<? echo br() ?>
										<span style="color: #9D9D93;"><b>SIGN UP OR LOGIN TO YOUR ACCOUNT TO FINALIZE THE PURCHASE</b></span>
									</div>

									<div class="col-md-6" style="padding: 30px 70px; border-right: 1px solid #C5CFC6; box-shadow: 10px 0 5px -5px #E0E0DE;">
											



										
										    		<div>
										    			<font class="font-title-login">LOG IN</font><br>
										    			<span style="color: #C5CFC6; font-weight: bolder;">FOR REGISTERED CUSTOMERS</span>
										    		</div>
										    		<hr>
										    		<? echo br() ?>

										    		<!-- NOTIFICATIONS -->
													<div class="notification">
														<div class="alert alert-danger" id="msgLogin" style="display:none"></div>
														<div class="progress progress-striped active" id="waitingLogin" >
															<div class="progress-bar"  role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
														    	Please wait...
														    </div>
														</div>
														<noscript>Please enable your JavaScript</noscript>
													</div>
													<!-- END OF NOTIFICATIONS -->

										    		<form action="<?php echo base_url('home/checkLogin')?>" method="post" role="form" id="formLogin">
										    			<div class="modal-body-login">
										    				<div class="form-group form-group-login">
														    	<input type="email" name="email" class="form-control form-control-login" placeholder="Enter email" autocomplete="off">
														  	</div>
														  	<? echo br() ?>
														  	<div class="form-group form-group-login">
														    	<input type="password" name="pass" class="form-control form-control-login" placeholder="Password">
														  	</div>
														  	<a href=""><span>Forgot your password?</span></a>
										    			</div>
										    			
															<input type="submit" id="btnLogin" class="btn btn-danger btn-lg" data-loading-text="Processing..." value="Log in">
															
														
										    		</form>


									</div>

									<div class="col-md-6" style="padding: 30px; text-align: center;">


										<div class="row" style="height:250px">
											<? echo br(3) ?>
											<span style="color: #9D9D93;"><b>NEW TO SECRET CLOSET?</b></span><? echo br(3) ?>
											<a href="<?php echo site_url('products/checkout_new_customer')?>" style="background: #9D9D93; padding: 20px; color: white;">CONTINUE AS NEW CUSTOMER</a>
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
		


		<!-- FOR LOGIN -->
		    <script type="text/javascript">
		      $(document).ready(function(){
		        var base = "<?php echo base_url()?>";
		        
			      $('#waitingLogin').hide(500);

			   	  // FOR formLogin========================================================
			      $('#formLogin').submit(function(){
			        $('#waitingLogin').show(500);
			        $("#btnLogin").button('loading');

			        $.post($('#formLogin').attr('action'), $('#formLogin').serialize(), function( data ) {
			          $("#btnLogin").button('reset');
			          $('#waitingLogin').fadeOut("slow", function(){
			             if(data.stat == 0){
			             	$(".form-group-login").addClass("has-error");
			                $( "#msgLogin" ).removeClass("alert-success").addClass("alert-danger");
			                $( "#msgLogin" ).hide().fadeIn( "slow").text("Invalid Credentials");
			             }else{
			             	$(".form-group-login").removeClass("has-error");
			                $("#msgLogin").removeClass("alert-danger").addClass("alert-success");
			                $('#formLogin').trigger("reset");
			                $("#msgLogin").hide().fadeIn( "slow").text("Successful. Logging in....").fadeOut("fast", function(){
			                	$('#loginModal').modal('hide');
			                	document.location = "<?php echo base_url()?>products/checkout";
			                });
			             }
			          });
			              
			        }, 'json');
			        return false;     
			      });
				  // END formLogin========================================================

			   });
			</script>

	
	
</body>


</html>





















