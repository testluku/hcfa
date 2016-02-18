<?php namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class dashboard extends Sximo  {
	
	protected $table = 'tb_users';
	protected $primaryKey = 'id';

	public function __construct() {
		parent::__construct();
		
	}

	public static function querySelect(  ){
		
		return "   ";
	}	

	public static function queryWhere(  ){
		
		return "   ";
	}
	
	public static function queryGroup(){
		return "  ";
	}
	

}
