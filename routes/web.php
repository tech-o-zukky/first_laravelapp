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

/* start list2-5
Route::get('hello/{msg?}', function ($msg='no message.') {
//    return '<html><body><h1>Hello</h1><p>This is sample page.</p></body></html>';
//});

$html = <<<EOF
<html>
<head>
    <title>Hello</title>
    <style>
        body {font-size: 16pt; color: #999; }
        h1 {font-size: 100pt; text-align: right; color: #eee; 
            margin: -40px 0px -50px 0px; }
    </style>
</head>
<body>
    <h1>Hello</h1>
    <!-- <p>This is sample page.</p> -->
    <p>{$msg}</p>
    <p>Laravel学習のためのサンプルページです.</p>
</body>
</html>
EOF;

//Route::get('hello', function () use ($html) {
    return $html;
});

end list2-5 */

// Route::get('hello', [HelloController::class, 'index']);
// Route::get('hello/{id?}/{pass?}', [HelloController::class, 'index']);
Route::get('hello', [HelloController::class, 'index']);           // list2-12
Route::get('hello/other', [HelloController::class, 'other']);     // list2-12
Route::get('singleaction', SingleActionController::class);     // list2-13
Route::get('request', [RequestResponceController::class, 'index']);           // list2-12