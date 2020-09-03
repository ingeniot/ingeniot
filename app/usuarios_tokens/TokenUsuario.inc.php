<?php
class TokenUsuario{
  private $id;
  private $fecha;
  private $token;
  private $id_usuario;
  public function __construct($id, $fecha, $token, $id_usuario){
    $this->id = $id;
    $this->fecha = $fecha;
    $this->token = $token;
    $this->id_usuario = $id_usuario;
  }
}

 ?>
