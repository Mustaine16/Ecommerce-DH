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
* Vistas Estaticas
*/

Route::get('/', function () {
    return view('home');
});

Route::get("/faq",function(){
  return view("faq");
});

Route::get("/contacto", function(){
  return view("contacto");
});


/**
 * Vista de Catalogo y Detalles de Productos
 */

Route::get('/catalogo',function(){
  return view('catalogo');
});

Route::get("/detalle-producto", function(){
  return view("detalle-producto");
});


/*
* CRUD Usarios
*/

Route::get('/login',function(){
  return view('login');
});

Route::get('/registro',function(){
    return view('registro');
});


/**
 * CRUD Productos
 */

Route::get('/producto/admin',function(){
  return view("adminProductos");
});

Route::get("/producto/agregar", function(){
  return view("agregarProducto");
});

Route::get("/producto/editar",function(){
  return view("editarProducto");
});
