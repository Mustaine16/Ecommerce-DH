@extends('layout.plantilla')

@section("title", "Admin - Marcas")

@section("main")
<main class="py-4 px-2 px-md-5">

    <!-- Mensaje de confirmacion en caso de Alta/Editar-->
    @if( session()->has('mensajeExito') )
        <div class="alert alert-success">
            {{ session()->get('mensajeExito') }}
        </div>
    @endif

    <!-- Mensaje de confirmacion en caso de Baja -->
    @if( session()->has('mensajeEliminacion') )
        <div class="alert alert-danger">
            {{ session()->get('mensajeEliminacion') }}
        </div>
    @endif

    <a class="btn btn-success mb-3 d-block ml-auto p-3" href="/marca/agregar">Agregar nueva marca</a>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                {{-- <th>Imagen</th> --}}
                <th>Nombre</th>
                <th colspan="2" class="text-center">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($marcas as $marca)
            <tr>
                <td>
                    {{$marca->id}}
                </td>
                <td>
                    {{$marca->nombre}}
                </td>
                <td>
                    <a href="/marca/{{$marca->id}}/editar"
                        class="btn btn-success mb-2 ml-sm-auto d-inline-block">Editar</a>
                </td>
                <td>
                    <form action="/marca/{{$marca->id}}/borrar" method="post">
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
