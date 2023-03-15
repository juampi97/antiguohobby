<?php
$nombre = $_POST['nombre'];
$email = $_POST['email'];
$telefono = $_POST['telefono'];
$mensaje = $_POST['mensaje'];

$mensaje = "Este mensaje fue enviado por " . $nombre . "\r\n";
$mensaje = "Su e-mail es: " . $email . "\r\n";
$mensaje = "Su telefono es: " . $telefono . "\r\n";
$mensaje = "Mensaje: " . $_POST['mensaje'] . "\r\n";
$mensaje = "Enviado el " . date('d/m/Y', time());

$para = 'juampicalabro97@gmail.com';
$asunto = 'Mensaje desde antiguohobby.com.ar';

mail($para, $asunto, utf8_decode($mensaje), $header);

header("Location:index.html");

?>