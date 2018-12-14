<!DOCTYPE html>
<html>
<head>
	<title>Register</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>utils/Css/Register.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>utils/Css/showLoading.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>utils/Css/jnoty.css">
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<!--<script src="https://code.jquery.com/jquery-1.12.4.min.js" 
        integrity="sha384-nvAa0+6Qg9clwYCGGPpDQLVpLNn0fRaROjHqs13t4Ggj3Ez50XnGQqc/r8MhnRDZ" 
        crossorigin="anonymous"></script>-->
	<script src="<?php echo base_url(); ?>utils/Js/loader.js"></script>
	<script src="<?php echo base_url(); ?>utils/Js/jnoty.js"></script>
	
	
	<script type="text/javascript">
		$(document).ready(function(){

			function show_msg(msg,theme){
				 $.jnoty(msg, {
                    header: 'Message',
                    sticky: false,
                    theme: 'jnoty-'+theme,
                    position: 'bottom-left',
                    icon: 'fa fa-check-circle'
                });
			}

			$('#click_login').click(function(){
				$('.register_page_last').hide();
				$('.register_own_email').hide();
				$('#login').show('fast');
			});

			
			$('#reg_own_email').click(function(){
				$('.register_page_last').hide();
				$('.register_own_email').show('fast');
			});
			
			//from register page
			$('#go_login').click(function(){
				$('.register_page_last').hide();
				$('#login').show('fast');
			});


			//from forget Password page
			$('#go_login_from_recover').click(function(){
				$('#recover_password').hide();
				$('#login').show('fast');
			});

			
			
			$('#go_register').click(function(){
				$('#login').hide();
				$('.register_page_last').show('fast');
			});

			$('#click_forget_password').click(function(){
				$('#login').hide();
				$('#recover_password').show('fast');
			});

			$('#close_hint').click(function(){
				$('.password_hint').hide();
			});

			$('#close_hint_set_pass').click(function(){
				$('.password_hint').hide();
			});
			
			
			
			
			$('#submit_form_email_register').click(function(){
				$('#submit_form_email_register').attr('disabled','disabled');
				var dataString = $("#email_register").serialize();
			    var url="Register_with_social/validate_form_register";
			        $.ajax({
				        type:"POST",
				        url:"<?php echo base_url() ?>"+url,
				        data:dataString,
				        dataType: "json",
				        success:function (data) {
							if(data === true){
								location.reload();
								show_msg('Registered successfully','success');
							}else{
								$('.error').show();
								$('#email_error').html(data.email);
								$('#password_error').html(data.password);
								$('.error').delay(3000).fadeOut();
								$('#submit_form_email_register').removeAttr('disabled','disabled');
								//validation
							}	
				        }
			        });     
			});
			
			
			$('#general_login').click(function(){
				$('#general_login').attr('disabled','disabled');
				var form_data = $("#login_by_email_form").serialize();
			    var url="Register_with_social/validate_form_login";
			        $.ajax({
				        type:"POST",
				        url:"<?php echo base_url() ?>"+url,
				        data:form_data,
				        dataType: "json",
				        success:function (data) {
							if(data === true){
								location.reload();
							}
							else if(data === false){
								$('#login_failed').show();
								$('.error').css('top','0px');
								$('#general_login').removeAttr('disabled','disabled');
								$('#login_failed').text("Login Failed. Please check details.");
								$('#login_failed').delay(3000).fadeOut();
							}
							else{
								$('#email_login_error').show();
								$('#password_login_error').show();
								$('#go_to_login').css('top','74%');
								$('#general_login').removeAttr('disabled','disabled');
								$('#email_login_error').html(data.email);//Assigned Error message
								$('#password_login_error').html(data.password);//Assigned Error message
								$('.error').delay(3000).fadeOut();
								setTimeout(function(){ $('#go_to_login').css('top','64%'); },3200)
								//$('#go_to_login').css('top','64%');
							}	//validation login	
				        }
			        });     
			});

			$('#recover_password_btn').click(function(){
				var form_data = $("#recover_password_form").serialize();
			    var url="Register_with_social/recover_password";
			    if($('#email_recovery_input').val() !=''){
			    	jQuery('#recover_password').showLoading();
			    }
			        $.ajax({
				        type:"POST",
				        url:"<?php echo base_url() ?>"+url,
				        data:form_data,
				        dataType: "json",
				        success:function (data) {
							if(data === true){
								//mail sent
								show_msg('OTP Sent !','success');
								jQuery('#recover_password').hideLoading();
								$("#email_recovery_input").hide();
								$("#otp_recover_password").show();
								$('#email_recover_msg').show();
								$('#recover_password_btn').hide();
								$('#submit_otp').show();
								$('#email_recover_msg').css('padding','14px');
								$('#email_recover_msg').css('top','8px');
								$('#email_recover_msg').css('color','green');
								$('#email_recover_msg').html("OTP Sent. Please check your mail.");
								$('#go_to_login').css('display','block');
								$('#email_recover_msg').delay(3000).fadeOut();
							}
							else if(data === false){
								$('#email_recover_error').show();
								show_msg("Account doen't Exists !","success");
								$('#email_recover_error').text("Account doen't exists.");
								$('#email_recover_error').delay(3000).fadeOut();
							}
							else{
								$('#email_recover_error').show();
								$('#email_recover_error').html(data.email_recover);//Assigned Error message
								$('#email_recover_error').delay(3000).fadeOut();
							}
				        }
			        }); 
			});

			$('#submit_otp').on('click',function(){
				var form_data = $("#recover_password_form").serialize();
			    var url="Register_with_social/check_otp_to_change_password";
			        $.ajax({
				        type:"POST",
				        url:"<?php echo base_url() ?>"+url,
				        data:form_data,
				        dataType: "json",
				        success:function (data) {
							if(data === true){
								$('#email_recover_msg').show();
								show_msg('OTP Verified !','success');
								$('#email_recover_msg').css('padding','14px');
								$('#email_recover_msg').css('top','8px');
								$('#email_recover_msg').css('color','green');
								//$('#email_recover_msg').text("OTP Verified");
								//$('#email_recover_msg').delay(3000).fadeOut();
								//$('#recover_password').delay(3100).fadeOut();
								$('#recover_password').hide();
								$('#change_pass_div').show();
								//redirect to new password
							}
							else if(data === false){
								$('#email_recover_msg').show();
								show_msg('Wrong OTP ! Please try again.','warning');
								$('#email_recover_msg').css('padding','14px');
								$('#email_recover_msg').css('top','8px');
								$('#email_recover_msg').css('color','green');
								$('#email_recover_msg').text('Wrong OTP. Please try again.');
								$('#email_recover_msg').delay(3000).fadeOut();	
							}
							else{
								$('#email_recover_msg').show();
								$('#email_recover_msg').css('padding','14px');
								$('#email_recover_msg').css('top','8px');
								$('#email_recover_msg').css('color','green');
								$('#email_recover_msg').text(data.otp_recover_password);
								$('#email_recover_msg').delay(3000).fadeOut();
							}
				        }
			        }); 
			});

			$('#change_pass').on('click',function(){
				var form_data = $("#set_password_form").serialize();
			    var url="Register_with_social/change_password";
			        $.ajax({
				        type:"POST",
				        url:"<?php echo base_url() ?>"+url,
				        data:form_data,
				        dataType: "json",
				        success:function (data) {
							if(data === true){
								show_msg('Password Changed !','success');
							}
							else{
								$('.error').show();
								$('#set_password1').html(data.new_password);
								$('#set_password2').html(data.confirm_password);
								$('.error').delay(3000).fadeOut();
							}
				        }
			        }); 
			});


			
		});	

	</script>

	<!-- ----------------------------- FB ------------------------------------>
	<script type="text/javascript">
		(function(d, s, id) {
		    var js, fjs = d.getElementsByTagName(s)[0];
		    if (d.getElementById(id)) return;
		    js = d.createElement(s); js.id = id;
		    js.src = "//connect.facebook.net/en_US/sdk.js";
		    fjs.parentNode.insertBefore(js, fjs);
		}(document, 'script', 'facebook-jssdk'));

		window.fbAsyncInit = function() {
		    FB.init({
		      appId      : '', 
		      cookie     : true,  
		      xfbml      : true,  
		      version    : 'v3.2'
		    });

		   };

		function fbRegister(){
			FB.login(function(response) {
	  			FB.getLoginStatus(function(response) {
			        if (response.status === 'connected') {
			           if (response.authResponse) {
				            FB.api('/me', {locale: 'en_US', fields: 'id,first_name,last_name,email,link,gender,locale,picture'},
						    function (response) {
						    	var url="Register_with_social/register_by_fb";
					        $.ajax({
						        type:"POST",
						        url:"<?php echo base_url() ?>"+url,
						        data:{id: response.id, email: response.emails, name:response.first_name+' '+ response.last_name, profile_picture:response.picture.data.url, register_from:'facebook'},
						        dataType: "json",
						        success:function (data) {
									if(data === true){
										fbLogout();
										$('.error').show();
										$('.error').css('top','0px');
										$('.error').css('color','green');
										$('#register_error').text("Account Created.Please Log In below.");
										$('#register_error').delay(3000).fadeOut();
										location.reload();
									}
									else if(data === false){
										fbLogout();
										$('.error').show();
										$('.error').css('top','0px');
										$('.error').css('color','green');
										$('#register_error').text("Account already exists. Please Log In below.");
										$('#register_error').delay(3000).fadeOut();
										location.reload();
									}	
						        }
					        });
						    });



				        } else {
				            console.log('User cancelled login or did not fully authorize.');
				        }
			        }
			    });
			}, {scope: 'public_profile,email'});
		}

		function fbLogin(){
			FB.login(function(response) {
	  			FB.getLoginStatus(function(response) {
			        if (response.status === 'connected') {
			           if (response.authResponse) {
				            FB.api('/me', {locale: 'en_US', fields: 'id,first_name,last_name,email,link,gender,locale,picture'},
						    function (response) {
						    	var url="Register_with_social/login_by_fb";
					        $.ajax({
						        type:"POST",
						        url:"<?php echo base_url() ?>"+url,
						        data:{id: response.id, email: response.emails, name:response.first_name+' '+ response.last_name, profile_picture:response.picture.data.url},
						        dataType: "json",
						        success:function (data) {
									if(data === true){
										fbLogout();
										$('#login_failed').show();
										$('#login_failed').css('top','0px');
										$('#login_failed').css('color','green');
										$('#login_failed').text("Logged In");
										location.reload();
										//$('#login_failed').delay(2000).fadeOut();
										 /*setTimeout(function () {
								        	location.reload();	 
								    	}, 3000);*/
									}
									else if(data === false){
										fbLogout();
										$('#login_failed').show();
										$('#login_failed').css('top','0px');
										$('#login_failed').text("Account not found. Please register first to continue.");
										$('#login_failed').delay(3000).fadeOut();
									}	
						        }
					        });
						    });



				        } else {
				            console.log('User cancelled login or did not fully authorize.');
				        }
			        }
			    });
			}, {scope: 'public_profile,email'});
		}



		function fbLogout() {
			FB.logout(function() {
			   	console.log('Log Out !');
			});
		}
	
	</script>






