<!DOCTYPE html>
<html>
<head>
  <script
  src="https://code.jquery.com/jquery-3.3.1.js"
  integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
  crossorigin="anonymous"></script>
    <style>

        @media (min-width: 768px) {
           #model_dialog_edit{
              width:900px;
            }
          }

        .hilights{
            color:orange;
            display: inline;
           border:1px solid green;
           border-radius: 4px;
           padding:5px;
        }
       
     
    </style>
</head>
	
<body>
  <?php
      $CI =& get_instance();
  ?>
    <div class="modal fade" id="requests" role="dialog">
    <div class="modal-dialog modal-lg" id='request_main_model'>
      <div class="modal-content">
        <div class="modal-header bg-primary">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Requests for books</h4>
        </div>
        <div class="modal-body">

          <?php
            $all_books = $this->books_model->get_all_books();
          if($this->session->userdata('user_type')=='admin'){ 
            //only admin notifications
          $requests = $this->books_model->request_demands_details_admin();
          if($requests!='')
            for($i=0;$i<count($requests);$i++){
            if($requests[$i]['is_accepted']=="1") {
          ?>
            
            <div class='well well-sm' id="not_<?php echo $requests[$i]['request_id']; ?>">
              <div class='row'>
                <div class='col-sm-9'><?php echo $i+1 .".<div class='hilights'> ". $requests[$i]['username'].'</div>'?>  requested <?php echo urldecode($requests[$i]['book_name']);?>.
                </div>
                <div class='col-sm-3'>
                 <button class='acc btn btn-xs btn-primary' id='<?php echo $requests[$i]['request_id']; ;?>'>Accept.</button>
                  <button class='rej btn btn-xs btn-warning' id='<?php echo $requests[$i]['request_id']; ;?>'>Reject.</button>
                </div>
              </div> 
            </div>
          <?php }}}

          //Normal User after login
          else{ 
             $requests = $this->books_model->request_demands_details_admin();
            for($j=0;$j<count($requests);$j++){ 
              if(($requests[$j]['username']==$this->session->userdata('username'))&&($requests[$j]['is_accepted']==0)){
                echo '<div class="well">Request Accepted for book <span class="hilights">'.$requests[$j]['book_name'].'</span>.</div>';
              }
              else if(($requests[$j]['username']==$this->session->userdata('username'))&&($requests[$j]['is_rejected']==0)){
                echo '<div class="well">Request Rejected for book <span class="hilights">'.$requests[$j]['book_name'].'</span>.</div>';
              }else{
                if($this->session->userdata('username')==$requests[$j]['username'])
                echo '<div class="well">You have Requested successfully for <span class="hilights">'.$requests[$j]['book_name'].'.</div>';
              }
                
            }
          }
          ?>
            
         
        </div>
      </div>
    </div>
  </div>
</div>

</body>
</html>