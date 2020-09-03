<?php
include_once "TokenUsuario.inc.php";
class RepositorioTokenUsuario{
  public static function generar_token($conexion, $id_usuario, $token){
    $token_generado = false;
    if(isset($conexion)) {
      try {
        $sql="INSERT INTO users_tokens(users_tokens_token,users_tokens_user_id) VALUES (:token,:id_usuario)";
        $sentencia=$conexion->prepare($sql);
        $sentencia->bindParam(':token',$token,PDO::PARAM_STR);
        $sentencia->bindParam(':id_usuario',$id_usuario,PDO::PARAM_STR);
        $token_generado=$sentencia->execute();
      } catch (PDOException $ex) {
        print "ERROR".$ex->getMessage();
      }
    }
    return $token_generado;
  }

public static function token_existe($conexion, $token) {
    $token_existe = false;
    if (isset($conexion)) {
        try {
            $sql = "SELECT * FROM users_tokens WHERE users_tokens_token = :token";
            $sentencia = $conexion->prepare($sql);
            $sentencia->bindParam(":token", $token, PDO::PARAM_STR); //para el parametro nombre con un alias para hacer la consulta
            $sentencia->execute(); //Ejecuta la consulta
            $resultado = $sentencia->fetchAll(); //Obtiene los resultados de la consulta
            if (count($resultado)) {
                $token_existe = true;
            } else {
                $token_existe = false;
            }
        } catch (Exception $ex) {
            print "ERROR" . $ex->getMessage();
        }
    }
    return $token_existe;
    //return true;
  }
  public static function obtener_id_usuario_por_token($conexion,$token){
      $id_usuario=null;

      if(isset($conexion)){
          try{
              $sql="SELECT * FROM users_tokens WHERE users_tokens_token=:token";
              $sentencia=$conexion->prepare($sql);
              $sentencia->bindParam(":token",$token,PDO::PARAM_STR);
              $sentencia->execute();
              $resultado=$sentencia->fetch();
              if (!empty($resultado)){
                $id_usuario= $resultado["users_tokens_user_id"];
              }
          }
          catch (Exception $ex) {
              print "ERROR".$ex->getMessage();
            }
          }
        //  echo('<pre>');
        //  var_dump($usuario);
        //  echo('</pre>');
          return $id_usuario;
  }
}
 ?>
