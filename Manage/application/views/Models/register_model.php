<!DOCTYPE html>
<html>
<head>
	<title>Register</title>
	<link href="<?php echo base_url(); ?>utils/css/dropzone.css" type="text/css" rel="stylesheet" />
	<style>
	@media only screen and (min-width:1024px) {
		.first_name_reg{
			margin-left:-15px;
		}
		
		.last_name_reg{
			margin-left:10px;
		}
		
	}
	
	.upload-btn-wrapper {
  position: relative;
  overflow: hidden;
  display: inline-block;
  width:100%;
}

.upld {
  border: 2px solid gray;
  background-color: white;
  border-radius: 8px;
  font-weight: bold;
}

.upload-btn-wrapper input[type=file] {
  font-size: 100px;
  position: absolute;
  left: 0;
  top: 0;
  opacity: 0;
}
	
	@media (min-width: 768px){
		#register_dialog {
			width: 800px;
			margin-top:60px;
		}
	}
	</style>
		<script>
			
		</script>
</head>
	
<body>
	<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id='Register_modal'>
	<div class="modal-dialog modal-lg" id='register_dialog'>
		<div class="modal-content">
			
		
      <div class="modal-header bg-primary">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Register</h4>
      </div>
	  
      <div class="modal-body">
      <br>
		<form method="post" id="registration_form" enctype="multipart/form-data">
          <div class="form-group"> 	
        
			<div class='row row_for_input'>
				<div class='col-md-4'>
					<label for="recipient-name" class="col-form-label">Full name <span class='mendatory'>*</span></label>
				</div>
				<div class='col-md-8 float-left'>
					<div class='col-sm-4'>
						<input type="text" name='first_name' class="form-control first_name_reg" placeholder='First Name' id='first_name_reg'>
					</div>
					<div class='col-sm-4'>
						<input type="text" name='middle_name' class="form-control" placeholder='Middle Name' id='middle_name_reg'>
					</div>
					<div class='col-sm-4'>
						<input type="text" name='last_name' class="form-control last_name_reg" placeholder='Last Name' id="last_name_reg">
					</div>
				</div>
			</div>
			
			<div class='row row_for_input'>
				<div class='col-md-4'>
					<label for="address_area" class="col-form-label" >Current Address </label><span class='mendatory'>*</span>
				</div>
				<div class='col-md-8'>
					<textarea type="text" name='address' class="form-control" placeholder='Enter correct address.' id="address_reg" ></textarea>
				</div>
			</div>
			
			<!--<div class='row row_for_input'>
				<div class='col-md-4'>
					<label for="email" class="col-form-label">E-mail address<span class='mendatory'>*</span></label>
				</div>
				<div class='col-md-8'>
					
					<div class='col-sm-8'>
						<input type="text" name='email' class="form-control first_name_reg" placeholder='firstname.lastname' id='email_id_reg'>
					</div>

					<div class='col-sm-4'>
						<select class='form-control last_name_reg' name='email_domain' id='email_domain_reg'>
							<option>@gmail.com</option>
							<option>@ymail.com</option>
							<option>@outlook.com</option>
							<option>@hotmail.com</option>
						</select>
					</div>
				</div>
			</div>-->
			<!--<input type="text" class="form-control" id="email" placeholder='xyz@abc.com'>-->

			<div class='row row_for_input'>
				<div class='col-md-4'>
					<label for="email_reg" class="col-form-label">Email Id. <span class='mendatory'>*</span></label>
				</div>
				<div class='col-md-8'>
					<input type="email" name="email_reg" class="form-control" id="email_reg" placeholder='xyz@abc.com'>
					<?php echo form_error('email_reg'); ?>
				</div>
			</div>

			<div class='row row_for_input'>
				<div class='col-md-4'>
					<label for="mobile_register" class="col-form-label">Mobile No. <span class='mendatory'>*</span></label>
				</div>
				<div class='col-md-8'>
					<input type="text" class="form-control" placeholder='99-1234-5678' name="mobile" id='mobile_reg'>
				</div>
			</div>
			
			<div class='row row_for_input'>
				<div class='col-md-4'>
					<label for="password_register" class="col-form-label">New Password <span class='mendatory'>*</span></label>
				</div>
				<div class='col-md-8'>
					<input type="password" class="form-control password_reg" name='password' id="password_register" placeholder='Set a new password' id=''> 
				</div>
			</div>
			
			<div class='row row_for_input'>
				<div class='col-md-4'>
					<label for="confirm_password_register" class="col-form-label">Confirm Password <span class='mendatory'>*</span></label>
				</div>
				<div class='col-md-8'>
					<input type="password" class="form-control password_reg" id="confirm_password_register" placeholder='Confirm a new password'>
				</div>
			</div>
			
          </div>
         
        </form>
		<h5 class='text-right'>(<span class='mendatory'>*</span> Fields Are Mendatory)</h5>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close <i class="fa fa-times"></i></button>
        <button type="button" class="btn btn-primary" id='register_user_btn' onclick=''>Sign Up <i class="fa fa-check"></i></button>
      </div>
			
			
			
			
		</div>
	</div>
	</div>
</body>
</html>