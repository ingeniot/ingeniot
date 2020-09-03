<?php
include_once "./ValidadorTablero.inc.php";
include_once "./RepositorioTablero.inc.php";
class ValidadorTableroEditado  extends ValidadorTablero{
  private $cambios_realizados;
  private $nombre_original;
  public function __construct($nombre,$nombre_original,$tipo,$tipo_original,$conexion) {
    $this->nombre = $this->devolver_variable_si_iniciada($nombre);
    $this->tipo = $this->devolver_variable_si_iniciada($tipo);
    $this->nombre_original = $this->devolver_variable_si_iniciada($nombre_original);
    $this->tipo_original = $this->devolver_variable_si_iniciada($tipo_original);
    if($this->nombre == $this->nombre_original &&
       $this->tipo == $this->tipo_original){
         $this->cambios_realizados = false;
       }
    else {
      $this->cambios_realizados = true;
      }
    if($this->cambios_realizados){
      $this->aviso_inicio = "<br> <div class= 'alert alert-danger' role='alert'>";
      $this->aviso_cierre = "</div>";
      if($this->nombre !== $this->nombre_original){
        $this->error_nombre = $this->validar_nombre($conexion,$this->nombre);
      }
      else {
        $this->error_nombre="";
      }
      if($this->tipo !== $this->tipo_original){
        $this->error_tipo = $this->validar_tipo($conexion,$this->tipo);
      }
      else {
        $this->error_tipo="";
      }
    }
    else{
            //echo "no Hay cambios";
      //REdirigir al gestor
    }
  }

  private function devolver_variable_si_iniciada($variable){
    if($this->variable_iniciada($variable)){
      return $variable;
    }
    else {
      return "";
    }
  }
  public function hay_cambios(){
    return $this->cambios_realizados;
  }
  public function obtener_nombre_original(){
    return $this->nombre_original;
  }
  public function obtener_tipo_original(){
    return $this->tipo_original;
  }
}
