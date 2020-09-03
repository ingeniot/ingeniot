<?php
//include_once "RepositorioDominio.inc.php";
abstract class ValidadorAdministrador {

  protected $aviso_inicio;
  protected $aviso_cierre;
  protected $email;
  protected $nombre;
  protected $apellido;
  protected $error_email;
  protected $error_nombre;
  protected $error_apellido;

    public function __construct() {
      }

    protected function variable_iniciada($variable) {
        if (isset($variable) && !empty($variable)) {
            return true;
        } else {
            return false;
        }
    }
    protected function validar_email($conexion, $email) {

        if (!$this->variable_iniciada($email)) {
            return"Debes escribir un email";
        } else {
            $this->email = $email;
        }
        if (RepositorioAdministrador::email_existe($conexion, $email)) {
            return "El correo ya esta en uso";
        }
        return "";
    }

    protected function validar_nombre($conexion,$nombre) {

        if (!$this->variable_iniciada($nombre)) {
            return "Debes escribir un nombre";
        } else {
            $this->nombre = $nombre;
        }
/*if (RepositorioAdministrador::email_existe($conexion, $nombre)) {
            return "El nombre ya esta en uso";
        }*/
        if (strlen($nombre) < 1) {
            return "Debe asignar un nombre";
        }
        if (strlen($nombre) > 25) {
            return "el nombre debe  tener menos de 25 caracteres";
        }
        return"";
    }
    protected function validar_apellido($conexion, $apellido) {

        if (!$this->variable_iniciada($apellido)) {
            return "Debes escribir un tipo de grupo";
        } else {
            $this->apellido = $apellido;
        }
        if (strlen($apellido) < 1) {
            return "Debe asignar un tipo";
        }
        if (strlen($apellido) > 25) {
            return "el tipo debe  tener menos de 25 caracteres";
        }
        return"";
    }

    public function obtener_email() {
        return $this->email;
    }

    public function obtener_error_email() {
        return $this->error_email;
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

    public function obtener_apellido() {
        return $this->apellido;
    }

    public function obtener_error_apellido() {
        return $this->error_apellido;
    }

    public function mostrar_apellido() {
        if ($this->apellido !== "") {
            echo 'value="' . $this->apellido . '"';
        }
    }

    public function mostrar_error_apellido() {
        if ($this->error_apellido !== "") {
            echo $this->aviso_inicio . $this->error_apellido . $this->aviso_cierre;
        }
    }
    public function registro_valido() {
        if ($this->error_email === ""&&
          $this->error_nombre === ""&&
            $this->error_apellido === "") {
            return true;
        } else {
            return false;
        }
    }

}
