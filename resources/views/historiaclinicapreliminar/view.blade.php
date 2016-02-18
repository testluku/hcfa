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
		<li><a href="{{ URL::to('historiaclinicapreliminar?return='.$return) }}">{{ $pageTitle }}</a></li>
        <li class="active"> {{ Lang::get('core.detail') }} </li>
      </ul>
	 </div>  
	 
	 
 	<div class="page-content-wrapper">   
	   <div class="toolbar-line">
	   		<a href="{{ URL::to('historiaclinicapreliminar?return='.$return) }}" class="tips btn btn-xs btn-default" title="{{ Lang::get('core.btn_back') }}"><i class="fa fa-arrow-circle-left"></i>&nbsp;{{ Lang::get('core.btn_back') }}</a>
			@if($access['is_add'] ==1)
	   		<a href="{{ URL::to('historiaclinicapreliminar/update/'.$id.'?return='.$return) }}" class="tips btn btn-xs btn-primary" title="{{ Lang::get('core.btn_edit') }}"><i class="fa fa-edit"></i>&nbsp;{{ Lang::get('core.btn_edit') }}</a>
			@endif  		   	  
		</div>
<div class="sbox animated fadeInRight">
	<div class="sbox-title"> <h4> <i class="fa fa-table"></i> </h4></div>
	<div class="sbox-content"> 	


	
	<table class="table table-striped table-bordered" >
		<tbody>	
	
					<tr>
						<td width='30%' class='label-view text-right'>
							{{ SiteHelpers::activeLang('IdHistoriaClinicaPreliminar', (isset($fields['idHistoriaClinicaPreliminar']['language'])? $fields['idHistoriaClinicaPreliminar']['language'] : array())) }}	
						</td>
						<td>{{ $row->idHistoriaClinicaPreliminar }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>
							{{ SiteHelpers::activeLang('IdPaciente', (isset($fields['idPaciente']['language'])? $fields['idPaciente']['language'] : array())) }}	
						</td>
						<td>{{ $row->idPaciente }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>
							{{ SiteHelpers::activeLang('Fecha', (isset($fields['fecha']['language'])? $fields['fecha']['language'] : array())) }}	
						</td>
						<td>{{ $row->fecha }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>
							{{ SiteHelpers::activeLang('SecuelasPrevias', (isset($fields['secuelasPrevias']['language'])? $fields['secuelasPrevias']['language'] : array())) }}	
						</td>
						<td>{{ $row->secuelasPrevias }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>
							{{ SiteHelpers::activeLang('MejorarContornoCorporal', (isset($fields['mejorarContornoCorporal']['language'])? $fields['mejorarContornoCorporal']['language'] : array())) }}	
						</td>
						<td>{{ $row->mejorarContornoCorporal }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>
							{{ SiteHelpers::activeLang('MejorarFlacidezAbdomen', (isset($fields['mejorarFlacidezAbdomen']['language'])? $fields['mejorarFlacidezAbdomen']['language'] : array())) }}	
						</td>
						<td>{{ $row->mejorarFlacidezAbdomen }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>
							{{ SiteHelpers::activeLang('AumentarProyeccionGluteos', (isset($fields['aumentarProyeccionGluteos']['language'])? $fields['aumentarProyeccionGluteos']['language'] : array())) }}	
						</td>
						<td>{{ $row->aumentarProyeccionGluteos }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>
							{{ SiteHelpers::activeLang('MejorarCicatrizLipectomia', (isset($fields['mejorarCicatrizLipectomia']['language'])? $fields['mejorarCicatrizLipectomia']['language'] : array())) }}	
						</td>
						<td>{{ $row->mejorarCicatrizLipectomia }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>
							{{ SiteHelpers::activeLang('MejorarCelulitis', (isset($fields['mejorarCelulitis']['language'])? $fields['mejorarCelulitis']['language'] : array())) }}	
						</td>
						<td>{{ $row->mejorarCelulitis }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>
							{{ SiteHelpers::activeLang('DisminuirEstriasAbdomen', (isset($fields['disminuirEstriasAbdomen']['language'])? $fields['disminuirEstriasAbdomen']['language'] : array())) }}	
						</td>
						<td>{{ $row->disminuirEstriasAbdomen }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>
							{{ SiteHelpers::activeLang('DeseaTenerHijos', (isset($fields['deseaTenerHijos']['language'])? $fields['deseaTenerHijos']['language'] : array())) }}	
						</td>
						<td>{{ $row->deseaTenerHijos }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>
							{{ SiteHelpers::activeLang('MejorarAspectoOrejas', (isset($fields['mejorarAspectoOrejas']['language'])? $fields['mejorarAspectoOrejas']['language'] : array())) }}	
						</td>
						<td>{{ $row->mejorarAspectoOrejas }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>
							{{ SiteHelpers::activeLang('AreasMayorInteres', (isset($fields['areasMayorInteres']['language'])? $fields['areasMayorInteres']['language'] : array())) }}	
						</td>
						<td>{{ $row->areasMayorInteres }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>
							{{ SiteHelpers::activeLang('MejorarPigmentacionCara', (isset($fields['mejorarPigmentacionCara']['language'])? $fields['mejorarPigmentacionCara']['language'] : array())) }}	
						</td>
						<td>{{ $row->mejorarPigmentacionCara }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>
							{{ SiteHelpers::activeLang('DisminuirSurcosNasogenianos', (isset($fields['disminuirSurcosNasogenianos']['language'])? $fields['disminuirSurcosNasogenianos']['language'] : array())) }}	
						</td>
						<td>{{ $row->disminuirSurcosNasogenianos }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>
							{{ SiteHelpers::activeLang('DisminuirSurcosMarioneta', (isset($fields['disminuirSurcosMarioneta']['language'])? $fields['disminuirSurcosMarioneta']['language'] : array())) }}	
						</td>
						<td>{{ $row->disminuirSurcosMarioneta }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>
							{{ SiteHelpers::activeLang('DisminuisLineasExpresion', (isset($fields['disminuisLineasExpresion']['language'])? $fields['disminuisLineasExpresion']['language'] : array())) }}	
						</td>
						<td>{{ $row->disminuisLineasExpresion }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>
							{{ SiteHelpers::activeLang('PatasGallina', (isset($fields['patasGallina']['language'])? $fields['patasGallina']['language'] : array())) }}	
						</td>
						<td>{{ $row->patasGallina }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>
							{{ SiteHelpers::activeLang('Frente', (isset($fields['frente']['language'])? $fields['frente']['language'] : array())) }}	
						</td>
						<td>{{ $row->frente }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>
							{{ SiteHelpers::activeLang('Ceno', (isset($fields['ceno']['language'])? $fields['ceno']['language'] : array())) }}	
						</td>
						<td>{{ $row->ceno }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>
							{{ SiteHelpers::activeLang('SecuelasAcne', (isset($fields['secuelasAcne']['language'])? $fields['secuelasAcne']['language'] : array())) }}	
						</td>
						<td>{{ $row->secuelasAcne }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>
							{{ SiteHelpers::activeLang('MejorarPielCara', (isset($fields['mejorarPielCara']['language'])? $fields['mejorarPielCara']['language'] : array())) }}	
						</td>
						<td>{{ $row->mejorarPielCara }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>
							{{ SiteHelpers::activeLang('MejorarFlacidezCuello', (isset($fields['mejorarFlacidezCuello']['language'])? $fields['mejorarFlacidezCuello']['language'] : array())) }}	
						</td>
						<td>{{ $row->mejorarFlacidezCuello }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>
							{{ SiteHelpers::activeLang('DepilacionLaser', (isset($fields['depilacionLaser']['language'])? $fields['depilacionLaser']['language'] : array())) }}	
						</td>
						<td>{{ $row->depilacionLaser }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>
							{{ SiteHelpers::activeLang('MejorarRitidesLabioS', (isset($fields['mejorarRitidesLabioS']['language'])? $fields['mejorarRitidesLabioS']['language'] : array())) }}	
						</td>
						<td>{{ $row->mejorarRitidesLabioS }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>
							{{ SiteHelpers::activeLang('MejorarPigmentacionSurcosN', (isset($fields['mejorarPigmentacionSurcosN']['language'])? $fields['mejorarPigmentacionSurcosN']['language'] : array())) }}	
						</td>
						<td>{{ $row->mejorarPigmentacionSurcosN }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>
							{{ SiteHelpers::activeLang('MejorarArrugasParpadoI', (isset($fields['mejorarArrugasParpadoI']['language'])? $fields['mejorarArrugasParpadoI']['language'] : array())) }}	
						</td>
						<td>{{ $row->mejorarArrugasParpadoI }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>
							{{ SiteHelpers::activeLang('MejorarEntrecejo', (isset($fields['mejorarEntrecejo']['language'])? $fields['mejorarEntrecejo']['language'] : array())) }}	
						</td>
						<td>{{ $row->mejorarEntrecejo }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>
							{{ SiteHelpers::activeLang('MejorarCodigoBarras', (isset($fields['mejorarCodigoBarras']['language'])? $fields['mejorarCodigoBarras']['language'] : array())) }}	
						</td>
						<td>{{ $row->mejorarCodigoBarras }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>
							{{ SiteHelpers::activeLang('CorregirManchasCara', (isset($fields['corregirManchasCara']['language'])? $fields['corregirManchasCara']['language'] : array())) }}	
						</td>
						<td>{{ $row->corregirManchasCara }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>
							{{ SiteHelpers::activeLang('RevisionPorSistemas', (isset($fields['revisionPorSistemas']['language'])? $fields['revisionPorSistemas']['language'] : array())) }}	
						</td>
						<td>{{ $row->revisionPorSistemas }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>
							{{ SiteHelpers::activeLang('AumentarSenos', (isset($fields['aumentarSenos']['language'])? $fields['aumentarSenos']['language'] : array())) }}	
						</td>
						<td>{{ $row->aumentarSenos }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>
							{{ SiteHelpers::activeLang('DisminuirSenos', (isset($fields['disminuirSenos']['language'])? $fields['disminuirSenos']['language'] : array())) }}	
						</td>
						<td>{{ $row->disminuirSenos }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>
							{{ SiteHelpers::activeLang('LevantamientoSenos', (isset($fields['levantamientoSenos']['language'])? $fields['levantamientoSenos']['language'] : array())) }}	
						</td>
						<td>{{ $row->levantamientoSenos }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>
							{{ SiteHelpers::activeLang('CambiarImplantesSenos', (isset($fields['cambiarImplantesSenos']['language'])? $fields['cambiarImplantesSenos']['language'] : array())) }}	
						</td>
						<td>{{ $row->cambiarImplantesSenos }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>
							{{ SiteHelpers::activeLang('MejorarCicatricesMamoplastia', (isset($fields['mejorarCicatricesMamoplastia']['language'])? $fields['mejorarCicatricesMamoplastia']['language'] : array())) }}	
						</td>
						<td>{{ $row->mejorarCicatricesMamoplastia }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>
							{{ SiteHelpers::activeLang('TallaAproximadaDesea', (isset($fields['tallaAproximadaDesea']['language'])? $fields['tallaAproximadaDesea']['language'] : array())) }}	
						</td>
						<td>{{ $row->tallaAproximadaDesea }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>
							{{ SiteHelpers::activeLang('EnfermedadActual', (isset($fields['enfermedadActual']['language'])? $fields['enfermedadActual']['language'] : array())) }}	
						</td>
						<td>{{ $row->enfermedadActual }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>
							{{ SiteHelpers::activeLang('ReseccionNevusCara', (isset($fields['reseccionNevusCara']['language'])? $fields['reseccionNevusCara']['language'] : array())) }}	
						</td>
						<td>{{ $row->reseccionNevusCara }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>
							{{ SiteHelpers::activeLang('ReseccionNevusCuerpo', (isset($fields['reseccionNevusCuerpo']['language'])? $fields['reseccionNevusCuerpo']['language'] : array())) }}	
						</td>
						<td>{{ $row->reseccionNevusCuerpo }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>
							{{ SiteHelpers::activeLang('CorregirLobulosHendidos', (isset($fields['corregirLobulosHendidos']['language'])? $fields['corregirLobulosHendidos']['language'] : array())) }}	
						</td>
						<td>{{ $row->corregirLobulosHendidos }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>
							{{ SiteHelpers::activeLang('MejorarCalidadCicatriz', (isset($fields['mejorarCalidadCicatriz']['language'])? $fields['mejorarCalidadCicatriz']['language'] : array())) }}	
						</td>
						<td>{{ $row->mejorarCalidadCicatriz }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>
							{{ SiteHelpers::activeLang('BrochureTNQ', (isset($fields['brochureTNQ']['language'])? $fields['brochureTNQ']['language'] : array())) }}	
						</td>
						<td>{{ $row->brochureTNQ }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>
							{{ SiteHelpers::activeLang('Otros', (isset($fields['otros']['language'])? $fields['otros']['language'] : array())) }}	
						</td>
						<td>{{ $row->otros }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>
							{{ SiteHelpers::activeLang('Observaciones', (isset($fields['observaciones']['language'])? $fields['observaciones']['language'] : array())) }}	
						</td>
						<td>{{ $row->observaciones }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>
							{{ SiteHelpers::activeLang('MejorarCicatrizAbdomen', (isset($fields['mejorarCicatrizAbdomen']['language'])? $fields['mejorarCicatrizAbdomen']['language'] : array())) }}	
						</td>
						<td>{{ $row->mejorarCicatrizAbdomen }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>
							{{ SiteHelpers::activeLang('MejorarCicatrizCara', (isset($fields['mejorarCicatrizCara']['language'])? $fields['mejorarCicatrizCara']['language'] : array())) }}	
						</td>
						<td>{{ $row->mejorarCicatrizCara }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>
							{{ SiteHelpers::activeLang('ReseccionNevusComentario', (isset($fields['reseccionNevusComentario']['language'])? $fields['reseccionNevusComentario']['language'] : array())) }}	
						</td>
						<td>{{ $row->reseccionNevusComentario }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>
							{{ SiteHelpers::activeLang('ImagenesAportadas', (isset($fields['imagenesAportadas']['language'])? $fields['imagenesAportadas']['language'] : array())) }}	
						</td>
						<td>{{ $row->imagenesAportadas }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>
							{{ SiteHelpers::activeLang('ExcesoPielParpadoSuperior', (isset($fields['excesoPielParpadoSuperior']['language'])? $fields['excesoPielParpadoSuperior']['language'] : array())) }}	
						</td>
						<td>{{ $row->excesoPielParpadoSuperior }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>
							{{ SiteHelpers::activeLang('BolsasParpadoInferior', (isset($fields['bolsasParpadoInferior']['language'])? $fields['bolsasParpadoInferior']['language'] : array())) }}	
						</td>
						<td>{{ $row->bolsasParpadoInferior }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>
							{{ SiteHelpers::activeLang('FlacidezParpadoInferior', (isset($fields['flacidezParpadoInferior']['language'])? $fields['flacidezParpadoInferior']['language'] : array())) }}	
						</td>
						<td>{{ $row->flacidezParpadoInferior }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>
							{{ SiteHelpers::activeLang('MejorarLineasExpresion', (isset($fields['mejorarLineasExpresion']['language'])? $fields['mejorarLineasExpresion']['language'] : array())) }}	
						</td>
						<td>{{ $row->mejorarLineasExpresion }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>
							{{ SiteHelpers::activeLang('ElevarCejas', (isset($fields['elevarCejas']['language'])? $fields['elevarCejas']['language'] : array())) }}	
						</td>
						<td>{{ $row->elevarCejas }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>
							{{ SiteHelpers::activeLang('AumentarProyeccionMenton', (isset($fields['aumentarProyeccionMenton']['language'])? $fields['aumentarProyeccionMenton']['language'] : array())) }}	
						</td>
						<td>{{ $row->aumentarProyeccionMenton }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>
							{{ SiteHelpers::activeLang('MejorarEsteticaNariz', (isset($fields['mejorarEsteticaNariz']['language'])? $fields['mejorarEsteticaNariz']['language'] : array())) }}	
						</td>
						<td>{{ $row->mejorarEsteticaNariz }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>
							{{ SiteHelpers::activeLang('MejorarSecuelasRino', (isset($fields['mejorarSecuelasRino']['language'])? $fields['mejorarSecuelasRino']['language'] : array())) }}	
						</td>
						<td>{{ $row->mejorarSecuelasRino }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>
							{{ SiteHelpers::activeLang('MejorarCuadroObstructivo', (isset($fields['mejorarCuadroObstructivo']['language'])? $fields['mejorarCuadroObstructivo']['language'] : array())) }}	
						</td>
						<td>{{ $row->mejorarCuadroObstructivo }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>
							{{ SiteHelpers::activeLang('RespiraBien', (isset($fields['respiraBien']['language'])? $fields['respiraBien']['language'] : array())) }}	
						</td>
						<td>{{ $row->respiraBien }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>
							{{ SiteHelpers::activeLang('RespiraMal', (isset($fields['respiraMal']['language'])? $fields['respiraMal']['language'] : array())) }}	
						</td>
						<td>{{ $row->respiraMal }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>
							{{ SiteHelpers::activeLang('FND', (isset($fields['FND']['language'])? $fields['FND']['language'] : array())) }}	
						</td>
						<td>{{ $row->FND }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>
							{{ SiteHelpers::activeLang('FNI', (isset($fields['FNI']['language'])? $fields['FNI']['language'] : array())) }}	
						</td>
						<td>{{ $row->FNI }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>
							{{ SiteHelpers::activeLang('Ambas', (isset($fields['ambas']['language'])? $fields['ambas']['language'] : array())) }}	
						</td>
						<td>{{ $row->ambas }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>
							{{ SiteHelpers::activeLang('AbdomenColgante', (isset($fields['abdomenColgante']['language'])? $fields['abdomenColgante']['language'] : array())) }}	
						</td>
						<td>{{ $row->abdomenColgante }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>
							{{ SiteHelpers::activeLang('FlacidezAbdominal', (isset($fields['flacidezAbdominal']['language'])? $fields['flacidezAbdominal']['language'] : array())) }}	
						</td>
						<td>{{ $row->flacidezAbdominal }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>
							{{ SiteHelpers::activeLang('StriaeDistensae', (isset($fields['striaeDistensae']['language'])? $fields['striaeDistensae']['language'] : array())) }}	
						</td>
						<td>{{ $row->striaeDistensae }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>
							{{ SiteHelpers::activeLang('DiastasisRectos', (isset($fields['diastasisRectos']['language'])? $fields['diastasisRectos']['language'] : array())) }}	
						</td>
						<td>{{ $row->diastasisRectos }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>
							{{ SiteHelpers::activeLang('Gigantomastia', (isset($fields['gigantomastia']['language'])? $fields['gigantomastia']['language'] : array())) }}	
						</td>
						<td>{{ $row->gigantomastia }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>
							{{ SiteHelpers::activeLang('TamanoSenos', (isset($fields['tamanoSenos']['language'])? $fields['tamanoSenos']['language'] : array())) }}	
						</td>
						<td>{{ $row->tamanoSenos }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>
							{{ SiteHelpers::activeLang('Ptosis', (isset($fields['ptosis']['language'])? $fields['ptosis']['language'] : array())) }}	
						</td>
						<td>{{ $row->ptosis }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>
							{{ SiteHelpers::activeLang('AsimetriaFormaTamano', (isset($fields['asimetriaFormaTamano']['language'])? $fields['asimetriaFormaTamano']['language'] : array())) }}	
						</td>
						<td>{{ $row->asimetriaFormaTamano }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>
							{{ SiteHelpers::activeLang('AcumulacionGrasa', (isset($fields['acumulacionGrasa']['language'])? $fields['acumulacionGrasa']['language'] : array())) }}	
						</td>
						<td>{{ $row->acumulacionGrasa }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>
							{{ SiteHelpers::activeLang('Celulitis', (isset($fields['celulitis']['language'])? $fields['celulitis']['language'] : array())) }}	
						</td>
						<td>{{ $row->celulitis }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>
							{{ SiteHelpers::activeLang('FlacidezEnfrenteA', (isset($fields['flacidezEnfrenteA']['language'])? $fields['flacidezEnfrenteA']['language'] : array())) }}	
						</td>
						<td>{{ $row->flacidezEnfrenteA }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>
							{{ SiteHelpers::activeLang('BlefachalasisPS', (isset($fields['blefachalasisPS']['language'])? $fields['blefachalasisPS']['language'] : array())) }}	
						</td>
						<td>{{ $row->blefachalasisPS }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>
							{{ SiteHelpers::activeLang('CojinesAdipososPS', (isset($fields['cojinesAdipososPS']['language'])? $fields['cojinesAdipososPS']['language'] : array())) }}	
						</td>
						<td>{{ $row->cojinesAdipososPS }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>
							{{ SiteHelpers::activeLang('BlefachalasisPI', (isset($fields['blefachalasisPI']['language'])? $fields['blefachalasisPI']['language'] : array())) }}	
						</td>
						<td>{{ $row->blefachalasisPI }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>
							{{ SiteHelpers::activeLang('CojinesAdipososPI', (isset($fields['cojinesAdipososPI']['language'])? $fields['cojinesAdipososPI']['language'] : array())) }}	
						</td>
						<td>{{ $row->cojinesAdipososPI }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>
							{{ SiteHelpers::activeLang('Asimetria', (isset($fields['asimetria']['language'])? $fields['asimetria']['language'] : array())) }}	
						</td>
						<td>{{ $row->asimetria }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>
							{{ SiteHelpers::activeLang('OjerasHiperpigmentadas', (isset($fields['ojerasHiperpigmentadas']['language'])? $fields['ojerasHiperpigmentadas']['language'] : array())) }}	
						</td>
						<td>{{ $row->ojerasHiperpigmentadas }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>
							{{ SiteHelpers::activeLang('SurcoNasoyugalPronunciado', (isset($fields['surcoNasoyugalPronunciado']['language'])? $fields['surcoNasoyugalPronunciado']['language'] : array())) }}	
						</td>
						<td>{{ $row->surcoNasoyugalPronunciado }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>
							{{ SiteHelpers::activeLang('FlacidezTarsal', (isset($fields['flacidezTarsal']['language'])? $fields['flacidezTarsal']['language'] : array())) }}	
						</td>
						<td>{{ $row->flacidezTarsal }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>
							{{ SiteHelpers::activeLang('SecuelasAcneMotivoC', (isset($fields['secuelasAcneMotivoC']['language'])? $fields['secuelasAcneMotivoC']['language'] : array())) }}	
						</td>
						<td>{{ $row->secuelasAcneMotivoC }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>
							{{ SiteHelpers::activeLang('GibaOsteocartilaginosa', (isset($fields['gibaOsteocartilaginosa']['language'])? $fields['gibaOsteocartilaginosa']['language'] : array())) }}	
						</td>
						<td>{{ $row->gibaOsteocartilaginosa }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>
							{{ SiteHelpers::activeLang('Laterorinia', (isset($fields['laterorinia']['language'])? $fields['laterorinia']['language'] : array())) }}	
						</td>
						<td>{{ $row->laterorinia }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>
							{{ SiteHelpers::activeLang('MalaDefinicionPunta', (isset($fields['malaDefinicionPunta']['language'])? $fields['malaDefinicionPunta']['language'] : array())) }}	
						</td>
						<td>{{ $row->malaDefinicionPunta }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>
							{{ SiteHelpers::activeLang('MalaProyeccionPunta', (isset($fields['malaProyeccionPunta']['language'])? $fields['malaProyeccionPunta']['language'] : array())) }}	
						</td>
						<td>{{ $row->malaProyeccionPunta }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>
							{{ SiteHelpers::activeLang('PtosisPunta', (isset($fields['ptosisPunta']['language'])? $fields['ptosisPunta']['language'] : array())) }}	
						</td>
						<td>{{ $row->ptosisPunta }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>
							{{ SiteHelpers::activeLang('AsimetriaPunta', (isset($fields['asimetriaPunta']['language'])? $fields['asimetriaPunta']['language'] : array())) }}	
						</td>
						<td>{{ $row->asimetriaPunta }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>
							{{ SiteHelpers::activeLang('PielGruesa', (isset($fields['pielGruesa']['language'])? $fields['pielGruesa']['language'] : array())) }}	
						</td>
						<td>{{ $row->pielGruesa }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>
							{{ SiteHelpers::activeLang('AlasGruesas', (isset($fields['alasGruesas']['language'])? $fields['alasGruesas']['language'] : array())) }}	
						</td>
						<td>{{ $row->alasGruesas }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>
							{{ SiteHelpers::activeLang('FosasAmplias', (isset($fields['fosasAmplias']['language'])? $fields['fosasAmplias']['language'] : array())) }}	
						</td>
						<td>{{ $row->fosasAmplias }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>
							{{ SiteHelpers::activeLang('AsimetriaFosasNasales', (isset($fields['asimetriaFosasNasales']['language'])? $fields['asimetriaFosasNasales']['language'] : array())) }}	
						</td>
						<td>{{ $row->asimetriaFosasNasales }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>
							{{ SiteHelpers::activeLang('DeflexionSeptal', (isset($fields['deflexionSeptal']['language'])? $fields['deflexionSeptal']['language'] : array())) }}	
						</td>
						<td>{{ $row->deflexionSeptal }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>
							{{ SiteHelpers::activeLang('HipertrofiaCornetes', (isset($fields['hipertrofiaCornetes']['language'])? $fields['hipertrofiaCornetes']['language'] : array())) }}	
						</td>
						<td>{{ $row->hipertrofiaCornetes }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>
							{{ SiteHelpers::activeLang('HipoplasiaMenton', (isset($fields['hipoplasiaMenton']['language'])? $fields['hipoplasiaMenton']['language'] : array())) }}	
						</td>
						<td>{{ $row->hipoplasiaMenton }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>
							{{ SiteHelpers::activeLang('LineaExpresionPronunciadas', (isset($fields['lineaExpresionPronunciadas']['language'])? $fields['lineaExpresionPronunciadas']['language'] : array())) }}	
						</td>
						<td>{{ $row->lineaExpresionPronunciadas }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>
							{{ SiteHelpers::activeLang('Fotodano', (isset($fields['fotodano']['language'])? $fields['fotodano']['language'] : array())) }}	
						</td>
						<td>{{ $row->fotodano }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>
							{{ SiteHelpers::activeLang('ProtesisColaCeja', (isset($fields['protesisColaCeja']['language'])? $fields['protesisColaCeja']['language'] : array())) }}	
						</td>
						<td>{{ $row->protesisColaCeja }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>
							{{ SiteHelpers::activeLang('CojinMalar', (isset($fields['cojinMalar']['language'])? $fields['cojinMalar']['language'] : array())) }}	
						</td>
						<td>{{ $row->cojinMalar }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>
							{{ SiteHelpers::activeLang('FlacidezCara', (isset($fields['flacidezCara']['language'])? $fields['flacidezCara']['language'] : array())) }}	
						</td>
						<td>{{ $row->flacidezCara }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>
							{{ SiteHelpers::activeLang('FlacidezCuello', (isset($fields['flacidezCuello']['language'])? $fields['flacidezCuello']['language'] : array())) }}	
						</td>
						<td>{{ $row->flacidezCuello }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>
							{{ SiteHelpers::activeLang('JowlsPronunciados', (isset($fields['jowlsPronunciados']['language'])? $fields['jowlsPronunciados']['language'] : array())) }}	
						</td>
						<td>{{ $row->jowlsPronunciados }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>
							{{ SiteHelpers::activeLang('SurcosNasogenianos', (isset($fields['surcosNasogenianos']['language'])? $fields['surcosNasogenianos']['language'] : array())) }}	
						</td>
						<td>{{ $row->surcosNasogenianos }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>
							{{ SiteHelpers::activeLang('SurcosMarioneta', (isset($fields['surcosMarioneta']['language'])? $fields['surcosMarioneta']['language'] : array())) }}	
						</td>
						<td>{{ $row->surcosMarioneta }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>
							{{ SiteHelpers::activeLang('CodigoBarrasLabios', (isset($fields['codigoBarrasLabios']['language'])? $fields['codigoBarrasLabios']['language'] : array())) }}	
						</td>
						<td>{{ $row->codigoBarrasLabios }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>
							{{ SiteHelpers::activeLang('HiperpigmentacionCara', (isset($fields['hiperpigmentacionCara']['language'])? $fields['hiperpigmentacionCara']['language'] : array())) }}	
						</td>
						<td>{{ $row->hiperpigmentacionCara }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>
							{{ SiteHelpers::activeLang('SecuelasAcneExamenF', (isset($fields['secuelasAcneExamenF']['language'])? $fields['secuelasAcneExamenF']['language'] : array())) }}	
						</td>
						<td>{{ $row->secuelasAcneExamenF }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>
							{{ SiteHelpers::activeLang('CodigoBarras', (isset($fields['codigoBarras']['language'])? $fields['codigoBarras']['language'] : array())) }}	
						</td>
						<td>{{ $row->codigoBarras }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>
							{{ SiteHelpers::activeLang('FlacidezEnfrenteR', (isset($fields['flacidezEnfrenteR']['language'])? $fields['flacidezEnfrenteR']['language'] : array())) }}	
						</td>
						<td>{{ $row->flacidezEnfrenteR }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>
							{{ SiteHelpers::activeLang('TipoPiel', (isset($fields['tipoPiel']['language'])? $fields['tipoPiel']['language'] : array())) }}	
						</td>
						<td>{{ $row->tipoPiel }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>
							{{ SiteHelpers::activeLang('Surcos', (isset($fields['surcos']['language'])? $fields['surcos']['language'] : array())) }}	
						</td>
						<td>{{ $row->surcos }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>
							{{ SiteHelpers::activeLang('FotodanoCalidadPiel', (isset($fields['fotodanoCalidadPiel']['language'])? $fields['fotodanoCalidadPiel']['language'] : array())) }}	
						</td>
						<td>{{ $row->fotodanoCalidadPiel }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>
							{{ SiteHelpers::activeLang('Ritides', (isset($fields['ritides']['language'])? $fields['ritides']['language'] : array())) }}	
						</td>
						<td>{{ $row->ritides }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>
							{{ SiteHelpers::activeLang('Manchas', (isset($fields['manchas']['language'])? $fields['manchas']['language'] : array())) }}	
						</td>
						<td>{{ $row->manchas }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>
							{{ SiteHelpers::activeLang('Telangiectasias', (isset($fields['telangiectasias']['language'])? $fields['telangiectasias']['language'] : array())) }}	
						</td>
						<td>{{ $row->telangiectasias }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>
							{{ SiteHelpers::activeLang('TelangiectasiasDesc', (isset($fields['telangiectasiasDesc']['language'])? $fields['telangiectasiasDesc']['language'] : array())) }}	
						</td>
						<td>{{ $row->telangiectasiasDesc }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>
							{{ SiteHelpers::activeLang('Cicatrices', (isset($fields['cicatrices']['language'])? $fields['cicatrices']['language'] : array())) }}	
						</td>
						<td>{{ $row->cicatrices }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>
							{{ SiteHelpers::activeLang('CicatrizHipertrofica', (isset($fields['cicatrizHipertrofica']['language'])? $fields['cicatrizHipertrofica']['language'] : array())) }}	
						</td>
						<td>{{ $row->cicatrizHipertrofica }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>
							{{ SiteHelpers::activeLang('CicatrizQueloide', (isset($fields['cicatrizQueloide']['language'])? $fields['cicatrizQueloide']['language'] : array())) }}	
						</td>
						<td>{{ $row->cicatrizQueloide }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>
							{{ SiteHelpers::activeLang('AreaCicatriz', (isset($fields['areaCicatriz']['language'])? $fields['areaCicatriz']['language'] : array())) }}	
						</td>
						<td>{{ $row->areaCicatriz }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>
							{{ SiteHelpers::activeLang('OtrasCicatrices', (isset($fields['otrasCicatrices']['language'])? $fields['otrasCicatrices']['language'] : array())) }}	
						</td>
						<td>{{ $row->otrasCicatrices }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>
							{{ SiteHelpers::activeLang('Masas', (isset($fields['masas']['language'])? $fields['masas']['language'] : array())) }}	
						</td>
						<td>{{ $row->masas }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>
							{{ SiteHelpers::activeLang('MalaDefinicionAntihelix', (isset($fields['malaDefinicionAntihelix']['language'])? $fields['malaDefinicionAntihelix']['language'] : array())) }}	
						</td>
						<td>{{ $row->malaDefinicionAntihelix }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>
							{{ SiteHelpers::activeLang('HipertrofiaConcha', (isset($fields['hipertrofiaConcha']['language'])? $fields['hipertrofiaConcha']['language'] : array())) }}	
						</td>
						<td>{{ $row->hipertrofiaConcha }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>
							{{ SiteHelpers::activeLang('AsimetriaOrejas', (isset($fields['asimetriaOrejas']['language'])? $fields['asimetriaOrejas']['language'] : array())) }}	
						</td>
						<td>{{ $row->asimetriaOrejas }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>
							{{ SiteHelpers::activeLang('Deformidades', (isset($fields['deformidades']['language'])? $fields['deformidades']['language'] : array())) }}	
						</td>
						<td>{{ $row->deformidades }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>
							{{ SiteHelpers::activeLang('TratamientoSeRealizara', (isset($fields['tratamientoSeRealizara']['language'])? $fields['tratamientoSeRealizara']['language'] : array())) }}	
						</td>
						<td>{{ $row->tratamientoSeRealizara }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>
							{{ SiteHelpers::activeLang('CirugiaPostparto', (isset($fields['cirugiaPostparto']['language'])? $fields['cirugiaPostparto']['language'] : array())) }}	
						</td>
						<td>{{ $row->cirugiaPostparto }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>
							{{ SiteHelpers::activeLang('LipoesculturaAsistida', (isset($fields['lipoesculturaAsistida']['language'])? $fields['lipoesculturaAsistida']['language'] : array())) }}	
						</td>
						<td>{{ $row->lipoesculturaAsistida }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>
							{{ SiteHelpers::activeLang('Lipoinyeccion', (isset($fields['lipoinyeccion']['language'])? $fields['lipoinyeccion']['language'] : array())) }}	
						</td>
						<td>{{ $row->lipoinyeccion }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>
							{{ SiteHelpers::activeLang('Abdominoplastia', (isset($fields['abdominoplastia']['language'])? $fields['abdominoplastia']['language'] : array())) }}	
						</td>
						<td>{{ $row->abdominoplastia }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>
							{{ SiteHelpers::activeLang('MamoplastiaAumento', (isset($fields['mamoplastiaAumento']['language'])? $fields['mamoplastiaAumento']['language'] : array())) }}	
						</td>
						<td>{{ $row->mamoplastiaAumento }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>
							{{ SiteHelpers::activeLang('CambioImplantes', (isset($fields['cambioImplantes']['language'])? $fields['cambioImplantes']['language'] : array())) }}	
						</td>
						<td>{{ $row->cambioImplantes }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>
							{{ SiteHelpers::activeLang('MamoplastiaReduccion', (isset($fields['mamoplastiaReduccion']['language'])? $fields['mamoplastiaReduccion']['language'] : array())) }}	
						</td>
						<td>{{ $row->mamoplastiaReduccion }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>
							{{ SiteHelpers::activeLang('PexiaMamaria', (isset($fields['pexiaMamaria']['language'])? $fields['pexiaMamaria']['language'] : array())) }}	
						</td>
						<td>{{ $row->pexiaMamaria }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>
							{{ SiteHelpers::activeLang('PexiaMamariaOpciones', (isset($fields['pexiaMamariaOpciones']['language'])? $fields['pexiaMamariaOpciones']['language'] : array())) }}	
						</td>
						<td>{{ $row->pexiaMamariaOpciones }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>
							{{ SiteHelpers::activeLang('GluteoplastiaImplantes', (isset($fields['gluteoplastiaImplantes']['language'])? $fields['gluteoplastiaImplantes']['language'] : array())) }}	
						</td>
						<td>{{ $row->gluteoplastiaImplantes }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>
							{{ SiteHelpers::activeLang('Rinoplastia', (isset($fields['rinoplastia']['language'])? $fields['rinoplastia']['language'] : array())) }}	
						</td>
						<td>{{ $row->rinoplastia }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>
							{{ SiteHelpers::activeLang('RinoplastiaOpc', (isset($fields['rinoplastiaOpc']['language'])? $fields['rinoplastiaOpc']['language'] : array())) }}	
						</td>
						<td>{{ $row->rinoplastiaOpc }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>
							{{ SiteHelpers::activeLang('Mentoplastia', (isset($fields['mentoplastia']['language'])? $fields['mentoplastia']['language'] : array())) }}	
						</td>
						<td>{{ $row->mentoplastia }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>
							{{ SiteHelpers::activeLang('Otoplastia', (isset($fields['otoplastia']['language'])? $fields['otoplastia']['language'] : array())) }}	
						</td>
						<td>{{ $row->otoplastia }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>
							{{ SiteHelpers::activeLang('Blefaroplastia', (isset($fields['blefaroplastia']['language'])? $fields['blefaroplastia']['language'] : array())) }}	
						</td>
						<td>{{ $row->blefaroplastia }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>
							{{ SiteHelpers::activeLang('BlefaroplastiaOpc', (isset($fields['blefaroplastiaOpc']['language'])? $fields['blefaroplastiaOpc']['language'] : array())) }}	
						</td>
						<td>{{ $row->blefaroplastiaOpc }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>
							{{ SiteHelpers::activeLang('Ritidoplastia', (isset($fields['ritidoplastia']['language'])? $fields['ritidoplastia']['language'] : array())) }}	
						</td>
						<td>{{ $row->ritidoplastia }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>
							{{ SiteHelpers::activeLang('LipoinyeccionSurcos', (isset($fields['lipoinyeccionSurcos']['language'])? $fields['lipoinyeccionSurcos']['language'] : array())) }}	
						</td>
						<td>{{ $row->lipoinyeccionSurcos }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>
							{{ SiteHelpers::activeLang('Bichectomia', (isset($fields['bichectomia']['language'])? $fields['bichectomia']['language'] : array())) }}	
						</td>
						<td>{{ $row->bichectomia }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>
							{{ SiteHelpers::activeLang('DermoabrasionLabioSuperior', (isset($fields['dermoabrasionLabioSuperior']['language'])? $fields['dermoabrasionLabioSuperior']['language'] : array())) }}	
						</td>
						<td>{{ $row->dermoabrasionLabioSuperior }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>
							{{ SiteHelpers::activeLang('AcidoHialuronico', (isset($fields['acidoHialuronico']['language'])? $fields['acidoHialuronico']['language'] : array())) }}	
						</td>
						<td>{{ $row->acidoHialuronico }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>
							{{ SiteHelpers::activeLang('Botox', (isset($fields['botox']['language'])? $fields['botox']['language'] : array())) }}	
						</td>
						<td>{{ $row->botox }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>
							{{ SiteHelpers::activeLang('IdTratamientosPropuestos', (isset($fields['idTratamientosPropuestos']['language'])? $fields['idTratamientosPropuestos']['language'] : array())) }}	
						</td>
						<td>{{ $row->idTratamientosPropuestos }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>
							{{ SiteHelpers::activeLang('CicatricesExtensas', (isset($fields['cicatricesExtensas']['language'])? $fields['cicatricesExtensas']['language'] : array())) }}	
						</td>
						<td>{{ $row->cicatricesExtensas }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>
							{{ SiteHelpers::activeLang('OmbligoFormaDiferida', (isset($fields['ombligoFormaDiferida']['language'])? $fields['ombligoFormaDiferida']['language'] : array())) }}	
						</td>
						<td>{{ $row->ombligoFormaDiferida }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>
							{{ SiteHelpers::activeLang('AsimetriaPreexistente', (isset($fields['asimetriaPreexistente']['language'])? $fields['asimetriaPreexistente']['language'] : array())) }}	
						</td>
						<td>{{ $row->asimetriaPreexistente }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>
							{{ SiteHelpers::activeLang('AcumulosGrasosAbdomen', (isset($fields['acumulosGrasosAbdomen']['language'])? $fields['acumulosGrasosAbdomen']['language'] : array())) }}	
						</td>
						<td>{{ $row->acumulosGrasosAbdomen }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>
							{{ SiteHelpers::activeLang('NoAbdominoplastia', (isset($fields['noAbdominoplastia']['language'])? $fields['noAbdominoplastia']['language'] : array())) }}	
						</td>
						<td>{{ $row->noAbdominoplastia }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>
							{{ SiteHelpers::activeLang('PersistenciaAcumulosGrasos', (isset($fields['persistenciaAcumulosGrasos']['language'])? $fields['persistenciaAcumulosGrasos']['language'] : array())) }}	
						</td>
						<td>{{ $row->persistenciaAcumulosGrasos }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>
							{{ SiteHelpers::activeLang('PersistenciaAlgunasEstrias', (isset($fields['persistenciaAlgunasEstrias']['language'])? $fields['persistenciaAlgunasEstrias']['language'] : array())) }}	
						</td>
						<td>{{ $row->persistenciaAlgunasEstrias }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>
							{{ SiteHelpers::activeLang('PersistirFlacidez', (isset($fields['persistirFlacidez']['language'])? $fields['persistirFlacidez']['language'] : array())) }}	
						</td>
						<td>{{ $row->persistirFlacidez }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>
							{{ SiteHelpers::activeLang('MejoriaParcial', (isset($fields['mejoriaParcial']['language'])? $fields['mejoriaParcial']['language'] : array())) }}	
						</td>
						<td>{{ $row->mejoriaParcial }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>
							{{ SiteHelpers::activeLang('InterpretacionAreasPaciente', (isset($fields['interpretacionAreasPaciente']['language'])? $fields['interpretacionAreasPaciente']['language'] : array())) }}	
						</td>
						<td>{{ $row->interpretacionAreasPaciente }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>
							{{ SiteHelpers::activeLang('MarcacionAbdominales', (isset($fields['marcacionAbdominales']['language'])? $fields['marcacionAbdominales']['language'] : array())) }}	
						</td>
						<td>{{ $row->marcacionAbdominales }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>
							{{ SiteHelpers::activeLang('AumentoProyeccionGluteos', (isset($fields['aumentoProyeccionGluteos']['language'])? $fields['aumentoProyeccionGluteos']['language'] : array())) }}	
						</td>
						<td>{{ $row->aumentoProyeccionGluteos }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>
							{{ SiteHelpers::activeLang('EscurrimientoSenos', (isset($fields['escurrimientoSenos']['language'])? $fields['escurrimientoSenos']['language'] : array())) }}	
						</td>
						<td>{{ $row->escurrimientoSenos }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>
							{{ SiteHelpers::activeLang('PersistirAsimetrias', (isset($fields['persistirAsimetrias']['language'])? $fields['persistirAsimetrias']['language'] : array())) }}	
						</td>
						<td>{{ $row->persistirAsimetrias }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>
							{{ SiteHelpers::activeLang('DispositivosAprobacionInvima', (isset($fields['dispositivosAprobacionInvima']['language'])? $fields['dispositivosAprobacionInvima']['language'] : array())) }}	
						</td>
						<td>{{ $row->dispositivosAprobacionInvima }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>
							{{ SiteHelpers::activeLang('FotografiasParaDescribir', (isset($fields['fotografiasParaDescribir']['language'])? $fields['fotografiasParaDescribir']['language'] : array())) }}	
						</td>
						<td>{{ $row->fotografiasParaDescribir }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>
							{{ SiteHelpers::activeLang('CalidadCicatriz', (isset($fields['calidadCicatriz']['language'])? $fields['calidadCicatriz']['language'] : array())) }}	
						</td>
						<td>{{ $row->calidadCicatriz }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>
							{{ SiteHelpers::activeLang('PresenciaMalaCicatrizacion', (isset($fields['presenciaMalaCicatrizacion']['language'])? $fields['presenciaMalaCicatrizacion']['language'] : array())) }}	
						</td>
						<td>{{ $row->presenciaMalaCicatrizacion }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>
							{{ SiteHelpers::activeLang('CambiosSensibilidadPiel', (isset($fields['cambiosSensibilidadPiel']['language'])? $fields['cambiosSensibilidadPiel']['language'] : array())) }}	
						</td>
						<td>{{ $row->cambiosSensibilidadPiel }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>
							{{ SiteHelpers::activeLang('AsimetriaDesviacionNariz', (isset($fields['asimetriaDesviacionNariz']['language'])? $fields['asimetriaDesviacionNariz']['language'] : array())) }}	
						</td>
						<td>{{ $row->asimetriaDesviacionNariz }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>
							{{ SiteHelpers::activeLang('AsimetriaFosasNasalesR', (isset($fields['asimetriaFosasNasalesR']['language'])? $fields['asimetriaFosasNasalesR']['language'] : array())) }}	
						</td>
						<td>{{ $row->asimetriaFosasNasalesR }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>
							{{ SiteHelpers::activeLang('LaboratoriosPrequirurgicos', (isset($fields['laboratoriosPrequirurgicos']['language'])? $fields['laboratoriosPrequirurgicos']['language'] : array())) }}	
						</td>
						<td>{{ $row->laboratoriosPrequirurgicos }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>
							{{ SiteHelpers::activeLang('LaboratoriosPrequirurgicosOpc', (isset($fields['laboratoriosPrequirurgicosOpc']['language'])? $fields['laboratoriosPrequirurgicosOpc']['language'] : array())) }}	
						</td>
						<td>{{ $row->laboratoriosPrequirurgicosOpc }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>
							{{ SiteHelpers::activeLang('AutorizacionTecnicaCirugia', (isset($fields['autorizacionTecnicaCirugia']['language'])? $fields['autorizacionTecnicaCirugia']['language'] : array())) }}	
						</td>
						<td>{{ $row->autorizacionTecnicaCirugia }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>
							{{ SiteHelpers::activeLang('IndicacionAsistente', (isset($fields['indicacionAsistente']['language'])? $fields['indicacionAsistente']['language'] : array())) }}	
						</td>
						<td>{{ $row->indicacionAsistente }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>
							{{ SiteHelpers::activeLang('ImplantesProbables', (isset($fields['implantesProbables']['language'])? $fields['implantesProbables']['language'] : array())) }}	
						</td>
						<td>{{ $row->implantesProbables }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>
							{{ SiteHelpers::activeLang('DatosBasicosPacientes IdPaciente', (isset($fields['DatosBasicosPacientes_idPaciente']['language'])? $fields['DatosBasicosPacientes_idPaciente']['language'] : array())) }}	
						</td>
						<td>{{ $row->DatosBasicosPacientes_idPaciente }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>
							{{ SiteHelpers::activeLang('DatosBasicosPacientes DatosAdicionalesPacientes IdPaciente1', (isset($fields['DatosBasicosPacientes_DatosAdicionalesPacientes_idPaciente1']['language'])? $fields['DatosBasicosPacientes_DatosAdicionalesPacientes_idPaciente1']['language'] : array())) }}	
						</td>
						<td>{{ $row->DatosBasicosPacientes_DatosAdicionalesPacientes_idPaciente1 }} </td>
						
					</tr>
				
		</tbody>	
	</table>   

	 
	
	</div>
</div>	

	</div>
</div>
	  
@stop