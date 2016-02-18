<?php namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class lreservas extends Sximo  {
	
	protected $table = 'booking_reservation';
	protected $primaryKey = 'reservation_id';

	public function __construct() {
		parent::__construct();
		
	}

	public static function querySelect(  ){
		
		return "  SELECT booking_reservation.* FROM booking_reservation  ";
	}	

	public static function queryWhere(  ){
		
		return "  WHERE booking_reservation.reservation_id IS NOT NULL ";
	}
	
	public static function queryGroup(){
		return "  ";
	}
	

}
