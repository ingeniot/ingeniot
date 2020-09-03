<?php
include_once "Cliente.inc.php";
class RepositorioCliente {
    public static function obtener_todos($conexion) {
        $clientes = array();
        if (isset($conexion)) {
            try {
                $sql = "SELECT * FROM customers";
                $sentencia = $conexion->prepare($sql);
                $sentencia->execute();
                $resultado = $sentencia->fetchAll();
                if (count($resultado)) {
                    foreach ($resultado as $fila) {
                        $clientes[] = new Cliente(
                                $fila['customers_id'],
                                $fila['customers_name'],
                                $fila['customers_date'],
                                $fila['customers_active'],
                                $fila['customers_type'],
                                $fila['customers_country'],
                                $fila['customers_state'],
                                $fila['customers_city'],
                                $fila['customers_address'],
                                $fila['customers_phone'],
                                $fila['customers_email'],
                                $fila['customers_tenant_id']
                        );
                    }
                } else {
                    print"vacio";
                }
            } catch (PDOException $ex) {
                print "ERROR" . $ex->getMessage();
            }
        }
        return $clientes;
    }

    public static function obtener_numero_clientes($conexion) {
        $total_clientes = null;
        if (isset($conexion)) {
            try {
                $sql = "SELECT COUNT(*) as total FROM customers";
                $sentencia = $conexion->prepare($sql);

                $sentencia->execute();
                $resultado = $sentencia->fetch();
                $total_clientes = $resultado["total"];
            } catch (Exception $ex) {
                print"ERROR" . $ex->getMessage();
            }
        }
        return $total_clientes;
    }

    public static function insertar_cliente($conexion, $cliente) {
        $cliente_insertado = false;
        if (isset($conexion)) {
            try {
                $sql = "INSERT INTO customers(customers_name,customers_type,customers_country,customers_state,customers_city,customers_address,customers_phone,customers_email,customers_tenant_id) VALUES (:nombre,:tipo,:pais,:estado,:ciudad,:direccion,:telefono,:email,:id_grupo)";
                $sentencia = $conexion->prepare($sql);
                $nombre_obtenido = $cliente->obtener_nombre();
                $tipo_obtenido = $cliente->obtener_tipo();
                $pais_obtenido = $cliente->obtener_pais();
                $estado_obtenido = $cliente->obtener_estado();
                $ciudad_obtenido = $cliente->obtener_ciudad();
                $direccion_obtenido = $cliente->obtener_direccion();
                $telefono_obtenido = $cliente->obtener_telefono();
                $email_obtenido = $cliente->obtener_email();
                $id_grupo_obtenido = $cliente->obtener_id_grupo();
                $sentencia->bindParam(':nombre', $nombre_obtenido, PDO::PARAM_STR);
                $sentencia->bindParam(':tipo', $tipo_obtenido, PDO::PARAM_STR);
                $sentencia->bindParam(':pais', $pais_obtenido, PDO::PARAM_STR);
                $sentencia->bindParam(':estado', $estado_obtenido, PDO::PARAM_STR);
                $sentencia->bindParam(':ciudad', $ciudad_obtenido, PDO::PARAM_STR);
                $sentencia->bindParam(':direccion', $direccion_obtenido, PDO::PARAM_STR);
                $sentencia->bindParam(':telefono', $telefono_obtenido, PDO::PARAM_STR);
                $sentencia->bindParam(':email', $email_obtenido, PDO::PARAM_STR);
                $sentencia->bindParam(':id_grupo', $id_grupo_obtenido, PDO::PARAM_STR);
                $cliente_insertado = $sentencia->execute();
            } catch (PDOException $ex) {
                print "ERROR" . $ex->getMessage();
            }
        }
        return $cliente_insertado;
    }

    public static function nombre_existe($conexion, $nombre) {
        $nombre_existe = true;
        if (isset($conexion)) {
            try {
                $sql = "SELECT * FROM customers WHERE customers_name = :nombre";
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


    public static function obtener_cliente_por_id($conexion,$id){
        $cliente=null;
        /*echo "id_cliente recibido".$id;*/
        if(isset($conexion)){
            try{
                $sql="SELECT * FROM customers WHERE customers_id=:id";
                $sentencia=$conexion->prepare($sql);
                $sentencia->bindParam(":id",$id,PDO::PARAM_STR);
                $sentencia->execute();
                $resultado=$sentencia->fetch();
                if (!empty($resultado)){
                    $cliente= new Cliente(
                            $resultado["customers_id"],
                            $resultado["customers_name"],
                            $resultado["customers_date"],
                            $resultado["customers_active"],
                            $resultado["customers_type"],
                            $resultado["customers_country"],
                            $resultado["customers_state"],
                            $resultado["customers_city"],
                            $resultado["customers_address"],
                            $resultado["customers_phone"],
                            $resultado["customers_email"],
                            $resultado["customers_tenant_id"]
                            );
                }
            }
            catch (Exception $ex) {
                print "ERROR".$ex->getMessage();
            }

            return($cliente);
        }
    }
}
