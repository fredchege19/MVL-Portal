<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();
Route::get('logout', function(){
    Auth::logout();
    return view('auth.login');
});

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/users', 'HomeController@users')->name('users');
Route::get('/activities', 'HomeController@activities')->name('activities');
Route::get('petty', 'HomeController@petty')->name('petty');
Route::get('approve_petty/{id}', 'HomeController@approve_petty')->name('approve_petty');
Route::get('acknowledge_petty/{id}', 'HomeController@acknowledge_petty')->name('acknowledge_petty');
Route::get('allowance', 'HomeController@allowance')->name('allowance');
Route::get('approve_allowance/{id}', 'HomeController@approve_allowance');
Route::get('view_activity/{id}', 'HomeController@view_activity');
Route::get('settings', 'HomeController@settings');
Route::get('tickets', 'HomeController@tickets');
Route::post('save_status_activity', 'HomeController@save_status_activity');
Route::post('save_allowance', 'HomeController@save_allowance');
Route::post('/save_user', 'HomeController@save_user')->name('save_user');
Route::post('save_action', 'HomeController@save_action');
Route::post('save_petty', 'HomeController@save_petty');
Route::post('save_ticket', 'HomeController@save_ticket');
Route::post('save_approvers', 'HomeController@save_approvers');
Route::get('save_ticket', 'HomeController@save_ticket');
Route::post('save_county', 'HomeController@save_county');
Route::post('save_road', 'HomeController@save_road');
Route::get('get_roads/{id}', 'HomeController@get_roads');
Route::get('deliveries', 'HomeController@deliveries');
Route::post('update_petty_amount', 'HomeController@update_petty_amount');
Route::post('update_petty_rejected', 'HomeController@update_petty_rejected');
Route::get('view_more_petty/{id}', 'HomeController@view_more_petty');
Route::get('disburse/{id}', 'HomeController@disburse');
Route::post('save_petty_receipts', 'HomeController@save_petty_receipts');

Route::group(['middleware' => ['auth']], function() {
    Route::resource('roles', RoleController::class);
    Route::resource('permissions', PermissionController::class);
});

Route::post('save_allowance_new', 'HomeController@save_allowance_new');
Route::get('view_more_allowance/{id}', 'HomeController@view_more_allowance');