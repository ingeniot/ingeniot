<?php
class SysConfig{
  private $id;
  private $llave;
  private $json;
  public function __construct($id,$llave, $jsaon){
      $this->$id = $id ;
      $this->$llave = $llave;
      $this->$json = $json;
  }
  //Funciones get
      public function obtener_id() {
          return $this->id;
      }
      public function obtener_llave() {
          return $this->llave;
      }
      public function obtener_json() {
          return $this->json;
      }
      //Funciones set
      public function editar_llave($llave) {
        $this->llave = $llave;
      }
      public function editar_json($json) {
        $this->json = $json;
      }
}

 ?>
