<?php namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class OtrosAntecedentesDefinitiva extends Sximo  {

	protected $table = 'otrosAntecedentesDefinitiva';
	protected $primaryKey = 'id';

	public function __construct() {
		parent::__construct();

	}

	public static function querySelect(  ){

		return "  SELECT otrosAntecedentesDefinitiva.* FROM otrosAntecedentesDefinitiva  ";
	}

	public static function queryWhere(  ){

		return "  WHERE otrosAntecedentesDefinitiva.id IS NOT NULL ";
	}

	public static function queryGroup(){
		return "  ";
	}


}
