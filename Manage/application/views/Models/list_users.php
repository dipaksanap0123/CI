<style type="text/css">
           
          .row{
                padding:10px;
            }
            
            .left_user_list{
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

<script type="text/javascript">
  $(document).ready(function(){
        $('#delete_record').on('show.bs.modal', function(e) {
            var username = $(e.relatedTarget).data('username');
            //$(e.currentTarget).find('#onn').text(bookId);
           $(e.currentTarget).find('a').attr("href", "<?php base_url();?>Books/remove_user/"+username);
        });
      });
</script>

<div class="modal fade" id="user_listing" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document" id='model_dialog_edit'>
    <div class="modal-content">
      <div class="modal-header bg-primary">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">All Users</h4>
        </div>
      <div class="modal-body">


         <div class='' style="border:3px solid #ddd;border-radius:4px;padding:20px;overflow:scroll;">
        <?php for($i=0;$i<count($user_data);$i++){?>
        <div class='well well-sm'>
          <!--------------------------------------------------------------------------->  
          <div class='row'>
                    
                    <div class='col-sm-2 left_user_list' style='background:url("<?php echo base_url(); ?>Utils/Images/avatar.jpg");background-size: contain;background-position: center;max-height: 50%;max-width: 100%;'>
                    </div>
                    
                    <div class='col-sm-7 right'>
                        <h5>Name:  <?php echo $user_data[$i]['first_name'].' '.$user_data[$i]['middle_name'].' '.$user_data[$i]['last_name'].'.' ?></h5>
                        <h5>Username:  <?php echo $user_data[$i]['username'].'.' ?></h5>
                        <h5>Email:  <?php echo $user_data[$i]['email'].'.' ?></h5>
                        <h5>Mobile:  <?php echo $user_data[$i]['mobile'].'.' ?></h5>
                    </div>
                    
                    <div class='col-sm-3 right'>
            <?php if($user_data[$i]['is_blocked']==0){ ?>
            <a href='<?php echo base_url(); ?>books/block_user/<?php echo $user_data[$i]['username']; ?>'><button class='btn btn-sm btn-primary'>Block <i class="fa fa-ban" style="color:red"></i></button></a>
            <?php }else{ ?>
            
            <a href='<?php echo base_url(); ?>books/unblock_user/<?php echo $user_data[$i]['username']; ?>'><button class='btn btn-sm btn-primary'>Unblock<i class="fa fa-ban" style="color:red"></i></button></a>
            <?php } ?>
            <a href="#delete_record" data-toggle="modal" data-username="<?php echo $user_data[$i]['username']; ?>"><button class='btn btn-sm btn-danger' id='delete_usr_acc'>Delete <i class="fa fa-remove"></i></button></a>
            
            
                    </div>
                    
                    </div>          
          <!--------------------------------------------------------------------------->
        </div>
                <?php }?>
      </div>


      </div>
      
    </div>
  </div>
</div>