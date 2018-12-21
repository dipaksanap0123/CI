define(['jquery'],function($){
	/*-----Search Feature----*/
	return{
		function1 : function(){
			$(document).ready(function(){
			//load_data();

				/*$('#search_all').keyup(function(){
	               $('.suggestions').css('display','block');
	            }); */

	           /*$('#search_all').focusout(function(){
	               $('.suggestions').html('');
	               $('.suggestions').css('display','none');
	            }); */

				function load_data(to_search){
				 $.ajax({
					 url:"Books/search_data",
					 method:"POST",
					  cache: false,
					 data:{to_search:to_search},
					 success:function(data){
					 	$('.suggestions').html(data);
						$('.suggestions h5').click(function(){
							$('.suggestions').css('display','none');
							var name= $(this).attr('id');
							var price = $(this).attr('data-price');
							var rating = $(this).attr('data-rating');
							var img_name = $(this).attr('data-image');

							$('.desc_name').text(name);
							$('.desc_price').text(price);
							$('.desc_rating').text(rating);
							$('.cover_img').attr('src','uploads/'+img_name);
							//$('.cover_img').attr('data-fancybox','');
							$('#add_to_cart').attr('data-book',name);						
						});
					 },
					 error:function(xhr, desc, err)
						 {
							console.log(xhr);
						}
					})
				}
				$("#search_all").keyup(function(){
					 $('.suggestions').css('display','block');
					  var search = $(this).val();
					  if(search != ''){
					  	load_data(search);
					  }
					 else{
						//load_data();
					  }
				   });
			 	});
		},	

		function2 : function(){
			$(document).ready(function(){
				$('#delete_usr_acc').click(function(){
					$.ajax({
					 url:"Books/ssd",
					 method:"POST",
					  cache: false,
					 data:{username:username},
					 success:function(data){
					 	$('.suggestions').html(data);
						console.log(data);
					 },
					 error:function(xhr, desc, err)
						 {
							console.log(xhr);
						}
					})
				});
				 
			});
		},	


		function3: function(){
			$(document).ready(function(){
				$('#add_to_cart').click(function(){
					var qty = $('#spl_qty').val();
					var username = $('#add_to_cart').attr('data-usr');
					var book_name = $('#add_to_cart').attr('data-book');;
					console.log(qty);
					$.ajax({
					 url:"Books/add_to_cart",
					 method:"POST",
					  cache: false,
					 data:{book_name:book_name,username:username, qty:qty },
					 success:function(data){
					 	console.log(data);
					 	alert('Added');
					 },
					 error:function(xhr, desc, err)
						 {
							console.log(xhr);
						}
					})
				});
			});
		},
	

		


	}
});