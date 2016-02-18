<!DOCTYPE html>
<html class="no-js">
<html lang="es">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title> {{ CNF_APPNAME }} </title>
<meta name="keywords" content="">
<meta name="description" content=""/>
<link rel="shortcut icon" href="{{ asset('favicon.ico')}}" type="image/x-icon">


		<link href="http://cdnjs.cloudflare.com/ajax/libs/jQuery-Validation-Engine/2.6.4/validationEngine.jquery.css" rel="stylesheet">
		<link href="http://fonts.googleapis.com/css?family=Lato:300,400,400italic,600,700|Raleway:300,400,500,600,700|Crete+Round:400italic" rel="stylesheet" type="text/css" />
		<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
		<link rel="stylesheet" href="https://code.getmdl.io/1.1.1/material.indigo-pink.min.css">
		<link href="{{ asset('sximo/js/plugins/bootstrap/css/bootstrap.css')}}" rel="stylesheet">
		<link href="{{ asset('sximo/js/plugins/jasny-bootstrap/css/jasny-bootstrap.min.css')}}" rel="stylesheet">
		<link href="{{ asset('sximo/fonts/awesome/css/font-awesome.min.css')}}" rel="stylesheet">
		<link href="{{ asset('sximo/js/plugins/bootstrap.summernote/summernote.css')}}" rel="stylesheet">
		<link href="{{ asset('sximo/js/plugins/datepicker/css/bootstrap-datetimepicker.min.css')}}" rel="stylesheet">
		<link href="{{ asset('sximo/js/plugins/bootstrap.datetimepicker/css/bootstrap-datetimepicker.min.css')}}" rel="stylesheet">
		<link href="{{ asset('sximo/js/plugins/select2/select2.css')}}" rel="stylesheet">
		<link href="{{ asset('sximo/js/plugins/jquery-confirm.css')}}" rel="stylesheet">
		<link href="{{ asset('sximo/js/plugins/iCheck/skins/square/green.css')}}" rel="stylesheet">
		<link href="{{ asset('sximo/js/plugins/iCheck/skins/square/aero.css')}}" rel="stylesheet">
		<link href="{{ asset('sximo/js/plugins/iCheck/skins/minimal/green.css')}}" rel="stylesheet">
		<link href="{{ asset('sximo/js/plugins/fancybox/jquery.fancybox.css') }}" rel="stylesheet">

		<link href="{{ asset('sximo/js/plugins/jQuery-TE/jquery-te-1.4.0.css') }}" rel="stylesheet">

		<link href="{{ asset('sximo/js/plugins/croppie-master/croppie.css') }}" rel="stylesheet">

		<link href="{{ asset('sximo/css/animate.css')}}" rel="stylesheet">
		<link href="{{ asset('sximo/css/icons.min.css')}}" rel="stylesheet">
		<link href="{{ asset('sximo/js/plugins/toastr/toastr.css')}}" rel="stylesheet">

		<link href="{{ asset('sximo/js/plugins/bootstrap-vertical-tabs-master/bootstrap.vertical-tabs.css')}}" rel="stylesheet">

		<link href="{{ asset('css/bootstrap.min.css')}}" rel="stylesheet">
		<link href="{{ asset('css/plugins.css')}}" rel="stylesheet">
		<link href="{{ asset('css/main.css')}}" rel="stylesheet">
		<link href="{{ asset('css/themes.css')}}" rel="stylesheet">
		<link href="{{ asset('css/themes/flat.css')}}" rel="stylesheet">

		@if(!Session::get('themes') or Session::get('themes') =='')
		<link href="{{ asset('sximo/css/sximo.css')}}" rel="stylesheet">
		@else
		<link href="{{ asset('sximo/css/'.Session::get('themes').'.css')}}" rel="stylesheet">
		@endif

		<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
		<script type="text/javascript" src="{{ asset('sximo/js/plugins/jquery.min.js') }}"></script>
		<script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
		<script defer src="https://code.getmdl.io/1.1.1/material.min.js"></script>
		<script type="text/javascript" src="{{ asset('js/vendor/modernizr-2.8.3.min.js') }}"></script>
		<script type="text/javascript" src="{{ asset('sximo/js/plugins/jquery.cookie.js') }}"></script>
		<script type="text/javascript" src="{{ asset('sximo/js/plugins/jquery-confirm.js') }}"></script>
		<script type="text/javascript" src="{{ asset('sximo/js/plugins/jquery-ui.min.js') }}"></script>
		<script type="text/javascript" src="{{ asset('sximo/js/plugins/iCheck/icheck.min.js') }}"></script>
		<script type="text/javascript" src="{{ asset('sximo/js/plugins/select2/select2.full.min.js') }}"></script>
		<script type="text/javascript" src="{{ asset('sximo/js/plugins/fancybox/jquery.fancybox.js') }}"></script>
		<script type="text/javascript" src="{{ asset('sximo/js/plugins/prettify.js') }}"></script>
		<script type="text/javascript" src="{{ asset('sximo/js/plugins/parsley.js') }}"></script>
		<script type="text/javascript" src="{{ asset('sximo/js/plugins/datepicker/js/bootstrap-datetimepicker.min.js') }}"></script>
		<script type="text/javascript" src="{{ asset('sximo/js/plugins/switch.min.js') }}"></script>
		<script type="text/javascript" src="{{ asset('sximo/js/plugins/bootstrap.datetimepicker/js/bootstrap-datetimepicker.min.js') }}"></script>
		<script type="text/javascript" src="{{ asset('sximo/js/plugins/bootstrap/js/bootstrap.js') }}"></script>
		<script type="text/javascript" src="{{ asset('sximo/js/plugins/jasny-bootstrap/js/jasny-bootstrap.min.js') }}"></script>
		<script type="text/javascript" src="{{ asset('sximo/js/sximo.js') }}"></script>
		<script type="text/javascript" src="{{ asset('sximo/js/plugins/jquery.form.js') }}"></script>
		<script type="text/javascript" src="{{ asset('sximo/js/plugins/jquery.jCombo.min.js') }}"></script>
		<script type="text/javascript" src="{{ asset('sximo/js/plugins/toastr/toastr.js') }}"></script>
		<script type="text/javascript" src="{{ asset('sximo/js/plugins/bootstrap.summernote/summernote.min.js') }}"></script>
		<script type="text/javascript" src="{{ asset('sximo/js/simpleclone.js') }}"></script>
		<script type="text/javascript" src="{{ asset('sximo/js/plugins/shokai-jQuery.editable/jquery.editable.js') }}"></script>
		<script type="text/javascript" src="{{ asset('sximo/js/plugins/shokai-jQuery.editable/jquery.editable.min.js') }}"></script>
		<script type="text/javascript" src="{{ asset('sximo/js/plugins/jQuery-TE/jquery-te-1.4.0.min.js') }}"></script>

		<script type="text/javascript" src="{{ asset('sximo/js/plugins/jquery.confirm-master/jquery.confirm.min.js') }}"></script>
		<script type="text/javascript" src="{{ asset('sximo/js/plugins/croppie-master/croppie.min.js') }}"></script>

		<script src="{{ asset('js/plugins.js') }}"></script>
        <script src="{{ asset('js/app.js') }}"></script>
		<!-- AJax -->
		<link href="{{ asset('sximo/js/plugins/ajax/ajaxSximo.css')}}" rel="stylesheet">
		<script type="text/javascript" src="{{ asset('sximo/js/plugins/ajax/ajaxSximo.js') }}"></script>

		<!-- End Ajax -->

		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
			<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->
		<script src="http://cdnjs.cloudflare.com/ajax/libs/jQuery-Validation-Engine/2.6.4/jquery.validationEngine.min.js"></script>
		<script src="http://cdnjs.cloudflare.com/ajax/libs/jQuery-Validation-Engine/2.6.4/languages/jquery.validationEngine-es.js"></script>

		<!-- include summernote css/js-->
		<link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.1/summernote.css" rel="stylesheet">
		<script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.1/summernote.js"></script>


  	</head>
  	<body>
	<div id="page-wrapper" class="page-loading">


			@include('layouts/sidemenu')


		<div id="page-content" style="min-height: 334px;">
			@include('layouts/headmenu')

			@yield('content')
		</div>



	</div>

