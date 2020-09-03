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
$id_grupo=$_SESSION["id_grupo"];
Conexion::abrir_conexion();//Conecta con la base de datos
$dispositivos_usuario=RepositorioDispositivo::obtener_dispositivos_por_id_grupo(Conexion::obtener_conexion(),$id_grupo);
$json_dispositivos = array();
if ($dispositivos_usuario) {
  foreach ($dispositivos_usuario as $dispositivo){
    $id_cliente=$dispositivo->obtener_id_cliente();

    if($id_cliente){
    $cliente=RepositorioCliente::obtener_cliente_por_id(Conexion::obtener_conexion(),$id_cliente);
  /*  echo "cliente";
    var_dump($cliente);
    die();*/
      $nombre_cliente=$cliente->obtener_nombre();
    }
    else {
      $nombre_cliente="No asignado";
    }
    $json_dispositivos[]= array(
      "id"=>$dispositivo->obtener_id(),
      "fecha"=>$dispositivo->obtener_fecha_registro(),
      "nombre"=>$dispositivo->obtener_nombre(),
      "tipo"=>$dispositivo->obtener_tipo(),
      "etiqueta"=>$dispositivo->obtener_etiqueta(),
      "descripcion"=>$dispositivo->obtener_descripcion(),
      "cliente"=>$nombre_cliente

    );
  }
}
Conexion::cerrar_conexion();
$json_string_dispositivos = json_encode($json_dispositivos);
echo $json_string_dispositivos;
?>
