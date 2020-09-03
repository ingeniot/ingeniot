<?php
include_once "../usuarios/ControlSesion.inc.php";
include_once "../sql/Conexion.inc.php";
include_once "./RepositorioDispositivo.inc.php";
include_once "../clientes/RepositorioCliente.inc.php";
if (!ControlSesion::sesion_iniciada()) //Control de usuario logeado
{
  echo "Ingreso no autorizado";
  die();
}
if (isset($_POST["id"])) {
$id_dispositivo=$_POST["id"];
Conexion::abrir_conexion();//Conecta con la base de datos
$dispositivo=RepositorioDispositivo::obtener_dispositivo_por_id(Conexion::obtener_conexion(),$id_dispositivo);
$id_cliente=$dispositivo->obtener_id_cliente();
if($id_cliente){
$cliente=RepositorioCliente::obtener_cliente_por_id(Conexion::obtener_conexion(),$id_cliente);
$nombre_cliente=$cliente->obtener_nombre();
}
else {
  $nombre_cliente="No asignado";
}
Conexion::cerrar_conexion();
$json_dispositivo = array();
if ($dispositivo) {
    $json_dispositivo= array(
      "id"=>$dispositivo->obtener_id(),
      "fecha"=>$dispositivo->obtener_fecha_registro(),
      "nombre"=>$dispositivo->obtener_nombre(),
      "tipo"=>$dispositivo->obtener_tipo(),
      "etiqueta"=>$dispositivo->obtener_etiqueta(),
      "descripcion"=>$dispositivo->obtener_descripcion(),
      "cliente"=>$nombre_cliente
        );
  }

$json_string_dispositivo = json_encode($json_dispositivo);
echo $json_string_dispositivo;
}
?>
