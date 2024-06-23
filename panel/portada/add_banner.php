<?php
    session_start();

    if(!isset($_SESSION['usuario_info']) OR empty($_SESSION['usuario_info']))
    header('Location: ../index.php');

    /* Conexion */
    require '../../base.php';
    /* Conexion */

    $get_query = "SELECT * FROM banners";
    $from_db = mysqli_query($db_connect, $get_query);

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
          <li><a class="active" href="../portada/add_banner.php">Portada</a></li>
          <li><a href="../editar/edit_quien.php">Control</a></li>
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
<!-- agregar 
<div id="feature" class="section-p1 justify-content-center">
        <div class="ml-5 mr-5">
            <div class="card mb-3 mt-3">
                <div class="card-header bg-success">
                    <h4 class="text-white">Agregar Portada</h4>
                </div>
                <div class="card-body">
                    <form action="add_banner_post.php" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label>Título</label>
                            <input type="text"  name="banner_title" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Subtítulo</label>
                            <input type="text"  name="banner_subtitle" class="form-control">
                        </div>
                        <div class="form-group">

                                <div class="col-md-6">
                                <div class="form-group">
                                    <label>Imagen</label>
                                    <input name="banner_image" id="tenant_photo" type="file" class="form-control" accept="image/x-png, image/jpeg" onchange="readURL(this);">
                                    <img class="hidden" id="tenant_photo_viewer" src="#" alt="image" />
                                    <script>
                                    function readURL(input) {
                                    if (input.files && input.files[0]) {
                                        var reader = new FileReader();
                                        reader.onload = function (e) {
                                        $('#tenant_photo_viewer').attr('src', e.target.result).width(150).height(195);
                                        };
                                        $('#tenant_photo_viewer').removeClass('hidden');
                                        reader.readAsDataURL(input.files[0]);
                                    }
                                    }
                                    </script>
                                </div>
                                </div>

                                <?php
                                    if(isset($_SESSION['err_file']))
                                    {
                                ?>
                                <span class=text-danger>
                                    <?php
                                        echo $_SESSION['err_file'];
                                        unset($_SESSION['err_file']);
                                    ?>
                                </span>
                                <?php
                                    }
                                ?>

                        </div>
                        <br>
                        <button type="submit" class="btn btn-success mt-2">Agregár</button>
                    </form>
                </div>
            </div>
        </div>
</div>
-->


<!--<div class="container">-->
    <div id="feature" class="section-p1 p-3">
        <div class="col-12 mt-1 d-flex align-items-center justify-content-center">
            <div class="card bg-light mb-3 mt-3" style="max-width:1000px;">
                <div class="card-header bg-primary text-white">
                    <h4 class="text-white">Portada</h4>
                </div>
                <div class="card-body table-responsive">
                    <?php

// Verificar si la conexión a la base de datos fue exitosa
if ($db_connect) {
    // Consulta para obtener los banners
    $sql = "SELECT id, banner_titulo, banner_subtitulo, foto_location FROM banner";
    $result = mysqli_query($db_connect, $sql);

    // Verificar si se encontraron banners
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            ?>
            <div style="display:block;">
                <label>Título</label>
                <h4 class="mt-1"><?php echo $row['banner_titulo']; ?></h4>
                <label class="mt-3">Subtítulo</label>
                <p class="mt-1"><?php echo $row['banner_subtitulo']; ?></p>
                <img style="max-width:300px; max-heigth:300px;" src="data:image/jpeg;base64,<?php echo base64_encode($row['foto_location']); ?>" alt="Banner Image">
                <!-- Botón de edición -->
                <div>
                    <a href="editar_banner.php?id=<?php echo $row['id']; ?>"><button class="normal bg-success text-white m-2">Editar</button></a>
                </div>
            </div>
            <?php
        }
    } else {
        echo "No se encontraron banners.";
    }

    // Cerrar la conexión a la base de datos
    
} else {
   
}
?>
                </div>
            </div>
        </div>
    </div>
    
<!--</div>
   jQuery first, then Popper.js, then Bootstrap JS -->
    
    <script src="../../assets/js/jquery.min.js"></script>
    <script src="../../assets/js/bootstrap.min.js"></script>
    <script src="../../script1.js"></script>
   </body>

</html>