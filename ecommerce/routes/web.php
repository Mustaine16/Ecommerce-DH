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

Route::get('/login', function () {
    return view('login');
});

Route::get('/registro', function () {
    return view('registro');
});


/**
 * CRUD Productos
 */

Route::get('/producto/admin', "ProductosController@index");

Route::get("/producto/agregar", "ProductosController@create");

Route::post("/producto/agregar", "ProductosController@store");

Route::get("/producto/{id}/editar", "ProductosController@edit");

Route::post("/producto/{id}/editar", "ProductosController@update");

Route::post("/producto/{id}/borrar", "ProductosController@destroy");



/**
 * Vistas Perfil de usuario
 */

Route::get("/perfil", function () {
    return view("perfil");
});

Route::get("/cuenta", function () {
    return view("cuenta");
});

Route::get("/seguridad", function () {
    return view("seguridad");
});

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
