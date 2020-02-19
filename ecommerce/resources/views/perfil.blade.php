@extends('layout.plantilla')

@section("estilos")
<link rel="stylesheet" href="{{asset('css/perfil.css')}}" />
@endsection

@section("title", "Perfil")

@section("main")
<main class="container mt-4" id="form-container">

  <!-- LISTA -->
  <ul>
    <li><a href="/perfil" class="active">Perfil</a></li>
    <li><a href="/cuenta">Cuenta</a></li>
    <li><a href="/seguridad">Seguridad</a></li>
  </ul>

  <!-- CARTEL PARA CONFIRMAR QUE LOS CAMBIOS FUERON GUARDADOS -->

  <?php

  if ($_POST && count($errores) == 0) : ?>
    <div class="confirmar-cambios">
      <p>Cambios guardados</p>
    </div>
  <?php endif; ?>

  <!-- Formulario Datos Personales -->
  <form action="" method="Post" class="fix-height">
    <h1 class="">Datos Personales</h1>
    <section>

      <div class="d-flex flex-column">
        <label for="nombre">Nombre</label>
        <input class="inputs-f" type="text" name="nombre" placeholder="Introduce tu nombre"/>
        <!-- ACA VA LA PERSISTENCIA -->
        <span class="text-danger"><?= isset($errores["nombre"]) ? $errores["nombre"] : ""; ?></span>
      </div>

      <div class="d-flex flex-column">
        <label for="apellido">Apellido</label>
        <input class="inputs-f" type="text" name="apellido" placeholder="Introduce tu apellido"/>
        <!-- ACA VA LA PERSISTENCIA -->
        <span class="text-danger"><?= isset($errores["apellido"]) ? $errores["apellido"] : ""; ?></span>
      </div>

      <div class="d-flex flex-column">
        <label for="direccion">Direccion</label>
        <input class="inputs-f" type="text" name="direccion" placeholder="Introduce tu direccion"/>
        <!-- ACA VA LA PERSISTENCIA -->
        <span class="text-danger"><?= isset($errores["direccion"]) ? $errores["direccion"] : ""; ?></span>
      </div>

      <div class="d-flex flex-column">
        <label for="ciudad">Ciudad</label>
        <input class="inputs-f" type="text" name="ciudad" placeholder="Introduce tu ciudad"/>
        <!-- ACA VA LA PERSISTENCIA -->
        <span class="text-danger"><?= isset($errores["ciudad"]) ? $errores["ciudad"] : ""; ?></span>
      </div>

      <input type="submit" name="guardar" class="btn btn-primary" value="Guardar Cambios">
    </section>
  </form>

</main>
@endsection