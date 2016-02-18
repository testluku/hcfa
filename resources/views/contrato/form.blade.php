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
              @if($idPaciente)<li><a href="{{ URL::to('paciente/'.$idPaciente) }}">Paciente</a></li>@endif
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

		 {!! Form::open(array('url'=>'contrato/save?return='.$return, 'class'=>'form-horizontal','files' => true , 'parsley-validate'=>'','novalidate'=>' ')) !!}
<div class="col-md-12">
					<fieldset>

            <legend>Contrato</legend>

						<div class="form-group" >

							<label for="" class="col-md-3 text-right label-contrato">
								Usar como plantilla
							</label>

							<div class="col-md-9">
								<input type="checkbox" name="useTemplate" value="">
							</div>

						</div>

  				  <div class="form-group" >

    					<label for="" class="col-md-3 text-right label-contrato">
                Tipo de Contrato
    					</label>
    					<div class="col-md-9">
                @if(!$data_contrato['tipoContrato'])
    					       {!! Form::text('tipoContrato', $data_contrato['tipoContrato'], array('class'=>'form-control formulario','placeholder'=>'')) !!}
                @else
								<div class="hoverEdit">
									<input id="tipoContrato" class="editField" value="{{$data_contrato['tipoContrato']}}" readonly> <div class="pen-edit"><i class="fa fa-pencil "></i></div><div class="check-update"><i class="fa fa-check"></i></div>
							</div>
								</div>

                @endif
    					 </div>

  				  </div>

            <div class="form-group  " >

    					<label for="" class="col-md-3 text-right label-contrato">
                Contenido contrato
    					</label>
    					<div class="col-md-9" >

                @if(!$data_contrato['contenidoContrato'])

    					       {!! Form::textarea('contenidoContrato', $data_contrato['contenidoContrato'], array('class'=>'form-control formulario', 'placeholder'=>'', 'cols' => '5', 'rows'=>'48', 'id'=>'contenidoContrato')) !!}

                @else

								<div class="hoverEdit">
									  <div id="contenidoContrato" class="editField">{{ $data_contrato['contenidoContrato'] }}</div> <div class="pen-editNote"><i class="fa fa-pencil "></i> </div> <div class="check-update"><i class="fa fa-check"></i></div>
								</div>

                @endif

    					 </div>

  				  </div>

          </fieldset>
			</div>




			<div style="clear:both"></div>


				  <div class="form-group">
					<label class="col-sm-4 text-right">&nbsp;</label>
					<div class="col-sm-8">
					<button type="submit" name="apply" class="btn btn-info btn-sm" ><i class="fa  fa-check-circle"></i> {{ Lang::get('core.sb_apply') }}</button>
					<button type="submit" name="submit" class="btn btn-primary btn-sm" ><i class="fa  fa-save "></i> {{ Lang::get('core.sb_save') }}</button>
					</div>

				  </div>

		 {!! Form::close() !!}
	</div>
</div>
</div>
</div>



  <script type="text/javascript">

		$('.hoverEdit').hover(function(){
			var self = this;
			$(self).children('.pen-edit,.pen-editNote').toggle();
			$(self).children().toggleClass('activeHover');
		});

		$('.pen-editNote').click(function () {
			var self = $(this);
			self.css('display','none');
			self.siblings('.check-update').show();
			self.siblings('.editField').summernote({
				callbacks: {
					onFocu:function () {

					}
				  }

			});
		});

		$('.check-update').click(function () {
			var self = $(this);
			self.hide();
			self.siblings('.pen-editNote').show();
			$('#contenidoContrato').summernote('destroy');
		})

		$('.pen-edit').click(function () {
			var self = $(this).siblings('.editField');
			self.focus();
			self.prop('readonly',false);
			self.addClass('borderEditField');
			$(this).hide();
			$(this).siblings('.check-update').show();
		});

		$('.editField').blur(function () {
			var self = $(this);
			self.prop('readonly',true);
			self.removeClass('borderEditField');
		})

	</script>
@stop
