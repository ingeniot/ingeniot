<?php
include_once "Usuario.inc.php";

class RepositorioUsuario {
    public static function obtener_todos($conexion) {
        $usuarios = array();
        if (isset($conexion)) {
            try {
                $sql = "SELECT * FROM users";
                $sentencia = $conexion->prepare($sql);
                $sentencia->execute();
                $resultado = $sentencia->fetchAll();
                if (count($resultado)) {
                    foreach ($resultado as $fila) {
                        $usuarios[] = new Usuario(
                                $fila['id'], $fila['nombre'], $fila['email'], $fila['clave'],
                                $fila['fecha_registro'], $fila['nivel'], $fila['activo'],
                                $fila['descripcion'], $fila['apellido'], $fila['id_cliente'], $fila['id_grupo']
                        );
                    }
                } else {
                    print"no hay usuarios";
                }
            } catch (PDOException $ex) {
                print "ERROR" . $ex->getMessage();
            }
        }
        return $usuarios;
    }

    public static function obtener_numero_usuarios($conexion) {
        $total_usuarios = null;
        if (isset($conexion)) {
            try {
                $sql = "SELECT COUNT(*) as total FROM users";
                $sentencia = $conexion->prepare($sql);

                $sentencia->execute();
                $resultado = $sentencia->fetch();
                $total_usuarios = $resultado["total"];
            } catch (Exception $ex) {
                print"ERROR" . $ex->getMessage();
            }
        }
        return $total_usuarios;
    }

    public static function insertar_usuario($conexion, $usuario) {
        $usuario_insertado = false;
        if (isset($conexion)) {
            try {
                $sql = "INSERT INTO users(users_name,users_email,users_password,users_level,users_lastname,users_description,users_customer_id,users_tenant_id) VALUES (:nombre,:email,:clave,:nivel,:apellido,:descripcion,:id_cliente,:id_grupo)";
                $sentencia = $conexion->prepare($sql);
                $nombre_obtenido = $usuario->obtener_nombre();
                $email_obtenido = $usuario->obtener_email();
                $clave_obtenida = $usuario->obtener_clave();
                $nivel_obtenido = $usuario->obtener_nivel();
                $apellido_obtenido = $usuario->obtener_apellido();
                $descripcion_obtenida = $usuario->obtener_descripcion();
                $id_cliente_obtenido = $usuario->obtener_id_cliente();
                $id_grupo_obtenido = $usuario->obtener_id_grupo();
                $sentencia->bindParam(':nombre', $nombre_obtenido, PDO::PARAM_STR);
                $sentencia->bindParam(':email', $email_obtenido, PDO::PARAM_STR);
                $sentencia->bindParam(':clave', $clave_obtenida, PDO::PARAM_STR);
                $sentencia->bindParam(':nivel', $nivel_obtenido, PDO::PARAM_STR);
                $sentencia->bindParam(':apellido', $apellido_obtenido, PDO::PARAM_STR);
                $sentencia->bindParam(':descripcion', $descripcion_obtenida, PDO::PARAM_STR);
                $sentencia->bindParam(':id_cliente', $id_cliente_obtenido, PDO::PARAM_STR);
                $sentencia->bindParam(':id_grupo', $id_grupo_obtenido, PDO::PARAM_STR);
                $usuario_insertado = $sentencia->execute();
            } catch (PDOException $ex) {
                print "ERROR" . $ex->getMessage();
            }
        }
        return $usuario_insertado;
    }

