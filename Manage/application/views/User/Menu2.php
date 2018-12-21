<!DOCTYPE html>
<html lang="en-US">
   <head>
      <meta charset="UTF-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1" />
      <meta charset="utf-8" />
      <title> Dashboard </title>
      <!--Google Fonts-->
      <link href="https://fonts.googleapis.com/css?family=Nanum+Gothic" rel="stylesheet">

      <!--Material Design Iconic Font-->
      <link rel="stylesheet" href="<?php echo base_url(); ?>Utils/css/material-design/css/material-design-iconic-font.css" />
      
     <!--jQuery-->
      <script
  src="https://code.jquery.com/jquery-3.3.1.min.js"
  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  crossorigin="anonymous"></script>
<link rel="stylesheet" href="<?php echo base_url(); ?>Utils/css/hs-menu.min.css" />
      <script src="<?php echo base_url(); ?>Utils/js/jquery.hsmenu.min.js"></script>
      <script>

         $(document).ready(function () {
         
         $(".hs-menubar").hsMenu(); 
         
         }); 
      </script>

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
               <input type="text" name="search">
               <!--<button type="submit" class="search-submit btn" disabled>Search</button>-->
            </form>
         </div>
         <div class="hs-user toggle" data-reveal=".user-info">
            <img src="<?php echo base_url(); ?>Utils/images/nodp.png" alt="">
         </div>
         <div class="grid-trigger toggle" data-reveal=".grid-items"> <i class="zmdi zmdi-view-module"></i> </div>
         <div class="more-trigger toggle" data-reveal=".user-penal"> <i class="zmdi zmdi-more-vert"></i></div>
      </header>
      <section class="box-model">
         <ul class="user-penal">
            <li> <a href="#1"><i class="zmdi zmdi-inbox"></i> Inbox </a> </li>
            <li> <a href="#1"> <i class="zmdi zmdi-delete"></i> Trash </a> </li>
            <li> <a href="#1"> <i class="zmdi zmdi-star"></i> Started  </a> </li>
            <li> <a href="#1"> <i class="zmdi zmdi-run"></i> Logout  </a> </li>
         </ul>
         <?php if($this->session->userdata('login')=='logged_in'){ ?>
         <ul class="user-info">
            <li class="profile-pic"> </li>
            <li class="user-name">User</li>
            <li class="user-bio"> Front End Web Developer</li>
            <li class="more-btn"> <a href="#1"> Find Out More</a> </li>
         </ul>
         <? }else{?>
        <ul class="user-info">
            <li class="profile-pic"> </li>
            <li class="more-btn"> <a href="#ex1" rel="modal:open"> Please Login</a> </li>
            <li class="more-btn" data-toggle="modal" data-target="#login_model" data-whatever="@mdo"> <a href="#"> Register</a> </li>
         </ul>
         <?php } ?>
         <ul class="grid-items">
            <li class="grid"> Item one</li>
            <li class="grid"> Item two </li>
            <li class="grid"> Item three </li>
            <li class="grid"> Item four </li>
            <li class="grid"> Item five </li>
            <li class="grid"> Item six </li>
            <li class="more-btn"><a href="#1"> More</a></li>
         </ul>
      </section>
      <nav class="hs-navigation">
         <ul class="nav-links">
            <li><a href="#4"> <span class="icon"> <i class="zmdi zmdi-collection-item"></i> </span> List Item one</a> </li>
            <li class="has-child">
               <span class="its-parent">
               <span class="icon"> <i class="zmdi zmdi-device-hub"></i> 
               </span>Multilevel Dropdown</span>
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
