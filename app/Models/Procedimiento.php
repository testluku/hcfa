<?php namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class Procedimiento extends Sximo  {

	protected $table = 'procedimiento';
	protected $primaryKey = 'id';

	public function __construct() {
		parent::__construct();

	}

	public static function querySelect(  ){

		return "  SELECT procedimiento.* FROM procedimiento  ";
	}

	public static function queryWhere(  ){

		return "  WHERE procedimiento.id IS NOT NULL ";
	}

	public static function queryGroup(){
		return "  ";
	}


}
