@extends('layouts.app') @section('content')

<div class="content-header">
	<div class="row">
		<div class="col-sm-6">
			<div class="header-section"></div>
		</div>
		<div class="col-sm-6 hidden-xs">
			<div class="header-section">
				<ul class="breadcrumb breadcrumb-top">
					<li><a href="{{ URL::to('lreservas') }}"><i class="fa fa-home"></i></a></li>
					<li><a href="{{ URL::to('pacientes') }}">Pacientes</a></li>
				</ul>
			</div>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-sm-4">
		<a href="javascript:void(0)" class="widget">
			<div class="widget-content text-right clearfix" style="display:flex;align-items:center;">

				@if($dbp->picture)

						<img src="{{ $dbp->picture }}"
							alt="avatar"
							class="img-circle img-thumbnail img-thumbnail-avatar pull-left"
							width="85" height="85">

				@else

						<img src="{{ asset('img/placeholders/avatars/avatar9@2x.jpg') }}"
							alt="avatar"
							class="img-circle img-thumbnail img-thumbnail-avatar pull-left"
							width="85" height="85">

				@endif
				<div class="">
					<h2 class="widget-heading h3">
						<strong>{{$dbp->nombres}} {{$dbp->apellido1}} {{$dbp->apellido2}}</strong>
					</h2>
					<span class="text-muted"> {{$dbp->tipoDocumento}} {{$dbp->numDoc}}</span>
				</div>
			</div>
		</a>
		<div class="widget">
			<?php if($estado!='null'){?>
			<div
				class="widget-content widget-content-mini themed-background-muted">
				<div class="pull-right text-muted">
					<a href="{{ URL::to('datospaciente/update', $dbp->id) }}"> <i
						class="fa fa-pencil-square"></i>
					</a>
				</div>
				{{$estado->nombre}}

			</div>
			<div class="widget-content text-left">
				<strong>Correo</strong>: {{$dbp->email}}<br />
				<strong>Teléfono</strong>: {{$dbp->telefono}}<br />
				<strong>Móvil</strong>: {{$dbp->celular1}}, {{$dbp->celular2}} <br />
			</div>
			<div class="widget-content themed-background-muted">
				<div
					class="progress progress-striped progress-mini active remove-margin">
					<div class="progress-bar progress-bar-{{$estado->css}}"
						role="progressbar" aria-valuenow="{{$estado->porcentaje}}"
						aria-valuemin="0" aria-valuemax="100"
						style="width: {{$estado->porcentaje}}"></div>
				</div>
			</div>
			<?php } ?>
		</div>
	</div>

	<div class="col-sm-8">
		<div class="block full">
			<!-- Block Tabs Title -->
			<div class="block-title">

				<ul class="nav nav-tabs" data-toggle="tabs">
					<li class="active"><a class="menu-tab" href="#block-tabs-perfil">
						<i class="gi gi-user"></i>Perfil</a>
					</li>

					<li class=""><a class="menu-tab" href="#block-tabs-respuestas">
						<i class="fa fa-newspaper-o"></i>Respuestas</a>
					</li>

					<li class=""><a class="menu-tab" href="#block-tabs-seguimiento"><i
							class="hi hi-retweet"></i>Seguimiento</a></li>
					<li class=""><a class="menu-tab" href="#block-tabs-cotizaciones">
						<i class="gi gi-shopping_cart"></i> Cotizaciones</a></li>
					<li class=""><a class="menu-tab" href="#block-tabs-facturacion"><i class="gi gi-usd"></i>Facturación</a></li>
					<li class=""><a class="menu-tab" href="#block-tabs-correos"><i class="gi gi-inbox"></i>Correos</a></li>
				</ul>
			</div>
			<!-- END Block Tabs Title -->

			<!-- Tabs Content -->
			<div class="tab-content">
				<div class="tab-pane active" id="block-tabs-perfil">

				 	<?php if($da !='null'){ ?>
					<table width="100%">
						<tr>
							<td>Fecha Nacimiento: {{$da->fechaNacimiento}}</td>
							<td>Lugar Nacimiento: {{$da->lugarNacimiento}}</td>
						</tr>
						<tr>
							<td>Edad: {{$da->edad}}</td>
							<td>Sexo: {{$da->sexo}}</td>
						</tr>
						<tr>
							<td>Estado Civil: {{$da->estadoCivil}}</td>
							<td>Grupo Sanguineo: {{$da->grupoSanguineo}}{{$da->RH}}</td>
						</tr>
						<tr>
							<td>Dirección: {{$da->direccion}}</td>
							<td>Ciudad: {{$da->ciudad}}</td>
						</tr>
						<tr>
							<td>Departamento: {{$da->departamento}}</td>
							<td>País: {{$da->pais}}</td>
						</tr>
						<tr>
							<td>Ocupación: {{$da->ocupacion}}</td>
							<td>Empresa: {{$da->empresa}}</td>
						</tr>
					</table>
					<div align="right">
						<a href="{{ URL::to('datosadicionalesp/update', $dbp->id) }}">
							<button class="btn btn-info pull-center">
								Editar <i class="fa fa-info-circle"></i>
							</button>
						</a>
					</div>

					<?php } else{ ?>
						<a href="{{ URL::to('datosadicionalesp/update', $dbp->id) }}">
						<button class="mdl-button mdl-js-button mdl-button--raised" style="color:#FFF; background: #5cafde; margin:0 auto 15px auto; font-size:12px;">
							Agregar <i class="fa fa-info-circle"></i>
						</button>
					</a>
					<?php } ?>
				</div>

				<div class="tab-pane" id="block-tabs-respuestas">

					<button type="button" class="mdl-button mdl-js-button mdl-button--raised agg-response" style="font-size:12px; margin-bottom:15px; color:#FFF; background: #5cafde;" data-toggle="modal" data-target="#myModal">
						 Agregar Respuestas <i class="fa fa-info-circle"></i>
					</button>

					<table class="table">
						<thead>
							<tr>
								<th>
									Fecha
								</th>
								<th>
									Descripci&oacute;n
								</th>
								<th>
									Opciones
								</th>
							</tr>
						</thead>
						<tbody>
								@foreach ($lista_respuestas_paciente as $respuesta)
								<tr>
									<td>{{ $respuesta->fechaCreacion }}</td>
									<td>{{ $respuesta->mejora }}</td>
									<td>
										<div name="editar" class="btn btn-default" onclick="showRespuestas({{ $respuesta->id }})" title="Ver"><i class="fa fa-eye"></i></div>
										<a name="print" class="btn btn-success" href="../cotizacion/details/{{ $respuesta->id }}" title="Imprimir"><i class="fa fa-print"></i></a>
									</td>
								</tr>
								@endforeach
						</tbody>
					</table>

				</div>

				<div class="tab-pane" id="block-tabs-seguimiento">Seguimiento..</div>
				<div class="tab-pane" id="block-tabs-cotizaciones">
						<a href="../cotizacion/save/{{$id}}" class="mdl-button mdl-js-button mdl-button--raised" style="font-size:12px; margin-bottom:15px; color:#FFF; background: #5cafde;">Crear cotizaci&oacute;n <i class="fa fa-plus-circle"></i></a>
					<table class="table">
						<thead>
							<tr>
								<th>
									Fecha
								</th>
								<th>
									Observaci&oacute;n
								</th>
								<th>
									Monto total
								</th>
								<th>
									Acciones
								</th>
							</tr>
						</thead>
						<tbody>
								@foreach ($quotes as $quote)
								<tr>
							    <td>{{ $quote->createdAt }}</td>
									<td>{{ $quote->observation }}</td>
									<td>$ {{ $quote->amount_total or 0 }}</td>
									<td>
										<a name="editar" class="btn btn-default" href="../cotizacion/update/{{ $quote->id }}" title="Editar"><i class="fa fa-pencil-square-o"></i></a>
										<a name="print" class="btn btn-success" href="../cotizacion/details/{{ $quote->id }}" title="Imprimir"><i class="fa fa-print"></i></a>
										<span name="invoice" class="btn btn-primary invoice" data-id="{{ $quote->id }}" title="Facturar"><i class="fa fa-paperclip"></i></span>
										<!--<span name="invoice" class="btn btn-primary invoice" data-id="{{ $quote->id }}" title="Facturar"><i class="fa fa-paperclip"></i></span>-->
									</td>
								</tr>
								@endforeach
						</tbody>
					</table>
				</div>
				<div class="tab-pane" id="block-tabs-facturacion">
				<a href="../facturacion/save/{{$id}}" class="mdl-button mdl-js-button mdl-button--raised" style="font-size:12px; margin-bottom:15px; color:#FFF; background: #5cafde;">Crear factura. <i class="fa fa-plus-circle"></i></a><br>
					@if(!$invoices)
							<span>No hay Facturas generadas aún.</span>
					@else

					<table class="table">
						<thead>
							<tr>
								<th>
									Fecha
								</th>
								<th>
									Estado
								</th>
								<th>
									Monto total
								</th>
								<th>
									Acciones
								</th>
							</tr>
						</thead>
						<tbody>
								@foreach ($invoices as $invoice)
								<tr>
									<td>{{ $invoice->createdAt }}</td>
									<td>{{ ($invoice->estado == 0) ? 'Sin cancelar' : 'Cancelado' }}</td>
									<td>$ {{ $invoice->amount_total or 0 }}</td>
									<td>
										<a name="editar" class="btn btn-default" href="../facturacion/update/{{ $invoice->id }}" title="Editar"><i class="fa fa-pencil-square-o"></i></a>
										<a name="print" class="btn btn-success" href="../facturacion/details/{{ $invoice->id }}" title="Imprimir"><i class="fa fa-print"></i></a>
										<span name="invoice" class="btn btn-primary invoice" data-id="{{ $invoice->id }}" title="Facturar"><i class="fa fa-money "></i></span>
									</td>
								</tr>
								@endforeach
						</tbody>
					</table>
					@endif
				</div>
				<div class="tab-pane" id="block-tabs-correos">Correos..</div>
			</div>
			<!-- END Tabs Content -->
		</div>
	</div>
