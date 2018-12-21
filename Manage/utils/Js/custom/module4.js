define(['jquery'],function($){
	/*-----All Validation----*/
	return{

		function1 : function(){
			/*----login----*/
			$('#login_btn').attr("disabled", "disabled");
			$("#username").focusout(function(){
				if($(this).val()==''){
					 $('#username_error').css("display", "block");
					 $('#username').css('border','red solid 1px');
					 
				}
				else{
					$('#username').css('border','green solid 1px');
					$('#username_error').css("display", "none");
				}
			});
			
			
			$("#password_login").keyup(function(){
				$('#login_btn').removeAttr("disabled", "disabled");
			});
			
			$("#password_login").focusout(function(){
				if($(this).val()==''){
					 $('#password_error').css("display", "block");
					  $('#password_login').css('border','red solid 1px');
					 $('#login_btn').attr("disabled", "disabled");
				}
				else{
					$('#password_login').css('border','green solid 1px');
					$('#login_btn').removeAttr("disabled", "disabled");
					$('#password_error').css("display", "none");
				}
			});
			
			
		},
		
		
		function2 : function(){
			/*-------register------*/
			$('#register_user_btn').attr("disabled", "disabled");
			$("#first_name_reg").focusout(function(){
				if($(this).val()==''){
					 $('#first_name_reg').css('border','red solid 1px');
				}
				else{
					$('#first_name_reg').css('border','green solid 1px');
				}
			});
			
			$("#middle_name_reg").focusout(function(){
				if($(this).val()==''){
					 $('#middle_name_reg').css('border','red solid 1px');
					
				}
				else{
					$('#middle_name_reg').css('border','green solid 1px');
				}
			});
			
			$("#last_name_reg").focusout(function(){
				if($(this).val()==''){
					 $('#last_name_reg').css('border','red solid 1px');
					
				}
				else{
					$('#last_name_reg').css('border','green solid 1px');
				}
			});
			
			$("#address_reg").focusout(function(){
				if($(this).val()==''){
					 $('#address_reg').css('border','red solid 1px');
					
				}
				else{
					$('#address_reg').css('border','green solid 1px');
				}
			});
			
			
			
			$("#email_reg").focusout(function(){
				if($(this).val()==''){
					 $('#email_reg').css('border','red solid 1px');
				}
				else{
					$('#email_reg').css('border','green solid 1px');
				}
			});
			
			
			$("#mobile_reg").focusout(function(){
				if($(this).val()==''){
					 $('#mobile_reg').css('border','red solid 1px');
					 
				}
				else{
					$('#mobile_reg').css('border','green solid 1px');
				}
			});
			
			$("#confirm_password_register").keyup(function(){
				$('#register_user_btn').removeAttr("disabled", "disabled");
			});
			
			
			$("#confirm_password_register").focusout(function(){
				if($(this).val() == $('#password_register').val() && $(this).val()!=''){
						$('.password_reg').css('border','green solid 1px');
						$('#register_user_btn').removeAttr("disabled", "disabled");
				}
				else{
						
						alert('Entered Password & confirm Password Not Matching. ');
				}
			});	
		},

		function3 : function(){
			$('#register_user_btn').click(function(){
				if($("#first_name_reg").val()=='' || $("#middle_name_reg").val()=='' || $("#last_name_reg").val()=='' || $("#mobile_reg").val()=='' || $("#address_reg").val()=='' || $("#email-reg").val()=='' ){
					$('#register_user_btn').attr("disabled", "disabled");
						alert("Something is Wrong");
				}else{
					$.ajax({
						url : "Books/registration",
						type: "POST",
						data: $('#registration_form').serialize(),
						success: function(data)
						{
							alert('Registered Succesfully,Please Login to Continue');	
							location.reload();
						},
						error: function (jqXHR, textStatus, errorThrown)
						{
							alert('Error');
						}
					});	
				}
			});
		},

		//main.js coomented
		function4:function(){
			$('#register_user_btn').click(function(){
			Dropzone.autoDiscover = false;
			    var myDropzone = new Dropzone(".dropzone", {
					url: "Books/register_with_upload",
					paramName: "file",
					maxFilesize: 1,
					maxFiles: 1,
					acceptedFiles: "image/*",
					autoProcessQueue:false,
				});
				autoProcessQueue:false;
			});
			 
		},



		
		
	}
});