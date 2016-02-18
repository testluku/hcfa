<?php namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class Contrato extends Sximo  {

	protected $table = 'contrato';
	protected $primaryKey = 'id';

	public function __construct() {
		parent::__construct();

	}

	public static function querySelect(  ){

		return "  SELECT contrato.* FROM contrato  ";
	}

	public static function queryWhere(  ){

		return "  WHERE contrato.id IS NOT NULL ";
	}

	public static function queryGroup(){
		return "  ";
	}


}
