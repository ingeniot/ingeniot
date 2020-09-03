<?php
include_once "../administradores/Administrador.inc.php";
class RepositorioAdministrador {
      public static function obtener_numero_administradores($conexion) {
        $total_administradores = null;
        $nivel=admin;
        if (isset($conexion)) {
            try {
                $sql = "SELECT COUNT(WHERE users_level = :nivel) as total FROM users";
                $sentencia = $conexion->prepare($sql);
                $sentencia->bindParam(':nivel', $nivel, PDO::PARAM_STR);
                $sentencia->execute();
                $resultado = $sentencia->fetch();
                $total_administradores = $resultado["total"];
            } catch (Exception $ex) {
                print"ERROR" . $ex->getMessage();
            }
        }
        return $total_administradores;
    }
    public static function insertar_administrador($conexion, $administrador) {
        $administrador_insertado = false;
        if (isset($conexion)) {
            try {
                $sql = "INSERT INTO users(users_email,users_name,users_lastname,users_description,users_level,users_tenant_id) VALUES (:email,:nombre,:apellido,:descripcion,:nivel,:id_grupo)";
                $sentencia = $conexion->prepare($sql);
                $email_obtenido = $administrador->obtener_email();
                $nombre_obtenido = $administrador->obtener_nombre();
                $apellido_obtenido = $administrador->obtener_apellido();
                $descripcion_obtenida = $administrador->obtener_descripcion();
                $nivel_obtenido = $administrador->obtener_nivel();
                $id_grupo_obtenido = $administrador->obtener_id_grupo();
                $sentencia->bindParam(':email', $email_obtenido, PDO::PARAM_STR);
                $sentencia->bindParam(':nombre', $nombre_obtenido, PDO::PARAM_STR);
                $sentencia->bindParam(':apellido', $apellido_obtenido, PDO::PARAM_STR);
                $sentencia->bindParam(':descripcion', $descripcion_obtenida, PDO::PARAM_STR);
                $sentencia->bindParam(':nivel', $nivel_obtenido, PDO::PARAM_STR);
                $sentencia->bindParam(':id_grupo', $id_grupo_obtenido, PDO::PARAM_STR);
                $administrador_insertado = $sentencia->execute();
            } catch (PDOException $ex) {
                print "ERROR" . $ex->getMessage();
            }
        }
        return $administrador_insertado;
    }
        public static function obtener_administrador_por_id($conexion,$id){
        $administrador=null;
        if(isset($conexion)){
            try{
                $sql="SELECT * FROM users WHERE users_id=:id";
                $sentencia=$conexion->prepare($sql);
                $sentencia->bindParam(":id",$id,PDO::PARAM_STR);
                $sentencia->execute();
                $resultado=$sentencia->fetch();
                if (!empty($resultado)){
                    $administrador= new Administrador(
                            $resultado["users_id"],
                            $resultado["users_email"],
                            $resultado["users_name"],
                            $resultado["users_lastname"],
                            $resultado["users_date"],
                            $resultado["users_description"],
                            $resultado["users_level"],
                            $resultado["users_active"],
                            $resultado["users_tenant_id"]
                            );
                }

            }
            catch (PDOException $ex) {
                print "ERROR".$ex->getMessage();
            }

            return($administrador);
        }
    }

    public static function obtener_administradores_por_id_grupo($conexion,$id_grupo) {
        $administradores = array();
        if (isset($conexion)) {
            try {
                $sql="SELECT * FROM users WHERE users_tenant_id=:id_grupo";
                $sentencia = $conexion->prepare($sql);
                $sentencia->bindParam(":id_grupo",$id_grupo,PDO::PARAM_STR);
                $sentencia->execute();
                $resultado = $sentencia->fetchAll();
                if (count($resultado)) {
                    foreach ($resultado as $fila) {
                        $administradores[] = new Administrador(
                                $fila['users_id'],
                                $fila['users_email'],
                                $fila['users_name'],
                                $fila['users_lastname'],
                                $fila['users_date'],
                                $fila['users_description'],
                                $fila['users_level'],
                                $fila['users_active'],
                                $fila['users_tenant_id']
                        );
                    }
                } else {
                    print"No hay administradores";
                }
            } catch (PDOException $ex) {
                print "ERROR" . $ex->getMessage();
            }
        }
        return $administradores;
    }

        public static function email_existe($conexion, $email) {
            $email_existe = true;
            if (isset($conexion)) {
                try {
                    $sql = "SELECT * FROM users WHERE users_email = :email";
                    $sentencia = $conexion->prepare($sql);
                    $sentencia->bindParam(':email', $email, PDO::PARAM_STR);
                    $sentencia->execute();
                    $resultado = $sentencia->fetchAll();
                    if (count($resultado)) {
                        $email_existe = true;
                    } else {
                        $email_existe = false;
                    }
                } catch (PDOException $ex) {
                    print "ERROR" . $ex->getMessage();
                }
            }
            return $email_existe;
        }


    public static function eliminar_administrador($conexion,$id_administrador){
      if(isset($conexion)){
        try{
          //  $conexion->beginTransaction();//Comienza la transacción
          $sql="DELETE FROM users WHERE users_id=:id_administrador";
          $sentencia=$conexion->prepare($sql);
          $sentencia->bindParam(":id_administrador",$id_administrador,PDO::PARAM_STR);
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
    public static function actualizar_administrador($conexion,$id,$email,$nombre,$apellido,$descripcion){
      $actualizacion_correcta=false;
      if(isset($conexion)){
        try{
          $sql="UPDATE users SET users_email=:email, users_name=:nombre, users_lastname=:apellido, users_description=:descripcion WHERE users_id=:id";
          $sentencia=$conexion->prepare($sql);
          $sentencia->bindParam(":id",$id,PDO::PARAM_STR);
          $sentencia->bindParam(":email",$email,PDO::PARAM_STR);
          $sentencia->bindParam(":nombre",$nombre,PDO::PARAM_STR);
          $sentencia->bindParam(":apellido",$apellido,PDO::PARAM_STR);
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
  }