</div>

	<div class="mdl-button mdl-js-button mdl-button--raised" name="button-historiaClinicaPreliminar" style="color: #FFF;font-size:15px !important; margin-bottom:20px; width:260px; background:#45A7B9;" id="addProcedimiento"><i class="fa fa-plus-circle"></i> Agregar Procedimiento</div>

<div class="">

	<div class="widget">

		<div
			class="widget-content widget-content-mini themed-background-muted">
			<div class="pull-right text-muted">

			</div>
			Historia(s) Clinica(s) Preliminar(es)
		</div>
		<div class="widget-content text-left">
			<button class="mdl-button mdl-js-button mdl-button--raised" style="font-size:12px; margin-bottom:15px; background: #5cafde;">
				<a href="{{ URL::to('historiaclinicapreliminar/show') }}/{{$id}}" class="" style="color:#FFF;">Agregar Preliminar <i class="fa fa-plus-circle"></i></a>
			</button>
			<table class="table">
				<thead>
					<tr>
						<th>
							Fecha
						</th>
						<th>
							Observaci&oacute;n
						</th>
						<th>
							Acciones
						</th>
					</tr>
				</thead>
				<tbody>
						@foreach ($data_hcPreliminar as $hcPreliminar)
						<tr>
							<td>{{ $hcPreliminar->createdAt }}</td>
							<td>{{ $hcPreliminar->areasMayorInteres }}</td>
							<td>
								<a name="editar" class="btn btn-default" href="{{ URL::to('historiaclinicapreliminar/show') }}/{{$id}}/{{ $hcPreliminar->id }}" title="Ver"><i class="fa fa-eye"></i></a>
								<a name="print" class="btn btn-success" href="../cotizacion/details/{{ $hcPreliminar->id }}" title="Imprimir"><i class="fa fa-print"></i></a>
							</td>
						</tr>
						@endforeach
				</tbody>
			</table>
		</div>
		<div class="widget-content themed-background-muted">

		</div>

	</div>

</div>

<div id="procedimiento">

	@if($data_procedimiento)

	    @foreach($data_procedimiento as $val)

    <div class="widget procedure">
	<div class="widget-content widget-content-mini themed-background-muted">
		<div class="pull-right text-muted">
		</div>
		Procedimiento # / {{$val->createdAt}}
    </div>
	<div class="widget-content">
		<div class="box-procedimiento">
			<div class="col-md-6" style="display: flex;justify-content: space-around;">
				<div class="">
					<div class="" style="display:flex;margin-bottom: 10px;">
						<div class="content" style="margin-right: 13px; display:flex;align-items:center;">
						@if($val->idhcdefinitiva)
							<img src="{{ asset('img/check-icon.png') }}"
								alt="avatar"
								class=" pull-center"
								width="19" height="19">
						@else
						<img src="{{ asset('img/uncheck-icon.png') }}"
							alt="avatar"
							class=" pull-center"
							width="19" height="19">
						@endif
						</div>
						<label for="Id" class="text-left" style="width:100%;">
							@if($val->idhcdefinitiva)
							<a href="{{ URL::to('historiaclinicadefinitiva/show/'.$id.'/'.$val->id.'/'.$val->idhcdefinitiva) }}" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect" style="font-size:13px; padding:2px 4px !important;width: 100%; color:#5CAFDE;">H.C Definitiva</a>
							@else
							<a href="{{ URL::to('historiaclinicadefinitiva/show/'.$id.'/'.$val->id.'/'.$val->idhcdefinitiva) }}" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect" style="font-size:13px; padding:2px 4px !important;width: 100%;">H.C Definitiva</a>
							@endif
						</label>
					</div>
					<div class="" style="display:flex;margin-bottom: 10px;">
						<div class="content" style="margin-right: 13px; display:flex;align-items:center;">
							@if(null)
								<img src="{{ asset('img/check-icon.png') }}"
									alt="avatar"
									class=" pull-center"
									width="19" height="19">
							@else
							<img src="{{ asset('img/uncheck-icon.png') }}"
								alt="avatar"
								class=" pull-center"
								width="19" height="19">
							@endif
						</div>
						<label for="Id" class="text-left" style="width:100%;">
							<div class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect" style="font-size:13px; padding:2px 4px !important;width: 100%;">Lista chequeo</div>
						</label>
					</div>
					<div class="" style="display:flex;margin-bottom: 10px;">
						<div class="content" style="margin-right: 13px; display:flex;align-items:center;">
							@if($val->idContrato)
								<img src="{{ asset('img/check-icon.png') }}"
									alt="avatar"
									class=" pull-center"
									width="19" height="19">
							@else
							<img src="{{ asset('img/uncheck-icon.png') }}"
								alt="avatar"
								class=" pull-center"
								width="19" height="19">
							@endif
						</div>
						<label for="Id" class="text-left" style="width:100%;">
							<a href="{{ URL::to('contrato/show/'.$id.'/'.$val->id.'/'.$val->idContrato) }}" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect" style="font-size:13px; padding:2px 4px !important;width: 100%;">Contrato</a>
						</label>
					</div>
					<div class="" style="display:flex;margin-bottom: 10px;">
						<div class="content" style="margin-right: 13px; display:flex;align-items:center;">
							@if(null)
								<img src="{{ asset('img/check-icon.png') }}"
									alt="avatar"
									class=" pull-center"
									width="19" height="19">
							@else
							<img src="{{ asset('img/uncheck-icon.png') }}"
								alt="avatar"
								class=" pull-center"
								width="19" height="19">
							@endif
						</div>
						<label for="Id" class="text-left" style="width:100%;">
							<div class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect" style="font-size:13px; padding:2px 4px !important;width: 100%;">Orden Patolog&iacute;a</div>
						</label>
					</div>
				</div>
				<div class="">
					<div class="" style="display:flex;margin-bottom: 10px;">
						<div class="content" style="margin-right: 13px; display:flex;align-items:center;">
							@if(null)
								<img src="{{ asset('img/check-icon.png') }}"
									alt="avatar"
									class=" pull-center"
									width="19" height="19">
							@else
							<img src="{{ asset('img/uncheck-icon.png') }}"
								alt="avatar"
								class=" pull-center"
								width="19" height="19">
							@endif
						</div>
						<label for="Id" class="text-left" style="width:100%;">
							<div class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect" style="font-size:13px; padding:2px 4px !important;width: 100%;">Consentimientos</div>
						</label>
					</div>

					<div class="" style="display:flex;margin-bottom: 10px;">
						<div class="content" style="margin-right: 13px; display:flex;align-items:center;">
							@if(null)
								<img src="{{ asset('img/check-icon.png') }}"
									alt="avatar"
									class=" pull-center"
									width="19" height="19">
							@else
							<img src="{{ asset('img/uncheck-icon.png') }}"
								alt="avatar"
								class=" pull-center"
								width="19" height="19">
							@endif
						</div>
						<label for="Id" class="text-left" style="width:100%;">
							<div class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect" style="font-size:13px; padding:2px 4px !important;width: 100%;">Info Compli.</div>
						</label>
					</div>
					<div class="" style="display:flex;margin-bottom: 10px;">
						<div class="content" style="margin-right: 13px; display:flex;align-items:center;">
							@if(null)
								<img src="{{ asset('img/check-icon.png') }}"
									alt="avatar"
									class=" pull-center"
									width="19" height="19">
							@else
							<img src="{{ asset('img/uncheck-icon.png') }}"
								alt="avatar"
								class=" pull-center"
								width="19" height="19">
							@endif
						</div>
						<label for="Id" class="text-left" style="width:100%;">
							<div class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect" style="font-size:13px; padding:2px 4px !important;width: 100%;">Recomendaci&oacute;n PostO.</div>
						</label>
					</div>
				</div>
			</div>
			<div class="col-md-3">
				<button class="mdl-button mdl-js-button mdl-button--raised" style="color:#FFF; background: #5cafde; margin:0 auto 15px auto; font-size:12px;">
					Desc. Quirurgico <i class="fa fa-plus-circle"></i>
				</button>
				<table class="table">
					<thead>
						<tr>
							<th>
								Fecha
							</th>
							<th>
								Tipo
							</th>
							<th>
								Acciones
							</th>
						</tr>
					</thead>
					<tbody>
							<tr>
								<td>Fecha</td>
								<td>Tipo</td>
								<td>
									<a name="editar" class="btn btn-default" href="" title="Ver" style="padding: 2px 5px;"><i class="fa fa-eye"></i></a>
									<a name="print" class="btn btn-success" href="" title="Imprimir" style="padding: 2px 5px;"><i class="fa fa-print"></i></a>
								</td>
							</tr>
					</tbody>
				</table>
			</div>
			<div class="col-md-3">
				<button class="mdl-button mdl-js-button mdl-button--raised" style="color:#FFF; background: #5cafde; margin:0 auto 15px auto; font-size:12px;">
					Controles / Notas <i class="fa fa-plus-circle"></i>
				</button>
				<table class="table">
					<thead>
						<tr>
							<th>
								Fecha
							</th>
							<th>
								Acciones
							</th>
						</tr>
					</thead>
					<tbody>
							<tr>
								<td>Fecha</td>
								<td>
									<a name="editar" class="btn btn-default" href="" title="Ver" style="padding: 2px 5px;"><i class="fa fa-eye"></i></a>
									<a name="print" class="btn btn-success" href="" title="Imprimir" style="padding: 2px 5px;"><i class="fa fa-print"></i></a>
								</td>
							</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>
	<div class="widget-content themed-background-muted">

	</div>

    </div>

	    @endforeach

	@endif

</div>

