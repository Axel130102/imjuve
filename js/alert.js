function Alert(qr){
    Swal.fire({
        position: 'center',
        icon: 'success',
        title: 'La información se ha actualizado correctamente',
        showConfirmButton: false,
        timer: 2000
      })
}

document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('enviar-qr').addEventListener('click', function(e) {
      e.preventDefault();
      Alert();
      // Agrega un temporizador de 5 segundos
      setTimeout(function() {
        document.getElementById('formQr').submit();
      }, 2000);
    });
  });

  function Alert(horario){
    Swal.fire({
        position: 'center',
        icon: 'success',
        title: 'La información se ha actualizado correctamente',
        showConfirmButton: false,
        timer: 2000
      })
}

document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('enviar-horario').addEventListener('click', function(e) {
      e.preventDefault();
      Alert();
      // Agrega un temporizador de 5 segundos
      setTimeout(function() {
        document.getElementById('formHorario').submit();
      }, 2000);
    });
  });

  function Alert(contatco){
    Swal.fire({
        position: 'center',
        icon: 'success',
        title: 'La información se ha actualizado correctamente',
        showConfirmButton: false,
        timer: 2000
      })
}

document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('enviar-contacto').addEventListener('click', function(e) {
      e.preventDefault();
      Alert();
      // Agrega un temporizador de 5 segundos
      setTimeout(function() {
        document.getElementById('formContacto').submit();
      }, 2000);
    });
  });

  function Alert(actualizarCasos){
    Swal.fire({
        position: 'center',
        icon: 'success',
        title: 'La información se ha actualizado correctamente',
        showConfirmButton: false,
        timer: 2000
      })
}

document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('enviarCasosActualizados').addEventListener('click', function(e) {
      e.preventDefault();
      Alert();
      // Agrega un temporizador de 5 segundos
      setTimeout(function() {
        document.getElementById('formActualizarCasos').submit();
      }, 2000);
    });
  });

  function Alert(actualizarToolkit){
    Swal.fire({
        position: 'center',
        icon: 'success',
        title: 'La información se ha actualizado correctamente',
        showConfirmButton: false,
        timer: 2000
      })
}

document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('enviar-Toolkit').addEventListener('click', function(e) {
      e.preventDefault();
      Alert();
      // Agrega un temporizador de 5 segundos
      setTimeout(function() {
        document.getElementById('formToolkit').submit();
      }, 2000);
    });
  });