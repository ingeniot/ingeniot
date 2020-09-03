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
$id_grupo=$_SESSION["id_grupo"];
Conexion::abrir_conexion();//Conecta con la base de datos
$tableros_grupo=RepositorioTablero::obtener_tableros_por_id_grupo(Conexion::obtener_conexion(),$id_grupo);

$json_tableros = array();
if ($tableros_grupo) {
  foreach ($tableros_grupo as $tablero) {
$id_cliente=$tablero->obtener_clientes_asignados();//provisorio para un cliente
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
    $json_tableros[]= array(
      "id"=>$tablero->obtener_id(),
      "fecha"=>$tablero->obtener_fecha_registro(),
      "nombre"=>$tablero->obtener_nombre(),
      "tipo"=>$tablero->obtener_tipo(),
            "cliente"=>$nombre_cliente
    );
  }
}
Conexion::cerrar_conexion();

$json_string_tableros = json_encode($json_tableros);
echo $json_string_tableros;
