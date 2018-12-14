<head>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

  <style>
    .usr{
        background: #fff;
        height:100%;
        border-radius:4px;
        padding:20px;
        margin-top: 60px;
        margin-left:5px;
        overflow:auto;
        text-overflow: ellipsis;
        position: sticky;
        top:70px;
    }

    #usr_data{
        margin-bottom:80px;
    }

    #order_dropdown{
        padding-right:15px;
    }
    .usr p{
        color:orange;
        margin-bottom:10px;
        background: #f2f2f2;
        padding:10px;
        text-overflow: ellipsis;
    }

    .owl-carousel{
        width: 763px;
        left: 245px;
        top: -22px;
    }

    .sidenav a, .dropdown-btn {
    padding: 4px 8px 6px 16px;
    text-decoration: none;
    font-size: 20px;
    color: #818181;
    display: block;
    border: none;
    background: none;
    width: 100%;
    text-align: left;
    cursor: pointer;
    outline: none;
    margin-top:0;
}

/* On mouse-over */
.sidenav a:hover, .dropdown-btn:hover {
    color: orange;
}

/* Main content */

/* Add an active class to the active dropdown button */
.active {
    background-color: rgba(0,0,0,.0001);
    color: white;
}

/* Dropdown container (hidden by default). Optional: add a lighter background color and some left padding to change the design of the dropdown content */
.dropdown-container {
    display: none;
    background-color: #262626;
    padding-left: 8px;
}

/* Optional: Style the caret down icon */
.fa-caret-down {
    float: right;
    padding-right: 8px;
}

/* Some media queries for responsiveness */
@media screen and (max-height: 450px) {
    .sidenav {padding-top: 15px;}
    .sidenav a {font-size: 18px;}
}


#sidenav_user{
    padding:20px 0;
}

.pattern{
        border-radius:5px;
        height:350px;
        margin:10px;
        margin-bottom:50px;
        width:25%;
        display:inline-grid;
    }

    .pattern ul{
        list-style-type:none;
        margin-left: 15px;
        margin-top: -15px;
    }

    .details_of_content{
        
    }
    

    .details_of_content ul,li{
       word-wrap: break-word;
       color:#337ab7; 
    }

    .details_of_content .fa{
        color:orange;
    }

    .well{
        min-height:95%;
    }   

    #img_well{
        padding:0;
        text-align: center;
        border:0;
    }

    .dropdown-menu{
        left:80%;
        right:0;
    }

    .dropdown-menu>li>a {
        color:orange;
    }

    .request_btns{

    }
</style>

</head>


