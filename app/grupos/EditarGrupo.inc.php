<?php
//include (dirname(__FILE__).'/bd.inc.php');
include_once "../usuarios/ControlSesion.inc.php";
include_once "./ValidadorGrupoEditado.inc.php";
include_once "../sql/Conexion.inc.php";
include_once "./RepositorioGrupo.inc.php";
if (!ControlSesion::sesion_iniciada()) //Control de usuario logeado
{
  echo "Ingreso no autorizado";
  die();
}
Conexion::abrir_conexion();//Conecta con la base de datos
if (isset($_POST["nombre"])) {  //Hace la validación si se pulso el boton Enviar datos
  $id=$_POST["id"];
  $nombre=$_POST["nombre"];
  $tipo=$_POST["tipo"];
  //$id_cliente=$_SESSION["id_usuario"];
  $validador = new ValidadorGrupoEditado($_POST["nombre"], $_POST["nombre_original"], $_POST["tipo"], $_POST["tipo_original"],Conexion::obtener_conexion()); //Crea una instancia para validacion de los datos enviados
  if ($validador->registro_valido()) { //Verifica que todos los datos ingresados sean validos
    $grupo_editado = RepositorioGrupo::actualizar_grupo(Conexion::obtener_conexion(), $id, $validador->obtener_nombre(),$validador->obtener_tipo());
    if(!$grupo_editado){
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
