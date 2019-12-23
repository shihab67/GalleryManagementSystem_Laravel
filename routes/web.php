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
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome')->with('title','Welcome');
});

Route::get('/login', function () {
    return view('login')->with('title','Login');
});
Route::post('/login','LoginController@verify');

Route::get('/home','ImageController@index');

Route::get('/layout','ImageController@layout');

Route::get('/image', function () {
    return view('image')->with('title','Add | Image');
});
Route::post('/image','ImageController@insert')->name('insert');

Route::get('/edit/{id}', 'ImageController@edit')->name('image.edit');
Route::post('/edit/{id}', 'ImageController@update')->name('update');

Route::get('/delete/{id}', 'ImageController@destroy')->name('image.destroy');
