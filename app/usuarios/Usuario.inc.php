<?php
class Usuario {
    private $id;
    private $nombre;
    private $email;
    private $clave;
    private $fecha_registro;
    private $nivel;
    private $activo;
    private $apellido;
    private $descripcion;
    private $id_cliente;
    private $id_grupo;

    public function __construct($id, $nombre, $email, $clave, $fecha_registro, $nivel, $activo,$apellido,$descripcion, $id_cliente,$id_grupo) {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->email = $email;
        $this->clave = $clave;
        $this->fecha_registro = $fecha_registro;
        $this->nivel = $nivel;
        $this->activo = $activo;
        $this->apellido = $apellido;
        $this->descripcion = $descripcion;
        $this->id_cliente = $id_cliente;
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

    public function obtener_clave() {
        return $this->clave;
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
    public function obtener_id_cliente() {
        return $this->id_cliente;
    }
    public function obtener_id_grupo() {
        return $this->id_grupo;
    }

//Funciones set

    public function editar_nombre($nombre) {
        $this->nombre = $nombre;
    }

    public function editar_clave($clave) {
        $this->clave = $clave;
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

}
