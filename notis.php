<?php

require 'base.php';

// Insertar
// Verifica si el formulario ha sido enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require 'base.php';

    // Comprobar la conexión
    if (!$db_connect) {
        die("La conexión falló: " . mysqli_connect_error());
    }

    // Recuperar el correo electrónico del formulario
    $correo = $_POST['mailss'];

    // Preparar la consulta SQL
    $query = $db_connect->prepare("INSERT INTO correos (mails) VALUES (?)");
    $query->bind_param("s", $correo); // "s" significa que el parámetro es una cadena (string)

    // Ejecutar la consulta
    if ($query->execute()) {
        echo "<div class='bg-success text-white text-center p-1'>Correo enviado con éxito.</div>";
    } else {
        echo "Error: " . $query->error;
    }

    // Cerrar la conexión
    
}
?>

<section id="newsletter" class="section-p1 section-m1 mt-2 mb-2">
    <div class="newstext">
        <h4>Regístrese aquí y</h4>
        <p>Obtenga actualizaciones por correo sobre nuestra última y <span>ofertas especiales.</span></p>
    </div>
    <form class="form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <input type="email" id="mailss" name="mailss" required placeholder="Correo Electrónico">
        <button type="submit" class="normal">Registrarse</button>
    </form>
</section>
