<?php

require_once 'connection_global.php';

$horario = filter_var($_POST['horario'], FILTER_SANITIZE_STRING);

if (!$horario) {
    echo "<script>alert('Error en los datos ingresados. Por favor, verifica los campos. Si sigue teniendo dificultades, por favor, contacte al equipo de sistemas.');</script>";
    echo "<script>window.location.href = '../cms/panel.php'</script>";
    exit;
}

// Preparar y ejecutar la consulta a la base de datos
$stmt = $conexion->prepare('UPDATE HORARIOS_DE_ATENCION SET HORARIO_DE_ATENCION=?');
$stmt->bind_param('s', $horario);

if ($stmt->execute()) {
    echo "<script>alert('La actualización del horario se realizó con éxito.');</script>";
    echo "<script>window.location.href = '../cms/panel.php'</script>";
} else {
    echo "<script>alert('Ocurrió un error en la actualización. Por favor, contacte al área de sistemas.');</script>";
    echo "<script>window.location.href = '../cms/panel.php'</script>";
}

// Cerrar la conexión a la base de datos
$stmt->close();
$conexion->close();

exit();

?>