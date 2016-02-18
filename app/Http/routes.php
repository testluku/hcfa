<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/




Route::get('/', 'HomeController@index');
Route::controller('home', 'HomeController');

Route::controller('/user', 'UserController');
include('pageroutes.php');
include('moduleroutes.php');

Route::get('/restric',function(){

	return view('errors.blocked');

});

Route::resource('sximoapi', 'SximoapiController');
Route::group(['middleware' => 'auth'], function()
{

	Route::get('core/elfinder', 'Core\ElfinderController@getIndex');
	Route::post('core/elfinder', 'Core\ElfinderController@getIndex');
	Route::controller('/dashboard', 'DashboardController');
	Route::controllers([
		'core/users'		=> 'Core\UsersController',
		'notification'		=> 'NotificationController',
		'core/logs'			=> 'Core\LogsController',
		'core/pages' 		=> 'Core\PagesController',
		'core/groups' 		=> 'Core\GroupsController',
		'core/template' 	=> 'Core\TemplateController',
	]);

});

Route::group(['middleware' => 'auth' , 'middleware'=>'sximoauth'], function()
{

	Route::controllers([
		'sximo/menu'		=> 'Sximo\MenuController',
		'sximo/config' 		=> 'Sximo\ConfigController',
		'sximo/module' 		=> 'Sximo\ModuleController',
		'sximo/tables'		=> 'Sximo\TablesController'
	]);



});
Route::get('/citas', 'ReservacionController@indexView');
Route::get('/listar', 'ReservacionController@index');
Route::post('/ver', 'ReservacionController@show');
Route::post('/agregar', 'ReservacionController@store');
Route::get('/modificar', 'ReservacionController@edit');
Route::post('/actualizar', 'ReservacionController@update');
Route::post('/eliminar', 'ReservacionController@destroy');
Route::post(
    '/check_repetitive_events',
    'ReservacionController@checkRepetitiveEvents'
);
Route::get(
    '/autocomplete_paciente',
    'ReservacionController@autocompleteIdPaciente'
);
Route::get('/datos_paciente', 'ReservacionController@datosPaciente');
# Horarios atención
Route::get('/horarios_atencion', 'HorarioAtencionController@index');
Route::post('/horarios_atencion', 'HorarioAtencionController@store');
Route::delete('/horarios_atencion/{id}', 'HorarioAtencionController@destroy');
Route::get(
    '/horarios_atencion_calendario',
    'HorarioAtencionController@businessHours'
);
# Días bloqueados
Route::get('/dias_bloqueados', 'DiaBloqueadoController@index');
Route::post('/dias_bloqueados', 'DiaBloqueadoController@store');
Route::delete('/dias_bloqueados/{id}', 'DiaBloqueadoController@destroy');
Route::get('/dias_bloqueados_calendario', 'DiaBloqueadoController@blockedDays');


#Cotizacion
