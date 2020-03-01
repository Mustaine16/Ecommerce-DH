<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use App\Producto;
use App\Marca;

class ProductosController extends Controller
{
    public function index()
    {
        $productos = Producto::all();
        ($productos);
        // dd($productos);
        $vac = compact("productos");

        if (\Request::is('catalogo')) {
            return view("catalogo", $vac);
        } else {
            return view("adminProductos", $vac);
        }
    }

    public function show($id)
    {
        $producto = Producto::find($id);

        $vac = compact("producto");

        return view("detalle-producto", $vac);
    }

    public function create()
    {
        $marcas = Marca::all();
        $vac = compact('marcas');
        return view("agregarProducto", $vac);
    }

    public function store(Request $request)
    {

        $reglas = [
            "nombre" => "required",
            "sist_operativo" => "required",
            "memoria_int" => "integer",
            "memoria_ram" => "integer",
            "procesador" => "required",
            "pantalla" => "numeric",
            "camara" => "numeric",
            "precio" => "numeric",
            "imagen" => "file"
        ];

        $mensajes = [
            "string" => "El campo :attribute debe ser un texto.",
            "integer" => "El campo :attribute debe ser un número entero.",
            "numeric" => "El campo :attribute debe ser un número.",
            "required" => "El campo :attribute es obligatorio."
        ];

        $this->validate($request, $reglas, $mensajes);


        $producto = new Producto();

        $producto->nombre = $request["nombre"];
        $producto->id_marca = $request["id_marca"];
        $producto->sist_operativo = $request["sist_operativo"];
        $producto->memoria_int = $request["memoria_int"];
        $producto->memoria_ram = $request["memoria_ram"];
        $producto->procesador = $request["procesador"];
        $producto->pantalla = $request["pantalla"];
        $producto->camara = $request["camara"];
        $producto->precio = $request["precio"];

        if ($request->file("imagen")) {
            $ruta = $request->file("imagen")->store("public");
            $imagen = basename($ruta);
            $producto->imagen = $imagen;
        } else {
            $producto->imagen = 'no-image.jpg';
        }

        $producto->save();

        return redirect('/producto/admin')->with('mensajeExito', 'Producto: ' . $producto->nombre . ' agregado correctamente');
    }

    public function edit($id)
    {
        $marcas = Marca::all();
        $producto = Producto::find($id);

        if($producto){
          $vac = compact('marcas', 'producto');
          return view('editarProducto', $vac);
        }else{
            abort(404);
        }
    }

    public function update(Request $request, $id)
    {

        $reglas = [
            "nombre" => "required",
            "sist_operativo" => "required",
            "memoria_int" => "integer",
            "memoria_ram" => "integer",
            "procesador" => "required",
            "pantalla" => "numeric",
            "camara" => "numeric",
            "precio" => "numeric",
            "imagen" => "file"
        ];

        $mensajes = [
            "string" => "El campo :attribute debe ser un texto.",
            "integer" => "El campo :attribute debe ser un número entero.",
            "numeric" => "El campo :attribute debe ser un número.",
            "required" => "El campo :attribute es obligatorio."
        ];

        $this->validate($request, $reglas, $mensajes);

        $producto = Producto::find($id);

        $producto->nombre = $request["nombre"];
        $producto->id_marca = $request["id_marca"];
        $producto->sist_operativo = $request["sist_operativo"];
        $producto->memoria_int = $request["memoria_int"];
        $producto->memoria_ram = $request["memoria_ram"];
        $producto->procesador = $request["procesador"];
        $producto->pantalla = $request["pantalla"];
        $producto->camara = $request["camara"];
        $producto->precio = $request["precio"];

        //Si el usuario decide cambiar de imagen, se borra la anterior para liberar espacio
        //Caso contrario, no se hace ninguna modificacion
        if ($request->file("imagen")) {

            $imagenVieja = $producto->imagen;

            //Se verifica que no sea la imagen de stock
            if($imagenVieja != 'no-image.jpg'){
                Storage::delete("/public" . "/" . $imagenVieja);
            }

            //Se guarda la imagen en Storage y BBDD
            $ruta = $request->file("imagen")->store("public");
            $imagen = basename($ruta);
            $producto->imagen = $imagen;
        }

        $producto->save();

        return redirect("/producto/admin")->with('mensajeExito', 'Producto: ' . $producto->nombre . ' editado correctamente');;
    }

    public function destroy($id)
    {
        $producto = Producto::find($id);

        //Se borra la imagen para no malgastar almacenamiento
        $imagenVieja = $producto->imagen;
        //Se verifica que no sea la imagen de stock
        if($imagenVieja != 'no-image.jpg'){
            Storage::delete("/public" . "/" . $imagenVieja);
        }

        $producto->delete();
        return redirect('/producto/admin')->with('mensajeEliminacion', 'Producto: ' . $producto->nombre . ' eliminado correctamente');;
    }
}
