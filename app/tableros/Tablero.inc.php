<?php
class Tablero {

    private $id;
    private $nombre;
    private $fecha_registro;
    private $activo;
    private $tipo;
    private $configuracion;
    private $clientes_asignados;
    private $texto_buscar;
    private $id_grupo;
    public function __construct($id, $nombre, $fecha_registro, $activo, $tipo, $configuracion, $clientes_asignados, $texto_buscar, $id_grupo) {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->fecha_registro = $fecha_registro;
        $this->activo = $activo;
        $this->tipo = $tipo;
        $this->configuracion = $configuracion;
        $this->clientes_asignados = $clientes_asignados;
        $this->texto_buscar = $texto_buscar;
        $this->id_grupo = $id_grupo;
    }

//Funciones get

    public function obtener_id() {
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


    public function obtener_configuracion() {
        return $this->configuracion;
    }
    public function obtener_clientes_asignados() {
        return $this->clientes_asignados;
    }

    public function obtener_texto_buscar() {
        return $this->texto_buscar;
    }

    public function obtener_id_grupo() {
        return $this->id_grupo;
    }
}
