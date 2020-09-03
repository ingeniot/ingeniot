<?php
include_once "Dominio.inc.php";

class RepositorioDominio {
  public static function obtener_todos($conexion) {
    $dominios = array();
    if (isset($conexion)) {
      try {
        $sql = "SELECT * FROM domains";
        $sentencia = $conexion->prepare($sql);
        $sentencia->execute();
        $resultado = $sentencia->fetchAll();
        if (count($resultado)) {
          foreach ($resultado as $fila) {
            $dominios[] = new Dominio(
              $fila["domains_id"],
              $fila["domains_name"],
              $fila["domains_date"],
              $fila["domains_active"],
              $fila["domains_type"],
              $fila["domains_id_client"],
              $fila['domains_tenant_id'],
              $fila['domains_label'],
              $fila['domains_description']
            );
          }
        } else {
          print"vacio";
        }
      } catch (PDOException $ex) {
        print "ERROR" . $ex->getMessage();
      }
    }
    return $dominios;
  }

  public static function obtener_numero_dominios($conexion) {
    $total_dominios = null;
    if (isset($conexion)) {
      try {
        $sql = "SELECT COUNT(*) as total FROM domains";
        $sentencia = $conexion->prepare($sql);

        $sentencia->execute();
        $resultado = $sentencia->fetch();
        $total_dominios = $resultado["total"];
      } catch (Exception $ex) {
        print"ERROR" . $ex->getMessage();
      }
    }
    return $total_dominios;
  }

  public static function insertar_dominio($conexion, $dominio) {
    $dominio_insertado = false;
    if (isset($conexion)) {
        try {
          $sql = "INSERT INTO domains(domains_name,domains_type,domains_tenant_id,domains_label,domains_description) VALUES (:nombre,:tipo,:id_grupo,:etiqueta,:descripcion)";
        $sentencia = $conexion->prepare($sql);
        $nombre_obtenido = $dominio->obtener_nombre();
        $tipo_obtenido = $dominio->obtener_tipo();
        $id_grupo_obtenido = $dominio->obtener_id_grupo();
        $id_etiqueta_obtenida = $dominio->obtener_etiqueta();
        $id_descripcion_obtenida = $dominio->obtener_descripcion();
        $sentencia->bindParam(':nombre', $nombre_obtenido, PDO::PARAM_STR);
        $sentencia->bindParam(':tipo', $tipo_obtenido, PDO::PARAM_STR);
        $sentencia->bindParam(':id_grupo', $id_grupo_obtenido, PDO::PARAM_STR);
        $sentencia->bindParam(':etiqueta', $id_etiqueta_obtenida, PDO::PARAM_STR);
        $sentencia->bindParam(':descripcion', $id_descripcion_obtenida, PDO::PARAM_STR);
        $dominio_insertado = $sentencia->execute();
      } catch (PDOException $ex) {
        print "ERROR" . $ex->getMessage();
      }
    }
    return $dominio_insertado;
  }


