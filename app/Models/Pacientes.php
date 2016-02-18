<?php namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class pacientes extends Sximo  {
	
	protected $table = 'DatosBasicosPacientes';
	protected $primaryKey = 'id';

	public function __construct() {
		parent::__construct();
		
	}

	public static function querySelect(  ){
		
		return "  SELECT DatosBasicosPacientes.* FROM DatosBasicosPacientes  ";
	}	

	public static function queryWhere(  ){
		
		return "  WHERE DatosBasicosPacientes.id IS NOT NULL ";
	}
	
	public static function queryGroup(){
		return "  ";
	}
	

}
