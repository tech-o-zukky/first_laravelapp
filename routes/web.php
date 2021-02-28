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