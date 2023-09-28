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
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
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

    <section>
        <article>
            <h2 class="ms-5 mt-3 mb-4">Manual de usuario cargar archivos</h2>
            <form method="POST" action="../php/insertarCasos.php" enctype="multipart/form-data" class="container-md">
                <div class="input-group mb-3 ms-4">
                    <label class="input-group-text" for="imagen-casos">Cargar imagen</label>
                    <input type="file" class="form-control me-5" id="imagen-casos" name="imagen-casos" accept="image/*">
                </div>
                <div class=" input-group mb-3 ms-4">
                    <label class="input-group-text" for="sector-poblacion">Sector de la población</label>
                    <input type="text" class="form-control me-5" id="sector-poblacion" name="sector-poblacion">
                </div>
                <div class=" input-group mb-3 ms-4">
                    <label class="input-group-text" for="numero-casos">Número de casos atendidos</label>
                    <input type="text" class="form-control me-5" id="numero-casos" name="numero-casos">
                </div>
                <div class=" input-group mb-3 ms-4">
                    <label class="input-group-text" for="anio">Año</label>
                    <input type="text" class="form-control me-5" id="anio" name="anio">
                </div>
                <div class="d-flex justify-content-end mb-2 me-4">
                    <button class="btn btn-success pull-right justify-content-end btn-sm" type="submit">Insertar nuevo número de casos</button>
                </div>
            </form>
        </article>
    </section>
</body>

</html>