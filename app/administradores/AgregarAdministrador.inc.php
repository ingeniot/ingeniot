<?php
//include (dirname(__FILE__).'/bd.inc.php');
include_once "../usuarios/ControlSesion.inc.php";
//include dirname(__FILE__)."/ValidadorGrupoNuevo.inc.php";
include_once "../sql/Conexion.inc.php";
//include dirname(__FILE__)."/RepositorioGrupo.inc.php";
include_once "ValidadorAdministradorNuevo.inc.php";
include_once "RepositorioAdministrador.inc.php";
if (!ControlSesion::sesion_iniciada()) //Control de usuario logeado
{
  echo "Ingreso no autorizado";
  die();
}
if (isset($_POST["email"])) {  //Hace la validación si se pulso el boton Enviar datos
Conexion::abrir_conexion();//Conecta con la base de datos
  $id_cliente=$_SESSION["id_usuario"];
  $email=$_POST["email"];
  $nombre=$_POST["nombre"];
  $apellido=$_POST["apellido"];
  $validador = new ValidadorAdministradorNuevo($email, $nombre, $apellido, Conexion::obtener_conexion()); //Crea una instancia para validacion de los datos enviados
  /*echo "validador->";
  var_dump ($validador);
  die();*/
  if ($validador->registro_valido()) { //Verifica que todos los datos ingresados sean validos
      $administrador = new Administrador("",
    $validador->obtener_email(),
    $validador->obtener_nombre(),
    $validador->obtener_apellido(),
    "",
    $_POST["descripcion"],
    "admin",
    0,
    $_POST["id_grupo"]
  );
  $administrador_insertado = RepositorioAdministrador::insertar_administrador(Conexion::obtener_conexion(), $administrador);
  //$json_string = json_encode($validador);
  //echo "$json_string";
    //echo "grupo agregado";
  }
  else {
      //echo "grupo no agregado";
  }
      Conexion::cerrar_conexion();
   $json_string = json_encode(array("valido"=>$validador->registro_valido(),"error_nombre"=>$validador->obtener_error_nombre(),"error_apellido"=>$validador->obtener_error_apellido(),"error_email"=>$validador->obtener_error_email()));
   echo $json_string;

  // echo json_encode(array('success' => 1));
}
?>