<div class="modal fade" id="sximo-modal" tabindex="-1" role="dialog">
<div class="modal-dialog">
  <div class="modal-content">
	<div class="modal-header bg-default">

		<button type="button " class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
		<h4 class="modal-title">Modal title</h4>
	</div>
	<div class="modal-body" id="sximo-modal-content">

	</div>

  </div>
</div>
</div>

<!-- div class="theme-config">
    <div class="theme-config-box">
        <div class="spin-icon">
            <i class="fa fa-cogs fa-spin"></i>
        </div>
        <div class="skin-setttings">
            <div class="title">Select Color Schema</div>
            <div class="setings-item">
                    <ul>
	                    <li><a href="{{ url('home/skin/sximo') }}"> Default Skin  <span class="pull-right default-skin"> </span></a></li>
	                    <li><a href="{{ url('home/skin/sximo-dark-blue') }}"> Dark Blue Skin <span class="pull-right dark-blue-skin"> </span> </a></li>
	                    <li><a href="{{ url('home/skin/sximo-light-blue') }}"> Light Blue Skin <span class="pull-right light-blue-skin"> </span> </a></li>

                    </ul>


            </div>

        </div>
    </div>
</div-->

{{ Sitehelpers::showNotification() }}
<script>
	 $.datepicker.regional['es'] = {
	 closeText: 'Cerrar',
	 prevText: '<Ant',
	 nextText: 'Sig>',
	 currentText: 'Hoy',
	 monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
	 monthNamesShort: ['Ene','Feb','Mar','Abr', 'May','Jun','Jul','Ago','Sep', 'Oct','Nov','Dic'],
	 dayNames: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
	 dayNamesShort: ['Dom','Lun','Mar','Mié','Juv','Vie','Sáb'],
	 dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','Sá'],
	 weekHeader: 'Sm',
	 dateFormat: 'dd/mm/yy',
	 firstDay: 1,
	 isRTL: false,
	 showMonthAfterYear: false,
	 yearSuffix: ''
	 };
	 $.datepicker.setDefaults($.datepicker.regional['es']);
	$(function () {
	$("#fecha").datepicker();
	});
</script>
<script type="text/javascript">
jQuery(document).ready(function ($) {


	$('.spin-icon').click(function () {
        $(".theme-config-box").toggleClass("show");
    });

	setInterval(function(){
		var noteurl = $('.notif-value').attr('code');
		$.get( noteurl +'/notification/load',function(data){
			$('.notif-alert').html(data.total);
			var html = '';
			$.each( data.note, function( key, val ) {
				html += '<li><a href="'+val.url+'"> <div> <i class="'+val.icon+' fa-fw"></i> '+ val.title+'  <span class="pull-right text-muted small">'+val.date+'</span></div></li>';
				html += '<li class="divider"></li>';
			});
			html += '<li><div class="text-center link-block"><a href="'+noteurl+'/notification"><strong>View All Notification</strong> <i class="fa fa-angle-right"></i></a></div></li>';
			$('.notif-value').html(html);
		});
	}, 60000);

});


</script>
</body>
</html>
