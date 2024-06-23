<?php
session_start();

if(!isset($_SESSION['usuario_info']) OR empty($_SESSION['usuario_info']))
  header('Location: ../index.php');

/* Conexion */
require '../../base.php';
/* Conexion */
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin</title>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />
    <link rel="stylesheet" href="../../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../assets/css/estilos.css">
    <link rel="stylesheet" href="../../style4.css">
  </head>

  <body>

    <!-- Fixed navbar -->
    <section id="header">
      <a href=""><img src="../../img/logo5.png" class="logo" alt="" width="60%"></a>
      <div>
        <ul id="navbar">
          <li><a href="../../index.php" target="_blank">Ver Página</a></li>
          <li><a class="active" href="index.php">Productos</a></li>
          <li><a href="../portada/add_banner.php">Portada</a></li>
          <li><a href="../editar/edit_quien.php">Control</a></li>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <?php print $_SESSION['usuario_info']['nombre_usuario'] ?> <span class="caret"></span></a>
            <ul class="dropdown-menu">
                <li><a href="../cerrar_session.php">Salir</a></li>
            </ul>
          </li>
          <a href="#" id="close"><i class="far fa-times"></i></a>
          </ul>
      </div>
      <div id="mobile">
        <i id="bar" class="fas fa-outdent"></i>
      </div>
    </section>

    <div class="container" id="main" >
      <div class="row">
        <div class="col-md-12">
          <fieldset>
            <legend>Datos del Productos</legend>
            <form method="POST" action="../acciones.php" enctype="multipart/form-data" >
              <div class="row">
                  <div class="col-md-6">
                      <div class="form-group">
                          <label>Titulo</label>
                          <input type="text" class="form-control" name="titulo" required>
                      </div>
                  </div>
              </div>
              <div class="row">
                  <div class="col-md-12">
                      <div class="form-group">
                          <label>Descripción</label>
                          <textarea class="form-control" name="descripcion" id="" cols="3" required></textarea>
                      </div>
                  </div>
              </div> 
              <div class="row">
                  <div class="col-md-4">
                      <div class="form-group">
                          <label>Categorias</label>
                          <select class="form-control" name="categoria_id" required>
                            <option value="">--SELECCIONE--</option>
                            <?php
                             require '../../vendor/autoload.php';
                              $categoria = new Kawschool\Categoria;
                              $info_categoria = $categoria->mostrar();
                              $cantidad = count($info_categoria);
                                for($x =0; $x< $cantidad;$x++){
                                  $item = $info_categoria[$x];
                              ?>
                                <option value="<?php print $item['id'] ?>"><?php print $item['nombre'] ?></option>
                              <?php

                                }
                              ?>
                            
                          </select>
                      </div>
                  </div>
              </div>
              <div class="row">
                  <div class="col-md-12">
                      <div class="form-group">
                          <label>Foto</label>
                          <input type="file" class="form-control" name="foto" required>
                      </div>
                  </div>
              </div>
              <div class="row">
                  <div class="col-md-3">
                      <div class="form-group">
                          <label>Precio</label>
                          <input type="text" class="form-control" name="precio" placeholder="0.00" required>
                      </div>
                  </div>
              </div>
              <input type="submit" name="accion" class="btn btn-primary" value="Registrar">
              <a href="index.php" class="btn btn-default">Cancelar</a>
            </form>
          </fieldset>
        
        </div>
      </div>

    </div> <!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="../../assets/js/jquery.min.js"></script>
    <script src="../../assets/js/bootstrap.min.js"></script>
    <script src="../../script1.js"></script>

  </body>
</html>
