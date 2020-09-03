<?php
include_once "../usuarios/ControlSesion.inc.php";
include_once "../sql/Conexion.inc.php";
include_once "./RepositorioGrupo.inc.php";
if (!ControlSesion::sesion_iniciada()) //Control de usuario logeado
{
  echo "Ingreso no autorizado";
  die();
}
if (isset($_POST["id"])) {
$id_grupo=$_POST["id"];
Conexion::abrir_conexion();//Conecta con la base de datos
$grupo=RepositorioGrupo::obtener_grupo_por_id(Conexion::obtener_conexion(),$id_grupo);
Conexion::cerrar_conexion();
$json_grupo = array();
if ($grupo) {
    $json_grupo= array(
      "id"=>$grupo->obtener_id(),
      "fecha"=>$grupo->obtener_fecha_registro(),
      "nombre"=>$grupo->obtener_nombre(),
      "tipo"=>$grupo->obtener_tipo(),
      "pais"=>$grupo->obtener_pais(),
      "estado"=>$grupo->obtener_estado(),
      "ciudad"=>$grupo->obtener_ciudad(),
      "direccion"=>$grupo->obtener_direccion(),
      "telefono"=>$grupo->obtener_telefono(),
      "email"=>$grupo->obtener_email()

                );
  }

$json_string_grupo = json_encode($json_grupo);
echo $json_string_grupo;
}
?>