    public static function nombre_existe($conexion, $nombre) {
        $nombre_existe = true;
        if (isset($conexion)) {
            try {
                $sql = "SELECT * FROM users WHERE users_name = :nombre";
                $sentencia = $conexion->prepare($sql);
                $sentencia->bindParam(":nombre", $nombre, PDO::PARAM_STR); //para el parametro nombre con un alias para hacer la consulta
                $sentencia->execute(); //Ejecuta la consulta
                $resultado = $sentencia->fetchAll(); //Obtiene los resultados de la consulta
                if (count($resultado)) {
                    $nombre_existe = true;
                } else {
                    $nombre_existe = false;
                }
            } catch (PDOException $ex) {
                print "ERROR" . $ex->getMessage();
            }
        }
        return $nombre_existe;
        //return true;
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
    public static function obtener_usuario_por_email($conexion,$email){
        $usuario=null;
        if(isset($conexion)){
            try{
                $sql="SELECT * FROM users WHERE users_email=:email";
                $sentencia=$conexion->prepare($sql);
                $sentencia->bindParam(":email",$email,PDO::PARAM_STR);
                $sentencia->execute();
                $resultado=$sentencia->fetch();

                if (!empty($resultado)){
                  $usuario= new Usuario(
                            $resultado["users_id"],
                            $resultado["users_name"],
                            $resultado["users_email"],
                            $resultado["users_password"],
                            $resultado["users_date"],
                            $resultado["users_level"],
                            $resultado["users_active"],
                            $resultado["users_lastname"],
                            $resultado["users_description"],
                            $resultado["users_customer_id"],
                            $resultado["users_tenant_id"]
//Los indices del array deben ser los nombres de los campos de la base de datos
                        );
                }
            }
            catch (PDOException $ex) {
                print "ERROR".$ex->getMessage();
            }
          //  echo('<pre>');
          //  var_dump($usuario);
          //  echo('</pre>');
            return($usuario);

        }
    }
    public static function obtener_usuario_por_id($conexion,$id){
        $usuario=null;
        if(isset($conexion)){
            try{
                $sql="SELECT * FROM users WHERE users_id=:id";
                $sentencia=$conexion->prepare($sql);
                $sentencia->bindParam(":id",$id,PDO::PARAM_STR);
                $sentencia->execute();
                $resultado=$sentencia->fetch();
                if (!empty($resultado)){
                    $usuario= new Usuario(
                            $resultado["users_id"],
                            $resultado["users_name"],
                            $resultado["users_email"],
                            $resultado["users_password"],
                            $resultado["users_date"],
                            $resultado["users_level"],
                            $resultado["users_active"],
                            $resultado["users_lastname"],
                            $resultado["users_description"],
                            $resultado["users_customer_id"],
                            $resultado["users_tenant_id"]
                            );
                }

            }
            catch (PDOException $ex) {
                print "ERROR".$ex->getMessage();
            }

            return($usuario);
        }
    }
    public static function actualizar_clave($conexion, $id, $clave){
        $actualizacion_correcta = false;
        if(isset($conexion)){
            try{
                $sql="UPDATE users SET users_password = :clave  WHERE users_id = :id";
                $sentencia=$conexion->prepare($sql);
                $sentencia->bindParam(":id",$id,PDO::PARAM_STR);
                $sentencia->bindParam(":clave",$clave,PDO::PARAM_STR);
                $sentencia->execute();
                $resultado=$sentencia->rowCount();//indica cuantas filas se actualizaron
                if ($resultado){
                    $actualizacion_correcta = true;
                  }
                else{
                    $actualizacion_correcta = false;
                }
            }
            catch (PDOException $ex) {
                print "ERROR".$ex->getMessage();
            }

        }
        return $actualizacion_correcta;
    }


public static function obtener_id_grupo_por_id($conexion,$id){
    $id_grupo=null;
    if(isset($conexion)){
        try{
            $sql="SELECT * FROM users WHERE users_id=:id";
            $sentencia=$conexion->prepare($sql);
            $sentencia->bindParam(":id",$id,PDO::PARAM_STR);
            $sentencia->execute();
            $resultado=$sentencia->fetch();
            if (!empty($resultado)){
            $id_grupo=$resultado["users_tenant_id"];
            }
        }
        catch (PDOException $ex) {
            print "ERROR".$ex->getMessage();
        }

        return($id_grupo);
    }
}
public static function obtener_usuarios_por_id_cliente($conexion,$id_cliente) {
    $usuarios = array();
    if (isset($conexion)) {
        try {
            $sql="SELECT * FROM users WHERE users_customer_id=:id_cliente";
            $sentencia = $conexion->prepare($sql);
            $sentencia->bindParam(":id_cliente",$id_cliente,PDO::PARAM_STR);
            $sentencia->execute();
            $resultado = $sentencia->fetchAll();
            if (count($resultado)) {
                foreach ($resultado as $fila) {
                    $usuarios[] = new Usuario(
                            $fila['users_id'],
                            $fila['users_name'],
                            $fila['users_email'],
                            $fila['users_password'],
                            $fila['users_date'],
                            $fila['users_level'],
                            $fila['users_active'],
                            $fila['users_lastname'],
                            $fila['users_lastname'],
                            $fila['users_description'],
                            $fila['users_customer_id'],
                            $resultado["users_tenant_id"]
                    );
                }
            } else {
                print"No hay usuarios";
            }
        } catch (PDOException $ex) {
            print "ERROR" . $ex->getMessage();
        }
    }


  return $usuarios;

  die();
  }
}
