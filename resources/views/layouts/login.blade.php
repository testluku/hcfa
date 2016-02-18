<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>{{ CNF_APPNAME }}</title>
<link rel="shortcut icon" href="{{ asset('favicon.ico')}}" type="image/x-icon">

		<link href="{{ asset('sximo/js/plugins/bootstrap/css/bootstrap.css')}}" rel="stylesheet"> 
		<link href="{{ asset('sximo/css/sximo.css')}}" rel="stylesheet">
		<link href="{{ asset('sximo/css/animate.css')}}" rel="stylesheet">
		<link href="{{ asset('sximo/css/icons.min.css')}}" rel="stylesheet">
		<link href="{{ asset('sximo/fonts/awesome/css/font-awesome.min.css')}}" rel="stylesheet">
		
		<link href="{{ asset('css/bootstrap.min.css')}}" rel="stylesheet">		
		<link href="{{ asset('css/plugins.css')}}" rel="stylesheet">
		<link href="{{ asset('css/main.css')}}" rel="stylesheet">
		<link href="{{ asset('css/themes.css')}}" rel="stylesheet">
		<link href="{{ asset('css/themes/flat.css')}}" rel="stylesheet">

		
		<script type="text/javascript" src="{{ asset('sximo/js/plugins/parsley.js') }}"></script>			
			

		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
			<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->	

		
	
  	</head>
<body>
	<img src="{{ asset('img/health_care-background.jpg')}}" alt="Full Background" class="full-bg animation-pulseSlow">

    <div id="login-container">
	    <div style="background: rgba(255,255,255,0.9); border-radius: 25px; width: 400px; height: 500px;">
	    	@yield('content')
	    </div>
    </div>


	<!-- jQuery, Bootstrap, jQuery plugins and Custom JS code -->
        <script src="{{ asset('js/vendor/jquery-2.1.4.min.js') }}"></script>
        <script src="{{ asset('js/vendor/bootstrap.min.js') }}"></script>
        <script src="{{ asset('js/plugins.js') }}"></script>
        <script src="{{ asset('js/app.js') }}"></script>

        <!-- Load and execute javascript code used only in this page -->
        <script src="{{ asset('js/pages/readyLogin.js') }}"></script>
        <script>$(function(){ ReadyLogin.init(); });</script>
	
</body> 
</html>