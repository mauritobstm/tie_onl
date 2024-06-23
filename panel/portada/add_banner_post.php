<?php
session_start();
ini_set('upload_max_filesize', '10M');
ini_set('post_max_size', '10M');
ini_set('max_execution_time', 120);

/* Conexion */
require '../../base.php';
/* Conexion */

$banner_title = $_POST['banner_title'];
$banner_subtitle = $_POST['banner_subtitle'];

$uploded_file_original_name = $_FILES['banner_image']['name'];
$after_explode = explode('.' , $uploded_file_original_name);
$original_extension = end($after_explode);
$excepted_extensions = array('jpg', 'jpeg', 'png', 'JPG', 'JPEG', 'PNG');

if(in_array($original_extension, $excepted_extensions))
{
    if($_FILES['banner_image']['size'] <= 2000000)
    {
        // -------------------------
        $insert_query = "INSERT INTO banners(banner_title, banner_subtitle, photo_location) VALUES('$banner_title' , '$banner_subtitle' , 'primary entry')";
        mysqli_query($db_connect,$insert_query);

        // ---------------------------
        $new_name = mysqli_insert_id($db_connect).".".$original_extension;
        $new_location = '../uploads/banners/'.$new_name;
        move_uploaded_file($_FILES['banner_image']['tmp_name'], $new_location);

        // --------------------db Ubicación de la foto en la foto para actualizarla
        $new_photo_location = 'uploads/banners/'.$new_name;
        $id_from_table = mysqli_insert_id($db_connect);
        $update_query = "UPDATE banners SET photo_location = '$new_photo_location' WHERE id = $id_from_table";
        mysqli_query($db_connect , $update_query);
        header("location: add_banner.php");
    }
    else
    {
        $_SESSION['err_file'] = "Este tamaño de la imagen es más de 2 MB.";
        header("location: add_banner.php");
    }
}
else
{
    $_SESSION['err_file'] = "Error al cargar, compruebe los datos ingresados";
    header("location: add_banner.php");
}

?>