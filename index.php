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
        <li><a class="active" href="index.php">Inicio</a></li>
        <li><a href="shop.php">Productos</a></li>
        <li><a href="about.php">Nosotros</a></li>
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

// Verificar si la conexión a la base de datos fue exitosa
if ($db_connect) {
    // Consulta para obtener un solo banner (puedes modificarla según tus necesidades)
    $sql = "SELECT banner_titulo, banner_subtitulo, foto_location, titulo_color, subtitulo_color FROM banner LIMIT 1";
    $result = mysqli_query($db_connect, $sql);

    // Verificar si se encontró un banner
    if (mysqli_num_rows($result) > 0) {
        // Obtener los datos del banner
        $banner_data = mysqli_fetch_assoc($result);
        $banner_title = $banner_data['banner_titulo'];
        $banner_subtitle = $banner_data['banner_subtitulo'];
        $banner_image_data = $banner_data['foto_location'];
        $titulo_color = $banner_data['titulo_color'];
        $subtitulo_color = $banner_data['subtitulo_color'];

        // Integrar los datos en el HTML
        ?>
        <section id="hero" style="background: url(data:image/jpeg;base64,<?php echo base64_encode($banner_image_data); ?>); 
            height: 90vh;
            width: 100%;
            background-size: cover;
            background-position: top 25% right 37%; 
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            justify-content: center;">
              <h1 style='color: <?=$titulo_color?>;'><?= $banner_title ?></h1>
              <p  style='color: <?=$subtitulo_color?>;'><?= $banner_subtitle ?></p>
            <a href="#product1"><button>Ver Ahora</button></a>
        </section>
        <?php
    } else {
        echo "No se encontraron banners.";
    }

    // Cerrar la conexión a la base de datos
    
} 
?>

  <section id="product1" class="section-p1">
      <h2>Productos</h2>
      <div class="pro-container justify-content-center">

        <?php
        require 'vendor/autoload.php';
        $pelicula = new Kawschool\Pelicula;
        $info_peliculas = $pelicula->mostrar();
        $cantidad = count($info_peliculas);
        $maxPorPagina = 8; // Máximo número de productos a mostrar antes del botón "Ver más"

        if($cantidad > 0){
          for($x = 0; $x < $cantidad; $x++){
            if ($x == $maxPorPagina) {
              // Después de mostrar 6 productos, height:410px : 72%;
              break;
            }
            $item = $info_peliculas[$x];
        ?>
        <div class="pro m-3" style="height: 310px;">
          <?php
            $foto = 'upload/'.$item['foto'];
            if(file_exists($foto)){
          ?>
          <img src="<?php print $foto; ?>" class="img-responsive" style="height: 63%; object-fit: cover; ">

          <?php }else{?>
            <img src="assets/imagenes/not-found.jpg" class="img-responsive">
          <?php }?>
          <div class="des">
            <h5><?php print $item['titulo'] ?></h5>
            <h4><?php print $item['precio'] ?></h4>  
          </div>
        </div>
        <?php
            }
        }else{?>
        <h4>NO HAY REGISTROS</h4>
        <?php 
        }
        ?>

      </div>

        <?php if($cantidad > $maxPorPagina) { ?>
        <!-- Botón para "Ver más" aparecerá si hay más de 6 productos -->
        <div class="ver-mas">
            <button class="normal" 
                    style="background-color: #088178; color: #fff; padding: 12px 20px;"
                    onclick="location.href='shop.php';">Ver más
            </button>
        </div>
        <?php } ?>
  </section>
  
  <?php
  require 'footer.php';
  ?>

  <script src="assets/js/jquery.min.js"></script>
  <script src="assets/js/bootstrap.min.js"></script>
  <script src="script1.js"></script>


</body>
</html>
