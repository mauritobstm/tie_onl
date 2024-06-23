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
    <link rel="stylesheet" href="style4.css">
  </head>

<body>

    <!-- Fixed navbar -->
    <section id="header" class="pt-4 pb-4">
        <a href="index.php"><img src="img/logo5.png" class="logo" alt="" width="60%"></a>
        <div>
            <ul id="navbar">
                <li><a href="index.php">Inicio</a></li>
                <li><a href="shop.php">Productos</a></li>
                <li><a class="active" href="about.php">Nosotros</a></li>
                <li><a href="contact.php">Contacto</a></li>
                <a href="#" id="close"><i class="far fa-times"></i></a>
            </ul>
        </div>
        <div id="mobile">
              <i id="bar" class="fas fa-outdent"></i>
        </div>
    </section>
    <?php
    /* Conexion */
    require 'base.php';
    /* Conexion */
      $quien_get_query = "SELECT texto FROM quienes where id='1'";
      $quien_from_db = mysqli_query($db_connect, $quien_get_query);
      $after_fetch_assoc_quien = mysqli_fetch_assoc($quien_from_db);
      $sql = $db_connect->query("SELECT * FROM imagen");
      $datos = $sql->fetch_object();
    ?>
    <section id="about-head" class="section-p1">
        <img src="data:image/jpg;base64,<?= base64_encode($datos->img)?>" alt="">
        <div>
            <h2>¿Quienes Somos?</h2>
            <p><?= nl2br($after_fetch_assoc_quien ['texto'])?></p>
                    
        </div>
    </section>
    
    <?php
    require 'footer.php';
    ?>
    <script src="script1.js"></script>

</body>

</html>