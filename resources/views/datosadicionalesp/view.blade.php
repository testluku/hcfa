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
		<li><a href="{{ URL::to('datosadicionalesp?return='.$return) }}">{{ $pageTitle }}</a></li>
        <li class="active"> {{ Lang::get('core.detail') }} </li>
      </ul>
	 </div>  
	 
	 
 	<div class="page-content-wrapper">   
	   <div class="toolbar-line">
	   		<a href="{{ URL::to('datosadicionalesp?return='.$return) }}" class="tips btn btn-xs btn-default" title="{{ Lang::get('core.btn_back') }}"><i class="fa fa-arrow-circle-left"></i>&nbsp;{{ Lang::get('core.btn_back') }}</a>
			@if($access['is_add'] ==1)
	   		<a href="{{ URL::to('datosadicionalesp/update/'.$id.'?return='.$return) }}" class="tips btn btn-xs btn-primary" title="{{ Lang::get('core.btn_edit') }}"><i class="fa fa-edit"></i>&nbsp;{{ Lang::get('core.btn_edit') }}</a>
			@endif  		   	  
		</div>
<div class="sbox animated fadeInRight">
	<div class="sbox-title"> <h4> <i class="fa fa-table"></i> </h4></div>
	<div class="sbox-content"> 	


	
	<table class="table table-striped table-bordered" >
		<tbody>	
	
					<tr>
						<td width='30%' class='label-view text-right'>
							{{ SiteHelpers::activeLang('Id', (isset($fields['id']['language'])? $fields['id']['language'] : array())) }}	
						</td>
						<td>{{ $row->id }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>
							{{ SiteHelpers::activeLang('FechaCreacion', (isset($fields['fechaCreacion']['language'])? $fields['fechaCreacion']['language'] : array())) }}	
						</td>
						<td>{{ $row->fechaCreacion }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>
							{{ SiteHelpers::activeLang('Sexo', (isset($fields['sexo']['language'])? $fields['sexo']['language'] : array())) }}	
						</td>
						<td>{{ $row->sexo }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>
							{{ SiteHelpers::activeLang('FechaNacimiento', (isset($fields['fechaNacimiento']['language'])? $fields['fechaNacimiento']['language'] : array())) }}	
						</td>
						<td>{{ $row->fechaNacimiento }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>
							{{ SiteHelpers::activeLang('LugarNacimiento', (isset($fields['lugarNacimiento']['language'])? $fields['lugarNacimiento']['language'] : array())) }}	
						</td>
						<td>{{ $row->lugarNacimiento }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>
							{{ SiteHelpers::activeLang('Edad', (isset($fields['edad']['language'])? $fields['edad']['language'] : array())) }}	
						</td>
						<td>{{ $row->edad }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>
							{{ SiteHelpers::activeLang('ReferidoPor', (isset($fields['referidoPor']['language'])? $fields['referidoPor']['language'] : array())) }}	
						</td>
						<td>{{ $row->referidoPor }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>
							{{ SiteHelpers::activeLang('DireccionOficina', (isset($fields['direccionOficina']['language'])? $fields['direccionOficina']['language'] : array())) }}	
						</td>
						<td>{{ $row->direccionOficina }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>
							{{ SiteHelpers::activeLang('TelefonoOficina', (isset($fields['telefonoOficina']['language'])? $fields['telefonoOficina']['language'] : array())) }}	
						</td>
						<td>{{ $row->telefonoOficina }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>
							{{ SiteHelpers::activeLang('Direccion', (isset($fields['direccion']['language'])? $fields['direccion']['language'] : array())) }}	
						</td>
						<td>{{ $row->direccion }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>
							{{ SiteHelpers::activeLang('Ciudad', (isset($fields['ciudad']['language'])? $fields['ciudad']['language'] : array())) }}	
						</td>
						<td>{{ $row->ciudad }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>
							{{ SiteHelpers::activeLang('Departamento', (isset($fields['departamento']['language'])? $fields['departamento']['language'] : array())) }}	
						</td>
						<td>{{ $row->departamento }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>
							{{ SiteHelpers::activeLang('Pais', (isset($fields['pais']['language'])? $fields['pais']['language'] : array())) }}	
						</td>
						<td>{{ $row->pais }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>
							{{ SiteHelpers::activeLang('Ocupacion', (isset($fields['ocupacion']['language'])? $fields['ocupacion']['language'] : array())) }}	
						</td>
						<td>{{ $row->ocupacion }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>
							{{ SiteHelpers::activeLang('Empresa', (isset($fields['empresa']['language'])? $fields['empresa']['language'] : array())) }}	
						</td>
						<td>{{ $row->empresa }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>
							{{ SiteHelpers::activeLang('Cargo', (isset($fields['cargo']['language'])? $fields['cargo']['language'] : array())) }}	
						</td>
						<td>{{ $row->cargo }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>
							{{ SiteHelpers::activeLang('ComoSeEntero', (isset($fields['comoSeEntero']['language'])? $fields['comoSeEntero']['language'] : array())) }}	
						</td>
						<td>{{ $row->comoSeEntero }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>
							{{ SiteHelpers::activeLang('ComoSeEnteroDesc', (isset($fields['comoSeEnteroDesc']['language'])? $fields['comoSeEnteroDesc']['language'] : array())) }}	
						</td>
						<td>{{ $row->comoSeEnteroDesc }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>
							{{ SiteHelpers::activeLang('CopiaCedula', (isset($fields['copiaCedula']['language'])? $fields['copiaCedula']['language'] : array())) }}	
						</td>
						<td>{{ $row->copiaCedula }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>
							{{ SiteHelpers::activeLang('EPS', (isset($fields['EPS']['language'])? $fields['EPS']['language'] : array())) }}	
						</td>
						<td>{{ $row->EPS }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>
							{{ SiteHelpers::activeLang('ARP', (isset($fields['ARP']['language'])? $fields['ARP']['language'] : array())) }}	
						</td>
						<td>{{ $row->ARP }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>
							{{ SiteHelpers::activeLang('Prepagada', (isset($fields['prepagada']['language'])? $fields['prepagada']['language'] : array())) }}	
						</td>
						<td>{{ $row->prepagada }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>
							{{ SiteHelpers::activeLang('MenorDeEdad', (isset($fields['menorDeEdad']['language'])? $fields['menorDeEdad']['language'] : array())) }}	
						</td>
						<td>{{ $row->menorDeEdad }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>
							{{ SiteHelpers::activeLang('AcudienteResponsable', (isset($fields['acudienteResponsable']['language'])? $fields['acudienteResponsable']['language'] : array())) }}	
						</td>
						<td>{{ $row->acudienteResponsable }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>
							{{ SiteHelpers::activeLang('Acompanante', (isset($fields['acompanante']['language'])? $fields['acompanante']['language'] : array())) }}	
						</td>
						<td>{{ $row->acompanante }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>
							{{ SiteHelpers::activeLang('OrigenEnfermedad', (isset($fields['origenEnfermedad']['language'])? $fields['origenEnfermedad']['language'] : array())) }}	
						</td>
						<td>{{ $row->origenEnfermedad }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>
							{{ SiteHelpers::activeLang('ContactoNombre', (isset($fields['contactoNombre']['language'])? $fields['contactoNombre']['language'] : array())) }}	
						</td>
						<td>{{ $row->contactoNombre }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>
							{{ SiteHelpers::activeLang('ContactoRelacion', (isset($fields['contactoRelacion']['language'])? $fields['contactoRelacion']['language'] : array())) }}	
						</td>
						<td>{{ $row->contactoRelacion }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>
							{{ SiteHelpers::activeLang('ContactoTelefonoCasa', (isset($fields['contactoTelefonoCasa']['language'])? $fields['contactoTelefonoCasa']['language'] : array())) }}	
						</td>
						<td>{{ $row->contactoTelefonoCasa }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>
							{{ SiteHelpers::activeLang('ContactoTelefonoTrabajo', (isset($fields['contactoTelefonoTrabajo']['language'])? $fields['contactoTelefonoTrabajo']['language'] : array())) }}	
						</td>
						<td>{{ $row->contactoTelefonoTrabajo }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>
							{{ SiteHelpers::activeLang('ContactoCelular', (isset($fields['contactoCelular']['language'])? $fields['contactoCelular']['language'] : array())) }}	
						</td>
						<td>{{ $row->contactoCelular }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>
							{{ SiteHelpers::activeLang('RevisionPor', (isset($fields['revisionPor']['language'])? $fields['revisionPor']['language'] : array())) }}	
						</td>
						<td>{{ $row->revisionPor }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>
							{{ SiteHelpers::activeLang('Estado', (isset($fields['estado']['language'])? $fields['estado']['language'] : array())) }}	
						</td>
						<td>{{ $row->estado }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>
							{{ SiteHelpers::activeLang('Foto', (isset($fields['foto']['language'])? $fields['foto']['language'] : array())) }}	
						</td>
						<td>{{ $row->foto }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>
							{{ SiteHelpers::activeLang('EstadoCivil', (isset($fields['estadoCivil']['language'])? $fields['estadoCivil']['language'] : array())) }}	
						</td>
						<td>{{ $row->estadoCivil }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>
							{{ SiteHelpers::activeLang('GrupoSanguineo', (isset($fields['grupoSanguineo']['language'])? $fields['grupoSanguineo']['language'] : array())) }}	
						</td>
						<td>{{ $row->grupoSanguineo }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>
							{{ SiteHelpers::activeLang('RH', (isset($fields['RH']['language'])? $fields['RH']['language'] : array())) }}	
						</td>
						<td>{{ $row->RH }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>
							{{ SiteHelpers::activeLang('NombrePareja', (isset($fields['nombrePareja']['language'])? $fields['nombrePareja']['language'] : array())) }}	
						</td>
						<td>{{ $row->nombrePareja }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>
							{{ SiteHelpers::activeLang('EdadPareja', (isset($fields['edadPareja']['language'])? $fields['edadPareja']['language'] : array())) }}	
						</td>
						<td>{{ $row->edadPareja }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>
							{{ SiteHelpers::activeLang('OficioPareja', (isset($fields['oficioPareja']['language'])? $fields['oficioPareja']['language'] : array())) }}	
						</td>
						<td>{{ $row->oficioPareja }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>
							{{ SiteHelpers::activeLang('TipoPaciente', (isset($fields['tipoPaciente']['language'])? $fields['tipoPaciente']['language'] : array())) }}	
						</td>
						<td>{{ $row->tipoPaciente }} </td>
						
					</tr>
				
		</tbody>	
	</table>   

	 
	
	</div>
</div>	

	</div>
</div>
	  
@stop