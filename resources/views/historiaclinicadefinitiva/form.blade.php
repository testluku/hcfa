@extends('layouts.app')

@section('content')

	<div class="page-content row">
		<!-- Page header -->

		<div class="content-header">
			<div class="row">
				<div class="col-sm-6">
					<h3> {{ $pageTitle }}</h3>
				</div>
				<div class="col-sm-6 hidden-xs">
					<div class="header-section">
						<ul class="breadcrumb breadcrumb-top">
							<li><a href="{{ URL::to('dashboard') }}">{{ Lang::get('core.home') }}</a></li>
							<li><a href="{{ URL::to('pacientes') }}">Pacientes</a></li>
							<li><a href="{{ URL::to('paciente/'.$idPaciente) }}">Paciente</a></li>
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
				<div class="sbox-title"> <h4> Nueva historia clinica preliminar </h4></div>
				<div class="sbox-content">

				<div class="list-hcPreliminar">
					<div class="sbox-title"> <h4> Historias Clinicas Preliminares </h4></div>
					<div>
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

										</th>
									</tr>
								</thead>
								<tbody>
									@if($dataPreliminar)
										@foreach($dataPreliminar as $hcp)
												<tr>
													<td>{{$hcp->createdAt}}</td>
													<td>{{$hcp->areasMayorInteres}}</td>
													<td>
														<div name="editar" class="btn btn-default" href="" title="Ver" style="padding: 2px 5px;" onclick="cargar({{$hcp->id}})"><i class="fa fa-upload"></i> Cargar </div>
													</td>
												</tr>
										@endforeach
									@endif
								</tbody>
							</table>
					</div>
				</div>

					{!! Form::open(array('url'=>'historiaclinicadefinitiva/save?return='.$return, 'class'=>'form-horizontal','files' => true , 'parsley-validate'=>'','novalidate'=>' ',  'id'=>'form-hcd')) !!}
					<div class="form-group" style="">
						<div class="col-xs-3" style="margin-top: 20px;">
							<ul class="nav nav-tabs tabs-left" style="padding-left: 0;">
								<li class="active"><a href="#antecedentes" data-toggle="tab">Otros Antecedentes</a></li>
								<li><a href="#motivodeconsulta" data-toggle="tab">Motivo Consulta</a></li>
								<li class="sub-menu-left">
									<a href="#examenfisico" data-toggle="tab" id="examClick">Examen F&iacute;sico</a>
									<ul>
										<li><i class="fa fa-caret-right"></i> Contorno</li>
										<li><i class="fa fa-caret-right"></i> Nariz y Ment&oacute;n</li>
										<li><i class="fa fa-caret-right"></i> Otros</li>
										<li><i class="fa fa-caret-right"></i> Acumulaci&oacute;n de grasa</li>
									</ul>
								</li>
								<li><a href="#tratamiento" data-toggle="tab">Tratamiento</a></li>
								<li><a href="#recomendaciones" data-toggle="tab">Recomendaciones y advertencia</a></li>
							</ul>
						</div>

						<div class="col-xs-9">
							<div class="tab-content">
								<!-- INICIO OTROS ANTECEDENTES -->
								<div class="tab-pane active" id="antecedentes">

									<div class="modal-header sub-encuesta">
										<h4 class="">Otros Antecedentes</h4>
									</div>

									<div class="col-md-12">
										<div class="col-md-1 content">
											{!! Form::checkbox('AntecedenteQuirurgico', '', ($otrosantecedentes['quirurgicos_text']) ? true : false, array('class'=>'checkTrueValidate')); !!}
										</div>
										<label for="Id" class="col-md-2 text-left">
											Quir&uacute;rgicos
										</label>
										<div class="col-md-9 textOther">
											{!! Form::text('cualAntecedenteQuirurgico', ($otrosantecedentes['quirurgicos_text']) ? $otrosantecedentes['quirurgicos_text'] : '',array('class'=>'form-control formulario', 'disabled'=>'disabled' ,'placeholder'=>'')) !!}
										</div>
									</div>

									<div class="col-md-12">
										<div class="col-md-1 content">
											{!! Form::checkbox('AntecedenteMedico', '', ($otrosantecedentes['medicos_text']) ? true : false, array('class'=>'checkTrueValidate')); !!}
										</div>
										<label for="Id" class="col-md-2 text-left">
											M&eacute;dicos
										</label>
										<div class="col-md-9 textOther">
											{!! Form::text('cualAntecedenteMedico', ($otrosantecedentes['medicos_text']) ? $otrosantecedentes['medicos_text'] : '' ,array('class'=>'form-control formulario', 'disabled'=>'disabled' ,'placeholder'=>'')) !!}
										</div>
									</div>

									<div class="col-md-12">
										<div class="col-md-1 content">
											{!! Form::checkbox('AntecedenteFarmacologico', '', ($otrosantecedentes['farmacologicos_text']) ? true : false, array('class'=>'checkTrueValidate')); !!}
										</div>
										<label for="Id" class="col-md-2 text-left">
											Farmac&oacute;gico
										</label>
										<div class="col-md-9 textOther">
											{!! Form::text('cualAntecedenteFarmacologico', ($otrosantecedentes['farmacologicos_text']) ? $otrosantecedentes['farmacologicos_text'] : '',array('class'=>'form-control formulario', 'disabled'=>'disabled' ,'placeholder'=>'')) !!}
										</div>
									</div>

									<div class="col-md-12">
										<div class="col-md-1 content">
											{!! Form::checkbox('AntecedenteHomeopaticos', '', ($otrosantecedentes['homeopaticos_text']) ? true : false, array('class'=>'checkTrueValidate')); !!}
										</div>
										<label for="Id" class="col-md-2 text-left">
											Homeopaticos
										</label>
										<div class="col-md-9 textOther">
											{!! Form::text('cualAntecedenteHomeopaticos', ($otrosantecedentes['homeopaticos_text']) ? $otrosantecedentes['homeopaticos_text'] : '', array('class'=>'form-control formulario', 'disabled'=>'disabled' ,'placeholder'=>'')) !!}
										</div>
									</div>

									<div class="col-md-12">
										<div class="col-md-1 content">
											{!! Form::checkbox('AntecedenteAlergicos', '', ($otrosantecedentes['alergicos_text']) ? true : false, array('class'=>'checkTrueValidate')); !!}
										</div>
										<label for="Id" class="col-md-2 text-left">
											Al&eacute;rgicos
										</label>
										<div class="col-md-9 textOther">
											{!! Form::text('cualAntecedenteAlergicos', ($otrosantecedentes['alergicos_text']) ? $otrosantecedentes['alergicos_text'] : '', array('class'=>'form-control formulario', 'disabled'=>'disabled' ,'placeholder'=>'')) !!}
										</div>
									</div>

									<div class="col-md-12">
										<div class="col-md-1 content">
											{!! Form::checkbox('AntecedenteGinecoObstetricas', '', ($otrosantecedentes['ginecoObstetricas_text']) ? true : false, array('class'=>'checkTrueValidate')); !!}
										</div>
										<label for="Id" class="col-md-2 text-left">
											Gineco Obst&eacute;tricas
										</label>
										<div class="col-md-9 textOther">
											{!! Form::text('cualAntecedenteGinecoObstetricas', ($otrosantecedentes['ginecoObstetricas_text']) ? $otrosantecedentes['ginecoObstetricas_text'] : '' ,array('class'=>'form-control formulario', 'disabled'=>'disabled' ,'placeholder'=>'')) !!}
										</div>
									</div>

									<div class="col-md-12">
										<div class="col-md-1 content">
											{!! Form::checkbox('AntecedenteToxicologica', '', ($otrosantecedentes['toxicologicas_text']) ? true : false, array('class'=>'checkTrueValidate')); !!}
										</div>
										<label for="Id" class="col-md-2 text-left">
											Toxicol&oacute;gicas
										</label>
										<div class="col-md-9 textOther">
											{!! Form::text('cualAntecedenteToxicologica', ($otrosantecedentes['toxicologicas_text']) ? $otrosantecedentes['toxicologicas_text'] : '', array('class'=>'form-control formulario', 'disabled'=>'disabled' ,'placeholder'=>'')) !!}
										</div>
									</div>

									<div class="col-md-12">
										<div class="col-md-1 content">
											{!! Form::checkbox('AntecedenteTabaquismo', '', ($otrosantecedentes['tabaquismo_text']) ? true : false, array('class'=>'checkTrueValidate')); !!}
										</div>
										<label for="Id" class="col-md-2 text-left">
											Tabaquismo
										</label>
										<div class="col-md-9 textOther">
											{!! Form::text('cualAntecedenteTabaquismo', ($otrosantecedentes['tabaquismo_text']) ? $otrosantecedentes['tabaquismo_text'] : '', array('class'=>'form-control formulario', 'disabled'=>'disabled' ,'placeholder'=>'')) !!}
										</div>
									</div>

									<div class="col-md-12">
										<div class="col-md-1 content">
											{!! Form::checkbox('seIndicaSuspender', '', ($otrosantecedentes['seIndicaSuspender']) ? true : false, array('class'=>'checkTrueValidate')); !!}
										</div>
										<label for="Id" class="col-md-11 text-left">
											Se indica suspender
										</label>
									</div>

									<div class="col-md-12">
										<label for="otrosAntecedes" class="col-md-2 text-left">
											Otros
										</label>
										<div class="col-md-10">
											{!! Form::textarea('otrosAntecedentes', ($otrosantecedentes['otros']) ? $otrosantecedentes['otros'] : '', array('class'=>'form-control formulario', 'placeholder'=>'', 'cols' => '5', 'rows'=>'8')) !!}
										</div>
									</div>

									<div class="col-md-12">
										<label for="Id" class="col-md-4 text-left">
											SIGNOS VITALES
										</label>
										<div class="col-md-2 textOther">
											Normales {!! Form::text('signoVitalNormal', ($otrosantecedentes['signosVitalesNormales']) ? $otrosantecedentes['signosVitalesNormales'] : '',array('class'=>'form-control formulario', 'placeholder'=>'')) !!}
										</div>
										<div class="col-md-2 textOther">
											FC {!! Form::text('signoVitalFC', ($otrosantecedentes['signosVitalesFC']) ? $otrosantecedentes['signosVitalesFC'] : '', array('class'=>'form-control formulario', 'placeholder'=>'')) !!}
										</div>
										<div class="col-md-2 textOther">
											FR {!! Form::text('signoVitalFR', ($otrosantecedentes['signosVitalesFR']) ? $otrosantecedentes['signosVitalesFR'] : '', array('class'=>'form-control formulario', 'placeholder'=>'')) !!}
										</div>
										<div class="col-md-2 textOther">
											TA {!! Form::text('signoVitalTA', ($otrosantecedentes['signosVitalesTA']) ? $otrosantecedentes['signosVitalesTA'] : '', array('class'=>'form-control formulario', 'placeholder'=>'')) !!}
										</div>
									</div>

								</div>
								<!-- FIN OTROS ANTECEDENTES -->


								<!-- INICIO MOTIVO CONSULTA -->
								<div class="tab-pane col-md-12" id="motivodeconsulta">


									<div class="modal-header sub-encuesta">
										<h4 class="">MOTIVO DE CONSULTA</h4>
									</div>

									<div class="col-md-12">
										<h4 class="sub-title">CONTORNO CORPORAL</h4>
									</div>

									<div class="col-md-12">
										<div class="col-md-2 content">
											{!! Form::checkbox('motivoSecuelasLipo', '1', ($motivodeconsulta['motivoSecuelasLipo']) ? true : false, array('class'=>'checkTrueValidate')); !!}
										</div>
										<label for="Id" class="col-md-10 text-left">
											Corregir secuelas de lipo previas
										</label>
									</div>

									<div class="col-md-12">
										<div class="col-md-2 content">
											{!! Form::checkbox('mejorarContornoCorporal', '1', ($motivodeconsulta['mejorarContornoCorporal']) ? true : false, array('class'=>'checkTrueValidate')); !!}
										</div>
										<label for="Id" class="col-md-10 text-left">
											Mejorar Contorno Corporal
										</label>
									</div>

									<div class="col-md-12">
										<div class="col-md-2 content">
											{!! Form::checkbox('mejorarFlacidesAbdomen', '1', ($motivodeconsulta['mejorarFlacidesAbdomen']) ? true : false, array('class'=>'checkTrueValidate')); !!}
										</div>
										<label for="Id" class="col-md-10 text-left">
											Mejorar flacidez del abdomen.
										</label>
									</div>

									<div class="col-md-12">
										<div class="col-md-2 content">
											{!! Form::checkbox('aumentarProyeccionGluteos', '1', ($motivodeconsulta['aumentarProyeccionGluteos']) ? true : false, array('class'=>'checkTrueValidate')); !!}
										</div>
										<label for="Id" class="col-md-10 text-left">
											Aumentar proyección de los gluteos.
										</label>
									</div>

									<div class="col-md-12">
										<div class="col-md-2 content">
											{!! Form::checkbox('mejorarCicatrizLipectomia', '1', ($motivodeconsulta['mejorarCicatrizLipectomia']) ? true : false, array('class'=>'checkTrueValidate')); !!}
										</div>
										<label for="Id" class="col-md-10 text-left">
											Mejorar cicatriz de lipectomía previa.
										</label>
									</div>

									<div class="col-md-12">
										<label for="Id" class="col-md-7 text-left">
											¿Desea tener m&aacute;s hijos?
										</label>
										<div class="col-md-5 content">
											Si {!! Form::radio('masHijos', '1', ($motivodeconsulta['masHijos'] == 1) ? true : false, array('class'=>'checkTrue')); !!}
											No {!! Form::radio('masHijos', '0', ($motivodeconsulta['masHijos'] == 0) ? true : false, array('class'=>'checkFalse')); !!}
										</div>
									</div>


									<div class="col-md-12">
										<h4 class="sub-title">OREJAS</h4>
									</div>

									<div class="col-md-12">
										<div class="col-md-2 content">
											{!! Form::checkbox('mejorarOrejas', '1', ($motivodeconsulta['mejorarOrejas']) ? true : false, array('class'=>'checkTrueValidate')); !!}
										</div>
										<label for="Id" class="col-md-10 text-left">
											Mejorar aspecto est&eacute;tico de las orejas.
										</label>
									</div>


									<div class="col-md-12">
										<h4 class="sub-title">REJUVENECIMIENTO FACIAL</h4>
									</div>

									<div class="col-md-12">
										<label for="areasMayorInteres" class="col-md-2 text-left">
											Areas de mayor inter&eacute;s
										</label>
										<div class="col-md-10">
											{!! Form::textarea('areasMayorInteres', ($motivodeconsulta['areasMayorInteres']) ? $motivodeconsulta['areasMayorInteres'] : '', array('class'=>'form-control formulario', 'placeholder'=>'', 'cols' => '5', 'rows'=>'8')) !!}
										</div>
									</div>

									<div class="col-md-12">
										<div class="col-md-2 content">
											{!! Form::checkbox('mejorarPigmentacionCara', '1', ($motivodeconsulta['mejorarPigmentacionCara']) ? true : false, array('class'=>'checkTrueValidate')); !!}
										</div>
										<label for="Id" class="col-md-10 text-left">
											Mejorar pigmentaci&oacute;n de la cara.
										</label>
									</div>

									<div class="col-md-12">
										<div class="col-md-2 content">
											{!! Form::checkbox('disminuirSurcosNasogerianos', '1', ($motivodeconsulta['disminuirSurcosNasogenianos']) ? true : false, array('class'=>'checkTrueValidate')); !!}
										</div>
										<label for="Id" class="col-md-10 text-left">
											Disminuir surcos nasogerianos.
										</label>
									</div>


									<div class="col-md-12">
										<div class="col-md-2 content">
											{!! Form::checkbox('disminuirSurcosMarioneta', '1', ($motivodeconsulta['disminuirSurcosMarioneta']) ? true : false, array('class'=>'checkTrueValidate')); !!}
										</div>
										<label for="Id" class="col-md-10 text-left">
											Disminuir surcos de marioneta.
										</label>
									</div>

									<div class="col-md-12">
										<div class="col-md-2 content">
											{!! Form::checkbox('disminuirLineasExpresion', '1',  ($motivodeconsulta['disminuirLineasExpresion']) ? true : false, array('class'=>'checkTrueValidate')); !!}
										</div>
										<label for="Id" class="col-md-10 text-left">
											Disminuir lineas de expresi&oacute;n.
										</label>
									</div>


									<div class="col-md-12">
										<div class="col-md-2 content">
											{!! Form::checkbox('patasDeGallina', '1', ($motivodeconsulta['patasDeGallina']) ? true : false, array('class'=>'checkTrueValidate')); !!}
										</div>
										<label for="Id" class="col-md-10 text-left">
											Patas de gallina.
										</label>
									</div>


									<div class="col-md-12">
										<div class="col-md-2 content">
											{!! Form::checkbox('frente', '1', ($motivodeconsulta['frente']) ? true : false, array('class'=>'checkTrueValidate')); !!}
										</div>
										<label for="Id" class="col-md-10 text-left">
											Frente
										</label>
									</div>


									<div class="col-md-12">
										<div class="col-md-2 content">
											{!! Form::checkbox('ceno', '1', ($motivodeconsulta['ceno']) ? true : false, array('class'=>'checkTrueValidate')); !!}
										</div>
										<label for="Id" class="col-md-10 text-left">
											Ce&ntilde;o.
										</label>
									</div>


									<div class="col-md-12">
										<div class="col-md-2 content">
											{!! Form::checkbox('mejorarSecualesAcne', '1', ($motivodeconsulta['mejorarSecuelasAcne']) ? true : false, array('class'=>'checkTrueValidate')); !!}
										</div>
										<label for="Id" class="col-md-10 text-left">
											Mejorar secuelas de acne
										</label>
									</div>


									<div class="col-md-12">
										<div class="col-md-2 content">
											{!! Form::checkbox('mejorarCalidadPielCara', '1', ($motivodeconsulta['mejorarCalidadPielCara']) ? true : false, array('class'=>'checkTrueValidate')); !!}
										</div>
										<label for="Id" class="col-md-10 text-left">
											Mejorar calidad de la piel de la cara.
										</label>
									</div>


									<div class="col-md-12">
										<div class="col-md-2 content">
											{!! Form::checkbox('mejorarFlacidezCuello', '1', ($motivodeconsulta['mejorarFlacidezCuello']) ? true : false, array('class'=>'checkTrueValidate')); !!}
										</div>
										<label for="Id" class="col-md-10 text-left">
											Mejorar flacidez del cuello.
										</label>
									</div>

									<div class="col-md-12">
										<div class="col-md-2 content">
											{!! Form::checkbox('depilacionLaser', '1', ($motivodeconsulta['depilacionLaser']) ? true : false, array('class'=>'checkTrueValidate')); !!}
										</div>
										<label for="Id" class="col-md-10 text-left">
											Depilaci&oacute;n laser.
										</label>
									</div>


									<div class="col-md-12">
										<div class="col-md-2 content">
											{!! Form::checkbox('mejorarRitidesLabioSuperior', '1', ($motivodeconsulta['mejorarRitidesLabioSuperior']) ? true : false, array('class'=>'checkTrueValidate')); !!}
										</div>
										<label for="Id" class="col-md-10 text-left">
											Mejorar ritides del labio superior.
										</label>
									</div>


									<div class="col-md-12">
										<div class="col-md-2 content">
											{!! Form::checkbox('mejorarPigmentacionSurcosNasoyugales', '1', ($motivodeconsulta['mejorarPigmentacionSurcosNasoyugales']) ? true : false, array('class'=>'checkTrueValidate')); !!}
										</div>
										<label for="Id" class="col-md-10 text-left">
											Mejorar pigmentaci&oacute;n de surcos nasoyugales.
										</label>
									</div>


									<div class="col-md-12">
										<h4 class="sub-title">PARPADOS</h4>
									</div>

									<div class="col-md-12">
										<div class="col-md-2 content">
											{!! Form::checkbox('mejorarExcesoPielParpadoSuperior', '1', ($motivodeconsulta['mejorarExcesoPielParpadoSuperior']) ? true : false, array('class'=>'checkTrueValidate')); !!}
										</div>
										<label for="Id" class="col-md-10 text-left">
											Mejorar exceso de piel del parpado superior.
										</label>
									</div>


									<div class="fcol-md-12">
										<div class="col-md-2 content">
											{!! Form::checkbox('mejorarBolsaParpadoInferior', '1', ($motivodeconsulta['mejorarBolsaParpadoInferior']) ? true : false, array('class'=>'checkTrueValidate')); !!}
										</div>
										<label for="Id" class="col-md-10 text-left">
											Mejorar bolsas de parpado inferior.
										</label>
									</div>


									<div class="col-md-12">
										<div class="col-md-2 content">
											{!! Form::checkbox('mejorarFlacidezParapadoInferior', '1', ($motivodeconsulta['mejorarFlacidezParapadoInferior']) ? true : false, array('class'=>'checkTrueValidate')); !!}
										</div>
										<label for="Id" class="col-md-10 text-left">
											Mejorar flacidez parpado inferior.
										</label>
									</div>


									<div class="col-md-12">
										<div class="col-md-2 content">
											{!! Form::checkbox('mejorarLineasExpresion', '1', ($motivodeconsulta['mejorarLineasExpresion']) ? true : false, array('class'=>'checkTrueValidate')); !!}
										</div>
										<label for="Id" class="col-md-10 text-left">
											Mejorar lineas de expresi&oacute;n.
										</label>
									</div>


									<div class="col-md-12">
										<div class="col-md-2 content">
											{!! Form::checkbox('elevarCejas', '1', ($motivodeconsulta['elevarCejas']) ? true : false, array('class'=>'checkTrueValidate')); !!}
										</div>
										<label for="Id" class="col-md-10 text-left">
											Elevar cejas
										</label>
									</div>


									<div class="col-md-12">
										<h4 class="sub-title">NARIZ Y MENT&Oacute;N</h4>
									</div>

									<div class="col-md-12">
										<div class="col-md-2 content">
											{!! Form::checkbox('aumentarProyeccionMenton', '1', ($motivodeconsulta['aumentarProyeccionMenton']) ? true : false, array('class'=>'checkTrueValidate')); !!}
										</div>
										<label for="Id" class="col-md-10 text-left">
											Aumentar proyecci&oacute;n del ment&oacute;n
										</label>
									</div>


									<div class="col-md-12">
										<div class="col-md-2 content">
											{!! Form::checkbox('mejorarEsteticaNariz', '1', ($motivodeconsulta['mejorarEsteticaNariz']) ? true : false, array('class'=>'checkTrueValidate')); !!}
										</div>
										<label for="Id" class="col-md-10 text-left">
											Mejorar est&eacute;tica nariz.
										</label>
									</div>


									<div class="col-md-12">
										<div class="col-md-2 content">
											{!! Form::checkbox('mejorarSecuelasRinoPrevias', '1', ($motivodeconsulta['mejorarSecuelasRinoPrevias']) ? true : false, array('class'=>'checkTrueValidate')); !!}
										</div>
										<label for="Id" class="col-md-10 text-left">
											Mejorar secuela rino previas.
										</label>
									</div>


									<div class="col-md-12">
										<div class="col-md-2 content">
											{!! Form::checkbox('mejorarCuadroObstructivo', '1', ($motivodeconsulta['mejorarCuadroObstructivo']) ? true : false, array('class'=>'checkTrueValidate')); !!}
										</div>
										<label for="Id" class="col-md-10 text-left">
											Mejorar cuadro obstructivo.
										</label>
									</div>


									<div class="col-md-12">
										<label for="Id" class="col-md-5 text-left">
											¿Respira bien?
										</label>
										<div class="col-md-7 content">
											Si {!! Form::radio('estadoRespiracion', '1', ($motivodeconsulta['comoRespira']==1) ? true : false, array('class'=>'checkTrue')); !!}
											No {!! Form::radio('estadoRespiracion', '0', ($motivodeconsulta['comoRespira']==0) ? true : false, array('class'=>'checkFalse')); !!}
										</div>
									</div>


									<div class="col-md-12">
										<div class="col-md-12 content text-justify">

											@if($motivodeconsulta['FND'] && $motivodeconsulta['FNI'])
												FND {!! Form::checkbox('FND', '1', true, array('class'=>'checkTrueValidate')); !!}

												FNI {!! Form::checkbox('FNI', '1', true, array('class'=>'checkTrueValidate')); !!}
											@else
												FND {!! Form::checkbox('FND', '1', ($motivodeconsulta['FND']) ? true : false, array('class'=>'checkTrueValidate')); !!}

												FNI {!! Form::checkbox('FNI', '1', ($motivodeconsulta['FNI']) ? true : false, array('class'=>'checkTrueValidate')); !!}
											@endif

										</div>
									</div>


								</div>
								<!-- FIN MOTIVO CONSULTA -->


								<!-- INICIO EXAMEN FISICO -->
								<div class="tab-pane col-md-12" id="examenfisico">

									<div class="modal-header sub-encuesta">
										<h4 class="sub-title">EXAMEN F&Iacute;SICO</h4>
									</div>

									<div class="col-md-12">
										<h4 class="sub-title">CONTORNO</h4>
									</div>

									<div class="col-md-12">
										<label for="Id" class="col-md-5 text-left">
											Abdomen colgante.
										</label>
										<div class="col-md-2 text-left">
											{!! Form::checkbox('abdomenColgante', '1', ($examenfisico['abdomenColgante']) ? true : false, array('class'=>'checkTrueValidate')); !!}
										</div>
										<div class="col-md-5">

										</div>
									</div>

									<div class="col-md-12">
										<label for="Id" class="col-md-5 text-left">

										</label>
										<div class="col-md-2 text-center">
											Leve
										</div>
										<div class="col-md-3 text-center">
											Moderada
										</div>
										<div class="col-md-2 text-center">
											Severa
										</div>
									</div>

									<div class="col-md-12">
										<label for="Id" class="col-md-5 text-left">
											Flacidez abdominal.
										</label>
										<div class="col-md-2 text-center">
											{!! Form::radio('flacidezAbdominal', '1', ($examenfisico['flacidezAbdominal'] == 1) ? true : false, array('class'=>'checkFalse')); !!}
										</div>
										<div class="col-md-3 text-center">
											{!! Form::radio('flacidezAbdominal', '2', ($examenfisico['flacidezAbdominal'] == 2) ? true : false, array('class'=>'checkFalse')); !!}
										</div>
										<div class="col-md-2 text-center">
											{!! Form::radio('flacidezAbdominal', '3', ($examenfisico['flacidezAbdominal'] == 3) ? true : false, array('class'=>'checkFalse')); !!}
										</div>
									</div>



									<div class="col-md-12">
										<label for="Id" class="col-md-5 text-left">
											Striae distensae
										</label>
										<div class="col-md-2 text-center">
											{!! Form::radio('striaeDistensae', '1', ($examenfisico['striaeDistensae'] == 1) ? true : false, array('class'=>'checkFalse')); !!}
										</div>
										<div class="col-md-3 text-center">
											{!! Form::radio('striaeDistensae', '2', ($examenfisico['striaeDistensae'] == 2) ? true : false, array('class'=>'checkFalse')); !!}
										</div>
										<div class="col-md-2 text-center">
											{!! Form::radio('striaeDistensae', '3', ($examenfisico['striaeDistensae'] == 3) ? true : false, array('class'=>'checkFalse')); !!}
										</div>
									</div>


									<div class="col-md-12">
										<label for="Id" class="col-md-5 text-left">
											Diastasis de rectos
										</label>
										<div class="col-md-2 text-center">
											{!! Form::radio('diastasisRectos', '1', ($examenfisico['diastasisRectos'] == 1) ? true : false, array('class'=>'checkFalse')); !!}
										</div>
										<div class="col-md-3 text-center">
											{!! Form::radio('diastasisRectos', '2', ($examenfisico['diastasisRectos'] == 2) ? true : false, array('class'=>'checkFalse')); !!}
										</div>
										<div class="col-md-2 text-center">
											{!! Form::radio('diastasisRectos', '3', ($examenfisico['diastasisRectos'] == 3) ? true : false, array('class'=>'checkFalse')); !!}
										</div>
									</div>

									<div class="col-md-12">
										<h4 class="sub-title">SENOS</h4>
									</div>

									<div class="col-md-12">
										<label for="Id" class="col-md-5 text-left">
											Gigantomastia
										</label>
										<div class="col-md-2 text-left">
											{!! Form::checkbox('gigantomastia', '1', ($examenfisico['gigantomastia']) ? true : false, array('class'=>'checkTrueValidate')); !!}
										</div>
										<div class="col-md-5">

										</div>
									</div>


									<div class="col-md-12">
										<label for="Id" class="col-md-5 text-left">

										</label>
										<div class="col-md-2 text-center">
											Peque&ntilde;o
										</div>
										<div class="col-md-3 text-center">
											Mediano
										</div>
										<div class="col-md-2 text-center">
											Grande
										</div>
									</div>

									<div class="col-md-12">
										<label for="Id" class="col-md-5 text-left">
											Tama&ntilde;o senos
										</label>
										<div class="col-md-2 text-center">
											{!! Form::radio('tamanoSenos', '1', ($examenfisico['tamanoSenos'] == 1) ? true : false, array('class'=>'checkFalse')); !!}
										</div>
										<div class="col-md-3 text-center">
											{!! Form::radio('tamanoSenos', '2', ($examenfisico['tamanoSenos'] == 2) ? true : false, array('class'=>'checkFalse')); !!}
										</div>
										<div class="col-md-2 text-center">
											{!! Form::radio('tamanoSenos', '3', ($examenfisico['tamanoSenos'] == 3) ? true : false, array('class'=>'checkFalse')); !!}
										</div>
									</div>

									<div class="col-md-12">
										<label for="Id" class="col-md-5 text-left">

										</label>
										<div class="col-md-2 text-center">
											Leve
										</div>
										<div class="col-md-3 text-center">
											Moderada
										</div>
										<div class="col-md-2 text-center">
											Severa
										</div>
									</div>

									<div class="col-md-12">
										<label for="Id" class="col-md-5 text-left">
											Ptosis
										</label>
										<div class="col-md-2 text-center">
											{!! Form::radio('ptosis', '1', ($examenfisico['ptosis'] == 1) ? true : false, array('class'=>'checkFalse')); !!}
										</div>
										<div class="col-md-3 text-center">
											{!! Form::radio('ptosis', '2', ($examenfisico['ptosis'] == 2) ? true : false, array('class'=>'checkFalse')); !!}
										</div>
										<div class="col-md-2 text-center">
											{!! Form::radio('ptosis', '3', ($examenfisico['ptosis'] == 3) ? true : false, array('class'=>'checkFalse')); !!}
										</div>
									</div>

									<div class="col-md-12">
										<label for="Id" class="col-md-5 text-left">
											Asimetr&iacute;a Forma y Tama&ntilde;o
										</label>
										<div class="col-md-2 text-center">
											{!! Form::radio('asimetriaFormaTamano', '1', ($examenfisico['asimetriaFormaTamano'] == 1) ? true : false, array('class'=>'checkFalse')); !!}
										</div>
										<div class="col-md-3 text-center">
											{!! Form::radio('asimetriaFormaTamano', '2', ($examenfisico['asimetriaFormaTamano'] == 2) ? true : false, array('class'=>'checkFalse')); !!}
										</div>
										<div class="col-md-2 text-center">
											{!! Form::radio('asimetriaFormaTamano', '3', ($examenfisico['asimetriaFormaTamano'] == 3) ? true : false, array('class'=>'checkFalse')); !!}
										</div>
									</div>


									<div class="col-md-12">
										<h4 class="sub-title">PARPADOS</h4>
									</div>

									<div class="col-md-12">
										<label for="Id" class="col-md-7 text-left">
											Blefachalasis parpado superior
										</label>
										<div class="col-md-2 text-left">
											{!! Form::checkbox('blefachalasisParapadoSuperior', '1', ($examenfisico['blefachalasisParapadoSuperior']) ? true : false, array('class'=>'checkTrueValidate')); !!}
										</div>
										<div class="col-md-3">

										</div>
									</div>


									<div class="col-md-12">
										<label for="Id" class="col-md-7 text-left">
											Cojines adiposos parpado superior
										</label>
										<div class="col-md-2 text-left">
											{!! Form::checkbox('cojinAdiposoParpadoSuperior', '1', ($examenfisico['cojinAdiposoParpadoSuperior']) ? true : false, array('class'=>'checkTrueValidate')); !!}
										</div>
										<div class="col-md-3">

										</div>
									</div>

									<div class="col-md-12">
										<label for="Id" class="col-md-7 text-left">
											Blefachalasis parpado Inferior
										</label>
										<div class="col-md-2 text-left">
											{!! Form::checkbox('blefachalasisParapadoInferior', '1', ($examenfisico['blefachalasisParapadoInferior']) ? true : false, array('class'=>'checkTrueValidate')); !!}
										</div>
										<div class="col-md-3">

										</div>
									</div>

									<div class="col-md-12">
										<label for="Id" class="col-md-7 text-left">
											Coj&iacute;n adipososo parpados Inferiores
										</label>
										<div class="col-md-2 text-left">
											{!! Form::checkbox('cojinAdiposoParpadoInferior', '1', ($examenfisico['cojinAdiposoParpadoInferior']) ? true : false, array('class'=>'checkTrueValidate')); !!}
										</div>
										<div class="col-md-3">

										</div>
									</div>

									<div class="col-md-12">
										<label for="Id" class="col-md-5 text-left">
											Asimetr&iacute;a
										</label>
										<div class="col-md-2 text-center">
											{!! Form::radio('asimetria', '1', ($examenfisico['asimetria'] == 1) ? true : false, array('class'=>'checkFalse')); !!}
										</div>
										<div class="col-md-3 text-center">
											{!! Form::radio('asimetria', '2', ($examenfisico['asimetria'] == 2) ? true : false, array('class'=>'checkFalse')); !!}
										</div>
										<div class="col-md-2 text-center">
											{!! Form::radio('asimetria', '3', ($examenfisico['asimetria'] == 3) ? true : false, array('class'=>'checkFalse')); !!}
										</div>
									</div>


									<div class="col-md-12">
										<label for="Id" class="col-md-5 text-left">

										</label>
										<div class="col-md-2 text-center">
											Leve
										</div>
										<div class="col-md-3 text-center">
											Moderada
										</div>
										<div class="col-md-2 text-center">
											Severa
										</div>
									</div>

									<div class="col-md-12">
										<h4 class="sub-title">NARIZ Y MENT&Oacute;N</h4>
									</div>

									<div class="col-md-12">
										<label for="Id" class="col-md-7 text-right">
											Giba osteocartilagenosa
										</label>
										<div class="col-md-2 text-left">
											{!! Form::checkbox('gibaOsteocartilaginosa', '1', ($examenfisico['gibaOsteocartilaginosa']) ? true : false, array('class'=>'checkTrueValidate')); !!}
										</div>
										<div class="col-md-3">

										</div>
									</div>

									<div class="col-md-12">
										<label for="Id" class="col-md-7 text-right">
											Laterorinia
										</label>
										<div class="col-md-2 text-left">
											{!! Form::checkbox('laterorinia', '1', ($examenfisico['laterorinia']) ? true : false, array('class'=>'checkTrueValidate')); !!}
										</div>
										<div class="col-md-3">

										</div>
									</div>

									<div class="col-md-12">
										<label for="Id" class="col-md-7 text-right">
											Mala definici&oacute;n de Punta
										</label>
										<div class="col-md-2 text-left">
											{!! Form::checkbox('malaDefinicionPunta', '1', ($examenfisico['malaDefinicionPunta']) ? true : false, array('class'=>'checkTrueValidate')); !!}
										</div>
										<div class="col-md-3">

										</div>
									</div>

									<div class="col-md-12">
										<label for="Id" class="col-md-7 text-right">
											Mala Proyecci&oacute;n de Punta
										</label>
										<div class="col-md-2 text-left">
											{!! Form::checkbox('malaProyeccionPunta', '1', ($examenfisico['malaProyeccionPunta']) ? true : false, array('class'=>'checkTrueValidate')); !!}
										</div>
										<div class="col-md-3">

										</div>
									</div>

									<div class="col-md-12">
										<label for="Id" class="col-md-7 text-right">
											Ptosis de la Punta
										</label>
										<div class="col-md-2 text-left">
											{!! Form::checkbox('PtosisPunta', '1', ($examenfisico['PtosisPunta']) ? true : false, array('class'=>'checkTrueValidate')); !!}
										</div>
										<div class="col-md-3">

										</div>
									</div>

									<div class="col-md-12">
										<label for="Id" class="col-md-7 text-right">
											Asimetr&iacute;a de la Punta
										</label>
										<div class="col-md-2 text-left">
											{!! Form::checkbox('asimetriaPunta', '1', ($examenfisico['asimetriaPunta']) ? true : false, array('class'=>'checkTrueValidate')); !!}
										</div>
										<div class="col-md-3">

										</div>
									</div>

									<div class="col-md-12">
										<label for="Id" class="col-md-7 text-right">
											Piel Gruesa
										</label>
										<div class="col-md-2 text-left">
											{!! Form::checkbox('pielGruesa', '1', ($examenfisico['pielGruesa']) ? true : false, array('class'=>'checkTrueValidate')); !!}
										</div>
										<div class="col-md-3">

										</div>
									</div>

									<div class="col-md-12">
										<label for="Id" class="col-md-7 text-right">
											Alas Gruesas
										</label>
										<div class="col-md-2 text-left">
											{!! Form::checkbox('alasGruesas', '1', ($examenfisico['alasGruesas']) ? true : false, array('class'=>'checkTrueValidate')); !!}
										</div>
										<div class="col-md-3">

										</div>
									</div>

									<div class="col-md-12">
										<label for="Id" class="col-md-7 text-right">
											Fosas Amplias
										</label>
										<div class="col-md-2 text-left">
											{!! Form::checkbox('fosasAmplias', '1', ($examenfisico['fosasAmplias']) ? true : false, array('class'=>'checkTrueValidate')); !!}
										</div>
										<div class="col-md-3">

										</div>
									</div>

									<div class="col-md-12">
										<label for="Id" class="col-md-7 text-right">
											Asimetr&iacute;a de las fosas nasales
										</label>
										<div class="col-md-2 text-left">
											{!! Form::checkbox('asimetriaFosasNasales', '1', ($examenfisico['asimetriaFosasNasales']) ? true : false, array('class'=>'checkTrueValidate')); !!}
										</div>
										<div class="col-md-3">

										</div>
									</div>

									<div class="col-md-12">
										<label for="Id" class="col-md-6 text-right">
											Deflex&iacute;on septal
										</label>
										<div class="col-md-6 text-left content">
											{!! Form::checkbox('ndeflexionSeptalActivate', '', ($examenfisico['deflexionSeptal']) ? true : false, array('class'=>'checkTrueActivate')); !!}
											ZI {!! Form::radio('deflexionSeptal', '1', ($examenfisico['deflexionSeptal'] == 1) ? true : false, array('class'=>'checkTrueValidate','disabled'=>'disabled')); !!}
											ZII {!! Form::radio('deflexionSeptal', '2', ($examenfisico['deflexionSeptal'] == 2) ? true : false, array('class'=>'checkTrueValidate','disabled'=>'disabled')); !!}
											ZIII {!! Form::radio('deflexionSeptal', '3', ($examenfisico['deflexionSeptal'] == 3) ? true : false, array('class'=>'checkTrueValidate','disabled'=>'disabled')); !!}
										</div>
									</div>

									<div class="col-md-12">
										<label for="Id" class="col-md-6 text-right">
											Hipertrofia cornetes
										</label>
										<div class="col-md-6 text-left content">
											{!! Form::checkbox('hipertrofiaCorneteActivate', '', ($examenfisico['hipertrofiaCornete']) ? true : false, array('class'=>'checkTrueActivate')); !!}
											FND {!! Form::radio('hipertrofiaCornete', '1', ($examenfisico['hipertrofiaCornete'] == 1) ? true : false, array('class'=>'checkTrueValidate','disabled'=>'disabled')); !!}
											FNI {!! Form::radio('hipertrofiaCornete', '2', ($examenfisico['hipertrofiaCornete'] == 2) ? true : false, array('class'=>'checkTrueValidate','disabled'=>'disabled')); !!}
											AMBAS {!! Form::radio('hipertrofiaCornete', '3', ($examenfisico['hipertrofiaCornete'] == 3) ? true : false, array('class'=>'checkTrueValidate','disabled'=>'disabled')); !!}
										</div>
									</div>

									<div class="col-md-12">
										<label for="Id" class="col-md-6 text-right">
											Hipoplasia Ment&oacute;n
										</label>
										<div class="col-md-2 text-left">
											{!! Form::checkbox('hipoplasiaMenton', '1', ($examenfisico['hipoplasiaMenton']) ? true : false, array('class'=>'checkTrueValidate')); !!}
										</div>
										<div class="col-md-4">

										</div>
									</div>

									<div class="col-md-12">
										<h4 class="sub-title">OTROS</h4>
									</div>

									<div class="col-md-12">
										<label for="Id" class="col-md-6 text-left">
											Telanglectasias en Muslos.
										</label>
										<div class="col-md-6">
											{!! Form::textarea('telanglectasiasMuslos', ($examenfisico['telanglectasiasMuslos']) ? $examenfisico['telanglectasiasMuslos'] : '', array('class'=>'form-control formulario', 'placeholder'=>'', 'cols' => '5', 'rows'=>'8')) !!}
										</div>
									</div>

									<div class="col-md-12">
										<label for="Id" class="col-md-6 text-left">
											Telanglectasias en Piernas.
										</label>
										<div class="col-md-6">
											{!! Form::textarea('telanglectasiasPiernas', ($examenfisico['telanglectasiasPiernas']) ? $examenfisico['telanglectasiasPiernas'] : '', array('class'=>'form-control formulario', 'placeholder'=>'', 'cols' => '5', 'rows'=>'8')) !!}
										</div>
									</div>

									<div class="col-md-12">
										<label for="Id" class="col-md-6 text-left">
											Telanglectasias en Cara.
										</label>
										<div class="col-md-6">
											{!! Form::textarea('telanglectasiasCara', ($examenfisico['telanglectasiasCara']) ? $examenfisico['telanglectasiasCara'] : '', array('class'=>'form-control formulario', 'placeholder'=>'', 'cols' => '5', 'rows'=>'8')) !!}
										</div>
									</div>

									<div class="col-md-12">
										<label for="Id" class="col-md-6 text-left">
											Cicatrices.
										</label>
										<div class="col-md-6">
											{!! Form::textarea('cicatrices', ($examenfisico['cicatrices']) ? $examenfisico['cicatrices'] : '', array('class'=>'form-control formulario', 'placeholder'=>'', 'cols' => '5', 'rows'=>'8')) !!}
										</div>
									</div>

									<div class="col-md-12">
										<label for="Id" class="col-md-6 text-left">
											Cicatrices Hipertrofica.
										</label>
										<div class="col-md-6">
											{!! Form::textarea('cicatrizHipertrofica', ($examenfisico['cicatrizHipertrofica']) ? $examenfisico['cicatrizHipertrofica'] : '', array('class'=>'form-control formulario', 'placeholder'=>'', 'cols' => '5', 'rows'=>'8')) !!}
										</div>
									</div>

									<div class="col-md-12">
										<label for="Id" class="col-md-6 text-left">
											Cicatrices Queloide.
										</label>
										<div class="col-md-6">
											{!! Form::textarea('cicatrizQueloide', ($examenfisico['cicatrizQueloide']) ? $examenfisico['cicatrizQueloide'] : '',array('class'=>'form-control formulario', 'placeholder'=>'', 'cols' => '5', 'rows'=>'8')) !!}
										</div>
									</div>

									<div class="col-md-12">
										<label for="Id" class="col-md-6 text-left">
											Area
										</label>
										<div class="col-md-6">
											{!! Form::textarea('area', ($examenfisico['area']) ? $examenfisico['area'] : '', array('class'=>'form-control formulario', 'placeholder'=>'', 'cols' => '5', 'rows'=>'8')) !!}
										</div>
									</div>

									<div class="col-md-12">
										<label for="Id" class="col-md-6 text-left">
											Masas
										</label>
										<div class="col-md-6">
											{!! Form::textarea('masas', ($examenfisico['masas']) ? $examenfisico['masas'] : '', array('class'=>'form-control formulario', 'placeholder'=>'', 'cols' => '5', 'rows'=>'8')) !!}
										</div>
									</div>

									<div class="col-md-12">
										<h4 class="sub-title">ACUMULACION GRASA EN</h4>
									</div>

									<div class="col-md-12">
										<label for="Id" class="col-md-7 text-right">
											Abdomen
										</label>
										<div class="col-md-2 text-left">
											{!! Form::checkbox('examenFisicoAbdomen', '', ($examenfisico['examenFisicoAbdomen']) ? true : false, array('class'=>'checkTrueValidate')); !!}
										</div>
										<div class="col-md-3">

										</div>
									</div>

									<div class="col-md-12">
										<label for="Id" class="col-md-7 text-right">
											Flancos
										</label>
										<div class="col-md-2 text-left">
											{!! Form::checkbox('examenFisicoFlancos', '', ($examenfisico['examenFisicoFlancos']) ? true : false, array('class'=>'checkTrueValidate')); !!}
										</div>
										<div class="col-md-3">

										</div>
									</div>

									<div class="col-md-12">
										<label for="Id" class="col-md-7 text-right">
											Rollos Espalda.
										</label>
										<div class="col-md-2 text-left">
											{!! Form::checkbox('examenFisicoRollosEspalda', '', ($examenfisico['examenFisicoRollosEspalda']) ? true : false, array('class'=>'checkTrueValidate')); !!}
										</div>
										<div class="col-md-3">

										</div>
									</div>

									<div class="col-md-12">
										<label for="Id" class="col-md-7 text-right">
											Cara Lateral Muslos.
										</label>
										<div class="col-md-2 text-left">
											{!! Form::checkbox('caraLateralMuslos', '', ($examenfisico['caraLateralMuslos']) ? true : false, array('class'=>'checkTrueValidate')); !!}
										</div>
										<div class="col-md-3">

										</div>
									</div>

									<div class="col-md-12">
										<label for="Id" class="col-md-7 text-right">
											Cara Medial Muslos.
										</label>
										<div class="col-md-2 text-left">
											{!! Form::checkbox('caraMedialMuslos', '', ($examenfisico['caraMedialMuslos']) ? true : false, array('class'=>'checkTrueValidate')); !!}
										</div>
										<div class="col-md-3">

										</div>
									</div>

									<div class="col-md-12">
										<label for="Id" class="col-md-7 text-right">
											Brazos.
										</label>
										<div class="col-md-2 text-left">
											{!! Form::checkbox('examenFisicoBrazos', '', ($examenfisico['examenFisicoBrazos']) ? true : false, array('class'=>'checkTrueValidate')); !!}
										</div>
										<div class="col-md-3">

										</div>
									</div>

									<div class="col-md-12">
										<label for="Id" class="col-md-7 text-right">
											Papada.
										</label>
										<div class="col-md-2 text-left">
											{!! Form::checkbox('examenFisicoPapada', '', ($examenfisico['examenFisicoPapada']) ? true : false, array('class'=>'checkTrueValidate')); !!}
										</div>
										<div class="col-md-3">

										</div>
									</div>

									<div class="col-md-12">
										<label for="Id" class="col-md-7 text-right">
											Poco Proyeccion Gluteos.
										</label>
										<div class="col-md-2 text-left">
											{!! Form::checkbox('pocoProyeccionGluteos', '', ($examenfisico['pocoProyeccionGluteos']) ? true : false, array('class'=>'checkTrueValidate')); !!}
										</div>
										<div class="col-md-3">

										</div>
									</div>

									<div class="col-md-12">
										<label for="Id" class="col-md-7 text-right">
											Pectorales.
										</label>
										<div class="col-md-2 text-left">
											{!! Form::checkbox('examenFisicoPectorales', '', ($examenfisico['examenFisicoPectorales']) ? true : false, array('class'=>'checkTrueValidate')); !!}
										</div>
										<div class="col-md-3">

										</div>
									</div>

									<div class="col-md-12">
										<h4 class="sub-title text-center">CELULITIS</h4>
									</div>

									<div class="col-md-12">
										<label for="Id" class="col-md-5 text-left">

										</label>
										<div class="col-md-2 text-center">
											Leve
										</div>
										<div class="col-md-3 text-center">
											Moderada
										</div>
										<div class="col-md-2 text-center">
											Severa
										</div>
									</div>

									<div class="col-md-12">
										<label for="Id" class="col-md-5 text-right">
											Abdomen.
										</label>
										<div class="col-md-2 text-center">
											{!! Form::radio('celulitisAbdomen', '1', ($examenfisico['celulitisAbdomen'] == 1) ? true : false, array('class'=>'checkFalse')); !!}
										</div>
										<div class="col-md-3 text-center">
											{!! Form::radio('celulitisAbdomen', '2', ($examenfisico['celulitisAbdomen'] == 2) ? true : false, array('class'=>'checkFalse')); !!}
										</div>
										<div class="col-md-2 text-center">
											{!! Form::radio('celulitisAbdomen', '3', ($examenfisico['celulitisAbdomen'] == 3) ? true : false, array('class'=>'checkFalse')); !!}
										</div>
									</div>

									<div class="fcol-md-12">
										<label for="Id" class="col-md-5 text-right">
											Brazos.
										</label>
										<div class="col-md-2 text-center">
											{!! Form::radio('celulitisBrazos', '1', ($examenfisico['celulitisBrazos'] == 1) ? true : false, array('class'=>'checkFalse')); !!}
										</div>
										<div class="col-md-3 text-center">
											{!! Form::radio('celulitisBrazos', '2', ($examenfisico['celulitisBrazos'] == 2) ? true : false, array('class'=>'checkFalse')); !!}
										</div>
										<div class="col-md-2 text-center">
											{!! Form::radio('celulitisBrazos', '3', ($examenfisico['celulitisBrazos'] == 3) ? true : false, array('class'=>'checkFalse')); !!}
										</div>
									</div>

									<div class="col-md-12">
										<label for="Id" class="col-md-5 text-right">
											Muslos.
										</label>
										<div class="col-md-2 text-center">
											{!! Form::radio('celulitisMuslos', '1', ($examenfisico['celulitisMuslos'] == 1) ? true : false, array('class'=>'checkFalse')); !!}
										</div>
										<div class="col-md-3 text-center">
											{!! Form::radio('celulitisMuslos', '2', ($examenfisico['celulitisMuslos'] == 2) ? true : false, array('class'=>'checkFalse')); !!}
										</div>
										<div class="col-md-2 text-center">
											{!! Form::radio('celulitisMuslos', '3', ($examenfisico['celulitisMuslos'] == 3) ? true : false, array('class'=>'checkFalse')); !!}
										</div>
									</div>

									<div class="col-md-12">
										<label for="Id" class="col-md-5 text-right">
											Gluteos.
										</label>
										<div class="col-md-2 text-center">
											{!! Form::radio('celulitisGluteos', '1', ($examenfisico['celulitisGluteos'] == 1) ? true : false, array('class'=>'checkFalse')); !!}
										</div>
										<div class="col-md-3 text-center">
											{!! Form::radio('celulitisGluteos', '2', ($examenfisico['celulitisGluteos'] == 2) ? true : false, array('class'=>'checkFalse')); !!}
										</div>
										<div class="col-md-2 text-center">
											{!! Form::radio('celulitisGluteos', '3', ($examenfisico['celulitisGluteos'] == 3) ? true : false, array('class'=>'checkFalse')); !!}
										</div>
									</div>

									<div class="col-md-12">
										<h4 class="sub-title text-center">FLACIDEZ FRENTE A CADA UNO</h4>
									</div>

									<div class="col-md-12">
										<label for="Id" class="col-md-5 text-left">

										</label>
										<div class="col-md-2 text-center">
											Leve
										</div>
										<div class="col-md-3 text-center">
											Moderada
										</div>
										<div class="col-md-2 text-center">
											Severa
										</div>
									</div>

									<div class="col-md-12">
										<label for="Id" class="col-md-5 text-right">
											Abdomen.
										</label>
										<div class="col-md-2 text-center">
											{!! Form::radio('flacidezAbdomen', '1', ($examenfisico['flacidezAbdomen'] == 1) ? true : false, array('class'=>'checkFalse')); !!}
										</div>
										<div class="col-md-3 text-center">
											{!! Form::radio('flacidezAbdomen', '2', ($examenfisico['flacidezAbdomen'] == 2) ? true : false, array('class'=>'checkFalse')); !!}
										</div>
										<div class="col-md-2 text-center">
											{!! Form::radio('flacidezAbdomen', '3', ($examenfisico['flacidezAbdomen'] == 3) ? true : false, array('class'=>'checkFalse')); !!}
										</div>
									</div>

									<div class="col-md-12">
										<label for="Id" class="col-md-5 text-right">
											Brazos.
										</label>
										<div class="col-md-2 text-center">
											{!! Form::radio('flacidezBrazos', '1', ($examenfisico['flacidezBrazos'] == 1) ? true : false, array('class'=>'checkFalse')); !!}
										</div>
										<div class="col-md-3 text-center">
											{!! Form::radio('flacidezBrazos', '2', ($examenfisico['flacidezBrazos'] == 2) ? true : false, array('class'=>'checkFalse')); !!}
										</div>
										<div class="col-md-2 text-center">
											{!! Form::radio('flacidezBrazos', '3', ($examenfisico['flacidezBrazos'] == 3) ? true : false, array('class'=>'checkFalse')); !!}
										</div>
									</div>

									<div class="col-md-12">
										<label for="Id" class="col-md-5 text-right">
											Rollos Espalda.
										</label>
										<div class="col-md-2 text-center">
											{!! Form::radio('flacidezRollosEspalda', '1', ($examenfisico['flacidezRollosEspalda'] == 1) ? true : false, array('class'=>'checkFalse')); !!}
										</div>
										<div class="col-md-3 text-center">
											{!! Form::radio('flacidezRollosEspalda', '2', ($examenfisico['flacidezRollosEspalda'] == 2) ? true : false, array('class'=>'checkFalse')); !!}
										</div>
										<div class="col-md-2 text-center">
											{!! Form::radio('flacidezRollosEspalda', '3', ($examenfisico['flacidezRollosEspalda'] == 3) ? true : false, array('class'=>'checkFalse')); !!}
										</div>
									</div>

									<div class="col-md-12">
										<label for="Id" class="col-md-5 text-right">
											Flancos.
										</label>
										<div class="col-md-2 text-center">
											{!! Form::radio('flacidezFlancos', '1', ($examenfisico['flacidezFlancos'] == 1) ? true : false, array('class'=>'checkFalse')); !!}
										</div>
										<div class="col-md-3 text-center">
											{!! Form::radio('flacidezFlancos', '2', ($examenfisico['flacidezFlancos'] == 2) ? true : false, array('class'=>'checkFalse')); !!}
										</div>
										<div class="col-md-2 text-center">
											{!! Form::radio('flacidezFlancos', '3', ($examenfisico['flacidezFlancos'] == 3) ? true : false, array('class'=>'checkFalse')); !!}
										</div>
									</div>

									<div class="col-md-12">
										<label for="Id" class="col-md-5 text-right">
											Gluteos.
										</label>
										<div class="col-md-2 text-center">
											{!! Form::radio('flacidezGluteos', '1', ($examenfisico['flacidezGluteos'] == 1) ? true : false, array('class'=>'checkFalse')); !!}
										</div>
										<div class="col-md-3 text-center">
											{!! Form::radio('flacidezGluteos', '2', ($examenfisico['flacidezGluteos'] == 2) ? true : false, array('class'=>'checkFalse')); !!}
										</div>
										<div class="col-md-2 text-center">
											{!! Form::radio('flacidezGluteos', '3', ($examenfisico['flacidezGluteos'] == 3) ? true : false, array('class'=>'checkFalse')); !!}
										</div>
									</div>

									<div class="col-md-12">
										<label for="Id" class="col-md-5 text-right">
											Entrepiernas.
										</label>
										<div class="col-md-2 text-center">
											{!! Form::radio('flacidezEntrepiernas', '1', ($examenfisico['flacidezEntrepiernas'] == 1) ? true : false, array('class'=>'checkFalse')); !!}
										</div>
										<div class="col-md-3 text-center">
											{!! Form::radio('flacidezEntrepiernas', '2', ($examenfisico['flacidezEntrepiernas'] == 2) ? true : false, array('class'=>'checkFalse')); !!}
										</div>
										<div class="col-md-2 text-center">
											{!! Form::radio('flacidezEntrepiernas', '3', ($examenfisico['flacidezEntrepiernas'] == 3) ? true : false, array('class'=>'checkFalse')); !!}
										</div>
									</div>

									<div class="col-md-12">
										<label for="Id" class="col-md-5 text-right">
											Muslos.
										</label>
										<div class="col-md-2 text-center">
											{!! Form::radio('flacidezMuslos', '1', ($examenfisico['flacidezMuslos'] == 1) ? true : false, array('class'=>'checkFalse')); !!}
										</div>
										<div class="col-md-3 text-center">
											{!! Form::radio('flacidezMuslos', '2', ($examenfisico['flacidezMuslos'] == 1) ? true : false, array('class'=>'checkFalse')); !!}
										</div>
										<div class="col-md-2 text-center">
											{!! Form::radio('flacidezMuslos', '3', ($examenfisico['flacidezMuslos'] == 1) ? true : false, array('class'=>'checkFalse')); !!}
										</div>
									</div>

									<div class="col-md-12">
										<h4 class="sub-title text-center">REJUVENECIMIENTO</h4>
									</div>

									<div class="col-md-12">
										<label for="Id" class="col-md-5 text-left">

										</label>
										<div class="col-md-2 text-center">
											Frente
										</div>
										<div class="col-md-3 text-center">
											Patas de Gallina
										</div>
										<div class="col-md-2 text-center">
											Entrecejo
										</div>
									</div>

									<div class="col-md-12">
										<label for="Id" class="col-md-5 text-right">
											Lineas Expresion Pronunciadas en
										</label>
										<div class="col-md-2 text-center">
											{!! Form::radio('lineasExpresionPronunciadas', '1', ($examenfisico['lineasExpresionPronunciadas'] == 1) ? true : false, array('class'=>'checkFalse')); !!}
										</div>
										<div class="col-md-3 text-center">
											{!! Form::radio('lineasExpresionPronunciadas', '2', ($examenfisico['lineasExpresionPronunciadas'] == 2) ? true : false, array('class'=>'checkFalse')); !!}
										</div>
										<div class="col-md-2 text-center">
											{!! Form::radio('lineasExpresionPronunciadas', '3', ($examenfisico['lineasExpresionPronunciadas'] == 3) ? true : false, array('class'=>'checkFalse')); !!}
										</div>
									</div>

									<div class="col-md-12">
										<label for="Id" class="col-md-5 text-left">

										</label>
										<div class="col-md-2 text-center">
											Leve
										</div>
										<div class="col-md-3 text-center">
											Moderada
										</div>
										<div class="col-md-2 text-center">
											Severa
										</div>
									</div>

									<div class="col-md-12">
										<label for="Id" class="col-md-5 text-right">
											fotodano
										</label>
										<div class="col-md-2 text-center">
											{!! Form::radio('fotodano', '1', ($examenfisico['fotodano'] == 1) ? true : false, array('class'=>'checkFalse')); !!}
										</div>
										<div class="col-md-3 text-center">
											{!! Form::radio('fotodano', '2', ($examenfisico['fotodano'] == 2) ? true : false, array('class'=>'checkFalse')); !!}
										</div>
										<div class="col-md-2 text-center">
											{!! Form::radio('fotodano', '3', ($examenfisico['fotodano'] == 3) ? true : false, array('class'=>'checkFalse')); !!}
										</div>
									</div>

									<div class="col-md-12">
										<label for="Id" class="col-md-5 text-right">
											Protesis Cola de Ceja
										</label>
										<div class="col-md-2 text-center">
											{!! Form::radio('protesisColaCeja', '1', ($examenfisico['protesisColaCeja'] == 1) ? true : false, array('class'=>'checkFalse')); !!}
										</div>
										<div class="col-md-3 text-center">
											{!! Form::radio('protesisColaCeja', '2', ($examenfisico['protesisColaCeja'] == 2) ? true : false, array('class'=>'checkFalse')); !!}
										</div>
										<div class="col-md-2 text-center">
											{!! Form::radio('protesisColaCeja', '3', ($examenfisico['protesisColaCeja'] == 3) ? true : false, array('class'=>'checkFalse')); !!}
										</div>
									</div>

									<div class="col-md-12">
										<label for="Id" class="col-md-5 text-right">
											Cojin Mala Atrofico y Ptosico
										</label>
										<div class="col-md-2 text-center">
											{!! Form::radio('cojinMalaAtroficoPsico', '1', ($examenfisico['cojinMalaAtroficoPsico'] == 1) ? true : false, array('class'=>'checkFalse')); !!}
										</div>
										<div class="col-md-3 text-center">
											{!! Form::radio('cojinMalaAtroficoPsico', '2', ($examenfisico['cojinMalaAtroficoPsico'] == 2) ? true : false, array('class'=>'checkFalse')); !!}
										</div>
										<div class="col-md-2 text-center">
											{!! Form::radio('cojinMalaAtroficoPsico', '3', ($examenfisico['cojinMalaAtroficoPsico'] == 3) ? true : false, array('class'=>'checkFalse')); !!}
										</div>
									</div>

									<div class="col-md-12">
										<label for="Id" class="col-md-5 text-right">
											Flacidez Cara
										</label>
										<div class="col-md-2 text-center">
											{!! Form::radio('rejuvecimientoFlacidezCara', '1', ($examenfisico['rejuvecimientoFlacidezCara'] == 1) ? true : false, array('class'=>'checkFalse')); !!}
										</div>
										<div class="col-md-3 text-center">
											{!! Form::radio('rejuvecimientoFlacidezCara', '2', ($examenfisico['rejuvecimientoFlacidezCara'] == 2) ? true : false, array('class'=>'checkFalse')); !!}
										</div>
										<div class="col-md-2 text-center">
											{!! Form::radio('rejuvecimientoFlacidezCara', '3', ($examenfisico['rejuvecimientoFlacidezCara'] == 3) ? true : false, array('class'=>'checkFalse')); !!}
										</div>
									</div>

									<div class="col-md-12">
										<label for="Id" class="col-md-5 text-right">
											Flacidez Cuello
										</label>
										<div class="col-md-2 text-center">
											{!! Form::radio('rejuvecimientoFlacidezCuello', '1', ($examenfisico['rejuvecimientoFlacidezCuello'] == 1) ? true : false, array('class'=>'checkFalse')); !!}
										</div>
										<div class="col-md-3 text-center">
											{!! Form::radio('rejuvecimientoFlacidezCuello', '2', ($examenfisico['rejuvecimientoFlacidezCuello'] == 2) ? true : false, array('class'=>'checkFalse')); !!}
										</div>
										<div class="col-md-2 text-center">
											{!! Form::radio('rejuvecimientoFlacidezCuello', '3', ($examenfisico['rejuvecimientoFlacidezCuello'] == 3) ? true : false, array('class'=>'checkFalse')); !!}
										</div>
									</div>

									<div class="col-md-12">
										<label for="Id" class="col-md-5 text-right">
											Jowls Pronunciados
										</label>
										<div class="col-md-2 text-center">
											{!! Form::radio('rejuvecimientoJowlsPronunciados', '1', ($examenfisico['rejuvecimientoJowlsPronunciados'] == 1) ? true : false, array('class'=>'checkFalse')); !!}
										</div>
										<div class="col-md-3 text-center">
											{!! Form::radio('rejuvecimientoJowlsPronunciados', '2', ($examenfisico['rejuvecimientoJowlsPronunciados'] == 2) ? true : false, array('class'=>'checkFalse')); !!}
										</div>
										<div class="col-md-2 text-center">
											{!! Form::radio('rejuvecimientoJowlsPronunciados', '3', ($examenfisico['rejuvecimientoJowlsPronunciados'] == 3) ? true : false, array('class'=>'checkFalse')); !!}
										</div>
									</div>

									<div class="col-md-12">
										<label for="Id" class="col-md-5 text-right">
											Surcos Nasogenianos
										</label>
										<div class="col-md-2 text-center">
											{!! Form::radio('rejuvecimientoSurcosNasogenianos', '1', ($examenfisico['rejuvecimientoSurcosNasogenianos'] == 1) ? true : false, array('class'=>'checkFalse')); !!}
										</div>
										<div class="col-md-3 text-center">
											{!! Form::radio('rejuvecimientoSurcosNasogenianos', '2', ($examenfisico['rejuvecimientoSurcosNasogenianos'] == 2) ? true : false, array('class'=>'checkFalse')); !!}
										</div>
										<div class="col-md-2 text-center">
											{!! Form::radio('rejuvecimientoSurcosNasogenianos', '3', ($examenfisico['rejuvecimientoSurcosNasogenianos'] == 3) ? true : false, array('class'=>'checkFalse')); !!}
										</div>
									</div>

									<div class="col-md-12">
										<label for="Id" class="col-md-5 text-right">
											Surcos Marioneta
										</label>
										<div class="col-md-2 text-center">
											{!! Form::radio('rejuvecimientoSurcosMarioneta', '1', ($examenfisico['rejuvecimientoSurcosMarioneta'] == 1) ? true : false, array('class'=>'checkFalse')); !!}
										</div>
										<div class="col-md-3 text-center">
											{!! Form::radio('rejuvecimientoSurcosMarioneta', '2', ($examenfisico['rejuvecimientoSurcosMarioneta'] == 2) ? true : false, array('class'=>'checkFalse')); !!}
										</div>
										<div class="col-md-2 text-center">
											{!! Form::radio('rejuvecimientoSurcosMarioneta', '3', ($examenfisico['rejuvecimientoSurcosMarioneta'] == 3) ? true : false, array('class'=>'checkFalse')); !!}
										</div>
									</div>

									<div class="col-md-12">
										<label for="Id" class="col-md-5 text-right">
											Codigo de Barras en Labios
										</label>
										<div class="col-md-2 text-center">
											{!! Form::radio('rejuvecimientoCodigoBarrasLabios', '1', ($examenfisico['rejuvecimientoCodigoBarrasLabios'] == 1) ? true : false, array('class'=>'checkFalse')); !!}
										</div>
										<div class="col-md-3 text-center">
											{!! Form::radio('rejuvecimientoCodigoBarrasLabios', '2', ($examenfisico['rejuvecimientoCodigoBarrasLabios'] == 2) ? true : false, array('class'=>'checkFalse')); !!}
										</div>
										<div class="col-md-2 text-center">
											{!! Form::radio('rejuvecimientoCodigoBarrasLabios', '3', ($examenfisico['rejuvecimientoCodigoBarrasLabios'] == 3) ? true : false, array('class'=>'checkFalse')); !!}
										</div>
									</div>

									<div class="col-md-12">
										<label for="Id" class="col-md-5 text-right">
											Hiperpigmentacion Piel Cara
										</label>
										<div class="col-md-2 text-center">
											{!! Form::radio('hiperpigmentacionPielCara', '1', ($examenfisico['hiperpigmentacionPielCara'] == 1) ? true : false, array('class'=>'checkFalse')); !!}
										</div>
										<div class="col-md-3 text-center">
											{!! Form::radio('hiperpigmentacionPielCara', '2', ($examenfisico['hiperpigmentacionPielCara'] == 2) ? true : false, array('class'=>'checkFalse')); !!}
										</div>
										<div class="col-md-2 text-center">
											{!! Form::radio('hiperpigmentacionPielCara', '3', ($examenfisico['hiperpigmentacionPielCara'] == 3) ? true : false, array('class'=>'checkFalse')); !!}
										</div>
									</div>

									<div class="col-md-12">
										<label for="Id" class="col-md-5 text-right">
											Secuelas Acne
										</label>
										<div class="col-md-2 text-center">
											{!! Form::radio('rejuvecimientoSecuelasAcne', '1', ($examenfisico['rejuvecimientoSecuelasAcne'] == 1) ? true : false, array('class'=>'checkFalse')); !!}
										</div>
										<div class="col-md-3 text-center">
											{!! Form::radio('rejuvecimientoSecuelasAcne', '2', ($examenfisico['rejuvecimientoSecuelasAcne'] == 2) ? true : false, array('class'=>'checkFalse')); !!}
										</div>
										<div class="col-md-2 text-center">
											{!! Form::radio('rejuvecimientoSecuelasAcne', '3', ($examenfisico['rejuvecimientoSecuelasAcne'] == 3) ? true : false, array('class'=>'checkFalse')); !!}
										</div>
									</div>


									<div class="col-md-12">
										<label for="Id" class="col-md-5 text-right">
											FLACIDEZ EN FRENTE A CADA UNO
										</label>
										<div class="col-md-2 text-center">
											Leve
										</div>
										<div class="col-md-3 text-center">
											Moderada
										</div>
										<div class="col-md-2 text-center">
											Severa
										</div>
									</div>

									<div class="col-md-12">
										<label for="Id" class="col-md-5 text-right">
											Mejillas
										</label>
										<div class="col-md-2 text-center">
											{!! Form::radio('flacidezEnfrenteMejillas', '1', ($examenfisico['flacidezEnfrenteMejillas'] == 1) ? true : false, array('class'=>'checkFalse')); !!}
										</div>
										<div class="col-md-3 text-center">
											{!! Form::radio('flacidezEnfrenteMejillas', '2', ($examenfisico['flacidezEnfrenteMejillas'] == 2) ? true : false, array('class'=>'checkFalse')); !!}
										</div>
										<div class="col-md-2 text-center">
											{!! Form::radio('flacidezEnfrenteMejillas', '3', ($examenfisico['flacidezEnfrenteMejillas'] == 3) ? true : false, array('class'=>'checkFalse')); !!}
										</div>
									</div>

									<div class="col-md-12">
										<label for="Id" class="col-md-5 text-right">
											Cuello
										</label>
										<div class="col-md-2 text-center">
											{!! Form::radio('flacidezEnfrenteCuello', '1', ($examenfisico['flacidezEnfrenteCuello'] == 1) ? true : false, array('class'=>'checkFalse')); !!}
										</div>
										<div class="col-md-3 text-center">
											{!! Form::radio('flacidezEnfrenteCuello', '2', ($examenfisico['flacidezEnfrenteCuello'] == 2) ? true : false, array('class'=>'checkFalse')); !!}
										</div>
										<div class="col-md-2 text-center">
											{!! Form::radio('flacidezEnfrenteCuello', '3', ($examenfisico['flacidezEnfrenteCuello'] == 3) ? true : false, array('class'=>'checkFalse')); !!}
										</div>
									</div>

									<div class="col-md-12">
										<label for="Id" class="col-md-5 text-right">
											Lineas de Mandibula
										</label>
										<div class="col-md-2 text-center">
											{!! Form::radio('flacidezEnfrenteLineasMandibula', '1', ($examenfisico['flacidezEnfrenteLineasMandibula'] == 1) ? true : false, array('class'=>'checkFalse')); !!}
										</div>
										<div class="col-md-3 text-center">
											{!! Form::radio('flacidezEnfrenteLineasMandibula', '2', ($examenfisico['flacidezEnfrenteLineasMandibula'] == 2) ? true : false, array('class'=>'checkFalse')); !!}
										</div>
										<div class="col-md-2 text-center">
											{!! Form::radio('flacidezEnfrenteLineasMandibula', '3', ($examenfisico['flacidezEnfrenteLineasMandibula'] == 3) ? true : false, array('class'=>'checkFalse')); !!}
										</div>
									</div>

									<div class="col-md-12">
										<label for="Id" class="col-md-5 text-right">
											Acumulo Graso en papada
										</label>
										<div class="col-md-2 text-center">
											{!! Form::radio('acumuloGrasoEmpapada', '1', ($examenfisico['acumuloGrasoEmpapada'] == 1) ? true : false, array('class'=>'checkFalse')); !!}
										</div>
										<div class="col-md-3 text-center">
											{!! Form::radio('acumuloGrasoEmpapada', '2', ($examenfisico['acumuloGrasoEmpapada'] == 2) ? true : false, array('class'=>'checkFalse')); !!}
										</div>
										<div class="col-md-2 text-center">
											{!! Form::radio('acumuloGrasoEmpapada', '3', ($examenfisico['acumuloGrasoEmpapada'] == 3) ? true : false, array('class'=>'checkFalse')); !!}
										</div>
									</div>


									<div class="col-md-12">
										<label for="Id" class="col-md-3 text-right">
											TIPO DE PIEL
										</label>
										<label for="Id" class="col-md-3 text-right">
											Fitzpatrick
										</label>
										<div class="col-md-1 text-center">
											1 {!! Form::radio('tipoPiel', '1', ($examenfisico['tipoPiel'] == 1) ? true : false, array('class'=>'checkFalse')); !!}
										</div>
										<div class="col-md-1 text-center">
											2 {!! Form::radio('tipoPiel', '2', ($examenfisico['tipoPiel'] == 2) ? true : false, array('class'=>'checkFalse')); !!}
										</div>
										<div class="col-md-1 text-center">
											3 {!! Form::radio('tipoPiel', '3', ($examenfisico['tipoPiel'] == 3) ? true : false, array('class'=>'checkFalse')); !!}
										</div>
										<div class="col-md-1 text-center">
											4 {!! Form::radio('tipoPiel', '4', ($examenfisico['tipoPiel'] == 4) ? true : false, array('class'=>'checkFalse')); !!}
										</div>
										<div class="col-md-1 text-center">
											5 {!! Form::radio('tipoPiel', '5', ($examenfisico['tipoPiel'] == 5) ? true : false, array('class'=>'checkFalse')); !!}
										</div>
										<div class="col-md-1 text-center">
											6 {!! Form::radio('tipoPiel', '6', ($examenfisico['tipoPiel'] == 6) ? true : false, array('class'=>'checkFalse')); !!}
										</div>
									</div>


									<div class="col-md-12">
										<div class="col-md-4">

										</div>
										<label for="Id" class="col-md-8 text-left">
											SURCOS
										</label>
									</div>

									<div class="col-md-12">
										<div class="col-md-4">

										</div>
										<label for="Id" class="col-md-4 text-left">
											Frente.
										</label>
										<div class="col-md-2 text-left">
											{!! Form::checkbox('surcosFrente', '1', ($examenfisico['surcosFrente'] == '1') ? true : false, array('class'=>'checkTrueValidate')); !!}
										</div>
										<div class="col-md-2">

										</div>
									</div>

									<div class="col-md-12">
										<div class="col-md-4">

										</div>
										<label for="Id" class="col-md-4 text-left">
											Entrecejo.
										</label>
										<div class="col-md-2 text-left">
											{!! Form::checkbox('surcosEntrecejo', '1', ($examenfisico['surcosEntrecejo'] == '1') ? true : false, array('class'=>'checkTrueValidate')); !!}
										</div>
										<div class="col-md-2">

										</div>
									</div>

									<div class="col-md-12">
										<div class="col-md-4">

										</div>
										<label for="Id" class="col-md-4 text-left">
											Nasoyugales.
										</label>
										<div class="col-md-2 text-left">
											{!! Form::checkbox('surcosNasoyugales', '1', ($examenfisico['surcosNasoyugales'] == '1') ? true : false, array('class'=>'checkTrueValidate')); !!}
										</div>
										<div class="col-md-2">

										</div>
									</div>

									<div class="col-md-12">
										<div class="col-md-4">

										</div>
										<label for="Id" class="col-md-4 text-left">
											Nasogenianos.
										</label>
										<div class="col-md-2 text-left">
											{!! Form::checkbox('surcosNasogenianos', '1', ($examenfisico['surcosNasogenianos'] == '1') ? true : false, array('class'=>'checkTrueValidate')); !!}
										</div>
										<div class="col-md-2">

										</div>
									</div>

									<div class="col-md-12">
										<div class="col-md-4">

										</div>
										<label for="Id" class="col-md-4 text-left">
											Marioneta.
										</label>
										<div class="col-md-2 text-left">
											{!! Form::checkbox('surcosMarioneta', '1', ($examenfisico['surcosMarioneta'] == '1') ? true : false, array('class'=>'checkTrueValidate')); !!}
										</div>
										<div class="col-md-2">

										</div>
									</div>

									<div class="col-md-12">
										<label for="Id" class="col-md-5 text-right">

										</label>
										<div class="col-md-2 text-center">
											Leve
										</div>
										<div class="col-md-3 text-center">
											Moderada
										</div>
										<div class="col-md-2 text-center">
											Severa
										</div>
									</div>

									<div class="col-md-12">
										<label for="Id" class="col-md-5 text-right">
											Fotodano y calidad piel cara
										</label>
										<div class="col-md-2 text-center">
											{!! Form::radio('fotodanoCalidadPielCara', '1', ($examenfisico['fotodanoCalidadPielCara'] == 1) ? true : false, array('class'=>'checkFalse')); !!}
										</div>
										<div class="col-md-3 text-center">
											{!! Form::radio('fotodanoCalidadPielCara', '2', ($examenfisico['fotodanoCalidadPielCara'] == 2) ? true : false, array('class'=>'checkFalse')); !!}
										</div>
										<div class="col-md-2 text-center">
											{!! Form::radio('fotodanoCalidadPielCara', '3', ($examenfisico['fotodanoCalidadPielCara'] == 3) ? true : false, array('class'=>'checkFalse')); !!}
										</div>
									</div>

									<div class="col-md-12">
										<label for="Id" class="col-md-5 text-right">
											Ritidez Parpado Inferior
										</label>
										<div class="col-md-2 text-center">
											{!! Form::radio('ritidezParpadoInferior', '1', ($examenfisico['ritidezParpadoInferior'] == 1) ? true : false, array('class'=>'checkFalse')); !!}
										</div>
										<div class="col-md-3 text-center">
											{!! Form::radio('ritidezParpadoInferior', '2', ($examenfisico['ritidezParpadoInferior'] == 2) ? true : false, array('class'=>'checkFalse')); !!}
										</div>
										<div class="col-md-2 text-center">
											{!! Form::radio('ritidezParpadoInferior', '3', ($examenfisico['ritidezParpadoInferior'] == 3) ? true : false, array('class'=>'checkFalse')); !!}
										</div>
									</div>

									<div class="col-md-12">
										<label for="Id" class="col-md-5 text-right">
											Ritidez Mejillas
										</label>
										<div class="col-md-2 text-center">
											{!! Form::radio('ritidezMejillas', '1', ($examenfisico['ritidezMejillas'] == 1) ? true : false, array('class'=>'checkFalse')); !!}
										</div>
										<div class="col-md-3 text-center">
											{!! Form::radio('ritidezMejillas', '2', ($examenfisico['ritidezMejillas'] == 2) ? true : false, array('class'=>'checkFalse')); !!}
										</div>
										<div class="col-md-2 text-center">
											{!! Form::radio('ritidezMejillas', '3', ($examenfisico['ritidezMejillas'] == 3) ? true : false, array('class'=>'checkFalse')); !!}
										</div>
									</div>

									<div class="col-md-12">
										<h4 class="sub-title text-center">OREJAS</h4>
									</div>

									<div class="col-md-12">
										<label for="Id" class="col-md-5 text-left">

										</label>
										<div class="col-md-2 text-center">
											Leve
										</div>
										<div class="col-md-3 text-center">
											Moderada
										</div>
										<div class="col-md-2 text-center">
											Severa
										</div>
									</div>

									<div class="col-md-12">
										<label for="Id" class="col-md-5 text-right">
											Mala Definicion del Antihelix
										</label>
										<div class="col-md-2 text-center">
											{!! Form::radio('malaDefinicionAntihelix', '1', ($examenfisico['malaDefinicionAntihelix'] == 1) ? true : false, array('class'=>'checkFalse')); !!}
										</div>
										<div class="col-md-3 text-center">
											{!! Form::radio('malaDefinicionAntihelix', '2', ($examenfisico['malaDefinicionAntihelix'] == 2) ? true : false, array('class'=>'checkFalse')); !!}
										</div>
										<div class="col-md-2 text-center">
											{!! Form::radio('malaDefinicionAntihelix', '3', ($examenfisico['malaDefinicionAntihelix'] == 3) ? true : false, array('class'=>'checkFalse')); !!}
										</div>
									</div>

									<div class="col-md-12">
										<label for="Id" class="col-md-5 text-right">
											Hipertrofia Concha
										</label>
										<div class="col-md-2 text-center">
											{!! Form::radio('rejuvecimientoHipertrofiaConcha', '1', ($examenfisico['rejuvecimientoHipertrofiaConcha'] == 1) ? true : false, array('class'=>'checkFalse')); !!}
										</div>
										<div class="col-md-3 text-center">
											{!! Form::radio('rejuvecimientoHipertrofiaConcha', '2', ($examenfisico['rejuvecimientoHipertrofiaConcha'] == 2) ? true : false, array('class'=>'checkFalse')); !!}
										</div>
										<div class="col-md-2 text-center">
											{!! Form::radio('rejuvecimientoHipertrofiaConcha', '3', ($examenfisico['rejuvecimientoHipertrofiaConcha'] == 3) ? true : false, array('class'=>'checkFalse')); !!}
										</div>
									</div>

									<div class="col-md-12">
										<label for="Id" class="col-md-5 text-right">
											Asimetria Forma y Tama&ntilde;o
										</label>
										<div class="col-md-2 text-center">
											{!! Form::radio('asimetriaFormaTomano', '1', ($examenfisico['asimetriaFormaTomano'] == 1) ? true : false, array('class'=>'checkFalse')); !!}
										</div>
										<div class="col-md-3 text-center">
											{!! Form::radio('asimetriaFormaTomano', '2', ($examenfisico['asimetriaFormaTomano'] == 2) ? true : false, array('class'=>'checkFalse')); !!}
										</div>
										<div class="col-md-2 text-center">
											{!! Form::radio('asimetriaFormaTomano', '3', ($examenfisico['asimetriaFormaTomano'] == 3) ? true : false, array('class'=>'checkFalse')); !!}
										</div>
									</div>

								</div>
								<!-- FIN EXAMEN FISICO -->


								<!-- INICIO TRATAMIENTO -->


								<div class="tab-pane col-md-12" id="tratamiento">

									<div class="modal-header sub-encuesta">
										<h4 class="sub-title">TRATAMIENTO</h4>
									</div>


									<div class="col-md-12">
										<div class="col-md-2 text-left">
											{!! Form::checkbox('cirugiaPostparto', '1', ($tratamiento['cirugiaPostparto']) ? true : false, array('class'=>'checkTrueValidate')); !!}
										</div>
										<label for="Id" class="col-md-10 text-left">
											Cirugia Postparto.
										</label>
									</div>

									<div class="col-md-12">
										<div class="col-md-2 text-left">
											{!! Form::checkbox('lipoesculturaAsistidaUltrasonido', '1', ($tratamiento['lipoesculturaAsistidaUltrasonido']) ? true : false, array('class'=>'checkTrueValidate')); !!}
										</div>
										<label for="Id" class="col-md-10 text-left">
											Lipoescultura Asistida Ultrasonido.
										</label>
									</div>

									<div class="col-md-12">
										<div class="col-md-2 text-left">
											{!! Form::checkbox('lipoinyeccionGluteosTrocontericas', '1', ($tratamiento['lipoinyeccionGluteosTrocontericas']) ? true : false, array('class'=>'checkTrueValidate')); !!}
										</div>
										<label for="Id" class="col-md-10 text-left">
											Lipoinyeccion Gluteos Trocontericas.
										</label>
									</div>

									<div class="col-md-12">
										<div class="col-md-2 text-left">
											{!! Form::checkbox('abdominoplastia', '1', ($tratamiento['abdominoplastia']) ? true : false, array('class'=>'checkTrueValidate')); !!}
										</div>
										<label for="Id" class="col-md-10 text-left">
											Abdominoplastia.
										</label>
									</div>

									<div class="col-md-12">
										<div class="col-md-2 text-left">
											{!! Form::checkbox('mamoplastiaAumentoImplantes', '1', ($tratamiento['mamoplastiaAumentoImplantes']) ? true : false, array('class'=>'checkTrueValidate')); !!}
										</div>
										<label for="Id" class="col-md-10 text-left">
											Mamoplastia Aumento con Implantes de silicona.
										</label>
									</div>

									<div class="col-md-12">
										<div class="col-md-2 text-left">
											{!! Form::checkbox('cambioImplantesMamarios', '1', ($tratamiento['cambioImplantesMamarios']) ? true : false, array('class'=>'checkTrueValidate')); !!}
										</div>
										<label for="Id" class="col-md-10 text-left">
											Cambio de Implantes Mamarios.
										</label>
									</div>

									<div class="col-md-12">
										<div class="col-md-2 text-left">
											{!! Form::checkbox('mamoplastiaReduccion', '1', ($tratamiento['mamoplastiaReduccion']) ? true : false, array('class'=>'checkTrueValidate')); !!}
										</div>
										<label for="Id" class="col-md-10 text-left">
											Mamoplastia Reduccion.
										</label>
									</div>


									<div class="col-md-12">
										<div class="col-md-2 text-left">
											{!! Form::checkbox('pexiaMamaria', '', false, array('class'=>'checkPrexia')); !!}
										</div>
										<label for="Id" class="col-md-10 text-left">
											Pexia Mamaria.
										</label>
									</div>


									<div class="col-md-12">
										<div class="col-md-2">

										</div>
										<div class="col-md-1 text-left">
											{!! Form::checkbox('pexiaMamariaCicatrizPeriareoral', '1', ($tratamiento['pexiaMamariaCicatrizPeriareoral']) ? true : false, array('class'=>'checkValidatePrexia', 'disabled'=>'disabled')); !!}
										</div>
										<label for="Id" class="col-md-9 text-left">
											Cicatriz Periareoral.
										</label>
									</div>

									<div class="col-md-12">
										<div class="col-md-2">

										</div>
										<div class="col-md-1 text-left">
											{!! Form::checkbox('pexiaMamariaTInvertida', '1', ($tratamiento['pexiaMamariaTInvertida']) ? true : false, array('class'=>'checkValidatePrexia', 'disabled'=>'disabled')); !!}
										</div>
										<label for="Id" class="col-md-9 text-left">
											T Invertida.
										</label>
									</div>

									<div class="col-md-12">
										<div class="col-md-2">

										</div>
										<div class="col-md-1 text-left">
											{!! Form::checkbox('pexiaMamariaVertical', '1', ($tratamiento['pexiaMamariaVertical']) ? true : false, array('class'=>'checkValidatePrexia', 'disabled'=>'disabled')); !!}
										</div>
										<label for="Id" class="col-md-9 text-left">
											Vertical.
										</label>
									</div>

									<div class="col-md-12">
										<div class="col-md-2">

										</div>
										<div class="col-md-1 text-left">
											{!! Form::checkbox('pexiaMamariaHemiareoralSuperior', '1', ($tratamiento['pexiaMamariaHemiareoralSuperior']) ? true : false, array('class'=>'checkValidatePrexia','disabled'=>'disabled')); !!}
										</div>
										<label for="Id" class="col-md-9 text-left">
											Hemiareoral Superior.
										</label>
									</div>

									<div class="col-md-12">
										<div class="col-md-2">

										</div>
										<div class="col-md-1 text-left">
											{!! Form::checkbox('pexiaMamariaHemiareoralInferior', '1', ($tratamiento['pexiaMamariaHemiareoralInferior']) ? true : false, array('class'=>'checkValidatePrexia','disabled'=>'disabled')); !!}
										</div>
										<label for="Id" class="col-md-9 text-left">
											Hemiareoral Inferior.
										</label>
									</div>

									<div class="col-md-12">
										<div class="col-md-2">

										</div>
										<div class="col-md-1 text-left">
											{!! Form::checkbox('pexiaMamariaDecidiraEnCirujia', '1', ($tratamiento['pexiaMamariaDecidiraEnCirujia']) ? true : false, array('class'=>'checkValidatePrexia', 'disabled'=>'disabled')); !!}
										</div>
										<label for="Id" class="col-md-9 text-left">
											Se Decidira En Cirugia.
										</label>
									</div>

									<div class="col-md-12">
										<div class="col-md-2">

										</div>
										<div class="col-md-1 text-left">
											{!! Form::checkbox('pexiaMamariaConImplantesSilicona', '1', ($tratamiento['pexiaMamariaConImplantesSilicona']) ? true : false, array('class'=>'checkValidatePrexia', 'disabled'=>'disabled')); !!}
										</div>
										<label for="Id" class="col-md-4 text-left">
											Con Implantes Silicona.
										</label>

										<div class="col-md-1 text-left">
											{!! Form::checkbox('pexiaMamariaSinImplantesSilicona', '1', ($tratamiento['pexiaMamariaSinImplantesSilicona']) ? true : false, array('class'=>'checkValidatePrexia', 'disabled'=>'disabled')); !!}
										</div>
										<label for="Id" class="col-md-4 text-left">
											Sin Implantes Silicona.
										</label>
									</div>

									<br>

									<div class="col-md-12">
										<div class="col-md-1 text-left">
											{!! Form::checkbox('gluteoplastiaImplantes', '1', ($tratamiento['gluteoplastiaImplantes']) ? true : false, array('class'=>'checkTrueValidate')); !!}
										</div>
										<label for="Id" class="col-md-11 text-left">
											Gluteoplastia con Implantes de Silicona.
										</label>
									</div>

									<div class="col-md-12">
										<div class="col-md-1 text-left">
											{!! Form::checkbox('Rinoplastia', '', ($tratamiento['RinoplastiaEstetica'] || $tratamiento['RinoplastiaFuncional']) ? true : false, array('class'=>'checkRinoplastia')); !!}
										</div>
										<label for="Id" class="col-md-3 text-left">
											Rinoplastia.
										</label>

										<div class="col-md-1 text-left">
											{!! Form::checkbox('RinoplastiaEstetica', '1', ($tratamiento['RinoplastiaEstetica']) ? true : false, array('class'=>'RinoplastiaValidate', 'disabled'=>'disabled')); !!}
										</div>
										<label for="Id" class="col-md-3 text-left">
											Rinoplastia Estetica.
										</label>

										<div class="col-md-1 text-left">
											{!! Form::checkbox('RinoplastiaFuncional', '1', ($tratamiento['RinoplastiaFuncional']) ? true : false, array('class'=>'RinoplastiaValidate', 'disabled'=>'disabled')); !!}
										</div>
										<label for="Id" class="col-md-3 text-left">
											Rinoplastia Funcional.
										</label>
									</div>

									<div class="col-md-12">
										<div class="col-md-1 text-left">
											{!! Form::checkbox('Mentoplastia', '1', ($tratamiento['Mentoplastia']) ? true : false, array('class'=>'checkTrueValidate')); !!}
										</div>
										<label for="Id" class="col-md-11 text-left">
											Mentoplastia.
										</label>
									</div>

									<div class="col-md-12">
										<div class="col-md-1 text-left">
											{!! Form::checkbox('Otoplastia', '1', ($tratamiento['Otoplastia']) ? true : false, array('class'=>'checkTrueValidate')); !!}
										</div>
										<label for="Id" class="col-md-11 text-left">
											Otoplastia.
										</label>
									</div>

									<div class="col-md-12">
										<div class="col-md-1 text-left">
											{!! Form::checkbox('Blefaroplastia', '1', ($tratamiento['BlefaroplastiaSuperior'] || $tratamiento['BlefaroplastiaInferior']) ? true : false, array('class'=>'checkBlefaroplastia')); !!}
										</div>
										<label for="Id" class="col-md-3 text-left">
											Blefaroplastia.
										</label>

										<div class="col-md-1 text-left">
											{!! Form::checkbox('BlefaroplastiaSuperior', '1', ($tratamiento['BlefaroplastiaSuperior']) ? true : false, array('class'=>'BlefaroplastiaValidate', 'disabled'=>'disabled')); !!}
										</div>
										<label for="Id" class="col-md-3 text-left">
											Blefaroplastia Superior.
										</label>

										<div class="col-md-1 text-left">
											{!! Form::checkbox('BlefaroplastiaInferior', '1', ($tratamiento['BlefaroplastiaInferior']) ? true : false, array('class'=>'BlefaroplastiaValidate', 'disabled'=>'disabled')); !!}
										</div>
										<label for="Id" class="col-md-3 text-left">
											Blefaroplastia Inferior.
										</label>
									</div>

									<div class="col-md-12">
										<div class="col-md-2 text-left">
											{!! Form::checkbox('traeFotografiaDeSenos', '1', ($tratamiento['traeFotografiaDeSenos']) ? true : false, array('class'=>'checkTrueValidate')); !!}
										</div>
										<label for="Id" class="col-md-10 text-left">
											Trae Fotograf&iacute;a para describir taman&ntilde;o y forma deseada de los senos pero se advierte que no puede reproducirse identicamente, solo servir&aacute; como referencia.
										</label>
									</div>

									<div class="col-md-12">
										<div class="col-md-2 text-left">
											{!! Form::checkbox('ritidoplastia', '1', ($tratamiento['ritidoplastia']) ? true : false, array('class'=>'checkTrueValidate')); !!}
										</div>
										<label for="Id" class="col-md-10 text-left">
											Ritidoplastia.
										</label>
									</div>

									<div class="col-md-12">
										<div class="col-md-2 text-left">
											{!! Form::checkbox('lipoinyeccionSurcos', '1', ($tratamiento['lipoinyeccionSurcos']) ? true : false, array('class'=>'checkTrueValidate')); !!}
										</div>
										<label for="Id" class="col-md-10 text-left">
											Lipoinyeccion de Surcos.
										</label>
									</div>

									<div class="col-md-12">
										<div class="col-md-2 text-left">
											{!! Form::checkbox('bichectomia', '1', ($tratamiento['bichectomia']) ? true : false, array('class'=>'checkTrueValidate')); !!}
										</div>
										<label for="Id" class="col-md-10 text-left">
											Bichectomia.
										</label>
									</div>

									<div class="col-md-12">
										<div class="col-md-2 text-left">
											{!! Form::checkbox('dermoabrasionLabioSuperior', '1', ($tratamiento['dermoabrasionLabioSuperior']) ? true : false, array('class'=>'checkTrueValidate')); !!}
										</div>
										<label for="Id" class="col-md-10 text-left">
											Dermoabrasion Labio Superior.
										</label>
									</div>

									<div class="col-md-12">
										<div class="col-md-2 text-left">
											{!! Form::checkbox('acidoHialuroicoActivate', '', ($tratamiento['acidoHialuroico']) ? true : false, array('class'=>'checkTrueValidate')); !!}
										</div>
										<label for="Id" class="col-md-2 text-left">
											Acido Hialuroico.
										</label>
										<div class="col-md-8">
											{!! Form::textarea('acidoHialuroico', ($tratamiento['acidoHialuroico']) ? $tratamiento['acidoHialuroico'] : '',array('class'=>'form-control formulario', 'placeholder'=>'', 'cols' => '5', 'rows'=>'8')) !!}
										</div>
									</div>

									<div class="col-md-12">

										<label for="Id" class="col-md-2 text-left">
											Botox.
										</label>

										<div class="col-md-1 text-left">
											{!! Form::checkbox('botoxFrente', '1', ($tratamiento['botoxFrente']) ? true : false, array('class'=>'checkTrueValidate')); !!}
										</div>
										<label for="Id" class="col-md-2 text-left">
											Frente.
										</label>

										<div class="col-md-1 text-left">
											{!! Form::checkbox('botoxCeno', '1', ($tratamiento['botoxCeno']) ? true : false, array('class'=>'checkTrueValidate')); !!}
										</div>
										<label for="Id" class="col-md-2 text-left">
											Ceño.
										</label>

										<div class="col-md-1 text-left">
											{!! Form::checkbox('botoxPatasGallina', '1', ($tratamiento['botoxPatasGallina']) ? true : false, array('class'=>'checkTrueValidate')); !!}
										</div>
										<label for="Id" class="col-md-3 text-left">
											Patas de Gallina.
										</label>

									</div>

									<div class="col-md-12">
										<div class="col-md-12">
											{!! Form::textarea('observacionTratamiento', ($tratamiento['observacionTratamiento']) ? $tratamiento['observacionTratamiento'] : '',array('class'=>'form-control formulario', 'placeholder'=>'Observaciones', 'cols' => '5', 'rows'=>'8')) !!}
										</div>
									</div>

								</div>

								<!-- FIN TRATAMIENTO -->

								<!-- INICIO RECOMENDACIONES -->

								<div class="tab-pane" id="recomendaciones">

									<div class="modal-header sub-encuesta">
										<h4 class="sub-title">RECOMENDACIONES Y ADVERTENCIAS</h4>
									</div>

									<div class="col-md-12">
										<div class="col-md-3 text-center">
											{!! Form::checkbox('procedimientoImplicaCicatrices', '1', ($recomendacionesadvertencia['procedimientoImplicaCicatrices']) ? true : false, array('class'=>'checkTrueValidate')); !!}
										</div>
										<label for="Id" class="col-md-9 text-left">
											Este Procedimiento Implica Cicatrices Extensas.
										</label>
									</div>

									<div class="col-md-12">
										<div class="col-md-3 text-center">
											{!! Form::checkbox('realizaraNuevoOmbligo', '1', ($recomendacionesadvertencia['realizaraNuevoOmbligo']) ? true : false, array('class'=>'checkTrueValidate')); !!}
										</div>
										<label for="Id" class="col-md-9 text-left">
											Se realizará un Nuevo Ombligo de forma diferida.
										</label>
									</div>

									<div class="col-md-12">
										<div class="col-md-1">

										</div>
										<label for="Id" class="col-md-4 text-left">
											Asimetria Prexistente en Forma y Tama&ntilde;o puede persistir en.
										</label>
										<div class="col-md-7">
											{!! Form::textarea('AsimetriaPrexistenteFormaTamano', ($recomendacionesadvertencia['AsimetriaPrexistenteFormaTamano']) ? $recomendacionesadvertencia['AsimetriaPrexistenteFormaTamano'] : '',array('class'=>'form-control formulario', 'placeholder'=>'', 'cols' => '5', 'rows'=>'8')) !!}
										</div>
									</div>

									<div class="col-md-12">
										<div class="col-md-3 text-center">
											{!! Form::checkbox('puedenPersistirAcumulosGrasos', '1', ($recomendacionesadvertencia['puedenPersistirAcumulosGrasos']) ? true : false, array('class'=>'checkTrueValidate')); !!}
										</div>
										<label for="Id" class="col-md-9 text-left">
											Pueden Persistir Acumulos Grasos en el abdomen.
										</label>
									</div>

									<div class="col-md-12">
										<div class="col-md-3 text-center">
											{!! Form::checkbox('noDeseaAbdominoplastia', '1', ($recomendacionesadvertencia['noDeseaAbdominoplastia']) ? true : false, array('class'=>'checkTrueValidate')); !!}
										</div>
										<label for="Id" class="col-md-9 text-left">
											La paciente no desea Abdominoplastia por lo que se explica que cambio en el abdomen será limitado y puede persistir flacidez.
										</label>
									</div>

									<div class="col-md-12">
										<div class="col-md-3 text-center">
											{!! Form::checkbox('magnitudCirugiaAcumulosGrasos', '1', ($recomendacionesadvertencia['magnitudCirugiaAcumulosGrasos']) ? true : false, array('class'=>'checkTrueValidate')); !!}
										</div>
										<label for="Id" class="col-md-9 text-left">
											Debido a la magnitud de la Cirugia en algunas zonas pueden persistir Acumulos Grasos.
										</label>
									</div>

									<div class="col-md-12">
										<div class="col-md-3 text-center">
											{!! Form::checkbox('adviertePersisteEstrias', '1', ($recomendacionesadvertencia['adviertePersisteEstrias']) ? true : false, array('class'=>'checkTrueValidate')); !!}
										</div>
										<label for="Id" class="col-md-9 text-left">
											Se Advierte que persistirán algunas estrias.
										</label>
									</div>

									<div class="col-md-12">
										<div class="col-md-1">

										</div>
										<label for="Id" class="col-md-4 text-left">
											Se Advierte que puede persistir flacidez en.
										</label>
										<div class="col-md-7">
											{!! Form::textarea('adviertePersisteFlacidez', ($recomendacionesadvertencia['adviertePersisteFlacidez']) ? $recomendacionesadvertencia['adviertePersisteFlacidez'] : '',array('class'=>'form-control formulario', 'placeholder'=>'', 'cols' => '5', 'rows'=>'8')) !!}
										</div>
									</div>

									<div class="col-md-12">
										<div class="col-md-1">

										</div>
										<label for="Id" class="col-md-4 text-left">
											La mejora sera parcial en.
										</label>
										<div class="col-md-7">
											{!! Form::textarea('mejoriaSeraParcial', ($recomendacionesadvertencia['mejoriaSeraParcial']) ? $recomendacionesadvertencia['mejoriaSeraParcial'] : '',array('class'=>'form-control formulario', 'placeholder'=>'', 'cols' => '5', 'rows'=>'8')) !!}
										</div>
									</div>

									<div class="col-md-12">
										<div class="col-md-3 text-center">
											{!! Form::checkbox('areasPacienteIntepretaGordo', '1', ($recomendacionesadvertencia['areasPacienteIntepretaGordo']) ? true : false, array('class'=>'checkTrueValidate')); !!}
										</div>
										<label for="Id" class="col-md-9 text-left">
											Areas que el paciente interpreta como gordo, corresponden a flacidez y mejorarán poco.
										</label>
									</div>

									<div class="col-md-12">
										<div class="col-md-3 text-center">
											{!! Form::checkbox('marcacionAbdominalesPuedeVariar', '1', ($recomendacionesadvertencia['marcacionAbdominalesPuedeVariar']) ? true : false, array('class'=>'checkTrueValidate')); !!}
										</div>
										<label for="Id" class="col-md-9 text-left">
											La marcacion de Abdominales puede variar de un caso a otro.
										</label>
									</div>

									<div class="col-md-12">
										<div class="col-md-3 text-center">
											{!! Form::checkbox('aumentoProyeccionGluteos', '1', ($recomendacionesadvertencia['aumentoProyeccionGluteos']) ? true : false, array('class'=>'checkTrueValidate')); !!}
										</div>
										<label for="Id" class="col-md-9 text-left">
											El aumento en la proyeccion de los gluteos será discreto.
										</label>
									</div>

									<div class="col-md-12">
										<div class="col-md-3 text-center">
											{!! Form::checkbox('pacienteNoDeseaPexia', '1', ($recomendacionesadvertencia['pacienteNoDeseaPexia']) ? true : false, array('class'=>'checkTrueValidate')); !!}
										</div>
										<label for="Id" class="col-md-9 text-left">
											La paciente No Desea Pexia con cicatrices, po lo que se explica que pueden persistir flacidez y ptosis residual (Escurrimiento de los senos).
										</label>
									</div>

									<div class="col-md-12">
										<div class="col-md-3 text-center">
											{!! Form::checkbox('persistirAsimetrias', '1', ($recomendacionesadvertencia['persistirAsimetrias']) ? true : false, array('class'=>'checkTrueValidate')); !!}
										</div>
										<label for="Id" class="col-md-9 text-left">
											Pueden persistir asimetrias en tamaño y forma de senos
										</label>
									</div>


									<div class="col-md-12">
										<div class="col-md-3 text-center">
											{!! Form::checkbox('dispositivosPrestigiosasMarcas', '1', ($recomendacionesadvertencia['dispositivosPrestigiosasMarcas']) ? true : false, array('class'=>'checkTrueValidate')); !!}
										</div>
										<label for="Id" class="col-md-9 text-left">
											Los dispositivos médicos utilizados son de prestigiosas marcas y se utilizan bajo aprobación del INVIMA y su calidad sólo puede ser garantizado por este de control nacional.
										</label>
									</div>


									<div class="col-md-12">
										<div class="col-md-3 text-center">
											{!! Form::checkbox('cambioNarizLimitado', '1', ($recomendacionesadvertencia['cambioNarizLimitado']) ? true : false, array('class'=>'checkTrueValidate')); !!}
										</div>
										<label for="Id" class="col-md-9 text-left">
											El cambio en la nariz será limitado debido al grosor de la piel.
										</label>
									</div>

									<div class="col-md-12">
										<div class="col-md-3 text-center">
											{!! Form::checkbox('calidadCicatrizPuedeVariar', '1', ($recomendacionesadvertencia['calidadCicatrizPuedeVariar']) ? true : false, array('class'=>'checkTrueValidate')); !!}
										</div>
										<label for="Id" class="col-md-9 text-left">
											La calidad de la cicatriz puede variar de un paciente a otro.
										</label>
									</div>

									<div class="col-md-12">
										<div class="col-md-3 text-center">
											{!! Form::checkbox('malaCicatrizacion', '1', ($recomendacionesadvertencia['malaCicatrizacion']) ? true : false, array('class'=>'checkTrueValidate')); !!}
										</div>
										<label for="Id" class="col-md-9 text-left">
											Puede presentarse mala cicatrizacion por antecedentes de cicatrización patológica.
										</label>
									</div>

									<div class="col-md-12">
										<div class="col-md-3 text-center">
											{!! Form::checkbox('cambiosSencibilidad', '1', ($recomendacionesadvertencia['cambiosSencibilidad']) ? true : false, array('class'=>'checkTrueValidate')); !!}
										</div>
										<label for="Id" class="col-md-9 text-left">
											Puede haber cambios en la sensibilidad de la piel incluso anestesia (no sentir).
										</label>
									</div>

									<div class="col-md-12">
										<div class="col-md-3 text-center">
											{!! Form::checkbox('desviacionPreviaPersistir', '1', ($recomendacionesadvertencia['desviacionPreviaPersistir']) ? true : false, array('class'=>'checkTrueValidate')); !!}
										</div>
										<label for="Id" class="col-md-9 text-left">
											Por desviaci&iacute;n previa puede persistir asimetr&iacute;a y desviaci&iacute;on de la nariz.
										</label>
									</div>

									<div class="col-md-12">
										<div class="col-md-3 text-center">
											{!! Form::checkbox('persistirAsimetriaTamano', '1', ($recomendacionesadvertencia['persistirAsimetriaTamano']) ? true : false, array('class'=>'checkTrueValidate')); !!}
										</div>
										<label for="Id" class="col-md-9 text-left">
											Puede persistir asimetr&iacute;a en tama&ntilde;o y forma de las fosas nasales por diferencia preexistente.
										</label>
									</div>

									<div class="col-md-12">
										<div class="col-md-3 text-center">
											{!! Form::checkbox('persistirIrregularidad', '1', ($recomendacionesadvertencia['persistirIrregularidad']) ? true : false, array('class'=>'checkTrueValidate')); !!}
										</div>
										<label for="Id" class="col-md-9 text-left">
											Puede persistir irregularidades y secuelas de procedimientos previos.
										</label>
									</div>

									<div class="col-md-12">
										<div class="col-md-3 text-center">
											{!! Form::checkbox('laboratorio', '1', false, array('class'=>'checkLaboratorio')); !!}
										</div>
										<label for="Id" class="col-md-9 text-left">
											Se solicitaron laboratorios pre quir&uacute;rgicos.
										</label>
									</div>

									<div class="col-md-12">
										<div class="col-md-3 text-right">
											{!! Form::checkbox('laboratorioProtrombina', '1', ($recomendacionesadvertencia['laboratorioProtrombina']) ? true : false, array('class'=>'laboratorioValidate', 'disabled'=>'disabled')); !!}
										</div>
										<label for="Id" class="col-md-5 text-left">
											Tiempo de patrombina.
										</label>
										<div class="col-md-1 text-left">
											{!! Form::checkbox('laboratorioGlicemia', '1', ($recomendacionesadvertencia['laboratorioGlicemia']) ? true : false, array('class'=>'laboratorioValidate', 'disabled'=>'disabled')); !!}
										</div>
										<label for="Id" class="col-md-3 text-left">
											Glicemia.
										</label>
									</div>

									<div class="col-md-12">
										<div class="col-md-3 text-right">
											{!! Form::checkbox('laboratorioTrimboplastina', '1', ($recomendacionesadvertencia['laboratorioTrimboplastina']) ? true : false, array('class'=>'laboratorioValidate', 'disabled'=>'disabled')); !!}
										</div>
										<label for="Id" class="col-md-5 text-left">
											Tiempo parcial de Trimboplastina
										</label>

										<div class="col-md-1 text-left">
											{!! Form::checkbox('laboratorioEKG', '1', ($recomendacionesadvertencia['laboratorioEKG']) ? true : false, array('class'=>'laboratorioValidate', 'disabled'=>'disabled')); !!}
										</div>
										<label for="Id" class="col-md-3 text-left">
											EKG
										</label>
									</div>

									<div class="col-md-12">
										<div class="col-md-3 text-right">
											{!! Form::checkbox('laboratorioHematico', '1', ($recomendacionesadvertencia['laboratorioHematico']) ? true : false, array('class'=>'laboratorioValidate', 'disabled'=>'disabled')); !!}
										</div>
										<label for="Id" class="col-md-5 text-left">
											Cuadro Hem&aacute;tico.
										</label>
										<div class="col-md-4">

										</div>
									</div>

									<div class="col-md-12">
										<div class="col-md-3 text-right">
											{!! Form::checkbox('laboratorioPruebaEmbarazo', '1', ($recomendacionesadvertencia['laboratorioPruebaEmbarazo']) ? true : false, array('class'=>'laboratorioValidate', 'disabled'=>'disabled')); !!}
										</div>
										<label for="Id" class="col-md-5 text-left">
											Prueba de embarazo.
										</label>
										<div class="col-md-4">

										</div>
									</div>
									<br><br>

									<div class="col-md-12">
										<div class="col-md-2 text-right">
											{!! Form::hidden('idPaciente',$idPaciente) !!}
											{!! Form::hidden('idProcedimiento',$idProcedimiento) !!}

											{!! Form::checkbox('autorizacionDoctor', '1', ($recomendacionesadvertencia['autorizacionDoctor']) ? true : false, array('class'=>'checkTrueValidate')); !!}
										</div>
										<label for="Id" class="col-md-10 text-left">
											El paciente autoriza al Dr. Amaya a decidir durante la cirug&iacute;a la t&eacute;cnica m&aacute;s apropiada para conseguir el mejor resultado posible.
										</label>
									</div>

								</div>
							</div>
						</div>
					</div>

				<!--	{!! Form::open(array('url'=>'historiaclinicapreliminar/save?return='.$return, 'class'=>'form-horizontal','files' => true , 'parsley-validate'=>'','novalidate'=>' ')) !!}
							<div class="modal-header sub-encuesta">
       <h4 class="sub-title">Antecedentes</h4>
     </div>
    <div class="form-group">
      <label for="Id" class="col-md-6 text-left">
      ¿Qu&eacute; tratamientos no quirurgicos se ha practicado en la cara?
      </label>
      <div class="col-md-2 content">
        <select class="selectEncuesta" name="">
          <option value="laser">Laser</option>
          <option value="peelings">Peelings</option>
          <option value="microdermoabrasion">Microdermoabrasi&oacute;n</option>
          <option value="hydrofacial">Hydrofacial</option>
          <option value="otro">Otro</option>
        </select>
      </div>
      <div class="col-md-4 textOther">
      {!! Form::text('cualTratamientoCara', '',array('class'=>'form-control formulario', 'disabled'=>'disabled' ,'placeholder'=>'')) !!}
							</div>
                          </div>

                          <div class="form-group">
                            <label for="Id" class="col-md-6 text-left">
                            ¿Qu&eacute; tratamientos no quirurgicos se ha practicado en el cuerpo?
      </label>
      <div class="col-md-2 content">
        <select class="selectEncuesta" name="">
          <option value="mesoterapias">Mesoterapias</option>
          <option value="masajesreductores">Masajes reductores</option>
          <option value="otro">Otro</option>
        </select>
      </div>
      <div class="col-md-4 textOther">
      {!! Form::text('cualTratamientoCuerpo', '',array('class'=>'form-control formulario', 'disabled'=>'disabled' ,'placeholder'=>'')) !!}
							</div>
                          </div>

                          <div class="form-group">
                            <label for="Id" class="col-md-6 text-left">
                              ¿Se ha realizado alg&uacute;n tratamiento para reducir celulitis, tonificar o reducir medidas?
      </label>
      <div class="col-md-2 content">
        Si {!! Form::radio('tratamientoReductor', '', false, array('class'=>'checkTrue')); !!}
							No {!! Form::radio('tratamientoReductor', '', true, array('class'=>'checkFalse')); !!}
							</div>
                            <div class="col-md-4 textOther">
                              {!! Form::text('cualTratamientoReductor', '',array('class'=>'form-control formulario', 'disabled'=>'disabled' ,'placeholder'=>'')) !!}
							</div>
                          </div>

                          <div class="form-group">
                            <label for="Id" class="col-md-6 text-left">
                              ¿Se ha aplicado biopolimeros en cara o cuerpo? ¿Qu&eacute; &aacute;rea?
      </label>
      <div class="col-md-2 content">
        Si {!! Form::radio('aplicadoBiopolimeros', '', false, array('class'=>'checkTrue')); !!}
							No {!! Form::radio('aplicadoBiopolimeros', '', true, array('class'=>'checkFalse')); !!}
							</div>
                            <div class="col-md-4 textOther">
                              {!! Form::text('cualAreaBiopolimeros', '',array('class'=>'form-control formulario', 'disabled'=>'disabled' ,'placeholder'=>'')) !!}
							</div>
                          </div>

                          <div class="form-group">
                            <label for="Id" class="col-md-6 text-left">
                              ¿Ha utilizado &aacute;cido hialuronico anteriormente? ¿Qu&eacute; &aacute;rea? Y hace cuanto.
      </label>
      <div class="col-md-2 content">
        Si {!! Form::radio('aplicadoHialuronico', '', false, array('class'=>'checkTrue')); !!}
							No {!! Form::radio('aplicadoHialuronico', '', true, array('class'=>'checkFalse')); !!}
							</div>
                            <div class="col-md-4 textOther">
                              {!! Form::text('cualAreaHialuronico', '',array('class'=>'form-control formulario', 'disabled'=>'disabled' ,'placeholder'=>'')) !!}
							</div>
                          </div>

                          <div class="form-group">
                            <label for="Id" class="col-md-8 text-left">
                              ¿Qu&eacute; tratamientos se ha practicado para eliminar manchas?
      </label>
      <div class="col-md-4 textOther">
        {!! Form::text('cualTratamientoEliminarManchas', '',array('class'=>'form-control formulario', 'placeholder'=>'')) !!}
							</div>
                          </div>

                          <div class="form-group">
                            <label for="Id" class="col-md-8 text-left">
                              ¿Con que productos cuida la piel de su rostro?
                            </label>
                            <div class="col-md-4 textOther">
                              {!! Form::text('cualProductoCuidaPiel', '',array('class'=>'form-control formulario' ,'placeholder'=>'')) !!}
							</div>
                          </div>

                          <div class="form-group">
                            <label for="Id" class="col-md-8 text-left">
                              ¿Utiliza protector solar diariamente?
                            </label>
                            <div class="col-md-4 textOther">
                              {!! Form::text('cualProtectorSolar', '', array('class'=>'form-control formulario', 'placeholder'=>'')) !!}
							</div>
                          </div> -->




					<br><br><br>
					<div class="form-group">
						<label for="Id" class="col-md-12 text-left">
							Indicaciones para paciente
						</label>
					</div>

					<div class="form-group">
						<div class="col-md-12">
							{!! Form::textarea('observacionesParaAsistente', ($hcseguimiento['observacion']) ? $hcseguimiento['observacion'] : '', array('class'=>'form-control formulario', 'placeholder'=>'', 'cols' => '5', 'rows'=>'8')) !!}
						</div>
					</div>

					<br>

					<div class="form-group">
						<label for="Id" class="col-md-12 text-left">
							Implantes probables
						</label>
					</div>

					<div class="form-group">
						<div class="col-md-12">
							{!! Form::textarea('implantesProbables', ($hcseguimiento['implantesProbables']) ? $hcseguimiento['implantesProbables'] : '', array('class'=>'form-control formulario', 'placeholder'=>'', 'cols' => '5', 'rows'=>'8')) !!}
						</div>
					</div>

					@if(!$idhc)
						<div class="sendhc">
							<button type="submit" class="btn btn-success" name="button" disabled="disabled" id="savedhcd">Guardar historia clinica definitiva.</button>
						</div>
					@else
						<div class="sendhc">
							<a href="{{ URL::to('paciente/'.$idPaciente) }}" class="btn btn-success" name="button">Atr&aacute;s</a>
						</div>
					@endif

					{!! Form::close() !!}
				</div>
			</div>
		</div>
	</div>

	<!--<script type="text/javascript" src="../../../resources/js/autoSave.js"></script>-->

	<script type="text/javascript">


	$('#examClick').dblclick(function(){

		$('.sub-menu-left > ul').animate({
			marginTop: "10px",
			marginRight: "0",
			marginBottom: "10px",
			marginLetf: "20px",
			height:"100px !important"
		})

	});


	$(document).ready(function () {

		 $('input').on('ifChecked',function () {

		 	setTimeout(function () {
					 $('.icheckbox_square-green').each(function (i,v) {
				 	  if($(v).hasClass('checked')){
					 			$('#savedhcd').prop('disabled',false);
					 			return false;
				 			}else{
				 				$('#savedhcd').prop('disabled',true);
				 		}
			 	 })
		 	}, 500);

		});

	 $('input').on('ifUnchecked',function () {

		 	setTimeout(function () {
	 					 $('.icheckbox_square-green').each(function (i,v) {

					 	  if($(v).hasClass('checked')){
						 			$('#savedhcd').prop('disabled',false);
						 			return false;
					 		}else{
					 				$('#savedhcd').prop('disabled',true);
					 		}

					 })
		 	}, 500);

		});

	 checkField();

	});


	function cargar (id) {
		 $.ajax({
				url: '../../../historiaclinicapreliminar/cargar/'+id,
				type: 'GET'
			}).done(function(data){
					console.log(data);


			$('[name="cualAntecedenteQuirurgico"]').val(data.otrosantecedentes.quirurgicos_text);
			if(data.otrosantecedentes.quirurgicos_text){ $('[name="AntecedenteQuirurgico"]').iCheck("check"); }

			$('[name="cualAntecedenteMedico"]').val(data.otrosantecedentes.medicos_text);
			if(data.otrosantecedentes.medicos_text){ $('[name="AntecedenteMedico"]').iCheck("check"); }

			$('[name="cualAntecedenteFarmacologico"]').val(data.otrosantecedentes.farmacologicos_text);
			if(data.otrosantecedentes.farmacologicos_text){ $('[name="AntecedenteFarmacologico"]').iCheck("check"); }

			$('[name="cualAntecedenteHomeopaticos"]').val(data.otrosantecedentes.homeopaticos_text);
			if(data.otrosantecedentes.homeopaticos_text){ $('[name="AntecedenteHomeopaticos"]').iCheck("check"); }

			$('[name="cualAntecedenteAlergicos"]').val(data.otrosantecedentes.alergicos_text);
			if(data.otrosantecedentes.alergicos_text){ $('[name="AntecedenteAlergicos"]').iCheck("check"); }

			$('[name="cualAntecedenteGinecoObstetricas"]').val(data.otrosantecedentes.ginecoObstetricas_text);
			if(data.otrosantecedentes.ginecoObstetricas_text){ $('[name="AntecedenteGinecoObstetricas"]').iCheck("check"); }

			$('[name="cualAntecedenteToxicologica"]').val(data.otrosantecedentes.toxicologicas_text);
			if(data.otrosantecedentes.toxicologicas_text){ $('[name="AntecedenteToxicologica"]').iCheck("check"); }

			$('[name="cualAntecedenteTabaquismo"]').val(data.otrosantecedentes.tabaquismo_text);
			if(data.otrosantecedentes.tabaquismo_text){ $('[name="AntecedenteTabaquismo"]').iCheck("check"); }

			$('[name="seIndicaSuspender"]').val(data.otrosantecedentes.seIndicaSuspender);

			$('[name="otrosAntecedentes"]').val(data.otrosantecedentes.otros);

			$('[name="signoVitalNormal"]').val(data.otrosantecedentes.signosVitalesNormales);

			$('[name="signoVitalFC"]').val(data.otrosantecedentes.signosVitalesFC);

			$('[name="signoVitalFR"]').val(data.otrosantecedentes.signosVitalesFR);

			$('[name="signoVitalTA"]').val(data.otrosantecedentes.signosVitalesTA);



			$('[name="motivoSecuelasLipo"].[value='+data.motivodeconsulta.motivoSecuelasLipo+']').iCheck("check");

			$('[name="mejorarContornoCorporal"].[value='+data.motivodeconsulta.mejorarContornoCorporal+']').iCheck("check");

			$('[name="mejorarFlacidesAbdomen"].[value='+data.motivodeconsulta.mejorarFlacidesAbdomen+']').iCheck("check");

			$('[name="aumentarProyeccionGluteos"].[value='+data.motivodeconsulta.aumentarProyeccionGluteos+']').iCheck("check");

			$('[name="mejorarCicatrizLipectomia"].[value='+data.motivodeconsulta.mejorarCicatrizLipectomia+']').iCheck("check");

			$('[name="masHijos"].[value='+data.motivodeconsulta.masHijos+']').iCheck("check");

			$('[name="mejorarOrejas"].[value='+data.motivodeconsulta.mejorarOrejas+']').iCheck("check");

			$('[name="areasMayorInteres"]').val(data.motivodeconsulta.areasMayorInteres);

			$('[name="mejorarPigmentacionCara"].[value='+data.motivodeconsulta.mejorarPigmentacionCara+']').iCheck("check");

			$('[name="disminuirSurcosNasogerianos"].[value='+data.motivodeconsulta.disminuirSurcosNasogenianos+']').iCheck("check");

			$('[name="disminuirSurcosMarioneta"].[value='+data.motivodeconsulta.disminuirSurcosMarioneta+']').iCheck("check");

			$('[name="disminuirLineasExpresion"].[value='+data.motivodeconsulta.disminuirLineasExpresion+']').iCheck("check");

			$('[name="patasDeGallina"].[value='+data.motivodeconsulta.patasDeGallina+']').iCheck("check");

			$('[name="frente"].[value='+data.motivodeconsulta.frente+']').iCheck("check");

			$('[name="ceno"].[value='+data.motivodeconsulta.ceno+']').iCheck("check");

			$('[name="mejorarSecualesAcne"].[value='+data.motivodeconsulta.mejorarSecuelasAcne+']').iCheck("check");

			$('[name="mejorarCalidadPielCara"].[value='+data.motivodeconsulta.mejorarCalidadPielCara+']').iCheck("check");

			$('[name="mejorarFlacidezCuello"].[value='+data.motivodeconsulta.mejorarFlacidezCuello+']').iCheck("check");

			$('[name="depilacionLaser"].[value='+data.motivodeconsulta.depilacionLaser+']').iCheck("check");

			$('[name="mejorarRitidesLabioSuperior"].[value='+data.motivodeconsulta.mejorarRitidesLabioSuperior+']').iCheck("check");

			$('[name="mejorarPigmentacionSurcosNasoyugales"].[value='+data.motivodeconsulta.mejorarPigmentacionSurcosNasoyugales+']').iCheck("check");



			//NO SE SABE

			$('[name="aumentarTamanoSenos"]').val(data.motivodeconsulta.aumentarTamanoSenos);

			$('[name="disminuirTamanoSenos"]').val(data.motivodeconsulta.disminuirTamanoSenos);

			$('[name="levantamientoSenos"]').val(data.motivodeconsulta.levantamientoSenos);

			$('[name="cambiarImplantes"]').val(data.motivodeconsulta.cambiarImplantes);

			$('[name="mejorarCicatrizMamoplastia"]').val(data.motivodeconsulta.mejorarCicatrizMamoplastia);

			$('[name="tallaAproximadaDesea"]').val(data.motivodeconsulta.tallaAproximadaDesea);

			$('[name="enfermedadActual"]').val(data.motivodeconsulta.enfermedadActual);

			$('[name="reseccionNevusCara"]').val(data.motivodeconsulta.reseccionNevusCara);

			$('[name="reseccionNevusCuerpo"]').val(data.motivodeconsulta.reseccionNevusCuerpo);

			$('[name="corregirLobulosHendidos"]').val(data.motivodeconsulta.corregirLobulosHendidos);

			$('[name="mejorarCalidadCicatriz"]').val(data.motivodeconsulta.mejorarCalidadCicatriz);

			$('[name="verBrochureTNQ"]').val(data.motivodeconsulta.verBrochureTNQ);

			$('[name="ObservacionesMotivoConsulta"]').val(data.motivodeconsulta.ObservacionesMotivoConsulta);

			$('[name="mejorarCicatrizAbdomen"]').val(data.motivodeconsulta.mejorarCicatrizAbdomen);

			$('[name="mejorarCicatrizCara"]').val(data.motivodeconsulta.mejorarCicatrizCara);

			$('[name="reseccionNevusComentario"]').val(data.motivodeconsulta.reseccionNevusComentario);

			//FIN NO SE SABE

			$('[name="mejorarExcesoPielParpadoSuperior"].[value='+data.motivodeconsulta.mejorarExcesoPielParpadoSuperior+']').iCheck("check");

			$('[name="mejorarBolsaParpadoInferior"].[value='+data.motivodeconsulta.mejorarBolsaParpadoInferior+']').iCheck("check");

			$('[name="mejorarFlacidezParapadoInferior"].[value='+data.motivodeconsulta.mejorarFlacidezParapadoInferior+']').iCheck("check");

			$('[name="mejorarLineasExpresion"].[value='+data.motivodeconsulta.mejorarLineasExpresion+']').iCheck("check");

			$('[name="elevarCejas"].[value='+data.motivodeconsulta.elevarCejas+']').iCheck("check");

			$('[name="aumentarProyeccionMenton"].[value='+data.motivodeconsulta.aumentarProyeccionMenton+']').iCheck("check");

			$('[name="mejorarEsteticaNariz"].[value='+data.motivodeconsulta.mejorarEsteticaNariz+']').iCheck("check");

			$('[name="mejorarSecuelasRinoPrevias"].[value='+data.motivodeconsulta.mejorarSecuelasRinoPrevias+']').iCheck("check");

			$('[name="mejorarCuadroObstructivo"].[value='+data.motivodeconsulta.mejorarCuadroObstructivo+']').iCheck("check");

			$('[name="estadoRespiracion"].[value='+data.motivodeconsulta.comoRespira+']').iCheck("check");

			$('[name="FND"].[value='+data.motivodeconsulta.FND+']').iCheck("check");

			$('[name="FNI"].[value='+data.motivodeconsulta.FNI+']').iCheck("check");




			$('[name="abdomenColgante"].[value='+data.examenfisico.abdomenColgante+']').iCheck("check");

			$('[name="flacidezAbdominal"].[value='+data.examenfisico.flacidezAbdominal+']').iCheck("check");

			$('[name="striaeDistensae"].[value='+data.examenfisico.striaeDistensae+']').iCheck("check");

			$('[name="diastasisRectos"].[value='+data.examenfisico.diastasisRectos+']').iCheck("check");

			$('[name="gigantomastia"].[value='+data.examenfisico.gigantomastia+']').iCheck("check");

			$('[name="tamanoSenos"].[value='+data.examenfisico.tamanoSenos+']').iCheck("check");

			$('[name="ptosis"].[value='+data.examenfisico.ptosis+']').iCheck("check");

			$('[name="asimetriaFormaTamano"].[value='+data.examenfisico.asimetriaFormaTamano+']').iCheck("check");

			$('[name="blefachalasisParapadoSuperior"].[value='+data.examenfisico.blefachalasisParapadoSuperior+']').iCheck("check");

			$('[name="cojinAdiposoParpadoSuperior"].[value='+data.examenfisico.cojinAdiposoParpadoSuperior+']').iCheck("check");

			$('[name="blefachalasisParapadoInferior"].[value='+data.examenfisico.blefachalasisParapadoInferior+']').iCheck("check");

			$('[name="cojinAdiposoParpadoInferior"].[value='+data.examenfisico.cojinAdiposoParpadoInferior+']').iCheck("check");

			$('[name="asimetria"].[value='+data.examenfisico.asimetria+']').iCheck("check");

			$('[name="gibaOsteocartilaginosa"].[value='+data.examenfisico.gibaOsteocartilaginosa+']').iCheck("check");

			$('[name="laterorinia"].[value='+data.examenfisico.laterorinia+']').iCheck("check");

			$('[name="malaDefinicionPunta"].[value='+data.examenfisico.malaDefinicionPunta+']').iCheck("check");

			$('[name="malaProyeccionPunta"].[value='+data.examenfisico.malaProyeccionPunta+']').iCheck("check");

			$('[name="PtosisPunta"].[value='+data.examenfisico.PtosisPunta+']').iCheck("check");

			$('[name="asimetriaPunta"].[value='+data.examenfisico.asimetriaPunta+']').iCheck("check");

			$('[name="pielGruesa"].[value='+data.examenfisico.pielGruesa+']').iCheck("check");

			$('[name="alasGruesas"].[value='+data.examenfisico.alasGruesas+']').iCheck("check");

			$('[name="fosasAmplias"].[value='+data.examenfisico.fosasAmplias+']').iCheck("check");

			$('[name="asimetriaFosasNasales"].[value='+data.examenfisico.asimetriaFosasNasales+']').iCheck("check");

			$('[name="deflexionSeptal"].[value='+data.examenfisico.deflexionSeptal+']').iCheck("check");

			$('[name="hipertrofiaCornete"].[value='+data.examenfisico.hipertrofiaCornete+']').iCheck("check");

			$('[name="hipoplasiaMenton"].[value='+data.examenfisico.hipoplasiaMenton+']').iCheck("check");

			$('[name="telanglectasiasMuslos"]').val(data.examenfisico.telanglectasiasMuslos);

			$('[name="telanglectasiasPiernas"]').val(data.examenfisico.telanglectasiasPiernas);

			$('[name="telanglectasiasCara"]').val(data.examenfisico.telanglectasiasCara);

			$('[name="cicatrices"]').val(data.examenfisico.cicatrices);

			$('[name="cicatrizHipertrofica"]').val(data.examenfisico.cicatrizHipertrofica);

			$('[name="cicatrizQueloide"]').val(data.examenfisico.cicatrizQueloide);

			$('[name="area"]').val(data.examenfisico.area);

			$('[name="masas"]').val(data.examenfisico.masas);

			$('[name="examenFisicoAbdomen"].[value='+data.examenfisico.examenFisicoAbdomen+']').iCheck("check");

			$('[name="examenFisicoFlancos"].[value='+data.examenfisico.examenFisicoFlancos+']').iCheck("check");

			$('[name="examenFisicoRollosEspalda"].[value='+data.examenfisico.examenFisicoRollosEspalda+']').iCheck("check");

			$('[name="caraLateralMuslos"].[value='+data.examenfisico.caraLateralMuslos+']').iCheck("check");

			$('[name="caraMedialMuslos"].[value='+data.examenfisico.caraMedialMuslos+']').iCheck("check");

			$('[name="examenFisicoBrazos"].[value='+data.examenfisico.examenFisicoBrazos+']').iCheck("check");

			$('[name="examenFisicoPapada"].[value='+data.examenfisico.examenFisicoPapada+']').iCheck("check");

			$('[name="pocoProyeccionGluteos"].[value='+data.examenfisico.pocoProyeccionGluteos+']').iCheck("check");

			$('[name="examenFisicoPectorales"].[value='+data.examenfisico.examenFisicoPectorales+']').iCheck("check");

			$('[name="celulitisAbdomen"].[value='+data.examenfisico.celulitisAbdomen+']').iCheck("check");

			$('[name="celulitisBrazos"].[value='+data.examenfisico.celulitisBrazos+']').iCheck("check");

			$('[name="celulitisMuslos"].[value='+data.examenfisico.celulitisMuslos+']').iCheck("check");

			$('[name="celulitisGluteos"].[value='+data.examenfisico.celulitisGluteos+']').iCheck("check");

			$('[name="flacidezAbdomen"].[value='+data.examenfisico.flacidezAbdomen+']').iCheck("check");

			$('[name="flacidezBrazos"].[value='+data.examenfisico.flacidezBrazos+']').iCheck("check");

			$('[name="flacidezRollosEspalda"].[value='+data.examenfisico.flacidezRollosEspalda+']').iCheck("check");

			$('[name="flacidezFlancos"].[value='+data.examenfisico.flacidezFlancos+']').iCheck("check");

			$('[name="flacidezGluteos"].[value='+data.examenfisico.flacidezGluteos+']').iCheck("check");

			$('[name="flacidezEntrepiernas"].[value='+data.examenfisico.flacidezEntrepiernas+']').iCheck("check");

			$('[name="flacidezMuslos"].[value='+data.examenfisico.flacidezMuslos+']').iCheck("check");

			$('[name="lineasExpresionPronunciadas"].[value='+data.examenfisico.lineasExpresionPronunciadas+']').iCheck("check");

			$('[name="fotodano"].[value='+data.examenfisico.fotodano+']').iCheck("check");

			$('[name="protesisColaCeja"].[value='+data.examenfisico.protesisColaCeja+']').iCheck("check");

			$('[name="cojinMalaAtroficoPsico"].[value='+data.examenfisico.cojinMalaAtroficoPsico+']').iCheck("check");

			$('[name="rejuvecimientoFlacidezCara"].[value='+data.examenfisico.rejuvecimientoFlacidezCara+']').iCheck("check");

			$('[name="rejuvecimientoFlacidezCuello"].[value='+data.examenfisico.rejuvecimientoFlacidezCuello+']').iCheck("check");

			$('[name="rejuvecimientoJowlsPronunciados"].[value='+data.examenfisico.rejuvecimientoJowlsPronunciados+']').iCheck("check");

			$('[name="rejuvecimientoSurcosNasogenianos"].[value='+data.examenfisico.rejuvecimientoSurcosNasogenianos+']').iCheck("check");

			$('[name="rejuvecimientoSurcosMarioneta"].[value='+data.examenfisico.rejuvecimientoSurcosMarioneta+']').iCheck("check");

			$('[name="rejuvecimientoCodigoBarrasLabios"].[value='+data.examenfisico.rejuvecimientoCodigoBarrasLabios+']').iCheck("check");

			$('[name="hiperpigmentacionPielCara"].[value='+data.examenfisico.hiperpigmentacionPielCara+']').iCheck("check");

			$('[name="rejuvecimientoSecuelasAcne"].[value='+data.examenfisico.rejuvecimientoSecuelasAcne+']').iCheck("check");

			$('[name="flacidezEnfrenteMejillas"].[value='+data.examenfisico.flacidezEnfrenteMejillas+']').iCheck("check");

			$('[name="flacidezEnfrenteCuello"].[value='+data.examenfisico.flacidezEnfrenteCuello+']').iCheck("check");

			$('[name="flacidezEnfrenteLineasMandibula"].[value='+data.examenfisico.flacidezEnfrenteLineasMandibula+']').iCheck("check");

			$('[name="acumuloGrasoEmpapada"].[value='+data.examenfisico.acumuloGrasoEmpapada+']').iCheck("check");

			$('[name="tipoPiel"].[value='+data.examenfisico.tipoPiel+']').iCheck("check");

			$('[name="surcosFrente"].[value='+data.examenfisico.surcosFrente+']').iCheck("check");

			$('[name="surcosEntrecejo"].[value='+data.examenfisico.surcosEntrecejo+']').iCheck("check");

			$('[name="surcosNasoyugales"].[value='+data.examenfisico.surcosNasoyugales+']').iCheck("check");

			$('[name="surcosNasogenianos"].[value='+data.examenfisico.surcosNasogenianos+']').iCheck("check");

			$('[name="surcosMarioneta"].[value='+data.examenfisico.surcosMarioneta+']').iCheck("check");

			$('[name="fotodanoCalidadPielCara"].[value='+data.examenfisico.fotodanoCalidadPielCara+']').iCheck("check");

			$('[name="ritidezParpadoInferior"].[value='+data.examenfisico.ritidezParpadoInferior+']').iCheck("check");

			$('[name="ritidezMejillas"].[value='+data.examenfisico.ritidezMejillas+']').iCheck("check");

			$('[name="malaDefinicionAntihelix"].[value='+data.examenfisico.malaDefinicionAntihelix+']').iCheck("check");

			$('[name="rejuvecimientoHipertrofiaConcha"].[value='+data.examenfisico.rejuvecimientoHipertrofiaConcha+']').iCheck("check");

			$('[name="asimetriaFormaTomano"].[value='+data.examenfisico.asimetriaFormaTomano+']').iCheck("check");




			$('[name="cirugiaPostparto"].[value='+data.tratamiento.cirugiaPostparto+']').iCheck("check");

			$('[name="lipoesculturaAsistidaUltrasonido"].[value='+data.tratamiento.lipoesculturaAsistidaUltrasonido+']').iCheck("check");

			$('[name="lipoinyeccionGluteosTrocontericas"].[value='+data.tratamiento.lipoinyeccionGluteosTrocontericas+']').iCheck("check");

			$('[name="abdominoplastia"].[value='+data.tratamiento.abdominoplastia+']').iCheck("check");

			$('[name="mamoplastiaAumentoImplantes"].[value='+data.tratamiento.mamoplastiaAumentoImplantes+']').iCheck("check");

			$('[name="cambioImplantesMamarios"].[value='+data.tratamiento.cambioImplantesMamarios+']').iCheck("check");

			$('[name="mamoplastiaReduccion"].[value='+data.tratamiento.mamoplastiaReduccion+']').iCheck("check");

			$('[name="pexiaMamariaCicatrizPeriareoral"].[value='+data.tratamiento.pexiaMamariaCicatrizPeriareoral+']').iCheck("check");

			$('[name="pexiaMamariaTInvertida"].[value='+data.tratamiento.pexiaMamariaTInvertida+']').iCheck("check");

			$('[name="pexiaMamariaVertical"].[value='+data.tratamiento.pexiaMamariaVertical+']').iCheck("check");

			$('[name="pexiaMamariaHemiareoralSuperior"].[value='+data.tratamiento.pexiaMamariaHemiareoralSuperior+']').iCheck("check");

			$('[name="pexiaMamariaHemiareoralInferior"].[value='+data.tratamiento.pexiaMamariaHemiareoralInferior+']').iCheck("check");

			$('[name="pexiaMamariaDecidiraEnCirujia"].[value='+data.tratamiento.pexiaMamariaDecidiraEnCirujia+']').iCheck("check");

			$('[name="pexiaMamariaConImplantesSilicona"].[value='+data.tratamiento.pexiaMamariaConImplantesSilicona+']').iCheck("check");

			$('[name="pexiaMamariaSinImplantesSilicona"].[value='+data.tratamiento.pexiaMamariaSinImplantesSilicona+']').iCheck("check");

			$('[name="gluteoplastiaImplantes"].[value='+data.tratamiento.gluteoplastiaImplantes+']').iCheck("check");

			$('[name="RinoplastiaEstetica"].[value='+data.tratamiento.RinoplastiaEstetica+']').iCheck("check");

			$('[name="RinoplastiaFuncional"].[value='+data.tratamiento.RinoplastiaFuncional+']').iCheck("check");

			$('[name="Mentoplastia"].[value='+data.tratamiento.Mentoplastia+']').iCheck("check");

			$('[name="Otoplastia"].[value='+data.tratamiento.Otoplastia+']').iCheck("check");

			$('[name="BlefaroplastiaSuperior"].[value='+data.tratamiento.BlefaroplastiaSuperior+']').iCheck("check");

			$('[name="BlefaroplastiaInferior"].[value='+data.tratamiento.BlefaroplastiaInferior+']').iCheck("check");

			$('[name="traeFotografiaDeSenos"].[value='+data.tratamiento.traeFotografiaDeSenos+']').iCheck("check");

			$('[name="ritidoplastia"].[value='+data.tratamiento.ritidoplastia+']').iCheck("check");

			$('[name="lipoinyeccionSurcos"].[value='+data.tratamiento.lipoinyeccionSurcos+']').iCheck("check");

			$('[name="bichectomia"].[value='+data.tratamiento.bichectomia+']').iCheck("check");

			$('[name="dermoabrasionLabioSuperior"].[value='+data.tratamiento.dermoabrasionLabioSuperior+']').iCheck("check");

			$('[name="acidoHialuroico"]').val(data.tratamiento.acidoHialuroico+']').iCheck("check");

			$('[name="botoxFrente"].[value='+data.tratamiento.botoxFrente+']').iCheck("check");

			$('[name="botoxCeno"].[value='+data.tratamiento.botoxCeno+']').iCheck("check");

			$('[name="botoxPatasGallina"].[value='+data.tratamiento.botoxPatasGallina+']').iCheck("check");

			$('[name="observacionTratamiento"]').val(data.tratamiento.observacionTratamiento+']').iCheck("check");




			$('[name="procedimientoImplicaCicatrices"].[value='+data.recomendacionesadvertencia.procedimientoImplicaCicatrices+']').iCheck("check");

			$('[name="realizaraNuevoOmbligo"].[value='+data.recomendacionesadvertencia.realizaraNuevoOmbligo+']').iCheck("check");

			$('[name="AsimetriaPrexistenteFormaTamano"]').val(data.recomendacionesadvertencia.AsimetriaPrexistenteFormaTamano);

			$('[name="puedenPersistirAcumulosGrasos"].[value='+data.recomendacionesadvertencia.puedenPersistirAcumulosGrasos+']').iCheck("check");

			$('[name="noDeseaAbdominoplastia"].[value='+data.recomendacionesadvertencia.noDeseaAbdominoplastia+']').iCheck("check");

			$('[name="magnitudCirugiaAcumulosGrasos"].[value='+data.recomendacionesadvertencia.magnitudCirugiaAcumulosGrasos+']').iCheck("check");

			$('[name="adviertePersisteEstrias"].[value='+data.recomendacionesadvertencia.adviertePersisteEstrias+']').iCheck("check");

			$('[name="adviertePersisteFlacidez"]').val(data.recomendacionesadvertencia.adviertePersisteFlacidez);

			$('[name="mejoriaSeraParcial"]').val(data.recomendacionesadvertencia.mejoriaSeraParcial);

			$('[name="areasPacienteIntepretaGordo"].[value='+data.recomendacionesadvertencia.areasPacienteIntepretaGordo+']').iCheck("check");

			$('[name="marcacionAbdominalesPuedeVariar"].[value='+data.recomendacionesadvertencia.marcacionAbdominalesPuedeVariar+']').iCheck("check");

			$('[name="aumentoProyeccionGluteos"].[value='+data.recomendacionesadvertencia.aumentoProyeccionGluteos+']').iCheck("check");

			$('[name="pacienteNoDeseaPexia"].[value='+data.recomendacionesadvertencia.pacienteNoDeseaPexia+']').iCheck("check");

			$('[name="persistirAsimetrias"].[value='+data.recomendacionesadvertencia.persistirAsimetrias+']').iCheck("check");

			$('[name="dispositivosPrestigiosasMarcas"].[value='+data.recomendacionesadvertencia.dispositivosPrestigiosasMarcas+']').iCheck("check");

			$('[name="cambioNarizLimitado"].[value='+data.recomendacionesadvertencia.cambioNarizLimitado+']').iCheck("check");

			$('[name="calidadCicatrizPuedeVariar"].[value='+data.recomendacionesadvertencia.calidadCicatrizPuedeVariar+']').iCheck("check");

			$('[name="malaCicatrizacion"].[value='+data.recomendacionesadvertencia.malaCicatrizacion+']').iCheck("check");

			$('[name="cambiosSencibilidad"].[value='+data.recomendacionesadvertencia.cambiosSencibilidad+']').iCheck("check");

			$('[name="desviacionPreviaPersistir"].[value='+data.recomendacionesadvertencia.desviacionPreviaPersistir+']').iCheck("check");

			$('[name="persistirAsimetriaTamano"].[value='+data.recomendacionesadvertencia.persistirAsimetriaTamano+']').iCheck("check");

			$('[name="persistirIrregularidad"].[value='+data.recomendacionesadvertencia.persistirIrregularidad+']').iCheck("check");

			$('[name="laboratorioProtrombina"].[value='+data.recomendacionesadvertencia.laboratorioProtrombina+']').iCheck("check");

			$('[name="laboratorioGlicemia"].[value='+data.recomendacionesadvertencia.laboratorioGlicemia+']').iCheck("check");

			$('[name="laboratorioTrimboplastina"].[value='+data.recomendacionesadvertencia.laboratorioTrimboplastina+']').iCheck("check");

			$('[name="laboratorioEKG"].[value='+data.recomendacionesadvertencia.laboratorioEKG+']').iCheck("check");

			$('[name="laboratorioHematico"].[value='+data.recomendacionesadvertencia.laboratorioHematico+']').iCheck("check");

			$('[name="laboratorioPruebaEmbarazo"].[value='+data.recomendacionesadvertencia.laboratorioPruebaEmbarazo+']').iCheck("check");

			$('[name="autorizacionDoctor"].[value='+data.recomendacionesadvertencia.autorizacionDoctor+']').iCheck("check");

			$('[name="observacionesParaAsistente"]').val(data.hcseguimiento.observacion);

			$('[name="implantesProbables"]').val(data.hcseguimiento.implantesProbables);

					//window.location.href = '/hcfa/public/facturacion/update/'+data;
			}).fail(function(error){
					console.log(error)
			});
	}


	function checkField() {
		 		  $('#form-hcd').find('textarea,input[type="text"]').keyup(function () {

				  $('#form-hcd').find('textarea,input[type="text"]').each(function (i, v) {

				 		if($(v).val() || $(v).hasClass('checked')){
				 			$('#savedhcd').prop('disabled',false);
				 			return false;
				 		}else{
				 			$('#savedhcd').prop('disabled',true);
				 		}

				 });

		  });
	}


		$('.checkPrexia').on('ifChecked',function () {

			$('.checkValidatePrexia').iCheck('enable');

		});

		$('.checkPrexia').on('ifUnchecked',function () {

			$('.checkValidatePrexia').iCheck('uncheck');
			$('.checkValidatePrexia').iCheck('disable');

		});


		//BLEFAROPLASTIA

		$('.checkBlefaroplastia').on('ifChecked',function () {

			$('.BlefaroplastiaValidate').iCheck('enable');

		});

		$('.checkBlefaroplastia').on('ifUnchecked',function () {

			$('.BlefaroplastiaValidate').iCheck('uncheck');
			$('.BlefaroplastiaValidate').iCheck('disable');

		});

		//RINOPLASTIA

		$('.checkRinoplastia').on('ifChecked',function () {

			$('.RinoplastiaValidate').iCheck('enable');

		});

		$('.checkRinoplastia').on('ifUnchecked',function () {

			$('.RinoplastiaValidate').iCheck('uncheck');
			$('.RinoplastiaValidate').iCheck('disable');

		});


		//LABORATORIO

		$('.checkLaboratorio').on('ifChecked',function () {

			$('.laboratorioValidate').iCheck('enable');

		});

		$('.checkLaboratorio').on('ifUnchecked',function () {

			$('.laboratorioValidate').iCheck('uncheck');
			$('.laboratorioValidate').iCheck('disable');

		});



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

		if( '{{ $idhc }}' ){
			$('textarea,input[type="text"],select').prop('disabled',true);
			$('input').iCheck('disable');
		}
	</script>

@stop
