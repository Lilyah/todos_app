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

// GET

Route::get('/', function () {
    return view('welcome');
});

Route::get('todos', 'TodosController@index'); // when the user visits the 'todos' page laravel will load the TodosController and will execute index method 
Route::get('todos/{todo}', 'TodosController@show'); // dymanic routes (for many different pages); {todo} is the name of the dymanic field/URL
Route::get('todos/{todo}/edit', 'TodosController@edit'); 
Route::get('new-todos', 'TodosController@create'); 
Route::get('todos/{todo}/delete', 'TodosController@destroy');
Route::get('todos/{todo}/complete', 'TodosController@complete'); 



Route::post('store-todos', 'TodosController@store');
Route::post('todos/{todo}/update-todos', 'TodosController@update');




