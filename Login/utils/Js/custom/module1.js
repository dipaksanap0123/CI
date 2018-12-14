define(['jquery','owlSlider','accordion'],function($,owlSlider,accordion){
	return{
		function1 : function(){
			var $j = jQuery.noConflict();
			$j(document).ready(function(){
				var owl = $j('.owl-carousel');
				$j('.owl-carousel').owlCarousel({
					stagePadding: 30,
					loop:true,
					margin:10,
					nav:false,
					center:true,
					responsive:{
								0:{
									items:1
								},
								600:{
									items:3
								},
								1000:{
									items:5
								}
							}
	
					});
							
			});
		},
		
		
		
		function2:function(){
				
				// $('#cat_nav_slide').toggle();
			// });
			var editAdd = [editList, addList],
			c = 0;

			function editList(){
				$('#cat_nav_slide').show();
				$('#sortBy').hide();
				$("#reflex").css("margin-top", "110px");
				$("#usr_data").css("margin-top", "160px");
			}
			function addList(){
				$('#cat_nav_slide').hide();
				$('#sortBy').show();
				$("#reflex").css("margin-top", "20px");
				$("#usr_data").css("margin-top", "70px");
			}

			$('#catagories').click(function(e){  
				e.preventDefault();
				editAdd[c++%2]();
			});

			
		},
		
		function3:function(){
			 var a  = new ezAccordion('.accordion');
		},
		
		
		function4:function(){
			$('#home_menu').click(function(){
				 $( "#mainView" ).load("app1/load_home");
					
			});
			
			$('#help_menu').click(function(){
				 $( "#mainView" ).load("app1/load_help");
				
				
			});
		},
		
		function5:function(){
			$('#help_menu').on('click', function() {
				helpOverlay.addLabelTo($('#id1'), "jQueryScript", "bottomright", 2);
			});
		},

		function6:function(){
			//Menu
			var $j = jQuery.noConflict();
			$j(".hs-menubar").hsMenu();
		}
	}
});