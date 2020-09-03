<?php
include_once "../usuarios/ControlSesion.inc.php";
include_once "../sql/Conexion.inc.php";
include_once "../clientes/RepositorioCliente.inc.php";
if (!ControlSesion::sesion_iniciada()) //Control de usuario logeado
{
  echo "Ingreso no autorizado";
  die();
}
if (isset($_SESSION["id_usuario"])) {
$id_cliente=$_SESSION["id_usuario"];
Conexion::abrir_conexion();//Conecta con la base de datos
$clientes=RepositorioCliente::obtener_todos(Conexion::obtener_conexion());
Conexion::cerrar_conexion();
$json_clientes = array();
if ($clientes) {
  foreach ($clientes as $cliente) {
    $json_clientes[]= array(
      "id"=>$cliente->obtener_id(),
      "nombre"=>$cliente->obtener_nombre(),
    );
  }
}
$json_string_clientes = json_encode($json_clientes);
echo $json_string_clientes;
}
