<?php
//ACTIVAR LAS SESSIONES EN PHP
session_start();
require 'funciones.php';

if(isset($_GET['id']) && is_numeric($_GET['id'])){
    $id = $_GET['id'];
    require 'vendor/autoload.php';
    $pelicula = new Kawschool\Pelicula;
    $resultado = $pelicula->mostrarPorId($id);
    
    if(!$resultado)
       header('Location: index.php');

    if(isset($_SESSION['carrito'])){ //SI EL CARRITO EXISTE
        //SI EL PELICULA EXISTE EN EL CARRITO
        if(array_key_exists($id,$_SESSION['carrito'])){
            actualizarPelicula($id);
        }else{
            //  SI EL CARRITO NO EXISTE EN EL CARRITO
            agregarPelicula($resultado, $id);
        }
    }else{
        //  SI EL CARRITO NO EXISTE
        agregarPelicula($resultado, $id);
    }
}
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
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/estilos.css">
    <link rel="stylesheet" href="style2.css">
</head>

  <body>

    <!-- Fixed navbar -->
    <section id="header" style="padding-top:15px; padding-bottom:15px;">
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
            <a href="carrito.php"><span class="badge"><?php print cantidadPeliculas(); ?></span></a><a href="carrito.php"><i class="fal fa-shopping-cart cart" style="padding:0;"></i></a>
              <i id="bar" class="fas fa-outdent"></i>
        </div>
    </section>

    <div class="container" id="main">
            <table class="table table-bordered table-hover">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Producto</th>
                      <th>Foto</th>
                      <th>Precio</th>
                      <th>Cantidad</th>
                      <th>Total</th>
                    </tr>
                  </thead>
                  <tbody>
                      <?php
                        if(isset($_SESSION['carrito']) && !empty($_SESSION['carrito'])){
                            $c=0;
                            foreach($_SESSION['carrito'] as $indice => $value){
                                $c++;
                                $total = $value['precio'] * $value['cantidad'];
                      ?>
                        <tr>
                            <form action="actualizar_carrito.php" method="post">
                                <td><?php print $c ?><a href="eliminar_carrito.php?id=<?php print $value['id']  ?>" class="btn btn-danger btn-xs">
                                        <span class="glyphicon glyphicon-trash"></span> 
                                    </a></td>
                                <td><?php print $value['titulo']  ?></td>
                                <td>
                                    <?php
                                        $foto = 'upload/'.$value['foto'];
                                        if(file_exists($foto)){
                                        ?>
                                        <img src="<?php print $foto; ?>" width="35">
                                    <?php }else{?>
                                        <img src="assets/imagenes/not-found.jpg" width="35">
                                    <?php }?>
                                </td>
                                <td><?php print $value['precio']  ?> ARS</td>
                                <td>
                                <input type="hidden" name="id"  value="<?php print $value['id'] ?>">
                                    <input type="text" name="cantidad" class="form-control u-size-100" value="<?php print $value['cantidad'] ?>">
                                    <button type="submit" class="btn btn-success btn-xs">
                                        <span class="glyphicon glyphicon-refresh"></span> 
                                    </button>
                                </td>
                                <td>
                                    <?php print $total  ?> ARS
                                </td>
                            </form>
                        </tr>

                    <?php
                        }
                        }else{
                    ?>
                        <tr>
                            <td colspan="7">NO HAY PRODUCTOS EN EL CARRITO</td>

                        </tr>
                    <?php
                        }
                    ?>
                </tbody>
                <tfoot>
                        <tr>
                        
                            <td colspan="5" class="text-right">Total</td>
                            <td><?php print calcularTotal(); ?> ARS</td>
                        </tr>

                </tfoot>
            </table>
            <hr>
            <?php
                if(isset($_SESSION['carrito']) && !empty($_SESSION['carrito'])){
            ?>  
            <div class="row">
                    <div class="pull-left">
                        <a href="shop.php" class="btn btn-info">Seguir Comprando</a>
                    </div>
                    <div class="pull-right">
                        <a href="finalizar.php" class="btn btn-success">Finalizar Compra</a>
                    </div>
            </div>

            <?php
                }
            ?>

    </div> <!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="script1.js"></script>

  </body>
</html>