<!--
<div class="row">

	<div class="col-sm-6 col-lg-3">
		<div class="widget">
			<div
				class="widget-content widget-content-mini themed-background-muted">
				<div class="pull-right text-muted">75%</div>
				<i class="fa fa-pencil-square"></i> Perfil Completo
			</div>
			<div class="widget-content text-center">
				<div class="pie-chart easyPieChart" data-percent="75"
					data-line-width="3" data-bar-color="#cccccc"
					data-track-color="#f9f9f9"
					style="width: 80px; height: 80px; line-height: 80px;">
					<span><i class="fa fa fa-upload text-info"></i></span>
					<canvas width="160" height="160"
						style="width: 80px; height: 80px;"></canvas>
				</div>
			</div>
			<div class="widget-content themed-background-muted">
				<div
					class="progress progress-striped progress-mini active remove-margin">
					<div class="progress-bar progress-bar-primary" role="progressbar"
						aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"
						style="width: 75%"></div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-sm-6 col-lg-3">
		<div class="widget">
			<div
				class="widget-content widget-content-mini themed-background-muted">
				<div class="pull-right text-muted">5/10</div>
				Tareas Pendientes
			</div>
			<div class="widget-content text-center">
				<div class="pie-chart easyPieChart" data-percent="50"
					data-line-width="3" data-bar-color="#cccccc"
					data-track-color="#f9f9f9"
					style="width: 80px; height: 80px; line-height: 80px;">
					<span><i class="fa fa-tasks text-info"></i></span>
					<canvas width="160" height="160"
						style="width: 80px; height: 80px;"></canvas>
				</div>
			</div>
			<div class="widget-content themed-background-muted">
				<div
					class="progress progress-striped progress-mini active remove-margin">
					<div class="progress-bar progress-bar-info" role="progressbar"
						aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"
						style="width: 50%"></div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-sm-6 col-lg-3">
		<div class="widget">
			<div
				class="widget-content widget-content-mini themed-background-muted">
				<div class="pull-right text-muted">90%</div>
				<i class="fa fa-check"></i> Actual Procedimiento
			</div>
			<div class="widget-content text-center">
				<div class="pie-chart easyPieChart" data-percent="90"
					data-line-width="3" data-bar-color="#cccccc"
					data-track-color="#f9f9f9"
					style="width: 80px; height: 80px; line-height: 80px;">
					<span><i class="fa fa-suitcase text-info"></i></span>
					<canvas width="160" height="160"
						style="width: 80px; height: 80px;"></canvas>
				</div>
			</div>
			<div class="widget-content themed-background-muted">
				<div
					class="progress progress-striped progress-mini active remove-margin">
					<div class="progress-bar progress-bar-success" role="progressbar"
						aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"
						style="width: 90%"></div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-sm-6 col-lg-3">
		<div class="widget">
			<div
				class="widget-content widget-content-mini themed-background-muted text-center">
				<i class="fa fa-shopping-cart"></i> Pago Realizado
			</div>
			<div class="widget-content text-center">
				<div class="pie-chart easyPieChart" data-percent="25"
					data-line-width="3" data-bar-color="#cccccc"
					data-track-color="#f9f9f9"
					style="width: 80px; height: 80px; line-height: 80px;">
					<span><strong>25%</strong></span>
					<canvas width="160" height="160"
						style="width: 80px; height: 80px;"></canvas>
				</div>
			</div>
			<div class="widget-content themed-background-muted">
				<div
					class="progress progress-striped progress-mini active remove-margin">
					<div class="progress-bar progress-bar-danger" role="progressbar"
						aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"
						style="width: 25%"></div>
				</div>
			</div>
		</div>
	</div>

