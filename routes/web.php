<?php

use Illuminate\Support\Facades\Route;
Auth::routes(
    [
        'register' => false,
        'reset' => false,
    ]
);

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

Route::get('/', 'HomeController@index');
Route::get('/home', 'HomeController@index')->name('home');

Route::get('/about', 'AboutController@index');

Route::get('/contact',  'ContactController@index');

Route::get('/github',  'GithubController@index');


Route::get('/buku',  'BukuController@index');
Route::get('/buku/create',  'BukuController@create')->name('buku.create');
Route::post('/buku',  'BukuController@store')->name('buku.store');

Route::post('/buku/delete/{id}', 'BukuController@destroy')->name('buku.destroy');
Route::get('/buku/edit/{id}', 'BukuController@edit')->name('buku.edit');
Route::post('/buku/update/{id}',  'BukuController@update')->name('buku.update');

Route::get('/buku/search',  'BukuController@search')->name('buku.search');

Route::get('/user',  'UserController@index')->name('user');
Route::get('/user/create',  'UserController@create')->name('user.create');
Route::post('/user',  'UserController@store')->name('user.store');

Route::post('/user/delete/{id}', 'UserController@destroy')->name('user.destroy');
Route::get('/user/edit/{id}', 'UserController@edit')->name('user.edit');
Route::post('/user/update/{id}',  'UserController@update')->name('user.update');

Route::get('/user/search',  'UserController@search')->name('user.search');

Route::get('/galeri',  'GaleriController@index');
Route::get('/galeri/create',  'GaleriController@create')->name('galeri.create');
Route::post('/galeri',  'GaleriController@store')->name('galeri.store');
Route::get('/galeri/edit/{id}',  'GaleriController@edit')->name('galeri.edit');
Route::post('/galeri/update/{id}',  'GaleriController@update')->name('galeri.update');
Route::post('/galeri/delete/{id}',  'GaleriController@destroy')->name('galeri.destroy');



