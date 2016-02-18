<?php namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class SeguimientoDefinitiva extends Sximo  {

	protected $table = 'hcseguimientoDefinitiva';
	protected $primaryKey = 'id';

	public function __construct() {
		parent::__construct();

	}

	public static function querySelect(  ){

		return "  SELECT hcseguimientoDefinitiva.* FROM hcseguimientoDefinitiva  ";
	}

	public static function queryWhere(  ){

		return "  WHERE hcseguimientoDefinitiva.id IS NOT NULL ";
	}

	public static function queryGroup(){
		return "  ";
	}


}
