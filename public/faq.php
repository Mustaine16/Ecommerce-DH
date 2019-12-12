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
    <!-- Fonts -->
    <link
      href="https://fonts.googleapis.com/css?family=Alata|Quicksand:400,500,700&display=swap"
      rel="stylesheet"
    />
    <!-- Estilos -->
    <link rel="stylesheet" href="css/styles.css" type="text/css" />
    <!-- Title -->
    <title>FAQ</title>
  </head>
  <body>
    <!-- Header -->
    <?php include_once "partials/header.php" ;?>

    <!-- Cuerpo Principal -->

    <!--Aca Empieza el FAQ -->

    <!-- Divison Principal-->
    <section class="container fix-height">
      <div class="row Accordion d-flex justify-content-center">
        <!-- Responsive -->
        <div class="col-md-10 col-xl-6 py-5">
          <h1>Compras</h1>
          <!-- Titulo -->
          <!--Acordeones-->
          <div
            class="accordion md-accordion accordion-2"
            id="accordionEx7"
            role="tablist"
            aria-multiselectable="true"
          >
            <!-- Acordeon 1-->
            <div class="card">
              <!-- Titulo -->
              <div
                class="card-header rgba-stylish-strong z-depth-1 mb-1"
                role="tab"
                id="heading1"
              >
                <a
                  data-toggle="collapse"
                  data-parent="#accordionEx7"
                  href="#collapse1"
                  aria-expanded="true"
                  aria-controls="collapse1"
                >
                  <h5 class="mb-0 white-text font-thin">
                    ¿Como Comprar? <i class="fas fa-angle-down rotate-icon"></i>
                  </h5>
                </a>
              </div>
              <!-- Card -->
              <div
                id="collapse1"
                class="collapse show"
                role="tabpanel"
                aria-labelledby="heading1"
                data-parent="#accordionEx7"
              >
                <div class="card-body mb-1 rgba-grey-light white-text">
                  <ul class="list-group">
                    <li class="list-group-item">
                      <strong>1 -</strong> Elegí el producto que necesitás y
                      luego hacé clic en "Comprar", eso hará que se agregue a tu
                      Carrito de Compra.
                    </li>

                    <li class="list-group-item">
                      <strong>2 -</strong> Una vez sumados los items que querés,
                      en la parte superior derecha dentro de "Mi Compra" hacé
                      clic en "Continuar Compra".
                    </li>

                    <li class="list-group-item">
                      <strong>3 -</strong> Una vez en la página de compra
                      tendrás que seguir uno a uno los pasos, primero se te
                      muestra el resumen de lo que vas a comprar, luego se
                      pregunta la forma de entrega, a continuación la forma de
                      pago y por último se piden los datos para facturar y
                      confirmar la compra.
                    </li>

                    <li class="list-group-item">
                      <strong
                        >Todo el resumen de la operación te llegará en un mail
                        para que puedas revisarlo. Si tuvieras alguna duda podés
                        contactarnos.</strong
                      >
                    </li>
                  </ul>
                </div>
              </div>
            </div>
            <!-- Fin Acordeon 1 -->

            <!-- Acordeon 2-->
            <div class="card">
              <!-- Titulo -->
              <div
                class="card-header rgba-stylish-strong z-depth-1 mb-1"
                role="tab"
                id="heading2"
              >
                <a
                  class="collapsed"
                  data-toggle="collapse"
                  data-parent="#accordionEx7"
                  href="#collapse2"
                  aria-expanded="false"
                  aria-controls="collapse2"
                >
                  <h5 class="mb-0 white-text font-thin">
                    Productos <i class="fas fa-angle-down rotate-icon"></i>
                  </h5>
                </a>
              </div>
              <!-- Card -->
              <div
                id="collapse2"
                class="collapse"
                role="tabpanel"
                aria-labelledby="heading2"
                data-parent="#accordionEx7"
              >
                <div class="card-body mb-1 rgba-grey-light white-text">
                  <!-- Lista -->
                  <ul class="list-group">
                    <li class="list-group-item">
                      <strong>¿Los productos son nuevos?</strong> <br />
                      Sí, todos los productos son nuevos y con garantia del
                      fabricante directa.
                    </li>

                    <li class="list-group-item">
                      <strong>¿Los productos son legítimos y oficiales?</strong
                      ><br />
                      Sí, todos los productos que comercializamos son
                      originales, legítimos, con su embalaje original.
                    </li>

                    <li class="list-group-item">
                      <strong>¿Puedo cambiar o devolver un producto?</strong
                      ><br />
                      Sí, puedes cambiar o devolver un producto dentro de los 5
                      dias de retirado el mismo.
                    </li>
                  </ul>
                  <!-- Fin Lista -->
                </div>
              </section>
            </div>
            <!-- Fin Acordeon 2 -->
          </div>
          <!--RP Fin-->
        </div>
        <!-- Final de acordeon -->
      </div>
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