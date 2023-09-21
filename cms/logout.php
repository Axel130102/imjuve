<!-- ESTE ES EL BOTÓN PARA SALIR -->
<?php
include_once("../php/connetion_global.php");
session_start();

$varsession = $_SESSION['email'];
// SE MENCIONA QUE SI NO SE ENCUENTRA LA SESIÓN NO PERMITIRA EL INGRESO A LA PAGINA
if ($varsession == null || $varsession = '') {
    echo "Algo ha salido mal.";
    die();
}
// SE DESTRUYE LA SESIÓN AL HACER EL EVENTO CLICK EN EL BOTON, POR LO QUE SE REDIRECCIONA A login_usuario.php
session_destroy();
header("Location: index.php");
?>