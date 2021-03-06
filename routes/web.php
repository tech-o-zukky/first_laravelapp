<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HelloController;
use App\Http\Controllers\SingleActionController;
use App\Http\Controllers\RequestResponceController;

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

Route::get('hello', 'App\Http\Controllers\HelloController@index');   // add3-4, 3-9
Route::get('hello/other', [HelloController::class, 'other']);     // list2-12
Route::get('singleaction', SingleActionController::class);     // list2-13
Route::get('request', [RequestResponceController::class, 'index']);           // list2-12
Route::post('hello', 'App\Http\Controllers\HelloController@post');   // add3-16
Route::get('derective', 'App\Http\Controllers\DerectiveStudyController@index');    //ディレクティブ学習ページ切り出し
Route::get('hello/add', 'App\Http\Controllers\HelloController@add');   // add5-10
Route::post('hello/add', 'App\Http\Controllers\HelloController@create');   // add5-10
Route::get('hello/edit', 'App\Http\Controllers\HelloController@edit');   // add5-13
Route::post('hello/edit', 'App\Http\Controllers\HelloController@update');   // add5-13
Route::get('hello/del', 'App\Http\Controllers\HelloController@del');   // add5-16
Route::post('hello/del', 'App\Http\Controllers\HelloController@remove');   // add5-16
Route::get('hello/show', 'App\Http\Controllers\HelloController@show');   // add5-20
Route::get('person', 'App\Http\Controllers\PersonController@index');   // add6-4
Route::get('person/find', 'App\Http\Controllers\PersonController@find');   // add6-9
Route::post('person/find', 'App\Http\Controllers\PersonController@search');   // add6-9
Route::get('person/add', 'App\Http\Controllers\PersonController@add');   // add6-21
Route::post('person/add', 'App\Http\Controllers\PersonController@create');   // add6-21
Route::get('person/edit', 'App\Http\Controllers\PersonController@edit');   // add6-24
Route::post('person/edit', 'App\Http\Controllers\PersonController@update');   // add6-24
Route::get('person/delete', 'App\Http\Controllers\PersonController@delete');   // add6-27
Route::post('person/delete', 'App\Http\Controllers\PersonController@remove');   // add6-27
// board
Route::get('board', 'App\Http\Controllers\BoardController@index');   // add6-34
Route::get('board/add', 'App\Http\Controllers\BoardController@add');   // add6-34
Route::post('board/add', 'App\Http\Controllers\BoardController@create');   // add6-34