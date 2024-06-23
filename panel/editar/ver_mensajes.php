<?php
session_start();
/* Conexion */
require '../../base.php';
/* Conexion */

// Verificar la conexión
if (!$db_connect) {
    die("Error de conexión: " . mysqli_connect_error());
}

// Obtener los datos de la base de datos
$sqql = "SELECT * FROM mensajes ORDER BY id DESC";
$resultt = mysqli_query($db_connect, $sqql);

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
        @media (max-width: 768px) {
            .message-column {
                width: 100%;
                max-width: 100%;
                font-size: 13px;
            }
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

    <div class="container mt-5">
        <h1>Mensajes Recibidos</h1>
        <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Correo</th>
                    <th>Teléfono</th>
                    <th>Mensaje</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($roww = mysqli_fetch_assoc($resultt)): ?>
                    <tr>
                        <td><?php echo $roww['id']; ?></td>
                        <td><?php echo $roww['nombree']; ?></td>
                        <td class="message-column"><?php echo $roww['correoo']; ?></td>
                        <td><?php echo $roww['telefonoo']; ?></td>
                        <td class="message-column text-wrap"><?php echo $roww['mensajee']; ?></td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
        </div>
    </div>
</div>
</body>