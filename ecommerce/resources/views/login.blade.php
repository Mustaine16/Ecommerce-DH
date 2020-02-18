@extends('layout.plantilla')

@section("estilos")
<link rel="stylesheet" href="{{asset('css/login.css')}}" />
@endsection

@section("title", "Login")

@section("main")
<section class="container formularios__container" id="form-container">

<h1 class="important-text my-3">Inicia Sesión</h1>

<form action="/login" method="post">
  <div class="form-group">
    <label for="email">Email</label>
    <input
      type="text"
      id="email"
      class="form-control email-input"
      name="email"
      value= ''
    />
  </div>
  <div class="form-group">
    <label for="password">Clave</label>
    <input
      type="password"
      id="password"
      class="form-control password-input"
      name="password"
    />
  </div>
  <div class="form-check">
    <input class="form-check-input" type="checkbox" value="yes" id="defaultCheck1" name="mantenerLogueado">
    <label class="form-check-label" for="defaultCheck1">Mantenerme Logueado</label>
  </div>
  <div class="form-group buttons">
    <input
      type="submit"
      class="col col-md-auto col-lg-auto mb-3 btn btn-lg btn-primary"
      value="Ingresar"
      id="login"
    />
    <a
      class="col col-md-auto col-lg-auto mb-3 text-center"
      href="forgotpassword.php"
      id="forgot"
      role="button"
      >Olvidé mi contraseña</a
    >
  </div>
</form>
</section>
@endsection