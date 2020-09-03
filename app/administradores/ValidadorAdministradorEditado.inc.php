<?php
include_once "ValidadorAdministrador.inc.php";
include_once "RepositorioAdministrador.inc.php";
class ValidadorAdministradorEditado  extends ValidadorAdministrador{
  private $cambios_realizados;
  private $nombre_original;
  public function __construct($email,$email_original,$nombre,$nombre_original,$apellido,$apellido_original,
  $descripcion,$descripcion_original,$conexion) {
    $this->email = $this->devolver_variable_si_iniciada($email);
    $this->nombre = $this->devolver_variable_si_iniciada($nombre);
    $this->apellido = $this->devolver_variable_si_iniciada($apellido);
    $this->descripcion = $this->devolver_variable_si_iniciada($descripcion);
    $this->email_original = $this->devolver_variable_si_iniciada($email_original);
    $this->nombre_original = $this->devolver_variable_si_iniciada($nombre_original);
    $this->apellido_original = $this->devolver_variable_si_iniciada($apellido_original);
    $this->descripcion_original = $this->devolver_variable_si_iniciada($descripcion_original);
    if($this->email == $this->email_original &&
      $this->nombre == $this->nombre_original &&
       $this->apellido == $this->apellido_original&&
         $this->descripcion == $this->descripcion_original){
         $this->cambios_realizados = false;
       }
    else {
      $this->cambios_realizados = true;
      }
    if($this->cambios_realizados){
      $this->aviso_inicio = "<br> <div class= 'alert alert-danger' role='alert'>";
      $this->aviso_cierre = "</div>";
      if($this->email !== $this->email_original){
        $this->error_email = $this->validar_email($conexion,$this->email);
      }
      else {
        $this->error_email="";
      }
      if($this->nombre !== $this->nombre_original){
        $this->error_nombre = $this->validar_nombre($conexion,$this->nombre);
      }
      else {
        $this->error_nombre="";
      }
      if($this->apellido !== $this->apellido_original){
        $this->error_apellido = $this->validar_apellido($conexion,$this->apellido);
      }
      else {
        $this->error_apellido="";
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
  public function obtener_email_original(){
    return $this->email_original;
  }
  public function obtener_nombre_original(){
    return $this->nombre_original;
  }
  public function obtener_apellido_original(){
    return $this->apellido_original;
  }
}
