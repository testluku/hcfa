<?php namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class itemCotizacion extends Sximo  {

	protected $table = 'itemCotizacion';
	protected $primaryKey = 'id';

	public function __construct() {
		parent::__construct();

	}

	public static function querySelect(  ){

		return "  SELECT itemCotizacion.* FROM itemCotizacion  ";
	}

	public static function queryWhere(  ){

		return "  WHERE itemCotizacion.id IS NOT NULL ";
	}

	public static function queryGroup(){
		return "  ";
	}


}
