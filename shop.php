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
        <li><a class="active" href="shop.php">Productos</a></li>
        <li><a href="about.php">Nosotros</a></li>
        <li><a href="contact.php">Contacto</a></li>
        <a href="#" id="close"><i class="far fa-times"></i></a>
      </ul>
    </div>
    <div id="mobile">
      <i id="bar" class="fas fa-outdent"></i>
    </div>
  </section>

  <section id="product1" class="section-p1">
    <h2>Productos</h2>

    <?php
    require 'vendor/autoload.php';
    $pelicula = new Kawschool\Pelicula;
    $info_peliculas = $pelicula->mostrar();
    $cantidad = count($info_peliculas);

    // Obtener las categorías disponibles
    $categorias = array();
    foreach ($info_peliculas as $item) {
        $categorias[] = $item['nombre'];
    }
    $categorias = array_unique($categorias);
    sort($categorias);
    ?>

    <div>
      <label for="categoria">Filtrar:</label>
      <select id="categoria" name="categoria" onchange="filtrarProductos(this.value)">
        <option value="todas">Todo</option>
        <?php foreach ($categorias as $categoria) { ?>
          <option value="<?php echo $categoria; ?>"><?php echo $categoria; ?></option>
        <?php } ?>
      </select>
    </div>

    <div class="pro-container justify-content-center" id="productos-container">
        <?php if ($cantidad > 0) {
            foreach ($info_peliculas as $item) { ?>
                <div class="pro m-3 <?php echo $item['nombre']; ?>"  style="height: 310px;">
                    <?php
                    $foto = 'upload/' . $item['foto'];
                    if (file_exists($foto)) { ?>
                        <img src="<?php echo $foto; ?>" class="img-responsive" style="height: 63%; object-fit: cover;">
                    <?php } else { ?>
                        <img src="assets/imagenes/not-found.jpg" class="img-responsive" style="height: 73%; object-fit: cover;">
                    <?php } ?>
                    <div class="des">
                        <h5><?php echo $item['titulo']; ?></h5>
                        <h4><?php echo $item['precio']; ?></h4>
                    </div>
                </div>
            <?php }
        } else { ?>
            <h4>NO HAY REGISTROS</h4>
        <?php } ?>
    </div>
  </section>

<script>
  function filtrarProductos(categoria) {
    var productos = document.querySelectorAll('.pro');
    productos.forEach(function(producto) {
      if (categoria === 'todas' || producto.classList.contains(categoria)) {
        producto.style.display = 'block';
      } else {
        producto.style.display = 'none';
      }
    });
  }
</script>
  
  <?php
  require 'footer.php';
  ?>

<script src="script1.js"></script>


</body>