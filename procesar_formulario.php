<?php
  // Verificar si se recibieron los datos del formulario
  if(isset($_POST['nombre']) && isset($_POST['email']) && isset($_POST['mensaje'])) {
    // Asignar los valores de los campos del formulario a variables
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $mensaje = $_POST['mensaje'];

    // Realizar validaciones si es necesario

    // Enviar un correo electrónico
    $destinatario = 'juampicalabro97@gmail.com';
    $asunto = 'Mensaje enviado desde el formulario de contacto de antiguohobby';
    $mensaje = "Nombre: $nombre\nEmail: $email\nMensaje: $mensaje";
    $cabeceras = "From: $email\r\nReply-To: $email\r\n";
    mail($destinatario, $asunto, $mensaje, $cabeceras);

    // Guardar los datos en una base de datos si es necesario

    // Redirigir al usuario a una página de confirmación
    header('Location: index.html');
    exit();
  } else {
    // Si no se recibieron los datos del formulario, redirigir al usuario a una página de error
    header('Location: contacto.html');
    exit();
  }
?>