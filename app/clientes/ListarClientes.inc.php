<?php
include_once "../usuarios/ControlSesion.inc.php";
include_once "./ValidadorCliente.inc.php";
include_once "../sql/Conexion.inc.php";
include_once "./RepositorioCliente.inc.php";
if (!ControlSesion::sesion_iniciada()) //Control de usuario logeado
{
  echo "Ingreso no autorizado";
  die();
}
if (isset($_SESSION["id_usuario"])) {
$id_cliente=$_SESSION["id_usuario"];
Conexion::abrir_conexion();//Conecta con la base de datos
$Clientes=RepositorioCliente::obtener_todos(Conexion::obtener_conexion());
Conexion::cerrar_conexion();
$json_Clientes = array();
if ($Clientes) {
  foreach ($Clientes as $Cliente) {
    $json_Clientes[]= array(
      "id"=>$Cliente->obtener_id(),
      "fecha"=>$Cliente->obtener_fecha_registro(),
      "nombre"=>$Cliente->obtener_nombre(),
      "tipo"=>$Cliente->obtener_tipo()
    );
  }
}
$json_string_Clientes = json_encode($json_Clientes);
echo $json_string_Clientes;
}
