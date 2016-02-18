@extends('layouts.app')

@section('content')

 <div class="content-header">
	<div class="row">
		<div class="col-sm-6">
			<div class="header-section">Datos Adicionales</div>
		</div>
		<div class="col-sm-6 hidden-xs">
			<div class="header-section">
				<ul class="breadcrumb breadcrumb-top">
					<li><a href="{{ URL::to('lreservas') }}"><i class="fa fa-home"></i></a></li>
					<li><a href="{{ URL::to('pacientes') }}">Pacientes</a></li>
					<li><a href="{{ URL::to('paciente', $id) }}">Paciente</a></li>
					<li><a href="#">Adicional</a></li>
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
	<div class="sbox-title"> <h4> <i class="fa fa-table"></i> </h4></div>
	<div class="sbox-content"> 	

		 {!! Form::open(array('url'=>'datosadicionalesp/save?return='.$return, 'class'=>'form-horizontal','files' => true , 'parsley-validate'=>'','novalidate'=>' ')) !!}
<div class="col-md-12">
						<fieldset><legend> Datos Adicionales</legend>
									
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
				  <div class="form-group hidethis " style="display:none;"> 
					<label for="FechaCreacion" class=" control-label col-md-4 text-left"> 
					{!! SiteHelpers::activeLang('FechaCreacion', (isset($fields['fechaCreacion']['language'])? $fields['fechaCreacion']['language'] : array())) !!}	
					</label>
					<div class="col-md-6">
					  {!! Form::text('fechaCreacion', $row['fechaCreacion'],array('class'=>'form-control', 'placeholder'=>'',   )) !!} 
					 </div> 
					 <div class="col-md-2">
					 	
					 </div>
				  </div> 					
				  <div class="form-group  " > 
					<label for="Sexo" class=" control-label col-md-4 text-left"> 
					{!! SiteHelpers::activeLang('Sexo', (isset($fields['sexo']['language'])? $fields['sexo']['language'] : array())) !!}	
					</label>
					<div class="col-md-6">
					  
					<?php $sexo = explode(',',$row['sexo']);
					$sexo_opt = array( 'F' => 'Femenino' ,  'M' => 'Masculino' , ); ?>
					<select name='sexo' rows='5' required  class='select2 '  > 
						<?php 
						foreach($sexo_opt as $key=>$val)
						{
							echo "<option  value ='$key' ".($row['sexo'] == $key ? " selected='selected' " : '' ).">$val</option>"; 						
						}						
						?></select> 
					 </div> 
					 <div class="col-md-2">
					 	
					 </div>
				  </div> 					
				  <div class="form-group  " > 
					<label for="FechaNacimiento" class=" control-label col-md-4 text-left"> 
					{!! SiteHelpers::activeLang('FechaNacimiento', (isset($fields['fechaNacimiento']['language'])? $fields['fechaNacimiento']['language'] : array())) !!}	
					</label>
					<div class="col-md-6">
					  
				<div class="input-group m-b" style="width:150px !important;">
					{!! Form::text('fechaNacimiento', $row['fechaNacimiento'],array('class'=>'form-control date')) !!}
					<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
				</div> 
					 </div> 
					 <div class="col-md-2">
					 	
					 </div>
				  </div> 					
				  <div class="form-group  " > 
					<label for="LugarNacimiento" class=" control-label col-md-4 text-left"> 
					{!! SiteHelpers::activeLang('LugarNacimiento', (isset($fields['lugarNacimiento']['language'])? $fields['lugarNacimiento']['language'] : array())) !!}	
					</label>
					<div class="col-md-6">
					  {!! Form::text('lugarNacimiento', $row['lugarNacimiento'],array('class'=>'form-control', 'placeholder'=>'',   )) !!} 
					 </div> 
					 <div class="col-md-2">
					 	
					 </div>
				  </div> 					
				  <div class="form-group hidethis " style="display:none;"> 
					<label for="Edad" class=" control-label col-md-4 text-left"> 
					{!! SiteHelpers::activeLang('Edad', (isset($fields['edad']['language'])? $fields['edad']['language'] : array())) !!}	
					</label>
					<div class="col-md-6">
					  {!! Form::text('edad', $row['edad'],array('class'=>'form-control', 'placeholder'=>'',   )) !!} 
					 </div> 
					 <div class="col-md-2">
					 	
					 </div>
				  </div> 					
				  <div class="form-group  " > 
					<label for="ReferidoPor" class=" control-label col-md-4 text-left"> 
					{!! SiteHelpers::activeLang('ReferidoPor', (isset($fields['referidoPor']['language'])? $fields['referidoPor']['language'] : array())) !!}	
					</label>
					<div class="col-md-6">
					  {!! Form::text('referidoPor', $row['referidoPor'],array('class'=>'form-control', 'placeholder'=>'',   )) !!} 
					 </div> 
					 <div class="col-md-2">
					 	
					 </div>
				  </div> 					
				  <div class="form-group  " > 
					<label for="DireccionOficina" class=" control-label col-md-4 text-left"> 
					{!! SiteHelpers::activeLang('DireccionOficina', (isset($fields['direccionOficina']['language'])? $fields['direccionOficina']['language'] : array())) !!}	
					</label>
					<div class="col-md-6">
					  {!! Form::text('direccionOficina', $row['direccionOficina'],array('class'=>'form-control', 'placeholder'=>'',   )) !!} 
					 </div> 
					 <div class="col-md-2">
					 	
					 </div>
				  </div> 					
				  <div class="form-group  " > 
					<label for="TelefonoOficina" class=" control-label col-md-4 text-left"> 
					{!! SiteHelpers::activeLang('TelefonoOficina', (isset($fields['telefonoOficina']['language'])? $fields['telefonoOficina']['language'] : array())) !!}	
					</label>
					<div class="col-md-6">
					  {!! Form::text('telefonoOficina', $row['telefonoOficina'],array('class'=>'form-control', 'placeholder'=>'',   )) !!} 
					 </div> 
					 <div class="col-md-2">
					 	
					 </div>
				  </div> 					
				  <div class="form-group  " > 
					<label for="Direccion" class=" control-label col-md-4 text-left"> 
					{!! SiteHelpers::activeLang('Direccion', (isset($fields['direccion']['language'])? $fields['direccion']['language'] : array())) !!}	
					</label>
					<div class="col-md-6">
					  {!! Form::text('direccion', $row['direccion'],array('class'=>'form-control', 'placeholder'=>'',   )) !!} 
					 </div> 
					 <div class="col-md-2">
					 	
					 </div>
				  </div> 					
				  <div class="form-group  " > 
					<label for="Ciudad" class=" control-label col-md-4 text-left"> 
					{!! SiteHelpers::activeLang('Ciudad', (isset($fields['ciudad']['language'])? $fields['ciudad']['language'] : array())) !!}	
					</label>
					<div class="col-md-6">
					  {!! Form::text('ciudad', $row['ciudad'],array('class'=>'form-control', 'placeholder'=>'',   )) !!} 
					 </div> 
					 <div class="col-md-2">
					 	
					 </div>
				  </div> 					
				  <div class="form-group  " > 
					<label for="Departamento" class=" control-label col-md-4 text-left"> 
					{!! SiteHelpers::activeLang('Departamento', (isset($fields['departamento']['language'])? $fields['departamento']['language'] : array())) !!}	
					</label>
					<div class="col-md-6">
					  {!! Form::text('departamento', $row['departamento'],array('class'=>'form-control', 'placeholder'=>'',   )) !!} 
					 </div> 
					 <div class="col-md-2">
					 	
					 </div>
				  </div> 					
				  <div class="form-group  " > 
					<label for="Pais" class=" control-label col-md-4 text-left"> 
					{!! SiteHelpers::activeLang('Pais', (isset($fields['pais']['language'])? $fields['pais']['language'] : array())) !!}	
					</label>
					<div class="col-md-6">
					  {!! Form::text('pais', $row['pais'],array('class'=>'form-control', 'placeholder'=>'',   )) !!} 
					 </div> 
					 <div class="col-md-2">
					 	
					 </div>
				  </div> 					
				  <div class="form-group  " > 
					<label for="Ocupacion" class=" control-label col-md-4 text-left"> 
					{!! SiteHelpers::activeLang('Ocupacion', (isset($fields['ocupacion']['language'])? $fields['ocupacion']['language'] : array())) !!}	
					</label>
					<div class="col-md-6">
					  {!! Form::text('ocupacion', $row['ocupacion'],array('class'=>'form-control', 'placeholder'=>'',   )) !!} 
					 </div> 
					 <div class="col-md-2">
					 	
					 </div>
				  </div> 					
				  <div class="form-group  " > 
					<label for="Empresa" class=" control-label col-md-4 text-left"> 
					{!! SiteHelpers::activeLang('Empresa', (isset($fields['empresa']['language'])? $fields['empresa']['language'] : array())) !!}	
					</label>
					<div class="col-md-6">
					  {!! Form::text('empresa', $row['empresa'],array('class'=>'form-control', 'placeholder'=>'',   )) !!} 
					 </div> 
					 <div class="col-md-2">
					 	
					 </div>
				  </div> 					
				  <div class="form-group  " > 
					<label for="Cargo" class=" control-label col-md-4 text-left"> 
					{!! SiteHelpers::activeLang('Cargo', (isset($fields['cargo']['language'])? $fields['cargo']['language'] : array())) !!}	
					</label>
					<div class="col-md-6">
					  {!! Form::text('cargo', $row['cargo'],array('class'=>'form-control', 'placeholder'=>'',   )) !!} 
					 </div> 
					 <div class="col-md-2">
					 	
					 </div>
				  </div> 					
				  <div class="form-group  " > 
					<label for="ComoSeEntero" class=" control-label col-md-4 text-left"> 
					{!! SiteHelpers::activeLang('ComoSeEntero', (isset($fields['comoSeEntero']['language'])? $fields['comoSeEntero']['language'] : array())) !!}	
					</label>
					<div class="col-md-6">
					  {!! Form::text('comoSeEntero', $row['comoSeEntero'],array('class'=>'form-control', 'placeholder'=>'',   )) !!} 
					 </div> 
					 <div class="col-md-2">
					 	
					 </div>
				  </div> 					
				  <div class="form-group  " > 
					<label for="ComoSeEnteroDesc" class=" control-label col-md-4 text-left"> 
					{!! SiteHelpers::activeLang('ComoSeEnteroDesc', (isset($fields['comoSeEnteroDesc']['language'])? $fields['comoSeEnteroDesc']['language'] : array())) !!}	
					</label>
					<div class="col-md-6">
					  {!! Form::text('comoSeEnteroDesc', $row['comoSeEnteroDesc'],array('class'=>'form-control', 'placeholder'=>'',   )) !!} 
					 </div> 
					 <div class="col-md-2">
					 	
					 </div>
				  </div> 					
				  <div class="form-group  " > 
					<label for="CopiaCedula" class=" control-label col-md-4 text-left"> 
					{!! SiteHelpers::activeLang('CopiaCedula', (isset($fields['copiaCedula']['language'])? $fields['copiaCedula']['language'] : array())) !!}	
					</label>
					<div class="col-md-6">
					  {!! Form::text('copiaCedula', $row['copiaCedula'],array('class'=>'form-control', 'placeholder'=>'',   )) !!} 
					 </div> 
					 <div class="col-md-2">
					 	
					 </div>
				  </div> 					
				  <div class="form-group  " > 
					<label for="EPS" class=" control-label col-md-4 text-left"> 
					{!! SiteHelpers::activeLang('EPS', (isset($fields['EPS']['language'])? $fields['EPS']['language'] : array())) !!}	
					</label>
					<div class="col-md-6">
					  {!! Form::text('EPS', $row['EPS'],array('class'=>'form-control', 'placeholder'=>'',   )) !!} 
					 </div> 
					 <div class="col-md-2">
					 	
					 </div>
				  </div> 					
				  <div class="form-group  " > 
					<label for="ARP" class=" control-label col-md-4 text-left"> 
					{!! SiteHelpers::activeLang('ARP', (isset($fields['ARP']['language'])? $fields['ARP']['language'] : array())) !!}	
					</label>
					<div class="col-md-6">
					  {!! Form::text('ARP', $row['ARP'],array('class'=>'form-control', 'placeholder'=>'',   )) !!} 
					 </div> 
					 <div class="col-md-2">
					 	
					 </div>
				  </div> 					
				  <div class="form-group  " > 
					<label for="Prepagada" class=" control-label col-md-4 text-left"> 
					{!! SiteHelpers::activeLang('Prepagada', (isset($fields['prepagada']['language'])? $fields['prepagada']['language'] : array())) !!}	
					</label>
					<div class="col-md-6">
					  {!! Form::text('prepagada', $row['prepagada'],array('class'=>'form-control', 'placeholder'=>'',   )) !!} 
					 </div> 
					 <div class="col-md-2">
					 	
					 </div>
				  </div> 					
				  <div class="form-group  " > 
					<label for="MenorDeEdad" class=" control-label col-md-4 text-left"> 
					{!! SiteHelpers::activeLang('MenorDeEdad', (isset($fields['menorDeEdad']['language'])? $fields['menorDeEdad']['language'] : array())) !!}	
					</label>
					<div class="col-md-6">
					  {!! Form::text('menorDeEdad', $row['menorDeEdad'],array('class'=>'form-control', 'placeholder'=>'',   )) !!} 
					 </div> 
					 <div class="col-md-2">
					 	
					 </div>
				  </div> 					
				  <div class="form-group  " > 
					<label for="AcudienteResponsable" class=" control-label col-md-4 text-left"> 
					{!! SiteHelpers::activeLang('AcudienteResponsable', (isset($fields['acudienteResponsable']['language'])? $fields['acudienteResponsable']['language'] : array())) !!}	
					</label>
					<div class="col-md-6">
					  {!! Form::text('acudienteResponsable', $row['acudienteResponsable'],array('class'=>'form-control', 'placeholder'=>'',   )) !!} 
					 </div> 
					 <div class="col-md-2">
					 	
					 </div>
				  </div> 					
				  <div class="form-group  " > 
					<label for="Acompanante" class=" control-label col-md-4 text-left"> 
					{!! SiteHelpers::activeLang('Acompanante', (isset($fields['acompanante']['language'])? $fields['acompanante']['language'] : array())) !!}	
					</label>
					<div class="col-md-6">
					  {!! Form::text('acompanante', $row['acompanante'],array('class'=>'form-control', 'placeholder'=>'',   )) !!} 
					 </div> 
					 <div class="col-md-2">
					 	
					 </div>
				  </div> 					
				  <div class="form-group  " > 
					<label for="OrigenEnfermedad" class=" control-label col-md-4 text-left"> 
					{!! SiteHelpers::activeLang('OrigenEnfermedad', (isset($fields['origenEnfermedad']['language'])? $fields['origenEnfermedad']['language'] : array())) !!}	
					</label>
					<div class="col-md-6">
					  {!! Form::text('origenEnfermedad', $row['origenEnfermedad'],array('class'=>'form-control', 'placeholder'=>'',   )) !!} 
					 </div> 
					 <div class="col-md-2">
					 	
					 </div>
				  </div> 					
				  <div class="form-group  " > 
					<label for="ContactoNombre" class=" control-label col-md-4 text-left"> 
					{!! SiteHelpers::activeLang('ContactoNombre', (isset($fields['contactoNombre']['language'])? $fields['contactoNombre']['language'] : array())) !!}	
					</label>
					<div class="col-md-6">
					  {!! Form::text('contactoNombre', $row['contactoNombre'],array('class'=>'form-control', 'placeholder'=>'',   )) !!} 
					 </div> 
					 <div class="col-md-2">
					 	
					 </div>
				  </div> 					
				  <div class="form-group  " > 
					<label for="ContactoRelacion" class=" control-label col-md-4 text-left"> 
					{!! SiteHelpers::activeLang('ContactoRelacion', (isset($fields['contactoRelacion']['language'])? $fields['contactoRelacion']['language'] : array())) !!}	
					</label>
					<div class="col-md-6">
					  {!! Form::text('contactoRelacion', $row['contactoRelacion'],array('class'=>'form-control', 'placeholder'=>'',   )) !!} 
					 </div> 
					 <div class="col-md-2">
					 	
					 </div>
				  </div> 					
				  <div class="form-group  " > 
					<label for="ContactoTelefonoCasa" class=" control-label col-md-4 text-left"> 
					{!! SiteHelpers::activeLang('ContactoTelefonoCasa', (isset($fields['contactoTelefonoCasa']['language'])? $fields['contactoTelefonoCasa']['language'] : array())) !!}	
					</label>
					<div class="col-md-6">
					  {!! Form::text('contactoTelefonoCasa', $row['contactoTelefonoCasa'],array('class'=>'form-control', 'placeholder'=>'',   )) !!} 
					 </div> 
					 <div class="col-md-2">
					 	
					 </div>
				  </div> 					
				  <div class="form-group  " > 
					<label for="ContactoTelefonoTrabajo" class=" control-label col-md-4 text-left"> 
					{!! SiteHelpers::activeLang('ContactoTelefonoTrabajo', (isset($fields['contactoTelefonoTrabajo']['language'])? $fields['contactoTelefonoTrabajo']['language'] : array())) !!}	
					</label>
					<div class="col-md-6">
					  {!! Form::text('contactoTelefonoTrabajo', $row['contactoTelefonoTrabajo'],array('class'=>'form-control', 'placeholder'=>'',   )) !!} 
					 </div> 
					 <div class="col-md-2">
					 	
					 </div>
				  </div> 					
				  <div class="form-group  " > 
					<label for="ContactoCelular" class=" control-label col-md-4 text-left"> 
					{!! SiteHelpers::activeLang('ContactoCelular', (isset($fields['contactoCelular']['language'])? $fields['contactoCelular']['language'] : array())) !!}	
					</label>
					<div class="col-md-6">
					  {!! Form::text('contactoCelular', $row['contactoCelular'],array('class'=>'form-control', 'placeholder'=>'',   )) !!} 
					 </div> 
					 <div class="col-md-2">
					 	
					 </div>
				  </div> 					
				  <div class="form-group  " > 
					<label for="RevisionPor" class=" control-label col-md-4 text-left"> 
					{!! SiteHelpers::activeLang('RevisionPor', (isset($fields['revisionPor']['language'])? $fields['revisionPor']['language'] : array())) !!}	
					</label>
					<div class="col-md-6">
					  {!! Form::text('revisionPor', $row['revisionPor'],array('class'=>'form-control', 'placeholder'=>'',   )) !!} 
					 </div> 
					 <div class="col-md-2">
					 	
					 </div>
				  </div> 					
				  <div class="form-group  " > 
					<label for="Estado" class=" control-label col-md-4 text-left"> 
					{!! SiteHelpers::activeLang('Estado', (isset($fields['estado']['language'])? $fields['estado']['language'] : array())) !!}	
					</label>
					<div class="col-md-6">
					  {!! Form::text('estado', $row['estado'],array('class'=>'form-control', 'placeholder'=>'',   )) !!} 
					 </div> 
					 <div class="col-md-2">
					 	
					 </div>
				  </div> 					
				  <div class="form-group  " > 
					<label for="Foto" class=" control-label col-md-4 text-left"> 
					{!! SiteHelpers::activeLang('Foto', (isset($fields['foto']['language'])? $fields['foto']['language'] : array())) !!}	
					</label>
					<div class="col-md-6">
					  {!! Form::text('foto', $row['foto'],array('class'=>'form-control', 'placeholder'=>'',   )) !!} 
					 </div> 
					 <div class="col-md-2">
					 	
					 </div>
				  </div> 					
				  <div class="form-group  " > 
					<label for="EstadoCivil" class=" control-label col-md-4 text-left"> 
					{!! SiteHelpers::activeLang('EstadoCivil', (isset($fields['estadoCivil']['language'])? $fields['estadoCivil']['language'] : array())) !!}	
					</label>
					<div class="col-md-6">
					  {!! Form::text('estadoCivil', $row['estadoCivil'],array('class'=>'form-control', 'placeholder'=>'',   )) !!} 
					 </div> 
					 <div class="col-md-2">
					 	
					 </div>
				  </div> 					
				  <div class="form-group  " > 
					<label for="GrupoSanguineo" class=" control-label col-md-4 text-left"> 
					{!! SiteHelpers::activeLang('GrupoSanguineo', (isset($fields['grupoSanguineo']['language'])? $fields['grupoSanguineo']['language'] : array())) !!}	
					</label>
					<div class="col-md-6">
					  
					<?php $grupoSanguineo = explode(',',$row['grupoSanguineo']);
					$grupoSanguineo_opt = array( 'A' => '+' ,  'A' => '-' ,  'B' => '+' ,  'B' => '-' ,  'O' => '+' ,  'O' => '-' ,  'AB' => '+' ,  'AB' => '-' , ); ?>
					<select name='grupoSanguineo' rows='5' required  class='select2 '  > 
						<?php 
						foreach($grupoSanguineo_opt as $key=>$val)
						{
							echo "<option  value ='$key' ".($row['grupoSanguineo'] == $key ? " selected='selected' " : '' ).">$val</option>"; 						
						}						
						?></select> 
					 </div> 
					 <div class="col-md-2">
					 	
					 </div>
				  </div> 					
				  <div class="form-group hidethis " style="display:none;"> 
					<label for="RH" class=" control-label col-md-4 text-left"> 
					{!! SiteHelpers::activeLang('RH', (isset($fields['RH']['language'])? $fields['RH']['language'] : array())) !!}	
					</label>
					<div class="col-md-6">
					  {!! Form::text('RH', $row['RH'],array('class'=>'form-control', 'placeholder'=>'',   )) !!} 
					 </div> 
					 <div class="col-md-2">
					 	
					 </div>
				  </div> 					
				  <div class="form-group  " > 
					<label for="NombrePareja" class=" control-label col-md-4 text-left"> 
					{!! SiteHelpers::activeLang('NombrePareja', (isset($fields['nombrePareja']['language'])? $fields['nombrePareja']['language'] : array())) !!}	
					</label>
					<div class="col-md-6">
					  {!! Form::text('nombrePareja', $row['nombrePareja'],array('class'=>'form-control', 'placeholder'=>'',   )) !!} 
					 </div> 
					 <div class="col-md-2">
					 	
					 </div>
				  </div> 					
				  <div class="form-group  " > 
					<label for="EdadPareja" class=" control-label col-md-4 text-left"> 
					{!! SiteHelpers::activeLang('EdadPareja', (isset($fields['edadPareja']['language'])? $fields['edadPareja']['language'] : array())) !!}	
					</label>
					<div class="col-md-6">
					  {!! Form::text('edadPareja', $row['edadPareja'],array('class'=>'form-control', 'placeholder'=>'',   )) !!} 
					 </div> 
					 <div class="col-md-2">
					 	
					 </div>
				  </div> 					
				  <div class="form-group  " > 
					<label for="OficioPareja" class=" control-label col-md-4 text-left"> 
					{!! SiteHelpers::activeLang('OficioPareja', (isset($fields['oficioPareja']['language'])? $fields['oficioPareja']['language'] : array())) !!}	
					</label>
					<div class="col-md-6">
					  {!! Form::text('oficioPareja', $row['oficioPareja'],array('class'=>'form-control', 'placeholder'=>'',   )) !!} 
					 </div> 
					 <div class="col-md-2">
					 	
					 </div>
				  </div> 					
				  <div class="form-group  " > 
					<label for="TipoPaciente" class=" control-label col-md-4 text-left"> 
					{!! SiteHelpers::activeLang('TipoPaciente', (isset($fields['tipoPaciente']['language'])? $fields['tipoPaciente']['language'] : array())) !!}	
					</label>
					<div class="col-md-6">
					  {!! Form::text('tipoPaciente', $row['tipoPaciente'],array('class'=>'form-control', 'placeholder'=>'',   )) !!} 
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
					<button type="button" onclick="location.href='{{ URL::to('paciente', $id) }}' " class="btn btn-success btn-sm "><i class="fa  fa-arrow-circle-left "></i>  {{ Lang::get('core.sb_cancel') }} </button>
					</div>	  
			
				  </div> 
		 
		 {!! Form::close() !!}
	</div>
</div>		 
</div>	
</div>			 
   <script type="text/javascript">
	$(document).ready(function() { 
		
		 

		$('.removeCurrentFiles').on('click',function(){
			var removeUrl = $(this).attr('href');
			$.get(removeUrl,function(response){});
			$(this).parent('div').empty();	
			return false;
		});		
		
	});
	</script>		 
@stop