</div> -->

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
			{!! Form::open(array('url'=>'respuestaspaciente/saved?return='.$return, 'class'=>'form-horizontal','files' => true , 'parsley-validate'=>'','novalidate'=>' ')) !!}
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Respuestas paciente</h4>
				{!! Form::hidden('idPaciente',$dbp->id) !!}
				{!! Form::hidden('idRespuesta',$data_respuestas_paciente['id']) !!}
      </div>
      <div class="modal-body">
				<div class="form-group">
					<label for="Id" class="col-md-2 text-left">
						¿Qu&eacute; desea mejorar?
					</label>
					<div class="col-md-10">
						{!! Form::textarea('mejora', $data_respuestas_paciente['mejora'],array('class'=>'form-control formulario', 'placeholder'=>'', 'cols' => '5', 'rows'=>'8')) !!}
					</div>
				</div>

				<div class="form-group">
					<label for="Id" class="col-md-2 text-left">
						¿Qu&eacute; &aacute;reas son las que m&aacute;s le molestan?
					</label>
					<div class="col-md-10">
						{!! Form::textarea('areasMolestan', $data_respuestas_paciente['areasMolestan'], array('class'=>'form-control formulario', 'placeholder'=>'', 'cols' => '5', 'rows'=>'8')) !!}
					</div>
				</div>

				<div class="form-group">
					<label for="Id" class="col-md-2 text-left">
						¿Desea mejorar alguna otra zona?
					</label>
					<div class="col-md-10">
						{!! Form::textarea('mejoraOtraZona', $data_respuestas_paciente['mejoraOtraZona'], array('class'=>'form-control formulario', 'placeholder'=>'', 'cols' => '5', 'rows'=>'8')) !!}
					</div>
				</div>

				<div class="form-group">
					<label for="Id" class="col-md-2 text-left">
						¿Ha tenido cirug&iacute;as est&eacute;ticas previamente? ¿Hace cu&aacute;nto? ¿Cu&aacute;les?
					</label>
					<div class="col-md-10">
						{!! Form::textarea('cirugiasPrevias', $data_respuestas_paciente['cirugiasPrevias'], array('class'=>'form-control formulario', 'placeholder'=>'', 'cols' => '5', 'rows'=>'8')) !!}
					</div>
				</div>

				<div class="form-group">
					<label for="Id" class="col-md-2 text-left">
						¿Ha tenido alguna cirug&iacute;a NO est&eacute;tica? ¿Cu&aacute;l?
					</label>
					<div class="col-md-10">
						{!! Form::textarea('cirugiasNoesteticas', $data_respuestas_paciente['cirugiasNoesteticas'], array('class'=>'form-control formulario', 'placeholder'=>'', 'cols' => '5', 'rows'=>'8')) !!}
					</div>
				</div>

				<div class="form-group">
					<label for="Id" class="col-md-6 text-left">
						¿Ha estado hospitalizado por enfermedades del coraz&oacute;n?
					</label>
					<div class="col-md-2 content">
						Si {!! Form::radio('hospCorazon', '1', ($data_respuestas_paciente['hospCorazon'] == '1') ? true : false, array('class'=>'checkTrue')); !!}
						No {!! Form::radio('hospCorazon', '2', ($data_respuestas_paciente['hospCorazon'] != '1') ? true : false, array('class'=>'checkFalse')); !!}
					</div>
					<div class="col-md-4 textOther">
							{!! Form::text('cualHospCorazon', $data_respuestas_paciente['cualHospCorazon'], array('class'=>'form-control formulario', 'disabled'=>'disabled' ,'placeholder'=>'')) !!}
					</div>
				</div>

				<div class="form-group">
					<label for="Id" class="col-md-6 text-left">
						¿Ha estado hospitalizado por enfermedades de pulmones?
					</label>
					<div class="col-md-2 content">
						Si {!! Form::radio('hospPulmon', '1', ($data_respuestas_paciente['hospPulmon'] == '1') ? true : false, array('class'=>'checkTrue')); !!}
						No {!! Form::radio('hospPulmon', '2', ($data_respuestas_paciente['hospPulmon'] != '1') ? true : false, array('class'=>'checkFalse')); !!}
					</div>
					<div class="col-md-4 textOther">
							{!! Form::text('cualHospPulmones', $data_respuestas_paciente['cualHospPulmones'], array('class'=>'form-control formulario', 'disabled'=>'disabled' ,'placeholder'=>'')) !!}
					</div>
				</div>

				<div class="form-group">
					<label for="Id" class="col-md-6 text-left">
						¿Tiene presi&oacute;n arterial alta?
					</label>
					<div class="col-md-2 content">
						Si {!! Form::radio('presionAlta', '1', ($data_respuestas_paciente['presionAlta'] == '1') ? true : false, array('class'=>'checkTrue')); !!}
						No {!! Form::radio('presionAlta', '2', ($data_respuestas_paciente['presionAlta'] != '1') ? true : false, array('class'=>'checkFalse')); !!}
					</div>
					<div class="col-md-4 textOther">

					</div>
				</div>

				<div class="form-group">
					<label for="Id" class="col-md-6 text-left">
						¿Tiene palpitaciones o trastornos del ritmo cardiaco?
					</label>
					<div class="col-md-2 content">
						Si {!! Form::radio('trastornoCardiaco', '1', ($data_respuestas_paciente['trastornoCardiaco'] == '1') ? true : false, array('class'=>'checkTrue')); !!}
						No {!! Form::radio('trastornoCardiaco', '2', ($data_respuestas_paciente['trastornoCardiaco'] != '1') ? true : false, array('class'=>'checkFalse')); !!}
					</div>
					<div class="col-md-4 textOther">

					</div>
				</div>


				<div class="form-group">
					<label for="Id" class="col-md-6 text-left">
						¿Tiene asma?
					</label>
					<div class="col-md-2 content">
						Si {!! Form::radio('asma', '1', ($data_respuestas_paciente['asma'] == '1') ? true : false, array('class'=>'checkTrue')); !!}
						No {!! Form::radio('asma', '2', ($data_respuestas_paciente['asma'] != '1') ? true : false, array('class'=>'checkFalse')); !!}
					</div>
					<div class="col-md-4 textOther">

					</div>
				</div>


				<div class="form-group">
					<label for="Id" class="col-md-6 text-left">
						¿Tiene tos cr&oacute;nica?
					</label>
					<div class="col-md-2 content">
						Si {!! Form::radio('tosCronica', '1', ($data_respuestas_paciente['tosCronica'] == '1') ? true : false, array('class'=>'checkTrue')); !!}
						No {!! Form::radio('tosCronica', '2', ($data_respuestas_paciente['tosCronica'] != '1') ? true : false, array('class'=>'checkFalse')); !!}
					</div>
					<div class="col-md-4 textOther">

					</div>
				</div>


				<div class="form-group">
					<label for="Id" class="col-md-6 text-left">
						¿Le ha dado gripa en la &uacute;ltima semana?
					</label>
					<div class="col-md-2 content">
						Si {!! Form::radio('gripa', '1', ($data_respuestas_paciente['gripa'] == '1') ? true : false, array('class'=>'checkTrue')); !!}
						No {!! Form::radio('gripa', '2', ($data_respuestas_paciente['gripa'] != '1') ? true : false, array('class'=>'checkFalse')); !!}
					</div>
					<div class="col-md-4 textOther">

					</div>
				</div>


				<div class="form-group">
					<label for="Id" class="col-md-6 text-left">
						¿Tiene dolor de pecho o se ahoga al subir dos pisos por escaleras?
					</label>
					<div class="col-md-2 content">
						Si {!! Form::radio('dolorPechoEscala', '1', ($data_respuestas_paciente['dolorPechoEscala'] == '1') ? true : false, array('class'=>'checkTrue')); !!}
						No {!! Form::radio('dolorPechoEscala', '2', ($data_respuestas_paciente['dolorPechoEscala'] != '1') ? true : false, array('class'=>'checkFalse')); !!}
					</div>
					<div class="col-md-4 textOther">

					</div>
				</div>


				<div class="form-group">
					<label for="Id" class="col-md-6 text-left">
						¿Tiene dolor de pecho o se ahoga al caminar dos cuadras en terreno plano?
					</label>
					<div class="col-md-2 content">
						Si {!! Form::radio('dolorPechoTerreno', '1', ($data_respuestas_paciente['dolorPechoTerreno'] == '1') ? true : false, array('class'=>'checkTrue')); !!}
						No {!! Form::radio('dolorPechoTerreno', '2', ($data_respuestas_paciente['dolorPechoTerreno'] != '1') ? true : false, array('class'=>'checkFalse')); !!}
					</div>
					<div class="col-md-4 textOther">

					</div>
				</div>


				<div class="form-group">
					<label for="Id" class="col-md-6 text-left">
						¿Tiene diabetes?
					</label>
					<div class="col-md-2 content">
						Si {!! Form::radio('diabetes', '1', ($data_respuestas_paciente['diabetes'] == '1') ? true : false, array('class'=>'checkTrue')); !!}
						No {!! Form::radio('diabetes', '2', ($data_respuestas_paciente['diabetes'] != '1') ? true : false, array('class'=>'checkFalse')); !!}
					</div>
					<div class="col-md-4 textOther">

					</div>
				</div>


				<div class="form-group">
					<label for="Id" class="col-md-6 text-left">
						¿Tiene problemas de tiroides?
					</label>
					<div class="col-md-2 content">
						Si {!! Form::radio('tiroide', '1', ($data_respuestas_paciente['tiroide'] == '1') ? true : false, array('class'=>'checkTrue')); !!}
						No {!! Form::radio('tiroide', '2', ($data_respuestas_paciente['tiroide'] != '1') ? true : false, array('class'=>'checkFalse')); !!}
					</div>
					<div class="col-md-4 textOther">

					</div>
				</div>


				<div class="form-group">
					<label for="Id" class="col-md-6 text-left">
						¿Vive en Bogot&aacute;?
					</label>
					<div class="col-md-2 content">
						Si {!! Form::radio('viveBogota', '1', ($data_respuestas_paciente['viveBogota'] == '1') ? true : false, array('class'=>'checkTrue')); !!}
						No {!! Form::radio('viveBogota', '2', ($data_respuestas_paciente['viveBogota'] != '1') ? true : false, array('class'=>'checkFalse')); !!}
					</div>
					<div class="col-md-4 textOther">
							{!! Form::text('diasViveBogota', $data_respuestas_paciente['diasViveBogota'], array('class'=>'form-control formulario', 'disabled'=>'disabled' ,'placeholder'=>'')) !!}
					</div>
				</div>


				<div class="form-group">
					<label for="Id" class="col-md-6 text-left">
						¿Ha tenido hepatitis?
					</label>
					<div class="col-md-6 content">
						Tipo A {!! Form::checkbox('tipoHepatitisA', 'A', ($data_respuestas_paciente['tipoHepatitisA'] == 'A') ? true : false); !!}
						Tipo B {!! Form::checkbox('tipoHepatitisB', 'B', ($data_respuestas_paciente['tipoHepatitisB'] == 'B') ? true : false); !!}
						Tipo C {!! Form::checkbox('tipoHepatitisC', 'C', ($data_respuestas_paciente['tipoHepatitisC'] == 'C') ? true : false); !!}
						Ning&uacute;na {!! Form::checkbox('tipoHepatitisN', 'N', ($data_respuestas_paciente['tipoHepatitisN'] == 'N') ? true : false); !!}
					</div>
				</div>


				<div class="form-group">
					<label for="Id" class="col-md-6 text-left">
						¿Tiene reflujo gastro esof&aacute;gico, gastritis, ardor en el estomago o agrieras?
					</label>
					<div class="col-md-2 content">
						Si {!! Form::radio('reflujo', '1', ($data_respuestas_paciente['reflujo'] == '1') ? true : false, array('class'=>'checkTrue')); !!}
						No {!! Form::radio('reflujo', '2', ($data_respuestas_paciente['reflujo'] != '1') ? true : false, array('class'=>'checkFalse')); !!}
					</div>
					<div class="col-md-4 textOther">

					</div>
				</div>


				<div class="form-group">
					<label for="Id" class="col-md-6 text-left">
						¿Tiene estre&ntilde;imiento?
					</label>
					<div class="col-md-2 content">
						Si {!! Form::radio('estrenimiento', '1', ($data_respuestas_paciente['estrenimiento'] == '1') ? true : false, array('class'=>'checkTrue')); !!}
						No {!! Form::radio('estrenimiento', '2', ($data_respuestas_paciente['estrenimiento'] != '1') ? true : false, array('class'=>'checkFalse')); !!}
					</div>
					<div class="col-md-4 textOther">

					</div>
				</div>


				<div class="form-group">
					<label for="Id" class="col-md-6 text-left">
						¿Sangra f&aacute;cilmente al lavarse los dientes?
					</label>
					<div class="col-md-2 content">
						Si {!! Form::radio('sangraLavarDiente', '1', ($data_respuestas_paciente['sangraLavarDiente'] == '1') ? true : false, array('class'=>'checkTrue')); !!}
						No {!! Form::radio('sangraLavarDiente', '2', ($data_respuestas_paciente['sangraLavarDiente'] != '1') ? true : false, array('class'=>'checkFalse')); !!}
					</div>
					<div class="col-md-4 textOther">

					</div>
				</div>


				<div class="form-group">
					<label for="Id" class="col-md-6 text-left">
						¿Ha tenido trombos?
					</label>
					<div class="col-md-2 content">
						Si {!! Form::radio('trombos', '1', ($data_respuestas_paciente['trombos'] == '1') ? true : false, array('class'=>'checkTrue')); !!}
						No {!! Form::radio('trombos', '2', ($data_respuestas_paciente['trombos'] != '1') ? true : false, array('class'=>'checkFalse')); !!}
					</div>
					<div class="col-md-4 textOther">

					</div>
				</div>

				<div class="form-group">
					<label for="Id" class="col-md-6 text-left">
						¿Tiene alguna enfermedad de los ri&ntilde;ones?
					</label>
					<div class="col-md-2 content">
						Si {!! Form::radio('rinones', '1', ($data_respuestas_paciente['rinones'] == '1') ? true : false, array('class'=>'checkTrue')); !!}
						No {!! Form::radio('rinones', '2', ($data_respuestas_paciente['rinones'] != '1') ? true : false, array('class'=>'checkFalse')); !!}
					</div>
					<div class="col-md-4 textOther">

					</div>
				</div>

				<div class="form-group">
					<label for="Id" class="col-md-6 text-left">
						¿Es alergico a medicamentos o a materiales como el L&aacute;tex?
					</label>
					<div class="col-md-2 content">
						Si {!! Form::radio('alergiaLatex', '1', ($data_respuestas_paciente['alergiaLatex'] == '1') ? true : false, array('class'=>'checkTrue')); !!}
						No {!! Form::radio('alergiaLatex', '2', ($data_respuestas_paciente['alergiaLatex'] != '1') ? true : false, array('class'=>'checkFalse')); !!}
					</div>
					<div class="col-md-4 textOther">
						{!! Form::text('cualAlergiaLatex', $data_respuestas_paciente['cualAlergiaLatex'], array('class'=>'form-control formulario', 'disabled'=>'disabled' ,'placeholder'=>'')) !!}
					</div>
				</div>


				<div class="form-group">
					<label for="Id" class="col-md-6 text-left">
						¿No puede mover o no siente alguna extremidad?
					</label>
					<div class="col-md-2 content">
						Si {!! Form::radio('extremidad', '1', ($data_respuestas_paciente['extremidad'] == '1') ? true : false, array('class'=>'checkTrue')); !!}
						No {!! Form::radio('extremidad', '2', ($data_respuestas_paciente['extremidad'] != '1') ? true : false, array('class'=>'checkFalse')); !!}
					</div>
					<div class="col-md-4 textOther">

					</div>
				</div>


				<div class="form-group">
					<label for="Id" class="col-md-6 text-left">
						¿Sufre de dolor de espalda o lumbalgia?
					</label>
					<div class="col-md-2 content">
						Si {!! Form::radio('dolorEspalda', '1', ($data_respuestas_paciente['dolorEspalda'] == '1') ? true : false, array('class'=>'checkTrue')); !!}
						No {!! Form::radio('dolorEspalda', '2', ($data_respuestas_paciente['dolorEspalda'] != '1') ? true : false, array('class'=>'checkFalse')); !!}
					</div>
					<div class="col-md-4 textOther">

					</div>
				</div>


				<div class="form-group">
					<label for="Id" class="col-md-6 text-left">
						¿Sufre de otras enfermedades?
					</label>
					<div class="col-md-2 content">
						Si {!! Form::radio('otraEnfermedad', '1', ($data_respuestas_paciente['otraEnfermedad'] == '1') ? true : false, array('class'=>'checkTrue')); !!}
						No {!! Form::radio('otraEnfermedad', '2', ($data_respuestas_paciente['otraEnfermedad'] != '1') ? true : false, array('class'=>'checkFalse')); !!}
					</div>
					<div class="col-md-4 textOther">
						{!! Form::text('cualOtraEnfermedad', $data_respuestas_paciente['cualOtraEnfermedad'] ,array('class'=>'form-control formulario', 'disabled'=>'disabled' ,'placeholder'=>'')) !!}
					</div>
				</div>


				<div class="form-group">
					<label for="Id" class="col-md-6 text-left">
						¿Tiene familiares con diabetes?
					</label>
					<div class="col-md-2 content">
						Si {!! Form::radio('familiarDiabetes', '1', ($data_respuestas_paciente['familiarDiabetes'] == '1') ? true : false, array('class'=>'checkTrue')); !!}
						No {!! Form::radio('familiarDiabetes', '2', ($data_respuestas_paciente['familiarDiabetes'] != '1') ? true : false, array('class'=>'checkFalse')); !!}
					</div>
					<div class="col-md-4 textOther">

					</div>
				</div>


				<div class="form-group">
					<label for="Id" class="col-md-6 text-left">
						¿Tiene familiares con trombofilia (antecedentes de trombos)?
					</label>
					<div class="col-md-2 content">
						Si {!! Form::radio('trombofilia', '1', ($data_respuestas_paciente['trombofilia'] == '1') ? true : false, array('class'=>'checkTrue')); !!}
						No {!! Form::radio('trombofilia', '2', ($data_respuestas_paciente['trombofilia'] != '1') ? true : false, array('class'=>'checkFalse')); !!}
					</div>
					<div class="col-md-4 textOther">

					</div>
				</div>


				<div class="form-group">
					<label for="Id" class="col-md-6 text-left">
						¿Tiene familiares con c&aacute;ncer de seno?
					</label>
					<div class="col-md-2 content">
						Si {!! Form::radio('cancerSeno', '1', ($data_respuestas_paciente['cancerSeno'] == '1') ? true : false, array('class'=>'checkTrue')); !!}
						No {!! Form::radio('cancerSeno', '2', ($data_respuestas_paciente['cancerSeno'] != '1') ? true : false, array('class'=>'checkFalse')); !!}
					</div>
					<div class="col-md-4 textOther">
						{!! Form::text('cualFamiliarCancerSeno', $data_respuestas_paciente['cualFamiliarCancerSeno'], array('class'=>'form-control formulario', 'disabled'=>'disabled' ,'placeholder'=>'')) !!}
					</div>
				</div>


				<div class="form-group">
					<label for="Id" class="col-md-6 text-left">
						¿Ha estado tomado medicamento durante los &uacute;ltimos 8 d&iacute;as?
					</label>
					<div class="col-md-2 content">
						Si {!! Form::radio('medicamentoReciente', '1', ($data_respuestas_paciente['medicamentoReciente'] == '1') ? true : false, array('class'=>'checkTrue')); !!}
						No {!! Form::radio('medicamentoReciente', '2', ($data_respuestas_paciente['medicamentoReciente'] != '1') ? true : false, array('class'=>'checkFalse')); !!}
					</div>
					<div class="col-md-4 textOther">
						{!! Form::text('cualMedicamentoReciente', $data_respuestas_paciente['cualMedicamentoReciente'], array('class'=>'form-control formulario', 'disabled'=>'disabled' ,'placeholder'=>'')) !!}
					</div>
				</div>


				<div class="form-group">
					<label for="Id" class="col-md-6 text-left">
						¿Toma pastillas de ajo o cebolla?
					</label>
					<div class="col-md-2 content">
						Si {!! Form::radio('pastillasAjoCebolla', '1', ($data_respuestas_paciente['pastillasAjoCebolla'] == '1') ? true : false, array('class'=>'checkTrue')); !!}
						No {!! Form::radio('pastillasAjoCebolla', '2', ($data_respuestas_paciente['pastillasAjoCebolla'] != '1') ? true : false, array('class'=>'checkFalse')); !!}
					</div>
					<div class="col-md-4 textOther">

					</div>
				</div>


				<div class="form-group">
					<label for="Id" class="col-md-6 text-left">
						¿Toma complejos multivitam&iacute;nicos?
					</label>
					<div class="col-md-2 content">
						Si {!! Form::radio('multivitaminicos', '1', ($data_respuestas_paciente['multivitaminicos'] == '1') ? true : false, array('class'=>'checkTrue')); !!}
						No {!! Form::radio('multivitaminicos', '2', ($data_respuestas_paciente['multivitaminicos'] != '1') ? true : false, array('class'=>'checkFalse')); !!}
					</div>
					<div class="col-md-4 textOther">

					</div>
				</div>


				<div class="form-group">
					<label for="Id" class="col-md-6 text-left">
						¿Toma Omega?
					</label>
					<div class="col-md-2 content">
						Si {!! Form::radio('omega', '1', ($data_respuestas_paciente['omega'] == '1') ? true : false, array('class'=>'checkTrue')); !!}
						No {!! Form::radio('omega', '2', ($data_respuestas_paciente['omega'] != '1') ? true : false, array('class'=>'checkFalse')); !!}
					</div>
					<div class="col-md-4 textOther">

					</div>
				</div>


				<div class="form-group">
					<label for="Id" class="col-md-6 text-left">
						¿Toma Gingo Biloba?
					</label>
					<div class="col-md-2 content">
						Si {!! Form::radio('gingoBiloba', '1', ($data_respuestas_paciente['gingoBiloba'] == '1') ? true : false, array('class'=>'checkTrue')); !!}
						No {!! Form::radio('gingoBiloba', '2', ($data_respuestas_paciente['gingoBiloba'] != '1') ? true : false, array('class'=>'checkFalse')); !!}
					</div>
					<div class="col-md-4 textOther">

					</div>
				</div>


				<div class="form-group">
					<label for="Id" class="col-md-6 text-left">
						¿Toma Vitamina E?
					</label>
					<div class="col-md-2 content">
						Si {!! Form::radio('vitaminaE', '1', ($data_respuestas_paciente['vitaminaE'] == '1') ? true : false, array('class'=>'checkTrue')); !!}
						No {!! Form::radio('vitaminaE', '2', ($data_respuestas_paciente['vitaminaE'] != '1') ? true : false, array('class'=>'checkFalse')); !!}
					</div>
					<div class="col-md-4 textOther">

					</div>
				</div>


				<div class="form-group">
					<label for="Id" class="col-md-6 text-left">
						¿Toma Aslkazekltser?
					</label>
					<div class="col-md-2 content">
						Si {!! Form::radio('aslkazekltser', '1', ($data_respuestas_paciente['aslkazekltser'] == '1') ? true : false, array('class'=>'checkTrue')); !!}
						No {!! Form::radio('aslkazekltser', '2', ($data_respuestas_paciente['aslkazekltser'] != '1') ? true : false, array('class'=>'checkFalse')); !!}
					</div>
					<div class="col-md-4 textOther">

					</div>
				</div>


				<div class="form-group">
					<label for="Id" class="col-md-6 text-left">
						¿Toma Aspirina u otro analg&eacute;sico?
					</label>
					<div class="col-md-2 content">
						Si {!! Form::radio('aspirina', '1', ($data_respuestas_paciente['aspirina'] == '1') ? true : false, array('class'=>'checkTrue')); !!}
						No {!! Form::radio('aspirina', '2', ($data_respuestas_paciente['aspirina'] != '1') ? true : false, array('class'=>'checkFalse')); !!}
					</div>
					<div class="col-md-4 textOther">

					</div>
				</div>


				<div class="form-group">
					<label for="Id" class="col-md-6 text-left">
						¿Toma medicamentos homeop&aacute;ticos o drogas naturales?
					</label>
					<div class="col-md-2 content">
						Si {!! Form::radio('medicamentoHomeopatico', '1', ($data_respuestas_paciente['medicamentoHomeopatico'] == '1') ? true : false, array('class'=>'checkTrue')); !!}
						No {!! Form::radio('medicamentoHomeopatico', '2', ($data_respuestas_paciente['medicamentoHomeopatico'] != '1') ? true : false, array('class'=>'checkFalse')); !!}
					</div>
					<div class="col-md-4 textOther">
						{!! Form::text('cualMedicamentoHomeopatico', $data_respuestas_paciente['cualMedicamentoHomeopatico'] ,array('class'=>'form-control formulario', 'disabled'=>'disabled' ,'placeholder'=>'')) !!}
					</div>
				</div>


				<div class="form-group">
					<label for="Id" class="col-md-6 text-left">
						¿Grupo sanguineo?
					</label>
					<div class="col-md-3 content">

						<select class="selectEncuesta" name="grupoSanguineo">
								<option value="-"> - </option>
								<option value="O+" {{ ($data_respuestas_paciente['grupoSanguineo'] == 'O+') ? 'selected' : '' }}> O+ </option>
								<option value="A+" {{ ($data_respuestas_paciente['grupoSanguineo'] == 'A+') ? 'selected' : '' }}> A+ </option>
								<option value="B+" {{ ($data_respuestas_paciente['grupoSanguineo'] == 'B+') ? 'selected' : '' }}> B+ </option>
								<option value="AB+" {{ ($data_respuestas_paciente['grupoSanguineo'] == 'AB+') ? 'selected' : '' }}> AB+ </option>
								<option value="O-" {{ ($data_respuestas_paciente['grupoSanguineo'] == 'O-') ? 'selected' : '' }}> O- </option>
								<option value="A-" {{ ($data_respuestas_paciente['grupoSanguineo'] == 'A-') ? 'selected' : '' }}> A- </option>
								<option value="B-" {{ ($data_respuestas_paciente['grupoSanguineo'] == 'B-') ? 'selected' : '' }}> B- </option>
								<option value="AB-" {{ ($data_respuestas_paciente['grupoSanguineo'] == 'AB-') ? 'selected' : '' }}> AB- </option>
						</select>

					</div>
					<div class="col-md-3 content">

					</div>
				</div>


				<div class="form-group">
					<label for="Id" class="col-md-6 text-left">
						¿Ha tenido transfusiones de sangre?
					</label>
					<div class="col-md-2 content">
						Si {!! Form::radio('transfusiones', '1', ($data_respuestas_paciente['transfusiones'] == '1') ? true : false, array('class'=>'checkTrue')); !!}
						No {!! Form::radio('transfusiones', '2', ($data_respuestas_paciente['transfusiones'] != '1') ? true : false, array('class'=>'checkFalse')); !!}
					</div>
					<div class="col-md-4 textOther">

					</div>
				</div>


				<div class="form-group">
					<label for="Id" class="col-md-6 text-left">
						¿Ha utilizado Botox anteriormente?
					</label>
					<div class="col-md-2 content">
						Si {!! Form::radio('botox', '1', ($data_respuestas_paciente['botox'] == '1') ? true : false, array('class'=>'checkTrue')); !!}
						No {!! Form::radio('botox', '2', ($data_respuestas_paciente['botox'] != '1') ? true : false, array('class'=>'checkFalse')); !!}
					</div>
					<div class="col-md-4 textOther">

					</div>
				</div>


				<div class="form-group">
					<label for="Id" class="col-md-6 text-left">
						¿Bebe alcohol semanalmente o con m&aacute;s frecuencia?
					</label>
					<div class="col-md-2 content">
						Si {!! Form::radio('bebeAlcohol', '1', ($data_respuestas_paciente['bebeAlcohol'] == '1') ? true : false, array('class'=>'checkTrue')); !!}
						No {!! Form::radio('bebeAlcohol', '2', ($data_respuestas_paciente['bebeAlcohol'] != '1') ? true : false, array('class'=>'checkFalse')); !!}
					</div>
					<div class="col-md-4 textOther">

					</div>
				</div>


				<div class="form-group">
					<label for="Id" class="col-md-6 text-left">
						¿Fumas? ¿Cuantos cigarros al d&iacute;a? ¿Desde cu&aacute;ndo?
					</label>
					<div class="col-md-2 content">
						Si {!! Form::radio('fuma', '1', ($data_respuestas_paciente['fuma'] == '1') ? true : false, array('class'=>'checkTrue')); !!}
						No {!! Form::radio('fuma', '2', ($data_respuestas_paciente['fuma'] != '1') ? true : false, array('class'=>'checkFalse')); !!}
					</div>
					<div class="col-md-4 textOther">

					</div>
				</div>


				<div class="form-group">
					<label for="Id" class="col-md-6 text-left">
						¿Fum&oacute;? ¿Cuantos cigarros al d&iacute;a? ¿Hasta cu&aacute;ndo?
					</label>
					<div class="col-md-2 content">
						Si {!! Form::radio('fumo', '1', ($data_respuestas_paciente['fumo'] == '1') ? true : false, array('class'=>'checkTrue')); !!}
						No {!! Form::radio('fumo', '2', ($data_respuestas_paciente['fumo'] != '1') ? true : false, array('class'=>'checkFalse')); !!}
					</div>
					<div class="col-md-4 textOther">

					</div>
				</div>


				<div class="form-group">
					<label for="Id" class="col-md-6 text-left">
						¿Consume drogas psicoactivas (&eacute;xtasis, hero&iacute;na, coca&iacute;na, otras)?
					</label>
					<div class="col-md-2 content">
						Si {!! Form::radio('drogasPsicoactivas', '1', ($data_respuestas_paciente['drogasPsicoactivas'] == '1') ? true : false, array('class'=>'checkTrue')); !!}
						No {!! Form::radio('drogasPsicoactivas', '2', ($data_respuestas_paciente['drogasPsicoactivas'] != '1') ? true : false, array('class'=>'checkFalse')); !!}
					</div>
					<div class="col-md-4 textOther">
						{!! Form::text('cualdrogasPsicoactivas', $data_respuestas_paciente['cualdrogasPsicoactivas'], array('class'=>'form-control formulario', 'disabled'=>'disabled' ,'placeholder'=>'')) !!}
					</div>
				</div>



				<div class="form-group">
					<label for="Id" class="col-md-6 text-left">
						¿Cree usted que puede encontrarse en embarazo?
					</label>
					<div class="col-md-2 content">
						Si {!! Form::radio('embarazo', '1', ($data_respuestas_paciente['embarazo'] == '1') ? true : false, array('class'=>'checkTrue')); !!}
						No {!! Form::radio('embarazo', '2', ($data_respuestas_paciente['embarazo'] != '1') ? true : false, array('class'=>'checkFalse')); !!}
					</div>
					<div class="col-md-4 textOther">

					</div>
				</div>


				<div class="form-group">
					<label for="Id" class="col-md-8 text-left">
						¿Cuantos embarazos ha tenido?
					</label>
					<div class="col-md-4 textOther">
						{!! Form::text('cuantosEmbarazos', $data_respuestas_paciente['cuantosEmbarazos'], array('class'=>'form-control formulario', 'placeholder'=>'')) !!}
					</div>
				</div>


				<div class="form-group">
					<label for="Id" class="col-md-6 text-left">
						¿Ha tenido embarazos gemelares?
					</label>
					<div class="col-md-2 content">
						Si {!! Form::radio('embarazoGemelar', '1', ($data_respuestas_paciente['embarazoGemelar'] == '1') ? true : false, array('class'=>'checkTrue')); !!}
						No {!! Form::radio('embarazoGemelar', '2', ($data_respuestas_paciente['embarazoGemelar'] != '1') ? true : false, array('class'=>'checkFalse')); !!}
					</div>
					<div class="col-md-4 textOther">

					</div>
				</div>


				<div class="form-group">
					<label for="Id" class="col-md-6 text-left">
						¿Ha tenido p&eacute;rdidas espontaneas?
					</label>
					<div class="col-md-2 content">
						Si {!! Form::radio('perdidasEspontaneas', '1', ($data_respuestas_paciente['perdidasEspontaneas'] == '1') ? true : false, array('class'=>'checkTrue')); !!}
						No {!! Form::radio('perdidasEspontaneas', '2', ($data_respuestas_paciente['perdidasEspontaneas'] != '1') ? true : false, array('class'=>'checkFalse')); !!}
					</div>
					<div class="col-md-4 textOther">
						{!! Form::text('cuantasPerdidasEspontaneas', $data_respuestas_paciente['cuantasPerdidasEspontaneas'] ,array('class'=>'form-control formulario', 'disabled'=>'disabled' ,'placeholder'=>'')) !!}
					</div>
				</div>


				<div class="form-group">
					<label for="Id" class="col-md-8 text-left">
						¿Cuando fue su &uacute;ltimo embarazo?
					</label>
					<div class="col-md-4 textOther">
						{!! Form::text('cuandoUltimoEmbarazo', $data_respuestas_paciente['cuandoUltimoEmbarazo'], array('class'=>'form-control formulario', 'placeholder'=>'')) !!}
					</div>
				</div>


				<div class="form-group">
					<label for="Id" class="col-md-6 text-left">
						¿Crees estar embarazada?
					</label>
					<div class="col-md-2 content">
						Si {!! Form::radio('creerEstarEmbarazada', '1', ($data_respuestas_paciente['creerEstarEmbarazada'] == '1') ? true : false, array('class'=>'checkTrue')); !!}
						No {!! Form::radio('creerEstarEmbarazada', '2', ($data_respuestas_paciente['creerEstarEmbarazada'] != '1') ? true : false, array('class'=>'checkFalse')); !!}
					</div>
					<div class="col-md-4 textOther">

					</div>
				</div>


				<div class="form-group">
					<label for="Id" class="col-md-8 text-left">
						¿Cuando fue su &uacute;ltima mestruaci&oacute;n?
					</label>
					<div class="col-md-4 textOther">
						{!! Form::text('cuandoUltimaMestruacion', $data_respuestas_paciente['cuandoUltimaMestruacion'], array('class'=>'form-control formulario', 'placeholder'=>'')) !!}
					</div>
				</div>


				<div class="form-group">
					<label for="Id" class="col-md-6 text-left">
						¿Usa lentes de contacto?
					</label>
					<div class="col-md-2 content">
						Si {!! Form::radio('usaLentesContacto', '1', ($data_respuestas_paciente['usaLentesContacto'] == '1') ? true : false, array('class'=>'checkTrue')); !!}
						No {!! Form::radio('usaLentesContacto', '2', ($data_respuestas_paciente['usaLentesContacto'] != '1') ? true : false, array('class'=>'checkFalse')); !!}
					</div>
					<div class="col-md-4 textOther">

					</div>
				</div>


				<div class="form-group">
					<label for="Id" class="col-md-6 text-left">
						¿Tiene dientes artificiales o protesis removibles?
					</label>
					<div class="col-md-2 content">
						Si {!! Form::radio('dientesArtificiales', '1', ($data_respuestas_paciente['dientesArtificiales'] == '1') ? true : false, array('class'=>'checkTrue')); !!}
						No {!! Form::radio('dientesArtificiales', '2', ($data_respuestas_paciente['dientesArtificiales'] != '1') ? true : false, array('class'=>'checkFalse')); !!}
					</div>
					<div class="col-md-4 textOther">

					</div>
				</div>


				<div class="form-group">
					<label for="Id" class="col-md-6 text-left">
						¿Tiene alg&uacute;n diente flojo?
					</label>
					<div class="col-md-2 content">
						Si {!! Form::radio('dientesFlojo', '1', ($data_respuestas_paciente['dientesFlojo'] == '1') ? true : false, array('class'=>'checkTrue')); !!}
						No {!! Form::radio('dientesFlojo', '2', ($data_respuestas_paciente['dientesFlojo'] != '1') ? true : false, array('class'=>'checkFalse')); !!}
					</div>
					<div class="col-md-4 textOther">

					</div>
				</div>


				<div class="form-group">
					<label for="Id" class="col-md-6 text-left">
						¿Ha presentado complicaciones relacionadas con la anestesia?
					</label>
					<div class="col-md-2 content">
						Si {!! Form::radio('complicaionAnestesia', '1', ($data_respuestas_paciente['complicaionAnestesia'] == '1') ? true : false, array('class'=>'checkTrue')); !!}
						No {!! Form::radio('complicaionAnestesia', '2', ($data_respuestas_paciente['complicaionAnestesia'] != '1') ? true : false, array('class'=>'checkFalse')); !!}
					</div>
					<div class="col-md-4 textOther">
						{!! Form::text('cualComplicaionAnestesia', $data_respuestas_paciente['cualComplicaionAnestesia'] ,array('class'=>'form-control formulario', 'disabled'=>'disabled' ,'placeholder'=>'')) !!}
					</div>
				</div>

      </div>

      <div class="modal-footer">
        <div class="btn btn-default footer-buttons cancelar-button" data-dismiss="modal">Cancelar</div>
        <button type="submit" class="btn btn-primary footer-buttons">Guardar</button>
				@if($data_respuestas_paciente['id'])
					<div class="btn btn-success footer-buttons" onclick="edit()">Editar</div>
				@endif
      </div>
			{!! Form::close() !!}
    </div>
  </div>
