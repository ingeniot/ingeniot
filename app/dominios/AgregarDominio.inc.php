<?php
//include (dirname(__FILE__).'/bd.inc.php');
include_once "../usuarios/ControlSesion.inc.php";
include_once "./ValidadorDominioNuevo.inc.php";
include_once "../sql/Conexion.inc.php";
include_once "./RepositorioDominio.inc.php";
if (!ControlSesion::sesion_iniciada()) //Control de usuario logeado
{
  echo "Ingreso no autorizado";
  die();
}
if (isset($_POST["nombre"])) {  //Hace la validación si se pulso el boton Enviar datos
Conexion::abrir_conexion();//Conecta con la base de datos
  $validador = new ValidadorDominioNuevo($_POST["nombre"], $_POST["tipo"],Conexion::obtener_conexion()); //Crea una instancia para validacion de los datos enviados
  if ($validador->registro_valido()) { //Verifica que todos los datos ingresados sean validos
      $dominio = new Dominio("",
    $validador->obtener_nombre(),
    "","",
    $validador->obtener_tipo(),
    "",$_SESSION["id_grupo"],
    $_POST["etiqueta"],
    $_POST["descripcion"]
  );
/*
    echo "dominio->";
    var_dump ($dominio);
    die();*/
      $dominio_insertado = RepositorioDominio::insertar_dominio(Conexion::obtener_conexion(), $dominio);
  //$json_string = json_encode($validador);
  //echo "$json_string";
    //echo "dominio agregado";
  }
  else {
      //echo "dominio no agregado";
  }
      Conexion::cerrar_conexion();
   $json_string = json_encode(array("valido"=>$validador->registro_valido(),"error_nombre"=>$validador->obtener_error_nombre(),"error_tipo"=>$validador->obtener_error_tipo()));
   echo $json_string;

  // echo json_encode(array('success' => 1));
}
?>
