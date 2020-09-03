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
if (isset($_POST["id_cliente"])) {
Conexion::abrir_conexion();//Conecta con la base de datos
$dominio_asignado =RepositorioDominio::actualizar_id_cliente(Conexion::obtener_conexion(),$_POST["id_dominio"],$_POST["id_cliente"]);
Conexion::cerrar_conexion();
if($dominio_asignado){
$json_string = json_encode(array("asignado"=>true));
}
else{
$json_string = json_encode(array("asignado"=>false));
}
echo $json_string;
}
?>
