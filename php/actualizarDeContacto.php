<?php

// Se realiza la conexión a la base de datos
require_once 'connection_global.php';

// Se obtienen los datos del formulario Información de Contacto
$link = filter_var($_POST['link'], FILTER_VALIDATE_URL);
$phone = filter_var($_POST['telefono'], FILTER_SANITIZE_STRING);
$contacto = filter_var($_POST['informacion-contacto'], FILTER_SANITIZE_STRING);

// Validación de datos
if (!$link || !$phone || !$contacto) {
    echo "<script>alert('Error en los datos ingresados. Por favor, verifica los campos. Si sigue teniendo dificultades, por favor, contacte al equipo de sistemas.');</script>";
    echo "<script>window.location.href = '../cms/panel.php'</script>";
    exit;
}

// Preparar y ejecutar la consulta a la base de datos
$stmt = $conexion->prepare('UPDATE informacion_de_contacto SET LINK=?, TELEFONO=?, CONTACTO=?');
$stmt->bind_param('sss', $link, $phone, $contacto);

if ($stmt->execute()) {
    // echo "<script>alert('La actualización se realizó con éxito.');</script>";
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
