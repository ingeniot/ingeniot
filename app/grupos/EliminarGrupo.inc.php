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
$grupo =RepositorioGrupo::eliminar_grupo(Conexion::obtener_conexion(),$id_grupo);
$json_string = json_encode(array("eliminado"=>$eliminado));
echo $json_string;
}
?>
