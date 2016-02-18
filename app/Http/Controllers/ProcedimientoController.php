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
use App\Models\Procedimiento;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator as Paginator;
use Validator, Input, Redirect ;


class ProcedimientoController extends Controller {

	protected $layout = "layouts.main";
	protected $data = array();
	public $module = 'paciente';
	static $per_page	= '10';

	public function __construct()
	{
		parent::__construct();
		$this->beforeFilter('csrf', array('on'=>'post'));
		$this->model = new Procedimiento();

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
			'pageModule'=> 'paciente',
			'pageUrl'			=>  url('paciente'),
			'return'	=> self::returnUrl()
		);

	}

	public function getIndex( Request $request )
	{

		if($this->access['is_view'] ==0)
			return Redirect::to('dashboard')
				->with('messagetext', \Lang::get('core.note_restric'))->with('msgstatus','error');

				$procedimiento = $this->model->getColumnTable('procedimiento');

				return $this->data;
				//return view('historiaclinicapreliminar.form',$this->data);

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

	function postSave( Request $request)
	{

		 // return $request->input('data')['idPaciente'];

      $procedimiento = [
        'idhcdefinitiva' => null,
        'idPaciente' => $request->input('data')['idPaciente']
      ];

        $id_procedimiento = $this->model->insertRow($procedimiento, null);

        $data = $this->model->where('id', $id_procedimiento)->first();

        return $data;

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