</div>

<script type="text/javascript">

    $(document).ready(function(){

            $('.procedure').find('input[type="checkbox"],input[type="radio"]').iCheck({
                checkboxClass: 'icheckbox_minimal-green',
                radioClass: 'iradio_square-green',
            });
    });


$('.agg-response,.cancelar-button').click(function(){
	$('textarea,input[type="text"]').val('');
	$('select').val('-');
	$('input[type="radio"].[value="2"]').iCheck("check");
	$('input[type="checkbox"]').iCheck('uncheck');
	$('textarea,input[type="text"],select').prop('disabled',false);
	$('input').iCheck('enable');

	$('.footer-buttons').css('display','initial');
});

function edit() {
	$('textarea,input[type="text"],select').prop('disabled',false);
	$('input').iCheck('enable');
}

if("{{ $data_respuestas_paciente['id'] }}" ){
		$('textarea,input[type="text"],select').prop('disabled',true);
		$('input').iCheck('disable');
}

$('.selectEncuesta').live('change',function(){
		var value = $(this).val();
		var self = $(this).parents('.content').siblings('.textOther').children('.formulario');
		if(value == 'otro')
		{
			self.removeAttr("disabled");
		}
		else {
			self.prop("disabled", true);
			self.val('');
		}
});

$('.checkTrueActivate').on('ifChecked',function(){
	event.preventDefault();

	var self = $(this).parents('.content').find('.checkTrueValidate');
	var _ = $(this).parents('.content').find('.iradio_square-green');

	self.each(function(index, element){
		$(element).removeAttr("disabled");
	});

	_.each(function(index, element) {
		$(element).removeClass('disabled');
	});


});

