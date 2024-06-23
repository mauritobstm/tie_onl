<?php
session_start();
require 'funciones.php';

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <?php require_once 'tituloo.php';?>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?= $after_fetch_assoc_quien1['titulo']?></title>

    <!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/estilos.css">
    <link rel="stylesheet" href="style2.css">
  </head>

  <body>

    <!-- Fixed navbar -->
    <section id="header" class="pt-4 pb-4">
      <a href="index.php"><img src="img/logo2.png" class="logo" alt="" width="60%"></a>
      <div>
        <ul id="navbar">
          <li><a href="index.php">Inicio</a></li>
          <li><a href="shop.php">Productos</a></li>
          <li><a href="about.php">Nosotros</a></li>
          <li><a href="contact.php">Contacto</a></li>
          <li id="lg-bag"><a class="active" href="carrito.php"><i class="fal fa-shopping-cart cart"></i><span class="badge"><?php print cantidadPeliculas(); ?></span></a></li>
          <a href="#" id="close"><i class="far fa-times"></i></a>
        </ul>
      </div>
      <div id="mobile">
        <a href="carrito.php"><span class="badge"><?php print cantidadPeliculas(); ?></span></a><a href="carrito.php"><i class="fal fa-shopping-cart cart p-0"></i></a>
        <i id="bar" class="fas fa-outdent"></i>
      </div>
    </section>

    <div class="container" id="main">
      <div class="main-form">
        <div class="row">
          <div class="col-md-12">
            <fieldset>
              <legend>Completar Datos</legend>
              <form action="completar_pedido.php" method="post">
                <div class="form-group">
                  <label>Nombre</label>
                  <input type="text" class="form-control" name="nombre" required>
                </div>

                <div class="form-group">
                  <label>Apellidos</label>
                  <input type="text" class="form-control" name="apellidos" required>
                </div>

                <div class="form-group">
                  <label>Correo</label>
                  <input type="email" class="form-control" name="email" required>
                </div>

                <div class="form-group">
                  <label>Teléfono</label>
                  <input type="text" class="form-control" name="telefono" required>
                </div>

                <div class="form-group">
                  <label>Comentario</label>
                  <textarea name="comentario" class="form-control"  rows="4"></textarea>
                </div>

                <button type="submit" style="margin-bottom:40px;" class="btn btn-success btn-block">Enviar</button>
              </form>
            </fieldset>
          </div>
        </div>
      </div>
    </div> <!-- /container -->

    <!-- ================================================== -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="script1.js"></script>

  </body>
</html>
