			<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="static">
			  <div class="modal-dialog">
			    <div class="modal-content">
			    	<div class="modal-content-inner">
			    		<button type="button" class="close close-login" data-dismiss="modal" aria-hidden="true">&times;</button>
			    		<div>
			    			<font class="font-title-login">LOG IN</font>
			    		</div>

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
							  	<div class="form-group form-group-login">
							    	<input type="password" name="pass" class="form-control form-control-login" placeholder="Password">
							  	</div>
							  	<a href=""><span>Forgot your password?</span></a>
			    			</div>
			    			<div class="modal-footer-login">
								<input type="submit" id="btnLogin" class="btn btn-danger btn-lg" data-loading-text="Processing..." value="Log in">
								<?php echo br(2)?>
								<font class="font-note-login">Don't have an account yet? <a href="<?php echo base_url('home/register')?>" ><span>Register Now!</span></a> </font>
							</div>
			    		</form>
			    	</div>
			    </div>
			  </div>
			</div>



<!-- SCRIPTS SECTION ======================================================================================================= -->
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
		                	document.location = "<?php echo base_url()?>home";
		                });
		             }
		          });
		              
		        }, 'json');
		        return false;     
		      });
			  // END formLogin========================================================

			  // FOR loginModal========================================================
				$('#loginModal').on('hide.bs.modal', function (e) {
					$(".form-group-login").removeClass("has-error");
					$("#msgLogin").hide();
					$('#formLogin').trigger("reset");
				});
			  // END loginModal========================================================

			  // FOR btnLogout========================================================
				$('#btnLogout').click(function (event){ 
				     event.preventDefault(); 
				     $.ajax({
				        url: $(this).attr('href')
				        ,success: function(response) {
				            location.reload();
				        }
				     })
				     return false;
				});
			// END btnLogout========================================================

		    });
		    </script>
			<!-- END FOR LOGIN -->













