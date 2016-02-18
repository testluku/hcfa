<?php namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class TratamientoDefinitiva extends Sximo  {

	protected $table = 'tratamientoDefinitiva';
	protected $primaryKey = 'id';

	public function __construct() {
		parent::__construct();

	}

	public static function querySelect(  ){

		return "  SELECT tratamientoDefinitiva.* FROM tratamientoDefinitiva  ";
	}

	public static function queryWhere(  ){

		return "  WHERE tratamientoDefinitiva.id IS NOT NULL ";
	}

	public static function queryGroup(){
		return "  ";
	}


}
