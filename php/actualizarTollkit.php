<?php

require_once 'connection_global.php';

$id = $_GET['id'];

if (isset($_FILES['manual-pdf'])) {
    $documento = $_FILES['manual-pdf'];
    $nombre_base = basename($_FILES['manual-pdf']['name']);
    $ruta = "../public/pdf/" . $nombre_base;
    $subir_archivo = move_uploaded_file($_FILES['manual-pdf']['tmp_name'], $ruta);
    if (!$subir_archivo) {
        $sizeMB = $_FILES['manual-pdf']['size'] / (1024 * 1024);
        echo "<script>alert('La revista no puede ser publicada, el tamaño máximo del archivo PDF es de 50MB. Si presenta este error al actualizar solamente la imagen, por favor, actualice la imgen y el archivo pdf.');</script>";
        echo "<script>window.location.href = '../cms/panel.php'</script>";
        exit;
    }

} else {
    echo "Error: archivo PDF no encontrado";
    exit;
}

if (isset($_FILES['imagen-manual'])) {
    $imagen = $_FILES['imagen-manual'];
    $nombre_base = basename($_FILES['imagen-manual']['name']);
    $ruta_imagen = "../public/" . $nombre_base;
    $subir_imagen = move_uploaded_file($_FILES['imagen-manual']['tmp_name'], $ruta_imagen);
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

$titulo = filter_var($_POST['titulo-manual'], FILTER_SANITIZE_STRING);
$resena = filter_var($_POST['resena-manual'], FILTER_SANITIZE_STRING);

if (!$titulo || !$resena) {
    echo "<script>alert('Error en los datos ingresados. Por favor, verifica los campos. Si sigue teniendo dificultades, por favor, contacte al equipo de sistemas.');</script>";
    echo "<script>window.location.href = '../cms/panel.php'</script>";
    exit;
}

// Preparar y ejecutar la consulta a la base de datos
$stmt = $conexion->prepare('UPDATE TOLLKIT SET TITULO_MANUAL=?, DESCRIPCION_MANUAL=?, MANUAL_PDF=?, PORTADA_MANUAL=? WHERE ID_TOLLKIT=?');
$stmt->bind_param('ssssi', $titulo, $resena, $ruta, $ruta_imagen, $id);

if ($stmt->execute()) {
    echo "<script>alert('La actualización se realizó con éxito.');</script>";
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