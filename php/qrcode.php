<?php

include_once 'connection_global.php';

//Decidí usar la practica divide y venceras para cargar en un formulario solamente la imagen del QR y enotro formulario los datos

if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] === UPLOAD_ERR_OK) {
    $allowedTypes = ['image/jpeg', 'image/jpg', 'image/png'];
    $fileType = mime_content_type($_FILES['imagen']['tmp_name']);
    if (!in_array($fileType, $allowedTypes)) {
        echo "<script>alert('Solo se permiten archivos de imagen JPG, JPEG O PNG.');</script>";
        echo "<script>window.location.href = '../cms/panel.php'</script>";
        exit;
    }

    $imagen = $_FILES['imagen'];
    $nombre_base = basename($_FILES['imagen']['name']);
    $ruta_imagen = "../public/" . $nombre_base;
    $subir_imagen = move_uploaded_file($_FILES['imagen']['tmp_name'], $ruta_imagen);
    if (!$subir_imagen) {
        echo "Error al subir la imagen.";
        exit;
    }
    $ruta_imagen = "../public/" . $nombre_base;

    // Realizar la actualización de la base de datos
    $stmt = $conexion->prepare('UPDATE QR_CODE SET CODIGO_QR=?');
    $stmt->bind_param('s', $ruta_imagen);

    if ($stmt->execute()) {
        echo "<script>alert('La actualización se realizó con éxito.');</script>";
        echo "<script>window.location.href = '../cms/panel.php'</script>";
    } else {
        echo "<script>alert('Ocurrió un error en la actualización. Si sigue presentando dificultades por favor, contacte al área de sistemas.');</script>";
        echo "<script>window.location.href = '../cms/panel.php;'</script>";
    }

    // Cerrar la conexión a la base de datos
    $stmt->close();
    $conexion->close();

    exit();
}
