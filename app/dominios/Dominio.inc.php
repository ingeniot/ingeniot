<?php
class Dominio {

    private $id;
    private $nombre;
    private $fecha_registro;
    private $activo;
    private $tipo;
    private $id_cliente;
    private $id_grupo;
    private $etiqueta;
    private $descripcion;
    public function __construct($id, $nombre,  $fecha_registro, $activo,$tipo, $id_cliente, $id_grupo, $etiqueta, $descripcion) {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->fecha_registro = $fecha_registro;
        $this->activo = $activo;
        $this->tipo = $tipo;
        $this->id_cliente = $id_cliente;
        $this->id_grupo = $id_grupo;
        $this->etiqueta = $etiqueta;
        $this->descripcion = $descripcion;
    }

//Funciones get

    public function obtener_id() {
        return $this->id;
    }

    public function obtener_nombre() {
        return $this->nombre;
    }

    public function obtener_tipo() {
        return $this->tipo;
    }

    public function obtener_fecha_registro() {
        return $this->fecha_registro;
    }

    public function obtener_activo() {
        return $this->activo;
    }

    public function obtener_id_cliente() {
        return $this->id_cliente;
    }
    public function obtener_id_grupo() {
        return $this->id_grupo;
    }
    public function obtener_etiqueta() {
        return $this->etiqueta;
    }

    public function obtener_descripcion() {
        return $this->descripcion;
    }
//Funciones set

    public function editar_nombre($nombre) {
        $this->nombre = $nombre;
    }

    public function editar_activo($activo) {
        $this->activo = $activo;
    }

}
