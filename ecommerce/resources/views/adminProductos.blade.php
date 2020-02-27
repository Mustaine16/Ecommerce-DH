@extends('layout.plantilla')

@section("title", "Admin - Productos")

@section("main")
<main class="py-4 px-2 px-md-5">
    <a class="btn btn-success mb-3 d-block ml-auto p-3" href="/producto/agregar">Agregar nuevo producto</a>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Imagen</th>
                <th>Nombre del Producto</th>
            </tr>
        </thead>
        <tbody>
            @foreach($productos as $producto)
            <tr>
                <td>
                    {{$producto->id}}
                </td>
                <td>
                    <img src="/storage/{{$producto->imagen}}" alt="no image" width="40px">
                </td>
                <td>
                    {{$producto->nombre}}
                </td>
                <td>
                    <a href="/producto/{{$producto->id}}/editar"
                        class="btn btn-success mb-2 ml-sm-auto d-inline-block">Editar</a>
                </td>
                <td>
                    <form action="/producto/{{$producto->id}}/borrar" method="post">
                        {{csrf_field()}}
                        <button class="btn btn-danger mb-2">Borrar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</main>
@endsection
