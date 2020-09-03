<?php

include_once "RepositorioUsuario.inc.php";

class ValidadorLogin {

    private $usuario;
    private $error;
    public function __construct($email, $clave, $conexion) {
        $this->error = "";
        if (!$this->variable_iniciada($email) || !$this->variable_iniciada($clave)) {
            $this->usuario = null;
            $this->error = "Debes introducir correo y contraseña correcta";
        } else {
      //    echo '<script>';
      //    echo 'console.log("ingreso correctamente a validar registro")';
      //    echo '</script>';
            $this->usuario = RepositorioUsuario::obtener_usuario_por_email($conexion, $email);
      //      echo('<pre>');
      //      var_dump($this->usuario);
      //      echo('</pre>');
            if (is_null($this->usuario)){
                $this->error = "usuario incorrecto";
            }
            else{
              if(!password_verify($clave, $this->usuario->obtener_clave())) {
                 $this->error = "Clave incorrecta";
            }

            }
        }
    }
    private function variable_iniciada($variable) {
        if (isset($variable) && !empty($variable)) {
            return true;
        } else {
            return false;
        }
     }
    public function obtener_usuario(){
        return $this->usuario;
    }
    public function obtener_error(){
        return $this->error;
    }
    public function mostrar_error(){
        if ($this->error !==""){
            echo '<br><div class="alert alert-danger" role="alert">';
            echo $this->error;
            echo '</div><br>';
        }
    }
}
?>
