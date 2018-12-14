<!DOCTYPE html>
<!--Main View Page-->
<html>
	<head>
		<style>
		*{
			font-family:georgia;
		}
	.sidenav {
    height: 100%;
    z-index: 1;
    top: 0;
    left: 0;
    background-color: #f8f9fa;
    transition: 0.5s;
    padding-top: 60px;
}

.sidenav a {
    padding: 8px 8px 8px 32px;
    text-decoration: none;
    font-size: 25px;
    color: #818181;
    display: block;
    transition: 0.3s;
}

.sidenav a:hover {
	text-decoration:none;
	border:2px solid #ddd;
	border-radius:4px;
	background-color:#fff;
}

		::-webkit-scrollbar {
				width: 3px;
				height:6px;
			}
			
			::-webkit-scrollbar-track {
				box-shadow: inset 0 0 5px grey; 
				border-radius: 2px;
			}

			::-webkit-scrollbar-thumb {
				background: #337ab7; 
				border-radius: 2px;
				
			}

			.orderBy{
				float:right;
				margin-right:10px;	
				margin-top:125px;	
				background:red;
			}
			
	</style>
		<title>Dashboard</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<link rel = "stylesheet" type = "text/css" href = "http://localhost/october2018/Utils/180210/CSS/owl.carousel.min.css">
		<link rel = "stylesheet" type = "text/css" href = "http://localhost/october2018/Utils/180210/CSS/owl.theme.default.min.css">
		<link rel = "stylesheet" type = "text/css" href = "http://localhost/october2018/Utils/180210/CSS/ez-accordion.min.css">
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		
		<script data-main='http://localhost/CII/Utils/JS/main.js' src='http://localhost/CII/Utils/JS/require.js'></script>
	
	</head>
	<body>
		<?php $this->load->view('Menu');?>
			<div class='container-fluid'>
				<div class='row'>
					<div class='col-sm-3' style='height:750px;'>
						<div id="mySidenav" class="sidenav" style='border:1px solid #ddd;border-radius:4px;'>
							<div class='card bg-light' style='height:100px; border:1px solid #ddd;border-top:0;border-left:0;border-right:0;border-radius:0;margin-bottom:90px;'>
							<div class='col-sm-4' style='border:1px solid #fff;background:url("http://localhost/october2018/Utils/180210/Images/avatar.jpg") ;background-size:cover;border-radius:50%;height:100px;margin-top:-35px;margin-left:8px;'>
							</div>
							<div class='col-sm-7' style='background-color:#fff;margin-left:6px;margin-top:-20px;height:80px;border-radius:6px;'>
							</div>
							</div>
							
							<div class='card bg-dark links'>
								<a href=#>Link</a>
								<a href=#>Link</a>
								<a href=#>Link</a>
								<a href=#>Link</a>
							</div>
							
						</div>
					</div>
					
					<div class='col-sm-9 bg-light' id='mainView' style='border:1px solid #ddd;border-radius:4px;height:750px;margin-left:-7px;  box-shadow:10px 10px 10px 10px #888888;overflow-y:auto;'>
				
					<!-- New View here-->
					<?php $this->load->view('SubMenu');
						
						//$this->load->view('home.php');
						$this->load->view('home_content');
					?>	
					
					
					
					
					</div>
				</div>
			</div>
		<?php $this->load->view('footer.php');?>
		
	</body>
</html>