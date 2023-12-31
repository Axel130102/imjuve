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
  <link rel="stylesheet" href="../css/acerca.css">

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
        ¿QUIÉNES SOMOS? <br>
      </h1>
      <img src="../public/recurso11.png">
    </div>


    <div class="container-2">
      <img src="../public/recurso10.png">
      <h3>
        Red de Apoyo psicosocial para <br>
        adolescentes y jóvenes en México
      </h3>
      <div class="imagen2">
        <img src="../public/trabajo.png">
        <img src="../public/salud.png">
        <img src="../public/conadic.png">
        <img src="../public/logo.png">
        <img src="../public/unicef.png">
        <img src="../public/ureport.png">
      </div>
    </div>

    <div class="container-2-1">
      <p>
        En diciembre del 2019, se presentó la emergencia sanitaria causada por el virus SARS-CoV-2, a la cual se le
        denominó la “Pandemia por COVID-19”, impactando a nivel global en términos de salud. En México el 23 de marzo de
        2020, la Secretaría de Salud declaró la “Jornada Nacional de Sana Distancia”, como medida sanitaria y de
        distanciamiento social con el objetivo de disminuir los contagios por dicho virus.
        <br><br>
        Aunque la emergencia sanitaria provocada por el SARS-CoV-2, fue una crisis de salud física, tuvo un impacto
        importante en la salud mental. Por esta razón, la Organización Mundial de la Salud (OMS) pidió a los países no
        desatender estas problemáticas, estudiar las necesidades de todos los sectores y garantizar que apoyo
        psicológico disponible como parte de los servicios esenciales.
        <br><br>
        Fue así como el Instituto Mexicano de la Juventud, en colaboración con diversas instituciones y organizaciones;
        dentro de las que destacan los Servicios de Atención Psiquiátrica (SAP), la Comisión Nacional Contra las
        Adicciones (CONADIC), así como del Consejo Nacional de Salud Mental (CONSAME) de la Secretaria de Salud y el
        Fondo de Naciones Unidas para la Infancia (UNICEF), creó el Componente “Contacto Joven, Red Nacional de Atención
        Juvenil”, con el objetivo general de contribuir a mejorar la calidad de vida de las personas adolescentes,
        jóvenes y de sus comunidades durante y después de la emergencia sanitaria derivada del COVID-19, a través de
        acciones de atención a la salud mental, derivación en situaciones de violencias, apoyo intergeneracional y
        acciones educativas.
        <br><br>
        Poniendo a la disposición de las juventudes mexicanas un servicio de acompañamiento psicoemocional, el cual
        funciona a través de la plataforma de U-Partners vinculado a U-Report. U-Partners es un sistema de
        administración de casos y mensajería que funciona a través de WhastApp por medio del cual las y los jóvenes que
        requieren apoyo psicoemocional (personas usuarias) se conectan de forma gratuita, anónima y confidencial con las
        y los participantes de la Red (acompañantes).
      </p>
    </div>

    <div class="container-3">
      <div>
        <img src="../public/recurso2.png">
      </div>
      <div>
        <h3>
          ¿Cómo funciona?
        </h3>
        <p>
          El servicio de acompañamiento psicoemocional inicia cuando las personas usuarias envían la palabra CONTACTO
          por WhatsApp al 55 79 00 96 69, donde un chatbot recoge los datos sociodemográficos para dar paso al
          acompañamiento entre pares. Este, se mantiene a través de una conversación de Whatsapp entre la persona
          usuaria y la persona acompañante.
        </p>
      </div>
    </div>

    <div class="container-4">
      <h3>¿Qué casos atienden?</h3>
      <p>
        Las y los acompañantes atienden casos relacionados a estrés, la ansiedad y el manejo de emociones, y canalizan a
        servicios especializados aquellos casos que presenten problemáticas asociadas a situaciones de violencia,
        consumo problemático de sustancias, daño autoinfligido e ideación suicida. En CONTACTO JOVEN no se ofrece
        psicoterapia o tratamiento psiquiátrico.
      </p>
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
          <?= htmlspecialchars($fila['TELEFONO']); ?> o <br>
        </h3>

        <div class="boton">
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