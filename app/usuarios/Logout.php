
  <?php
  include_once "ControlSesion.inc.php";
  include_once "app/Redireccion.inc.php";
  include_once "./conf/config.inc.php";
  ControlSesion::cerrar_sesion();
  Redireccion::redirigir(SERVIDOR);
?>