</head>
<body style="background: url('<?php echo base_url(); ?>utils/Images/wide.jpg');background-repeat: no-repeat;background-size: cover;">
	<div class='container'>
		<div class='row'>
			<div class="col-md-4 register_own_email text-center">
				<h4>Register with Your Email</h4>
				<div class='row'>
					<form method='post' autocomplete="on" action='javascript:void(0);' id='email_register'>

						<input type="text" class='form-control' name='email' placeholder='Your Email'>
						
						<div class='error text-left' id='email_error'></div>
						
						<input type="password" class='form-control' name='password' placeholder='Your Password'>

						<div class='password_hint text-left'>
							<small><p>Passsword Must contain: Atleast 1 uppercase letter, 1 lowercase letter, 1 special character, 1 number. Atleast 8 characters long.</p></small>
							<div class='text-right btn_in_hint'>
								<button class='btn btn-default btn-sm' id='close_hint'>Got It.</button>
							</div>
						</div>

						<input type="hidden" name='reg_type' value="email">
						<!--Other 2: Google and Facebook--->
						
						<div class='error text-left' id='password_error'></div>
						<button class='form-control btn-warning' id='submit_form_email_register'>Register</button>
					</form>
					
					<div class='row' id='go_to_login1'>
					<p>Have an account? &nbsp;</p><a href='javascript:void(0);' id='click_login'> Login &nbsp;</a>
				    </div>
				</div>
			</div>




			<div class="col-md-4 text-center" id="change_pass_div">
				<h4>Set New Password</h4>
				<div class='row'>
					<form method='post' autocomplete="on" action='javascript:void(0);' id='set_password_form'>

						<input type="password" class='form-control' name='new_password' placeholder='Set your New Password'>
						<div class='well well-sm password_hint text-left'>
							<small><p>Passsword Must contain: Atleast 1 uppercase letter, 1 lowercase letter, 1 special character, 1 number. Atleast 8 characters long.</p></small>
							<div class='text-right'>
								<button class='btn btn-default btn-sm' id='close_hint_set_pass'>Got It.</button>
							</div>
						</div>
						<div class='error text-left' id='set_password1'></div>
						
						<input type="text" class='form-control' name='confirm_password' placeholder='Please Confirm Your Password'>
						<div class='error text-left' id='set_password2'></div>
						
						<button class='form-control btn-warning' id='change_pass'>Change Password</button>
					</form>
				</div>
			</div>






