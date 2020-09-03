<?php
//include (dirname(__FILE__).'/bd.inc.php');
include_once "../usuarios/ControlSesion.inc.php";
include_once "./ValidadorAdministradorEditado.inc.php";
include_once "../sql/Conexion.inc.php";
include_once "./RepositorioAdministrador.inc.php";
if (!ControlSesion::sesion_iniciada()) //Control de usuario logeado
{
  echo "Ingreso no autorizado";
  die();
}
Conexion::abrir_conexion();//Conecta con la base de datos
if (isset($_POST["nombre"])) {  //Hace la validación si se pulso el boton Enviar datos
  $id=$_POST["id"];

  //$id_cliente=$_SESSION["id_usuario"];
  $validador = new ValidadorAdministradorEditado($_POST["email"], $_POST["email_original"], $_POST["nombre"], $_POST["nombre_original"], $_POST["apellido"], $_POST["apellido_original"], $_POST["descripcion"], $_POST["descripcion_original"],Conexion::obtener_conexion()); //Crea una instancia para validacion de los datos enviados
  if ($validador->registro_valido()) { //Verifica que todos los datos ingresados sean validos
    $administrador_editado = RepositorioAdministrador::actualizar_administrador(Conexion::obtener_conexion(), $id,
    $validador->obtener_email(),$validador->obtener_nombre(),$validador->obtener_apellido(),$_POST["descripcion"]);
    if(!$administrador_editado){
      $json_string = json_encode(array("error_sql"=>true));
      echo $json_string;
    }
      else{
        $json_string = json_encode(array("cambios"=>$validador->hay_cambios(),"valido"=>$validador->registro_valido(),"error_email"=>$validador->obtener_error_email(),"error_nombre"=>$validador->obtener_error_nombre(),"error_apellido"=>$validador->obtener_error_apellido()));
        echo $json_string;
      }
    }
  else{
    $json_string = json_encode(array("cambios"=>$validador->hay_cambios(),"valido"=>$validador->registro_valido(),"error_email"=>$validador->obtener_error_email(),"error_nombre"=>$validador->obtener_error_nombre(),"error_apellido"=>$validador->obtener_error_apellido()));
    echo $json_string;
  }

}
?>
