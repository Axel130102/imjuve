<?php

// Esta funcion muestra los errores que se generans
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Incluir el archivo de conexión a la base de datos y el archivo de encriptación
require '../php/connection_global.php';
require '../php/hash.php';

// Esta función mejora el renderizado de la pagina
ob_start();

// Iniciar la sesión
session_start();
$email = $_SESSION['email'];

if (!isset($email) || empty($email)) {
    header('Location: ../index.php');
    exit(); // Salir después de redirigir
}

// echo $email;
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contenedor</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/panel.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <script src="../js/updateLogico.js"></script>
    <script src="../js/alert.js"></script>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light ms-3">
        <div class="container-fluid mt-2">
            <abbr title="Actualizar"><a class="navbar-brand" href="panel.php">
                    <img src="../public/contacto_joven_logo2.png" width="40px" height="40px" alt="">
                </a></abbr>
            <div class="d-flex justify-content-end mb-2">
                <a href="logout.php" class="btn btn-primary btn-sm me-3" type="button">Salir</a>
            </div>
        </div>
    </nav>

    <div class="container-fluid mt-2">
        <h1 class="fs-1 ms-2">Panel administrativo Contacto Joven</h1>
        <br>
        <section>
            <?php

            $sql = "SELECT * FROM QR_CODE";
            $resultado = mysqli_query($conexion, $sql);
            $fila = mysqli_fetch_assoc($resultado);

            ?>
            <article>
                <h2 class="text-center">Actualizar código QR</h2>
                <form method="POST" action="../php/qrcode.php" enctype="multipart/form-data"
                    class="container-md" id="formQr">
                    <div class="input-group mb-3 ms-4">
                        <!-- <label class="input-group-text" for="imagen_qr"></label> -->
                        <input type="file" class="form-control me-5" id="imagen_qr" name="imagen"
                            accept="image/jpeg,image/jpg,image/png">
                    </div>
                    <div class="input-group mb-3 ms-4">
                        <label class="input-group-text" for="qr">Código QR Actual</label>
                        <img src="<?php echo $fila['CODIGO_QR'] ?>" width="150" height="150" alt="qr">
                    </div>
                    <div class="d-flex justify-content-end mb-2 me-4">
                        <button class="btn btn-success pull-right justify-content-end btn-sm" type="submit"
                            id="enviar-qr" onclick="Alert(qr)">Actualizar QR</button>
                    </div>
                </form>
            </article>
        </section>
        <hr>
        <section>
            <?php

            $sql = "SELECT * FROM HORARIOS_DE_ATENCION";
            $resultado = mysqli_query($conexion, $sql);
            $fila = mysqli_fetch_assoc($resultado);

            ?>
            <article>
                <h2 class="text-center">Horario de atención</h2>
                <form method="POST" action="../php/actualizarHorario.php" class="container-md" id="formHorario">
                    <div class="form-floating mb-3 ms-4 me-4">
                        <textarea class="form-control" id="horario" name="horario"
                            style="height: 100px"><?= $fila['HORARIO_DE_ATENCION'] ?></textarea>
                        <label for="horario">Información del horario</label>
                    </div>
                    <div class="d-flex justify-content-end mb-2 me-4">
                        <button class="btn btn-success pull-right justify-content-end btn-sm" type="submit"
                            id="enviar-horario" onclick="Alert(horario)">Actualizar horario de atención</button>
                    </div>
                </form>
            </article>
            <hr>
        </section>
        <section>
            <?php

            $sql = "SELECT * FROM INFORMACION_DE_CONTACTO";
            $resultado = mysqli_query($conexion, $sql);
            $fila = mysqli_fetch_assoc($resultado);

            ?>
            <article>
                <h2 class="text-center">Información de contacto</h2>
                <form method="POST" action="../php/actualizarDeContacto.php" class="container-md" id="formContacto">
                    <div class=" input-group mb-3 ms-4">
                        <label class="input-group-text" for="link">Link del botón de ayuda</label>
                        <input type="text" class="form-control me-5" id="link" name="link" value="<?= $fila['LINK'] ?>">
                    </div>
                    <div class="form-floating mb-3 ms-4 me-4">
                        <textarea class="form-control" id="informacion-contacto" name="informacion-contacto"
                            style="height: 100px"><?= $fila['CONTACTO'] ?></textarea>
                        <label for="informacion-contacto">Información de contacto</label>
                    </div>
                    <div class="input-group mb-3 ms-4">
                        <label class="input-group-text" for="telefono">Teléfono</label>
                        <input type="text" class="form-control me-5" name="telefono" id="telefono"
                            value="<?= $fila['TELEFONO'] ?>">
                    </div>
                    <div class="d-flex justify-content-end mb-2 me-4">
                        <button class="btn btn-success pull-right justify-content-end btn-sm" type="submit"
                            id="enviar-contacto" onclick="Alert(contacto)">Actualizar información de contacto</button>
                    </div>
                </form>
            </article>
            <hr>
        </section>
        <section>
            <?php

            $sql = "SELECT * FROM CONTABILIDAD_DE_CASOS WHERE ACTIVO = 1";
            $resultado = mysqli_query($conexion, $sql);

            // Define la variable id
            $id = isset($_GET['ID_CASOS']) ? $_GET['ID_CASOS'] : null;

            ?>
            <article>
                <h2 class="text-center">Cifras de casos atendidos</h2>
                <div class="container-md">
                    <table class="table table-responsive mb-4">
                        <thead class="text-center">
                            <tr>
                                <th scope="col">Ítem</th>
                                <th scope="col">Sector de la población</th>
                                <th scope="col">Número de casos</th>
                                <th scope="col">Año</th>
                                <th scope="col">Ruta de la imagen</th>
                                <th scope="col"></th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            <?php
                            while ($fila = mysqli_fetch_assoc($resultado)) {
                                ?>
                                <tr>
                                    <td scope="row">
                                        <?= $fila['ID_CASOS'] ?>
                                    </td>
                                    <td>
                                        <?= $fila['SECTOR_DE_LA_POBLACION'] ?>
                                    </td>
                                    <td>
                                        <?= $fila['NUMERO_DE_CASOS'] ?>
                                    </td>
                                    <td>
                                        <?= $fila['ANIO'] ?>
                                    </td>
                                    <td>
                                        <?= $fila['IMAGEN_CASOS'] ?>
                                    </td>
                                    <td>
                                        <a href="formActualizarNumeroDeCasos.php?id=<?= $fila['ID_CASOS'] ?>"
                                            class="btn btn-primary btn-sm ms-4" method="post">Editar</a>
                                    </td>
                                    <td>
                                        <a href="../php/updateLogicoCasos.php?id=<?= $fila['ID_CASOS'] ?>"
                                            class="btn btn-danger btn-sm"
                                            onclick="return confirmarEliminar(event)">Eliminar</a>

                                    </td>
                                </tr>
                                <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
                <div class="d-flex justify-content-end container-md">
                    <a href="formInsertarCasos.php" class="mb-2 me-4 btn btn-success btn-sm">Agregar nueva categoría de
                        casos</a>
                </div>
            </article>
            <hr>
        </section>
        <section>
            <?php
            $sql = "SELECT * FROM TOLLKIT WHERE ACTIVO = 1";
            $resultado = mysqli_query($conexion, $sql);

            // Define la variable id
            $id = isset($_GET['ID_TOLLKIT']) ? $_GET['ID_TOLLKIT'] : null;
            ?>

            <article>
                <h2 class="text-center">Agregar o actualizar manual de usuario</h2>
                <div class="container-md">
                    <table class="table table-responsive mb-4">
                        <thead class="text-center">
                            <tr>
                                <th scope="col">Número de manual</th>
                                <th scope="col">Títutlo</th>
                                <th scope="col">Descripción</th>
                                <th scope="col">Ruta del archivo</th>
                                <th scope="col">Imagen del manual de usuario</th>
                                <th scope="col"></th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            <?php
                            while ($fila = mysqli_fetch_assoc($resultado)) {
                                ?>
                                <tr>
                                    <td scope="row">
                                        <?= $fila['ID_TOLLKIT'] ?>
                                    </td>
                                    <td>
                                        <?= $fila['TITULO_MANUAL'] ?>
                                    </td>
                                    <td>
                                        <?= $fila['DESCRIPCION_MANUAL'] ?>
                                    </td>
                                    <td>
                                        <?= $fila['MANUAL_PDF'] ?>
                                    </td>
                                    <td>
                                        <?= $fila['PORTADA_MANUAL'] ?>
                                    </td>
                                    <td>
                                        <a href="formActualizarTollkit.php?id=<?= $fila['ID_TOLLKIT'] ?>"
                                            class="btn btn-primary btn-sm ms-4" method="post">Editar</a>
                                    </td>
                                    <td>
                                        <a href="../php/updateLogicoTollkit.php?id=<?php echo $fila['ID_TOLLKIT'] ?>"
                                            class="btn btn-danger btn-sm"
                                            onclick="return confirmarEliminar(event)">Eliminar</a>
                                    </td>
                                </tr>
                                <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
                <div class="d-flex justify-content-end container-md">
                    <a href="formInsertarTollkit.php" class="mb-4 me-2 btn btn-success btn-sm">Agregar nuevo manual</a>
                </div>
            </article>
        </section>


    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
        </script>

    <?php
    ob_end_flush();
    ?>


</body>

</html>