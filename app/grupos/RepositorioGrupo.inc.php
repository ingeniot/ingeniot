<?php
include_once "Grupo.inc.php";
class RepositorioGrupo {
    public static function obtener_todos($conexion) {
        $grupos = array();
        if (isset($conexion)) {
            try {
                $sql = "SELECT * FROM tenants";
                $sentencia = $conexion->prepare($sql);
                $sentencia->execute();
                $resultado = $sentencia->fetchAll();
                if (count($resultado)) {
                    foreach ($resultado as $fila) {
                        $grupos[] = new Grupo(
                                $fila['tenants_id'],
                                $fila['tenants_name'],
                                $fila['tenants_date'],
                                $fila['tenants_active'],
                                $fila['tenants_type'],
                                $fila['tenants_country'],
                                $fila['tenants_state'],
                                $fila['tenants_city'],
                                $fila['tenants_address'],
                                $fila['tenants_phone'],
                                $fila['tenants_email']
                        );
                    }
                } else {
                    print"vacio";
                }
            } catch (PDOException $ex) {
                print "ERROR" . $ex->getMessage();
            }
        }
        return $grupos;
    }

    public static function obtener_numero_grupos($conexion) {
        $total_grupos = null;
        if (isset($conexion)) {
            try {
                $sql = "SELECT COUNT(*) as total FROM tenants";
                $sentencia = $conexion->prepare($sql);

                $sentencia->execute();
                $resultado = $sentencia->fetch();
                $total_grupos = $resultado["total"];
            } catch (Exception $ex) {
                print"ERROR" . $ex->getMessage();
            }
        }
        return $total_grupos;
    }

    public static function insertar_grupo($conexion, $grupo) {
        $grupo_insertado = false;
        if (isset($conexion)) {
            try {
                $sql = "INSERT INTO tenants(tenants_name,tenants_type,tenants_country,tenants_state,tenants_city,tenants_address,tenants_phone,tenants_email) VALUES (:nombre,:tipo,:pais,:estado,:ciudad,:direccion,:telefono,:email)";
                $sentencia = $conexion->prepare($sql);
                $nombre_obtenido = $grupo->obtener_nombre();
                $tipo_obtenido = $grupo->obtener_tipo();
                $pais_obtenido = $grupo->obtener_pais();
                $estado_obtenido = $grupo->obtener_estado();
                $ciudad_obtenido = $grupo->obtener_ciudad();
                $direccion_obtenido = $grupo->obtener_direccion();
                $telefono_obtenido = $grupo->obtener_telefono();
                $email_obtenido = $grupo->obtener_email();
                $sentencia->bindParam(':nombre', $nombre_obtenido, PDO::PARAM_STR);
                $sentencia->bindParam(':tipo', $tipo_obtenido, PDO::PARAM_STR);
                $sentencia->bindParam(':pais', $pais_obtenido, PDO::PARAM_STR);
                $sentencia->bindParam(':estado', $estado_obtenido, PDO::PARAM_STR);
                $sentencia->bindParam(':ciudad', $ciudad_obtenido, PDO::PARAM_STR);
                $sentencia->bindParam(':direccion', $direccion_obtenido, PDO::PARAM_STR);
                $sentencia->bindParam(':telefono', $telefono_obtenido, PDO::PARAM_STR);
                $sentencia->bindParam(':email', $email_obtenido, PDO::PARAM_STR);
                $grupo_insertado = $sentencia->execute();
            } catch (PDOException $ex) {
                print "ERROR" . $ex->getMessage();
            }
        }
        return $grupo_insertado;
    }

    public static function nombre_existe($conexion, $nombre) {
        $nombre_existe = true;
        if (isset($conexion)) {
            try {
                $sql = "SELECT * FROM tenants WHERE tenants_name = :nombre";
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


    public static function obtener_grupo_por_id($conexion,$id){
        $grupo=null;
        if(isset($conexion)){
            try{
                $sql="SELECT * FROM tenants WHERE tenants_id=:id";
                $sentencia=$conexion->prepare($sql);
                $sentencia->bindParam(":id",$id,PDO::PARAM_STR);
                $sentencia->execute();
                $resultado=$sentencia->fetch();
                if (!empty($resultado)){
                    $grupo= new Grupo(
                            $resultado["tenants_id"],
                            $resultado["tenants_name"],
                            $resultado["tenants_date"],
                            $resultado["tenants_active"],
                            $resultado["tenants_type"],
                            $resultado["tenants_country"],
                            $resultado["tenants_state"],
                            $resultado["tenants_city"],
                            $resultado["tenants_address"],
                            $resultado["tenants_phone"],
                            $resultado["tenants_email"]
                            );
                }
            }
            catch (Exception $ex) {
                print "ERROR".$ex->getMessage();
            }

            return($grupo);
        }
    }
}
