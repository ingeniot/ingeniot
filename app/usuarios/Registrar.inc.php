<?php
//include_once "../../conf/bd.inc.php";
//include_once "../conf/config.inc.php";
include_once "Conexion.inc.php";
include_once "Usuario.inc.php";
include_once "RepositorioUsuario.inc.php";
include_once "ValidadorRegistro.inc.php";
if (isset($_POST["registrar"])) {  //Hace la validación si se pulso el boton Enviar datos
    Conexion::abrir_conexion();
    $nombre = $_POST["nombre"];
    $email = $_POST["email"];
    $clave = $_POST["clave"];
    $claver = $_POST["claver"];
    $nivel = $_POST["nivel"];
    $validador = new ValidadorRegistro($nombre, $email, $clave, $claver,Conexion::obtener_conexion()); //Crea una instancia para validacion de los datos enviados
    if ($validador->registro_valido()) { //Verifica que todos los datos ingresados sean validos
        $usuario = new Usuario("",
                $validador->obtener_nombre(),
                $validador->obtener_email(),
                password_hash($validador->obtener_clave(), PASSWORD_DEFAULT), //Funcion que encripta contraseña. SE le pasa el string a encriptar u el algoritmo a utilizar (PASWORD_DEFAULT)
                "",$nivel,"");
        $usuario_insertado = RepositorioUsuario::insertar_usuario(Conexion::obtener_conexion(), $usuario);
        if ($usuario_insertado) {
            //echo '<meta http-equiv="refresh" content="1; url=registro_correcto.php?nombre=nombre">';
  //      $msg.="Usuario creado correctamente, ingrese haciendo  <a href='dashboard.php'>clic aquí</a> <br>";
        }

    }
    Conexion::cerrar_conexion();
    $json_string = json_encode(array("valido"=>$validador->registro_valido(),"error_nombre"=>$validador->obtener_error_nombre(),"error_email"=>$validador->obtener_error_email(),"error_clave"=>$validador->obtener_error_clave(),"error_claver"=>$validador->obtener_error_claver()));
    echo $json_string;
}
?>
