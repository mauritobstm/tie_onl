<?php
session_start();
$title = "quienes edit";

/* Conexion */
require '../../base.php';
/* Conexion */

// Eliminar una categoría
if (isset($_GET['eliminar'])) {
    $id = $_GET['eliminar'];
    $sql = "DELETE FROM categorias WHERE id = ?";
    $stmt = $db_connect->prepare($sql);
    $stmt->bind_param("i", $id);
    if ($stmt->execute()) {
        
    } else {
        echo "<p>Error al eliminar la categoría.</p>";
    }
    $stmt->close();
}

// Mostrar categorías
$sql = "SELECT id, nombre FROM categorias";
$resultado = $db_connect->query($sql);


// Insertar
if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST['nombreCategoria'])) {
    
    if ($db_connect->connect_error) {
        die("Conexión fallida: " . $db_connect->connect_error);
    }

    $nombreCategoria = $db_connect->real_escape_string($_POST['nombreCategoria']);
    $sql = "INSERT INTO categorias (nombre) VALUES (?)";

    if ($stmt = $db_connect->prepare($sql)) {
        $stmt->bind_param("s", $nombreCategoria);

        if ($stmt->execute()) {
            // Cerrar la sentencia y la conexión antes de redirigir
            $stmt->close();
            $db_connect->close();

            // Redirigir a la misma página con un parámetro de éxito
            header("Location: " . $_SERVER['PHP_SELF'] . "?success=1");
            exit();
        } else {
            $stmt->close();
            $db_connect->close();
            // Redirigir a la misma página con un parámetro de error
            header("Location: " . $_SERVER['PHP_SELF'] . "?error=1");
            exit();
        }
    } else {
        $db_connect->close();
        // Manejar el error de preparación aquí
    }
}

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
        <div class="card bg-light p-3">
            <h2>Categorías</h2>
            <ul>
                <?php if ($resultado->num_rows > 0) {
                    while ($categoria = $resultado->fetch_assoc()) { ?>
                        <li>
                            <a class="btn btn-danger p-1 mt-1" href="?eliminar=<?php echo $categoria['id']; ?>" onclick="return confirm('¿Estás seguro de querer eliminar esta categoría?');">Eliminar</a>

                            <?php echo htmlspecialchars($categoria['nombre']); ?>
                        </li>
                    <?php }
                } else {
                    echo "<li>No hay categorías disponibles.</li>";
                } ?>
            </ul>

            <h2>Agregar Nueva Categoría</h2>
            <form action="" method="post" class="text-center">
                <label for="nombreCategoria">Nombre de la categoría:</label>
                <input class="form-control" type="text" id="nombreCategoria" name="nombreCategoria" required>
                <input type="submit" value="Agregár" class="btn btn-success mt-3">
            </form>
        </div>
    </div>
</div>

    <script src="../../assets/js/jquery.min.js"></script>
    <script src="../../assets/js/bootstrap.min.js"></script>
    <script src="../../script1.js"></script>
</body>

</html>