<?php namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class facturacion extends Sximo  {

	protected $table = 'facturacion';
	protected $primaryKey = 'id';

	public function __construct() {
		parent::__construct();

	}

	public static function querySelect(  ){

		return "  SELECT facturacion.* FROM facturacion  ";
	}

	public static function queryWhere(  ){

		return "  WHERE facturacion.id IS NOT NULL ";
	}

	public static function queryGroup(){
		return "  ";
	}


}
