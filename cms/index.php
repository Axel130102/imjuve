<?php
include_once '../php/connection_global.php';

$mensaje = isset($_GET['mensaje']) ? $_GET['mensaje'] : '';
?>

<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login</title>

  <!-- CSS -->
  <link href="/favicon.ico" rel="shortcut icon">
  <link href="https://framework-gb.cdn.gob.mx/assets/styles/main.css" rel="stylesheet">
  <link rel="stylesheet" href="../css/style.css">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
  <!-- Contenido -->
  <br><br>
  <main class="page">
    <div class="container">
      <?php if ($mensaje): ?>
        <div class="alert alert-warning" role="alert">
          <?php echo $mensaje; ?>
        </div>
      </div>
    <?php endif; ?>
    <div class="container">
      <div class="login">
        <div class="cajaLogin">
          <form id="login-form" action="../php/validate_user.php" method="post" onsubmit="return validateForm()">
            <img src="../public/IMJUVE_logo.jpeg" height="100px">
            <label for="email">
              <h3>Correo</h3>
            </label>
            <input type="email" id="email" name="email" required
              accept="[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}">
            <label for="password">
              <h3>Contraseña</h3>
            </label>
            <input type="password" id="contrasena" name="password" required>
            <button class="boton" type="button" id="mostrar-ocultar"
              onclick="togglePasswordVisibility()">Mostrar/Ocultar</button>
            <br>
            <button type="submit" class="btn btn-primary" id="submit-btn">Ingresar</button>
          </form>
        </div>
      </div>
    </div>
  </main>

  <!-- JS -->
  <script src="https://framework-gb.cdn.gob.mx/gobmx.js"></script>

  <!-- Boton para mostrar la contraseña -->
  <script>
    const inputContrasena = document.getElementById('contrasena');
    const botonMostrarOcultar = document.getElementById('mostrar-ocultar');

    botonMostrarOcultar.addEventListener('click', () => {
      if (inputContrasena.type === 'password') {
        inputContrasena.type = 'text';
        botonMostrarOcultar.textContent = 'Ocultar';
      } else {
        inputContrasena.type = 'password';
        botonMostrarOcultar.textContent = 'Mostrar';
      }
    });
  </script>
</body>

</html>