@extends('layouts.app')

@section('content')
<div class="page-content row">
    <!-- Page header -->
    <div class="page-header">
      <div class="page-title">
        <h3> {{ $pageTitle }} <small>{{ $pageNote }}</small></h3>
      </div>
      <ul class="breadcrumb">
        <li><a href="{{ URL::to('dashboard') }}">{{ Lang::get('core.home') }}</a></li>
		<li><a href="{{ URL::to('datospaciente?return='.$return) }}">{{ $pageTitle }}</a></li>
        <li class="active"> {{ Lang::get('core.detail') }} </li>
      </ul>
	 </div>  
	 
	 
 	<div class="page-content-wrapper">   
	   <div class="toolbar-line">
	   		<a href="{{ URL::to('datospaciente?return='.$return) }}" class="tips btn btn-xs btn-default" title="{{ Lang::get('core.btn_back') }}"><i class="fa fa-arrow-circle-left"></i>&nbsp;{{ Lang::get('core.btn_back') }}</a>
			@if($access['is_add'] ==1)
	   		<a href="{{ URL::to('datospaciente/update/'.$id.'?return='.$return) }}" class="tips btn btn-xs btn-primary" title="{{ Lang::get('core.btn_edit') }}"><i class="fa fa-edit"></i>&nbsp;{{ Lang::get('core.btn_edit') }}</a>
			@endif  		   	  
		</div>
<div class="sbox animated fadeInRight">
	<div class="sbox-title"> <h4> <i class="fa fa-table"></i> </h4></div>
	<div class="sbox-content"> 	


	
	<table class="table table-striped table-bordered" >
		<tbody>	
	
					<tr>
						<td width='30%' class='label-view text-right'>
							{{ SiteHelpers::activeLang('', (isset($fields['tipoDocumento']['language'])? $fields['tipoDocumento']['language'] : array())) }}	
						</td>
						<td>{{ $row->tipoDocumento }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>
							{{ SiteHelpers::activeLang('Documento', (isset($fields['numDoc']['language'])? $fields['numDoc']['language'] : array())) }}	
						</td>
						<td>{{ $row->numDoc }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>
							{{ SiteHelpers::activeLang('Nombre(s)', (isset($fields['nombres']['language'])? $fields['nombres']['language'] : array())) }}	
						</td>
						<td>{{ $row->nombres }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>
							{{ SiteHelpers::activeLang('Apellido 1', (isset($fields['apellido1']['language'])? $fields['apellido1']['language'] : array())) }}	
						</td>
						<td>{{ $row->apellido1 }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>
							{{ SiteHelpers::activeLang('Apellido 2', (isset($fields['apellido2']['language'])? $fields['apellido2']['language'] : array())) }}	
						</td>
						<td>{{ $row->apellido2 }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>
							{{ SiteHelpers::activeLang('Email', (isset($fields['email']['language'])? $fields['email']['language'] : array())) }}	
						</td>
						<td>{{ $row->email }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>
							{{ SiteHelpers::activeLang('Direcció', (isset($fields['direccion']['language'])? $fields['direccion']['language'] : array())) }}	
						</td>
						<td>{{ $row->direccion }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>
							{{ SiteHelpers::activeLang('Teléfono', (isset($fields['telefono']['language'])? $fields['telefono']['language'] : array())) }}	
						</td>
						<td>{{ $row->telefono }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>
							{{ SiteHelpers::activeLang('Celular 1', (isset($fields['celular1']['language'])? $fields['celular1']['language'] : array())) }}	
						</td>
						<td>{{ $row->celular1 }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>
							{{ SiteHelpers::activeLang('Celular 2', (isset($fields['celular2']['language'])? $fields['celular2']['language'] : array())) }}	
						</td>
						<td>{{ $row->celular2 }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>
							{{ SiteHelpers::activeLang('Estado', (isset($fields['estadoPaciente']['language'])? $fields['estadoPaciente']['language'] : array())) }}	
						</td>
						<td>{{ $row->estadoPaciente }} </td>
						
					</tr>
				
		</tbody>	
	</table>   

	 
	
	</div>
</div>	

	</div>
</div>
	  
@stop