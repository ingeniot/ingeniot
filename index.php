
<?php
/*
echo dirname(__dir__);
echo dirname(__file__);
*//*
echo "REQUEST_URI=>";
echo $_SERVER["REQUEST_URI"];
die();*/
//include (dirname(__dir__).'/conf/config.inc.php');
//phpinfo();
include_once "conf/config.inc.php";
include_once "app/usuarios/ControlSesion.inc.php";
include_once "app/Redireccion.inc.php";
//include_once RUTA_SQL."Conexion.inc.php";
/*
echo "ruta=>";
echo $componentes_url;
echo "<br>";
*/

$componentes_url =parse_url($_SERVER["REQUEST_URI"]);
/*
echo "ruta=>";
echo $componentes_url;
echo "<br>";
*/
$ruta=$componentes_url["path"];//Obtiene de la url la ruta interna, empezando por la barra luego del dominio
/*
echo "ruta=>";
echo $ruta;
echo "<br>";
*/
$niveles_ruta=explode("/",$ruta);// Arma un array con los niveles de la ruta empezando por el elmento previo a la una barra. El primer elemento esta vacio

/*echo "niveles_ruta(explode)=>";
echo "<br>";
echo $niveles_ruta[0];
echo "<br>";
echo $niveles_ruta[1];
echo "<br>";
echo $niveles_ruta[2];
echo "<br>";
*/
$niveles_ruta=array_filter($niveles_ruta);// Los elementos vacios, toman el valor null
/*
echo "niveles_ruta(filter)=>";
echo "<br>";
echo $niveles_ruta[0];
echo "<br>";
echo $niveles_ruta[1];
echo "  ";
echo $niveles_ruta[2];
echo "<br>";
*/
$niveles_ruta=array_slice($niveles_ruta,0);//Elimina los elementos null
$ruta_elegida="vistas/404.php";
/*
echo "niveles_ruta(slice)=>";
echo "<br>";
echo $niveles_ruta[0];
echo "<br>";
echo $niveles_ruta[1];
echo "<br>";
echo $niveles_ruta[2];
echo "<br>";
echo count($niveles_ruta);
echo "<br>";
die();
*/
if(count($niveles_ruta)==0){
  $niveles_ruta[0]="inicio";
}
/*
echo "niveles_ruta(slice)=>";
echo "<br>";
echo $niveles_ruta[0];
echo "<br>";
echo $niveles_ruta[1];
echo "<br>";
echo $niveles_ruta[2];
echo "<br>";
echo count($niveles_ruta);
die();*/
switch (count($niveles_ruta)) {
    case 1:
    switch ($niveles_ruta[0]) {
      case "inicio":
      $ruta_elegida = "vistas/inicio.php";
      break;
      case "sysadmin":
      $ruta_elegida = "vistas/sysadmin.php";
      break;
      case "administrador":
      $ruta_elegida = "vistas/administrador.php";
      break;
      case "usuario":
      $ruta_elegida = "vistas/usuario.php";
      break;
      case "demo":
      $ruta_elegida = "vistas/demo.php";
      break;
      case "reglas":
      $ruta_elegida = "vistas/reglas.php";
      break;
      case "clientes":
      $ruta_elegida = "vistas/clientes.php";
      break;
      case "usuarios":
      $ruta_elegida = "vistas/usuarios.php";
      break;
      case "dominios":
      $ruta_elegida = "vistas/dominios.php";
      break;
      case "gestion_dominios":
      $ruta_elegida = "vistas/gestion_dominios.php";
      break;
      case "dispositivos":
      $ruta_elegida = "vistas/dispositivos.php";
      break;
      case "gestion_dispositivos":
      $ruta_elegida = "vistas/gestion_dispositivos.php";
      break;
      case "entidades":
      $ruta_elegida = "vistas/entidades.php";
      break;
      case "gestion_entidades":
      $ruta_elegida = "vistas/gestion_entidades.php";
      break;
      case "recursos":
      $ruta_elegida = "vistas/recursos.php";
      break;
      case "recursos":
      $ruta_elegida = "vistas/gestion_recursos.php";
      break;
      case "recursos_libreria":
      $ruta_elegida = "vistas/recursos_libreria.php";
      break;
      case "tableros":
      $ruta_elegida = "vistas/tableros.php";
      break;
      case "gestion_tableros":
      $ruta_elegida = "vistas/gestion_tableros.php";
      break;
      case "registros":
      $ruta_elegida = "vistas/registros.php";
      break;
      case "grupos":
      $ruta_elegida = "vistas/grupos.php";
      break;
      case "administradores":
      $ruta_elegida = "vistas/administradores.php";
      break;
      case "configuracion":
      $ruta_elegida = "vistas/configuracion.php";
      break;
      case "correo":
      $ruta_elegida = "vistas/correo.php";
      break;
      case "seguridad":
      $ruta_elegida = "vistas/seguridad.php";
      break;
      case "logout":
      $ruta_elegida = "vistas/logout.php";
      break;
      case "denegado":
      $ruta_elegida = "vistas/denegado.php";
      break;
      case "recuperar_clave":
      $ruta_elegida = "vistas/recuperar_clave.php";
      break;
      case "clave_actualizada":
      $ruta_elegida = "vistas/clave_actualizada.php";
      break;
      case "generar_token":
      $ruta_elegida = "vistas/generar_token.php";
      break;
      case "email":
      $ruta_elegida = "vistas/email.php";
      break;
      case "perfil":
      $ruta_elegida = "vistas/perfil.php";
      break;
      default:
      break;
    }
  case 2:
      switch ($niveles_ruta[0]) {
        case "resetear_clave":
        $token_recibido=$niveles_ruta[1];
        $ruta_elegida = "vistas/resetear_clave.php";
        break;
        case "activar_usuario":
        $token_recibido=$niveles_ruta[1];
        $ruta_elegida = "vistas/activar_usuario.php";
        break;
        default:
        break;
      }
  case 3:
  // code...
  break;
  default:
  // code...
  break;
}

include_once $ruta_elegida;
?>
