<?php

use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

//Auth::routes();
Auth::routes(['verify' => true]);


//Route::get('/home', 'MainController@index')->name('main.home');
Route::get('/home', 'MainController@index')->name('main.home');
Route::get('/home', 'MainController@index')->name('main.home');
Route::get('/new-restaurent', 'MainController@new_restaurent')->name('new_restaurent');
Route::post('/new_restaurent', 'MainController@new_restaurent_handle')->name('new_restaurent_handle');
Route::get('/my-restaurent', 'MainController@my_restaurent')->name('my_restaurent');
Route::get('/new-client', 'MainController@new_client')->name('new_client');
Route::post('/new_client', 'MainController@new_client_handle')->name('new_client_handle');
Route::get('/my-client', 'MainController@my_client')->name('my_client');
Route::get('/edit-client/{id}', 'MainController@edit_client')->name('edit_client');
Route::get('/delete-client/{id}', 'MainController@delete_client')->name('delete_client');
Route::post('/update-client', 'MainController@update_client')->name('update_client');
Route::get('/getdistricts/{id}','MainController@find_district')->name('getdistricts');
Route::get('/edit-restaurent/{id}', 'MainController@edit_restaurent')->name('edit_restaurent');
Route::get('/delete-restaurent/{id}', 'MainController@delete_restaurent')->name('delete_restaurent');
Route::post('/update-restaurent', 'MainController@update_restaurent')->name('update_restaurent');

//Route::get('/getsectors/{id}','MainController@find_sector')->name('getsectors');

Route::get('/getsectors/{id}','MainController@find_sector')->name('getsectors');
Route::get('/getcells/{id}','MainController@find_cell')->name('getcells');
Route::post('/client-filter','MainController@client_query')->name('client_query');
Route::post('/client-report','MainController@report_query')->name('report_query');

//Route::get('/home', 'HomeController@index')->name('home');
Route::get('/dashbord', 'ManagerController@home')->name('manager.home');
Route::get('/restaurents', 'ManagerController@restaurent')->name('manager.restaurent');
Route::get('/clients', 'ManagerController@client')->name('manager.client');
Route::post('/search_result', 'ManagerController@client_query')->name('manager.client_query');
Route::get('/today-clients', 'ManagerController@today_client')->name('manager.today_client');