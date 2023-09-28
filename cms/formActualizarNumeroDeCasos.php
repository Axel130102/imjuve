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
    <script src="../js/validationForm.js"></script>
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
        <?php

        $sql = "SELECT * FROM CONTABILIDAD_DE_CASOS";
        $resultado = mysqli_query($conexion, $sql);

        // Obtiene el ID enviado por la URL
        $id = $_GET['id'];

        // Consulta los datos del ID enviado
        $sql = "SELECT * FROM CONTABILIDAD_DE_CASOS WHERE ID_CASOS = $id";
        $resultado = mysqli_query($conexion, $sql);

        // Obtiene los datos del registro
        $fila = mysqli_fetch_assoc($resultado);

        ?>
        <article class="container-md">
            <h2 class="ms-4 text-center">Actualizar cifra de datos</h2>
            <form method="POST" action="../php/actualizarCasos.php?id=<?= $fila['ID_CASOS'] ?>"
                enctype="multipart/form-data" name="form">
                <div class=" input-group mb-3 ms-4">
                    <label class="input-group-text" for="sector-poblacion">Sector de la población</label>
                    <input type="text" class="form-control me-5" id="sector-poblacion" name="sector-poblacion"
                        value="<?= $fila['SECTOR_DE_LA_POBLACION'] ?>">
                </div>
                <div class=" input-group mb-3 ms-4">
                    <label class="input-group-text" for="numero-casos">Numero de casos</label>
                    <input type="text" class="form-control me-5" id="numero-casos" name="numero-casos"
                        value="<?= $fila['NUMERO_DE_CASOS'] ?>">
                </div>
                <div class=" input-group mb-3 ms-4">
                    <label class="input-group-text" for="anio">Año</label>
                    <input type="text" class="form-control me-5" id="anio" name="anio" value="<?= $fila['ANIO'] ?>">
                </div>
                <div class="input-group mb-3 ms-4">
                    <!-- <label class="input-group-text" for="imagen-casos">Actualizar imagen</label> -->
                    <input type="file" class="form-control me-5" id="imagen-casos" name="imagen-casos"
                        accept="image/jpeg,image/jpg,image/png" autofocus>
                </div>
                <div class="input-group mb-3 ms-4">
                    <label class="input-group-text" for="imagen-actual">Ruta de imagen actual</label>
                    <input type="text" class="form-control me-2" id="imagen-actual" name="imagen-actual"
                        value="<?= $fila['IMAGEN_CASOS'] ?>" readonly>
                </div>
                <div class="input-group mb-3 ms-4">
                    <label class="input-group-text" for="qr">Imagen actual</label>
                    <img src="<?php echo $fila['IMAGEN_CASOS'] ?>" width="150" height="150" alt="qr">
                </div>
                <div class="d-flex justify-content-center mb-2 me-4">
                    <button class="btn btn-success pull-right justify-content-center btn-sm" type="submit">Actualizar
                        cifra de datos</button>
                </div>
            </form>
        </article>
    </section>

</body>

</html>