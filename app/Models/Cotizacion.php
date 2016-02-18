<?php namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class cotizacion extends Sximo  {

	protected $table = 'cotizacion';
	protected $primaryKey = 'id';

	public function __construct() {
		parent::__construct();

	}

	public static function querySelect(  ){

		return "  SELECT cotizacion.* FROM cotizacion  ";
	}

	public static function queryWhere(  ){

		return "  WHERE cotizacion.id IS NOT NULL ";
	}

	public static function queryGroup(){
		return "  ";
	}


}