<!-------------------------------LOGIN-------------------------------------------------->
			<div class="col-md-4 login_all text-center" id='login'>
				<h4>Login</h4>
				<div class='error text-left' id='login_failed'></div>
				<div class='row'>
					<form method='post' autocomplete="on" action='javascript:void(0);' id='login_by_email_form'>

						<input type="text" class='form-control' name='email_login' placeholder='Your Email'>
						
						<div class='error text-left' id='email_login_error'><p>Demo Text</p></div>
						
						<input type="password" class='form-control' name='password_login' placeholder='Your Password'>
						
						<div class='error text-left' id='password_login_error'><p>Demo Text</p></div>

						<input type="hidden" name='login_in_by' value="email">
						<!--Other 2: Google and Facebook--->

						<button class='form-control btn-warning' id='general_login'>Login</button>
					</form>
					
					<div class='row' id='go_to_login'>
						<a href='javascript:void(0);' id='click_forget_password'> Forget Password ? &nbsp;</a>
				    </div>
					
					<div class='social_login_options'>
						<div class='row social_btns'>
							<button class='btn btn-default' id='login_with_gmail'><i class="fa fa-google" style='color:red;'></i> &nbsp; Google</button>
							<button class='btn btn-default' onclick="fbLogin();"><i class="fa fa-facebook-square" style='color:#4267B2;'></i> &nbsp; Facebook</button>
						</div>
						
						
					</div>
					
				</div>
				
				<div class='row' id='go_to_login1'>
					<p>Don't Have an account? &nbsp;</p><a href='javascript:void(0);' id='go_register'> Register Here &nbsp;</a>
				</div>
				
			</div>
			
