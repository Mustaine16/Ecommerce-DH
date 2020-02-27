@extends('layout.plantilla')

@section("title", "Editar - Producto")

@section("title")@endsection

@section("main")
<ul style="color:red" class="errores text-center">
    @foreach ($errors->all() as $error)
    <li>
        {{$error}}
    </li>
    @endforeach
</ul>

<img src="/storage/{{$producto->imagen}}" alt="{{$producto->nombre}}" width="300px" class="mx-auto d-block">

<main class="py-4">
    <section class="container">
        <form action="/producto/{{$producto->id}}/editar" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div>
                <input type="file" name="imagen" id="imagen" class="mx-auto d-block" value="">
            </div>
            <br>
            <div class="form-group">
                <label for="nombre">Nombre del Producto</label>
                <input type="text" class="form-control" id="nombre" aria-describedby="NombreProducto"
                    placeholder="Ingrese un nombre de producto" name="nombre" value="{{$producto->nombre}}" />
            </div>
            <div class="form-group">
                <label for="id_marca">Marca</label>
                <select class="form-control" id="marca" name="id_marca">
                    @foreach($marcas as $marca)
                    <option value="{{$marca->id}}" 
                        @if($marca->id == $producto->id_marca)
                            SELECTED
                        @endif
                    >{{$marca->nombre}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="sist_operativo">Sistema Operativo</label>
                <input type="text" class="form-control" id="sist_operativo" placeholder="Sistema Operativo"
                    name="sist_operativo" value="{{$producto->sist_operativo}}" />
            </div>
            <div class="form-group">
                <label for="memoria_int">Memoria Interna</label>
                <input type="text" class="form-control" id="memoria_int"
                    placeholder="Exprese la cantidad en numero entero" name="memoria_int"
                    value="{{$producto->memoria_int}}" />
            </div>
            <div class="form-group">
                <label for="memoria_ram">Memoria RAM</label>
                <input type="text" class="form-control" id="memoria_ram"
                    placeholder="Exprese la cantidad en numero entero" name="memoria_ram"
                    value="{{$producto->memoria_ram}}" />
            </div>
            <div class="form-group">
                <label for="procesador">Procesador</label>
                <input type="text" class="form-control" id="procesador" placeholder="Procesador" name="procesador"
                    value="{{$producto->procesador}}" />
            </div>
            <div class="form-group">
                <label for="pantalla">Pantalla</label>
                <input type="text" class="form-control" id="pantalla" placeholder="Exprese la cantidad en numero"
                    name="pantalla" value="{{$producto->pantalla}}" />
            </div>
            <div class="form-group">
                <label for="camara">Camara</label>
                <input type="text" class="form-control" id="camara" placeholder="Exprese la cantidad en numero"
                    name="camara" value="{{$producto->camara}}" />
            </div>
            <div class="form-group">
                <label for="precio">Precio</label>
                <input type="text" class="form-control" id="precio" placeholder="Exprese la cantidad en numero"
                    name="precio" value="{{$producto->precio}}" />
            </div>
            <button type="submit" class="btn btn-success mx-auto d-block">
                Editar
            </button>
        </form>

        <br>

        <a href="/producto/admin">Back</a>

    </section>
</main>
@endsection
