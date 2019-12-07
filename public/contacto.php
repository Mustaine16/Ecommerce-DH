<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- Bootstrap -->
    <link
      rel="stylesheet"
      href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
    />
    <!-- Fonts -->
    <link
      href="https://fonts.googleapis.com/css?family=Alata|Quicksand:400,500,700&display=swap"
      rel="stylesheet"
    />
    <!-- Estilos -->
    <link rel="stylesheet" href="css/styles.css" type="text/css" />
    <!-- Title -->
    <title>Home</title>
  </head>
  <body>

    <!-- Header -->
    <?php include_once "partials/header.php" ;?>

    <!-- Main -->
    <section class="container p-3 fix-height">
      <h1>Contactanos</h1>
      <!-- esto envuelve al formulario -->
      <article class="container container-fluid" id="form-container">
        <form action="">
          <div class="form-group">
            <label for="name">Nombre</label>
            <input
              type="text"
              id="name"
              class="form-control text-input"
              name="name"
            />
          </div>
          <div class="form-group">
            <label for="last-name">Apellido</label>
            <input
              type="text"
              class="form-control text-input"
              id="last-name"
              name="last-name"
            />
          </div>
          <div class="form-group">
            <label for="email">Email</label>
            <input
              type="email"
              id="email"
              class="form-control email-input"
              name="email"
            />
          </div>
          <div class="form-group">
            <label for="telephone">Teléfono</label>
            <input
              type="tel"
              id="telephone"
              class="form-control password-input"
              name="telephone"
            />
          </div>
          <div class="form-group">
            <input
              type="submit"
              class="col col-md-auto col-lg-auto btn btn-lg btn-primary"
              value="Enviar"
              id="create-count"
            />
          </div>
          <div class="form-group">
            <!--      <p>aca puede ir un captcha o algo</p> -->
          </div>
        </form>
      </article>
    </section>

    <!-- Footer -->
    <?php include_once "partials/footer.php" ;?>

    <!-- Scripts -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script
      src="https://kit.fontawesome.com/2641c51c10.js"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
