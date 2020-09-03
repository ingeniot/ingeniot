<?php
include_once "../usuarios/ControlSesion.inc.php";
include_once "../sql/Conexion.inc.php";
include_once "./RepositorioCliente.inc.php";
if (!ControlSesion::sesion_iniciada()) //Control de usuario logeado
{
  echo "Ingreso no autorizado";
  die();
}
if (isset($_POST["id"])) {
$id_cliente=$_POST["id"];
Conexion::abrir_conexion();//Conecta con la base de datos
$cliente =RepositorioCliente::eliminar_cliente(Conexion::obtener_conexion(),$id_cliente);
$json_string = json_encode(array("eliminado"=>$eliminado));
echo $json_string;
}
?>
