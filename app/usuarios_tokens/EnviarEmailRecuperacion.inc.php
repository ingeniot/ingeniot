<?php
include_once "./app/email/PHPMailer.php";
include_once RUTA_APP_SYS_CONFIG."RepositorioSysConfig.inc.php";
include RUTA_APP_USUARIOS_TOKENS."CuerpoEmailRecuperacion.inc.php";
//echo $cuerpo;
/*function get_include_contents($filename) {
    if (is_file($filename)) {
        ob_start();
        include $filename;
        return ob_get_clean();
    }
    return false;
}*/

//include_once "./app/email/Exception.php";
//require_once "vendor/autoload.php";
//require_once "constants.php";
$llave="correo";
Conexion::abrir_conexion();//Conecta con la base de datos
$json_correo=RepositorioSysConfig::obtener_json_por_llave(Conexion::obtener_conexion(),$llave);
$parametros_correo=json_decode($json_correo);
/*
echo $json_correo;
echo "<br>";
echo "<br>";
var_dump($parametros_correo);
echo "<br>";
echo $token;
echo "<br>";
echo $parametros_correo->email;
die();
*/
Conexion::cerrar_conexion();
//$cuerpo= "'<b> Cuerpo de prueba incluido</b>'";

$mail = new PHPMailer(true);
try {
    $mail->isSMTP();
    $mail->Host = $parametros_correo->servidor;  //gmail SMTP server
    $mail->SMTPAuth = true;
    $mail->Username = $parametros_correo->usuario;   //username
    $mail->Password = $parametros_correo->clave;   //password
    $mail->SMTPSecure = 'ssl';
    $mail->Port = $parametros_correo->puerto;                    //smtp port

    $mail->setFrom($parametros_correo->email, ' ');
    $mail->addAddress($email, ' ');

    //$mail->addAttachment(__DIR__ . '/attachment1.png');
    //$mail->addAttachment(__DIR__ . '/attachment2.png');

    $mail->isHTML(true);
    $mail->Subject = 'Recuperar clave IngenIoT';
      // $mail->Body    = '<b> Cuerpo de prueba</b>';
      //  $mail->Body    = get_include_contents(RUTA_USUARIOS_TOKENS."CuerpoEmailRecuperacion.inc.php");
        $mail->Body    =  $cuerpo;
    //$mail->Body    = include RUTA_USUARIOS_TOKENS."CuerpoEmailRecuperacion.inc.php";

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo 'Message could not be sent. Mailer Error: '. $mail->ErrorInfo;
}
//die();

?>
