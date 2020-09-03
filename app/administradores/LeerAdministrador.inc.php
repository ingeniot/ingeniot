<?php
include_once "../usuarios/ControlSesion.inc.php";
include_once "../sql/Conexion.inc.php";
include_once "./RepositorioAdministrador.inc.php";
if (!ControlSesion::sesion_iniciada()) //Control de usuario logeado
{
  echo "Ingreso no autorizado";
  die();
}
if (isset($_POST["id"])) {
$id_administrador=$_POST["id"];
Conexion::abrir_conexion();//Conecta con la base de datos
$administrador=RepositorioAdministrador::obtener_administrador_por_id(Conexion::obtener_conexion(),$id_administrador);
Conexion::cerrar_conexion();
$json_administrador = array();
if ($administrador) {
    $json_administrador= array(
      "id"=>$administrador->obtener_id(),
      "fecha"=>$administrador->obtener_fecha_registro(),
      "email"=>$administrador->obtener_email(),
      "nombre"=>$administrador->obtener_nombre(),
      "apellido"=>$administrador->obtener_apellido(),
      "descripcion"=>$administrador->obtener_descripcion()
      );
  }

$json_string_administrador = json_encode($json_administrador);
echo $json_string_administrador;
}
?>
