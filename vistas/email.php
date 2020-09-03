<?php
include_once "./app/email/PHPMailer.php";

//include_once "./app/email/Exception.php";

//require_once "vendor/autoload.php";
//require_once "constants.php";

$mail = new PHPMailer(true);
try {
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';  //gmail SMTP server
    $mail->SMTPAuth = true;
    $mail->Username = "ingeniotar";   //username
    $mail->Password = "ingeniot2828";   //password
    $mail->SMTPSecure = 'ssl';
    $mail->Port = 465;                    //smtp port

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

?>
