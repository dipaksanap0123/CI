define(['jquery'],function($){
	return{
		function1 : function(){
			$('#inputUncheck').removeAttr('checked');
			
		},
		function2 : function(){
			 $('#inputUncheck').click(function(){
				 if($(this).prop("checked") == true){
					 $("#author_input").toggle();
				 }
				
			});
		},
		
		function3: function(){
			$('#all_book_vertical').scroll(function(){
				
				if ($('#all_book_vertical').scrollTop() > 2)
				{
					console.log($('div #all_book_vertical').scrollTop());
					$('.common').hide(200);	
				}
				else{
					$('.common').show(300);
				}
			});			
		},

		function4: function(){
			$(document).ready(function(){
		          $('.acc').on("click", function(){
		             var r_id= $(this).attr('id');

		              $.ajax({
		              url : 'Books/accept_request',
		              type: "POST",
		              data: {request_id:r_id},
		              success: function(data)
		              {
		                  $('#not_'+data).hide();
		                  //delete_req(data);
		              },
		              error: function (jqXHR, textStatus, errorThrown)
		              {
		                  alert('Error Accepting request');
		              }
		            });
		          });


		           $('.rej').on("click", function(){
		             var r_id= $(this).attr('id');
		              $.ajax({
		              url : 'Books/reject_request',
		              type: "POST",
		              data: {request_id:r_id},
		              success: function(data)
		              {
		                  $('#not_'+data).hide();
		                  //delete_req(data);
		              },
		              error: function (jqXHR, textStatus, errorThrown)
		              {
		                  alert('Error Accepting request');
		              }
		            });
		          });



		       });
		},
	}
});