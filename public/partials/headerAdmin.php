<?php
/**Esto contiene la barra de navegaci'on del Admin
* con Alta Baja y Modificaci'on
*/
require_once "autoload.php";

checkCookie();

if(session_status() == PHP_SESSION_NONE){

  session_start();

}

?>

<header>
  <!-- Navbar -->
  <nav class="navbar navbar-expand-md navbar-dark">
    <a class="navbar-brand" href="index.php"
      ><img
        src="img/logo-2.png"
        alt="Logo"
        class="logo__brand"
        style="width:100px;"
    /></a>
    <button
      class="navbar-toggler"
      type="button"
      data-toggle="collapse"
      data-target="#collapsibleNavbar"
    >
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="collapsibleNavbar">
      <ul class="navbar-nav text-center">
        <li class="nav-item">
          <a class="nav-link" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="catalogo.php">Catálogo</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="agregarProducto.php">Alta</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="eliminarProducto.php">Baja</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="editarProducto.php">Modificacion</a>
        </li>
      </ul>

      <!-- Si el usuarioe esta logueado, puede ver el link del perfil -->
      <?php if(isset($_SESSION['email'])) : ?>

      <div class="nav-item dropdown perfil__icon">
        <a
          class="nav-link dropdown-toggle text-center"
          id="navbardrop"
          data-toggle="dropdown"
          href="#"
        >

          <img src='<?= "usuarios/avatars/" . $_SESSION["avatar"] ?>' alt="Perfil" style="width:32px;" />
        </a>
        <!-- lINKS PARA ENTRAR AL A-B-M -->
        <div class="dropdown-menu perfil__menu-desplegable">
        <?php if($_SESSION["email"] == "admin@admin.com") : ?>
          <a class="dropdown-item" href="abm.php">Admin Panel</a>
          <a class="dropdown-item" href="logout.php">Cerrar Sesión</a>
        <?php else : ?>
          <a class="dropdown-item" href="perfil.php">Perfil</a>
          <a class="dropdown-item" href="logout.php">Cerrar Sesión</a>
        <?php endif;?>
        </div>

        <!-- De lo contrario ve los links para loguearse o registrarse -->
        <?php else: ?>
        <?php session_destroy(); ?>
        <ul class="navbar-nav text-center ml-auto">
            <li class="nav-item">
              <a class="nav-link" href="login.php">Login</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="registro.php">Registrate</a>
            </li>
        </ul>
        <?php
        endif; ?>
      </div>
    </div>
  </nav>
  <!-- Boton entrar al catalogo, solo se muestra en el Home -->
  <a class="button_catalogo" href="catalogo.php">Entrá al catálogo</a>
</header>
