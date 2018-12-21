define(['jquery'],function($){
	/*-----All Ajax----*/
	return{
		function1 : function(){
			
		},
		
		
		function2 : function(){
			$('#add_record_click').click(function(){
				$.ajax({
					url : 'Books/add_record',
					type: "POST",
					data: $('#add_record_form').serialize(),
					success: function(data)
					{
						$("#success_modal").modal('show');
						$("#add-record_model").modal('hide');
						setTimeout(function(){
							location.reload();
						}, 10000); 
					},
					error: function (jqXHR, textStatus, errorThrown)
					{
						alert('Error adding data');
					}
				});
			});
		},
		
		function3 : function(){
		    $('#onnne').on('click',function(){
		       	if (typeof $ == 'undefined') {
   						var $ = jQuery;
				    	$.wnoty({
		            	type: 'success',
		            	message: 'Click Works, Now you can Enjoy the site.',
		           		autohideDelay: 5000
		        	});
				}
		    });
		},
		
	}
});