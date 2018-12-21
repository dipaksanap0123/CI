<!DOCTYPE html>
<html>
<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

	<script src="https://apis.google.com/js/client:platform.js?onload=renderButton" async defer></script>
	
    <meta name="google-signin-client_id" content="202712542853-9frsqfk8d8t0m12oud7jv854ardenl2v.apps.googleusercontent.com">

	<script type="text/javascript">
	/*	function renderButton() {
    gapi.signin2.render('gSignIn', {
        'scope': 'profile email',
        'width': 1000,
        'height': 40,
        'longtitle': true,
        'theme': 'light',
        'onsuccess': onSuccess,
        'onfailure': onFailure
    });
}*/

 function renderButton() {
      gapi.signin2.render('gSignIn', {
        'scope': 'profile',
        'width': 240,
        'height': 40,
        'longtitle': true,
        'theme': 'dark',
        'onsuccess': onSuccess,
        'onfailure': onFailure,
        'ux_mode': "redirect"
      });
    }





// Sign-in success callback
function onSuccess(googleUser) {
    // Get the google profile data
   // var profile = googleUser.getBasicProfile();
/**/
   
 // var profile = auth2.currentUser.get().getBasicProfile();
 var profile = googleUser.getBasicProfile();
  console.log('ID: ' + profile.getId());
  console.log('Full Name: ' + profile.getName());
  console.log('Given Name: ' + profile.getGivenName());
  console.log('Family Name: ' + profile.getFamilyName());
  console.log('Image URL: ' + profile.getImageUrl());
  console.log('Email: ' + profile.getEmail());
  send_data(profile);

    
    // Get the google+ profile data
    /*gapi.client.load('plus', 'v1', function () {
        var request = gapi.client.plus.people.get({
            'userId': 'me'
        });
        request.execute(function (resp) {
           send_data(resp);
        });
    });*/
}

// Sign-in failure callback
function onFailure(error) {
    alert(error);
}


function send_data(profile){
    $.ajax({
        url: "<?php echo base_url(); ?>login/welcome",
        type: "POST", 
        data:{name:profile.getName(),email:profile.getEmail(), google_id:profile.getId(), profile_pic: profile.getImageUrl()},
        success: function(result){
            console.log(result);
         //document.location.href= '<?php echo base_url(); ?>login/move_view';

        }
    });
}

/* OLD -->function send_data(data){
    $.ajax({
        url: "<?php echo base_url(); ?>login/welcome",
        type: "POST", 
        data:{name:data.displayName,email:data.emails[0].value, google_id:data.id, gender: data.gender, profile_link: data.url},
        success: function(result){
            console.log(result);
         //document.location.href= '<?php echo base_url(); ?>login/move_view';

        }
    });
}*/

// Sign out the user
function signOut() {
    var auth2 = gapi.auth2.getAuthInstance();
    auth2.signOut().then(function () {
        document.getElementsByClassName("userContent")[0].innerHTML = '';
        document.getElementsByClassName("userContent")[0].style.display = "none";
        document.getElementById("gSignIn").style.display = "block";
    });
    
    auth2.disconnect();
    document.location.href='<?php echo base_url(); ?>login';
}
	</script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">


    <!--**********************FB**************************************-->
 <!--   <script>
window.fbAsyncInit = function() {
    // FB JavaScript SDK configuration and setup
    FB.init({
      appId      : '527557627760553', // FB App ID
      cookie     : true,  // enable cookies to allow the server to access the session
      xfbml      : true,  // parse social plugins on this page
      version    : 'v2.8' // use graph api version 2.8
    });
    
    // Check whether the user already logged in
    FB.getLoginStatus(function(response) {
        if (response.status === 'connected') {
            //display user data
            getFbUserData();
        }
    });
};

// Load the JavaScript SDK asynchronously
(function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = "//connect.facebook.net/en_US/sdk.js";
    fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));

// Facebook login with JavaScript SDK
function fbLogin() {
    FB.login(function (response) {
        if (response.authResponse) {
            // Get and display the user profile data
            getFbUserData();
        } else {
            document.getElementById('status').innerHTML = 'User cancelled login or did not fully authorize.';
        }
    }, {scope: 'email'});
}

// Fetch the user profile data from facebook
function getFbUserData(){
    FB.api('/me', {locale: 'en_US', fields: 'id,first_name,last_name,email,link,gender,locale,picture'},
    function (response) {
        document.getElementById('fbLink').setAttribute("onclick","fbLogout()");
        document.getElementById('fbLink').innerHTML = 'Logout from Facebook';
        document.getElementById('status').innerHTML = 'Thanks for logging in, ' + response.first_name + '!';
        document.getElementById('userData').innerHTML = '<p><b>FB ID:</b> '+response.id+'</p><p><b>Name:</b> '+response.first_name+' '+response.last_name+'</p><p><b>Email:</b> '+response.email+'</p><p><b>Gender:</b> '+response.gender+'</p><p><b>Locale:</b> '+response.locale+'</p><p><b>Picture:</b> <img src="'+response.picture.data.url+'"/></p><p><b>FB Profile:</b> <a target="_blank" href="'+response.link+'">click to view profile</a></p>';
    });
}

// Logout from facebook
function fbLogout() {
    FB.logout(function() {
        document.getElementById('fbLink').setAttribute("onclick","fbLogin()");
        document.getElementById('fbLink').innerText = 'Please Login';
        document.getElementById('userData').innerHTML = '';
        document.getElementById('status').innerHTML = 'You have successfully logout from Facebook.';
    });
}
</script>-->
</head>
<body>
	<div class='container'>
    <div class='row'>
    <div class='col-sm-5 well text-center'>
        <div class='container' id="gSignIn">
        </div>     
    </div>

    <div class='col-sm-5 well text-center'>
       <div class="fb-login-button" data-max-rows="5" data-size="large" data-button-type="login_with" data-show-faces="false" data-auto-logout-link="true" data-use-continue-as="true"></div> 
    </div>
    </div>
</div>

    <div class='text-right'>
        <button class='btn btn-warning' onclick='signOut()'>Sign Out</button>
    </div>


    <div id="status"></div>
<!--********************************FB***********************-->
   <!-- <div class='container'>
    <a href="javascript:void(0);" onclick="fbLogin()" id="fbLink"><button class='btn btn-primary btn-block'>Login with Facebook</button></a>

    <div id="userData"></div>
    </div>-->

    <div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = 'https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v2.8&appId=527557627760553&autoLogAppEvents=1';
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
	
<!-- Show the user profile details -->

</body>
</html>