$('.checkTrueActivate').on('ifUnchecked',function(){
	event.preventDefault();

	var self = $(this).parents('.content').find('.checkTrueValidate');
	var _ = $(this).parents('.content').find('.iradio_square-green');

	self.each(function(index, element){
		$(element).prop("disabled", true);
		$(element).removeAttr("checked");
	});

	_.each(function(index, element) {
		$(element).addClass('disabled');
		$(element).removeClass('checked');
	});

});

$('.checkTrueValidate').on('ifChecked', function(event){
	event.preventDefault();

	var self = $(this).parents('.content').siblings('.textOther').children('.formulario');
	self.removeAttr("disabled");

});

$('.checkTrueValidate').on('ifUnchecked', function(event){
	event.preventDefault();

	var self = $(this).parents('.content').siblings('.textOther').children('.formulario');
	self.prop("disabled", true);
		self.val('');

});


$('.checkTrue').on('ifChecked', function(event){
	event.preventDefault();

	var self = $(this).parents('.content').siblings('.textOther').children('.formulario');
	self.removeAttr("disabled");

});

$('.checkFalse').on('ifChecked', function(event){
	event.preventDefault();
	var self = $(this).parents('.content').siblings('.textOther').children('.formulario');
	self.prop("disabled", true);
	self.val('');

/**
			$.confirm({
		    text: "Al deseleccionar se perderá el contenido",
		    confirm: function() {
					self.prop("disabled", true);
					self.val('');
		    },
		    cancel: function() {

		    }
		});*/
});

