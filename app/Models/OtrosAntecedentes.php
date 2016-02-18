<?php namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class OtrosAntecedentes extends Sximo  {

	protected $table = 'otrosantecedentes';
	protected $primaryKey = 'id';

	public function __construct() {
		parent::__construct();

	}

	public static function querySelect(  ){

		return "  SELECT otrosantecedentes.* FROM otrosantecedentes  ";
	}

	public static function queryWhere(  ){

		return "  WHERE otrosantecedentes.id IS NOT NULL ";
	}

	public static function queryGroup(){
		return "  ";
	}


}
