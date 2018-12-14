<style type="text/css">
</style>


<div class='container'>
			<div class='row'>
		<!--  --------------------------------------------------------------------------------------------------- -->
				<div class='col-md-2 block_a' id='fixed_left'>
					<div class='card user_section'>
						<?php if($this->session->userdata('username')){?>
						
						<div class='col-sm-12'>
							<div style='border:2px solid #09fbbb;background:url("<?php echo base_url();?>utils/Images/avatar.jpg");background-size:cover;height:130px;border-radius:50%;margin:7px;margin-top:0px;'>
							</div>
						</div>
						<!--<div class='col-sm-6' style='background:#fafafa;height:60px;margin-top:10px;border-radius:6px;'>
							<h3>Hello !!! </h3>
						</div>-->
						
						
						<div class='col-sm-12' style='border:2px solid #09fbbb;background:#fafafa;height:35%;border-radius:6px;margin-top:5px;'>
							<h3>Welcome</h3>
							<h3><?php echo $this->session->userdata('username'); ?></h3>
						</div>
						<?php } else{ ?>
						
						<div class='col-sm-12' style='border:2px solid #09fbbb;background:#fafafa;height:40%;border-radius:6px;'><!---->
							
							<!--Login popup-------->
								<div class='col-sm-5' style='background:url("<?php echo base_url();?>utils/Images/avatar.jpg");background-size:cover;height:60px;border-radius:50%;margin-top: 8px;margin-left:-9px;'>
								</div>
								
								<div class='col-sm-6' style='background:#fafafa;height:60px;margin-top:15px;border-radius:6px;'>
									<button class='btn btn-sm btn-success' style='margin-top:7px;' data-toggle="modal" data-target="#exampleModal">Please Login</button>
								</div>
							<!--End Login popup---->
							
						</div>
						
						
						<?php }?>
						
						
						
					</div>
					<!--<?php if($this->session->userdata('username')){?>
					<div class='card menu_section' style='margin-top:30px;'>
						<div>
						</div>
					</div>
					
					<?php }else{?>
						<div class='card menu_section' style='margin-top:-117px;'>
						<div>
						</div>
					</div>
					<?php }?>-->
					
					
				</div>
		
	<!--  --------------------------------------Middle body----------------------------------------------------- -->
				

				<div class='col-md-7 block_a' id='all_book_vertical'>
					<div class='card' style='height:auto;margin-top:20px;' id='reflex'>
					
					
					<div class="alert alert-success alert-dismissible" id='user_register_message'>
						<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
						<strong>Congtratulations! You are now registerd with us.</strong> 
					</div>
					
					
					<!--Book List -->
					<?php
						$this->load->view('book_list_admin');
					?>
					<!--End of Book list -->
					
					
					</div>
					
					
				</div>
				
		<!--  -------------------------------Right Body----------------------------- -->
				
				<div class='col-md-2 block_a' id='right_side_stat'>
					<h4 class='well' style='border:2px solid #09fbbb;'>Books Statistics</h4>
					<hr>
					<div class='well well-sm'>
						<ul style='margin:0;'>
							<li>Available Books: <b><?php if(isset($stat)){echo $stat;} ?></b></li>
							<li>No. of Members: <b><?php echo $this->books_model->num_of_users(); ?></b></li>
						</ul>
					</div>
					
					
					
				</div>
				
	<!--  ------------------------------------------------------------------------------- -->
			</div>
		</div>