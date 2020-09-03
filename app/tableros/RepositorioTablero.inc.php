<?php
include_once "Tablero.inc.php";

class RepositorioTablero {
  public static function obtener_todos($conexion) {
    $tableros = array();
    if (isset($conexion)) {
      try {
        $sql = "SELECT * FROM dashboards";
        $sentencia = $conexion->prepare($sql);
        $sentencia->execute();
        $resultado = $sentencia->fetchAll();
        if (count($resultado)) {
          foreach ($resultado as $fila) {
            $tableros[] = new Tablero(
              $fila["dashboards_id"],
              $fila["dashboards_name"],
              $fila["dashboards_date"],
              $fila["dashboards_active"],
              $fila["dashboards_type"],
              $fila["dashboards_config"],
              $fila["dashboards_assigned_clients"],
              $fila['dashboards_search_text'],
              $fila['dashboards_tenant_id']
            );
          }
        } else {
          print"vacio";
        }
      } catch (PDOException $ex) {
        print "ERROR" . $ex->getMessage();
      }
    }
    return $tableros;
  }

  public static function obtener_numero_tableros($conexion) {
    $total_tableros = null;
    if (isset($conexion)) {
      try {
        $sql = "SELECT COUNT(*) as total FROM dashboards";
        $sentencia = $conexion->prepare($sql);

        $sentencia->execute();
        $resultado = $sentencia->fetch();
        $total_tableros = $resultado["total"];
      } catch (Exception $ex) {
        print"ERROR" . $ex->getMessage();
      }
    }
    return $total_tableros;
  }

  public static function insertar_tablero($conexion, $tablero) {
    $tablero_insertado = false;
    if (isset($conexion)) {
        try {
        $sql = "INSERT INTO dashboards(dashboards_name,dashboards_type,dashboards_tenant_id) VALUES (:nombre,:tipo,:id_grupo)";
        $sentencia = $conexion->prepare($sql);
        $nombre_obtenido = $tablero->obtener_nombre();
        $tipo_obtenido = $tablero->obtener_tipo();
        $id_grupo_obtenido = $tablero->obtener_id_grupo();
        $sentencia->bindParam(':nombre', $nombre_obtenido, PDO::PARAM_STR);
        $sentencia->bindParam(':tipo', $tipo_obtenido, PDO::PARAM_STR);
        $sentencia->bindParam(':id_grupo', $id_grupo_obtenido, PDO::PARAM_STR);

        /*echo count($resultado);*/
        $tablero_insertado = $sentencia->execute();
      } catch (PDOException $ex) {
        print "ERROR" . $ex->getMessage();
      }
    }
    return $tablero_insertado;
  }


