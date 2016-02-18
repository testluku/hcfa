<?php namespace App\Http\Controllers;

use App\Http\Controllers\controller;
use App\Models\Paciente;
use App\Models\RespuestasPaciente;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator as Paginator;
use Validator, Input, Redirect ;
use Log;




class PacienteController extends Controller {

	protected $layout = "layouts.main";
	protected $data = array();
	public $module = 'paciente';
	static $per_page	= '10';

	public function __construct()
	{
		parent::__construct();
		$this->beforeFilter('csrf', array('on'=>'post'));
		$this->model = new Paciente();
		$this->modelRespuestas = new RespuestasPaciente();
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

	public function getIndex( Request $request, $id = null )
	{

		if($this->access['is_view'] ==0)
			return Redirect::to('dashboard')
				->with('messagetext', \Lang::get('core.note_restric'))->with('msgstatus','error');

		$dbp = $this->model->find($id);
		$da = \DB::table('DatosAdicionalesPacientes')->where('id',$id)->first();
		$estado = \DB::table('estadoPaciente')->where('id',$dbp->estadoPaciente)->first();



		$data_quote = \DB::table('cotizacion')
														->select('cotizacion.id','cotizacion.createdAt', 'cotizacion.observation', \DB::raw('SUM(itemCotizacion.cantidad * itemCotizacion.valor) - SUM(itemCotizacion.descuento) as amount_total'))
														->leftJoin('itemCotizacion','itemCotizacion.idCotizacion','=','cotizacion.id')
														->where('cotizacion.idPaciente', $id)
														->where('cotizacion.estado',0)
														->groupBy('cotizacion.id')
														->get(['cotizacion.id','cotizacion.observation']);



		$data_invoice = \DB::table('facturacion')
														->select('facturacion.id','facturacion.codigo','facturacion.estado','facturacion.createdAt', \DB::raw('SUM(itemCotizacion.cantidad * itemCotizacion.valor) - SUM(itemCotizacion.descuento) as amount_total'))
														->join('cotizacion','facturacion.idCotizacion','=','cotizacion.id')
														->join('itemCotizacion','itemCotizacion.idCotizacion','=','cotizacion.id')
														->join('DatosBasicosPacientes','cotizacion.idPaciente','=','DatosBasicosPacientes.id')
														->groupBy('facturacion.id')
														->where('DatosBasicosPacientes.id', $id)
														->get();

		$hcPreliminar = \DB::table('histPreliminar')->where('idPaciente', $id)->first();

		$lista_respuestas_paciente = $this->modelRespuestas
														->where('idPaciente',$id)->get();

		$data_hcPreliminar = \DB::table('histPreliminar')
													->select('histPreliminar.id','histPreliminar.createdAt','motivoDeConsulta.areasMayorInteres')
													->join('motivoDeConsulta','motivoDeConsulta.id','=','histPreliminar.idMotivoConsulta')
													->where('idPaciente', $id)->get();

		$data_procedimiento = \DB::table('procedimiento')
													->where('idPaciente',$id)->get();

		$this->data['quotes'] = $data_quote;
		$this->data['invoices'] = $data_invoice;

		$this->data['lista_respuestas_paciente'] = $lista_respuestas_paciente;
		$this->data['data_respuestas_paciente'] = $this->modelRespuestas->getColumnTable('respuestaspaciente');
		$this->data['data_hcPreliminar'] = $data_hcPreliminar;
		$this->data['data_procedimiento'] = $data_procedimiento;

		if($dbp){
			$this->data['dbp'] = $dbp;
		}
		if($da){
			$this->data['da'] = $da;
		}else {
			$this->data['da'] = 'null';
		}
		if($estado){
			$this->data['estado'] = $estado;
		}else{
			$this->data['estado'] = 'null';
		}

		$this->data['id'] = $id;
		$this->data['hcPreliminar'] = $hcPreliminar;

		Log::info($this->data);
		//return $this->data;
		return view('paciente.index',$this->data);
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
		return view('paciente.form',$this->data);
	}

	public function getShow( $id = null)
	{

		if($this->access['is_detail'] ==0)
			return Redirect::to('dashboard')
				->with('messagetext', \Lang::get('core.note_restric'))->with('msgstatus','error');


		$this->data['access']		= $this->access;
		return view('paciente.view',$this->data);
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
