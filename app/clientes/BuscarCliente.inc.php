<?php
include_once "../sql/Conexion.inc.php";
include_once dirname(__FILE__)."/RepositorioCliente.inc.php";
$nombre_buscado=$_POST["nombreBuscado"];
//echo 'console.log("empieza requerimiento post")';
if(isset($nombre_buscado)){
//echo 'console.log("empieza conexion a base de datos")';
Conexion::abrir_conexion();
//echo 'console.log("empieza conexion a base de datos")';
$clientes_nombre=RepositorioCliente::buscar_clientes_por_nombre(Conexion::obtener_conexion(),$nombre_buscado);
//echo 'console.log("realizo consulta")';
Conexion::cerrar_conexion();
//echo $clientes_nombre;
//print_r($json);
//print_r($clientes_nombre);
$json_string = json_encode($clientes_nombre);
//print_r($json_string);
echo $json_string;
}
?>
