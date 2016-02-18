<?php namespace App\Http\Controllers;

use App\Http\Controllers\controller;
use App\Models\HistoriaClinicaPreliminar;
use App\Models\OtrosAntecedentes;
use App\Models\MotivoDeConsulta;
use App\Models\ExamenFisico;
use App\Models\Tratamiento;
use App\Models\RecomendacionesAdvertencia;
use App\Models\Seguimiento;
use App\Models\paciente;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator as Paginator;
use Validator, Input, Redirect ;


class HistoriaclinicapreliminarController extends Controller {

	protected $layout = "layouts.main";
	protected $data = array();
	public $module = 'historiaclinicapreliminar';
	static $per_page	= '10';

	public function __construct()
	{
		parent::__construct();
		$this->beforeFilter('csrf', array('on'=>'post'));
		$this->model = new HistoriaClinicaPreliminar();

		$this->modelAtencedente = new OtrosAntecedentes();
		$this->modelMotivoConsulta = new MotivoDeConsulta();
		$this->modelExamenFisico = new ExamenFisico();
		$this->modelTratamiento = new Tratamiento();
		$this->modelRecomendaciones = new RecomendacionesAdvertencia();
		$this->modelPaciente = new paciente();
		$this->modelSeguimiento = new Seguimiento();

		$this->info = $this->model->makeInfo( $this->module);
		$this->access = $this->model->validAccess($this->info['id']);

		$this->data = array(
			'pageTitle'	=> 	$this->info['title'],
			'pageNote'	=>  $this->info['note'],
			'pageModule'=> 'historiaclinicapreliminar',
			'pageUrl'			=>  url('historiaclinicapreliminar'),
			'return'	=> self::returnUrl()

		);

	}

	public function getIndex( Request $request )
	{

		if($this->access['is_view'] ==0)
			return Redirect::to('dashboard')
				->with('messagetext', \Lang::get('core.note_restric'))->with('msgstatus','error');

				$histpreliminar = $this->model->getColumnTable('histpreliminar');
				$otrosantecedentes = $this->modelAtencedente->getColumnTable('otrosantecedentes');
				$motivodeconsulta = $this->modelMotivoConsulta->getColumnTable('motivodeconsulta');
				$examenfisico = $this->modelExamenFisico->getColumnTable('examenfisico');
				$tratamiento = $this->modelTratamiento->getColumnTable('tratamiento');
				$recomendacionesadvertencia = $this->modelRecomendaciones->getColumnTable('recomendacionesadvertencia');
				$DatosBasicosPacientes = $this->modelPaciente->getColumnTable('DatosBasicosPacientes');

				$this->data['histpreliminar'] = $histpreliminar;
				$this->data['otrosantecedentes'] = $otrosantecedentes;
				$this->data['motivodeconsulta'] = $motivodeconsulta;
				$this->data['examenfisico'] = $examenfisico;
				$this->data['tratamiento'] = $tratamiento;
				$this->data['recomendacionesadvertencia'] = $recomendacionesadvertencia;
				$this->data['DatosBasicosPacientes'] = $DatosBasicosPacientes;

				return $this->data;
				return view('historiaclinicapreliminar.form',$this->data);

	}



	function getUpdate(Request $request, $id = null)
	{

		if($id =='')
		{
			if($this->access['is_add'] ==0 )
			return Redirect::to('dashboard')->with('messagetext',\Lang::get('core.note_restric'))->with('msgstatus','error');
		}

		if($id !='')
		{
			if($this->access['is_edit'] ==0 )
			return Redirect::to('dashboard')->with('messagetext',\Lang::get('core.note_restric'))->with('msgstatus','error');
		}

		$row = $this->model->find($id);
		if($row)
		{
			$this->data['row'] =  $row;
		} else {
			$this->data['row'] = $this->model->getColumnTable('HistoriaClinicaPreliminar');
		}
		$this->data['fields'] =  \AjaxHelpers::fieldLang($this->info['config']['forms']);


		$this->data['id'] = $id;
		return view('historiaclinicapreliminar.form',$this->data);
	}

