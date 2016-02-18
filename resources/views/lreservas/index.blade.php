@extends('layouts.app')
@section('content')

  <div class="content-header">
		<div class="row">
			<div class="col-sm-6">
				<div class="header-section">
					Agenda
				</div>
			</div>
			<div class="col-sm-6 hidden-xs">
				<div class="header-section">
					<ul class="breadcrumb breadcrumb-top">
						<li><a href="#"><i class="fa fa-home"></i></a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
    <div class="page-content-wrapper m-t">
    	<div class="block">
                                    <!-- Row Styles Title -->
                                    <div class="block-title">
                                        <h2>{{ $fecha }}</h2>
                                    </div>
                                    <!-- END Row Styles Title -->

                                    <!-- Row Styles Content -->
                                    <div class="table-responsive">
                                        <table class="table table-borderless table-vcenter">
                                            <thead>
                                                <tr>
                                                    <th>Hora</th>
                                                    <th>Nombre</th>
                                                    <th>Descripción</th>
                                                    <th>Estado</th>
                                                    <th style="width: 80px;" class="text-center"><i class="fa fa-flash"></i></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            	@foreach($citas as $cita)
                                                <tr class="active">
                                                    <td><strong>{{$cita->slot_time_from}}</strong></td>
                                                    <td>{{$cita->reservation_name}} {{$cita->reservation_surname}}</td>
                                                    <td>{{$cita->reservation_message}}</td>
                                                    <td><a href="javascript:void(0)" class="label label-warning">Pending..</a></td>
                                                    <td class="text-center">
                                                        <a href="javascript:void(0)" data-toggle="tooltip" title="" class="btn btn-effect-ripple btn-xs btn-success" style="overflow: hidden; position: relative;" data-original-title="Edit User"><i class="fa fa-pencil"></i></a>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- END Row Styles Content -->
                                
		</div>
    </div>
<script type="text/javascript" src="{{ asset('js/pages/uiTables.js') }}"></script>
<script>$(function(){ UiTables.init(); });</script>

@stop