<!DOCTYPE html>
<html lang="en-US">
   <head>
      <meta charset="UTF-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1" />
      <meta charset="utf-8" />
      <title> Dashboard </title>
      <!--Google Fonts-->
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

      <link href="https://fonts.googleapis.com/css?family=Nanum+Gothic" rel="stylesheet">

      <!--Material Design Iconic Font-->
      <link rel="stylesheet" href="<?php echo base_url(); ?>utils/Css/material-design/css/material-design-iconic-font.css" />
      
     <!--jQuery-->
      
<link rel="stylesheet" href="<?php echo base_url(); ?>utils/Css/hs-menu.min.css" />
     <style type="text/css">
        .hs-navigation li{
             width: max-content;
         }

         .its-parent:after {
            margin-left: 10px;
         }

         .badge{
            background: red;
            margin-top:-20px;
            margin-left:1px;
         }

        .suggestions {
         display: none;
          width: 300px;
          height: auto;
          border-radius: 5px;
          background: #ddd;
          position: fixed;
      }
     </style>
    
   </head>
   <body>

      <!--Start hs Mega Menu-->
      <header class="hs-menubar">
         <div class="brand-logo"> 
           <!-- <a href="#home_link"><img src="<?php echo base_url(); ?>Utils/images/nodp.png" title="Your logo will be here" alt="hs Mega Menu"> </a> -->
         </div>
         <div class="menu-trigger"> <i class="zmdi zmdi-menu"></i></div>
         <div class="search-trigger"> <i class="zmdi zmdi-search"></i></div>
         <div class="search-box">
            <form action="#">
               <input type="text" name="search_all" id='search_all'>
               <div class='card suggestions'>
                  <h5 class='text-center'></h5>
               </div>
            </form>
         </div>
         <div class="hs-user toggle" data-reveal=".user-info">
            <img src="<?php echo base_url(); ?>utils/Images/nodp.png" alt="">
         </div>
         <?php if($this->session->userdata('user_type')=='admin'){ ?>
         <div class="grid-trigger toggle" data-reveal=".grid-items"> <i class="zmdi zmdi-view-module"></i> </div>
         <?php } ?>
         <div class="more-trigger toggle" data-reveal=".user-penal"> <i class="zmdi zmdi-more-vert"></i><span class="badge"><?php if($this->session->userdata('user_type')=='admin'){
               $requests = $this->books_model->request_demands_details_admin();
               if(count($requests)>0){
                  echo count($requests);
               }
         }else{
             $requests = $this->books_model->request_demands_details_admin();
            for($i=0;$i<count($requests);$i++){
               if($requests[$i]['is_accepted']==0 && $requests[$i]['username']==$this->session->userdata('username')){
                  $j=$i+1;
               }
            }
         }?></span></div>
      </header>


      <section class="box-model">
         <ul class="user-penal">
            <!--<li> <a href="#" data-toggle="" data-target=""><i class="zmdi zmdi-inbox"></i> Notifications </a> </li>-->
         <?php if($this->session->userdata('username')){?>
            <li> <a href="#" data-toggle="modal" data-target="#profile"><i class="zmdi zmdi-inbox"></i> My Account </a> </li>
         <?php if($this->session->userdata('user_type')=='user'){ ?>
            <li> <a href="#" data-toggle="modal" data-target="#orders"><i class="zmdi zmdi-inbox"></i> My Orders </a> </li> 
         <?php } ?>
            <li> <a href="#" data-toggle="modal" data-target="#requests"><i class="zmdi zmdi-inbox"></i> Notifications </a> </li>
            <li> <a href="<?php echo base_url(); ?>Books/logout"> <i class="zmdi zmdi-run"></i> Logout  </a> </li>
         <?php } else{
            //echo '<script> alert("Please Login"); </script>';
         }?>
         </ul>

         <ul class="user-info">
            <li class="profile-pic"> </li>
             <?php 
            if($this->session->userdata('user_type')=='admin'){ ?>
               <li class="user-name">Admin</li>
               <li class="more-btn"> <a href="#1"> Find Out More</a> </li>
             <?php 
            }
            else if($this->session->userdata('user_type')=='user'){ ?>
            <li class="user-name">User</li>
            <li class="more-btn"> <a href="#1"> Find Out More</a> </li> <?php }
            else{ ?>
            <li class="more-btn"> <a href="#" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo"> Please Login </a> </li>
            <li class="more-btn"> <a href="#" data-toggle="modal" data-target=".bd-example-modal-lg"> Register</a> </li>
            <?php } ?>
            
         </ul>
        

         <ul class="grid-items">
            <!--<a href="books/go_to_any_view/Add_record_view"><li class="grid"> Add Record</li></a>--><!--Special View-->
            <a href="#add_record" data-toggle="modal"><li class="grid"> Add Record</li></a>
            <a href="#user_listing" data-toggle="modal"><li class="grid"> Users </li></a>
            <!--<a href="<?php base_url();?>books/go_to_any_view/manage_user"><li class="grid"> Users </li></a>--><!--Special View-->
            <a href="#" data-toggle="modal" data-target="#requests"><li class="grid"> Requests </li></a>
            <li class="grid"> Logs </li>
            <li class="more-btn"><a href="#"> More</a></li>
         </ul>

      </section>
      <nav class="hs-navigation">
         <ul class="nav-links">
            <li><a href="#4"> <span class="icon"> <i class="zmdi zmdi-collection-item"></i> </span> List Item one</a> </li>
            <li class="has-child">
               <span class="its-parent">
               <span class="icon"> <i class="zmdi zmdi-device-hub"></i> 
               </span>Dropdown</span>
               <ul class="its-children">
                  <li><a href="#1"> Sub Item 1.1 </a> </li>
                  <li class="has-child">
                     <span class="its-parent"> Item 1.2 has child</span>
                     <ul class="its-children">
                        <li> <a href="#1">Child Item 1.2.1 </a> </li>
                        <li> <a href="#1"> Child  Item 1.2.2 </a> </li>
                        <li> <a href="#1"> Child Item 1.2.3 </a> </li>
                     </ul>
                  </li>
                  <li> <a href="#1"> Sub Item 1.3 </a> </li>
                  <li> <a href="#1"> Sub Item 1.4 </a></li>
               </ul>
            </li>
            <li> <a href="#4"> <span class="icon"> <i class="zmdi zmdi-compass"></i> </span> List three</a> </li>
            <li> <a href="#4"> <span class="icon"> <i class="zmdi zmdi-collection-video"></i> </span> List Item four</a> </li>
            <li class="has-child">
               <span class="its-parent">
               <span class="icon"> <i class="zmdi zmdi-wrap-text"></i> 
               </span>Another Dropdown</span>
               <ul class="its-children">
                  <li><a href="#1"> dropdown item 1  </a> </li>
                  <li> <a href="#1"> dropdown item 2 </a> </li>
                  <li> <a href="#1">  dropdown item 3 </a> </li>
                  <li> <a href="#1"> dropdown item 4</a> </li>
               </ul>
            </li>
            <!--//has-child-->
         </ul>
      </nav>
      <!--End hs Mega Menu-->
   </body>
</html>
