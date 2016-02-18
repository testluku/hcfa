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
					<li><a href="">Pacientes</a></li>
				</ul>
			</div>
		</div>
	</div>
</div>

	<div class="block-title">
		<h2>Pacientes</h2>
	</div>
	<div class="table-responsive">
		<div id="example-datatable_wrapper"
			class="dataTables_wrapper form-inline no-footer">
			<div class="row">
				<div class="col-sm-6 col-xs-5">
					<div class="dataTables_length" id="example-datatable_length">
						<label><select name="example-datatable_length"
							aria-controls="example-datatable" class="form-control"><option
									value="5">5</option>
								<option value="10">10</option>
								<option value="20">20</option></select></label>
					</div>
				</div>
				<div class="col-sm-6 col-xs-7">
					<div id="example-datatable_filter" class="dataTables_filter">
						<label><div class="input-group">
								<input type="search" class="form-control" placeholder="Buscar"
									aria-controls="example-datatable"><span
									class="input-group-addon"><i class="fa fa-search"></i></span>
							</div></label>
					</div>
				</div>
			</div>
			<table id="example-datatable"
				class="table table-striped table-bordered table-vcenter dataTable no-footer"
				role="grid" aria-describedby="example-datatable_info">
				<thead>
					<tr role="row">
						<th class="text-center sorting" style="width: 50px;" tabindex="0"
							aria-controls="example-datatable" rowspan="1" colspan="1"
							aria-label="ID: activate to sort column ascending">TD</th>
						<th class="sorting" tabindex="0" aria-controls="example-datatable"
							rowspan="1" colspan="1"
							aria-label="User: activate to sort column ascending"
							style="width: 168px;">Número</th>
						<th class="sorting" tabindex="0" aria-controls="example-datatable"
							rowspan="1" colspan="1"
							aria-label="Email: activate to sort column ascending"
							style="width: 379px;">Nombre(s)</th>
						<th class="sorting" tabindex="0" aria-controls="example-datatable"
							rowspan="1" colspan="1"
							aria-label="Email: activate to sort column ascending"
							style="width: 379px;">Apellido 1</th>
						<th class="sorting" tabindex="0" aria-controls="example-datatable"
							rowspan="1" colspan="1"
							aria-label="Email: activate to sort column ascending"
							style="width: 379px;">Apellido 2</th>
						<th style="width: 119px;" class="sorting_desc" tabindex="0"
							aria-controls="example-datatable" rowspan="1" colspan="1"
							aria-label="Status: activate to sort column ascending"
							aria-sort="descending">Estado</th>
						<th class="text-center sorting_disabled" style="width: 74px;"
							rowspan="1" colspan="1" aria-label=""><i class="fa fa-flash"></i></th>
					</tr>
				</thead>
				<tbody>
					<?php $i=0;?>
					@foreach($pacientes as $paciente)
					<tr role="row" class=<?php if($i % 2==0){echo '"even"';}else{echo '"odd"';}  ?>>
						<td class="text-center">{{$paciente->tipoDocumento}}</td>
						<td><strong>{{$paciente->numDoc}}</strong></td>
						<td>{{$paciente->nombres}}</td>
						<td>{{$paciente->apellido1}}</td>
						<td>{{$paciente->apellido2}}</td>
						<td class="sorting_1"><span class="label label-{{$paciente->css}}">{{$paciente->estado}}</span></td>
						<td class="text-center"><a href="{{ URL::to('paciente', $paciente->id) }}"
							data-toggle="tooltip" title=""
							class="btn btn-effect-ripple btn-xs btn-success"
							style="overflow: hidden; position: relative;"
							data-original-title="Ver"><i class="fa fa-eye"></i></a>
						</td>
					</tr>
					@endforeach

				</tbody>
			</table>
			<div class="row">
				<div class="col-sm-5 hidden-xs">
					<div class="dataTables_info" id="example-datatable_info"
						role="status" aria-live="polite">
						<strong>1</strong>-<strong>5</strong> de <strong>5</strong>
					</div>
				</div>
				<div class="col-sm-7 col-xs-12 clearfix">
					<div class="dataTables_paginate paging_bootstrap"
						id="example-datatable_paginate">
						<ul class="pagination pagination-sm remove-margin">
							<li class="prev"><a href="javascript:void(0)"><i
									class="fa fa-chevron-left"></i> </a></li>
							<li><a href="javascript:void(0)">1</a></li>
							<li class="active"><a href="javascript:void(0)">2</a></li>
							<li class="next disabled"><a href="javascript:void(0)"> <i
									class="fa fa-chevron-right"></i></a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>


@stop
