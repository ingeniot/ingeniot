<?php
include_once "Dispositivo.inc.php";

class RepositorioDispositivo {
  public static function obtener_todos($conexion) {
    $dispositivos = array();
    if (isset($conexion)) {
      try {
        $sql = "SELECT * FROM devices";
        $sentencia = $conexion->prepare($sql);
        $sentencia->execute();
        $resultado = $sentencia->fetchAll();
        if (count($resultado)) {
          foreach ($resultado as $fila) {
            $dispositivos[] = new Dispositivo(
              $fila["devices_id"],
              $fila["devices_name"],
              $fila["devices_date"],
              $fila["devices_active"],
              $fila["devices_type"],
              $fila["devices_serial"],
              $fila["devices_token"],
              $fila["devices_id_client"],
              $fila['devices_tenant_id'],
              $fila['devices_label'],
              $fila['devices_description']
            );
          }
        } else {
          print"vacio";
        }
      } catch (PDOException $ex) {
        print "ERROR" . $ex->getMessage();
      }
    }
    return $dispositivos;
  }

  public static function obtener_numero_dispositivos($conexion) {
    $total_dispositivos = null;
    if (isset($conexion)) {
      try {
        $sql = "SELECT COUNT(*) as total FROM devices";
        $sentencia = $conexion->prepare($sql);

        $sentencia->execute();
        $resultado = $sentencia->fetch();
        $total_dispositivos = $resultado["total"];
      } catch (Exception $ex) {
        print"ERROR" . $ex->getMessage();
      }
    }
    return $total_dispositivos;
  }

  public static function insertar_dispositivo($conexion, $dispositivo) {
    $dispositivo_insertado = false;
    if (isset($conexion)) {

      try {

        $sql = "INSERT INTO devices(devices_name,devices_type,devices_tenant_id,devices_label,devices_description) VALUES (:nombre,:tipo,:id_grupo,:etiqueta,:descripcion)";
        $sentencia = $conexion->prepare($sql);
        $nombre_obtenido = $dispositivo->obtener_nombre();
        $tipo_obtenido = $dispositivo->obtener_tipo();
        $id_grupo_obtenido = $dispositivo->obtener_id_grupo();
        $id_etiqueta_obtenida = $dispositivo->obtener_etiqueta();
        $id_descripcion_obtenida = $dispositivo->obtener_descripcion();
        $sentencia->bindParam(':nombre', $nombre_obtenido, PDO::PARAM_STR);
        $sentencia->bindParam(':tipo', $tipo_obtenido, PDO::PARAM_STR);
        $sentencia->bindParam(':id_grupo', $id_grupo_obtenido, PDO::PARAM_STR);
        $sentencia->bindParam(':etiqueta', $id_etiqueta_obtenida, PDO::PARAM_STR);
        $sentencia->bindParam(':descripcion', $id_descripcion_obtenida, PDO::PARAM_STR);
        $dispositivo_insertado = $sentencia->execute();
      } catch (PDOException $ex) {
        print "ERROR" . $ex->getMessage();
      }
    }
    return $dispositivo_insertado;
  }

  public static function nombre_existe($conexion, $nombre) {
    $nombre_existe = true;
    if (isset($conexion)) {
      try {
        $sql = "SELECT * FROM devices WHERE devices_name = :nombre";
        $sentencia = $conexion->prepare($sql);
        $sentencia->bindParam(":nombre", $nombre, PDO::PARAM_STR); //para el parametro nombre con un alias para hacer la consulta
        $sentencia->execute(); //Ejecuta la consulta
        $resultado = $sentencia->fetchAll(); //Obtiene los resultados de la consulta
        if (count($resultado)) {
          $nombre_existe = true;
        } else {
          $nombre_existe = false;
        }
      } catch (Exception $ex) {
        print "ERROR" . $ex->getMessage();
      }
    }
    return $nombre_existe;
    //return true;
  }


  public static function obtener_dispositivo_por_id($conexion,$id){
    $dispositivo=null;
    if(isset($conexion)){
      try{
        $sql="SELECT * FROM devices WHERE devices_id=:id";
        $sentencia=$conexion->prepare($sql);
        $sentencia->bindParam(":id",$id,PDO::PARAM_STR);
        $sentencia->execute();
        $resultado=$sentencia->fetch();
        if (!empty($resultado)){
          $dispositivo= new Dispositivo(
            $resultado["devices_id"],
            $resultado["devices_name"],
            $resultado["devices_date"],
            $resultado["devices_active"],
            $resultado["devices_type"],
            $resultado["devices_serial"],
            $resultado["devices_token"],
            $resultado["devices_client_id"],
            $resultado['devices_tenant_id'],
            $resultado['devices_label'],
            $resultado['devices_description']
          );
        }
      }
      catch (Exception $ex) {
        print "ERROR".$ex->getMessage();
      }
      return($dispositivo);
    }
  }

  public static function obtener_dispositivos_por_id_cliente($conexion,$id_cliente){
    $dispositivos=null;
   if(isset($conexion)){
      try{
        $sql="SELECT * FROM devices WHERE devices_client_id=:id_cliente";
        $sentencia=$conexion->prepare($sql);
        $sentencia->bindParam(":id_cliente",$id_cliente,PDO::PARAM_STR);
        $sentencia->execute();
        $resultado=$sentencia->fetchAll();/*
        echo('<pre>');
        //var_dump($dispositivos_usuario);
        print_r($resultado);
        echo('</pre>');
        /*echo count($resultado);*/
        if (count($resultado)) {
          foreach ($resultado as $fila) {
            $dispositivos[]= new Dispositivo(
              $fila['devices_id'],
              $fila['devices_name'],
              $fila['devices_date'],
              $fila['devices_active'],
              $fila['devices_type'],
              $fila['devices_serial'],
              $fila['devices_token'],
              $fila["devices_client_id"],
              $fila['devices_tenant_id'],
              $fila['devices_label'],
              $fila['devices_description']
            );
          }
        }
        /*else {
          print"vacio";
        }*/
      }
      catch (Exception $ex) {
        print "ERROR".$ex->getMessage();
      }
      return($dispositivos);
    }
  }

