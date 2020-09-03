<?php
//include (dirname(__FILE__).'/bd.inc.php');
include_once "../usuarios/ControlSesion.inc.php";
include_once "./ValidadorDominioEditado.inc.php";
include_once "../sql/Conexion.inc.php";
include_once "./RepositorioDominio.inc.php";
if (!ControlSesion::sesion_iniciada()) //Control de usuario logeado
{
  echo "Ingreso no autorizado";
  die();
}
Conexion::abrir_conexion();//Conecta con la base de datos
if (isset($_POST["nombre"])) {  //Hace la validación si se pulso el boton Enviar datos
  //$id_cliente=$_SESSION["id_usuario"];
  $validador = new ValidadorDominioEditado($_POST["nombre"], $_POST["nombre_original"], $_POST["tipo"], $_POST["tipo_original"],
  $_POST["etiqueta"], $_POST["etiqueta_original"], $_POST["descripcion"], $_POST["descripcion_original"],Conexion::obtener_conexion()); //Crea una instancia para validacion de los datos enviados
  if ($validador->registro_valido()) { //Verifica que todos los datos ingresados sean validos
    $dominio_editado = RepositorioDominio::actualizar_dominio(Conexion::obtener_conexion(),  $_POST["id"], $validador->obtener_nombre(),
    $validador->obtener_tipo(),$validador->obtener_etiqueta(),$validador->obtener_descripcion());
    if(!$dominio_editado){
      $json_string = json_encode(array("error_sql"=>true));
      echo $json_string;
    }
      else{
        $json_string = json_encode(array("cambios"=>$validador->hay_cambios(),"valido"=>$validador->registro_valido(),"error_nombre"=>$validador->obtener_error_nombre(),"error_tipo"=>$validador->obtener_error_tipo()));
        echo $json_string;
      }
    }
  else{
    $json_string = json_encode(array("cambios"=>$validador->hay_cambios(),"valido"=>$validador->registro_valido(),"error_nombre"=>$validador->obtener_error_nombre(),"error_tipo"=>$validador->obtener_error_tipo()));
    echo $json_string;
  }

}
?>
