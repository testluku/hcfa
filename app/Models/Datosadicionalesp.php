<?php namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class datosadicionalesp extends Sximo  {
	
	protected $table = 'DatosAdicionalesPacientes';
	protected $primaryKey = 'id';

	public function __construct() {
		parent::__construct();
		
	}

	public static function querySelect(  ){
		
		return "  SELECT DatosAdicionalesPacientes.* FROM DatosAdicionalesPacientes  ";
	}	

	public static function queryWhere(  ){
		
		return "  WHERE DatosAdicionalesPacientes.id IS NOT NULL ";
	}
	
	public static function queryGroup(){
		return "  ";
	}
	

}
