<?php
include_once "../usuarios/ControlSesion.inc.php";
include_once "../sql/Conexion.inc.php";
include_once "./RepositorioSysConfig.inc.php";
if (!ControlSesion::sesion_iniciada()) //Control de usuario logeado
{
  echo "Ingreso no autorizado";
  die();
}
if (isset($_POST["llave"])) {
//echo "llave=".$_POST["llave"];
$llave=$_POST["llave"];
Conexion::abrir_conexion();//Conecta con la base de datos
$json_config=RepositorioSysConfig::obtener_json_por_llave(Conexion::obtener_conexion(),$llave);
//echo "json_config=".$json_config;
//die();
//echo "json=".$json_configuracion;
//die();
Conexion::cerrar_conexion();
/*$json_configuracion = array();
if ($configuracion) {
    $json_configuracion= array(
      "id"=>$configuracion->obtener_id(),
      "llave"=>$configuracion->obtener_fecha_registro(),
      "nombre"=>$grupo->obtener_nombre(),
      "tipo"=>$grupo->obtener_tipo(),
      "pais"=>$grupo->obtener_pais(),
      "estado"=>$grupo->obtener_estado(),
      "ciudad"=>$grupo->obtener_ciudad(),
      "direccion"=>$grupo->obtener_direccion(),
      "telefono"=>$grupo->obtener_telefono(),
      "email"=>$grupo->obtener_email()

    );*/
    //$json_string_config = json_encode($json_config);
    echo $json_config;
    }
?>
