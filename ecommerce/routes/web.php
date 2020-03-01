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

/*
* CRUD Usuarios
*/




/**
 * CRUD Productos
 */

Route::get('/producto/admin', "ProductosController@index")->middleware('auth');

Route::get("/producto/agregar", "ProductosController@create")->middleware('auth');

Route::post("/producto/agregar", "ProductosController@store")->middleware('auth');

Route::get("/producto/{id}/editar", "ProductosController@edit")->middleware('auth');

Route::post("/producto/{id}/editar", "ProductosController@update")->middleware('auth');

Route::post("/producto/{id}/borrar", "ProductosController@destroy")->middleware('auth');



/**
 * Vistas Perfil de usuario
 */

Route::get("/perfil", function () {
    return view("perfil");
})->middleware('auth');

Route::get("/cuenta", function () {
    return view("cuenta");
})->middleware('auth');

Route::get("/seguridad", function () {
    return view("seguridad");
})->middleware('auth');

/**
 * Vista de Catalogo,Detalles de Productos, Carrito
 */

Route::get('/catalogo', "ProductosController@index");

Route::get("/detalle-producto/{id}", "ProductosController@show");

Route::get('/carrito', function () {
    return view('carrito');
});

/*
* Vistas Estaticas
*/

Route::get('/', function () {
    return view('home');
});

Route::get("/faq", function () {
    return view("faq");
});

Route::get("/contacto", function () {
    return view("contacto");
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
