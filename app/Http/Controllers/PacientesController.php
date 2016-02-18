<?php namespace App\Http\Controllers;

use App\Http\Controllers\controller;
use App\Models\Pacientes;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator as Paginator;
use Validator, Input, Redirect ;


class PacientesController extends Controller {

	protected $layout = "layouts.main";
	protected $data = array();
	public $module = 'pacientes';
	static $per_page	= '10';

	public function __construct()
	{
		parent::__construct();
		$this->beforeFilter('csrf', array('on'=>'post'));
		$this->model = new Pacientes();
		$this->info = $this->model->makeInfo( $this->module);
		$this->access = $this->model->validAccess($this->info['id']);

		$this->data = array(
			'pageTitle'	=> 	$this->info['title'],
			'pageNote'	=>  $this->info['note'],
			'pageModule'=> 'pacientes',
			'pageUrl'			=>  url('pacientes'),
			'return'	=> self::returnUrl()

		);

	}

	public function getIndex( Request $request )
	{

		if($this->access['is_view'] ==0)
			return Redirect::to('dashboard')
				->with('messagetext', \Lang::get('core.note_restric'))->with('msgstatus','error');

		$this->data['pacientes'] = \DB::table('DatosBasicosPacientes')
															->select('DatosBasicosPacientes.id','DatosBasicosPacientes.tipoDocumento','DatosBasicosPacientes.numDoc','DatosBasicosPacientes.nombres','DatosBasicosPacientes.apellido1','DatosBasicosPacientes.apellido2','estadoPaciente.nombre as estado', 'estadoPaciente.css')
															->join('estadoPaciente', 'estadoPaciente.id', '=', 'DatosBasicosPacientes.estadoPaciente')
															->orderBy('ultimaEdicion','desc')
															->get();
		return view('pacientes.index',$this->data);
		//return $this->data;
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

		$this->data['access']		= $this->access;
		return view('pacientes.form',$this->data);
	}

	public function getShow( $id = null)
	{

		if($this->access['is_detail'] ==0)
			return Redirect::to('dashboard')
				->with('messagetext', \Lang::get('core.note_restric'))->with('msgstatus','error');


		$this->data['access']		= $this->access;
		return view('pacientes.view',$this->data);
	}

	function postSave( Request $request)
	{


	}

	public function postDelete( Request $request)
	{

		if($this->access['is_remove'] ==0)
			return Redirect::to('dashboard')
				->with('messagetext', \Lang::get('core.note_restric'))->with('msgstatus','error');

	}


}
