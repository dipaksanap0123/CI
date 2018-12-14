<!DOCTYPE html>
<html>
	<head>
		<style>
			#home_content{
				position:absolute;
				border:1px solid #ddd;
				height:570px;
				padding:10px;
				width:97%;
				background:#f8f9fa;
				top:160px;
				margin-bottom:20px;
				overflow:auto;
			}
			
			.orderBy{
				width:15%;
				float:right;
				margin-left:10px;	
				margin-top:125px;	
				background: #337ab7;
				color: #fff;
			}
			
		
			
		</style>		
	</head>
	<body>
	
	
	
	
	
	
	<div class='container' id='home_content'>
		
	</div>
	<?php
	$this->load->view('Models/login_model');
	$this->load->view('Models/register_model');
	$this->load->view('Models/help_model');
	$this->load->view('Models/add_record');
	$this->load->view('SubMenu');
	
?>
	</body>
</html>