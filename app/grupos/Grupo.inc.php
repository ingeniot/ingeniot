<?php
class Grupo {

    private $id;
    private $nombre;
    private $fecha_registro;
    private $activo;
    private $tipo;
    private $pais;
    private $estado;
    private $ciudad;
    private $direccion;
    private $telefono;
    private $email;
    public function __construct($id, $nombre, $fecha_registro, $activo, $tipo, $pais, $estado, $ciudad, $direccion, $telefono, $email) {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->fecha_registro = $fecha_registro;
        $this->activo = $activo;
        $this->tipo = $tipo;
        $this->email = $email;
        $this->pais = $pais;
          $this->estado = $estado;
        $this->ciudad = $ciudad;
        $this->direccion = $direccion;
        $this->telefono = $telefono;
        $this->email = $email;
    }

//Funciones get

    public function obtener_Id() {
        return $this->id;
    }

    public function obtener_nombre() {
        return $this->nombre;
    }

    public function obtener_fecha_registro() {
        return $this->fecha_registro;
    }

    public function obtener_activo() {
        return $this->activo;
    }

    public function obtener_tipo() {
        return $this->tipo;
    }
    public function obtener_pais() {
        return $this->pais;
    }
    public function obtener_estado() {
        return $this->estado;
    }
    public function obtener_ciudad() {
        return $this->ciudad;
    }
    public function obtener_direccion() {
        return $this->direccion;
    }
    public function obtener_telefono() {
        return $this->telefono;
    }
    public function obtener_email() {
        return $this->email;
    }



//Funciones set

    public function editar_nombre($nombre) {
        $this->nombre = $nombre;
    }

    public function editar_activo($activo) {
        $this->activo = $activo;
    }

}
