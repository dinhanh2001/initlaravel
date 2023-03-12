<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::post('/github',function(){
    $cmd = "sh /home/github/web/test.github.3fgroup.vn/public_html/github.sh";
    exec($cmd,$output);
    print_r($output);
});
// Hello world
// My name is Luong
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('/register','HomeController@postRegister')->name('api.register');
Route::post('/upload','HomeController@uploadTemp')->name('upload');