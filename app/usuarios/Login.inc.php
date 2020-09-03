<?php
//include $_SERVER['DOCUMENT_ROOT']."rutas.php";

include_once "ControlSesion.inc.php";
include_once "../sql/Conexion.inc.php";
//include (dirname(__FILE__).'/bd.inc.php');
include_once "ValidadorLogin.inc.php";
if(isset($_POST["login"])){
  $email = $_POST["email"];
  $clave = $_POST["clave"];
  //echo '<script>';
  //echo 'console.log("abrir conexion")';
  //  echo '</script>';
  Conexion::abrir_conexion();//Conectar a la base de datos
  //$email = strip_tags($_POST['email']);
  $validador=new ValidadorLogin($email, $clave,Conexion::obtener_conexion());

  if ($validador->obtener_error()==="" &&
  !is_null($validador->obtener_usuario())){
    ControlSesion::iniciar_sesion(
      $validador->obtener_usuario()->obtener_id(),
      $validador->obtener_usuario()->obtener_nombre(),
      $validador->obtener_usuario()->obtener_nivel(),
      $validador->obtener_usuario()->obtener_id_cliente(),
      $validador->obtener_usuario()->obtener_id_grupo()
    );

      $json_string = json_encode(array("valido"=>true,"nivel"=>$validador->obtener_usuario()->obtener_nivel(),
      "id_cliente"=>$validador->obtener_usuario()->obtener_id_cliente(),"id_grupo"=>$validador->obtener_usuario()->obtener_id_grupo()));
        //echo '<meta http-equiv="refresh" content="1; url=dashboard.php">';
    } else{
      $json_string = json_encode(array("valido"=>false,"error"=>$validador->obtener_error()));
      //echo '<meta http-equiv="refresh" content="5; url=inicio.php">';
    }
    Conexion::cerrar_conexion();//Desconectar a la base de datos
    echo $json_string;
  }
