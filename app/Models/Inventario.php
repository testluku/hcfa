<?php namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class inventario extends Sximo  {
	
	protected $table = 'Inventario';
	protected $primaryKey = 'idInventario';

	public function __construct() {
		parent::__construct();
		
	}

	public static function querySelect(  ){
		
		return "  SELECT Inventario.* FROM Inventario  ";
	}	

	public static function queryWhere(  ){
		
		return "  WHERE Inventario.idInventario IS NOT NULL ";
	}
	
	public static function queryGroup(){
		return "  ";
	}
	

}