<!----------------------------------REGISTER PAGE----------------------------------------------->
			
			<div class="col-md-4 register_page_last text-center">
				<h4>Registration</h4>
				<div class='row'>
					<button class='btn btn-block btn-default' id='reg_own_email'>  Register with your Email </button>
					<!--<i class="fa fa-envelope-o"></i>-->
				</div>
				<div class='row'>
					<button class='btn btn-block btn-default' id='register_with_gmail'>Register with Gmail</button>
				</div>
				<div class='row'>
					<button class='btn btn-block btn-default'  onclick="fbRegister()">Register with Facebook</button>
				</div>
				
				<div class='row' id='go_to_login1'>
					<p>Have an account? &nbsp;</p><a href='javascript:void(0);' id='go_login'> Login &nbsp;</a>
			    </div>


			    <div class='error text-left' id='register_error'></div>
			</div>




			<!--------------------------Forget Password----------------------------------->

			<div class="col-md-4 login_all text-center" id='recover_password'>
				<h4>Recover Password</h4>
				<div class='row'>
					<form method='post' autocomplete="on" action='javascript:void(0);' id='recover_password_form'>
						<input type="text" class='form-control' name='email_recover' id='email_recovery_input' placeholder='Enter your Email'>
					<!--Enable on SMS-->
						<input type="password" class='form-control' name='otp_recover_password' placeholder='Enter your OTP' id= 'otp_recover_password' style='display: none'>
						<div class='error text-left' id='email_recover_error'><p>Demo Text</p></div>
						<!--Other 2: Google and Facebook--->
						<button class='form-control btn-warning' id='recover_password_btn'>Send OTP</button>
						<button class='form-control btn-warning' id='submit_otp'>Submit</button>
						<div class='error text-left' id='email_recover_msg'><p>OTP sent to your email.</p></div>
					</form>
				</div>

				<div class='row' id='go_to_login' style="top:82%">
					<a href='javascript:void(0);' id='go_login_from_recover'> Login &nbsp;</a>
			    </div>

				
			</div>

		</div>
	</div>
	
	
	<script async defer src="https://apis.google.com/js/api.js" onload="this.onload=function(){};HandleGoogleApiLibrary()" onreadystatechange="if (this.readyState === 'complete') this.onload()"></script>

	<script>

