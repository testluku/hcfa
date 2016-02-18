<?php namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class MotivoDeConsulta extends Sximo  {

	protected $table = 'motivodeconsulta';
	protected $primaryKey = 'id';

	public function __construct() {
		parent::__construct();

	}

	public static function querySelect(  ){

		return "  SELECT motivodeconsulta.* FROM motivodeconsulta  ";
	}

	public static function queryWhere(  ){

		return "  WHERE motivodeconsulta.id IS NOT NULL ";
	}

	public static function queryGroup(){
		return "  ";
	}


}
