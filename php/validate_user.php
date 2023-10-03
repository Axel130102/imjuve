<?php
require 'connection_global.php';
session_start();

$email = $_POST['email'];
$password = $_POST['PASSWORD'];

$_SESSION['email'] = $email;

$conexion = mysqli_connect("localhost", "imjuvegobmx_testcontactojoven", "kQNW]LU)j7CE", "imjuvegobmx_testcontactojoven");

// Obtener el hash de la contraseña almacenada en la base de datos
$consulta = "SELECT PASSWORD FROM USUARIOS WHERE EMAIL='$email'";
$resultado = mysqli_query($conexion, $consulta);

if ($resultado) {
    $row = mysqli_fetch_assoc($resultado);
    $hashedPassword = $row['PASSWORD'];

    // Verificar la contraseña ingresada con el hash de la base de datos
    if (password_verify($password, $hashedPassword)) {
        // La contraseña es correcta, se puede realizar la acción correspondiente
        header("Location: ../cms/panel.php");
        exit();
    } else {
        // La contraseña es incorrecta, mostrar mensaje de error
        $mensaje = "Usuario o contraseña incorrectos.";
        header("Location: ../cms/index.php?mensaje=" . urlencode($mensaje));
        exit();
    }
}

mysqli_close($conexion);
exit();
?>