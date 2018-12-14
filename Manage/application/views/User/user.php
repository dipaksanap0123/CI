<!DOCTYPE html>
<html>
	<head>
		<title>Dashboard</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<script data-main='<?php echo base_url() ?>Utils/JS/main.js' src='<?= base_url() ?>Utils/JS/require.js'></script>
		
		<style>
		body{
			background-color:#ddd;
		}
			.modal-header .close{
				margin-top:-30px;
			}
			
			.language_icon{
				width:24px;
			}
			
			.modal-dialog{
				margin-top:18%;
			}
			
			.modal-header{
				background-color:#8fbc8f36;
			}
			
			@media (min-width: 768px)
			{
				.modal-dialog{
					width:350px;
				}
				.modal-body{
					padding:30px;
				}
				
			}
			
			<script>
			function login_form_submit() {
				document.getElementById("login_form").submit();  //Need to add this code if we are using model 
			}
			</script>
		</style>
	</head>
	<body>
		<div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title text-center text-primary" id="exampleModalLabel"> <img class='language_icon' id='lang_icon' src='<?php base_url();?>Utils/Images/avatar.jpg'> Login</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id='login_form' action='user/login' method='post'>
          <div class="form-group">
            <label for="username" class="col-form-label">Username</label>
            <input type="text" name='username' class="form-control" id="username">
          </div>
          <div class="form-group">
            <label for="password_login" class="col-form-label">Password:</label>
            <input class="form-control" name='password' type='password' id="password_login"></input>
          </div>
		  
		  <div class='text-right'>
			<p><a href='#'>Forget Password ?</a></p>
		  </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close <i class="fa fa-times"></i></button>
        <button type="button" class="btn btn-primary" onclick='login_form_submit()' id='login_btn'>Proceed <i class="fa fa-check"></i></button>
		<a href='user/login' >Submit</a>
      </div>
    </div>
  </div>
	</body>
<html>