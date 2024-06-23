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
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/estilos.css">
    <link rel="stylesheet" href="style2.css">
  </head>

  <body>

    <!-- Fixed navbar -->
    <section id="header">
        <a href="index.php"><img src="img/logo2.png" class="logo" alt="" width="60%"></a>
        <div>
            <ul id="navbar">
                <a href="#" id="close"><i class="far fa-times"></i></a>
            </ul>
        </div>
        <div id="mobile">
              <i id="bar" class="fas fa-outdent"></i>
        </div>
    </section>

    <div class="container" id="main">
        <div class="row">
            <div class="jumbotron">
                <p>Nos contactaremos con usted</p>
                <p>Gracias por su compra :)</p>
                <p>
                    <a href="index.php">Regresar</a>
                </p>
            </div>



        </div>
      

    </div> <!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="script1.js"></script>

  </body>
</html>
