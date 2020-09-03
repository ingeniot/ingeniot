<?php
include_once "../usuarios/ControlSesion.inc.php";
include_once "./ValidadorDominio.inc.php";
include_once "../sql/Conexion.inc.php";
include_once "./RepositorioDominio.inc.php";
if (!ControlSesion::sesion_iniciada()) //Control de usuario logeado
{
  echo "Ingreso no autorizado";
  die();
}
if (isset($_POST["id"])) {
$id_dominio=$_POST["id"];
Conexion::abrir_conexion();//Conecta con la base de datos
$eliminado =RepositorioDominio::eliminar_dominio(Conexion::obtener_conexion(),$id_dominio);
$json_string = json_encode(array("eliminado"=>$eliminado));
echo $json_string;
}
?>
