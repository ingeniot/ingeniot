<?php
include_once "ValidadorCliente.inc.php";
include_once "RepositorioCliente.inc.php";
class ValidadorClienteNuevo extends ValidadorCliente {
  public function __construct($nombre,$tipo,$conexion) {
      $this->aviso_inicio = "<br> <div class= 'alert alert-danger' role='alert'>";
      $this->aviso_cierre = "</div>";
      $this->nombre = "";
      $this->tipo = "";
      $this->error_nombre = $this->validar_nombre($conexion, $nombre);
      $this->error_tipo = $this->validar_tipo($conexion, $tipo);
      }
}
