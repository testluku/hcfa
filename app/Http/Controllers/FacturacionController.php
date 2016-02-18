<?php namespace App\Http\Controllers;

use App\Http\Controllers\controller;
use App\Models\Facturacion;
use App\Models\Cotizacion;
use App\Models\Compania;
use App\Models\itemCotizacion;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator as Paginator;
use Validator, Input, Redirect, Log ;

class FacturacionController extends Controller {

	protected $layout = "layouts.main";
	protected $data = array();
	public $module = 'facturacion';
	static $per_page	= '10';

	public function __construct()
	{
		parent::__construct();
		$this->model = new Facturacion();
		$this->modelCotizacion = new Cotizacion();
		$this->modelItem = new itemCotizacion();
		$this->modelCompania = new Compania();

		$this->info = $this->model->makeInfo( $this->module);
		$this->access = $this->model->validAccess($this->info['id']);

		$this->data = array(
			'pageTitle'			=> 	$this->info['title'],
			'pageNote'			=>  $this->info['note'],
			'pageModule'		=> 'facturacion',
			'pageUrl'			=>  url('facturacion'),
			'return' 			=> 	self::returnUrl()
		);
	}

	public function getIndex($id = null)
	{
		$invoice = \DB::table('facturacion')
							->where('id', $id)
							->first();

		$this->data['invoice'] = $invoice;
		Log::info($this->data);
		//return $this->data;
		return view('facturacion.index',$this->data);
	}

		function getUpdate(Request $request, $id = null)
		{

			//$row_c = $this->modelCotizacion->find($id);

			$row_c = \DB::table('cotizacion')->join('facturacion','facturacion.idCotizacion','=','cotizacion.id')->where('facturacion.id', $id)->first();

			$row_ci = \DB::table('itemCotizacion')
									->select('itemCotizacion.id as idItem', 'Producto_Servicio.nombre', 'itemCotizacion.cantidad as cantidad', 'itemCotizacion.valor as valor','itemCotizacion.descuento', 'Producto_Servicio.id as idProducto', \DB::raw('itemCotizacion.cantidad * itemCotizacion.valor as amount'), 'itemCotizacion.idCotizacion')
									->join('cotizacion','cotizacion.id','=','itemCotizacion.idCotizacion')
									->join('facturacion','facturacion.idCotizacion','=','cotizacion.id')
									->join('Producto_Servicio','itemCotizacion.idProducto','=','Producto_Servicio.id')
									->where('facturacion.id', $id)
									->get();

			$row_account = \DB::table('itemCotizacion')
								->select(\DB::raw('SUM(itemCotizacion.cantidad * itemCotizacion.valor) as subtotal'), \DB::raw('SUM(itemCotizacion.descuento) as descuento_total'))
								->join('cotizacion','cotizacion.id','=','itemCotizacion.idCotizacion')
								->join('facturacion','facturacion.idCotizacion','=','cotizacion.id')
								->where('facturacion.id', $id)
								->first();

			$row_p = \DB::table('cotizacion')
								->select('cotizacion.idPaciente as id','cotizacion.id as idCotizacion','cotizacion.observation','DatosBasicosPacientes.id as idPaciente','DatosBasicosPacientes.tipoDocumento','DatosBasicosPacientes.numDoc','DatosBasicosPacientes.nombres','DatosBasicosPacientes.apellido1','DatosBasicosPacientes.apellido2','DatosBasicosPacientes.direccion','DatosBasicosPacientes.telefono','DatosBasicosPacientes.celular1')
								->join('facturacion','facturacion.idCotizacion','=','cotizacion.id')
								->join('DatosBasicosPacientes','DatosBasicosPacientes.id','=','cotizacion.idPaciente')
								->where('facturacion.id', $id)
								->first();

			$row_compania = \DB::table('compania')
												->select('compania.*','datosLegalesFactura.*')
												->join('cotizacion','cotizacion.idCompania','=','compania.id')
												->join('datosLegalesFactura','compania.idDatosLegales','=','datosLegalesFactura.id')
												->where('cotizacion.id', $row_p->idCotizacion)
												->first();

			$row_data_factura = \DB::table('facturacion')
													->select('facturacion.codigo')
													->where('facturacion.id', $id)
													->first();

			if(!$row_c){
				return Redirect::to('pacientes');
			}else{
				$this->data['row_c']	= $row_c;
				$this->data['row_p']	= $row_p;
				$this->data['row_ci']	=	$row_ci;
				$this->data['row_ci_count']	=	count($row_ci) - 1;
				$this->data['row_account']	=	$row_account;
				$this->data['id_factura'] = $id;
				$this->data['row_compania'] = $row_compania;
				$this->data['row_data_factura'] = $row_data_factura;

				Log::info($this->data);
				//return $this->data;
				return view('facturacion.form',$this->data);
			}

		}

