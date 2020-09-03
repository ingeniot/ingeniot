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
if (isset($_POST["id"])) {
$id_dominio=$_POST["id"];
Conexion::abrir_conexion();//Conecta con la base de datos
$dominio=RepositorioDominio::obtener_dominio_por_id(Conexion::obtener_conexion(),$id_dominio);
$id_cliente=$dominio->obtener_id_cliente();
if($id_cliente){
$cliente=RepositorioCliente::obtener_cliente_por_id(Conexion::obtener_conexion(),$id_cliente);
$nombre_cliente=$cliente->obtener_nombre();
}
else {
  $nombre_cliente="No asignado";
}
Conexion::cerrar_conexion();
$json_dominio = array();
if ($dominio) {
    $json_dominio= array(
      "id"=>$dominio->obtener_id(),
      "fecha"=>$dominio->obtener_fecha_registro(),
      "nombre"=>$dominio->obtener_nombre(),
      "tipo"=>$dominio->obtener_tipo(),
      "etiqueta"=>$dominio->obtener_etiqueta(),
      "descripcion"=>$dominio->obtener_descripcion(),
        "cliente"=>$nombre_cliente
          );
  }

$json_string_dominio = json_encode($json_dominio);
echo $json_string_dominio;
}
?>
