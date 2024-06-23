<?php
if (!empty($_POST["btnmodificar"])) {
    $id = $_POST["txtid"];
    
    // Verificar si se subió un archivo y no hay errores
    if (isset($_FILES["txtimg"]) && $_FILES["txtimg"]["error"] == 0) {
        try {
            $imagen = addslashes(file_get_contents($_FILES["txtimg"]["tmp_name"]));
            
            if (!empty($imagen)) {
                $sql = $db_connect->query("UPDATE imagen SET img='$imagen' WHERE id=$id");
                
                if ($sql == true) {
                    header("Location: edit_quien.php");
                } else {
                    echo "<div class='alert alert-danger'>Error al modificar la imagen</div>";
                }
            } else {
                echo "<div class='alert alert-danger'>Debes seleccionar una imagen</div>";
            }
        } catch (Exception $e) {
            echo "<div class='alert alert-danger'>Error: " . $e->getMessage() . "</div>";
        }
    } else {
        echo "<div class='alert alert-danger'>No se seleccionó ningún archivo o hubo un error al subirlo.</div>";
    }
}
?>