		public function postAjaxrefresh(){

							$keyword = '%'.$_POST['keyword'].'%';

							$list = \DB::table('producto_servicio')->where('nombre','like',$keyword)->get();

							return $list;

		}


		public function getDetails( $id = null)
		{

			//LOS ITEMS INCLUIDOS EN LA COTIZACION QUE YA ESTAN FACTURADOS...
			$items_quote = \DB::table('itemCotizacion')
					->select('Producto_Servicio.nombre', 'itemCotizacion.cantidad as quantity', 'itemCotizacion.valor as unit','itemCotizacion.descuento', \DB::raw('itemCotizacion.cantidad * itemCotizacion.valor as amount'))
					->join('cotizacion','cotizacion.id','=','itemCotizacion.idCotizacion')
					->join('facturacion','facturacion.idCotizacion','=','cotizacion.id')
					->join('Producto_Servicio','itemCotizacion.idProducto','=','Producto_Servicio.id')
					->where('facturacion.id', $id)
					->get();

			//LOS VALORES TOTALES DE DESCUENTO Y MONTO
			$values = \DB::table('itemCotizacion')
								->select(\DB::raw('SUM(itemCotizacion.cantidad * itemCotizacion.valor) as subtotal'), \DB::raw('SUM(itemCotizacion.descuento) as descuento'), \DB::raw('SUM(itemCotizacion.cantidad * itemCotizacion.valor) - SUM(itemCotizacion.descuento) as total_end'))
								->join('cotizacion','cotizacion.id','=','itemCotizacion.idCotizacion')
								->join('facturacion','facturacion.idCotizacion','=','cotizacion.id')
								->where('facturacion.id', $id)
								->first();

			//DATOS DEL PACIENTE
		  $data_paciente = \DB::table('cotizacion')
								->select('cotizacion.idPaciente as id', 'cotizacion.id as idCotizacion' ,'cotizacion.observation', 'DatosBasicosPacientes.tipoDocumento','DatosBasicosPacientes.numDoc','DatosBasicosPacientes.nombres','DatosBasicosPacientes.apellido1','DatosBasicosPacientes.apellido2','DatosBasicosPacientes.direccion','DatosBasicosPacientes.telefono','DatosBasicosPacientes.celular1')
								->join('facturacion','facturacion.idCotizacion','=','cotizacion.id')
								->join('DatosBasicosPacientes','DatosBasicosPacientes.id','=','cotizacion.idPaciente')
								->where('facturacion.id', $id)
								->first();

			$row_compania = \DB::table('compania')
 												->select('compania.*','datosLegalesFactura.*')
 												->join('cotizacion','cotizacion.idCompania','=','compania.id')
												->join('datosLegalesFactura','compania.idDatosLegales','=','datosLegalesFactura.id')
 												->where('cotizacion.id', $data_paciente->idCotizacion)
 												->first();

			$row_data_factura = \DB::table('facturacion')
													->select('facturacion.codigo')
													->where('facturacion.id', $id)
													->first();

			$this->data['items_quote']	= $items_quote;
			$this->data['values']				= $values;
			$this->data['data_paciente']= $data_paciente;
			$this->data['row_compania']= $row_compania;
			$this->data['row_data_factura']= $row_data_factura;

			//return $this->data;
			return view('facturacion.index',$this->data);
		}

