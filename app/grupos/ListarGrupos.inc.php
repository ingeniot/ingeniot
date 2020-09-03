<?php
include_once "../usuarios/ControlSesion.inc.php";
include_once "./ValidadorGrupo.inc.php";
include_once "../sql/Conexion.inc.php";
include_once "./RepositorioGrupo.inc.php";
if (!ControlSesion::sesion_iniciada()) //Control de usuario logeado
{
  echo "Ingreso no autorizado";
  die();
}
if (isset($_SESSION["id_usuario"])) {
$id_cliente=$_SESSION["id_usuario"];
Conexion::abrir_conexion();//Conecta con la base de datos
$grupos=RepositorioGrupo::obtener_todos(Conexion::obtener_conexion());
Conexion::cerrar_conexion();
$json_grupos = array();
if ($grupos) {
  foreach ($grupos as $grupo) {
    $json_grupos[]= array(
      "id"=>$grupo->obtener_id(),
      "fecha"=>$grupo->obtener_fecha_registro(),
      "nombre"=>$grupo->obtener_nombre(),
      "tipo"=>$grupo->obtener_tipo()
    );
  }
}
$json_string_grupos = json_encode($json_grupos);
echo $json_string_grupos;
}
