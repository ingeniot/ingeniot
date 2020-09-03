<?php
include_once "../usuarios/ControlSesion.inc.php";
include_once "../sql/Conexion.inc.php";
include_once "./RepositorioUsuario.inc.php";
if (!ControlSesion::sesion_iniciada()) //Control de usuario logeado
{
  echo "Ingreso no autorizado";
  die();
}
if (isset($_SESSION["id_usuario"])) {
$id_usuario=$_SESSION["id_usuario"];
$id_cliente=$_POST["id_cliente"];
Conexion::abrir_conexion();//Conecta con la base de datos
$usuarios=RepositorioUsuario::obtener_usuarios_por_id_cliente(Conexion::obtener_conexion(),$id_cliente);
Conexion::cerrar_conexion();
$json_usuarios = array();
if ($usuarios) {
  foreach ($usuarios as $usuario) {
    $json_usuarios[]= array(
      "id"=>$usuario->obtener_id(),
      "fecha"=>$usuario->obtener_fecha_registro(),
      "nombre"=>$usuario->obtener_nombre(),
      "apellido"=>$usuario->obtener_apellido(),
      "email"=>$usuario->obtener_email()
    );
  }
}
/*
echo var_dump($usuarios);
die();*/
$json_string_usuarios = json_encode($json_usuarios);
echo $json_string_usuarios;
}
