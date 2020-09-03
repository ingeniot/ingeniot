<?php
include_once "../usuarios/ControlSesion.inc.php";
include_once "../sql/Conexion.inc.php";
include_once "./RepositorioTablero.inc.php";
include_once "../clientes/RepositorioCliente.inc.php";
if (!ControlSesion::sesion_iniciada()) //Control de usuario logeado
{
  echo "Ingreso no autorizado";
  die();
}
if (isset($_POST["id"])) {
$id_tablero=$_POST["id"];
Conexion::abrir_conexion();//Conecta con la base de datos
$tablero=RepositorioTablero::obtener_tablero_por_id(Conexion::obtener_conexion(),$id_tablero);
$id_cliente=$tablero->obtener_clientes_asignados();//provisorio para un cliente
if($id_cliente){
$cliente=RepositorioCliente::obtener_cliente_por_id(Conexion::obtener_conexion(),$id_cliente);
$nombre_cliente=$cliente->obtener_nombre();
}
else {
  $nombre_cliente="No asignado";
}
Conexion::cerrar_conexion();
$json_tablero = array();
if ($tablero) {
    $json_tablero= array(
      "id"=>$tablero->obtener_id(),
      "fecha"=>$tablero->obtener_fecha_registro(),
      "nombre"=>$tablero->obtener_nombre(),
      "tipo"=>$tablero->obtener_tipo(),
      "cliente"=>$nombre_cliente
          );
  }

$json_string_tablero = json_encode($json_tablero);
echo $json_string_tablero;
}
?>
