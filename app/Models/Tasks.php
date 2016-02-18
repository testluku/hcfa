<?php namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class tasks extends Sximo  {
	
	protected $table = 'tasks';
	protected $primaryKey = 'id';

	public function __construct() {
		parent::__construct();
		
	}

	public static function querySelect(  ){
		
		return "  SELECT tasks.* FROM tasks  ";
	}	

	public static function queryWhere(  ){
		
		return "  WHERE tasks.id IS NOT NULL ";
	}
	
	public static function queryGroup(){
		return "  ";
	}
	

}
