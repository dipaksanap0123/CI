<style type="text/css">
        .img {
          width:120px;
          height:120px;
          margin:0 auto;
          border-radius:50%;
          overflow:hidden;
        }
        .card .box .img img {
            width:100%;
            height:100%;
        }

        .card .box h2 {
            font-size:20px;
            color:#262626;
            margin:20px auto;
        }
        .card .box h2 span {
            font-size:14px;
            background:#e91e63;
            color:#fff;
            display:inline-block;
            padding:4px 10px;
            border-radius:15px;
        }
        .card .box p {
            color:#262626;
        }
        .card .box span {
            display:inline-flex;
        }
        .card .box ul {
            margin-left:40%;
            padding:0;
        }
        .card .box ul li {
            list-style:none;
            float:left;
        }
        .card .box ul li a {
            display:block;
            color:#aaa;
            margin:0 10px;
            font-size:20px;
            transition:0.5s;
            text-align:center;
        }
        .card .box ul li:hover a {
            color:#e91e63;
            transform:rotateY(360deg);
        }

        .col-xs-8{
          margin-left:7px;
          background: #fafafa;
        }

        .well-sm{
          padding:5px;
        }

        #profile_width{
          width:700px;
        }
</style>
<div class="modal fade" id="profile" role="dialog">
    <div class="modal-dialog modal-sm" id='profile_width'>
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">My Account</h4>
        </div>
        <div class="modal-body">
          
          <div class="card">
            <div class="box">
                <div class="img">
                    <img src="<?php echo base_url();?>Utils/Images/avatar.jpg"">
                </div>
                <h2 class='text-center'><?php echo '<pre>';echo $this->session->userdata('username'); ?></h2>

                <p class='text-center'> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                        tempor incididunt ut labore et.</p>

                <hr>

                <div class=''>
                <?php 
                $spec_usr_data = $this->books_model->get_specific_usr_details($this->session->userdata('username'));
               // $fields = $this->db->list_fields('user_details');
                  foreach( $spec_usr_data as $row){
                    foreach( $row as $col){ ?>
                  <div class='row'>

                    <div class='col-xs-3 well well-sm text-center' /*contenteditable="true"*/>Feild Name</div>
                    <div class='col-xs-8 well well-sm' contenteditable="true" /> <?php echo $col; ?></div>
                  </div>
                <?php }}?>
                  
                </div>

                <hr>
                <div class="">
                    <ul >
                        <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                        <li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
                        <li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                    </ul>
                </div>
            </div>
          </div>





        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
</div>