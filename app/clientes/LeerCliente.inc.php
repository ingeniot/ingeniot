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
$cliente=RepositorioCliente::obtener_cliente_por_id(Conexion::obtener_conexion(),$id_cliente);
Conexion::cerrar_conexion();
$json_cliente = array();
if ($cliente) {
    $json_cliente= array(
      "id"=>$cliente->obtener_id(),
      "fecha"=>$cliente->obtener_fecha_registro(),
      "nombre"=>$cliente->obtener_nombre(),
      "tipo"=>$cliente->obtener_tipo(),
      "pais"=>$cliente->obtener_pais(),
      "estado"=>$cliente->obtener_estado(),
      "ciudad"=>$cliente->obtener_ciudad(),
      "direccion"=>$cliente->obtener_direccion(),
      "telefono"=>$cliente->obtener_telefono(),
      "email"=>$cliente->obtener_email()

                );
  }

$json_string_cliente = json_encode($json_cliente);
echo $json_string_cliente;
}
?>
