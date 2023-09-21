<?php

require_once 'connection_global.php';

if (isset($_FILES['imagen-casos'])) {
    $imagen = $_FILES['imagen-casos'];
    $nombre_base = basename($_FILES['imagen-casos']['name']);
    $ruta_imagen = "../public/" . $nombre_base;
    $subir_imagen = move_uploaded_file($_FILES['imagen-casos']['tmp_name'], $ruta_imagen);
    if (!$subir_imagen) {
        echo "<script>alert('Error al subir la imagen..');</script>";
        echo "<script>window.location.href = '../cms/panel.php'</script>";
        exit;
    }
} else {
    echo "<script>alert('Error imagen no encontrada.');</script>";
    echo "<script>window.location.href = '../cms/panel.php'</script>";
    exit;
}

// Obtener los datos del tipo text del formulario
$poblacion = filter_var($_POST['sector-poblacion'], FILTER_SANITIZE_STRING);
$casos = filter_var($_POST['numero-casos'], FILTER_SANITIZE_STRING);
$anio = filter_var($_POST['anio'], FILTER_SANITIZE_STRING);

// Verificar si algún dato está vacío
if (!$poblacion || !$casos || !$anio) {
    echo "<script>alert('Error en los datos ingresados. Por favor, verifica los campos. Si sigue teniendo dificultades, por favor, contacte al equipo de sistemas.');</script>";
    echo "<script>window.location.href = '../cms/panel.php'</script>";
    exit;
}

// Preparar y ejecutar la consulta a la base de datos
$stmt = $conexion->prepare('INSERT INTO CONTABILIDAD_DE_CASOS (SECTOR_DE_LA_POBLACION, NUMERO_DE_CASOS, ANIO, IMAGEN_CASOS) VALUES (?, ?, ?, ?)');
$stmt->bind_param('ssss', $poblacion, $casos, $anio, $ruta_imagen);

if ($stmt->execute()) {
    echo "<script>alert('La inserción se realizó con éxito.');</script>";
    echo "<script>window.location.href = '../cms/panel.php'</script>";
} else {
    echo "<script>alert('Ocurrió un error en la inserción. Por favor, contacte al área de sistemas.');</script>";
    echo "<script>window.location.href = '../cms/panel.php'</script>";
}

// Cerrar la conexión a la base de datos
$stmt->close();
$conexion->close();

exit();

?>