  public static function obtener_dispositivos_por_id_grupo($conexion,$id_grupo){
    $dispositivos=null;
   if(isset($conexion)){
      try{
        $sql="SELECT * FROM devices WHERE devices_tenant_id=:id_grupo";
        $sentencia=$conexion->prepare($sql);
        $sentencia->bindParam(":id_grupo",$id_grupo,PDO::PARAM_STR);
        $sentencia->execute();
        $resultado=$sentencia->fetchAll();/*
        echo('<pre>');
        //var_dump($dispositivos_usuario);
        print_r($resultado);
        echo('</pre>');
        /*echo count($resultado);*/
        if (count($resultado)) {
          foreach ($resultado as $fila) {
            $dispositivos[]= new Dispositivo(
              $fila['devices_id'],
              $fila['devices_name'],
              $fila['devices_date'],
              $fila['devices_active'],
              $fila['devices_type'],
              $fila['devices_serial'],
              $fila['devices_token'],
              $fila["devices_client_id"],
              $fila['devices_tenant_id'],
              $fila['devices_label'],
              $fila['devices_description']
            );
          }
        }
        /*else {
          print"vacio";
        }*/
      }
      catch (Exception $ex) {
        print "ERROR".$ex->getMessage();
      }
      return($dispositivos);
    }
  }
  public static function buscar_dispositivos_por_nombre($conexion,$nombre){
    $dispositivos=null;
    if(isset($conexion)){
      echo "Hay conexion a db";
      try{
        $nombre='%'.$nombre.'%'; //Se prepara para el LIKe % indica que puede ir cualquier caracter, en este caso antes y desdpues de los ingesados
        $sql="SELECT * FROM devices WHERE devices_name LIKE :nombre ";
        $sentencia=$conexion->prepare($sql);
        $sentencia->bindParam(':nombre',$nombre,PDO::PARAM_STR);
        $sentencia->execute();
        $resultado=$sentencia->fetchAll(PDO::FETCH_ASSOC);
        if (count($resultado)) {
          foreach ($resultado as $fila) {
            $dispositivos[]= array(
              'id'=>$fila['devices_id'],
              'nombre'=>$fila['devices_name'],
              'fecha'=>$fila['devices_date'],
              'activo'=>$fila['devices_active'],
              'tipo'=>$fila['devices_type'],
              'serie'=>$fila['devices_serial'],
              'token'=>$fila['devices_token'],
              'id_cliente'=>$fila['devices_client_id'],
              'id_grupo'=>$fila['devices_tenant_id'],
              'etiqueta'=>$fila['devices_label'],
              'descripcion'=>$fila['devices_description']
            );
          }
        }
      }
      catch (Exception $ex) {
        print "ERROR".$ex->getMessage();
      }
      return($dispositivos);
    }
  }

  public static function eliminar_dispositivo($conexion,$id_dispositivo){
    if(isset($conexion)){
      try{
        //  $conexion->beginTransaction();//Comienza la transacción
        $sql="DELETE FROM devices WHERE devices_id=:id_dispositivo";
        $sentencia=$conexion->prepare($sql);
        $sentencia->bindParam(":id_dispositivo",$id_dispositivo,PDO::PARAM_STR);
        $sentencia->execute();
        //  $conexion->commit();//Consolidar la transacción
        return true;
      }
      catch (Exception $ex) {
        print "ERROR".$ex->getMessage();
        //  $conexion=rollBack();//Comienza la transacción
      }
    }
  }
  public static function actualizar_dispositivo($conexion,$id,$nombre,$tipo,$etiqueta,$descripcion){
    $actualizacion_correcta=false;
    if(isset($conexion)){
      try{
        $sql="UPDATE devices SET devices_name=:nombre, devices_type=:tipo, devices_label=:etiqueta, devices_description=:descripcion WHERE devices_id=:id";
        $sentencia=$conexion->prepare($sql);
        $sentencia->bindParam(":id",$id,PDO::PARAM_STR);
        $sentencia->bindParam(":nombre",$nombre,PDO::PARAM_STR);
        $sentencia->bindParam(":tipo",$tipo,PDO::PARAM_STR);
        $sentencia->bindParam(":etiqueta",$etiqueta,PDO::PARAM_STR);
        $sentencia->bindParam(":descripcion",$descripcion,PDO::PARAM_STR);
        $sentencia->execute();
        $resultado=$sentencia->rowCount();
        //echo $resultado;

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

  public static function actualizar_id_cliente($conexion,$id,$id_cliente){
    $actualizacion_correcta=false;
    if(isset($conexion)){
      try{
        $sql="UPDATE devices SET devices_client_id=:id_cliente WHERE devices_id=:id";
        $sentencia=$conexion->prepare($sql);
        $sentencia->bindParam(":id",$id,PDO::PARAM_STR);
        $sentencia->bindParam(":id_cliente",$id_cliente,PDO::PARAM_STR);
        $sentencia->execute();
        $resultado=$sentencia->rowCount();
        //echo $resultado;

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
}
