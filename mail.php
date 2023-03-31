<?php

$nombre = $_POST['nombre'];
$email = $_POST['email'];
$mensaje = $_POST['mensaje'];
$telefono = $_POST['telefono'];

// Captcha

$ip = $_SERVER['REMOTE_ADDR'];
$captcha = $_POST['g-recaptcha-response'];
$secretkey = "6LeV8UolAAAAAKD4rmOAcTLhUzM8ItIiHNhYqnfF";
$respuesta = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$secretkey&response=$captcha&remoteip=$ip");

$response = json_decode($respuesta, TRUE);

 if($response['success'] == FALSE) {
   echo '<script type="text/javascript">alert("Por favor verifícame el captcha, sino pensaremos que eres un robot.")</script>';
   echo '<script type="text/javascript">window.location = "./contacto.html"</script>';
 }

// Mensaje

$cuerpoMensaje = <<<HTML
<h2>Mail desde antiguohobby</h2>
<h4>De:</h4>
<p>$nombre</p>
<h4>E-mail:</h4>
<p>$email</p>
<h4>Telefono:</h4>
<p>$telefono</p>
<h4>Mensaje:</h4>
<p>$mensaje</p>
HTML;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require_once './vendor/autoload.php';

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'juampicalabro97@gmail.com';                     //SMTP username
    $mail->Password   = 'ecqppnnsrowrhgoq';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('juampicalabro97@gmail.com', 'Antiguohobby');
    $mail->addAddress('juampicalabro97@gmail.com', 'Antiguohobby');     //Add a recipient

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Mail desde antiguohobby';
    // $mail->Body    = $cuerpoMensaje;
    $mail->msgHTML($cuerpoMensaje);
    $mail->send();
    echo '<script type="text/javascript">alert("Gracias por tu consulta. En breve nos pondremos en contacto.")</script>';
    echo '<script type="text/javascript">window.location = "./index.html"</script>';
  } catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    echo '<script type="text/javascript">alert("Upss. Hubo un error tu consulta no se puedo enviar correctamente. Por favor intenta nuevamente.")</script>';
    echo '<script type="text/javascript">window.location = "./contacto.html"</script>';
}
?>