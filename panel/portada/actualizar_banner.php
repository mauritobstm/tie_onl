<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['banner_id'])) {
    $banner_id = $_POST['banner_id'];
    $banner_title = $_POST['banner_title'];
    $banner_subtitle = $_POST['banner_subtitle'];
    $banner_title_color = $_POST['banner_title_color']; // Nuevo campo para el color del título
    $banner_subtitle_color = $_POST['banner_subtitle_color'];

        /* Conexion */
    require '../../base.php';
    /* Conexion */

    // Preparar y bindear (si es necesario, para prevenir inyección SQL)
    // Asumiendo que solo se actualizará la imagen si se selecciona una nueva
    if (!empty($_FILES['banner_image']['tmp_name'])) {
        $banner_image_data = addslashes(file_get_contents($_FILES['banner_image']['tmp_name']));
        $sql = "UPDATE banner SET banner_titulo = '$banner_title', banner_subtitulo = '$banner_subtitle', foto_location = '$banner_image_data' WHERE id = $banner_id";
    } else {
            $sql = "UPDATE banner SET banner_titulo = '$banner_title', banner_subtitulo = '$banner_subtitle', titulo_color = '$banner_title_color', subtitulo_color = '$banner_subtitle_color' WHERE id = $banner_id";

    }

    if (mysqli_query($db_connect, $sql)) {
        header("Location: add_banner.php");
            exit();
    } else {
        echo "Error al actualizar el banner.";
    }

    
    // Redirigir a la página principal o donde se muestran los banners
} else {
    echo "Operación no permitida.";
}


?>
