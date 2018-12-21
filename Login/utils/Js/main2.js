requirejs.config({
	baseUrl:'http://localhost/Manage/utils/Js',
	paths: {
    jquery: 'https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min',
	bs:'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min',
	login:'https://apis.google.com/js/client:platform.js?onload=renderButton',
	module1:'custom/files/google_login',
	},
   
   shim: {
			'bs': ['jquery'],
		}
  
	});


require(['jquery'
	,'bs'
	,'login'
	,'module1'
	], function($,bs,login,module1){ 
		module1.function1();
	});
