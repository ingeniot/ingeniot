<?php
//include (dirname(__FILE__).'/bd.inc.php');
include_once "../usuarios/ControlSesion.inc.php";
include_once "./ValidadorTableroNuevo.inc.php";
include_once "../sql/Conexion.inc.php";
include_once "./RepositorioTablero.inc.php";
if (!ControlSesion::sesion_iniciada()) //Control de usuario logeado
{
  echo "Ingreso no autorizado";
  die();
}
if (isset($_POST["nombre"])) {  //Hace la validación si se pulso el boton Enviar datos
Conexion::abrir_conexion();//Conecta con la base de datos
  $validador = new ValidadorTableroNuevo($_POST["nombre"], $_POST["tipo"],Conexion::obtener_conexion()); //Crea una instancia para validacion de los datos enviados
  if ($validador->registro_valido()) { //Verifica que todos los datos ingresados sean validos
      $tablero = new Tablero("",
    $validador->obtener_nombre(),
    "","",
    $validador->obtener_tipo(),
    "","",
    $_SESSION["id_grupo"]
  );
/*
    echo "tablero->";
    var_dump ($tablero);
    die();*/
      $tablero_insertado = RepositorioTablero::insertar_tablero(Conexion::obtener_conexion(), $tablero);
  //$json_string = json_encode($validador);
  //echo "$json_string";
    //echo "tablero agregado";
  }
  else {
      //echo "tablero no agregado";
  }
      Conexion::cerrar_conexion();
   $json_string = json_encode(array("valido"=>$validador->registro_valido(),"error_nombre"=>$validador->obtener_error_nombre(),"error_tipo"=>$validador->obtener_error_tipo()));
   echo $json_string;

  // echo json_encode(array('success' => 1));
}
?>
