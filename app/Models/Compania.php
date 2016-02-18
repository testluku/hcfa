<?php namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class compania extends Sximo  {

	protected $table = 'compania';
	protected $primaryKey = 'id';

	public function __construct() {
		parent::__construct();

	}

	public static function querySelect(  ){

		return "  SELECT compania.* FROM compania  ";
	}

	public static function queryWhere(  ){

		return "  WHERE compania.id IS NOT NULL ";
	}

	public static function queryGroup(){
		return "  ";
	}


}
