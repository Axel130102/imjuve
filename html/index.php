<?php

include_once '../php/connection_global.php';

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ejemplo de nueva página para GOB.mx</title>


    <!-- CSS -->
    <link href="/favicon.ico" rel="shortcut icon">
    <link href="https://framework-gb.cdn.gob.mx/assets/styles/main.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/index.css">

</head>

<body>
    <!-- Contenido -->
    <main class="page">
        <header>
            <ul class="myHeader">
                <li><a href="index.php">Inicio</a></li>
                <li><a href="acerca.php">¿Quinés somos?</a></li>
                <li><a href="toolkit.php">Toolkit</a></li>
                <li><a href="politica.php">Politica de privacidad</a></li>
            </ul>
        </header>

        <div class="container-1">
            <div>
                <h1>CONTACTO JOVEN. Red Nacional de Atención Juvenil </h1>
                <h2>
                    Tu vida es importante <br>
                    merece ser escuchada/o
                </h2>

                <h3>
                    Acompañamiento psicoemocional <br>
                    gratuito y confidencial <br>
                    vía WhatsApp para personas de 13 a 29 años de edad, <br>
                    residentes en México.
                </h3>

                <?php

                $sql = "SELECT * FROM INFORMACION_DE_CONTACTO";
                $resultado = mysqli_query($conexion, $sql);
                $fila = mysqli_fetch_assoc($resultado);

                ?>
                <div class="qrBoton">
                    <div class="boton">
                        <a href="<?= htmlspecialchars($fila['LINK']); ?>" target="_blank">Requiere apoyo</a>
                    </div>

                    <?php

                    $sql = "SELECT CODIGO_QR FROM QR_CODE";
                    $resultado = mysqli_query($conexion, $sql);
                    $fila = mysqli_fetch_assoc($resultado);

                    ?>
                    <img src="<?= htmlspecialchars($fila['CODIGO_QR']); ?>">
                </div>

            </div>

            <img src="../public/mujer.png">

        </div>

        <section>
            <?php

            $sql = "SELECT * FROM HORARIOS_DE_ATENCION";
            $resultado = mysqli_query($conexion, $sql);
            $fila = mysqli_fetch_assoc($resultado);

            ?>
            <div class="container-2">
                <h1>Eso que estás sintiendo...</h1>
                <h2>¡ES IMPORTANTE!</h2>
                <h3>
                    Estamos para apoyarte <br>
                    en situaciones como
                </h3>
            </div>

            <div class="container-2-1">
                <div>
                    <img src="../public/icono1.jpg">
                    <h3>Estres</h3>
                    <p>
                        No puedo <br>
                        concentrarme, no <br>
                        puedo dormir, <br>
                        siento ansiedad, <br>
                        enojo, frustación.
                    </p>
                    </img>
                </div>
                <div>
                    <img src="../public/icono6.jpg">
                    <h3>Crisis</h3>
                    <p>
                        Perdí a un ser <br>
                        querido, dejé la <br>
                        escuela, perdí mi <br>
                        empleo, me he <br>
                        enfermado.
                    </p>
                    </img>
                </div>
                <div>
                    <img src="../public/icono5.jpg">
                    <h3>Emociones</h3>
                    <p>
                        Me cuesta trabajo <br>
                        identificar mis <br>
                        emociones y <br>
                        expresarlas, <br>
                        me cuesta trabajo <br>
                        regular mis emociones.
                    </p>
                    </img>
                </div>
                <div>
                    <img src="../public/icono4.jpg">
                    <h3>Sustancias</h3>
                    <p>
                        Estoy teniendo <br>
                        dificultades con <br>
                        el consumo de <br>
                        alcohol u otras <br>
                        sustancias.
                    </p>
                    </img>
                </div>
                <div>
                    <img src="../public/icono3.jpg">
                    <h3>Violencia</h3>
                    <p>
                        He vivido <br>
                        alguna situación <br>
                        de violencia o abuso <br>
                        sexual.
                    </p>
                    </img>
                </div>
                <div>
                    <img src="../public/icono2.jpg">
                    <h3>Pensamientos</h3>
                    <p>
                        He tenido <br>
                        pensamientos relacionados <br>
                        con hacerme daño <br>
                        o atentar contra <br>
                        mi vida.
                    </p>
                    </img>
                </div>
            </div>

            <div class="container-2-2">
                <div class="boton">
                    <a href="">Haz contacto</a>
                </div>

                <h1>
                    Horario de atención
                </h1>
                <h3>
                    <?= htmlspecialchars($fila['HORARIO_DE_ATENCION']); ?>
                </h3>
            </div>
        </section>
        <section>
            <?php

            $sql = "SELECT * FROM CONTABILIDAD_DE_CASOS WHERE ACTIVO = 1";
            $resultado = mysqli_query($conexion, $sql);

            ?>
            <div class="container-3">
                <div class="container-3-1">
                    <h1>
                        Gracias a su confianza <br>
                        hemos logrado atender
                    </h1>
                </div>

                <div class="container-3-2">
                    <?php
                    while ($fila = mysqli_fetch_assoc($resultado)):
                        ?>
                        <div>
                            <img src="<?= htmlspecialchars($fila['IMAGEN_CASOS']); ?>">
                            <h3>
                                <?= htmlspecialchars($fila['NUMERO_DE_CASOS']); ?>
                            </h3>
                            <p>casos del</p>
                            <p>
                                <?= htmlspecialchars($fila['ANIO']); ?>
                            </p>
                        </div>
                    <?php endwhile; ?>
                    <!-- <div> -->
                    <!-- <img src="/public/recurso19.png"> -->
                    <!-- <h3>6,640</h3> -->
                    <!-- <p>casos</p> -->
                    <!-- <p>2023</p> -->
                    <!-- </div> -->
                    <!-- <div> -->
                    <!-- <img src="/public/recurso35.png"> -->
                    <!-- <h3>4,983</h3> -->
                    <!-- <p>Mujeres</p> -->
                    <!-- <p>2023</p> -->
                    <!-- </div> -->
                    <!-- <div> -->
                    <!-- <img src="/public/recurso18.png"> -->
                    <!-- <h3>1,491</h3> -->
                    <!-- <p>Hombres</p> -->
                    <!-- <p>2023</p> -->
                    <!-- </div> -->
                </div>
            </div>


            <div class="container-4">
                <div>
                    <h1>¿Qué es Contacto Joven? </h1>
                    <p>
                        Es una Red Nacional de acompañamiento remoto a través de la cual se brinda acompañamiento a la
                        salud
                        mental de personas adolescentes y jóvenes que atraviesan problemáticas emocionales y
                        psicosociales,
                        quienes solicitan y reciben la atención a través de mensajería electrónica (WhatsApp y Facebook
                        Messenger).
                    </p>
                    <h1>¿Quién brinda el acompañamiento? </h1>
                    <p>
                        El servicio de acompañamiento psicoemocional que se promueve a través de CONTACTO JOVEN, es
                        ofrecido
                        por una red de “acompañantes”, quienes son personas jóvenes estudiantes y profesionales las
                        áreas de
                        atención a la salud, ciencias sociales y humanidades, que a través de su servicio social
                        universitario y/o voluntariado, brindan acompañamiento psicoemocional entre pares, es decir de
                        joven
                        a joven. En CONTACTO JOVEN no se ofrece psicoterapia o tratamiento psiquiátrico.
                    </p>
                </div>
                <div>
                    <img src="../public/recurso21.png">
                </div>
            </div>

            <div class="container-5">
                Todas las personas que participan en CONTACTO JOVEN, fueron seleccionados bajo un proceso competitivo y
                riguroso, así mismo toda la red forma parte de un proceso de capacitación inicial por parte de Imjuve,
                Unicef, Secretaría de Gobernación, y Secretaría de Salud, con la finalidad de brindar un servicio
                profesional y de calidad.
                <br><br>
                Las y los acompañantes atienden casos relacionados a estrés, la ansiedad y el manejo de emociones, y
                canalizan a servicios especializados aquellos casos que presenten problemáticas asociadas a situaciones
                de
                violencia, consumo problemático de sustancias, daño autoinfligido e ideación suicida. En CONTACTO JOVEN
                no
                se ofrece psicoterapia o tratamiento psiquiátrico.
                <br><br>
                Las y los acompañantes reciben supervisión por profesionales en áreas afines a salud mental, las y los
                supervisores cuentan con título, cédula profesional y experiencia en la atención de casos, a fin de
                garantizar que el servicio otorgado será el óptimo.

            </div>


            <footer>
                <?php

                $sql = "SELECT CODIGO_QR FROM QR_CODE";
                $resultado = mysqli_query($conexion, $sql);
                $fila = mysqli_fetch_assoc($resultado);

                ?>
                <div>
                    <h1>¡HAZ CONTACTO!</h1>
                    <img src="<?= htmlspecialchars($fila['CODIGO_QR']); ?>">
                </div>
                <?php

                $sql = "SELECT * FROM INFORMACION_DE_CONTACTO";
                $resultado = mysqli_query($conexion, $sql);
                $fila = mysqli_fetch_assoc($resultado);

                ?>
                <div>
                    <h1>¡NO ESTÁS SOLO!</h1>
                    <h1>¡NO ESTÁS SOLA!</h1>

                    <h3>
                        <?= htmlspecialchars($fila['CONTACTO']); ?> <br>
                        <?= htmlspecialchars($fila['TELEFONO']); ?> <br>
                    </h3>

                    <h2><a href="<?= htmlspecialchars($fila['LINK']); ?>" target="_blank">Da Click aqui</a></h2>

                </div>
            </footer>
    </main>

    <!-- JS -->
    <script src="https://framework-gb.cdn.gob.mx/gobmx.js"></script>

    <?php
    // Liberar recursos
    mysqli_free_result($resultado);
    // Cerrar la conexión a la base de datos
    mysqli_close($conexion);
    ?>


</body>

</html>