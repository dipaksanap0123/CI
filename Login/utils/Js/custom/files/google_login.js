define(['jquery','login'],function($,login){
	return{
		function1 : function(){
			function renderButton() {
	    		gapi.signin2.render('gSignIn', {
			        'scope': 'profile email',
			        'width': 1000,
			        'height': 40,
			        'longtitle': true,
			        'theme': 'light',
			        'onsuccess': onSuccess,
			        'onfailure': onFailure
			    });
			}

			function onSuccess(googleUser) {
			    var profile = googleUser.getBasicProfile();
			    gapi.client.load('plus', 'v1', function () {
			        var request = gapi.client.plus.people.get({
			            'userId': 'me'
			        });
			        request.execute(function (resp) {
			           send_data(resp);
			        });
			    });
			}


			function onFailure(error) {
			    alert(error);
			}


			function send_data(data){
			    $.ajax({
			        url: "<?php echo base_url(); ?>login/welcome",
			        type: "POST", 
			        data:{name:data.displayName,email:data.emails[0].value, google_id:data.id, gender: data.gender, profile_link: data.url},
			        success: function(result){
			            console.log(result);
			         document.location.href= '<?php echo base_url(); ?>login/move_view';

			        }
			    });
			}


			 function signOut() {
	            var auth2 = gapi.auth2.getAuthInstance();
	            auth2.signOut().then(function () {
	                document.getElementsByClassName("userContent")[0].innerHTML = '';
	                document.getElementsByClassName("userContent")[0].style.display = "none";
	                document.getElementById("gSignIn").style.display = "block";
	            });auth2.disconnect();
	        }


		},
		
	}
});