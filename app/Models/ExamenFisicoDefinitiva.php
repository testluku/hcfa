<?php namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class ExamenFisicoDefinitiva extends Sximo  {

	protected $table = 'examenFisicoDefinitiva';
	protected $primaryKey = 'id';

	public function __construct() {
		parent::__construct();

	}

	public static function querySelect(  ){

		return "  SELECT examenFisicoDefinitiva.* FROM examenFisicoDefinitiva  ";
	}

	public static function queryWhere(  ){

		return "  WHERE examenFisicoDefinitiva.id IS NOT NULL ";
	}

	public static function queryGroup(){
		return "  ";
	}


}
