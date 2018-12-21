requirejs.config({
	baseUrl:'http://localhost/Semi/Utils/JS',
	paths: {
    jquery: 'https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min',
    slim_jquery: 'https://code.jquery.com/jquery-3.2.1.slim.min',
	bs:'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min',
	owlSlider:'lib/owl.carousel.min',
	fancybox:"https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.2/dist/jquery.fancybox.min",
	accordion:'lib/ez_accordion',
	notifications:'lib/wnoty',
	sort_cards:'lib/jquery.sdFilterMe',
	menu:'lib/jquery.hsmenu.min',
	upload_lib:'lib/dropzone',
	module1:'custom/module1',
	module2:'custom/module2',
	module3:'custom/module3',
	module4:'custom/module4',
	module5:'custom/module5',
	},
   
   shim: {
			'bs': ['jquery'],
			'owlSlider': ['jquery'],
			'accordion': ['jquery'],
			'menu': ['jquery'],
			'notifications':['jquery'],
		}
  
	});


require(['jquery'
	,'bs'
	,'owlSlider'
	,'fancybox'
	,'accordion'
	,'menu'
	,'notifications'
	,'sort_cards'
	,'upload_lib'
	,'module1'
	,'module2'
	,'module3'
	,'module4'
	,'module5'
	], function($,bs,owl,fancybox,accordion,menu,notifications,sort_cards,upload_lib,module1,module2,module3,module4,module5){ 
	//module1.function1();
	module1.function2();
	module1.function3();
	//module1.function4();
	module1.function5();
	module1.function6();

/*--------------------------------*/

	module2.function1();
	module2.function2();
	//module2.function3();
	module2.function4();
	
/*--------------------------------*/
	
	module3.function1();
	module3.function2();
	module3.function3();
/*--------------------------------*/

	module4.function1();
	module4.function2();
	module4.function3();
	//module4.function4();

	module5.function1();
	module5.function2();
	module5.function3();
});
