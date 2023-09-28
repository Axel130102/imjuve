<?php

// Esta funcion muestra los errores que se generan
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Incluir el archivo de conexión a la base de datos
require '../php/connection_global.php';

// Esta función mejora el renderizado de la pagina
ob_start();

// Iniciar la sesión
session_start();
$email = $_SESSION['email'];

if (!isset($email) || empty($email)) {
    header('Location: ../index.php');
    exit();
}

// echo $email;
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualizar manual de usuario</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/font.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <script src="../js/alert.js"></script>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light ms-3">
        <div class="container-fluid">
            <abbr title="Regresar al panel"><a class="navbar-brand" href="panel.php">
                    <img src="../public/contacto_joven_logo2.png" width="40px" height="40px" alt="">
                </a></abbr>
            <div class="d-flex justify-content-end mb-2">
                <a href="../cms/logout.php" class="btn btn-primary btn-sm me-3" type="button">Salir</a>
            </div>
    </nav>

    <section class="container-md">
        <?php

        $sql = "SELECT * FROM TOLLKIT";
        $resultado = mysqli_query($conexion, $sql);

        // Obtiene el ID enviado por la URL
        $id = $_GET['id'];

        // Consulta los datos del ID enviado
        $sql = "SELECT * FROM TOLLKIT WHERE ID_TOLLKIT = $id";
        $resultado = mysqli_query($conexion, $sql);

        // Obtiene los datos del registro
        $filas = mysqli_fetch_assoc($resultado);

        ?>
        <article>
            <h2 class="ms-4 text-center">Manual de usuario actualizar archivos</h2>
            <form method="POST" action="../php/actualizarTollkit.php?id=<?= $filas['ID_TOLLKIT'] ?>" enctype="multipart/form-data" id="formToolkit">
                <div class="input-group mb-3 ms-4">
                    <label class="input-group-text" for="manual-pdf">Cargar manual PDF</label>
                    <input type="file" class="form-control me-5" id="manual-pdf" name="manual-pdf"
                        accept="application/pdf">
                </div>
                <div class="input-group mb-3 ms-4">
                    <label class="input-group-text" for="manual-actual">Ruta del manual actual</label>
                    <input type="text" class="form-control me-2" id="manual-actual" name="manual-actual"
                        value="<?= $filas['MANUAL_PDF'] ?>" readonly>
                </div>
                <div class="input-group mb-3 ms-4">
                    <label class="input-group-text" for="imagen-manual">Cargar imagen del manual</label>
                    <input type="file" class="form-control me-5" id="imagen-manual" name="imagen-manual"
                        accept="image/*">
                </div>
                <div class="input-group mb-3 ms-4">
                    <label class="input-group-text" for="imagen-actual">Ruta de la imagen actual</label>
                    <input type="text" class="form-control me-2" id="imagen-actual" name="imagen-actual"
                        value="<?= $filas['PORTADA_MANUAL'] ?>" readonly>
                </div>
                <div class="input-group mb-3 ms-4">
                    <label class="input-group-text" for="imagen-actual">Imagen del manual de
                        usuario</label>
                    <img src="<?php echo $filas['PORTADA_MANUAL'] ?>" width="150" height="150"
                        alt="imagen del manual de usuario" id="imagen-actual"
                        name="imagen-actual">
                </div>
                <div class=" input-group mb-3 ms-4">
                    <label class="input-group-text" for="titulo-manual">Titulo del manual de usuario</label>
                    <input type="text" class="form-control me-5" id="titulo-manual" name="titulo-manual"
                        value="<?= $filas['TITULO_MANUAL'] ?>">
                </div>
                <div class="form-floating mb-3 ms-4 me-4">
                    <textarea class="form-control" id="resena-manual" name="resena-manual"
                        style="height: 80px"><?= $filas['DESCRIPCION_MANUAL'] ?></textarea>
                    <label for="resena-manual">Descripción del manual de usuario</label>
                </div>
                <div class="d-flex justify-content-center mb-2 me-4">
                    <button class="btn btn-success pull-right justify-content-center btn-sm" type="submit" id="enviar-Toolkit">Actualizar
                        manual de usuario</button>
                </div>
            </form>
        </article>
    </section>
</body>

</html>