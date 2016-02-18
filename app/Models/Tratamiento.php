<?php namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class Tratamiento extends Sximo  {

	protected $table = 'tratamiento';
	protected $primaryKey = 'id';

	public function __construct() {
		parent::__construct();

	}

	public static function querySelect(  ){

		return "  SELECT tratamiento.* FROM tratamiento  ";
	}

	public static function queryWhere(  ){

		return "  WHERE tratamiento.id IS NOT NULL ";
	}

	public static function queryGroup(){
		return "  ";
	}


}
