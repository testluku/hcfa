<?php namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class HistoriaClinicaPreliminar extends Sximo  {

	protected $table = 'histpreliminar';
	protected $primaryKey = 'id';

	public function __construct() {
		parent::__construct();

	}

	public static function querySelect(  ){

		return "  SELECT histpreliminar.* FROM histpreliminar  ";
	}

	public static function queryWhere(  ){

		return "  WHERE histpreliminar.id IS NOT NULL ";
	}

	public static function queryGroup(){
		return "  ";
	}


}
