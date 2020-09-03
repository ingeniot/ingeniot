<?php

//include_once "RepositorioTablero.inc.php";

abstract class ValidadorTablero {   //Cons abstract esta clase no se puede instanciar

    protected $aviso_inicio;
    protected $aviso_cierre;
    protected $nombre;
    protected $tipo;
    protected $error_nombre;
    protected $error_tipo;

    public function __construct() {
      }
    protected function variable_iniciada($variable) {
        if (isset($variable) && !empty($variable)) {
            return true;
        } else {
            return false;
        }
    }

    protected function validar_nombre($conexion, $nombre) {

        if (!$this->variable_iniciada($nombre)) {
            return "Debes escribir un nombre de tablero";
        } else {
            $this->nombre = $nombre;
        }
        if (strlen($nombre) < 1) {
            return "Debe asignar un nombre";
        }
        if (strlen($nombre) > 25) {
            return "el nombre debe  tener menos de 25 caracteres";
        }
        if (RepositorioTablero::nombre_existe($conexion, $nombre)) {
            return "El nombre de tablero ya esta en uso";
        }
        return"";
    }

    protected function validar_tipo($conexion, $tipo) {

        if (!$this->variable_iniciada($tipo)) {
            return "Debes escribir un tipo de tablero";
        } else {
            $this->tipo = $tipo;
        }
        if (strlen($tipo) < 1) {
            return "Debe asignar un tipo";
        }
        if (strlen($tipo) > 25) {
            return "el tipo debe  tener menos de 25 caracteres";
        }
        return"";
    }

    public function obtener_nombre() {
        return $this->nombre;
    }

    public function obtener_error_nombre() {
        return $this->error_nombre;
    }

    public function mostrar_nombre() {
        if ($this->nombre !== "") {
            echo 'value="' . $this->nombre . '"';
        }
    }

    public function mostrar_error_nombre() {
        if ($this->error_nombre !== "") {
            echo $this->aviso_inicio . $this->error_nombre . $this->aviso_cierre;

        }
    }

    public function obtener_tipo() {
        return $this->tipo;
    }

    public function obtener_error_tipo() {
        return $this->error_tipo;
    }

    public function mostrar_tipo() {
        if ($this->tipo !== "") {
            echo 'value="' . $this->tipo . '"';
        }
    }

    public function mostrar_error_tipo() {
        if ($this->error_tipo !== "") {
            echo $this->aviso_inicio . $this->error_tipo . $this->aviso_cierre;
        }
    }
    public function registro_valido() {
        if ($this->error_nombre === ""&&
            $this->error_tipo === "") {
            return true;
        } else {
            return false;
        }
    }

}
