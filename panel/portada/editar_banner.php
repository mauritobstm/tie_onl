<?php
session_start();

    if(!isset($_SESSION['usuario_info']) OR empty($_SESSION['usuario_info']))
    header('Location: ../index.php');

if (isset($_GET['id'])) {
    $banner_id = $_GET['id'];

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

<div id="feature" class="section-p1 justify-content-center">
        <div class="ml-5 mr-5">
            <div class="card mb-3 mt-3">
                <div class="card-header bg-primary">
                    <h4 class="text-white">Editar Portada</h4>
                </div>
                <div class="card-body">
    <?php
        if ($db_connect) {
            // Consulta para obtener los datos del banner específico
            $sql = "SELECT banner_titulo, banner_subtitulo, foto_location, titulo_color, subtitulo_color FROM banner WHERE id = $banner_id";
            $result = mysqli_query($db_connect, $sql);
    
            if ($row = mysqli_fetch_assoc($result)) {
                $titulo_color = $row['titulo_color'];
                $subtitulo_color = $row['subtitulo_color'];
                ?>
                
                <form action="actualizar_banner.php" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="banner_id" value="<?php echo $banner_id; ?>">
                    <div class="form-group">
                        <label>Título</label>
                        <input type="text" name="banner_title" class="form-control" value="<?php echo $row['banner_titulo']; ?>">
                        <input type="color" name="banner_title_color" value="<?php echo $row['titulo_color']; ?>">
                    </div>
                    <div class="form-group">
                        <label>Subtítulo</label>
                        <textarea name="banner_subtitle" class="form-control"><?php echo htmlspecialchars($row['banner_subtitulo']); ?></textarea>
                        <input type="color" name="banner_subtitle_color" value="<?php echo $row['subtitulo_color']; ?>">
                    </div>
                    <div class="form-group">
                        <label>Imagen Actual</label><br>
                        <img src="data:image/jpeg;base64,<?php echo base64_encode($row['foto_location']); ?>" alt="Banner Image" style="max-width: 100px;">
                        <input type="file" name="banner_image" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-success">Guardar</button>
                </form>
                
                <?php
            } else {
                echo "No se encontró el banner.";
            }
            
        } 
    }
    ?>
</div>
            </div>
        </div>
</div>



</section>    

    <script src="../../assets/js/jquery.min.js"></script>
    <script src="../../assets/js/bootstrap.min.js"></script>
    <script src="../../script1.js"></script>
</body>

</html>