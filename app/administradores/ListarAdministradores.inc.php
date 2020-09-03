<?php
include_once "../usuarios/ControlSesion.inc.php";
include_once "../sql/Conexion.inc.php";
include_once "./RepositorioAdministrador.inc.php";
if (!ControlSesion::sesion_iniciada()) //Control de usuario logeado
{
  echo "Ingreso no autorizado";
  die();
}
if (isset($_SESSION["id_usuario"])) {
$id_cliente=$_SESSION["id_usuario"];
$id_grupo=$_POST["id_grupo"];
Conexion::abrir_conexion();//Conecta con la base de datos
$administradores=RepositorioAdministrador::obtener_administradores_por_id_grupo(Conexion::obtener_conexion(),$id_grupo);
Conexion::cerrar_conexion();
$json_administradores = array();
if ($administradores) {
  foreach ($administradores as $administrador) {
    $json_administradores[]= array(
      "id"=>$administrador->obtener_id(),
      "fecha"=>$administrador->obtener_fecha_registro(),
      "nombre"=>$administrador->obtener_nombre(),
      "apellido"=>$administrador->obtener_apellido(),
      "email"=>$administrador->obtener_email()
    );
  }
}
$json_string_administradores = json_encode($json_administradores);
echo $json_string_administradores;
}