  public static function nombre_existe($conexion, $nombre) {
    $nombre_existe = true;
    if (isset($conexion)) {
      try {
        $sql = "SELECT * FROM domains WHERE domains_name = :nombre";
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


  public static function obtener_dominio_por_id($conexion,$id){
    $dominio=null;
    if(isset($conexion)){
      try{
        $sql="SELECT * FROM domains WHERE domains_id=:id";
        $sentencia=$conexion->prepare($sql);
        $sentencia->bindParam(":id",$id,PDO::PARAM_STR);
        $sentencia->execute();
        $resultado=$sentencia->fetch();
        if (!empty($resultado)){
          $dominio= new Dominio(
            $resultado["domains_id"],
            $resultado["domains_name"],
            $resultado["domains_date"],
            $resultado["domains_active"],
            $resultado["domains_type"],
            $resultado["domains_client_id"],
            $resultado['domains_tenant_id'],
            $resultado['domains_label'],
            $resultado['domains_description']
          );
        }
      }
      catch (Exception $ex) {
        print "ERROR".$ex->getMessage();
      }
      return($dominio);
    }
  }

  public static function obtener_dominios_por_id_cliente($conexion,$id_cliente){
    $dominios=null;
   if(isset($conexion)){
      try{
        $sql="SELECT * FROM domains WHERE domains_client_id=:id_cliente";
        $sentencia=$conexion->prepare($sql);
        $sentencia->bindParam(":id_cliente",$id_cliente,PDO::PARAM_STR);
        $sentencia->execute();
        $resultado=$sentencia->fetchAll();/*
        echo('<pre>');
        //var_dump($dominios_usuario);
        print_r($resultado);
        echo('</pre>');
        /*echo count($resultado);*/
        if (count($resultado)) {
          foreach ($resultado as $fila) {
            $dominios[]= new Dominio(
              $fila['domains_id'],
              $fila['domains_name'],
              $fila['domains_date'],
              $fila['domains_active'],
              $fila['domains_type'],
              $fila["domains_client_id"],
              $fila['domains_tenant_id'],
              $fila['domains_label'],
              $fila['domains_description']
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
      return($dominios);
    }
  }

  public static function obtener_dominios_por_id_grupo($conexion,$id_grupo){
    $dominios=null;
   if(isset($conexion)){
      try{
        $sql="SELECT * FROM domains WHERE domains_tenant_id=:id_grupo";
        $sentencia=$conexion->prepare($sql);
        $sentencia->bindParam(":id_grupo",$id_grupo,PDO::PARAM_STR);
        $sentencia->execute();
        $resultado=$sentencia->fetchAll();/*
        echo('<pre>');
        //var_dump($dominios_usuario);
        print_r($resultado);
        echo('</pre>');
        /*echo count($resultado);*/
        if (count($resultado)) {
          foreach ($resultado as $fila) {
            $dominios[]= new Dominio(
              $fila['domains_id'],
              $fila['domains_name'],
              $fila['domains_date'],
              $fila['domains_active'],
              $fila['domains_type'],
              $fila["domains_client_id"],
              $fila['domains_tenant_id'],
              $fila['domains_label'],
              $fila['domains_description']
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
      return($dominios);
    }
  }
  public static function buscar_dominios_por_nombre($conexion,$nombre){
    $dominios=null;
    if(isset($conexion)){
      echo "Hay conexion a db";
      try{
        $nombre='%'.$nombre.'%'; //Se prepara para el LIKe % indica que puede ir cualquier caracter, en este caso antes y desdpues de los ingesados
        $sql="SELECT * FROM domains WHERE domains_name LIKE :nombre ";
        $sentencia=$conexion->prepare($sql);
        $sentencia->bindParam(':nombre',$nombre,PDO::PARAM_STR);
        $sentencia->execute();
        $resultado=$sentencia->fetchAll(PDO::FETCH_ASSOC);
        if (count($resultado)) {
          foreach ($resultado as $fila) {
            $dominios[]= array(
              'id'=>$fila['domains_id'],
              'nombre'=>$fila['domains_name'],
              'fecha'=>$fila['domains_date'],
              'activo'=>$fila['domains_active'],
              'tipo'=>$fila['domains_type'],
              'id_cliente'=>$fila['domains_client_id'],
              'id_grupo'=>$fila['domains_tenant_id'],
              'etiqueta'=>$fila['domains_label'],
              'descripcion'=>$fila['domains_description']
            );
          }
        }
      }
      catch (Exception $ex) {
        print "ERROR".$ex->getMessage();
      }
      return($dominios);
    }
  }

  public static function eliminar_dominio($conexion,$id_dominio){
    if(isset($conexion)){
      try{
        //  $conexion->beginTransaction();//Comienza la transacción
        $sql="DELETE FROM domains WHERE domains_id=:id_dominio";
        $sentencia=$conexion->prepare($sql);
        $sentencia->bindParam(":id_dominio",$id_dominio,PDO::PARAM_STR);
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
  public static function actualizar_dominio($conexion,$id,$nombre,$tipo,$etiqueta,$descripcion){
    $actualizacion_correcta=false;
    if(isset($conexion)){
      try{
        $sql="UPDATE domains SET domains_name=:nombre, domains_type=:tipo, domains_label=:etiqueta, domains_description=:descripcion WHERE domains_id=:id";
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
        $sql="UPDATE domains SET domains_client_id=:id_cliente WHERE domains_id=:id";
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
