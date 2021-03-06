<?php namespace App\Http\Controllers;

use App\Http\Controllers\controller;
use App\Models\Paciente;
use App\Models\RespuestasPaciente;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator as Paginator;
use Validator, Input, Redirect ;
use Log;

class RespuestasPacienteController extends Controller {

	protected $layout = "layouts.main";
	protected $data = array();
	public $module = 'paciente';
	static $per_page	= '10';

	public function __construct()
	{
		parent::__construct();

		$this->model = new RespuestasPaciente();

		$this->info = $this->model->makeInfo( $this->module);
		$this->access = $this->model->validAccess($this->info['id']);

		$this->data = array(
			'pageTitle'			=> 	$this->info['title'],
			'pageNote'			=>  $this->info['note'],
			'pageModule'		=> 'paciente',
			'pageUrl'			=>  url('paciente'),
			'return' 			=> 	self::returnUrl()
		);



	}

	public function getIndex()
	{
		if($this->access['is_view'] ==0)
			return Redirect::to('dashboard')->with('messagetext',\Lang::get('core.note_restric'))->with('msgstatus','error');

		$this->data['access']		= $this->access;

    $this->data['data'] = $this->model->where('compania.estado', '1')->get();

		$this->data['title'] = 'Compa&ntilde;&iacute;as';

    //return $this->data;

		return view('compania.index',$this->data);
	}


	function getUpdate(Request $request, $id = null)
	{

			if($id == null){
				 	$this->data['row'] = $this->model->getColumnTable('compania');
					$this->data['row_datos_legales'] = $this->modelDatos->getColumnTable('datosLegalesFactura');
					$this->data['title'] = 'Nueva Compa&ntilde;&iacute;a';
			}else {
				$row = $this->model->find($id);
				$row_datos_legales = $this->modelDatos->find($row->idDatosLegales);

				if($row)
				{
					$this->data['row'] =  $row;
					$this->data['row_datos_legales'] = $row_datos_legales;
					$this->data['title'] = 'Actualizar Compa&ntilde;&iacute;a';
				} else {
					return Redirect::to('compania');
				}

				$this->data['id_compania'] = $id;

			}

			//return $this->data;
			return view('compania.form',$this->data);

		}


		public function postSaved(Request $request, $id = null)
		{

			//return $request->all();

			$rules = $this->validateForm();

			$data_respuesta_paciente = [
        'idPaciente'        => $request->input('idPaciente'),
        'mejora'            => $request->input('mejora'),
        'areasMolestan'     => $request->input('areasMolestan'),
        'mejoraOtraZona'    => $request->input('mejoraOtraZona'),
        'cirugiasPrevias'   => $request->input('cirugiasPrevias'),
        'cirugiasNoesteticas' => $request->input('cirugiasNoesteticas'),
        'hospCorazon'       => $request->input('hospCorazon'),
        'cualHospCorazon'   => $request->input('cualHospCorazon'),
        'hospPulmon'        => $request->input('hospPulmon'),
        'cualHospPulmones'  => $request->input('cualHospPulmones'),
        'presionAlta'       => $request->input('presionAlta'),
        'trastornoCardiaco' => $request->input('trastornoCardiaco'),
        'asma'              => $request->input('asma'),
        'tosCronica'        => $request->input('tosCronica'),
        'gripa'             => $request->input('gripa'),
        'dolorPechoEscala'  => $request->input('dolorPechoEscala'),
        'dolorPechoTerreno' => $request->input('dolorPechoTerreno'),
        'diabetes'          => $request->input('diabetes'),
        'tiroide'           => $request->input('tiroide'),
        'viveBogota'        => $request->input('viveBogota'),
        'diasViveBogota'    => $request->input('diasViveBogota'),
        'tipoHepatitisA'     => $request->input('tipoHepatitisA'),
        'tipoHepatitisB'     => $request->input('tipoHepatitisB'),
        'tipoHepatitisC'     => $request->input('tipoHepatitisC'),
        'tipoHepatitisN'     => $request->input('tipoHepatitisN'),
        'reflujo'           => $request->input('reflujo'),
        'estrenimiento'     => $request->input('estrenimiento'),
        'sangraLavarDiente' => $request->input('sangraLavarDiente'),
        'trombos'           => $request->input('trombos'),
        'rinones'           => $request->input('rinones'),
        'alergiaLatex'      => $request->input('alergiaLatex'),
        'cualAlergiaLatex'  => $request->input('cualAlergiaLatex'),
        'extremidad'        => $request->input('extremidad'),
        'dolorEspalda'      => $request->input('dolorEspalda'),
        'otraEnfermedad'    => $request->input('otraEnfermedad'),
        'cualOtraEnfermedad'=> $request->input('cualOtraEnfermedad'),
        'familiarDiabetes'  => $request->input('familiarDiabetes'),
        'trombofilia'       => $request->input('trombofilia'),
        'cancerSeno'        => $request->input('cancerSeno'),
        'cualFamiliarCancerSeno'=> $request->input('cualFamiliarCancerSeno'),
        'medicamentoReciente'=> $request->input('medicamentoReciente'),
        'cualMedicamentoReciente' => $request->input('cualMedicamentoReciente'),
        'pastillasAjoCebolla'=> $request->input('pastillasAjoCebolla'),
        'multivitaminicos'  => $request->input('multivitaminicos'),
        'omega'             => $request->input('omega'),
        'gingoBiloba'       => $request->input('gingoBiloba'),
        'vitaminaE'         => $request->input('vitaminaE'),
        'aslkazekltser'     => $request->input('aslkazekltser'),
        'aspirina'          => $request->input('aspirina'),
        'medicamentoHomeopatico'=> $request->input('medicamentoHomeopatico'),
        'cualMedicamentoHomeopatico'=> $request->input('cualMedicamentoHomeopatico'),
        'grupoSanguineo'    => $request->input('grupoSanguineo'),
        'transfusiones'     => $request->input('transfusiones'),
        'botox'             => $request->input('botox'),
        'bebeAlcohol'       => $request->input('bebeAlcohol'),
        'fuma'              => $request->input('fuma'),
        'fumo'              => $request->input('fumo'),
        'drogasPsicoactivas'=> $request->input('drogasPsicoactivas'),
        'cualdrogasPsicoactivas' => $request->input('cualdrogasPsicoactivas'),
        'embarazo'          => $request->input('embarazo'),
        'cuantosEmbarazos'  => $request->input('cuantosEmbarazos  '),
        'embarazoGemelar'   => $request->input('embarazoGemelar'),
        'perdidasEspontaneas'=> $request->input('perdidasEspontaneas'),
        'cuantasPerdidasEspontaneas' => $request->input('cuantasPerdidasEspontaneas'),
        'cuandoUltimoEmbarazo'=> $request->input('cuandoUltimoEmbarazo'),
        'creerEstarEmbarazada'=> $request->input('creerEstarEmbarazada'),
        'cuandoUltimaMestruacion'=> $request->input('cuandoUltimaMestruacion'),
        'usaLentesContacto' => $request->input('usaLentesContacto'),
        'dientesArtificiales'=> $request->input('dientesArtificiales'),
        'dientesFlojo'      => $request->input('dientesFlojo'),
        'complicaionAnestesia'=> $request->input('complicaionAnestesia'),
        'cualComplicaionAnestesia'=> $request->input('cualComplicaionAnestesia')

			];

			$id_compania = $this->model->insertRow($data_respuesta_paciente , (!$request->input('idRespuesta')) ? null : $request->input('idRespuesta'));

			return Redirect::to('paciente/'.$request->input('idPaciente'));;

		}

