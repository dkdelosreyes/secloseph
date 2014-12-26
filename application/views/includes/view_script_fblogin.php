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

                if(data.exist){
                	document.location = "<?php echo base_url()?>home";
                }else{
				    var email = document.getElementById("email");
				    var fname = document.getElementById("fname");
				    var lname = document.getElementById("lname");
				    var genderF = document.getElementById("genderF");
				    var genderM = document.getElementById("genderM");

					email.value = response.email;
					fname.value = response.first_name;
					lname.value = response.last_name;

					if(response.gender == "female")
				    	genderF.checked = true;
				    else
				    	genderM.checked = true;
                }
            }, 'json'
          );

      });
    }
</script>
  <!-- END FACEBOOK LOGIN script -->