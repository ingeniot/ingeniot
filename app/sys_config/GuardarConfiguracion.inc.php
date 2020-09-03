<?php
//include (dirname(__FILE__).'/bd.inc.php');
include_once "../usuarios/ControlSesion.inc.php";
include_once "../sql/Conexion.inc.php";
include_once "./RepositorioSysConfig.inc.php";
if (!ControlSesion::sesion_iniciada()) //Control de usuario logeado
{
  echo "Ingreso no autorizado";
  die();
}
Conexion::abrir_conexion();//Conecta con la base de datos
if (isset($_POST["llave"])) {  //Hace la validación si se pulso el boton Enviar datos
  $llave=$_POST["llave"];
  $json=$_POST["json"];
  //$json_string = json_encode($json);
  //echo "json_string=".$json_string;
  //echo "json_recibido=".$json;
  //  $validador = new ValidadorGrupoEditado($_POST["nombre"], $_POST["nombre_original"], $_POST["tipo"], $_POST["tipo_original"],Conexion::obtener_conexion()); //Crea una instancia para validacion de los datos enviados
  $validador = true; //falta hacer validacion
  //if ($validador->registro_valido()) { //Verifica que todos los datos ingresados sean validos
  if ($validador) {
    //echo "editado=".$config_editada;

    //    $grupo_editado = RepositorioGrupo::actualizar_grupo(Conexion::obtener_conexion(), $id, $validador->obtener_nombre(),$validador->obtener_tipo());
    if(RepositorioSysConfig::llave_existe(Conexion::obtener_conexion(),$llave)){
      $config_editada = RepositorioSysConfig::actualizar_json(Conexion::obtener_conexion(), $llave, $json);
    }
    else
    {
      $config_editada=RepositoriosysConfig::crear_json(Conexion::obtener_conexion(),$llave,$json);
    }
    if(!$config_editada){
      $json_string = json_encode(array("error_sql"=>true));
    }
    else{
      //      $json_string = json_encode(array("cambios"=>$validador->hay_cambios(),"valido"=>$validador->registro_valido(),"error_nombre"=>$validador->obtener_error_nombre(),"error_tipo"=>$validador->obtener_error_tipo()));
      $json_string = json_encode(array("cambios"=>true,"valido"=>true,"error_nombre"=>"","error_tipo"=>""));
    }
  }
  else{
    //    $json_string = json_encode(array("cambios"=>$validador->hay_cambios(),"valido"=>$validador->registro_valido(),"error_nombre"=>$validador->obtener_error_nombre(),"error_tipo"=>$validador->obtener_error_tipo()));
    $json_string = json_encode(array("cambios"=>false,"valido"=>false,"error_tipo"=>""));
  }
    echo $json_string;
}
?>
