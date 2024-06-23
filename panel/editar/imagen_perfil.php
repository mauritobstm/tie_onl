<?php
    session_start();
    $title = "Banner edit";

    /* Conexion */
    require '../../base.php';
    /* Conexion */
    require_once 'imagen_perfil_dos.php';
    $sql = $db_connect->query("SELECT * FROM imagen");
    $datos = $sql->fetch_object();
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


    <div id="feature" class="section-p1 p-3 justify-content-center">
        <div class="bg-light mb-3 mt-3">
            <nav aria-label="breadcrumb">
            </nav>
            <div class="card bg-light mb-3 mt-3">
                <div class="card-header bg-primary text-white text-center">
                    <h4 class="text-white">Editar Foto de Perfil</h4>
                </div>
                <div class="text-center mt-3">
                    <img style="width: 120px;" src="data:image/jpg;base64,<?= base64_encode($datos->img); ?>" alt="Imagen del ID">
                </div>
                    <form action="" enctype="multipart/form-data" method="POST" class="text-center">
                        <div class="d-flex justify-content-center mt-2 w-100">
                            <input type="file" name="txtimg" class="form-control w-75">
                        </div>
                        <input type="hidden" name="txtid" class="form-control" value="<?= $datos->id ?>">
                        <button class="w-25 btn btn-success mt-2 mb-2" name="btnmodificar" value="ok" type="submit">Guardar</button>
                    </form>
            </div>
        </div>
    </div>

    <script src="../../assets/js/jquery.min.js"></script>
    <script src="../../assets/js/bootstrap.min.js"></script>
    <script src="../../script1.js"></script>
</body>

</html>