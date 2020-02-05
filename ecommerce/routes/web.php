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

Route::get('/', function () {
    return view('welcome');
});
//solo por testing
Route::get('/catalogo',function(){
  return view('catalogo');
});
Route::get('/login',function(){
  return view('login');
});

Route::get('/register',function(){
    return view('register');
});
Route::get('/abm',function(){
  return "este es el ABM";
});