// Called when Google Javascript API Javascript is loaded
function HandleGoogleApiLibrary() {
	// Load "client" & "auth2" libraries
	gapi.load('client:auth2', {
		callback: function() {
			// Initialize client library
			// clientId & scope is provided => automatically initializes auth2 library
			gapi.client.init({
		    	//apiKey: 'xxxxxxxxxxxxxxxxxxxxxx',
		    	clientId: '',
		    	scope: 'https://www.googleapis.com/auth/userinfo.profile https://www.googleapis.com/auth/userinfo.email https://www.googleapis.com/auth/plus.me'
			}).then(
				// On success
				function(success) {
			  		// After library is successfully loaded then enable the login button
			  		$("#login_button").removeAttr('disabled');
				}, 
				// On error
				function(error) {
					alert('Error : Failed to Load Library');
			  	}
			);
		},
		onerror: function() {
			// Failed to load libraries
		}
	});
}

// Click on login button
$("#register_with_gmail").on('click', function() {
	$("#register_with_gmail").attr('disabled', 'disabled');	
	// API call for Google login
	gapi.auth2.getAuthInstance().signIn().then(
		// On success
		function(success) {
			// API call to get user information
			gapi.client.request({ path: 'https://www.googleapis.com/plus/v1/people/me' }).then(
				// On success
				function(success) {
					//console.log(success);
					var user_info = JSON.parse(success.body);
					//console.log(user_info);
					var url="Register_with_social/register_by_google";
			        $.ajax({
				        type:"POST",
				        url:"<?php echo base_url() ?>"+url,
				        data:{id: user_info.id, email: user_info.emails[0].value, name:user_info.displayName, gender: user_info.gender,image_url: user_info.image.url},
				        dataType: "json",
				        success:function (data) {
							if(data === true){
								$('.error').show();
								$('.error').css('top','0px');
								$('.error').css('color','green');
								$('#register_error').text("Account Created.Please Log In below.");
								$('#register_error').delay(3000).fadeOut();
								location.reload();
							}
							else if(data === false){
								$('.error').show();
								$('.error').css('top','0px');
								$('.error').css('color','green');
								$('#register_error').text("Account already exists. Please Log In below.");
								$('#register_error').delay(3000).fadeOut();
								location.reload();
							}	
				        }
			        }); 
					//$("#login_button").hide();
				},
				// On error
				function(error) {
					$("#register_with_gmail").removeAttr('disabled');
					alert('Error : Failed to get user user information');
				}
			);
		},
		// On error
		function(error) {
			$("#register_with_gmail").removeAttr('disabled');
			alert('Error : Disconnected to Google');
		}
	);
});
/*-------------------------------------------*LOGIN*------------------------------------*/

$("#login_with_gmail").on('click', function() {
	$("#login_with_gmail").attr('disabled', 'disabled');	
	// API call for Google login
	gapi.auth2.getAuthInstance().signIn().then(
		// On success
		function(success) {
			// API call to get user information
			gapi.client.request({ path: 'https://www.googleapis.com/plus/v1/people/me' }).then(
				// On success
				function(success) {
					//console.log(success);
					var user_info = JSON.parse(success.body);
					//console.log(user_info);
					var url="Register_with_social/login_by_google";
			        $.ajax({
				        type:"POST",
				        url:"<?php echo base_url() ?>"+url,
				        data:{id: user_info.id, email: user_info.emails[0].value},
				        dataType: "json",
				        success:function (data) {
							if(data === true){
								$('.error').show();
								$('.error').css('top','0px');
								$('.error').css('color','green');
								$('#login_failed').text("Logged In");
								location.reload();
								//$('#login_failed').delay(2000).fadeOut();
								 /*setTimeout(function () {
						        	location.reload();	 
						    	}, 3000);*/
							}
							else if(data === false){
								$('.error').show();
								$('.error').css('top','0px');
								$('#login_failed').text("Account not found. Please register first to continue.");
								$('#login_failed').delay(3000).fadeOut();
							}	
				        }
			        }); 
					//$("#login_with_gmail").hide();
				},
				// On error
				function(error) {
					$("#login_with_gmail").removeAttr('disabled');
					alert('Error : Failed to get user user information');
				}
			);
		},
		// On error
		function(error) {
			$("#login_with_gmail").removeAttr('disabled');
			alert('Error : Disconnected by google.');
		}
	);
});

</script>

</body>
</html>