	public function getShow( $id = null, $id_hc = null)
	{

		if($this->access['is_detail'] ==0)
			return Redirect::to('dashboard')
				->with('messagetext', \Lang::get('core.note_restric'))->with('msgstatus','error');


				$paciente = \DB::table('DatosBasicosPacientes')->find($id);

				if(!$paciente){
					return Redirect::to('pacientes');
				}

				if(!$id_hc) {

					$this->data['histpreliminar'] = $this->model->getColumnTable('histpreliminar');
					$this->data['otrosantecedentes'] = $this->modelAtencedente->getColumnTable('otrosantecedentes');
					$this->data['motivodeconsulta'] = $this->modelMotivoConsulta->getColumnTable('motivodeconsulta');
					$this->data['examenfisico'] = $this->modelExamenFisico->getColumnTable('examenfisico');
					$this->data['tratamiento'] = $this->modelTratamiento->getColumnTable('tratamiento');
					$this->data['recomendacionesadvertencia'] = $this->modelRecomendaciones->getColumnTable('recomendacionesadvertencia');
					$this->data['hcseguimiento'] = $this->modelSeguimiento->getColumnTable('hcseguimiento');
					$this->data['DatosBasicosPacientes'] = $this->modelPaciente->getColumnTable('DatosBasicosPacientes');
					$this->data['idhc'] = null;
					$this->data['idPaciente'] = $id;

					return view('historiaclinicapreliminar.form',$this->data);

				}

				$hc 			= $this->model->find($id_hc);

				if (!$hc) {
					return Redirect::to('paciente/'.$id);
				}

				$datahc = \DB::table('histPreliminar')->where('idPaciente', $id)->where('id', $id_hc)->first();


					$this->data['otrosantecedentes'] = $this->modelAtencedente->where('id', $datahc->idOtrosAntecedentes)->first();
					$this->data['motivodeconsulta'] = $this->modelMotivoConsulta->where('id', $datahc->idMotivoConsulta)->first();
					$this->data['examenfisico'] = $this->modelExamenFisico->where('id', $datahc->idExamenFisico)->first();
					$this->data['tratamiento'] = $this->modelTratamiento->where('id', $datahc->idTratamiento)->first();
					$this->data['hcseguimiento'] = $this->modelSeguimiento->where('id', $datahc->idSeguimiento)->first();
					$this->data['recomendacionesadvertencia'] = $this->modelRecomendaciones->where('id', $datahc->idRecomendacionesAdvertencia)->first();

					$this->data['idhc'] = $datahc->id;
					$this->data['idPaciente'] = $id;


				//return $this->data;
				return view('historiaclinicapreliminar.form',$this->data);
	}

		 function getCargar($id = null)
		{

					$datahc = \DB::table('histPreliminar')->where('id', $id)->first();

					$this->data['otrosantecedentes'] = $this->modelAtencedente->where('id', $datahc->idOtrosAntecedentes)->first();
					$this->data['motivodeconsulta'] = $this->modelMotivoConsulta->where('id', $datahc->idMotivoConsulta)->first();
					$this->data['examenfisico'] = $this->modelExamenFisico->where('id', $datahc->idExamenFisico)->first();
					$this->data['tratamiento'] = $this->modelTratamiento->where('id', $datahc->idTratamiento)->first();
					$this->data['hcseguimiento'] = $this->modelSeguimiento->where('id', $datahc->idSeguimiento)->first();
					$this->data['recomendacionesadvertencia'] = $this->modelRecomendaciones->where('id', $datahc->idRecomendacionesAdvertencia)->first();

					$this->data['idhc'] = $datahc->id;
					$this->data['idPaciente'] = $id;
					return $this->data;
		}

