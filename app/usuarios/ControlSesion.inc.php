<?php
class ControlSesion{
    public static function iniciar_sesion($id_usuario,$nombre_usuario,$nivel_usuario,$id_cliente,$id_grupo){
        if(session_id()==""){
        session_start();
        }
    $_SESSION["id_usuario"]=$id_usuario;
    $_SESSION["nombre_usuario"]=$nombre_usuario;
    $_SESSION["nivel_usuario"]=$nivel_usuario;
    $_SESSION["id_cliente"]=$id_cliente;
    $_SESSION["id_grupo"]=$id_grupo;
    }
    public static function cerrar_sesion(){
         if(session_id()==""){
        session_start();
        }
        if(isset($_SESSION["id_usuario"])){
            unset($_SESSION["id_usuario"]);
        }
         if(isset($_SESSION["nombre_usuario"])){
            unset($_SESSION["nombre_usuario"]);
        }
        if(isset($_SESSION["nivel_usuario"])){
           unset($_SESSION["nivel_usuario"]);
       }
       if(isset($_SESSION["id_cliente"])){
          unset($_SESSION["id_cliente"]);
      }
      if(isset($_SESSION["id_grupo"])){
         unset($_SESSION["id_grupo"]);
     }
        session_destroy();
    }
    public static function sesion_iniciada(){
        if(session_id()==""){
        session_start();
        }
        if(isset($_SESSION["id_usuario"]) && isset($_SESSION["nombre_usuario"]) &&
        isset($_SESSION["nivel_usuario"]) && isset($_SESSION["id_cliente"]) &&
        isset($_SESSION["id_grupo"])){
            return true;

        } else{
            return false;
        }
    }
    public function obtener_id() {
        return $_SESSION["id_usuario"];
    }
    public function obtener_nombre() {
        return $_SESSION["nombre_usuario"];
    }
    public function obtener_nivel() {
        return $_SESSION["nivel_usuario"];
    }
    public function obtener_id_cliente() {
        return $_SESSION["id_cliente"];
    }
    public function obtener_id_grupo() {
        return $_SESSION["id_grupo"];
    }
}
?>
