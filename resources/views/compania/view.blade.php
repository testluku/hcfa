@extends('layouts.app')

@section('content')

  <div class="page-content row">
    <!-- Page header -->
		<div class="content-header">
			<div class="row">
				<div class="col-sm-6">
					<div class="header-section">{{ $title }}</div>
				</div>
				<div class="col-sm-6 hidden-xs">
					<div class="header-section">
						<ul class="breadcrumb breadcrumb-top">

							<li><a href="{{ URL::to('dashboard') }}">{{ Lang::get('core.home') }}</a></li>
							<li><a href="{{ URL::to('compania') }}">Compa&ntilde;&iacute;a</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>

 	<div class="page-content-wrapper">

		<ul class="parsley-error-list">
			@foreach($errors->all() as $error)
				<li>{{ $error }}</li>
			@endforeach
		</ul>
<div class="sbox animated fadeInRight">

	<div class="sbox-content">
    <div class="col-md-12">
						<fieldset><legend>Compa&ntilde;&iacute;a</legend>

          <div class="form-group picture-upload">

            <div class="col-1-2">
              <div id="upload-msg" class="upload-msg">
                      @if(!$row_compania->logo)
                      <img src="{{ asset('img/placeholders/avatars/avatar9@2x.jpg') }}"
                        alt="avatar"
                        class="picture">
                      @else
                      <img src="{{$row_compania->logo}}" alt="avatar" class="picture" />
                      @endif

                            </div>
                <div id="upload-demo" class="upload-demo croppie-container"></div>
            </div>

          </div>

				  <div class="form-group col-xs-8 col-xs-offset-2" >
  					<label for="Número" class=" control-label col-xs-8 text-left">
  					NIT
  					</label>
  					<div class="col-xs-4">
  					  {{$row_compania->numeroIdentificacion}}
  					 </div>
				  </div>
				  <div class="form-group col-xs-8 col-xs-offset-2" >
  					<label for="Nombre(s)" class=" control-label col-xs-8 text-left">
  					Nombre
  					</label>
  					<div class="col-xs-4">
  					  {{$row_compania->nombre}}
  					 </div>
				  </div>

				  <div class="form-group col-xs-8 col-xs-offset-2" >
  					<label for="Dirección" class=" control-label col-xs-8 text-left">
  					 Direcci&oacute;n
  					</label>
  					<div class="col-xs-4">
  					  {{$row_compania->direccion}}
  					 </div>
				  </div>

          <div class="form-group col-xs-8 col-xs-offset-2" >
  					<label for="Ciudad" class=" control-label col-xs-8 text-left">
  					 Ciudad
  					</label>
  					<div class="col-xs-4">
  					  {{$row_compania->ciudad}}
  					 </div>
				  </div>

          <div class="form-group col-xs-8 col-xs-offset-2" >
  					<label for="Pais" class=" control-label col-xs-8 text-left">
  					 Pa&iacute;s
  					</label>
  					<div class="col-xs-4">
  					  {{$row_compania->pais}}
  					 </div>
				  </div>

				  <div class="form-group col-xs-8 col-xs-offset-2" >
					<label for="TeléfonoFijo" class=" control-label col-xs-8 text-left">
					  Telefono Fijo
					</label>
					<div class="col-xs-4">
					  {{$row_compania->telefonoFijo}}
					 </div>
				  </div>

				  <div class="form-group col-xs-8 col-xs-offset-2" >
					<label for="Móvil 1" class=" control-label col-xs-8 text-left">
					  Telefono Movil
					</label>
					<div class="col-xs-4">
					  {{$row_compania->telefonoMovil}}
					 </div>
				  </div>

          <div class="form-group col-xs-8 col-xs-offset-2" >
					<label for="Móvil 1" class=" control-label col-xs-8 text-left">
					  Sufijo
					</label>
					<div class="col-xs-4">
					  {{$row_datos_legales->sufijo}}
					 </div>
				  </div>

          <div class="form-group col-xs-8 col-xs-offset-2" >
					<label for="Móvil 1" class=" control-label col-xs-8 text-left">
					  Prefijo
					</label>
					<div class="col-xs-4">
					  {{$row_datos_legales->prefijo}}
					 </div>
				  </div>

          <div class="form-group col-xs-8 col-xs-offset-2" >
					<label for="Móvil 1" class=" control-label col-xs-8 text-left">
					  Resoluci&oacute;n
					</label>
					<div class="col-xs-4">
					  {{$row_datos_legales->resolucion}}
					 </div>
				  </div>

          <div class="form-group col-xs-8 col-xs-offset-2 text-center">
            <button type="button" onclick="location.href='{{ URL::to('compania?return='.$return) }}' " class="btn btn-success btn-sm "><i class="fa  fa-arrow-circle-left "></i> Atr&aacute;s </button>
          </div>
        </fieldset>
			</div>




			<div style="clear:both"></div>

	</div>
</div>
</div>
</div>
   <script type="text/javascript">



   function demoUpload() {
     var $uploadCrop;

     function readFile(input) {
         if (input.files && input.files[0]) {
               var reader = new FileReader();

               reader.onload = function (e) {
                 $uploadCrop.croppie('bind', {
                   url: e.target.result
                 });
                 //alert('select');
                 $('#upload-demo').removeClass('upload-demo');
                 $('#upload-msg').remove();
               }

               reader.readAsDataURL(input.files[0]);
           }
           else {
             console.log("Sorry - you're browser doesn't support the FileReader API");
         }
     }

     $uploadCrop = $('#upload-demo').croppie({
       viewport: {
         width: 150,
         height: 150,
         type: 'circle'
       },
       boundary: {
         width: 250,
         height: 250
       }
     });

     $('#upload').on('change', function () { readFile(this); });
     $('.cr-overlay').on('mousemove', function (ev) {
       $uploadCrop.croppie('result', {
         type: 'canvas',
         size: 'original'
       }).then(function (resp) {
          $('#picture').val(resp);
       });
     });
   }

   $(document).ready(function() {
     demoUpload();
});

	</script>
@stop
