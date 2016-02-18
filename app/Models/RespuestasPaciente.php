<?php namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class RespuestasPaciente extends Sximo  {

	protected $table = 'respuestaspaciente';
	protected $primaryKey = 'id';

	public function __construct() {
		parent::__construct();

	}

	public static function querySelect(  ){

		return "  SELECT respuestaspaciente.* FROM respuestaspaciente  ";
	}

	public static function queryWhere(  ){

		return "  WHERE respuestaspaciente.id IS NOT NULL ";
	}

	public static function queryGroup(){
		return "  ";
	}


}
