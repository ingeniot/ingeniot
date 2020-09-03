<?php
include_once "../usuarios/ControlSesion.inc.php";
include_once "../sql/Conexion.inc.php";
include_once "./RepositorioUsuario.inc.php";
if (!ControlSesion::sesion_iniciada()) //Control de usuario logeado
{
  echo "Ingreso no autorizado";
  die();
}
if (isset($_POST["id"])) {
$id_usuario=$_POST["id"];
Conexion::abrir_conexion();//Conecta con la base de datos
$usuario=RepositorioUsuario::obtener_usuario_por_id(Conexion::obtener_conexion(),$id_usuario);
Conexion::cerrar_conexion();
$json_usuario = array();
if ($usuario) {
    $json_usuario= array(
      "id"=>$usuario->obtener_id(),
      "fecha"=>$usuario->obtener_fecha_registro(),
      "email"=>$usuario->obtener_email(),
      "nombre"=>$usuario->obtener_nombre(),
      "apellido"=>$usuario->obtener_apellido(),
      "descripcion"=>$usuario->obtener_descripcion()
      );
  }

$json_string_usuario = json_encode($json_usuario);
echo $json_string_usuario;
}
?>
