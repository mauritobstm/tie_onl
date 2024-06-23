<?php
session_start();
require 'funciones.php';

// Definir variables para los mensajes
$mensaje_exito = $mensaje_error = "";

// Verificar si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    /* Conexion */
    require 'base.php';
    /* Conexion */
    
    // Verificar la conexión
    if (!$db_connect) {
        die("Error de conexión: " . mysqli_connect_error());
    }
    
    // Obtener los datos del formulario
    $nombree = $_POST['nombree'];
    $correoo = $_POST['correoo'];
    $telefonoo = $_POST['telefonoo'];
    $mensajee = $_POST['mensajee'];
    
    // Preparar la consulta SQL
    $ssql = "INSERT INTO mensajes (nombree, correoo, telefonoo, mensajee) VALUES (?, ?, ?, ?)";
    
    // Preparar la declaración
    $stmt = mysqli_prepare($db_connect, $ssql);
    
    // Vincular los parámetros
    mysqli_stmt_bind_param($stmt, "ssss", $nombree, $correoo, $telefonoo, $mensajee);
    
    // Ejecutar la consulta
    mysqli_stmt_execute($stmt);
    
    // Verificar si se insertaron los datos correctamente
    if (mysqli_stmt_affected_rows($stmt) > 0) {
        $mensaje_exito = "Mensaje enviado correctamente.";
    } else {
        $mensaje_error = "Error al enviar el mensaje.";
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/estilos.css">
    <link rel="stylesheet" href="style4.css">
</head>

<body>

    <section id="header" class="pt-4 pb-4">
        <a href="index.php"><img src="img/logo5.png" class="logo" alt="" width="60%"></a>
        <div>
            <ul id="navbar">
                <li><a href="index.php">Inicio</a></li>
                <li><a href="shop.php">Productos</a></li>
                <li><a href="about.php">Nosotros</a></li>
                <li><a class="active" href="contact.php">Contacto</a></li>
                <a href="#" id="close"><i class="far fa-times"></i></a>
            </ul>
        </div>
        <div id="mobile">
              <i id="bar" class="fas fa-outdent"></i>
        </div>
    </section>
    
<?php
    $get_query4 = "SELECT * FROM quienes";
    $from_db4 = mysqli_query($db_connect, $get_query4);
?>
    <section id="contact-details" class="section-p1">
        <div class="details">
            <h2>CONTACTO</h2>
            <h3>Visita nuestra agencia o contactate todos los dias</h3>
            <div>
            <?php 
                $id = 1;
                foreach($from_db4 as $upload4):  
            ?>
                <li>
                    <i class="fal fa-map"></i>
                    <p><?= nl2br($upload4['direccion']) ?></p>
                </li>
                <li>
                    <i class="far fa-envelope"></i>
                    <p><?= nl2br($upload4['correo']) ?></p>
                </li>
                <li>
                    <i class="fas fa-phone-alt"></i> 
                    <p><?= nl2br($upload4['telefono']) ?></p>
                </li>
                <li>
                    <i class="far fa-clock"></i>
                    <p><?= nl2br($upload4['horario']) ?></p>
                </li>
            <?php
                endforeach;
            ?> 
            </div>
        </div>

        <div class="map">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2322.132855257673!2d-58.38400388378046!3d-34.604369428778504!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4aa9f0a6da5edb%3A0x11bead4e234e558b!2sObelisco!5e0!3m2!1ses-419!2sar!4v1710190536836!5m2!1ses-419!2sar" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </section>

    <section id="form-details" class="justify-content-center">
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" style="width: 100%;">
            <span><h2>ENVIANOS UN MENSAJE</h2></span>

            <!-- Mostrar mensajes de éxito o error -->
            <?php if (!empty($mensaje_exito)): ?>
                <div style="background-color: green; padding: 5px; color: white;"><?php echo $mensaje_exito; ?></div>
            <?php endif; ?>
            <?php if (!empty($mensaje_error)): ?>
                <div style="background-color: red; padding: 5px; color: white;"><?php echo $mensaje_error; ?></div>
            <?php endif; ?>

            <input type="text" name="nombree" placeholder="Nombre Completo" required>
            <input type="email" name="correoo" placeholder="Correo" required>
            <input type="text" name="telefonoo" placeholder="Teléfono" required>
            <textarea name="mensajee" cols="30" rows="10" placeholder="Mensaje" required></textarea>
            <button type="submit" class="normal">Enviar</button>
        </form>

    </section>
    
    <?php
    require 'footer.php';
    ?>
    <script src="script1.js"></script>

</body>

</html>