		public function postUpdated(Request $request, $id = null){


			//	return $request->all();

			$rules = $this->validateForm();

					$data_quote = [
						'observation' => $request->input('observation'),
						'updateAt' => date("Y-m-d")
					];

					$id_cotizacion = $this->modelCotizacion->insertRow($data_quote , $request->input('idCotizacion'));

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


			return Redirect::to('facturacion/details/'.$request->input('id_factura'));

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
		$pagination->setPath('facturacion/data');

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
		return view('facturacion.table',$this->data);

	}




	public function getShow( $id = null)
	{

		if($this->access['is_detail'] ==0)
			return Redirect::to('dashboard')
				->with('messagetext', \Lang::get('core.note_restric'))->with('msgstatus','error');

		$row = $this->model->getRow($id);
		if($row)
		{
			$this->data['row'] =  $row;
		} else {
			$this->data['row'] = $this->model->getColumnTable('Facturacion');
		}

		$this->data['id'] = $id;
		$this->data['access']		= $this->access;
		$this->data['setting'] 		= $this->info['setting'];
		$this->data['fields'] 		= \AjaxHelpers::fieldLang($this->info['config']['forms']);
		return view('facturacion.view',$this->data);
	}


	function postCopy( Request $request)
	{

	    foreach(\DB::select("SHOW COLUMNS FROM Facturacion ") as $column)
        {
			if( $column->Field != 'idFacturacion')
				$columns[] = $column->Field;
        }
		$toCopy = implode(",",$request->input('ids'));


		$sql = "INSERT INTO Facturacion (".implode(",", $columns).") ";
		$sql .= " SELECT ".implode(",", $columns)." FROM Facturacion WHERE idFacturacion IN (".$toCopy.")";
		\DB::insert($sql);
		return response()->json(array(
			'status'=>'success',
			'message'=> \Lang::get('core.note_success')
		));
	}

	function getSave(Request $request, $id = null)
	{

		$this->data['title'] 						= 'Factura';
		$this->data['name_controller']	= 'facturacion';

		//$row_c = $this->model->find($id);
		//$row_ci = \DB::table('itemCotizacion')->where('idCotizacion', $id)->get();
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
		$this->data['id_factura'] = '0';

		Log::info($this->data);

		//return $this->data;
		return view('cotizacion.form',$this->data);
	}

	function postSaved( Request $request, $id =0)
	{
		//return $request->all();
		$rules = $this->validateForm();

		$data_quote = [
			'dateStart' => date("Y-m-d"),
			'dateExpiration' => date("Y-m-d"),
			'observation' => $request->input('observation'),
			'createdAt' => date("Y-m-d"),
			'updateAt' => date("Y-m-d"),
			'idPaciente' => $request->input('id'),
			'idCompania'	=> $request->input('companias'),
			'idTbUsers' => \Session::get('uid')
		];

		$id_cotizacion = $this->modelCotizacion->insertRow($data_quote , null);

		foreach ($request->input('item') as $key => $value) {
						$data_item = [
						 'descuento' => $value['descuento'],
						 'cantidad' => $value['quantity'],
						 'valor' => $value['unit'],
						 'idProducto' => $value['idProducto'],
						 'idCotizacion' => $id_cotizacion
					 ];
					 $id_item = $this->modelItem->insertRow($data_item , null);

			Log::info($value);
		}

		$idLastest = \DB::table('facturacion')->select(\DB::raw('MAX(codigo) + 1 as idLastest'))->get();

		$data_invoice = [
				'codigo' => $idLastest[0]->idLastest,
				'estado' => '0',
				'createdAt' => date("Y-m-d"),
				'updateAt' => date("Y-m-d"),
				'idDatosLegales' => 1,
				'idCotizacion' => $id_cotizacion
		];

		$id_invoice = $this->model->insertRow($data_invoice , null);

		if($id_invoice){
				$this->modelCotizacion->insertRow(['estado'=>'1'],$id_cotizacion);
		}

		Log::info($this->data);

		//return $request->all();

		return Redirect::to('facturacion/details/'.$id_invoice);
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
