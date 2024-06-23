<?php
session_start();

if(!isset($_SESSION['usuario_info']) OR empty($_SESSION['usuario_info']))
  header('Location: ../index.php');

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
    <link rel="stylesheet" href="../../style2.css">
  </head>

  <body>
    
    <section id="header">
      <a href=""><img src="../../img/logo2.png" class="logo" alt="" width="60%"></a>
      <div>
        <ul id="navbar">
          <li><a href="../../index.php" target="_blank">Ver Página</a></li>
          <li><a class="active" href="index.php">Pedidos</a></li>
          <li><a href="../peliculas/index.php">Productos</a></li>
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

    <div class="container" id="main">
    <div class="row">
          <div class="col-md-12">
             <fieldset>
              <legend>Listado de Pedidos</legend>
              <div class="table-responsive">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Cliente</th>
                      <th>N° Pedido</th>
                      <th>Total</th>
                      <th>Fecha</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody> 
                    <?php
                      require '../../vendor/autoload.php';
                      $pedido = new Kawschool\Pedido;
                      $info_pedido = $pedido->mostrar();

                    
                      $cantidad = count($info_pedido);
                      if($cantidad > 0){
                        $c=0;
                      for($x =0; $x < $cantidad; $x++){
                        $c++;
                        $item = $info_pedido[$x];
                    ?>


                    <tr>
                      <td><?php print $c?></td>
                      <td><?php print $item['nombre'].' '.$item['apellidos']?></td>
                      <td><?php print $item['id']?></td>
                      <td><?php print $item['total']?> ARS</td>
                      <td><?php print $item['fecha']?></td>
                       
                      <td class="text-center">
                        <a href="ver.php?id=<?php print $item['id'] ?>" class="btn btn-danger btn-sm"><span
                         class="glyphicon glyphicon-eye-open"></span></a>
                        
                      </td>
                    
                    </tr>

                    <?php
                      }
                    }else{

                    ?>
                    <tr>
                      <td colspan="6">NO HAY REGISTROS</td>
                    </tr>

                    <?php }?>
                  
                  
                  </tbody>

                </table>
              </div>  
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
