<?php
    session_start();
    $title = "Add quienes";

    /* Conexion */
    require '../../base.php';
    /* Conexion */

    $get_query = "SELECT * FROM quienes , titu";
    $from_db = mysqli_query($db_connect, $get_query);
    $sql = $db_connect->query("SELECT * FROM imagen");

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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />
    <link rel="stylesheet" href="../../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../assets/css/estilos.css">
    <link rel="stylesheet" href="../../style4.css">

    <style>
        @media (min-width: 768px){
            
        }
    </style>
</head>

<body>

    <section id="header">
        <a href=""><img src="../../img/logo5.png" class="logo" alt="" width="60%"></a>
      <div>
        <ul id="navbar">
          <li><a href="../../index.php" target="_blank">Ver Página</a></li>
          <li><a href="../peliculas/index.php">Productos</a></li>
          <li><a href="../portada/add_banner.php">Portada</a></li>
          <li><a class="active" href="../editar/edit_quien.php">Control</a></li>
          <li class="dropdown">
            <a href="#" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <?php print $_SESSION['usuario_info']['nombre_usuario'] ?> <span class="caret"></span></a>
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

    <!-- VER MENSAJES -->

<div id="feature" class="section-p1 p-3 justify-content-center">
    <div class="card bg-light mb-3 mt-3" style="width:300px;"> 
        <div class="card-header bg-primary p-1">
            <h3 class="text-center">Ver Mensajes</h3>
        </div>
        <div class="card-body">
            <table class="table table-bordered m-1">
            <tbody>
                <tr>
                    <td class="text-center">
                        <a href="ver_mensajes.php" class="btn bg-primary">Ver</a>
                    </td>
                </tr>                    
            </tbody>
            </table>
        </div>
    </div>
</div>

    <!-- EDITAR CATEGORIAS -->

<div id="feature" class="section-p1 p-3 justify-content-center">
    <div class="card bg-light mb-3 mt-3" style="width:300px;"> 
        <div class="card-header bg-success">
            <h4 class="text-white text-center">Editar Categorias</h4>
        </div>
        <div class="card-body">
                <table class="table table-bordered m-1">
                <tbody>
                    <tr>
                        <td class="text-center">
                            <a href="edit_categoria.php" class="btn bg-success text-white">Editar</a>
                        </td>
                    </tr>                    
                </tbody>
                </table>
        </div>
    </div>
</div>

    <!-- EDITAR NOSOTROS -->

<div id="feature" class="section-p1 p-3 justify-content-center">
    <div class="card bg-light mb-3 mt-3" style="max-width:700px;"> 
        <div class="card-header bg-primary">
            <h4 class="text-white">Editar Nosotros</h4>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <tbody>
                <?php 
                    $id = 1;
                    foreach($from_db as $upload):  
                ?>
                    <tr>
                        <td>TITULO
                        <div class="btn-group mt-2" role="group" aria-label="Basic example">
                                <a href="edit_titulo_post.php?id=<?= $upload['id'] ?>" class="btn bg-primary">Editar</a>
                            </div>
                        </td>
                        <td><?= $upload['titulo'] ?></td>
                    </tr>
                    <tr>
                        <td>Quienes Somos
                        <div class="btn-group mt-2" role="group" aria-label="Basic example">
                                <a href="edit_quien_post.php?id=<?= $upload['id'] ?>" class="btn bg-primary">Editar</a>
                            </div>
                        </td>
                        <td>
                            <p><?= nl2br($upload['texto']) ?></p>
                        </td>
                    </tr>
                            
                    <?php 
                        while ($datos = $sql->fetch_object()) {
                    ?>
                    <tr>
                        <td scope="row">Imagen de Perfil
                        <a href="imagen_perfil.php?id=<?= $datos->id ?>" class="btn bg-primary mt-2">Editar</a>
                        </td>
                        <td>
                            <img style="width:90px" src="data:image/jpg;base64,<?= base64_encode($datos->img) ?>" alt="">
                        </td>
                    </tr>
                    <?php
                        }
                    ?> 
                <?php
                    endforeach;
                ?>                       
                </tbody>
            </table>
        </div>
    </div>
</div>

    <!-- EDITAR CONTACTO -->
                
<?php
    $get_query4 = "SELECT * FROM quienes";
    $from_db4 = mysqli_query($db_connect, $get_query4);
?> 
<div id="feature" class="section-p1 p-3 justify-content-center">
    <div class="card bg-light mb-3 mt-3" style="width:700px;"> 
        <div class="card-header bg-primary">
            <h4 class="text-white">Editar Contacto</h4>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered">
                <tbody>
                <?php 
                    $id = 1;
                    foreach($from_db4 as $upload4):  
                ?>
                    <tr>
                        <td>Dirección
                        <div class="btn-group mt-2" role="group" aria-label="Basic example">
                                <a href="direccion_post.php?id=<?= $upload4['id'] ?>" class="btn bg-primary">Editar</a>
                            </div>
                        </td>
                        <td>
                            <p><?= nl2br($upload4['direccion']) ?></p>
                        </td>
                    </tr>
                    <tr>
                        <td>Correo
                        <div class="btn-group mt-2" role="group" aria-label="Basic example">
                                <a href="correo_post.php?id=<?= $upload4['id'] ?>" class="btn bg-primary">Editar</a>
                            </div>
                        </td>
                        <td>
                            <p><?= nl2br($upload4['correo']) ?></p>
                        </td>
                    </tr>
                    <tr>
                        <td>Telefono
                        <div class="btn-group mt-2" role="group" aria-label="Basic example">
                                <a href="telefono_post.php?id=<?= $upload4['id'] ?>" class="btn bg-primary">Editar</a>
                            </div>
                        </td>
                        <td>
                            <p><?= nl2br($upload4['telefono']) ?></p>
                        </td>
                    </tr>
                    <tr>
                        <td>Horario
                            <div class="btn-group mt-2" role="group" aria-label="Basic example">
                                <a href="horario_post.php?id=<?= $upload4['id'] ?>" class="btn bg-primary">Editar</a>
                            </div>
                        </td>
                        <td>
                            <p><?= nl2br($upload4['horario']) ?></p>
                        </td>
                    </tr>
                    
                <?php
                    endforeach;
                ?>                       
                </tbody>
                </table>
            </div>
        </div>
    </div>
</div>




    <script src="../../assets/js/jquery.min.js"></script>
    <script src="../../assets/js/bootstrap.min.js"></script>
    <script src="../../script1.js"></script>
</body>

</html>