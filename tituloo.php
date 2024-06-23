<?php
      
/* Conexion */
$host_name = "localhost";
$user_name = "root";
$password = "";
$database_name = "tienda_tra";

$db_connect = mysqli_connect($host_name, $user_name, $password, $database_name);
/* Conexion */

$quien1_get_query = "SELECT titulo FROM titu where id='1'";
$quien1_from_db = mysqli_query($db_connect, $quien1_get_query);
$after_fetch_assoc_quien1 = mysqli_fetch_assoc($quien1_from_db);
// print_r($after_fetch_assoc_banner);
?>