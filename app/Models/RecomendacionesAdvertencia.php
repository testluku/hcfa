<?php namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class RecomendacionesAdvertencia extends Sximo  {

	protected $table = 'recomendacionesadvertencia';
	protected $primaryKey = 'id';

	public function __construct() {
		parent::__construct();

	}

	public static function querySelect(  ){

		return "  SELECT recomendacionesadvertencia.* FROM recomendacionesadvertencia  ";
	}

	public static function queryWhere(  ){

		return "  WHERE recomendacionesadvertencia.id IS NOT NULL ";
	}

	public static function queryGroup(){
		return "  ";
	}


}