	function postSave( Request $request)
	{

		//return $request->all();

		$dataOtrosAntecedentes = [

			"quirurgicos_text" => $request->input("cualAntecedenteQuirurgico"),

			"medicos_text" => $request->input("cualAntecedenteMedico"),

			"farmacologicos_text" => $request->input("cualAntecedenteFarmacologico"),

			"homeopaticos_text" => $request->input("cualAntecedenteHomeopaticos"),

			"alergicos_text" => $request->input("cualAntecedenteAlergicos"),

			"ginecoObstetricas_text" => $request->input("cualAntecedenteGinecoObstetricas"),

			 "toxicologicas_text" => $request->input("cualAntecedenteToxicologica"),

			"tabaquismo_text" => $request->input("cualAntecedenteTabaquismo"),
			"seIndicaSuspender" => $request->input("seIndicaSuspender"),
			"otros" => $request->input("otrosAntecedentes"),
			"signosVitalesNormales" => $request->input("signoVitalNormal"),
			"signosVitalesFC" => $request->input("signoVitalFC"),
			"signosVitalesFR" => $request->input("signoVitalFR"),
			"signosVitalesTA" => $request->input("signoVitalTA"),

		];

		$data_motivo_consulta = [
			"motivoSecuelasLipo" => $request->input("motivoSecuelasLipo"),
			"mejorarContornoCorporal" => $request->input("mejorarContornoCorporal"),
			"mejorarFlacidesAbdomen" => $request->input("mejorarFlacidesAbdomen"),
			"aumentarProyeccionGluteos" => $request->input("aumentarProyeccionGluteos"),
			"mejorarCicatrizLipectomia" => $request->input("mejorarCicatrizLipectomia"),
			"masHijos" => $request->input("masHijos"),
			"mejorarOrejas" => $request->input("mejorarOrejas"),
			"areasMayorInteres" => $request->input("areasMayorInteres"),
			"mejorarPigmentacionCara" => $request->input("mejorarPigmentacionCara"),
			"disminuirSurcosNasogenianos" => $request->input("disminuirSurcosNasogerianos"),
			"disminuirSurcosMarioneta" => $request->input("disminuirSurcosMarioneta"),
			"disminuirLineasExpresion" => $request->input("disminuirLineasExpresion"),
			"patasDeGallina" => $request->input("patasDeGallina"),
			"frente" => $request->input("frente"),
			"ceno" => $request->input("ceno"),
			"mejorarSecuelasAcne" => $request->input("mejorarSecualesAcne"),
			"mejorarCalidadPielCara" => $request->input("mejorarCalidadPielCara"),
			"mejorarFlacidezCuello" => $request->input("mejorarFlacidezCuello"),
			"depilacionLaser" => $request->input("depilacionLaser"),
			"mejorarRitidesLabioSuperior" => $request->input("mejorarRitidesLabioSuperior"),
			"mejorarPigmentacionSurcosNasoyugales" => $request->input("mejorarPigmentacionSurcosNasoyugales"),
			"aumentarTamanoSenos" => $request->input("aumentarTamanoSenos"),
			"disminuirTamanoSenos" => $request->input("disminuirTamanoSenos"),
			"levantamientoSenos" => $request->input("levantamientoSenos"),
			"cambiarImplantes" => $request->input("cambiarImplantes"),
			"mejorarCicatrizMamoplastia" => $request->input("mejorarCicatrizMamoplastia"),
			"tallaAproximadaDesea" => $request->input("tallaAproximadaDesea"),
			"enfermedadActual" => $request->input("enfermedadActual"),
			"reseccionNevusCara" => $request->input("reseccionNevusCara"),
			"reseccionNevusCuerpo" => $request->input("reseccionNevusCuerpo"),
			"corregirLobulosHendidos" => $request->input("corregirLobulosHendidos"),
			"mejorarCalidadCicatriz" => $request->input("mejorarCalidadCicatriz"),
			"verBrochureTNQ" => $request->input("verBrochureTNQ"),
			"ObservacionesMotivoConsulta" => $request->input("ObservacionesMotivoConsulta"),
			"mejorarCicatrizAbdomen" => $request->input("mejorarCicatrizAbdomen"),
			"mejorarCicatrizCara" => $request->input("mejorarCicatrizCara"),
			"reseccionNevusComentario" => $request->input("reseccionNevusComentario"),
			"mejorarExcesoPielParpadoSuperior" => $request->input("mejorarExcesoPielParpadoSuperior"),
			"mejorarBolsaParpadoInferior" => $request->input("mejorarBolsaParpadoInferior"),
			"mejorarFlacidezParapadoInferior" => $request->input("mejorarFlacidezParapadoInferior"),
			"mejorarLineasExpresion" => $request->input("mejorarLineasExpresion"),
			"elevarCejas" => $request->input("elevarCejas"),
			"aumentarProyeccionMenton" => $request->input("aumentarProyeccionMenton"),
			"mejorarEsteticaNariz" => $request->input("mejorarEsteticaNariz"),
			"mejorarSecuelasRinoPrevias" => $request->input("mejorarSecuelasRinoPrevias"),
			"mejorarCuadroObstructivo" => $request->input("mejorarCuadroObstructivo"),
			"comoRespira" => $request->input("estadoRespiracion"),
			"FND" => $request->input("FND"),
			"FNI" => $request->input("FNI"),
		];


		$data_examen_fisico = [
			"abdomenColgante" => $request->input("abdomenColgante"),
			"flacidezAbdominal" => $request->input("flacidezAbdominal"),
			"striaeDistensae" => $request->input("striaeDistensae"),
			"diastasisRectos" => $request->input("diastasisRectos"),
			"gigantomastia" => $request->input("gigantomastia"),
			"tamanoSenos" => $request->input("tamanoSenos"),
			"ptosis" => $request->input("ptosis"),
			"asimetriaFormaTamano" => $request->input("asimetriaFormaTamano"),
			"blefachalasisParapadoSuperior" => $request->input("blefachalasisParapadoSuperior"),
			"cojinAdiposoParpadoSuperior" => $request->input("cojinAdiposoParpadoSuperior"),
			"blefachalasisParapadoInferior" => $request->input("blefachalasisParapadoInferior"),
			"cojinAdiposoParpadoInferior" => $request->input("cojinAdiposoParpadoInferior"),
			"asimetria" => $request->input("asimetria"),
			"gibaOsteocartilaginosa" => $request->input("gibaOsteocartilaginosa"),
			"laterorinia" => $request->input("laterorinia"),
			"malaDefinicionPunta" => $request->input("malaDefinicionPunta"),
			"malaProyeccionPunta" => $request->input("malaProyeccionPunta"),
			"PtosisPunta" => $request->input("PtosisPunta"),
			"asimetriaPunta" => $request->input("asimetriaPunta"),
			"pielGruesa" => $request->input("pielGruesa"),
			"alasGruesas" => $request->input("alasGruesas"),
			"fosasAmplias" => $request->input("fosasAmplias"),
			"asimetriaFosasNasales" => $request->input("asimetriaFosasNasales"),
			"deflexionSeptal" => $request->input("deflexionSeptal"),
			"hipertrofiaCornete" => $request->input("hipertrofiaCornete"),
			"hipoplasiaMenton" => $request->input("hipoplasiaMenton"),
			"telanglectasiasMuslos" => $request->input("telanglectasiasMuslos"),
			"telanglectasiasPiernas" => $request->input("telanglectasiasPiernas"),
			"telanglectasiasCara" => $request->input("telanglectasiasCara"),
			"cicatrices" => $request->input("cicatrices"),
			"cicatrizHipertrofica" => $request->input("cicatrizHipertrofica"),
			"cicatrizQueloide" => $request->input("cicatrizQueloide"),
			"area" => $request->input("area"),
			"masas" => $request->input("masas"),
			"examenFisicoAbdomen" => $request->input("examenFisicoAbdomen"),
			"examenFisicoFlancos" => $request->input("examenFisicoFlancos"),
			"examenFisicoRollosEspalda" => $request->input("examenFisicoRollosEspalda"),
			"caraLateralMuslos" => $request->input("caraLateralMuslos"),
			"caraMedialMuslos" => $request->input("caraMedialMuslos"),
			"examenFisicoBrazos" => $request->input("examenFisicoBrazos"),
			"examenFisicoPapada" => $request->input("examenFisicoPapada"),
			"pocoProyeccionGluteos" => $request->input("pocoProyeccionGluteos"),
			"examenFisicoPectorales" => $request->input("examenFisicoPectorales"),
			"celulitisAbdomen" => $request->input("celulitisAbdomen"),
			"celulitisBrazos" => $request->input("celulitisBrazos"),
			"celulitisMuslos" => $request->input("celulitisMuslos"),
			"celulitisGluteos" => $request->input("celulitisGluteos"),
			"flacidezAbdomen" => $request->input("flacidezAbdomen"),
			"flacidezBrazos" => $request->input("flacidezBrazos"),
			"flacidezRollosEspalda" => $request->input("flacidezRollosEspalda"),
			"flacidezFlancos" => $request->input("flacidezFlancos"),
			"flacidezGluteos" => $request->input("flacidezGluteos"),
			"flacidezEntrepiernas" => $request->input("flacidezEntrepiernas"),
			"flacidezMuslos" => $request->input("flacidezMuslos"),
			"lineasExpresionPronunciadas" => $request->input("lineasExpresionPronunciadas"),
			"fotodano" => $request->input("fotodano"),
			"protesisColaCeja" => $request->input("protesisColaCeja"),
			"cojinMalaAtroficoPsico" => $request->input("cojinMalaAtroficoPsico"),
			"rejuvecimientoFlacidezCara" => $request->input("rejuvecimientoFlacidezCara"),
			"rejuvecimientoFlacidezCuello" => $request->input("rejuvecimientoFlacidezCuello"),
			"rejuvecimientoJowlsPronunciados" => $request->input("rejuvecimientoJowlsPronunciados"),
			"rejuvecimientoSurcosNasogenianos" => $request->input("rejuvecimientoSurcosNasogenianos"),
			"rejuvecimientoSurcosMarioneta" => $request->input("rejuvecimientoSurcosMarioneta"),
			"rejuvecimientoCodigoBarrasLabios" => $request->input("rejuvecimientoCodigoBarrasLabios"),
			"hiperpigmentacionPielCara" => $request->input("hiperpigmentacionPielCara"),
			"rejuvecimientoSecuelasAcne" => $request->input("rejuvecimientoSecuelasAcne"),
			"flacidezEnfrenteMejillas" => $request->input("flacidezEnfrenteMejillas"),
			"flacidezEnfrenteCuello" => $request->input("flacidezEnfrenteCuello"),
			"flacidezEnfrenteLineasMandibula" => $request->input("flacidezEnfrenteLineasMandibula"),
			"acumuloGrasoEmpapada" => $request->input("acumuloGrasoEmpapada"),
			"tipoPiel" => $request->input("tipoPiel"),
			"surcosFrente" => $request->input("surcosFrente"),
			"surcosEntrecejo" => $request->input("surcosEntrecejo"),
			"surcosNasoyugales" => $request->input("surcosNasoyugales"),
			"surcosNasogenianos" => $request->input("surcosNasogenianos"),
			"surcosMarioneta" => $request->input("surcosMarioneta"),
			"fotodanoCalidadPielCara" => $request->input("fotodanoCalidadPielCara"),
			"ritidezParpadoInferior" => $request->input("ritidezParpadoInferior"),
			"ritidezMejillas" => $request->input("ritidezMejillas"),
			"malaDefinicionAntihelix" => $request->input("malaDefinicionAntihelix"),
			"rejuvecimientoHipertrofiaConcha" => $request->input("rejuvecimientoHipertrofiaConcha"),
			"asimetriaFormaTomano" => $request->input("asimetriaFormaTomano")
		];


		$data_tratamiento = [
			"cirugiaPostparto" => $request->input("cirugiaPostparto"),
			"lipoesculturaAsistidaUltrasonido" => $request->input("lipoesculturaAsistidaUltrasonido"),
			"lipoinyeccionGluteosTrocontericas" => $request->input("lipoinyeccionGluteosTrocontericas"),
			"abdominoplastia" => $request->input("abdominoplastia"),
			"mamoplastiaAumentoImplantes" => $request->input("mamoplastiaAumentoImplantes"),
			"cambioImplantesMamarios" => $request->input("cambioImplantesMamarios"),
			"mamoplastiaReduccion" => $request->input("mamoplastiaReduccion"),
			"pexiaMamariaCicatrizPeriareoral" => $request->input("pexiaMamariaCicatrizPeriareoral"),
			"pexiaMamariaTInvertida" => $request->input("pexiaMamariaTInvertida"),
			"pexiaMamariaVertical" => $request->input("pexiaMamariaVertical"),
			"pexiaMamariaHemiareoralSuperior" => $request->input("pexiaMamariaHemiareoralSuperior"),
			"pexiaMamariaHemiareoralInferior" => $request->input("pexiaMamariaHemiareoralInferior"),
			"pexiaMamariaDecidiraEnCirujia" => $request->input("pexiaMamariaDecidiraEnCirujia"),
			"pexiaMamariaConImplantesSilicona" => $request->input("pexiaMamariaConImplantesSilicona"),
			"pexiaMamariaSinImplantesSilicona" => $request->input("pexiaMamariaSinImplantesSilicona"),
			"gluteoplastiaImplantes" => $request->input("gluteoplastiaImplantes"),
			"RinoplastiaEstetica" => $request->input("RinoplastiaEstetica"),
			"RinoplastiaFuncional" => $request->input("RinoplastiaFuncional"),
			"Mentoplastia" => $request->input("Mentoplastia"),
			"Otoplastia" => $request->input("Otoplastia"),
			"BlefaroplastiaSuperior" => $request->input("BlefaroplastiaSuperior"),
			"BlefaroplastiaInferior" => $request->input("BlefaroplastiaInferior"),
			"traeFotografiaDeSenos" => $request->input("traeFotografiaDeSenos"),
			"ritidoplastia" => $request->input("ritidoplastia"),
			"lipoinyeccionSurcos" => $request->input("lipoinyeccionSurcos"),
			"bichectomia" => $request->input("bichectomia"),
			"dermoabrasionLabioSuperior" => $request->input("dermoabrasionLabioSuperior"),
			"acidoHialuroico" => $request->input("acidoHialuroico"),
			"botoxFrente" => $request->input("botoxFrente"),
			"botoxCeno" => $request->input("botoxCeno"),
			"botoxPatasGallina" => $request->input("botoxPatasGallina"),
			"observacionTratamiento" => $request->input("observacionTratamiento")
		];

		$data_recomendacionesAdvertencia = [
			"procedimientoImplicaCicatrices" => $request->input("procedimientoImplicaCicatrices"),
			"realizaraNuevoOmbligo" => $request->input("realizaraNuevoOmbligo"),
			"AsimetriaPrexistenteFormaTamano" => $request->input("AsimetriaPrexistenteFormaTamano"),
			"puedenPersistirAcumulosGrasos" => $request->input("puedenPersistirAcumulosGrasos"),
			"noDeseaAbdominoplastia" => $request->input("noDeseaAbdominoplastia"),
			"magnitudCirugiaAcumulosGrasos" => $request->input("magnitudCirugiaAcumulosGrasos"),
			"adviertePersisteEstrias" => $request->input("adviertePersisteEstrias"),
			"adviertePersisteFlacidez" => $request->input("adviertePersisteFlacidez"),
			"mejoriaSeraParcial" => $request->input("mejoriaSeraParcial"),
			"areasPacienteIntepretaGordo" => $request->input("areasPacienteIntepretaGordo"),
			"marcacionAbdominalesPuedeVariar" => $request->input("marcacionAbdominalesPuedeVariar"),
			"aumentoProyeccionGluteos" => $request->input("aumentoProyeccionGluteos"),
			"pacienteNoDeseaPexia" => $request->input("pacienteNoDeseaPexia"),
			"persistirAsimetrias" => $request->input("persistirAsimetrias"),
			"dispositivosPrestigiosasMarcas" => $request->input("dispositivosPrestigiosasMarcas"),
			"cambioNarizLimitado" => $request->input("cambioNarizLimitado"),
			"calidadCicatrizPuedeVariar" => $request->input("calidadCicatrizPuedeVariar"),
			"malaCicatrizacion" => $request->input("malaCicatrizacion"),
			"cambiosSencibilidad" => $request->input("cambiosSencibilidad"),
			"desviacionPreviaPersistir" => $request->input("desviacionPreviaPersistir"),
			"persistirAsimetriaTamano" => $request->input("persistirAsimetriaTamano"),
			"persistirIrregularidad" => $request->input("persistirIrregularidad"),
			"laboratorioProtrombina" => $request->input("laboratorioProtrombina"),
			"laboratorioGlicemia" => $request->input("laboratorioGlicemia"),
			"laboratorioTrimboplastina" => $request->input("laboratorioTrimboplastina"),
			"laboratorioEKG" => $request->input("laboratorioEKG"),
			"laboratorioHematico" => $request->input("laboratorioHematico"),
			"laboratorioPruebaEmbarazo" => $request->input("laboratorioPruebaEmbarazo"),
			"autorizacionDoctor" => $request->input("autorizacionDoctor")
		];

		$data_seguimiento = [
			"observacion"=> $request->input("observacionesParaAsistente"),
			"accion"=> 1,
			"fecha"=> date("Y-m-d H:i:s"),
			"usuario"=> \Session::get('uid'),
			"implantesProbables" => $request->input("implantesProbables")
		];

			$id_OtrosAntecedentes = $this->modelAtencedente->insertRow($dataOtrosAntecedentes , null);
			$id_MotivoConsulta = $this->modelMotivoConsulta->insertRow($data_motivo_consulta , null);
			$id_examen_fisico = $this->modelExamenFisico->insertRow($data_examen_fisico , null);
			$id_tratamiento = $this->modelTratamiento->insertRow($data_tratamiento , null);
			$id_seguimiento = $this->modelSeguimiento->insertRow($data_seguimiento , null);
			$id_recomendacionesAdvertencia = $this->modelRecomendaciones->insertRow($data_recomendacionesAdvertencia , null);

			$hcPreliminar = [
				'idOtrosAntecedentes' => $id_OtrosAntecedentes,
				'idMotivoConsulta' => $id_MotivoConsulta,
				'idExamenFisico' => $id_examen_fisico,
				'idTratamiento' => $id_tratamiento,
				'idRecomendacionesAdvertencia' => $id_recomendacionesAdvertencia,
				'idPaciente' => $request->input('idPaciente'),
				'idIngresadoPor' => \Session::get('uid'),
				'idSeguimiento' => $id_seguimiento,
				'autosave' => 0
			];

			$id_hcPreliminar = $this->model->insertRow($hcPreliminar , null);

			return Redirect::to('paciente/'.$request->input('idPaciente'));

	}

	public function postDelete( Request $request)
	{

		if($this->access['is_remove'] ==0)
			return Redirect::to('dashboard')
				->with('messagetext', \Lang::get('core.note_restric'))->with('msgstatus','error');
		// delete multipe rows
		if(count($request->input('ids')) >=1)
		{
			$this->model->destroy($request->input('ids'));

			\SiteHelpers::auditTrail( $request , "ID : ".implode(",",$request->input('ids'))."  , Has Been Removed Successfull");
			// redirect
			return Redirect::to('historiaclinicapreliminar')
        		->with('messagetext', \Lang::get('core.note_success_delete'))->with('msgstatus','success');

		} else {
			return Redirect::to('historiaclinicapreliminar')
        		->with('messagetext','No Item Deleted')->with('msgstatus','error');
		}

	}


}
