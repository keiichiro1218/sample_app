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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/','PostsCOntroller@index')->name('top');
Route::get('/create','PostsCOntroller@create')->name('posts.create');
Route::post('/store','PostsCOntroller@store')->name('posts.store');
Route::get('/show/{post_id}','PostsCOntroller@show')->name('posts.show');
Route::get('/edit/{post_id}','PostsCOntroller@edit')->name('posts.edit');
Route::put('/update/{post_id}','PostsCOntroller@update')->name('posts.update');
Route::delete('/destory/{post_id}','PostsCOntroller@destroy')->name('posts.destroy');