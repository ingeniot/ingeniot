<?php
include_once "../../conf/config.inc.php";
include_once RUTA_APP_USUARIOS."RepositorioUsuario.inc.php";
include_once RUTA_APP_USUARIOS_TOKENS."TokenUsuario.inc.php";
include_once RUTA_APP_USUARIOS_TOKENS."RepositorioTokenUsuario.inc.php";
include_once RUTA_APP_SQL."Conexion.inc.php";

function sa($longitud){
    $caracteres="0123456789abcdefghijklmnñopqrstuvwxyzABCEDEFGHIJKLMNÑOPQRSTUVWXYZ";
    $numero_caracteres=strlen($caracteres);
    $string_aleatorio="";
    for($i = 0; $i < $longitud; $i++){
        $string_aleatorio.=$caracteres[rand(0,$numero_caracteres-1)];
    }
    return $string_aleatorio;
}
$token_generado=null;
$email = $_POST["email"];
//echo $email;
//die();
if(isset($_POST["email"])){
  Conexion::abrir_conexion();
  if(!RepositorioUsuario::email_existe(Conexion::obtener_conexion(),$email)){
    return;
  }
  $usuario=RepositorioUsuario::obtener_usuario_por_email(Conexion::obtener_conexion(),$email);
  $nombre_usuario=$usuario->obtener_nombre();
  $string_aleatorio=sa(10);
  $token=hash("sha256",$string_aleatorio.$nombre_usuario); //Se usa SHA2 (devuelve una cadena de 64 caracteres), MD5 y SHA1 ya fueron descifrados
  $token_generado=RepositorioTokenUsuario::generar_token(Conexion::obtener_conexion(),$usuario->obtener_id(),$token);
  Conexion::cerrar_conexion();

  // si fallo generar url indicar que hubo error
}
//$mensaje_titulo="";
if($token_generado){
  include "EnviarEmailActivacion.inc.php";
  return("Email de activación enviado");
  }
else{
  $mensaje_titulo="Denegado";
  $mensaje1="Hubo un error";
  $mensaje2="";
}
?>
