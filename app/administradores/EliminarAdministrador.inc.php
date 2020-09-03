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
$eliminado =RepositorioAdministrador::eliminar_administrador(Conexion::obtener_conexion(),$id_administrador);
$json_string = json_encode(array("eliminado"=>$eliminado));
echo $json_string;
}
?>