<body>
   <div class='container'>
                <?php $CI =& get_instance(); ?>
            <div class='row' id='head_leaf_userdata'>

        <!--  ------------------------------------------------------- -->
            <div class='col-md-2 usr' id='usr_left_menu'>
                <div class='col-sm-12'>
                    <div style='border:2px solid #09fbbb;background:url("<?php echo base_url();?>utils/Images/avatar.jpg");background-size:cover;height:130px;border-radius:50%;margin:7px;margin-top:0px;'>
                    </div>
                </div>
              
                <div class='col-sm-12 user_info_left' style='border:2px solid #09fbbb;background:#fafafa;height:12%;padding:10px;border-radius:6px;margin-top:5px;'>
                    <p><?php if($this->session->userdata('username')){
                        echo $this->session->userdata('username'); 
                    }else{
                        echo 'Seeker';
                    }?>
                    </p>
                </div>

                 <div class='col-sm-12 menu' style='border:2px solid #09fbbb;background:#fafafa;height:45%;border-radius:6px;margin-top:5px;'>
                       <div class="sidenav" id='sidenav_user'>
                        <?php if($this->session->userdata('username')){ ?>
                            <a href="#" data-toggle="modal" data-target="#profile"><i class='fa fa-info-circle'> About</i></a>
                        <?php }?>
                            <a href="#"><i class='fa fa-laptop'> Services</i></a>
                            <a href="#"><i class='fa fa-address-card-o'> Contact</i></a>
                        <?php if($this->session->userdata('username')){ ?>
                            <a href="<?php echo base_url(); ?>Books/logout"> <i class="zmdi zmdi-run"></i> Logout  </a> 
                        <?php }else{?>
                            <a href="" data-toggle="modal" data-target="#exampleModal"> <i class="zmdi zmdi-run"></i> Login  </a>
                        <?php } ?>  
                        </div>
                </div>

            </div>
            
            <div class='col-md-9 usr text-center' id='usr_data'>
                <div>
                    <?php
                   if($this->session->userdata('is_block_session')=='blocked'){ ?>
                        <div class="alert alert-warning alert-dismissible fade in">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <strong>Warning!</strong> As You are blocked, You can't issue the books.
                        </div>
                  <?php }elseif($this->session->userdata('username')) { ?>
                    
                    <div class="alert alert-success alert-dismissible fade in">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong>Success!</strong> Logged  in.
                    </div>
                    <!--------------------------------------------->
                        
                        
                <?php  }?>
                
                <!---catagory one--->
                <h4 class='well well-sm' style='margin:10px;' id='onnne'>Your Favorites</h4>
                <div class='text-right' id='order_dropdown'>
              
                <div class="dropdown">
                    <button class="btn btn-sm btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Arrange
                    <span class="caret"></span></button>
                    <ul class="dropdown-menu">
                      <li><a href="<?php echo base_url(); ?>Books/subIndex/book_title">Name</a></li>
                      <li><a href="<?php echo base_url(); ?>Books/subIndex/rating" id='rating'>Ratings</a></li>
                      <li><a href="<?php echo base_url(); ?>Books/subIndex/price" id='price'>Free</a></li>
                    </ul>
                </div>


                </div>
                <div>
                    
                </div>
                   <?php  if(isset($all_books)){
                            for($i=0;$i<count($all_books);$i++){  ?>
                    <div class='card pattern' id='user_details_card'>
                       <?php if($all_books[$i]['cover_img_name']!='N/A'){ ?>
                        <div class='well'>
                            <a id="single_image" data-fancybox /*data-caption="Caption for single image"*/ href="<?php echo base_url(); ?>uploads/<?php echo $all_books[$i]['cover_img_name']; ?>"><img class='img-responsive' src='<?php echo base_url(); ?>uploads/<?php echo $all_books[$i]['cover_img_name']; ?>'></a>
                        </div>
                           <!--<div class='well' style='background:url("<?php echo base_url(); ?>uploads/<?php echo $all_books[$i]['cover_img_name']; ?>");background-repeat: no-repeat; background-size: contain;background-position: center;max-height: 100%;max-width: 100%;background-origin: padding-box;border:0;'>
                            </div>-->
                           
                        <?php }else{ ?>
                            <div class='well'>
                            <a id="single_image" data-fancybox href="<?php echo base_url(); ?>utils/Images/image-not-available.png"><img class='img-responsive' src='<?php echo base_url(); ?>utils/Images/image-not-available.png'></a>
                        </div>
                            <!--<div class='well' style='background:url("<?php echo base_url(); ?>utils/Images/image-not-available.png");background-size: cover;background-position: center;'>
                            </div>--><!--using Background-->
                       <?php } ?>


                        <div class='details_of_content text-left'>
                        <ul>
                           <li><?php echo  (strlen($all_books[$i]['book_title']) > 10) ? substr($all_books[$i]['book_title'],0,10).'...' :$all_books[$i]['book_title']; ?></li>

                           <li><?php if($all_books[$i]['price']=='' || $all_books[$i]['price']==0){
                                    echo 'Free';
                                }else{
                                    echo '₹. '.$all_books[$i]['price'].' only';    
                                } ?></li>

                          <li><?php
                               if($all_books[$i]['rating']==0 || $all_books[$i]['rating']==''){
                                   echo str_repeat('<span class="fa fa-star" style="color:#ddd;"></span>',5);
                               }else{
                                echo str_repeat('<span class="fa fa-star"></span>',$all_books[$i]['rating']);
                               }
                        
                           ?></li>
                           
                        </ul>
                        </div>

                        
                        <?php
                        if($this->session->userdata('is_block_session')=='blocked'){
                            echo "<button class='btn btn-warning btn-block disabled'>Blocked </button>";
                        }
                        else if($this->session->userdata('username')){
                            if($this->books_model->get_user_request_status(($this->session->userdata('username')),$all_books[$i]['book_title'])){  ?>
                            <button class='btn btn-warning btn-block disabled'>Request Sent</button>
                            <?php }
                             
                            else{ ?>
                            <a href='Books/request_book/<?php echo $all_books[$i]['book_title']; ?>/<?php echo $this->session->userdata('username') ?>'><button class='btn btn-primary btn-block'>Request</button></a>
                        <?php }} ?>
                       

                    </div>



                    <?php }} if(count($all_books)==0){
                       echo "<h4>No Records</h4>";
                   }
                     ?>
                   
                  
                </div>
                <?php 
                if($this->session->userdata('is_block_session')=='blocked'){
                echo "<button class='btn btn-block btn-default'>Request To Unblock</button>";
                }
                ?>
            </div>
 
                
        <!--  ------------------------------------------------------------------------------- -->
            </div>


        </div>
</body>