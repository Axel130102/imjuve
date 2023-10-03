<?php
$host = "localhost";
$user = "imjuvegobmx_testcontactojoven";
$password = "kQNW]LU)j7CE";
$database ="imjuvegobmx_testcontactojoven";

$conexion = mysqli_connect($host, $user, $password, $database);

if (!$conexion) {
    echo "Error al conectar a la base de datos: " . mysqli_connect_error();
    die();
}
mysqli_set_charset($conexion, "utf8"); // Se establece el charset utf8

?>