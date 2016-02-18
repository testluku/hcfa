<?php namespace App\Http\Controllers;

use App\Http\Controllers\controller;
use App\Models\Cotizacion;
use App\Models\itemCotizacion;
use App\Models\Facturacion;
use App\Models\Compania;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator as Paginator;
use Validator, Input, Redirect ;
use Log;

class CotizacionController extends Controller {

	protected $layout = "layouts.main";
	protected $data = array();
	public $module = 'cotizacion';
	static $per_page	= '10';

	public function __construct()
	{
		parent::__construct();
		$this->model = new Cotizacion();
		$this->modelItem = new itemCotizacion();
		$this->modelInvoice = new Facturacion();
		$this->modelCompania = new Compania();

		$this->info = $this->model->makeInfo( $this->module);
		$this->access = $this->model->validAccess($this->info['id']);

		$this->data = array(
			'pageTitle'			=> 	$this->info['title'],
			'pageNote'			=>  $this->info['note'],
			'pageModule'		=> 'cotizacion',
			'pageUrl'			=>  url('cotizacion'),
			'return' 			=> 	self::returnUrl()
		);



	}

	public function getIndex()
	{
		if($this->access['is_view'] ==0)
			return Redirect::to('dashboard')->with('messagetext',\Lang::get('core.note_restric'))->with('msgstatus','error');

		$this->data['access']		= $this->access;
		return view('cotizacion.index',$this->data);
	}

