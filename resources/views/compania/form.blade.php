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
							<li><a href="{{ URL::to('compania') }}">Compa&ntilde;&iacute;as</a></li>
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

		 {!! Form::open(array('url'=>'compania/saved?return='.$return, 'class'=>'form-horizontal','files' => true , 'parsley-validate'=>'','novalidate'=>' ')) !!}
<div class="col-md-12">
						<fieldset><legend>Compa&ntilde;&iacute;a</legend>

				  <div class="form-group hidethis " style="display:none;">
					<label for="Id" class=" control-label col-md-4 text-left">

					</label>
					<div class="col-md-6">
					  {!! Form::text('idCompania', $row['id'],array('class'=>'form-control', 'placeholder'=>'',   )) !!}
					 </div>
					 <div class="col-md-2">

					 </div>
				  </div>

          <div class="form-group hidethis " style="display:none;">
					<label for="Id" class=" control-label col-md-4 text-left">

					</label>
					<div class="col-md-6">
					  {!! Form::text('idDatosLegales', $row_datos_legales['id'] ,array('class'=>'form-control', 'placeholder'=>'',   )) !!}
					 </div>
					 <div class="col-md-2">

					 </div>
				  </div>

          <div class="form-group picture-upload">
            {!! Form::hidden('picture', $row['logo'], array('id' => 'picture')) !!}
            <div class="col-1-2">
              <div id="upload-msg" class="upload-msg">
                      @if(!$row['logo'])
                      <img src="{{ asset('img/placeholders/avatars/avatar9@2x.jpg') }}"
                        alt="avatar"
                        class="picture">
                      @else
                      <img src="{{$row['logo']}}" alt="avatar" class="picture" />
                      @endif

                            </div>
                <div id="upload-demo" class="upload-demo croppie-container"></div>
            </div>
            <div class="actions">
                <a class="file-btn">
                    <span>Upload</span>
                    <input type="file" id="upload" value="Choose a file" accept="image/*" />
                </a>

            </div>
          </div>

				  <div class="form-group  " >
  					<label for="Número" class=" control-label col-md-4 text-left">
  					NIT
  					</label>
  					<div class="col-md-6">
  					  {!! Form::text('numeroIdentificacion', $row['numeroIdentificacion'],array('class'=>'form-control', 'placeholder'=>'', 'required'=>'true'  )) !!}
  					 </div>
  					 <div class="col-md-2">

  					 </div>
				  </div>
				  <div class="form-group  " >
  					<label for="Nombre(s)" class=" control-label col-md-4 text-left">
  					Nombre
  					</label>
  					<div class="col-md-6">
  					  {!! Form::text('nombre', $row['nombre'],array('class'=>'form-control', 'placeholder'=>'', 'required'=>'true'  )) !!}
  					 </div>
  					 <div class="col-md-2">

  					 </div>
				  </div>

				  <div class="form-group  " >
  					<label for="Dirección" class=" control-label col-md-4 text-left">
  					 Direcci&oacute;n
  					</label>
  					<div class="col-md-6">
  					  {!! Form::text('direccion', $row['direccion'],array('class'=>'form-control', 'placeholder'=>'',   )) !!}
  					 </div>
  					 <div class="col-md-2">

  					 </div>
				  </div>

          <div class="form-group  " >
  					<label for="Ciudad" class=" control-label col-md-4 text-left">
  					 Ciudad
  					</label>
  					<div class="col-md-6">
  					  {!! Form::text('ciudad', $row['ciudad'],array('class'=>'form-control', 'placeholder'=>'',   )) !!}
  					 </div>
  					 <div class="col-md-2">

  					 </div>
				  </div>

          <div class="form-group  " >
  					<label for="Pais" class=" control-label col-md-4 text-left">
  					 Pa&iacute;s
  					</label>
  					<div class="col-md-6">
  					  {!! Form::text('pais', $row['pais'],array('class'=>'form-control', 'placeholder'=>'',   )) !!}
  					 </div>
  					 <div class="col-md-2">

  					 </div>
				  </div>

				  <div class="form-group  " >
					<label for="TeléfonoFijo" class=" control-label col-md-4 text-left">
					  Telefono Fijo
					</label>
					<div class="col-md-6">
					  {!! Form::text('telefonoFijo', $row['telefonoFijo'],array('class'=>'form-control', 'placeholder'=>'',   )) !!}
					 </div>
					 <div class="col-md-2">

					 </div>
				  </div>

				  <div class="form-group  " >
					<label for="Móvil 1" class=" control-label col-md-4 text-left">
					  Prefijo
					</label>
					<div class="col-md-6">
					  {!! Form::text('prefijo', $row_datos_legales['prefijo'],array('class'=>'form-control', 'placeholder'=>'',   )) !!}
					 </div>
					 <div class="col-md-2">

					 </div>
				  </div>

          <div class="form-group  " >
					<label for="Móvil 1" class=" control-label col-md-4 text-left">
					  Sufijo
					</label>
					<div class="col-md-6">
					  {!! Form::text('sufijo', $row_datos_legales['sufijo'],array('class'=>'form-control', 'placeholder'=>'',   )) !!}
					 </div>
					 <div class="col-md-2">

					 </div>
				  </div>

          <div class="form-group  " >
					<label for="Móvil 1" class=" control-label col-md-4 text-left">
					  Resoluci&oacute;n
					</label>
					<div class="col-md-6">
					  {!! Form::textarea('resolucion', $row_datos_legales['resolucion'],array('class'=>'form-control', 'placeholder'=>'',   )) !!}
					 </div>
					 <div class="col-md-2">

					 </div>
				  </div>

          <div class="form-group  " >
					<label for="Móvil 1" class=" control-label col-md-4 text-left">
					  Telefono Movil
					</label>
					<div class="col-md-6">
					  {!! Form::text('telefonoMovil', $row['telefonoMovil'],array('class'=>'form-control', 'placeholder'=>'',   )) !!}
					 </div>
					 <div class="col-md-2">

					 </div>
				  </div>

        </fieldset>
			</div>




			<div style="clear:both"></div>


				  <div class="form-group">
					<label class="col-sm-4 text-right">&nbsp;</label>
					<div class="col-sm-8">
					<button type="submit" name="submit" class="btn btn-primary btn-sm" ><i class="fa  fa-save "></i> {{ Lang::get('core.sb_save') }}</button>
					<button type="button" onclick="location.href='{{ URL::to('compania?return='.$return) }}' " class="btn btn-success btn-sm "><i class="fa  fa-arrow-circle-left "></i>  {{ Lang::get('core.sb_cancel') }} </button>
					</div>

				  </div>

		 {!! Form::close() !!}
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
