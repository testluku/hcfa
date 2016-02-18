<?php namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class Seguimiento extends Sximo  {

	protected $table = 'hcseguimiento';
	protected $primaryKey = 'id';

	public function __construct() {
		parent::__construct();

	}

	public static function querySelect(  ){

		return "  SELECT hcseguimiento.* FROM hcseguimiento  ";
	}

	public static function queryWhere(  ){

		return "  WHERE hcseguimiento.id IS NOT NULL ";
	}

	public static function queryGroup(){
		return "  ";
	}


}
