<?php

//include_once "RepositorioUsuario.inc.php";

class ValidadorRegistro {

    private $aviso_inicio;
    private $aviso_cierre;
    private $nombre;
    private $email;
    private $clave;
    private $error_nombre;
    private $error_email;
    private $error_clave;
    private $error_clave1;

    public function __construct($nombre, $email, $clave, $claver, $conexion) {

        $this->aviso_inicio = "<br> <div class= 'alert alert-danger' role='alert'>";
        $this->aviso_cierre = "</div>";

        $this->nombre = "";
        $this->email = "";
        $this->clave = "";
        $this->error_nombre = $this->validar_nombre($conexion, $nombre);
        $this->error_email = $this->validar_email($conexion, $email);
        $this->error_clave = $this->validar_clave($clave);
        $this->error_claver = $this->validar_clave1($claver, $clave);
        if ($this->error_clave === "" && $this->error_claver === "") {
            $this->clave = $clave;
        }

    }

    private function variable_iniciada($variable) {
        if (isset($variable) && !empty($variable)) {
            return true;
        } else {
            return false;
        }
    }

    private function validar_nombre($conexion, $nombre) {

        if (!$this->variable_iniciada($nombre)) {
            return "Debes escribir un nombre de usuario";
        } else {
            $this->nombre = $nombre;
        }
        if (strlen($nombre) < 4) {
            return "el nombre debe tener al menos 4 caracteres";
        }
        if (strlen($nombre) > 25) {
            return "el nombre debe  tener menos de 25 caracteres";
        }
        if (RepositorioUsuario::nombre_existe($conexion, $nombre)) {
            return "El nombre de usuario ya esta en uso";
        }
        return"";
    }

    private function validar_email($conexion, $email) {

        if (!$this->variable_iniciada($email)) {
            return"Debes escribir un email";
        } else {
            $this->email = $email;
        }
        if (RepositorioUsuario::email_existe($conexion, $email)) {
            return "El correo ya esta en uso";
        }
        return "";
    }

    private function validar_clave($clave) {
        if (!$this->variable_iniciada($clave)) {
            return"Debes escribir una clave";
        }
        return"";
    }

    private function validar_clave1($clave, $claver) {

        if (!$this->variable_iniciada($claver)) {
            return"Debes repetir la clave";
        }
        if (!$this->variable_iniciada($clave)) {
            return"Debes primero ingresar la clave";
        }
        if ($claver !== $clave) {
            return"Deben coincidir las claves";
        }
        return"";
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

    public function obtener_error_nombre() {
        return $this->error_nombre;
    }

    public function obtener_error_email() {
        return $this->error_email;
    }

    public function obtener_error_clave() {
        return $this->error_clave;
    }

    public function obtener_error_claver() {
        return $this->error_claver;
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

    public function mostrar_email() {
        if ($this->email !== "") {
            echo 'value="' . $this->email . '"';
        }
    }

    public function mostrar_error_email() {
        if ($this->error_email !== "") {
            echo $this->aviso_inicio . $this->error_email . $this->aviso_cierre;
        }
    }

    public function mostrar_error_clave() {
        if ($this->error_clave !== "") {
            echo $this->aviso_inicio . $this->error_clave . $this->aviso_cierre;
        }
    }

    public function mostrar_error_claver() {
        if ($this->error_clave1 !== "") {
            echo $this->aviso_inicio . $this->error_clave1 . $this->aviso_cierre;
        }
    }

    public function registro_valido() {
        if ($this->error_nombre === "" &&
                $this->error_email === "" &&
                $this->error_clave === "" &&
                $this->error_claver === "") {
            return true;
        } else {
            return false;
        }
    }

}