function showRespuestas(id) {

			console.log(id);
			$('.footer-buttons').css('display','none');

			$.ajax({
				url: '../cotizacion/respuesta/'+id,
				type: 'GET'
			}).done(function(data){
					console.log(data);

					var _ = data.lista_respuestas_paciente;

					$('[name="mejora"]').val(_.mejora);
					$('[name="areasMolestan"]').val(_.areasMolestan);
					$('[name="mejoraOtraZona"]').val(_.mejoraOtraZona);
					$('[name="cirugiasPrevias"]').val(_.cirugiasPrevias);
					$('[name="cirugiasNoesteticas"]').val(_.cirugiasNoesteticas);

					$('[name="hospCorazon"].[value='+_.hospCorazon+']').iCheck("check");
					$('[name="cualHospCorazon"]').val(_.cualHospCorazon);

					$('[name="hospPulmon"].[value='+_.hospPulmon+']').iCheck("check");
					$('[name="cualHospPulmones"]').val(_.cualHospPulmones);

					$('[name="presionAlta"].[value='+_.presionAlta+']').iCheck("check");
					$('[name="trastornoCardiaco"].[value='+_.trastornoCardiaco+']').iCheck("check");
					$('[name="asma"].[value='+_.asma+']').iCheck("check");
					$('[name="tosCronica"].[value='+_.tosCronica+']').iCheck("check");
					$('[name="gripa"].[value='+_.gripa+']').iCheck("check");
					$('[name="dolorPechoEscala"].[value='+_.dolorPechoEscala+']').iCheck("check");
					$('[name="dolorPechoTerreno"].[value='+_.dolorPechoTerreno+']').iCheck("check");
					$('[name="diabetes"].[value='+_.diabetes+']').iCheck("check");
					$('[name="tiroide"].[value='+_.tiroide+']').iCheck("check");

					$('[name="viveBogota"].[value='+_.viveBogota+']').iCheck("check");
					$('[name="diasViveBogota"]').val(_.diasViveBogota);

					$('[name="tipoHepatitisA"].[value='+_.tipoHepatitisA+']').iCheck("check");
					$('[name="tipoHepatitisB"].[value='+_.tipoHepatitisB+']').iCheck("check");
					$('[name="tipoHepatitisC"].[value='+_.tipoHepatitisC+']').iCheck("check");
					$('[name="tipoHepatitisD"].[value='+_.tipoHepatitisD+']').iCheck("check");

					$('[name="reflujo"].[value='+_.reflujo+']').iCheck("check");
					$('[name="estrenimiento"].[value='+_.estrenimiento+']').iCheck("check");
					$('[name="sangraLavarDiente"].[value='+_.sangraLavarDiente+']').iCheck("check");
					$('[name="trombos"].[value='+_.trombos+']').iCheck("check");
					$('[name="rinones"].[value='+_.rinones+']').iCheck("check");

					$('[name="alergiaLatex"].[value='+_.alergiaLatex+']').iCheck("check");
					$('[name="cualAlergiaLatex"]').val(_.cualAlergiaLatex);

					$('[name="extremidad"].[value='+_.extremidad+']').iCheck("check");
					$('[name="dolorEspalda"].[value='+_.dolorEspalda+']').iCheck("check");

					$('[name="otraEnfermedad"].[value='+_.otraEnfermedad+']').iCheck("check");
					$('[name="cualOtraEnfermedad"]').val(_.cualOtraEnfermedad);

					$('[name="familiarDiabetes"].[value='+_.familiarDiabetes+']').iCheck("check");
					$('[name="trombofilia"].[value='+_.trombofilia+']').iCheck("check");

					$('[name="cancerSeno"].[value='+_.cancerSeno+']').iCheck("check");
					$('[name="cualFamiliarCancerSeno"]').val(_.cualFamiliarCancerSeno);

					$('[name="medicamentoReciente"].[value='+_.medicamentoReciente+']').iCheck("check");
					$('[name="cualMedicamentoReciente"]').val(_.cualMedicamentoReciente);

					$('[name="pastillasAjoCebolla"].[value='+_.pastillasAjoCebolla+']').iCheck("check");
					$('[name="multivitaminicos"].[value='+_.multivitaminicos+']').iCheck("check");
					$('[name="omega"].[value='+_.omega+']').iCheck("check");
					$('[name="gingoBiloba"].[value='+_.gingoBiloba+']').iCheck("check");
					$('[name="vitaminaE"].[value='+_.vitaminaE+']').iCheck("check");
					$('[name="aslkazekltser"].[value='+_.aslkazekltser+']').iCheck("check");
					$('[name="aspirina"].[value='+_.aspirina+']').iCheck("check");

					$('[name="medicamentoHomeopatico"].[value='+_.medicamentoHomeopatico+']').iCheck("check");
					$('[name="cualMedicamentoHomeopatico"]').val(_.cualMedicamentoHomeopatico);

					$('[name="grupoSanguineo"]').val(_.grupoSanguineo);

					$('[name="transfusiones"].[value='+_.transfusiones+']').iCheck("check");
					$('[name="botox"].[value='+_.botox+']').iCheck("check");
					$('[name="bebeAlcohol"].[value='+_.bebeAlcohol+']').iCheck("check");
					$('[name="fuma"].[value='+_.fuma+']').iCheck("check");
					$('[name="fumo"].[value='+_.fumo+']').iCheck("check");

					$('[name="drogasPsicoactivas"].[value='+_.drogasPsicoactivas+']').iCheck("check");
					$('[name="cualdrogasPsicoactivas"]').val(_.cualdrogasPsicoactivas);

					$('[name="embarazo"].[value='+_.embarazo+']').iCheck("check");
					$('[name="cuantosEmbarazos"]').val(_.cuantosEmbarazos);

					$('[name="embarazoGemelar"].[value='+_.embarazoGemelar+']').iCheck("check");

					$('[name="perdidasEspontaneas"].[value='+_.perdidasEspontaneas+']').iCheck("check");
					$('[name="cuantasPerdidasEspontaneas"]').val(_.cuantasPerdidasEspontaneas);

					$('[name="cuandoUltimoEmbarazo"]').val(_.cuandoUltimoEmbarazo);

					$('[name="creerEstarEmbarazada"].[value='+_.creerEstarEmbarazada+']').iCheck("check");

					$('[name="cuandoUltimaMestruacion"]').val(_.cuandoUltimaMestruacion);

					$('[name="usaLentesContacto"].[value='+_.usaLentesContacto+']').iCheck("check");
					$('[name="dientesArtificiales"].[value='+_.dientesArtificiales+']').iCheck("check");
					$('[name="dientesFlojo"].[value='+_.dientesFlojo+']').iCheck("check");

					$('[name="complicaionAnestesia"].[value='+_.complicaionAnestesia+']').iCheck("check");
					$('[name="cualComplicaionAnestesia"]').val(_.cualComplicaionAnestesia);

					$('textarea,input[type="text"],select').prop('disabled',true);
					$('input').iCheck('disable');

					$('#myModal').modal('show');

					//window.location.href = '/hcfa/public/facturacion/update/'+data;
			}).fail(function(error){
					console.log(error)
			});

	};



	$('#addProcedimiento').confirm({
		    text: "Está seguro de que desea crear un nuevo procedimiento?",
		    title: "Confirmación requerida",
		    confirm: function(button) {

					var data = {
						'idPaciente' : '{{$id}}'
					};

					$.ajax({
						url: '../procedimiento/save',
						type: 'POST',
						data: {data}
					}).done(function(datas){
							console.log(datas);

							$('#procedimiento').append('<div class="widget procedure"> '+
									'<div class="widget-content widget-content-mini themed-background-muted">'+
										'<div class="pull-right text-muted">'+
										'</div>'+
										'Procedimiento # /'+ datas['createdAt'] +
								'</div>'+
									'<div class="widget-content">'+
										'<div class="box-procedimiento">'+
											'<div class="col-md-6" style="display: flex;justify-content: space-around;">'+
												'<div class="">'+
													'<div class="" style="display:flex;margin-bottom: 10px;">'+
														'<div class="content" style="margin-right: 13px; display:flex;align-items:center;">'+
															'<img src="{{ asset('img/uncheck-icon.png') }}" alt="avatar" class=" pull-center" width="19" height="19">'+
														'</div>'+
														'<label for="Id" class="text-left" style="width:100%;">'+
															'<a href="../historiaclinicadefinitiva/show/{{ $id }}/'+ datas['id'] +'" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect" style="font-size:13px; padding:2px 4px !important;width: 100%;">H.C Definitiva</a>'+
														'</label>'+
													'</div>'+
													'<div class="" style="display:flex;margin-bottom: 10px;">'+
														'<div class="content" style="margin-right: 13px; display:flex;align-items:center;">'+
															'<img src="{{ asset('img/uncheck-icon.png') }}" alt="avatar" class=" pull-center" width="19" height="19">'+
														'</div>'+
														'<label for="Id" class="text-left" style="width:100%;">'+
															'<div class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect" style="font-size:13px; padding:2px 4px !important;width: 100%;">Listo chequeo</div>'+
														'</label>'+
													'</div>'+
													'<div class="" style="display:flex;margin-bottom: 10px;">'+
														'<div class="content" style="margin-right: 13px; display:flex;align-items:center;">'+
															'<img src="{{ asset('img/uncheck-icon.png') }}" alt="avatar" class=" pull-center" width="19" height="19">'+
														'</div>'+
														'<label for="Id" class="text-left" style="width:100%;">'+
															'<div class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect" style="font-size:13px; padding:2px 4px !important;width: 100%;">Contrato</div>'+
														'</label>'+
													'</div>'+
													'<div class="" style="display:flex;margin-bottom: 10px;">'+
														'<div class="content" style="margin-right: 13px; display:flex;align-items:center;">'+
															'<img src="{{ asset('img/uncheck-icon.png') }}" alt="avatar" class=" pull-center" width="19" height="19">'+
														'</div>'+
														'<label for="Id" class="text-left" style="width:100%;">'+
															'<div class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect" style="font-size:13px; padding:2px 4px !important;width: 100%;">Orden Patolog&iacute;a</div>'+
														'</label>'+
													'</div>'+
												'</div>'+
												'<div class="">'+
													'<div class="" style="display:flex;margin-bottom: 10px;">'+
														'<div class="content" style="margin-right: 13px; display:flex;align-items:center;">'+
															'<img src="{{ asset('img/uncheck-icon.png') }}" alt="avatar" class=" pull-center" width="19" height="19">'+
														'</div>'+
														'<label for="Id" class="text-left" style="width:100%;">'+
															'<div class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect" style="font-size:13px; padding:2px 4px !important;width: 100%;">Consentimientos</div>'+
														'</label>'+
													'</div>'+
													'<div class="" style="display:flex;margin-bottom: 10px;">'+
														'<div class="content" style="margin-right: 13px; display:flex;align-items:center;">'+
															'<img src="{{ asset('img/uncheck-icon.png') }}" alt="avatar" class=" pull-center" width="19" height="19">'+
														'</div>'+
														'<label for="Id" class="text-left" style="width:100%;">'+
															'<div class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect" style="font-size:13px; padding:2px 4px !important;width: 100%;">Info Compli.</div>'+
														'</label>'+
													'</div>'+
													'<div class="" style="display:flex;margin-bottom: 10px;">'+
														'<div class="content" style="margin-right: 13px; display:flex;align-items:center;">'+
															'<img src="{{ asset('img/uncheck-icon.png') }}" alt="avatar" class=" pull-center" width="19" height="19">'+
														'</div>'+
														'<label for="Id" class="text-left" style="width:100%;">'+
															'<div class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect" style="font-size:13px; padding:2px 4px !important;width: 100%;">Recomendaci&oacute;n PostO.</div>'+
														'</label>'+
													'</div>'+
												'</div>'+
											'</div>'+
											'<div class="col-md-3">'+
												'<button class="mdl-button mdl-js-button mdl-button--raised" style="color:#FFF; background: #5cafde; margin:0 auto 15px auto; font-size:12px;">'+
													'Desc. Quirurgico <i class="fa fa-plus-circle"></i>'+
												'</button>'+
												'<table class="table">'+
													'<thead>'+
														'<tr>'+
															'<th>'+
																'Fecha'+
															'</th>'+
															'<th>'+
																'Tipo'+
															'</th>'+
															'<th>'+
																'Acciones'+
															'</th>'+
														'</tr>'+
													'</thead>'+
													'<tbody>'+
															'<tr>'+
																'<td>Fecha</td>'+
																'<td>Tipo</td>'+
																'<td>'+
																	'<a name="editar" class="btn btn-default" href="" title="Ver" style="padding: 2px 5px;"><i class="fa fa-eye"></i></a>'+
																	'<a name="print" class="btn btn-success" href="" title="Imprimir" style="padding: 2px 5px;"><i class="fa fa-print"></i></a>'+
																'</td>'+
															'</tr>'+
													'</tbody>'+
												'</table>'+
											'</div>'+
											'<div class="col-md-3">'+
												'<button class="mdl-button mdl-js-button mdl-button--raised" style="color:#FFF; background: #5cafde; margin:0 auto 15px auto; font-size:12px;">'+
													'Controles / Notas <i class="fa fa-plus-circle"></i>'+
												'</button>'+
												'<table class="table">'+
													'<thead>'+
														'<tr>'+
															'<th>'+
																'Fecha'+
															'</th>'+
															'<th>'+
																'Acciones'+
															'</th>'+
														'</tr>'+
													'</thead>'+
													'<tbody>'+
															'<tr>'+
																'<td>Fecha</td>'+
																'<td>'+
																	'<a name="editar" class="btn btn-default" href="" title="Ver" style="padding: 2px 5px;"><i class="fa fa-eye"></i></a>'+
																	'<a name="print" class="btn btn-success" href="" title="Imprimir" style="padding: 2px 5px;"><i class="fa fa-print"></i></a>'+
																'</td>'+
															'</tr>'+
													'</tbody>'+
												'</table>'+
											'</div>'+
										'</div>'+

									'</div>'+
									'<div class="widget-content themed-background-muted">'+

									'</div>'+

								'</div>');

								$('.procedure').find('input[type="checkbox"],input[type="radio"]').iCheck({
									checkboxClass: 'icheckbox_minimal-green',
									radioClass: 'iradio_square-green',
								});

							console.log(datas);

							//window.location.href = '/hcfa/public/facturacion/update/'+data;
					}).fail(function(error){
							console.log(error)
					});




		    },
		    cancel: function(button) {
						console.log('cancelado')
		    },
		    confirmButton: "Si, estoy seguro.",
		    cancelButton: "No, cancelar.",
				post: true,
		    confirmButtonClass: "btn-warning",
		    cancelButtonClass: "btn-default",
		    dialogClass: "modal-dialog"
		});



	$('.invoice').confirm({
		    text: "Está seguro de querer facturar ésta cotización?",
		    title: "Confirmación requerida",
		    confirm: function(button) {

					$.ajax({
						url: '../cotizacion/invoice',
						type: 'POST',
						data: {id:$(button).attr('data-id')}
					}).done(function(data){
							//console.log(data);
							window.location.href = '/hcfa/public/facturacion/update/'+data;
					}).fail(function(error){
							console.log(error)
					});

		    },
		    cancel: function(button) {
						console.log('cancelado')
		    },
		    confirmButton: "Si, estoy seguro.",
		    cancelButton: "No, cancelar.",
				post: true,
		    confirmButtonClass: "btn-warning",
		    cancelButtonClass: "btn-default",
		    dialogClass: "modal-dialog"
		});

</script>
@stop
