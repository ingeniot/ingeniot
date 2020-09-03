<?php
//include (dirname(__FILE__).'/bd.inc.php');
include_once "../usuarios/ControlSesion.inc.php";
//include dirname(__FILE__)."/ValidadorGrupoNuevo.inc.php";
include_once "../sql/Conexion.inc.php";
//include dirname(__FILE__)."/RepositorioGrupo.inc.php";
include_once "ValidadorGrupoNuevo.inc.php";
include_once "RepositorioGrupo.inc.php";
if (!ControlSesion::sesion_iniciada()) //Control de usuario logeado
{
  echo "Ingreso no autorizado";
  die();
}
if (isset($_POST["nombre"])) {  //Hace la validación si se pulso el boton Enviar datos
Conexion::abrir_conexion();//Conecta con la base de datos
  $id_cliente=$_SESSION["id_usuario"];
  $validador = new ValidadorGrupoNuevo($_POST["nombre"], $_POST["tipo"],Conexion::obtener_conexion()); //Crea una instancia para validacion de los datos enviados
  if ($validador->registro_valido()) { //Verifica que todos los datos ingresados sean validos
      $grupo = new Grupo("",
    $validador->obtener_nombre(),
    "","",
    $validador->obtener_tipo(),
    $_POST["pais"],
    $_POST["estado"],
    $_POST["ciudad"],
    $_POST["direccion"],
    $_POST["telefono"],
    $_POST["email"]
  );
      $grupo_insertado = RepositorioGrupo::insertar_grupo(Conexion::obtener_conexion(), $grupo);
  //$json_string = json_encode($validador);
  //echo "$json_string";
    //echo "grupo agregado";
  }
  else {
      //echo "grupo no agregado";
  }
      Conexion::cerrar_conexion();
   $json_string = json_encode(array("valido"=>$validador->registro_valido(),"error_nombre"=>$validador->obtener_error_nombre(),"error_tipo"=>$validador->obtener_error_tipo()));
   echo $json_string;

  // echo json_encode(array('success' => 1));
}
?>
