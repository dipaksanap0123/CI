<!DOCTYPE html>
<html>
<head>
	<title>Dashboard</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<style type="text/css">
		.logout_btn{
			position: relative;
			top: 40px;
		}
		*{
			font-family:trebuchet MS;
		 }
	</style>
	<!--<link rel="stylesheet" href="<?php echo base_url(); ?>utils/Css/Register.css">-->
</head>
<body style="background: url('<?php echo base_url(); ?>utils/Images/body_background.jpg');background-repeat: no-repeat;background-size: cover;">

	<div class='container-fluid text-center'>
		<h3 class='well well-sm'>Welcome</h3>
		
		<div class='container'>
			<div class='text-right logout_btn'>
			<!--	<a href='<?php echo base_url(); ?>Register_with_social/logout'><button class='btn btn-sm btn-default'> <i class="fa fa-sign-out"></i> Log Out</button></a>-->
			<a href="<?php echo base_url(); ?>Register_with_social/logout" class="btn btn-default"><span class="glyphicon glyphicon-off"></span> Logout</a>
			</div>
		</div>
	
		<div class='container well card text-left'>
			<h4>User Information</h4>
			<h5>Name: <?php echo $details[0]['full_name']; ?></h5>
			<h5>Email: <?php echo $details[0]['email']; ?></h5>
			<h5>OwnerID: <?php echo $details[0]['owner_id']; ?></h5>
			<h5>Account	 from: <?php echo $details[0]['register_from']; ?></h5>
		</div>

	</div>
</body>
</html>