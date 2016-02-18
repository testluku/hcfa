<?php namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class MotivoDeConsultaDefinitiva extends Sximo  {

	protected $table = 'motivoDeConsultaDefinitiva';
	protected $primaryKey = 'id';

	public function __construct() {
		parent::__construct();

	}

	public static function querySelect(  ){

		return "  SELECT motivoDeConsultaDefinitiva.* FROM motivoDeConsultaDefinitiva  ";
	}

	public static function queryWhere(  ){

		return "  WHERE motivoDeConsultaDefinitiva.id IS NOT NULL ";
	}

	public static function queryGroup(){
		return "  ";
	}


}
