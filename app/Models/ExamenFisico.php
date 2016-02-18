<?php namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class ExamenFisico extends Sximo  {

	protected $table = 'examenfisico';
	protected $primaryKey = 'id';

	public function __construct() {
		parent::__construct();

	}

	public static function querySelect(  ){

		return "  SELECT examenfisico.* FROM examenfisico  ";
	}

	public static function queryWhere(  ){

		return "  WHERE examenfisico.id IS NOT NULL ";
	}

	public static function queryGroup(){
		return "  ";
	}


}
