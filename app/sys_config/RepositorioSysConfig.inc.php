<?php
class RepositorioSysConfig{
  public static function crear_json($conexion, $llave, $json){
    $json_creado = false;
    if(isset($conexion)) {
      try {
        $sql="INSERT INTO sys_settings(sys_settings_key,sys_settings_json) VALUES (:llave,:json)";
        $sentencia=$conexion->prepare($sql);
        $sentencia->bindParam(':llave',$llave,PDO::PARAM_STR);
        $sentencia->bindParam(':json',$json,PDO::PARAM_STR);
        $json_creado=$sentencia->execute();
      } catch (PDOException $ex) {
        print "ERROR".$ex->getMessage();
      }
    }
    return $json_creado;
  }

  public static function actualizar_json($conexion,$llave,$json){
    $actualizacion_correcta=false;
    if(isset($conexion)){
      try{
        $sql="UPDATE sys_settings SET sys_settings_json=:json WHERE sys_settings_key=:llave";
        $sentencia=$conexion->prepare($sql);
        $sentencia->bindParam(":llave",$llave,PDO::PARAM_STR);
        $sentencia->bindParam(":json",$json,PDO::PARAM_STR);
        $sentencia->execute();
        $resultado=$sentencia->rowCount();
        //echo $resultado;
        //echo "resultado=".$resultado;
        //die();
        if($resultado){
          $actualizacion_correcta=true;
        }
        //  $conexion->commit();//Consolidar la transacción
      }
      catch (Exception $ex) {
        print "ERROR".$ex->getMessage();
        //  $conexion=rollBack();//Comienza la transacción
      }
    }
   return $actualizacion_correcta;
  }

public static function llave_existe($conexion, $llave) {
    $llave_existe = false;
    if (isset($conexion)) {
        try {
            $sql = "SELECT * FROM sys_settings WHERE sys_settings_key = :llave";
            $sentencia = $conexion->prepare($sql);
            $sentencia->bindParam(":llave", $llave, PDO::PARAM_STR); //para el parametro nombre con un alias para hacer la consulta
            $sentencia->execute(); //Ejecuta la consulta
            $resultado = $sentencia->fetchAll(); //Obtiene los resultados de la consulta
            if (count($resultado)) {
                $llave_existe = true;
            } else {
                $llave_existe = false;
            }
        } catch (Exception $ex) {
            print "ERROR" . $ex->getMessage();
        }
    }
    return $llave_existe;
    //return true;
  }
  public static function obtener_json_por_llave($conexion,$llave){
      $json=null;
      if(isset($conexion)){
          try{
              $sql="SELECT * FROM sys_settings WHERE sys_settings_key=:llave";
              $sentencia=$conexion->prepare($sql);
              $sentencia->bindParam(":llave",$llave,PDO::PARAM_STR);
              $sentencia->execute();
              $resultado=$sentencia->fetch();
              if (!empty($resultado)){
                $json_config= $resultado["sys_settings_json"];
              }
          }
          catch (Exception $ex) {
              print "ERROR".$ex->getMessage();
            }
          }
        //  echo('<pre>');
        //  var_dump($usuario);
        //  echo('</pre>');
          return $json_config;
  }
}
 ?>
