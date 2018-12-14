<!DOCTYPE html>
<html>
	<html>
		<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<style type="text/css">
			.row{
                padding:10px;
            }
            
            .left{
               background: #fafafa;
               height:80px;
               width:80px;
               margin-left:10px;
               border-radius:50%;
            }
            .right h5{
                margin-left:40px;
            }
            .right{
               background: #fafafa;               
               height:110px;
               margin-left:10px;
            }
			
			.right button{
				margin-top: 30px;
			}
		</style>
		</head>
		<body>
			
			<div class='container' style="border:3px solid #ddd;border-radius:4px;padding:20px;overflow:scroll;">
				
				<div class='well well-sm text-center'><h3>Manage Users<h3></div>
				<hr>
				
                <?php for($i=0;$i<count($user_details);$i++){?>
				<div class='well'>
					<!--------------------------------------------------------------------------->	
					<div class='row'>
                    
                    <div class='col-sm-2 left' style='background:url("<?php echo base_url(); ?>utils/Images/avatar.jpg");background-size: contain;background-position: center;max-height: 50%;max-width: 100%;'>
                    </div>
                    
                    <div class='col-sm-7 right'>
                        <h5>Name:  <?php echo $user_details[$i]['first_name'].' '.$user_details[$i]['middle_name'].' '.$user_details[$i]['last_name'].'.' ?></h5>
                        <h5>Username:  <?php echo $user_details[$i]['username'].'.' ?></h5>
                        <h5>Email:  <?php echo $user_details[$i]['email'].'.' ?></h5>
                        <h5>Mobile:  <?php echo $user_details[$i]['mobile'].'.' ?></h5>
                    </div>
                    
                    <div class='col-sm-3 right'>
						<?php if($user_details[$i]['is_blocked']==0){ ?>
						<a href='<?php echo base_url(); ?>Books/block_user/<?php echo $user_details[$i]['username']; ?>'><button class='btn btn-sm btn-primary'>Block <i class="fa fa-ban" style="color:red"></i></button></a>
						<?php }else{ ?>
						
						<a href='<?php echo base_url(); ?>Books/unblock_user/<?php echo $user_details[$i]['username']; ?>'><button class='btn btn-sm btn-primary'>Unblock<i class="fa fa-ban" style="color:red"></i></button></a>
						<?php } ?>
						<button class='btn btn-sm btn-danger'>Delete <i class="fa fa-remove"></i></button>
						
						
                    </div>
                    
                    </div>					
					<!--------------------------------------------------------------------------->
				</div>
                <?php }?>
			</div>
		</body>
	</html>
</html>