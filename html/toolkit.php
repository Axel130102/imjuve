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
  <link rel="stylesheet" href="../css/toolkit.css">

</head>

<body>

  <!-- Contenido -->
  <main class="page">
    <header>
      <ul class="myHeader">
        <li><a href="index.php">Inicio</a></li>
        <li><a href="acerca.php">¿Quienés somos?</a></li>
        <li><a href="toolkit.php">Toolkit</a></li>
        <li><a href="politica.php">Politica de privacidad</a></li>
      </ul>
    </header>


    <div class="container-1">
      <h1>
        TOOLKIT
      </h1>
      <img src="../public/recurso20.png">
    </div>

    <section>
      <?php
      $sql = "SELECT * FROM TOLLKIT WHERE ACTIVO = 1";
      $resultado = mysqli_query($conexion, $sql);

      if (!$resultado) {
        die("Error al ejecutar la consulta: " . mysqli_error($conexion));
      }
      ?>

      <div class="container-2">
        <h3>
          En esta sección podrás consultar diferentes manuales que
          te apoyarán en la implementación del programa
        </h3>
      </div>

      <?php
      while ($fila = mysqli_fetch_assoc($resultado)):
        ?>
        <div class="container-3">
          <div class="imagen">
            <img src="<?= htmlspecialchars($fila['PORTADA_MANUAL']); ?>">
          </div>
          <div>
            <h3>
              <?= htmlspecialchars($fila['TITULO_MANUAL']); ?><br>
            </h3>
            <p>
              <?= htmlspecialchars($fila['DESCRIPCION_MANUAL']); ?>
            </p>

            <div class="boton">
              <a href="<?= htmlspecialchars($fila['MANUAL_PDF']); ?>" target="_blank">Descargar</a>
            </div>
          </div>
        </div>
      <?php endwhile; ?>
    </section>


    <!-- <div class="imagen"> -->
    <!-- <img src="/public/manual.png"> -->
    <!-- </div> -->
    <!-- <div> -->
    <!-- <h3> -->
    <!-- PROTOCOLO<br> -->
    <!-- El protocolo contiene los pasos a seguir para llevar a cabo el acompañamiento; incluyereferencias -->
    <!-- teórico-conceptuales que dan sustento y breves recomendaciones prácticas para lograrlo. El protocolo forma -->
    <!-- parte de los instrumentos de navegación con los que se orienta a la Red para seguir la ruta adecuada al -->
    <!-- brindar acompañamiento en Contacto Joven. -->
    <!-- </h3> -->
    <!-- <div class="boton"> -->
    <!-- <a href="">Descargar</a> -->
    <!-- </div> -->
    <!-- </div> -->
    <!-- </div> -->

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

        <div class="boton-footer">
          <a href="<?= htmlspecialchars($fila['LINK']); ?>" target="_blank">DA CLIC AQUÍ</a>
        </div>

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