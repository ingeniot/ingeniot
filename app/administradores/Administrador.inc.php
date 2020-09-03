<?php
class Administrador{
    private $id;
    private $nombre;
    private $email;
    private $fecha_registro;
    private $nivel;
    private $activo;
    private $apellido;
    private $descripcion;
    private $id_grupo;
    private $id_tablero;
    private $pantalla_completa;
    public function __construct($id,$email, $nombre, $apellido, $fecha_registro, $descripcion, $nivel, $activo, $id_grupo) {
      $this->id = $id;
      $this->email = $email;
      $this->nombre = $nombre;
      $this->apellido = $apellido;
      $this->descripcion = $descripcion;
      $this->fecha_registro = $fecha_registro;
      $this->nivel = $nivel;
      $this->activo = $activo;
      $this->id_grupo = $id_grupo;
    }

//Funciones get

    public function obtener_id() {
        return $this->id;
    }

    public function obtener_nombre() {
        return $this->nombre;
    }

    public function obtener_email() {
        return $this->email;
    }

    public function obtener_fecha_registro() {
        return $this->fecha_registro;
    }

    public function obtener_nivel() {
      return $this->nivel;
    }
    public function obtener_activo() {
        return $this->activo;
    }
    public function obtener_apellido() {
        return $this->apellido;
    }
    public function obtener_descripcion() {
        return $this->descripcion;
    }
    public function obtener_id_grupo() {
        return $this->id_grupo;
    }

//Funciones set


    public function editar_nombre($nombre) {
        $this->nombre = $nombre;
    }

    public function editar_email($email) {
        $this->email = $email;
    }
    public function editar_nivel($nivel) {
        $this->nivel = $nivel;
    }
    public function editar_activo($activo) {
        $this->activo = $activo;
    }

    public function editar_apellido($apellido) {
        $this->apellido = $apellido;
    }
    public function editar_descripcion($descripcion) {
        $this->descripcion = $descripcion;
    }
    public function editar_id_grupo($id_grupo) {
        $this->id_grupo = $id_grupo;
    }
}
