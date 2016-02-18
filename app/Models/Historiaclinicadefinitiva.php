<?php namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class historiaclinicadefinitiva extends Sximo  {
	
	protected $table = 'histdefinitiva';
	protected $primaryKey = 'id';

	public function __construct() {
		parent::__construct();
		
	}

	public static function querySelect(  ){
		
		return "  SELECT histdefinitiva.* FROM histdefinitiva  ";
	}	

	public static function queryWhere(  ){
		
		return "  WHERE histdefinitiva.id IS NOT NULL ";
	}
	
	public static function queryGroup(){
		return "  ";
	}
	

}
