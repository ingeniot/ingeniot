<?php
include_once "../email/PHPMailer.php";

//include_once "./app/email/Exception.php";

//require_once "vendor/autoload.php";
//require_once "constants.php";
$email = $_POST["email"];
$protocolo = $_POST["protocolo"];
$servidor = $_POST["servidor"];
$puerto = $_POST["puerto"];
$timeout = $_POST["timeout"];
$tls = $_POST["tls"];
$version_tls = $_POST["version_tls"];
$usuario = $_POST["usuario"];
$clave = $_POST["clave"];

$mail = new PHPMailer(true);
try {
  $mail->isSMTP();
  $mail->Host = $servidor;  //gmail SMTP server
  $mail->SMTPAuth = true;
  $mail->Username = $usuario;   //username
  $mail->Password = "ingeniot2828";   //password
  $mail->SMTPSecure = 'ssl';
  $mail->Port = $puerto;                    //smtp port

  $mail->setFrom('ingeniotar@gmail.com', 'IngenIoT');
  $mail->addAddress('bachediaz@gmail.com', 'Bachediaz');

  //$mail->addAttachment(__DIR__ . '/attachment1.png');
  //$mail->addAttachment(__DIR__ . '/attachment2.png');

  $mail->isHTML(true);
  $mail->Subject = 'asunto de prueba';
  $mail->Body    = '<b> Cuerpo de prueba</b>';

  $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo 'Message could not be sent. Mailer Error: '. $mail->ErrorInfo;
}
//temp-mail.org
?>
