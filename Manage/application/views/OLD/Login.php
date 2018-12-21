<html>
	<head>
		<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/bootstrap.css"/> <!--BS -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script src="https://cdn.rawgit.com/mburakerman/prognroll/master/src/prognroll.js"></script>
		<style>
		
			body {
					height: 900px;
					text-align: center;
					font-famil: arial;
			}
				
			.box{
				border:1px solid #ddd;
			}
			
			.card{
				height:auto;
				margin-top:200px;
				margin-bottom:-100px;
				box-shadow: 0 0 5px 5px #ddd; 
			}
			
			.errorbox{
				height:auto;
				margin-top:520px;
				margin-bottom:-100px;
				color:red;
			}
			
			.cancel{
				border-radius:50%;
				width:20px;
				height:20px;
				position:absolute;
				top:0;
				right:0;
			}
			
			
			.divider{
				border-radius:0% 0% 150% 0% / 0% 0% 50% 0%;
				border-bottom:1px solid #ddd;
				margin-left:-16px;		
				width:380px;
				height:150px;
				background:url('http://localhost/CII/assets/Images/color.jpg');
			}
			
			.profilePic{
				border:1px solid #ddd;
				border-radius:50%;
				width:120px;
				height:120px;
				margin-left:35%;
				margin-top:-50px;
				background:#fff;
				background:url('http://localhost/CII/assets/Images/12.png');
				background-repeat: no-repeat;
				background-size: 120px 120px;
			}
			
			.form{
				margin-top:20px;
			}
			
			.form input[type='text']{
				margin:8px 0;
			}
			
			.form input[type='submit']{
				margin:20px 0;
			}
			
			.form input[type='submit']:hover{
				background:#09f;
				color:#fff;
			}
			
			h4{
				border:1px solid #ddd;
				border-radius:4px;
				width:120px;
				color:#09f;
				text-align:center;
				margin-left:35%;
				margin-top:10%;
				margin-bottom:10px;
				padding:2px;
				box-shadow:2px 2px;
			}
			a,a:hover{
				margin:20px 0;
				border:1px solid #ddd;
				border-radius:4px;
				padding:4px;
				text-decoration:none;
			}	
			#cancel{
				color:#fff;
				cursor:pointer;
			}
			
			#citySuggetions{
				border:1px solid #ddd;
				border-radius:5px;
				height:auto;
				margin:8px 0;
				overflow:auto;
				display:none;
				
			}
			
			#citySuggetions li{
				list-style-type:none;
				font-size:10px;
				margin:0;
				color:#09f;
			}
			
			#citySuggetions li:hover{
				background:#ddd;
			}
		</style>
		
		<script>
			$(document).ready(function(){
				$('#forgetPass').click(function(){
					$('#forget').toggle();
					$('#login').hide();
				});
				
				$('#cancel').click(function(){
					$('#login').hide();
				});
				$('#toRegister').click(function(){
					$('#register').toggle();
					$('#login').hide();
					$('#forget').hide();
				});
				
					$(function() {
						$("body").prognroll();
					});
			});
			
		
		</script>

	</head>
		
	<body>
		<div class='container' id='login'>
			<div class='row'>	
				<div class='col-md-4'>
				</div>
				
				
				<div class='card col-md-4'>
					<div class='cancel'>
						<h5 id='cancel'>x</h5>
					</div>
					
					<div class='divider'>
					</div>
					<div class='profilePic'>
					</div>
					<h4>Log In</h4>
					<div class='form'>
						<form method='post' action='' autocomplete="off">
							<input class='form-control' type='text' name='username' placeholder='Username' id='f1'>
							<input class='form-control' type='text' name='password' placeholder='Password'>
							<input class='form-control' type='submit' name='submit'>
						</form>
					</div>
					<label id='forgetPass'>Forget Password?</label>
								
				</div>
				<div class='col-md-4 errorbox' >
					
				</div>
			</div>
		</div>
		
		<div class='container' id = 'forget' style='display:none;margin-top:-20px;'>
			<div class='row'>	
				<div class='col-md-4'>
				</div>
				
				
				<div class='card col-md-4'>
					<div class='cancel' >
						<h5 id='cancel' style='color:red;'>x</h5>
					</div>
					
					
					
					<h4>Recovery</h4>
					<div class='form'>
						<form method='post' action='#'>
							<input class='form-control' type='text' placeholder='Username or Mobile Number'>
							<input class='form-control' type='submit' name='submit'>
						</form>
					</div>
					
				</div>
			
				<div class='col-md-4'>
				</div>
			</div>
			
		</div>
		
		<div class='container' style='margin-top:-50px;'>
			<div class='row'>	
				<div class='col-md-4'>
				</div>
				
				
				<div class='card col-md-4'>
					<div class='cancel'>
						<h5 id='cancel' style='color:red;'>x</h5>
					</div>
				
					<h4 style='margin:10px;margin-left:35%;' id='toRegister'>Register</h4>
					<div class='form' id='register' style='display:none;' >
						<form method='post' action='' autocomplete="off">
							<input class='form-control' type='text' name='name' placeholder='Name'>
							<input class='form-control' type='text' name='lastname' placeholder='Lastname'>
							<input class='form-control' type='text' name='mobile' placeholder='Mobile'>
							<input class='form-control' type='text' name='mail' placeholder='Mail'>
							<input class='form-control' type='text' name='city' placeholder='City' id='city'>
							<div id='citySuggetions'>
							</div>
							<input class='form-control' type='password' name='password' placeholder='Choose Password'>
							<input class='form-control' type='submit' name='submit'>
						</form>
						
					</div>
					
				</div>
			
					<div class='col-md-4'>
						
					</div>
			
			</div>
			
		</div>
		
		
	</body>
</html>