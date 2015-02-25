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

Route::bind('eventos', function ($id)
{
	return \App\Event::whereId($id)->first();
});

Route::bind('tipos', function ($id)
{
	return \App\Type::whereId($id)->first();
});

Route::get('/calendario', ['as' => 'calendar', 'uses' => 'CalendarController@index']);
Route::get('/admin', ['as' => 'admin', 'uses' => 'AdminController@index']);

Route::resource('admin/eventos', 'EventsController', [
	'names' => [
		'create' => 'event-create',
		'store' => 'event-save',
		'edit' => 'event-edit',
		'update' => 'event-update',
		'destroy' => 'event-delete'
	],
	'only' => ['create', 'edit', 'destroy', 'store', 'update']
]);

Route::resource('admin/tipos', 'TypesController', [
	'names' => [
		'create' => 'type-create',
		'store' => 'type-save',
		'edit' => 'type-edit',
		'update' => 'type-update',
		'destroy' => 'type-delete'
	],
	'only' => ['create', 'edit', 'destroy', 'store', 'update']
]);

Route::get('/', 'CalendarController@redirect');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
