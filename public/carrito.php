<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" />
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Alata|Quicksand:400,500,700&display=swap" rel="stylesheet">
    <!-- Estilos -->
    <link rel="stylesheet" href="css/styles.css" type="text/css" />
	<link rel="stylesheet" href="css/carrito.css" type="text/css" />
    <!-- Title -->
    <title>Home</title>
</head>

<body>
    <!-- Header -->
    <?php include_once "partials/header.php" ;?>

    <!-- Cuerpo Principal -->

    <section class="container fix-height">
        <br>
        <h1 class="pl-3">Tu Compra</h1>
        <br>
        <table class="table table-striped text-center">
            <thead class="thead-dark text-white">
                <tr>
                    <th scope="col">Producto</th>
                    <th scope="col">Cantidad</th>
                    <th scope="col" colspan="2">Precio</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Samsung Galaxy A8</td>
                    <td>
                        <select name="p-1">
                          <option value="uno">1</option>
                          <option value="dos">2</option>
                          <option value="tres">3</option>
                        </select>
                    </td>
                    <td>$20.999</td>
                    <td><i class="fas fa-trash-alt"></i></td>
                </tr>
                <tr>
                    <td>Moto E6 Plus</td>
                    <td>
                        <select name="p-2">
                          <option value="uno">1</option>
                          <option value="dos">2</option>
                          <option value="tres">3</option>
                        </select>
                    </td>
                    <td>$15.999</td>
                    <td><i class="fas fa-trash-alt"></i></td>
                </tr>
                <tr>
                    <td>Google Pixel 2</td>
                    <td>
                        <select name="p-3">
                          <option value="uno">1</option>
                          <option value="dos">2</option>
                          <option value="tres">3</option>
                        </select>
                    </td>
                    <td>$25.999</td>
                    <td><i class="fas fa-trash-alt"></i></td>
                </tr>
            </tbody>
            <tfoot class="font-weight-bold text-white">
                <tr class="bg-secondary">
                    <td>TOTAL</td>
                    <td colspan="2">$62997</td>
                    <td class="bg-dark text-white><a href=" "><i class="fas fa-cart-plus "></i></a></td>
                </tr>
                <tr class="border-0 ">
                    <td colspan="4 "><button class="bg-success text-white p-1 ">COMPRAR</button></td>
                </tr>
            </tfoot>
        </table>

    </section>

    <!-- Footer -->
    <?php include_once "partials/footer.php" ;?>

    <!-- Scripts -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js "></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js "></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js "></script>
    <script
      src="https://kit.fontawesome.com/2641c51c10.js "
      crossorigin="anonymous "
    ></script>
</body>

</html>