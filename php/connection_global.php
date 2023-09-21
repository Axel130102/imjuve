<?php
$host = "localhost";
$user = "root";
$password = "";
$database = "CONTACTO_JOVEN";

$conexion = mysqli_connect($host, $user, $password, $database);

if (!$conexion) {
    die("Error al conectar a la base de datos: " . mysqli_connect_error());
}

mysqli_set_charset($conexion, "utf8"); // Se establece el charset utf8

?>