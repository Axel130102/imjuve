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
  <link rel="stylesheet" href="../css/politica.css">

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
      <img src="../public/recurso4.png">
      <h1>
        POLITICA 
        DE 
        PRIVACIDAD
      </h1>
    </div>

    <div class="container-3">
      <h3>
        Descripción general: <br>
        RapidPro, U-Report y U-Partners
      </h3>
    </div>

    <div class="container-4">
      <div>
        <img src="../public/recurso1.png">
      </div>

      <div>
        <p>
          La oficina de Innovación de UNICEF (Fondo de las Naciones Unidas para la Infancia) desarrolló UReport, una
          herramienta para empoderar a las y los jóvenes y adolescentes a ejercer su derecho a participar. Hay 41
          programas nacionales de U-Report además del proyecto mundial. En México, funciona reuniendo opiniones e
          información de manera anónima y confidencial a través de Facebook Messenger y Whatsapp.
          <br><br>
          RapidPro es la plataforma de software que impulsa U-Report. RapidPro es responsable de todas las interacciones
          con los contactos, en adelante llamados U-Reporters. Una de las formas de utilizar U-Report es a través de
          U-Partners. U-Partners es un panel de administración de mensajes creado para U-Report. U-Partners fue
          desarrollado por la empresa Nyaruka una vez que UNICEF identificó la necesidad de se pudieran gestionar
          mensajes no solicitados.
          <br><br>
          Los mensajes no solicitados son mensajes que no están adjuntos a un flujo o palabra detonadora (trigger) en
          RapidPro. Es decir, son mensajes que no se pide de forma directa, el U-Reporter lo envía por iniciativa
          propia. Estos mensajes entran al panel de U-Partners para ser gestionados directamente por personas. La base
          de código que ejecuta U-Partners se llama CasePro y se mantiene en Github.
          <br><br>
          Puedes conocer más sobre nuestra política de privacidad en este enlace:
          <br><br>
          <a href="https://mexico.ureport.in/page/joven/ ">https://mexico.ureport.in/page/joven/ </a>
        </p>
      </div>
    </div>

    <div class="container-6">
      <div>
        <img src="../public/recurso17.png">
        <p>
          ¿A partir de qué momento <br>
          obtenemos información sobre ti?
        </p>
        <button type="button" data-toggle="modal" data-target="#m1">INFORMACIÓN</button>
      </div>

      <div>
        <img src="../public/recurso16.png">
        <p>
          ¿Qué información <br>
          personal <br>
          recopilamos?<br>
        </p>
        <button type="button" data-toggle="modal" data-target="#m2">INFORMACIÓN</button>
      </div>

      <div>
        <img src="../public/recurso15.png">
        <p>
          Edad mínima y <br>
          consentimiento <br>
          del tutor
        </p>
        <button type="button" data-toggle="modal" data-target="#m3">INFORMACIÓN</button>
      </div>

      <div>
        <img src="../public/recurso14.png">
        <p>
          Necesidad y <br>
          proporcionalidad
        </p>
        <button type="button" data-toggle="modal" data-target="#m4">INFORMACIÓN</button>
      </div>

      <div>
        <img src="../public/recurso13.png">
        <p>
          Propiedad <br>
          de datos
        </p>
        <button type="button" data-toggle="modal" data-target="#m5">INFORMACIÓN</button>
      </div>

      <div>
        <img src="../public/recurso12.png">
        <p>
          Protección de <br>
          datos de canales y medidas de <br>
          seguridad <br>
        </p>
        <button type="button" data-toggle="modal" data-target="#m6">INFORMACIÓN</button>
      </div>
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

    <div class="modal fade" id="m1">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-body">
            <h4> ¿A partir de qué momento obtenemos información sobre ti?</h4>
            <br>
            <p>Cuando contestas que SÍ quieres iniciar comunicación con CONTACTO JOVEN, después de que se despliega el
              link para acceder a este aviso de privacidad. </p>
          </div>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

    <div class="modal fade" id="m2">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-body">
            <h4>¿Qué información personal recopilamos?</h4>
            <br>
            <p>Recopilamos dos tipos de información: información demográfica y sus puntos de vista / experiencias /
              ideas / opiniones.
              <br><br>
              Dentro de la información demográfica se puede incluir nombre, género, edad, estado y municipio en el que
              habita. Esto nos permite analizar mejor la situación emocional, física o mental que quisieras trabajar con
              nosotros. Es valioso porque nos ayuda a comprender mejor tu contexto y brindarte el apoyo adecuado.
            </p>
          </div>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

    <div class="modal fade" id="m3">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-body">
            <h4>Edad mínima y consentimiento del tutor</h4>
            <br>
            <p>U-Report sigue la Ley General de las Niñas, Niños y Adolescentes, y se apoya del Artículo 13 de la
              Convención sobre los Derechos del Niño en torno al derecho del niño a la libertad de expresión.
              <br><br>
              1. U-Report se centra en las personas jóvenes entre 13 y 24 años, pero no excluye a otros participantes.
              Se les pedirá a los niños y adolescentes menores de edad que obtengan el consentimiento de los padres o
              tutores antes de registrarse como U-Reporters y recibir los servicios de CONTACTO JOVEN.
              <br><br>
              2. Dado que la herramienta estará dirigida principalmente a adolescentes mayores de 13 años, reconociendo
              la incapacidad de confirmar efectivamente el consentimiento del tutor sin violar el anonimato, este
              proceso no requerirá ningún medio de consentimiento verificable.
              <br><br>
              3. Las y los acompañantes tendrán en cuenta la restricción de edad dentro de los canales. Casi todos los
              sitios de redes sociales solo permiten usuarios mayores de 13 años, incluido Facebook. La edad mínima es
              de 13 años, para la aplicación de mensajería de teléfono móvil WhatsApp.
            </p>
          </div>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

    <div class="modal fade" id="m4">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-body">
            <h4>Necesidad y proporcionalidad</h4>
            <br>
            <p>
              Las y los supervisoras de CONTACTO JOVEN, se asegurarán de que cada proceso de atención se evite recopilar
              datos confidenciales innecesarios o categorías especiales de datos personales u otros datos intrusivos.
              Esto permitirá proteger a las y los usuarios, ​​incluso en el caso de una violación de seguridad.
              <br><br>
              Cualquier iniciativa de procesamiento de datos a través de U-Report asegurará que:
              <br><br>
              1. Todos los datos sean anónimos de RapidPro. Los números de teléfono y las ID de las redes sociales están
              ocultos para los administradores de Rapid Pro;
              <br><br>
              2. Para mantener el RapidPro anónimo, la información de identificación personal se mantiene al mínimo. No
              se recopilará información directa de identificación personal (DPII). Esto incluye nombres, fecha de
              nacimiento, identificación oficial o direcciones;
              <br><br>
              3. En múltiples ocasiones, se les recordará a las y los usuarios ​​que no deben proporcionar ninguna
              información de identificación personal directa, incluso si se solicita;
              <br><br>
              4. Los procesos de recopilación de datos incluyen un análisis de cómo, incluso si son anónimos, los puntos
              de datos pueden actuar como un identificador indirecto. Solo se recopilarán los datos necesarios, para los
              cuales tienen un uso concreto y específico, y de acuerdo con los principios de necesidad y
              proporcionalidad.
              <br><br>
              5. Las y los supervisoras y acompañantes tendrán en cuenta las políticas de privacidad y protección de
              datos de los canales implementados, evitando recopilar información que pueda ser utilizada para impactar
              negativamente a las y los usuarios ​​por las partes que poseen plataformas de redes sociales u otros
              canales;
              <br><br>
              6. Todas las interacciones con las y los usuarios ​​se realizan a través de RapidPro, y nunca directamente
              a través de las redes sociales.
            </p>
          </div>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

    <div class="modal fade" id="m5">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-body">
            <h4>Propiedad de datos</h4>
            <br>
            <p>
              UNICEF es el propietario exclusivo de los datos compilados, procesados ​​o recibidos por RapidPro. Esto
              incluye todos los datos, incluidos todos los archivos de texto, sonido, software o imagen recopilados y
              almacenados en RapidPro.
              <br><br>
              Nyaruka, el contratista para México de RapidPro, está obligado a tomar medidas para:
              <br><br>
              1. Tratar los datos de UNICEF como confidenciales;
              <br><br>
              2. Usar los Datos de UNICEF solo para cumplir con sus obligaciones bajo el Contrato y para el beneficio
              exclusivo de UNICEF y sus socios;
              <br><br>
              3. Entregar los Datos de UNICEF solo a UNICEF o representantes debidamente autorizados de UNICEF y sus
              socios;
              <br><br>
              4. No divulgar ni transmitir los Datos de UNICEF o sus contenidos a ninguna persona o entidad;
              <br><br>
              5. Proteja la información personal que contiene del mal uso, interferencia y pérdida y del acceso no
              autorizado, modificación o divulgación;
              <br><br>
              6. No utilizará ningún dato de UNICEF en beneficio del contratista o de un tercero y, en particular, no
              participará en la "extracción de datos" de ningún dato o comunicación de UNICEF por o para UNICEF.
              <br><br>
              El contrato del proveedor está de acuerdo con la Norma de UNICEF sobre Seguridad de la Información:
              Gestión de Proveedores e ISO / IEC 27000. También establece procedimientos específicos en los casos en que
              el contratista se encuentra bajo una orden legalmente vinculante u otro instrumento emitido por cualquier
              local, nacional o autoridad o agencia reguladora gubernamental internacional o de aplicación de la ley,
              tribunal, tribunal o árbitro.
            </p>
          </div>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

    <div class="modal fade" id="m6">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-body">
            <h4>Protección de datos de canales y medidas de seguridad</h4>
            <br>
            <p>A medida que la información se recopila y almacena a través de canales, es importante tener en cuenta las
              políticas de protección de datos de los canales que se implementarán desde el principio, particularmente
              aquellos artículos vinculados a la interacción de U-Partners. Los interesados ​​ya han acordado estas
              políticas si están utilizando estas plataformas de redes sociales, sin embargo, es importante tenerlas en
              cuenta al contemplar el procesamiento de información confidencial. </p>
          </div>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->





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