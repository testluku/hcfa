<?php namespace App\Http\Controllers;

use App\Http\Controllers\controller;
use App\Models\Contrato;
use App\Models\Procedimiento;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator as Paginator;
use Validator, Input, Redirect ;


class ContratoController extends Controller {

  protected $layout = "layouts.main";
	protected $data = array();
	public $module = 'paciente';
	static $per_page	= '10';

	public function __construct()
	{
		parent::__construct();
		$this->beforeFilter('csrf', array('on'=>'post'));

    $this->model              = new Contrato();
    $this->modelProcedimiento = new Procedimiento();

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

		$sort = (!is_null($request->input('sort')) ? $request->input('sort') : 'idHistoriaClinica');
		$order = (!is_null($request->input('order')) ? $request->input('order') : 'asc');
		// End Filter sort and order for query
		// Filter Search for query
		$filter = (!is_null($request->input('search')) ? $this->buildSearch() : '');


		$page = $request->input('page', 1);
		$params = array(
			'page'		=> $page ,
			'limit'		=> (!is_null($request->input('rows')) ? filter_var($request->input('rows'),FILTER_VALIDATE_INT) : static::$per_page ) ,
			'sort'		=> $sort ,
			'order'		=> $order,
			'params'	=> $filter,
			'global'	=> (isset($this->access['is_global']) ? $this->access['is_global'] : 0 )
		);
		// Get Query
		$results = $this->model->getRows( $params );

		// Build pagination setting
		$page = $page >= 1 && filter_var($page, FILTER_VALIDATE_INT) !== false ? $page : 1;
		$pagination = new Paginator($results['rows'], $results['total'], $params['limit']);
		$pagination->setPath('historiaclinicadefinitiva');

		$this->data['rowData']		= $results['rows'];
		// Build Pagination
		$this->data['pagination']	= $pagination;
		// Build pager number and append current param GET
		$this->data['pager'] 		= $this->injectPaginate();
		// Row grid Number
		$this->data['i']			= ($page * $params['limit'])- $params['limit'];
		// Grid Configuration
		$this->data['tableGrid'] 	= $this->info['config']['grid'];
		$this->data['tableForm'] 	= $this->info['config']['forms'];
		$this->data['colspan'] 		= \SiteHelpers::viewColSpan($this->info['config']['grid']);
		// Group users permission
		$this->data['access']		= $this->access;
		// Detail from master if any

		// Master detail link if any
		$this->data['subgrid']	= (isset($this->info['config']['subgrid']) ? $this->info['config']['subgrid'] : array());
		// Render into template
		return view('historiaclinicadefinitiva.index',$this->data);
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
			$this->data['row'] = $this->model->getColumnTable('HistoriaClinica');
		}
		$this->data['fields'] =  \AjaxHelpers::fieldLang($this->info['config']['forms']);


		$this->data['id'] = $id;
		return view('historiaclinicadefinitiva.form',$this->data);
	}

	public function getShow( $id = null, $idProcedimiento = null ,$idContrato = null)
	{

		if($this->access['is_detail'] ==0)
			return Redirect::to('dashboard')
				->with('messagetext', \Lang::get('core.note_restric'))->with('msgstatus','error');

				$paciente = \DB::table('DatosBasicosPacientes')->find($id);

				if(!$paciente){
					return Redirect::to('pacientes');
				}

				if(!$idContrato) {

					$this->data['data_contrato'] = $this->model->getColumnTable('contrato');
					$this->data['idPaciente'] = $id;
					$this->data['idProcedimiento'] = $idProcedimiento;

          //return $this->data;
					return view('contrato.form',$this->data);

				}

				  $contrato	= $this->model->find($idContrato);

  				if (!$contrato) {
  					return Redirect::to('paciente/'.$id);
  				}

				  //$data_contrato = \DB::table('contrato')->find($idContrato);

					$this->data['data_contrato'] = $contrato;
					$this->data['idPaciente'] = $id;
					$this->data['idProcedimiento'] = $idProcedimiento;

          //return $this->data;
			return view('contrato.form',$this->data);
	}

	function postSave( Request $request)
	{
			//return $request->all();

			$data_contrato = [
				"observacion"=> $request->input("observacionesParaAsistente"),
				"accion"=> 1,
				"fecha"=> date("Y-m-d H:i:s"),
				"usuario"=> \Session::get('uid'),
				"implantesProbables" => $request->input("implantesProbables")
			];

				$id_contrato = $this->model->insertRow($data_contrato , null);

				$procedimientoUp = [
					'idContrato' => $id_contrato
				];

				$id_hcDefinitiva = $this->modelProcedimiento->insertRow($procedimientoUp , $request->input('idProcedimiento'));

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
			return Redirect::to('historiaclinicadefinitiva')
        		->with('messagetext', \Lang::get('core.note_success_delete'))->with('msgstatus','success');

		} else {
			return Redirect::to('historiaclinicadefinitiva')
        		->with('messagetext','No Item Deleted')->with('msgstatus','error');
		}

	}


}
