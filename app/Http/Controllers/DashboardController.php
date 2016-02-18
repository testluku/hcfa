<?php namespace App\Http\Controllers;



use Carbon\Carbon;
use App\Http\Controllers\controller;
use App\Models\Ingautoriza;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator as Paginator;
use Validator, Input, Redirect;

class DashboardController extends Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function getIndex( Request $request )
	{
		$this->data['online_users'] = \DB::table('tb_users')
																	->orderBy('last_activity','desc')
																	->limit(20)
																	->get();
		return view('dashboard.index',$this->data);
	}


}
