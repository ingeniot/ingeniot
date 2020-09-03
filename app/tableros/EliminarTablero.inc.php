<?php
include_once "../usuarios/ControlSesion.inc.php";
include_once "./ValidadorTablero.inc.php";
include_once "../sql/Conexion.inc.php";
include_once "./RepositorioTablero.inc.php";
if (!ControlSesion::sesion_iniciada()) //Control de usuario logeado
{
  echo "Ingreso no autorizado";
  die();
}
if (isset($_POST["id"])) {
$id_tablero=$_POST["id"];
Conexion::abrir_conexion();//Conecta con la base de datos
$eliminado =RepositorioTablero::eliminar_tablero(Conexion::obtener_conexion(),$id_tablero);
$json_string = json_encode(array("eliminado"=>$eliminado));
echo $json_string;
}
?>