		public function getDetails( $id )
		{

			$row_compania = $this->model->find($id);
			$row_datos_legales = $this->modelDatos->where('id', $row_compania->idDatosLegales)->first();

			Log::info($this->data);

			$this->data['row_compania'] = $row_compania;
			$this->data['row_datos_legales'] = $row_datos_legales;
			$this->data['title'] = 'Compa&ntilde;&iacute;a '.$row_compania->nombre;

			//return $this->data;
			return view('compania.view',$this->data);
		}


		public function postDelete(Request $request)
		{
			if($request->input('id')==null)
			{
				return Redirect::to('compania');
			}
			else
			{
				$id_compania = $this->model->insertRow(['estado' => 0],$request->input('id'));
				return $id_compania;
			}
		}


  public function getShow($id = null)
  {
        $this->data['data'] = $this->model->find($id);

        return $this->data;
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

		$row_compania = \DB::table('compania')
											->select('compania.*','tipoDocumento.tipoDoc as tipoDoc')
											->join('cotizacion','cotizacion.idCompania','=','compania.id')
											->join('tipoDocumento','tipoDocumento.id','=','compania.tipoIdentificacion')
											->where('compania.id', 1)
											->first();


		if($row_p)
		{
			$this->data['row_c'] 		=  $this->model->getColumnTable('cotizacion');
			$this->data['row_p']  	=  $row_p;
			$this->data['row_ci']  	=  $this->model->getColumnTable('itemCotizacion');
			$this->data['row_compania'] = $row_compania;
		} else {
			return Redirect::to('pacientes');
		}

		$this->data['id'] = $id;

		Log::info($this->data);

		//return $this->data;
		return view('cotizacion.form',$this->data);
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
								 	//$id_item = $this->modelItem->insertRow($data_item , isset($value['idItem']) ? $value['idItem'] : null );
							 }

				}

		//return $request->all();

		return Redirect::to('cotizacion/details/'.$id_cotizacion);

	}


	public function postAjaxrefresh(){

						$keyword = '%'.$_POST['keyword'].'%';

						$list = \DB::table('producto_servicio')->where('nombre','like',$keyword)->get();

						return $list;

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

		//$id_invoice = $this->modelInvoice->insertRow($data_invoice , null);

		if($id_invoice){
				$this->model->insertRow(['estado'=>'1'],$request->input('id'));
		}

		return $id_invoice;
		//return view('facturacion.index',$this->data);

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

}