	public function postData( Request $request)
	{
		$sort = (!is_null($request->input('sort')) ? $request->input('sort') : $this->info['setting']['orderby']);
		$order = (!is_null($request->input('order')) ? $request->input('order') : $this->info['setting']['ordertype']);
		// End Filter sort and order for query
		// Filter Search for query
		$filter = (!is_null($request->input('search')) ? $this->buildSearch() : '');


		$page = $request->input('page', 1);
		$params = array(
			'page'		=> $page ,
			'limit'		=> (!is_null($request->input('rows')) ? filter_var($request->input('rows'),FILTER_VALIDATE_INT) : $this->info['setting']['perpage'] ) ,
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
		$pagination->setPath('cotizacion/data');

		$this->data['param']		= $params;
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
		$this->data['setting'] 		= $this->info['setting'];

		// Master detail link if any
		$this->data['subgrid']	= (isset($this->info['config']['subgrid']) ? $this->info['config']['subgrid'] : array());
		// Render into template
		return view('cotizacion.table',$this->data);

	}


	function getSave(Request $request, $id = null)
	{
		$this->data['title'] = 'Cotizacion';
		$this->data['name_controller']	= 'cotizacion';

		//$row_c = $this->model->find($id);
		$row_ci = \DB::table('itemCotizacion')->where('idCotizacion', $id)->get();
		$row_p = \DB::table('DatosBasicosPacientes')->where('DatosBasicosPacientes.id', $id)->first();
								//	->join('DatosAdicionalesPacientes','DatosBasicosPacientes.id','=','DatosAdicionalesPacientes.idPaciente')


		if($row_p)
		{
			$this->data['row_c'] 		=  $this->model->getColumnTable('cotizacion');
			$this->data['row_p']  	=  $row_p;
			$this->data['row_ci']  	=  $this->model->getColumnTable('itemCotizacion');
		} else {
			return Redirect::to('pacientes');
		}

		$this->data['id'] = $id;

		Log::info($this->data);

		//return $this->data;
		return view('cotizacion.form',$this->data);
	}

	function getUpdate(Request $request, $id = null)
	{

		$row_c = $this->model->find($id);
		$row_ci = \DB::table('itemCotizacion')
													->select('itemCotizacion.id as idItem', 'itemCotizacion.descuento','itemCotizacion.cantidad', 'itemCotizacion.valor', 'Producto_Servicio.id as idProducto','Producto_Servicio.nombre','Producto_Servicio.descripcion','itemCotizacion.idCotizacion')
													->join('Producto_Servicio','Producto_Servicio.id','=','itemCotizacion.idProducto')
													->where('idCotizacion', $id)->get();
		$row_account = \DB::table('itemCotizacion')
													->select(\DB::raw('SUM(itemCotizacion.valor * itemCotizacion.cantidad) as subtotal'), \DB::raw('SUM(itemCotizacion.descuento) as descuento_total'))
													->join('Producto_Servicio','Producto_Servicio.id','=','itemCotizacion.idProducto')
													->where('idCotizacion', $id)->first();
		$row_p = \DB::table('DatosBasicosPacientes')->where('DatosBasicosPacientes.id', $row_c['idPaciente'])->first();

		$row_compania = \DB::table('compania')
											->select('compania.*')
											->join('cotizacion','cotizacion.idCompania','=','compania.id')
											->where('cotizacion.id', $id)
											->first();

		if(!$row_c){
			return Redirect::to('pacientes');
		}else{
			$this->data['row_c']	= $row_c;
			$this->data['row_p']	= $row_p;
			$this->data['row_ci']	=	$row_ci;
			$this->data['row_account']	=	$row_account;
			$this->data['row_compania']= $row_compania;
			$this->data['idCotizacion']= $id;

			//return $this->data;
			return view('cotizacion.formUpdate',$this->data);
		}

	}


	public function postUpdated(Request $request, $id = null){

		$rules = $this->validateForm();

				$data_quote = [
					'observation' => $request->input('observation'),
					'updateAt' => date("Y-m-d")
				];

				$id_cotizacion = $this->model->insertRow($data_quote , $request->input('idCotizacion'));

				foreach ($request->input('item') as $key => $value) {
								$data_item = [
								 'descuento' => $value['descuento'],
								 'cantidad' => $value['quantity'],
								 'valor' => $value['unit'],
								 'idProducto' => $value['idProducto'],
								 'idCotizacion' => $request->input('idCotizacion')
							 ];

							 if(!empty($value['productoservicio'])){
								 	$id_item = $this->modelItem->insertRow($data_item , isset($value['idItem']) ? $value['idItem'] : null );
							 }

				}

		//return $request->all();

		return Redirect::to('cotizacion/details/'.$id_cotizacion);

	}



	public function postSaved(Request $request, $id = null)
	{

		//return $request->all();

		$rules = $this->validateForm();

		$data_quote = [
			'dateStart'				=> date("Y-m-d"),
			'dateExpiration'	=> date("Y-m-d"),
			'estado' 					=> 0,
			'observation' 		=> $request->input('observation'),
			'createdAt'				=> date("Y-m-d"),
			'updateAt'				=> date("Y-m-d"),
			'idPaciente'			=> $request->input('id'),
			'idCompania'			=> $request->input('companias'),
			'idTbUsers' 			=> \Session::get('uid')
		];

		$id_cotizacion = $this->model->insertRow($data_quote , null);

		foreach ($request->input('item') as $key => $value) {
						$data_item = [
						 'descuento' => $value['descuento'],
						 'cantidad' => $value['quantity'],
						 'valor' => $value['unit'],
						 'idProducto' => $value['idProducto'],
						 'idCotizacion' => $id_cotizacion
					 ];

					 if(!empty($value['productoservicio'])){
						  $id_item = $this->modelItem->insertRow($data_item , null);
					 }

			Log::info($value);
		}

		return Redirect::to('cotizacion/details/'.$id_cotizacion);

	}




	public function postAjaxrefresh(){

						$keyword = '%'.$_POST['keyword'].'%';

						$list = \DB::table('producto_servicio')->where('nombre','like',$keyword)->get();

						return $list;

	}

	public function getDetails( $id )
	{
		//TODOS LOS ITEMS INCLUIDOS EN LA COTIZACION
		$items_quote = \DB::table('itemCotizacion')
				->select('Producto_Servicio.nombre', 'itemCotizacion.cantidad as quantity', 'itemCotizacion.valor as unit', 'itemCotizacion.descuento' ,\DB::raw('itemCotizacion.cantidad * itemCotizacion.valor as amount'))
				->join('Producto_Servicio','itemCotizacion.idProducto','=','Producto_Servicio.id')
				->where('itemCotizacion.idCotizacion', $id)
				->get();

		//LOS VALORES TOTALES DE DESCUENTO Y MONTO
		$values = \DB::table('itemCotizacion')
							->select(\DB::raw('SUM(itemCotizacion.cantidad * itemCotizacion.valor) as subtotal'), \DB::raw('SUM(itemCotizacion.descuento) as descuento'), \DB::raw('SUM(itemCotizacion.cantidad * itemCotizacion.valor) - SUM(itemCotizacion.descuento) as total_end'))
							->where('itemCotizacion.idCotizacion', $id)
							->get();
		//DATOS DEL PACIENTE
	  $data_paciente = \DB::table('cotizacion')
							->select('cotizacion.idPaciente as id','cotizacion.id as idCotizacion','cotizacion.observation', 'DatosBasicosPacientes.tipoDocumento','DatosBasicosPacientes.numDoc','DatosBasicosPacientes.nombres','DatosBasicosPacientes.apellido1','DatosBasicosPacientes.apellido2','DatosBasicosPacientes.direccion','DatosBasicosPacientes.telefono','DatosBasicosPacientes.celular1')
							->join('DatosBasicosPacientes','DatosBasicosPacientes.id','=','cotizacion.idPaciente')
							->where('cotizacion.id', $id)
							->first();

		$row_compania = \DB::table('compania')
											->select('compania.*')
											->join('cotizacion','cotizacion.idCompania','=','compania.id')
											->where('compania.id', 1)
											->first();

		$this->data['items'] = $items_quote;
		$this->data['values'] = $values;
		$this->data['data_paciente'] = $data_paciente;
		$this->data['row_compania']= $row_compania;

		Log::info($this->data);

		//return $this->data;
		return view('cotizacion.index',$this->data);
	}

	function postInvoice(Request $request, $id = null)
	{
		
		$idLastest = \DB::table('facturacion')->select(\DB::raw('MAX(codigo) + 1 as idLastest'))->get();

		$data_invoice = [
				'codigo' => $idLastest[0]->idLastest,
				'estado' => '0',
				'createdAt' => date("Y-m-d"),
				'updateAt' => date("Y-m-d"),
				'idDatosLegales' => 1,
				'idCotizacion' => $request->input('id')
		];

		Log::info($this->data);

		$id_invoice = $this->modelInvoice->insertRow($data_invoice , null);

		if($id_invoice){
				$this->model->insertRow(['estado'=>'1'],$request->input('id'));
		}

		return $id_invoice;
		//return view('facturacion.index',$this->data);

	}


	function getRespuesta($id = null)
	{

			$lista_respuestas_paciente = \DB::table('respuestaspaciente')
															->where('id',$id)->first();

			$this->data['lista_respuestas_paciente'] = $lista_respuestas_paciente;

			return $this->data;

	}


	public function getCombocompanias()
	{

		$data_compani = $this->modelCompania->get();
		return $data_compani;

	}

	public function postSelectcompania(Request $request, $id = null)
	{
		$data_compania = $this->modelCompania->where('id', $request->input('id'))->first();
		return $data_compania;
	}


	function postCopy( Request $request)
	{

	    foreach(\DB::select("SHOW COLUMNS FROM Cotizacion ") as $column)
        {
					if( $column->Field != 'idCotizacion')
					$columns[] = $column->Field;
        }
		$toCopy = implode(",",$request->input('ids'));


		$sql = "INSERT INTO Cotizacion (".implode(",", $columns).") ";
		$sql .= " SELECT ".implode(",", $columns)." FROM Cotizacion WHERE idCotizacion IN (".$toCopy.")";
		\DB::insert($sql);
		return response()->json(array(
			'status'=>'success',
			'message'=> \Lang::get('core.note_success')
		));
	}

	function postSave( Request $request, $id =0)
	{

		$rules = $this->validateForm();
		$validator = Validator::make($request->all(), $rules);
		if ($validator->passes()) {
			$data = $this->validatePost('Cotizacion');

			$id = $this->model->insertRow($data , $request->input('idCotizacion'));

			return response()->json(array(
				'status'=>'success',
				'message'=> \Lang::get('core.note_success')
				));

		} else {

			$message = $this->validateListError(  $validator->getMessageBag()->toArray() );
			return response()->json(array(
				'message'	=> $message,
				'status'	=> 'error'
			));
		}

	}

	public function postDelete( Request $request)
	{

		if($this->access['is_remove'] ==0) {
			return response()->json(array(
				'status'=>'error',
				'message'=> \Lang::get('core.note_restric')
			));
			die;

		}
		// delete multipe rows
		if(count($request->input('ids')) >=1)
		{
			$this->model->destroy($request->input('ids'));

			return response()->json(array(
				'status'=>'success',
				'message'=> \Lang::get('core.note_success_delete')
			));
		} else {
			return response()->json(array(
				'status'=>'error',
				'message'=> \Lang::get('core.note_error')
			));

		}

	}

}
