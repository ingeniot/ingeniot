<?php
include_once "../usuarios/ControlSesion.inc.php";
include_once "./ValidadorDispositivo.inc.php";
include_once "../sql/Conexion.inc.php";
include_once "./RepositorioDispositivo.inc.php";
if (!ControlSesion::sesion_iniciada()) //Control de usuario logeado
{
  echo "Ingreso no autorizado";
  die();
}
if (isset($_POST["id"])) {
$id_dispositivo=$_POST["id"];
Conexion::abrir_conexion();//Conecta con la base de datos
$eliminado =RepositorioDispositivo::eliminar_dispositivo(Conexion::obtener_conexion(),$id_dispositivo);
$json_string = json_encode(array("eliminado"=>$eliminado));
echo $json_string;
}
?>
