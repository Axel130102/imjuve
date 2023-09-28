<?php

require_once 'connection_global.php';

$id = $_GET['id'];

// Preparar y ejecutar la consulta a la base de datos
$stmt = $conexion->prepare('UPDATE TOLLKIT SET ACTIVO = 0 WHERE ID_TOLLKIT = ?');
$stmt->bind_param('i', $id);

if ($stmt->execute()) {
    // echo "<script>alert('La eliminación se realizó con éxito.');</script>";
    echo "<script>window.location.href = '../cms/panel.php';</script>";
} else {
    echo "<script>alert('Ocurrió un error en la eliminación. Por favor, contacte al área de sistemas.');</script>";
    echo "<script>window.location.href = '../cms/panel.php';</script>";
}

// Cerrar la conexión a la base de datos
$stmt->close();
$conexion->close();

exit();

?>
