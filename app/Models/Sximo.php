<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Log;
class Sximo extends Model {


	public static function getRows( $args )
	{
       $table = with(new static)->table;
	   $key = with(new static)->primaryKey;
	   
	   \DB::connection()->enableQueryLog();
	   
        extract( array_merge( array(
			'page' 		=> '0' ,
			'limit'  	=> '0' ,
			'sort' 		=> '' ,
			'order' 	=> '' ,
			'params' 	=> '' ,
			'global'	=> 1	  
        ), $args ));
		
        //Log::info($args);
        
		$offset = ($page-1) * $limit ;	
		$limitConditional = ($page !=0 && $limit !=0) ? "LIMIT  $offset , $limit" : '';	
		$orderConditional = ($sort !='' && $order !='') ?  " ORDER BY {$sort} {$order} " : '';

		// Update permission global / own access new ver 1.1
		$table = with(new static)->table;
		if($global == 0 )
				$params .= " AND {$table}.entry_by ='".\Session::get('uid')."'"; 	
		// End Update permission global / own access new ver 1.1			
        
		$rows = array();
	    $result = \DB::select( self::querySelect() . self::queryWhere(). " 
				{$params} ". self::queryGroup() ." {$orderConditional}  {$limitConditional} ");
		
		//Log::info($result);
		$where = self::queryWhere();
		
		
		
		$where= str_replace("WHERE"," ",$where);
		
		//Log::info('Where: '.$where);
		if(strlen($where)<3){
			$total=\DB::table($table)->count($key);
		}else{
			$total=\DB::table($table)->whereRaw($where)->count($key);
		}
		
		//$queries = \DB::getQueryLog();
		//Log::info($queries);


		return $results = array('rows'=> $result , 'total' => $total);	

	
	}
	
	public static function getCols( $filter )
	{
		$table = with(new static)->table;
		$key = with(new static)->primaryKey;
		
		$args 	= array(
					'params'	=>''
		);	
		
		\DB::connection()->enableQueryLog();
	
		extract( array_merge( array(
				'page' 		=> '0' ,
				'limit'  	=> '0' ,
				'sort' 		=> '' ,
				'order' 	=> '' ,
				'params' 	=> '' ,
				'global'	=> 1
		), $args ));
	
		//Log::info($args);
	
		$offset = ($page-1) * $limit ;
		$limitConditional = ($page !=0 && $limit !=0) ? "LIMIT  $offset , $limit" : '';
		$orderConditional = ($sort !='' && $order !='') ?  " ORDER BY {$sort} {$order} " : '';
	
		// Update permission global / own access new ver 1.1
		$table = with(new static)->table;
		if($global == 0 )
			$params .= " AND {$table}.entry_by ='".\Session::get('uid')."'";
		// End Update permission global / own access new ver 1.1
	
		$rows = array();
		$result = \DB::select( self::querySelect() . self::queryWhere(). "
		{$params} {$filter} ". self::queryGroup() ." {$orderConditional}  {$limitConditional} ");
	
		//Log::info($result);
		$where = self::queryWhere();
	
		$where= str_replace("WHERE"," ",$where.' '.$filter);
		//Log::info('Where: '.$where);
		$total=\DB::table($table)->whereRaw($where)->count($key);
	
		$queries = \DB::getQueryLog();
		//Log::info($queries);
	
	
		return $results = array('rows'=> $result , 'total' => $total);
	
	
	}

	public static function getRow( $id )
	{
       $table = with(new static)->table;
	   $key = with(new static)->primaryKey;

		$result = \DB::select( 
				self::querySelect() . 
				self::queryWhere().
				" AND ".$table.".".$key." = '{$id}' ". 
				self::queryGroup()
			);	
		if(count($result) <= 0){
			$result = array();		
		} else {

			$result = $result[0];
		}
		return $result;		
	}	
	
	public function cambiarEstadoMes($fecha=null, $codigoGrupo=null)
	{
		//\DB::connection()->enableQueryLog();
		if($codigoGrupo=='CUPS')
		{
			\DB::table('tb_autorizaciones')->where('mes', date("n"))->where('tb_estadoAutorizacion_id',1)->where('codigoGrupo',$codigoGrupo)
			->whereNotIn('codigoServicio', ['8902021' , '100' , '101' , '890202154' , '890302154' , '890202159' , '890302159' , '89020208' , '89030208' , '890202302' , '890302302'])
			->update(['tb_estadoAutorizacion_id' => 2, 'fechaEsperada'=>$fecha]);
			
			\DB::table('tb_autorizaciones')->where('mes', date("n"))->where('tb_estadoAutorizacion_id',1)->where('codigoGrupo',$codigoGrupo)
			->whereIn('codigoServicio', ['8902021' , '100' , '101' , '890202154' , '890302154' , '890202159' , '890302159' , '89020208' , '89030208' , '890202302' , '890302302'])
			->update(['tb_estadoAutorizacion_id' => 3, 'ipsAsignada'=> '800107179', 'fechaAutorizacion'=> date('Y-m-d')]);
		}
		else if($codigoGrupo=='MP')
		{
			\DB::table('tb_autorizaciones')->where('mes', date("n"))->where('tb_estadoAutorizacion_id',1)->where('codigoGrupo',$codigoGrupo)->update(['tb_estadoAutorizacion_id' => 2, 'fechaEsperada'=>$fecha]);
		}
		
		//$query = \DB::getQueryLog();
		//Log::info('carga me');
    	//Log::info($query);
	}
	public function cambiarEstadoEnvio()
	{
		//\DB::connection()->enableQueryLog();
		
			\DB::table('tb_autorizaciones')->where('tb_estadoAutorizacion_id',5)
			->update(['tb_estadoAutorizacion_id' => 15]);
		
	
		//$query = \DB::getQueryLog();
		//Log::info('carga me');
		//Log::info($query);
	}
	
	public function cambiarEstadoPrimAusencia($id)
	{
		\DB::statement('UPDATE tb_autorizaciones SET `fechaAus`=`fechaCita`, `obsAus`= `obsCita`, `fechaCita`=NULL, `obsCita`=NULL WHERE id='.$id);
	}
	public function cargarMesAnterior()
	{
		$sql="INSERT INTO `tb_autorizaciones`(`tb_pacientes_id`, `numSol`, `fechaSolicitudIPS`, `fechaSolicitudOM`, `nitIPS`, `origenAtencion`, 
				`ubicacionPaciente`, `prioridadAtencion`, `tipoServicio`, `areaServicio`, `codigoServicio`, `codigoGrupo`, `cantidad`, 
				`justificacionClinica`, `dxCIE`, `mes`, `estadoPaciente`, `nombreServicio`, tb_estadoAutorizacion_id)
				SELECT `tb_pacientes_id`, `numSol`, NOW() as `fechaSolicitudIPS`, NOW() as `fechaSolicitudOM`, `nitIPS`, `origenAtencion`, 
				`ubicacionPaciente`, `prioridadAtencion`, `tipoServicio`, `areaServicio`, `codigoServicio`, `codigoGrupo`, `cantidad`, 
				`justificacionClinica`, `dxCIE`, MONTH(NOW()) as `mes`, 1 as `estadoPaciente`, `nombreServicio`, 1 FROM `tb_autorizaciones` 
				WHERE estadoPaciente=1 and MONTH(fechaSolicitudIPS)=MONTH(NOW())-1 and codigoGrupo='MP'";
		try{
			\DB::statement($sql);
		}
		catch(Exception $e){
            
            return \Response::json(array('status'=>'error','message'=> $e));
        }

        return \Response::json(array('status'=>'success','message'=>''));
		
	}
	public  function insertRow( $data , $id)
	{
       $table = with(new static)->table;
	   $key = with(new static)->primaryKey;
	    if($id == NULL )
        {
			
            // Insert Here 
			if(isset($data['createdOn'])) $data['createdOn'] = date("Y-m-d H:i:s");	
			if(isset($data['updatedOn'])) $data['updatedOn'] = date("Y-m-d H:i:s");	
			 $id = \DB::table( $table)->insertGetId($data);				
            
        } else {
            // Update here 
			// update created field if any
			if(isset($data['createdOn'])) unset($data['createdOn']);	
			if(isset($data['updatedOn'])) $data['updatedOn'] = date("Y-m-d H:i:s");			
			 \DB::table($table)->where($key,$id)->update($data);    
        }    
        return $id;    
	}
	public  function insertRowTable( $data , $id, $table, $key)
	{
		if($id == NULL )
		{
				
			// Insert Here
			if(isset($data['createdOn'])) $data['createdOn'] = date("Y-m-d H:i:s");
			if(isset($data['updatedOn'])) $data['updatedOn'] = date("Y-m-d H:i:s");
			$id = \DB::table( $table)->insertGetId($data);
	
		} else {
			// Update here
			// update created field if any
			if(isset($data['createdOn'])) unset($data['createdOn']);
			if(isset($data['updatedOn'])) $data['updatedOn'] = date("Y-m-d H:i:s");
			\DB::table($table)->where($key,$id)->update($data);
		}
		return $id;
	}

	static function makeInfo( $id )
	{	
		//\DB::connection()->enableQueryLog();
		
		$row =  \DB::table('tb_module')->where('module_name', $id)->get();
		
		//$queries = \DB::getQueryLog();
		/*
		 * 
		 
		Log::info("---------makeinfo-----------");
		Log::info($queries);
		Log::info("---------makeinfo-----------");
		*/
		
		$data = array();
		foreach($row as $r)
		{
			$langs = (json_decode($r->module_lang,true));
			
			$data['id']		= $r->module_id; 
			$data['title'] 	= \SiteHelpers::infoLang($r->module_title,$langs,'title'); 
			$data['note'] 	= \SiteHelpers::infoLang($r->module_note,$langs,'note'); 
			$data['table'] 	= $r->module_db; 
			$data['key'] 	= $r->module_db_key;
			$data['config'] = \SiteHelpers::CF_decode_json($r->module_config);
			if($data['table']!='tb_notification')
				//Log::info($data['config']);
			$field = array();	
			foreach($data['config']['grid'] as $fs)
			{
				foreach($fs as $f)
					$field[] = $fs['field']; 	
									
			}
			$data['field'] = $field;	
			$data['setting'] = array(
				'gridtype'		=> (isset($data['config']['setting']['gridtype']) ? $data['config']['setting']['gridtype'] : 'native'  ),
				'orderby'		=> (isset($data['config']['setting']['orderby']) ? $data['config']['setting']['orderby'] : $r->module_db_key),
				'ordertype'		=> (isset($data['config']['setting']['ordertype']) ? $data['config']['setting']['ordertype'] : 'asc'  ),
				'perpage'		=> (isset($data['config']['setting']['perpage']) ? $data['config']['setting']['perpage'] : '10'  ),
				'frozen'		=> (isset($data['config']['setting']['frozen']) ? $data['config']['setting']['frozen'] : 'false'  ),
	            'form-method'   => (isset($data['config']['setting']['form-method'])  ? $data['config']['setting']['form-method'] : 'native'  ),
	            'view-method'   => (isset($data['config']['setting']['view-method'])  ? $data['config']['setting']['view-method'] : 'native'  ),
	            'inline'        => (isset($data['config']['setting']['inline'])  ? $data['config']['setting']['inline'] : 'false'  ),				
				
			);			
					
		}
		//Log::info($data);
		return $data;
			
	
	} 

    static function getComboselect( $params , $limit =null, $parent = null)
    {   
        $limit = explode(':',$limit);
        $parent = explode(':',$parent);

        if(count($limit) >=3)
        {
            $table = $params[0]; 
            $condition = $limit[0]." `".$limit[1]."` ".$limit[2]." ".$limit[3]." "; 
            if(count($parent)>=2 )
            {
            	$row =  \DB::table($table)->where($parent[0],$parent[1])->get();
            	 $row =  \DB::select( "SELECT * FROM ".$table." ".$condition ." AND ".$parent[0]." = '".$parent[1]."'");
            } else  {
	           $row =  \DB::select( "SELECT * FROM ".$table." ".$condition);
            }        
        }else{

            $table = $params[0]; 
            if(count($parent)>=2 )
            {
            	$row =  \DB::table($table)->where($parent[0],$parent[1])->get();
            } else  {
	            $row =  \DB::table($table)->get();
            }	           
        }

        return $row;
    }
    
    static function getPacaut( $term = null, $tipo=null)
    {
    	//Log::info('Tipo: '.$tipo);
    	//Log::info('Term: '.$term);
    	//\DB::connection()->enableQueryLog();
    	if($tipo=='doc')
    	{
    		$row =  \DB::table('tb_pacientes')
    			->join('tb_autorizaciones', 'tb_pacientes.id', '=', 'tb_autorizaciones.tb_pacientes_id')
    			->select('tipoDoc', 'numDoc', 'nombres', 'apellidos',
    					'fechaSolicitudIPS', 'fechaSolicitudOM', 'estadoPaciente',
    					'nombreServicio', 'fechaEsperada', 'FechaReal', 
    					'numAutorizacion', 'ipsAsignada', 'fechaAutorizacion', 'fechaVencimiento',
    					'tb_estadoAutorizacion_id', 'fechaCita', 'nroFactura')
    			->where('tb_pacientes.numDoc', '=', $term)
    			->orderBy('tb_autorizaciones.id', 'desc')
    			->get();
    	}
    	else{
    		$row =  \DB::table('tb_pacientes')
    		->join('tb_autorizaciones', 'tb_pacientes.id', '=', 'tb_autorizaciones.tb_pacientes_id')
    		->select('tipoDoc', 'numDoc', 'nombres', 'apellidos',
    				'fechaSolicitudIPS', 'fechaSolicitudOM', 'estadoPaciente',
    				'nombreServicio', 'fechaEsperada', 'FechaReal',
    				'numAutorizacion', 'ipsAsignada', 'fechaAutorizacion', 'fechaVencimiento',
    				'tb_estadoAutorizacion_id', 'fechaCita', 'nroFactura')
    				->where('tb_autorizaciones.id', '=', $term)
    				->orderBy('tb_autorizaciones.id', 'desc')
    				->get();
    	}
    	//$query = \DB::getQueryLog();
    	//Log::info($query);
    	return $row;
    }
    
    static function getDocpaciente( $term = null)
    {
    	$row =  \DB::table('tb_pacientes')->where('numDoc', $term)->get();
    	return $row;
    }
    
    static function getPacientes( $term = null)
    {
    	$row =  \DB::table('tb_pacientes')->where('numDoc', 'LIKE', '%'.$term.'%')->get();
    	return $row;
    }
    static function getAutorizacion( $term = null)
    {
    	$row =  \DB::table('tb_autorizaciones')->where('numAutorizacion', '=', $term)->get();
    	return $row;
    }
    
    static function getDiagnostico( $term = null)
    {
    	$row =  \DB::table('dxcie10')->where('IdDx', 'LIKE', '%'.$term.'%')->get();
    	return $row;
    }
    
    static function getMedicamentos( $term = null)
    {
    	$row =  \DB::table('medicamentos')->where('nombre', 'LIKE', '%'.$term.'%')->get();
    	return $row;
    }
    
    static function getDiagnosticop( $term = null, $idp=null)
    {
    	$row =  \DB::table('dxcie10')->where('IdDx', 'LIKE', '%'.$term.'%')->where('tb_pacientes_id',$idp)->get();
    	return $row;
    }
    
    static function getCodserv( $term = null)
    {
    	$row =  \DB::table('codServ')->where('idServ', 'LIKE', '%'.$term.'%')->orderBy('idServ', 'asc')->take(5)->get();
    	return $row;
    }
    
    static function getTareas( $term = null)
    {
    	$row =  \DB::table('tasks')->where('userid', '=', \Session::get('uid'))->get();
    	return $row;
    }
    
    static function getIddeletetask( $term = null)
    {
    	\DB::table('tasks')->where('id', '=', $term)->delete();
    	
    }

	public static function getColoumnInfo( $result )
	{
		$pdo = \DB::getPdo();
		$res = $pdo->query($result);
		$i =0;	$coll=array();	
		while ($i < $res->columnCount()) 
		{
			$info = $res->getColumnMeta($i);			
			$coll[] = $info;
			$i++;
		}
		return $coll;	
	
	}	


	function validAccess( $id)
	{

		$row = \DB::table('tb_groups_access')->where('module_id','=', $id)
				->where('group_id','=', \Session::get('gid'))
				->get();
		
		if(count($row) >= 1)
		{
			$row = $row[0];
			if($row->access_data !='')
			{
				$data = json_decode($row->access_data,true);
			} else {
				$data = array();
			}	
			return $data;		
			
		} else {
			return false;
		}			
	
	}	

	static function getColumnTable( $table )
	{	  
        $columns = array();
	    foreach(\DB::select("SHOW COLUMNS FROM $table") as $column)
        {
           //print_r($column);
		    $columns[$column->Field] = '';
        }
	  

        return $columns;
	}	

	static function getTableList( $db ) 
	{
	 	$t = array(); 
		$dbname = 'Tables_in_'.$db ; 
		foreach(\DB::select("SHOW TABLES FROM {$db}") as $table)
        {
		    $t[$table->$dbname] = $table->$dbname;
        }	
		return $t;
	}	
	
	static function getTableField( $table ) 
	{
        $columns = array();
	    foreach(\DB::select("SHOW COLUMNS FROM $table") as $column)
		    $columns[$column->Field] = $column->Field;
        return $columns;
	}	

}
