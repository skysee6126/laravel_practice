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
use App\Models\Article;
use Illuminate\Http\Request; 


//DB

Route::get('/', 'App\Http\Controllers\ArticleController@index');

//add the items
Route::post('/articles', 'App\Http\Controllers\ArticleController@store');


//Update
Route::post('/articles/update', 'App\Http\Controllers\ArticleController@update');


Route::post('/articlesedit/{articles}', 'App\Http\Controllers\ArticleController@edit');


Route::delete('/article/{article}', 'App\Http\Controllers\ArticleController@destroy');



?>