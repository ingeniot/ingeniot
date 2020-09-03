<?php
class Conexion{
  private static $conexion;
  public static function abrir_conexion(){
    if(!isset(self::$conexion)){
      try{
        include dirname( __DIR__ )."/../conf/bd.inc.php";
        //include (dirname(__FILE__).'/bd.inc.php');
        //include "/bd.inc.php";
        //    self::$conexion=new PDO('mysql:host='.NOMBRE_SERVIDOR.';dbname='.NOMBRE_BASE_DATOS,NOMBRE_USUARIO,CLAVE);
        self::$conexion=new PDO("mysql:host=$nombre_servidor;dbname=$nombre_base_datos",$nombre_usuario,$clave);//Abre la conexion con la base de datos
        self::$conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        self::$conexion->exec("SET CHARACTER SET utf8");
        // print"CONEXION ABIERTA"."<br>";
      }
      catch(PDOExeption $ex){
        print"ERROR:".$ex->getMessage()."<br>";
        die();
      }
    }
  }
  public static function cerrar_conexion(){
    if(isset(self::$conexion)){
      self::$conexion=null;
      //    print "CONEXION CERRADA";
    }
  }
  public static function obtener_conexion(){
    return self::$conexion;
  }
}
