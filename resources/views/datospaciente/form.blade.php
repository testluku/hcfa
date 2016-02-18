@extends('layouts.app')

@section('content')

<div class="page-content row">
    <!-- Page header -->
		<div class="content-header">
			<div class="row">
				<div class="col-sm-6">
					<div class="header-section">Nuevo paciente</div>
				</div>
				<div class="col-sm-6 hidden-xs">
					<div class="header-section">
						<ul class="breadcrumb breadcrumb-top">
							<li><a href="{{ URL::to('dashboard') }}">{{ Lang::get('core.home') }}</a></li>
							<li><a href="{{ URL::to('pacientes') }}">Pacientes</a></li>
              @if($id)<li><a href="{{ URL::to('paciente/'.$id) }}">Paciente</a></li>@endif
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

		 {!! Form::open(array('url'=>'datospaciente/save?return='.$return, 'class'=>'form-horizontal','files' => true , 'parsley-validate'=>'','novalidate'=>' ')) !!}
<div class="col-md-12">
						<fieldset><legend> Paciente</legend>

				  <div class="form-group hidethis " style="display:none;">
					<label for="Id" class=" control-label col-md-4 text-left">
					{!! SiteHelpers::activeLang('Id', (isset($fields['id']['language'])? $fields['id']['language'] : array())) !!}
					</label>
					<div class="col-md-6">
					  {!! Form::text('id', $row['id'],array('class'=>'form-control', 'placeholder'=>'',   )) !!}
					 </div>
					 <div class="col-md-2">

					 </div>
				  </div>
          <div class="form-group picture-upload">
            {!! Form::hidden('picture', $row['picture'], array('id' => 'picture')) !!}
            <div class="col-1-2">
              <div id="upload-msg" class="upload-msg">
                      @if(!$row['picture'])
                      <img src="{{ asset('img/placeholders/avatars/avatar9@2x.jpg') }}"
                        alt="avatar"
                        class="picture">
                      @else
                      <img src="{{$row['picture']}}" alt="avatar" class="picture" />
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
					<label for="" class=" control-label col-md-4 text-left">
					{!! SiteHelpers::activeLang('Tipo Doc', (isset($fields['tipoDocumento']['language'])? $fields['tipoDocumento']['language'] : array())) !!}
					</label>
					<div class="col-md-6">
					  <select name='tipoDocumento' rows='5' id='tipoDocumento' class='select2 ' required  ></select>
					 </div>
					 <div class="col-md-2">
					 	<a href="#" data-toggle="tooltip" placement="left" class="tips" title="Tipo de Documento"><i class="icon-question2"></i></a>
					 </div>
				  </div>
				  <div class="form-group  " >
					<label for="Número" class=" control-label col-md-4 text-left">
					{!! SiteHelpers::activeLang('Número', (isset($fields['numDoc']['language'])? $fields['numDoc']['language'] : array())) !!}
					</label>
					<div class="col-md-6">
					  {!! Form::text('numDoc', $row['numDoc'],array('class'=>'form-control', 'placeholder'=>'', 'required'=>'true'  )) !!}
					 </div>
					 <div class="col-md-2">

					 </div>
				  </div>
				  <div class="form-group  " >
					<label for="Nombre(s)" class=" control-label col-md-4 text-left">
					{!! SiteHelpers::activeLang('Nombre(s)', (isset($fields['nombres']['language'])? $fields['nombres']['language'] : array())) !!}
					</label>
					<div class="col-md-6">
					  {!! Form::text('nombres', $row['nombres'],array('class'=>'form-control', 'placeholder'=>'', 'required'=>'true'  )) !!}
					 </div>
					 <div class="col-md-2">

					 </div>
				  </div>
				  <div class="form-group  " >
					<label for="1er Apellido" class=" control-label col-md-4 text-left">
					{!! SiteHelpers::activeLang('1er Apellido', (isset($fields['apellido1']['language'])? $fields['apellido1']['language'] : array())) !!}
					</label>
					<div class="col-md-6">
					  {!! Form::text('apellido1', $row['apellido1'],array('class'=>'form-control', 'placeholder'=>'', 'required'=>'true'  )) !!}
					 </div>
					 <div class="col-md-2">

					 </div>
				  </div>
				  <div class="form-group  " >
					<label for="2do Apellido" class=" control-label col-md-4 text-left">
					{!! SiteHelpers::activeLang('2do Apellido', (isset($fields['apellido2']['language'])? $fields['apellido2']['language'] : array())) !!}
					</label>
					<div class="col-md-6">
					  {!! Form::text('apellido2', $row['apellido2'],array('class'=>'form-control', 'placeholder'=>'',   )) !!}
					 </div>
					 <div class="col-md-2">

					 </div>
				  </div>
				  <div class="form-group  " >
					<label for="Email" class=" control-label col-md-4 text-left">
					{!! SiteHelpers::activeLang('Email', (isset($fields['email']['language'])? $fields['email']['language'] : array())) !!}
					</label>
					<div class="col-md-6">
					  {!! Form::text('email', $row['email'],array('class'=>'form-control', 'placeholder'=>'',   )) !!}
					 </div>
					 <div class="col-md-2">

					 </div>
				  </div>
				  <div class="form-group  " >
					<label for="Dirección" class=" control-label col-md-4 text-left">
					{!! SiteHelpers::activeLang('Dirección', (isset($fields['direccion']['language'])? $fields['direccion']['language'] : array())) !!}
					</label>
					<div class="col-md-6">
					  {!! Form::text('direccion', $row['direccion'],array('class'=>'form-control', 'placeholder'=>'',   )) !!}
					 </div>
					 <div class="col-md-2">

					 </div>
				  </div>
				  <div class="form-group  " >
					<label for="Teléfono" class=" control-label col-md-4 text-left">
					{!! SiteHelpers::activeLang('Teléfono', (isset($fields['telefono']['language'])? $fields['telefono']['language'] : array())) !!}
					</label>
					<div class="col-md-6">
					  {!! Form::text('telefono', $row['telefono'],array('class'=>'form-control', 'placeholder'=>'',   )) !!}
					 </div>
					 <div class="col-md-2">

					 </div>
				  </div>
				  <div class="form-group  " >
					<label for="Móvil 1" class=" control-label col-md-4 text-left">
					{!! SiteHelpers::activeLang('Móvil 1', (isset($fields['celular1']['language'])? $fields['celular1']['language'] : array())) !!}
					</label>
					<div class="col-md-6">
					  {!! Form::text('celular1', $row['celular1'],array('class'=>'form-control', 'placeholder'=>'',   )) !!}
					 </div>
					 <div class="col-md-2">

					 </div>
				  </div>
				  <div class="form-group  " >
					<label for="Móvil 2" class=" control-label col-md-4 text-left">
					{!! SiteHelpers::activeLang('Móvil 2', (isset($fields['celular2']['language'])? $fields['celular2']['language'] : array())) !!}
					</label>
					<div class="col-md-6">
					  {!! Form::text('celular2', $row['celular2'],array('class'=>'form-control', 'placeholder'=>'',   )) !!}
					 </div>
					 <div class="col-md-2">

					 </div>
				  </div>
				  <div class="form-group  " >
					<label for="Estado" class=" control-label col-md-4 text-left">
					{!! SiteHelpers::activeLang('Estado', (isset($fields['estadoPaciente']['language'])? $fields['estadoPaciente']['language'] : array())) !!}
					</label>
					<div class="col-md-6">

					<?php $estadoPaciente = explode(',',$row['estadoPaciente']);
					$estadoPaciente_opt = array( '1' => 'Interesado' ,  '2' => 'Valorado' ,  '3' => 'PQ' ,  '4' => 'PNQ' ,  '5' => 'Archivado' , ); ?>
					<select name='estadoPaciente' rows='5' required  class='select2 '  >
						<?php
						foreach($estadoPaciente_opt as $key=>$val)
						{
							echo "<option  value ='$key' ".($row['estadoPaciente'] == $key ? " selected='selected' " : '' ).">$val</option>";
						}
						?></select>
					 </div>
					 <div class="col-md-2">
					 	<a href="#" data-toggle="tooltip" placement="left" class="tips" title="PQ: Procedimiento Quirúrgico. PNQ: Procedimiento No Quirúrgico."><i class="icon-question2"></i></a>
					 </div>
				  </div>
				  <div class="form-group hidethis " style="display:none;">
					<label for="IngresoPor" class=" control-label col-md-4 text-left">
					{!! SiteHelpers::activeLang('IngresoPor', (isset($fields['ingresoPor']['language'])? $fields['ingresoPor']['language'] : array())) !!}
					</label>
					<div class="col-md-6">
					  {!! Form::text('ingresoPor', $row['ingresoPor'],array('class'=>'form-control', 'placeholder'=>'',   )) !!}
					 </div>
					 <div class="col-md-2">

					 </div>
				  </div>
				  <div class="form-group hidethis " style="display:none;">
					<label for="UltimaEdicion" class=" control-label col-md-4 text-left">
					{!! SiteHelpers::activeLang('UltimaEdicion', (isset($fields['ultimaEdicion']['language'])? $fields['ultimaEdicion']['language'] : array())) !!}
					</label>
					<div class="col-md-6">
					  {!! Form::text('ultimaEdicion', $row['ultimaEdicion'],array('class'=>'form-control', 'placeholder'=>'',   )) !!}
					 </div>
					 <div class="col-md-2">

					 </div>
				  </div> </fieldset>
			</div>




			<div style="clear:both"></div>


				  <div class="form-group">
					<label class="col-sm-4 text-right">&nbsp;</label>
					<div class="col-sm-8">
					<button type="submit" name="apply" class="btn btn-info btn-sm" ><i class="fa  fa-check-circle"></i> {{ Lang::get('core.sb_apply') }}</button>
					<button type="submit" name="submit" class="btn btn-primary btn-sm" ><i class="fa  fa-save "></i> {{ Lang::get('core.sb_save') }}</button>
					<button type="button" onclick="location.href='{{ URL::to('datospaciente?return='.$return) }}' " class="btn btn-success btn-sm "><i class="fa  fa-arrow-circle-left "></i>  {{ Lang::get('core.sb_cancel') }} </button>
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

		        $("#tipoDocumento").jCombo("{{ URL::to('datospaciente/comboselect?filter=tipoDocumento:tipoDoc:Nombre') }}",
		        {  selected_value : '{{ $row["tipoDocumento"] }}' });

		        $("#estadoPaciente").jCombo("{{ URL::to('datospaciente/comboselect?filter=estadoPaciente:id:nombre') }}",
		                {  selected_value : '{{ $row["estadoPaciente"] }}' });


				$('.removeCurrentFiles').on('click',function(){
					var removeUrl = $(this).attr('href');
					$.get(removeUrl,function(response){});
					$(this).parent('div').empty();
					return false;
				});
	});
	</script>
@stop
