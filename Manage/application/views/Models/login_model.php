<!DOCTYPE html>
<html>
<head>
	<title>HOME</title>
	<style>
		.col-form-label{
			margin-left:0;
		}
		
		.modal-header .close{
			margin-top:5px;
		}
			
			
			.modal-dialog{
				margin-top:10%;
			}
			
			.modal-header, .model-footer{
				background-color:#8fbc8f36;
			}
			
			.error{
				border:0;
				display:none;
			}
			
			/*#username_error::after{
				content: " ";
				position: fixed;
				bottom: 59%;
				left: 15%;
				margin-left: -5px;
				border-width: 10px;
				border-style: solid;
				border-color: transparent transparent #f5f5f5 transparent;
			}
			
			#password_error::after{
				content: " ";
				position: fixed;
				top:100%;
				left: 15%;
				margin-left: -5px;
				border-width: 10px;
				border-style: solid;
				border-color: transparent transparent red transparent;
			}*/
			
			.error label{
				font-weight:normal;
				color:red;
				margin-bottom:0;
				padding:0;
			}
			
			
			
			@media (min-width: 768px)
			{
				.modal-body{
					padding:30px;
				}

				#login_page{
					width:300px;
				}
				
			}
			
			
			
	</style>
	</style>
		<script>
			function login_form_submit() {
				document.getElementById("login_form").submit();  //Need to add this code if we are using model 
			}
		</script>
</head>
	
<body>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document" id='login_page'>
    <div class="modal-content">
     <div class="modal-header bg-primary">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Login</h4>
        </div>
      <div class="modal-body">
        <form id='login_form' action='Books/login' method='post'>
          <div class="form-group">
            <label for="username" class="col-form-label">Username</label>
            <input type="text" name='username' class="form-control" id="username" autocomplete='off' placeholder='Email Id or Username'>
          </div>
		  <div class='error well well-sm' id='username_error'>
			<label>This feild is required.</label>
		  </div>
		  
          <div class="form-group">
            <label for="password_login" class="col-form-label">Password:</label>
            <input class="form-control" name='password' type='password' id="password_login" autocomplete='off' placeholder='Your Password'></input>
          </div>
		  
		   <div class='error well well-sm' id='password_error'>
			<label>This feild is required.</label>
		  </div>
		  
		  <div class='text-right'>
			<p><a href=''>Forget Password ?</a></p>
		  </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close <i class="fa fa-times"></i></button>
        <button type="button" class="btn btn-primary" onclick='login_form_submit();' id='login_btn'>Proceed <i class="fa fa-check"></i></button>
      </div>
    </div>
  </div>
</div>

</body>
</html>