  public static function nombre_existe($conexion, $nombre) {
    $nombre_existe = true;
    if (isset($conexion)) {
      try {
        $sql = "SELECT * FROM dashboards WHERE dashboards_name = :nombre";
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


  public static function obtener_tablero_por_id($conexion,$id){
    $tablero=null;
    if(isset($conexion)){
      try{
        $sql="SELECT * FROM dashboards WHERE dashboards_id=:id";
        $sentencia=$conexion->prepare($sql);
        $sentencia->bindParam(":id",$id,PDO::PARAM_STR);
        $sentencia->execute();
        $resultado=$sentencia->fetch();
        if (!empty($resultado)){
          $tablero= new Tablero(
            $resultado["dashboards_id"],
            $resultado["dashboards_name"],
            $resultado["dashboards_date"],
            $resultado["dashboards_active"],
            $resultado["dashboards_type"],
            $resultado["dashboards_config"],
            $resultado["dashboards_assigned_clients"],
            $resultado['dashboards_search_text'],
            $resultado['dashboards_tenant_id']
          );
        }
      }
      catch (Exception $ex) {
        print "ERROR".$ex->getMessage();
      }
      return($tablero);
    }
  }

  public static function obtener_tableros_por_id_cliente($conexion,$id_cliente){
    $tableros=null;
   if(isset($conexion)){
      try{
        $sql="SELECT * FROM dashboards WHERE dashboards_client_id=:id_cliente";
        $sentencia=$conexion->prepare($sql);
        $sentencia->bindParam(":id_cliente",$id_cliente,PDO::PARAM_STR);
        $sentencia->execute();
        $resultado=$sentencia->fetchAll();/*
        echo('<pre>');
        //var_dump($tableros_usuario);
        print_r($resultado);
        echo('</pre>');
        /*echo count($resultado);*/
        if (count($resultado)) {
          foreach ($resultado as $fila) {
            $tableros[]= new Tablero(
              $fila['dashboards_id'],
              $fila['dashboards_name'],
              $fila['dashboards_date'],
              $fila['dashboards_active'],
              $fila["dashboards_type"],
              $fila["dashboards_config"],
              $fila["dashboards_assigned_clients"],
              $fila['dashboards_search_text'],
              $fila['dashboards_tenant_id']
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
      return($tableros);
    }
  }

  public static function obtener_tableros_por_id_grupo($conexion,$id_grupo){
    $tableros=null;
   if(isset($conexion)){
      try{
        $sql="SELECT * FROM dashboards WHERE dashboards_tenant_id=:id_grupo";
        $sentencia=$conexion->prepare($sql);
        $sentencia->bindParam(":id_grupo",$id_grupo,PDO::PARAM_STR);
        $sentencia->execute();
        $resultado=$sentencia->fetchAll();
        if (count($resultado)) {
          foreach ($resultado as $fila) {
            $tableros[]= new Tablero(
              $fila['dashboards_id'],
              $fila['dashboards_name'],
              $fila['dashboards_date'],
              $fila['dashboards_active'],
              $fila['dashboards_type'],
              $fila['dashboards_config'],
              $fila['dashboards_assigned_clients'],
              $fila['dashboards_search_text'],
              $fila['dashboards_tenant_id']
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
      return($tableros);
    }
  }
  public static function buscar_tableros_por_nombre($conexion,$nombre){
    $tableros=null;
    if(isset($conexion)){
      echo "Hay conexion a db";
      try{
        $nombre='%'.$nombre.'%'; //Se prepara para el LIKe % indica que puede ir cualquier caracter, en este caso antes y desdpues de los ingesados
        $sql="SELECT * FROM dashboards WHERE dashboards_name LIKE :nombre ";
        $sentencia=$conexion->prepare($sql);
        $sentencia->bindParam(':nombre',$nombre,PDO::PARAM_STR);
        $sentencia->execute();
        $resultado=$sentencia->fetchAll(PDO::FETCH_ASSOC);
        if (count($resultado)) {
          foreach ($resultado as $fila) {
            $tableros[]= array(
              'id'=>$fila['dashboards_id'],
              'nombre'=>$fila['dashboards_name'],
              'fecha'=>$fila['dashboards_date'],
              'activo'=>$fila['dashboards_active'],
              'tipo'=>$fila['dashboards_type'],
              'clientes_asignados'=>$fila['dashboards_assigned_clients'],
              'texto_buscar'=>$fila['dashboards_search_text'],
              'id_grupo'=>$fila['dashboards_tenant_id']
            );
          }
        }
      }
      catch (Exception $ex) {
        print "ERROR".$ex->getMessage();
      }
      return($tableros);
    }
  }

  public static function eliminar_tablero($conexion,$id_tablero){
    if(isset($conexion)){
      try{
        //  $conexion->beginTransaction();//Comienza la transacción
        $sql="DELETE FROM dashboards WHERE dashboards_id=:id_tablero";
        $sentencia=$conexion->prepare($sql);
        $sentencia->bindParam(":id_tablero",$id_tablero,PDO::PARAM_STR);
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
  public static function actualizar_tablero($conexion,$id,$nombre,$tipo){
    $actualizacion_correcta=false;
    if(isset($conexion)){
      try{
        $sql="UPDATE dashboards SET dashboards_name=:nombre, dashboards_type=:tipo WHERE dashboards_id=:id";
        $sentencia=$conexion->prepare($sql);
        $sentencia->bindParam(":id",$id,PDO::PARAM_STR);
        $sentencia->bindParam(":nombre",$nombre,PDO::PARAM_STR);
        $sentencia->bindParam(":tipo",$tipo,PDO::PARAM_STR);
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

  public static function actualizar_id_cliente($conexion,$id,$id_cliente){     //provisorio para un cliente
    $actualizacion_correcta=false;
    if(isset($conexion)){
      try{
        $sql="UPDATE dashboards SET dashboards_assigned_clients=:id_cliente WHERE dashboards_id=:id";
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
