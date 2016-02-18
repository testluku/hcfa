<?php namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class datosLegalesFactura extends Sximo  {

	protected $table = 'datosLegalesFactura';
	protected $primaryKey = 'id';

	public function __construct() {
		parent::__construct();

	}

	public static function querySelect(  ){

		return "  SELECT datosLegalesFactura.* FROM datosLegalesFactura  ";
	}

	public static function queryWhere(  ){

		return "  WHERE datosLegalesFactura.id IS NOT NULL ";
	}

	public static function queryGroup(){
		return "  ";
	}


}
