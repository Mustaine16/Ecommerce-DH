@extends('layout.plantilla')

@section("estilos")
<link rel="stylesheet" href="{{asset('css/registro.css')}}" />
@endsection

@section("title", "Registro")
@section("main")
  <section class="container formularios__container" id="form-container"> 
    <h1 class="important-text my-3">Creá tu cuenta</h1>
      <form action="registro.php" method="post" enctype="multipart/form-data">
        <div class="form-group avatar__container">
          <label class="avatar__img_container" for="avatar">
            <img src="https://i.imgur.com/OynRXad.png" alt="avatar" class="avatar__img">
            <p>Elegí un avatar</p>
          </label>
          <input type="file" name="avatar" id="avatar" class="avatar__input">
        </div>
        <div class="form-group">
          <label for="username">Nombre de Usuario</label>
          <input type="text" class="form-control text-input" id="username" name="username" value=""/>
        </div>
        <div class="form-group">
          <label for="email">Email</label>
          <input type="email" id="email" class="form-control email-input" name="email" value=""/>
        </div>
        <div class="form-group">
          <label for="password">Contraseña</label>
          <input type="password" id="password" class="form-control password-input" name="password"/>
        </div>
        <div class="form-group">
          <label for="repassword">Repetir Contraseña</label>
          <input type="password" id="repassword" class="form-control password-input" name="repassword"/>
        </div>
        <div class="form-group buttons">
          <input type="submit" class="col col-md-auto col-lg-auto mb-3 btn btn-lg btn-primary" value="Registrarse" id="registracion"/>
          <a href="login.php" class="col col-md-auto col-lg-auto mb-3 text-center" id="already-count">Ya tengo una cuenta</a>
        </div>
      </form>
  </section>
@endsection