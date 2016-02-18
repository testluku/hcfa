<?php namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class RecomendacionesAdvertenciaDefinitiva extends Sximo  {

	protected $table = 'recomendacionesAdvertenciaDefinitiva';
	protected $primaryKey = 'id';

	public function __construct() {
		parent::__construct();

	}

	public static function querySelect(  ){

		return "  SELECT recomendacionesAdvertenciaDefinitiva.* FROM recomendacionesAdvertenciaDefinitiva  ";
	}

	public static function queryWhere(  ){

		return "  WHERE recomendacionesAdvertenciaDefinitiva.id IS NOT NULL ";
	}

	public static function queryGroup(){
		return "  ";
	}


}
