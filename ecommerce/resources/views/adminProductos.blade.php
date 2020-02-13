@extends('layout.plantilla')

@section("title", "Admin - Productos")

@section("main")
  <main class="py-4 px-2 px-md-5">
    <a class="btn btn-success mb-3 d-block ml-auto p-3" href="/producto/agregar">Agregar nuevo producto</a>
      <table class="table">
        <thead>
          <tr>
            <th scope="col">ID</th>
            <th>Imagen</th>
            <th scope="col">Nombre del Producto</th>
            <th>Acciones</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <!-- Id -->
            <th scope="row" id="id">1</th>
            <!-- Imagen -->
            <td>
              <img src="{{asset('img/1.png')}}" alt="imagen-celular" width="40px">
            </td>
            <!-- Nombre -->
            <td>Mark</td>
            <!-- Botones -->
            <td>
              <form method="post" action="">
                <!-- ID DEL PRODUCTO, OCULTO, PARA PODER FILTRARLO EN LAS PAGNIAS SIGUIENTES -->
                <!-- EL VALUE TIENE QUE VENIR DE LA BBDD -->
                <input type="text" name="id" value="1" style="display:none">
                <button class="btn btn-danger mb-2" name="borrar">Borrar</button>
                <a href="/producto/editar"class="btn btn-success mb-2 ml-sm-auto d-inline-block" >Editar</a>
              </form>
            </td>
          </tr> 
        </tbody>
      </table>
  </main>
@endsection