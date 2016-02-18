<?php namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class productoservicio extends Sximo  {
	
	protected $table = 'Producto_Servicio';
	protected $primaryKey = 'idProducto_Servicio';

	public function __construct() {
		parent::__construct();
		
	}

	public static function querySelect(  ){
		
		return "  SELECT Producto_Servicio.* FROM Producto_Servicio  ";
	}	

	public static function queryWhere(  ){
		
		return "  WHERE Producto_Servicio.idProducto_Servicio IS NOT NULL ";
	}
	
	public static function queryGroup(){
		return "  ";
	}
	

}
