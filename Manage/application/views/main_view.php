<!DOCTYPE html>
<html>
	<head>
		<title>Dashboard</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		

		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<link rel = "stylesheet" type = "text/css" href = "<?php echo base_url(); ?>utils/Css/owl.carousel.min.css">
		<!--<link rel = "stylesheet" type = "text/css" href = "<?php echo base_url(); ?>utils/CSS/owl.theme.default.min.css">
		<link rel = "stylesheet" type = "text/css" href = "<?php echo base_url(); ?>utils/CSS/ez-accordion.min.css">-->
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<!--All Custom CSS-->
		<!--<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.2/dist/jquery.fancybox.min.css" />--><!--Img Viewer CSS-->
		<link href="<?php echo base_url();?>utils/Css/jquery.fancybox.css" rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="<?php echo base_url();?>utils/Css/Custom.css">
		<link href="<?php echo base_url();?>utils/Css/wnoty.css" rel="stylesheet" type="text/css">
		<style>

		
			 @media only screen and (max-width: 640px) {
             
				#main_menu{
					display: none;
				}

				.details_of_content {
				    margin-top: -90px;
				}

				.img-responsive{
					height:70%;
				}
				
				#usr_left_menu{
					display: none;
				}
				#user_details_card{
					width: 70%;
					margin: 10px auto;
				}
				
				#myTopnav{
					display: block;
				}
				.social{
					display: none;
				}
				#usr_data{
					height: 660px;
					margin-left:-12px;
				}
				
				#head_leaf_userdata{
					margin: 0;
				}
			} 

			.block_a{
				height:auto;
				top: 55px;
				padding: 18px;
				position: relative;
				background:#fff;
				border-radius:5px;
				margin-left:10px;
				margin-bottom:550px;
				
			}
			
			#all_book_vertical{
				overflow-y:scroll;
			}
			
			
			.col-md-2 {
				width: 18.666667%;
			}
			
			#right_side_stat h4{
				color:#33ab7;
				margin:12px 0;
				font-weight:bold;
				text-decoration:underline;
			}
			
			#right_side_stat li{
				list-style-type:none;
				font-weight:bold;
				color:#007bff;
			}
			
			.user_section{
				height:200px;
				margin:10px 0;
				border-radius:6px;
			}
			
			.user_section h3{
				margin-top:12px;
				color:#337ab7!important;
				font-size: 16px;
			}
			
			.menu_section{
				border:1px solid #ddd;
				height:500px;
				margin:10px 0;
				border-radius:6px;
			}
			
			.menu_section_right{
				border:1px solid #337ab7;
				height:200px;
				margin:8px 0;
				border-radius:6px;
			}
			
			#user_register_message{
				display:none;
			}
		}
			
		</style>
		<!--All Javascript-->
		<script data-main='<?php echo base_url(); ?>utils/Js/main.js' src='<?php echo base_url(); ?>utils/Js/require.js'></script>
			
	</head>
	
	<body>
		<!--Users-->
		<?php
			$this->load->view('menu');
			if($this->session->userdata('user_type')=='admin'){
				$this->load->view('admin_page');	
			}else if($this->session->userdata('user_type')=='user'){
					$this->load->view('user_page');		
			}else if($this->session->userdata('user_type')==''){
				$this->load->view('user_page');
				//To make a marketing site and redirect there or make login page and redirect there
			}
		
		?>
		
		
		<?php 
			$this->load->view('Models/login_model');
			$this->load->view('Models/register_model');
			$this->load->view('Models/help_model');
			$this->load->view('Models/requests');
			$this->load->view('Models/add_record');
			$this->load->view('Models/list_users');
			$this->load->view('Models/delete_record');
			$this->load->view('Models/edit_record');
			$this->load->view('Models/my_profile');
			$this->load->view('Models/view_item');
			$this->load->view('Models/my_orders');
			//$this->load->view('footer');
		?>
	</body>
</html>