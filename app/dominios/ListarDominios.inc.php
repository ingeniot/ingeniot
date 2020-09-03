<?php
include_once "../usuarios/ControlSesion.inc.php";
include_once "../sql/Conexion.inc.php";
include_once "./RepositorioDominio.inc.php";
include_once "../clientes/RepositorioCliente.inc.php";
if (!ControlSesion::sesion_iniciada()) //Control de usuario logeado
{
  echo "Ingreso no autorizado";
  die();
}
$id_grupo=$_SESSION["id_grupo"];
Conexion::abrir_conexion();//Conecta con la base de datos
$dominios_usuario=RepositorioDominio::obtener_dominios_por_id_grupo(Conexion::obtener_conexion(),$id_grupo);
$json_dominios = array();
if ($dominios_usuario) {
  foreach ($dominios_usuario as $dominio) {
    $id_cliente=$dominio->obtener_id_cliente();
    if($id_cliente){
    $cliente=RepositorioCliente::obtener_cliente_por_id(Conexion::obtener_conexion(),$id_cliente);
      $nombre_cliente=$cliente->obtener_nombre();
    }
    else {
      $nombre_cliente="No asignado";
    }
    $json_dominios[]= array(
      "id"=>$dominio->obtener_id(),
      "fecha"=>$dominio->obtener_fecha_registro(),
      "nombre"=>$dominio->obtener_nombre(),
      "tipo"=>$dominio->obtener_tipo(),
      "etiqueta"=>$dominio->obtener_etiqueta(),
      "cliente"=>$nombre_cliente,
    );
  }
}
Conexion::cerrar_conexion();

$json_string_dominios = json_encode($json_dominios);
echo $json_string_dominios;
