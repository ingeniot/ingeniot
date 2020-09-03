<?php
include_once "../sql/Conexion.inc.php";
include_once dirname(__FILE__)."/RepositorioDispositivo.inc.php";
$nombre_buscado=$_POST["nombreBuscado"];
//echo 'console.log("empieza requerimiento post")';
if(isset($nombre_buscado)){
//echo 'console.log("empieza conexion a base de datos")';
Conexion::abrir_conexion();
//echo 'console.log("empieza conexion a base de datos")';
$dispositivos_nombre=RepositorioDispositivo::buscar_dispositivos_por_nombre(Conexion::obtener_conexion(),$nombre_buscado);
//echo 'console.log("realizo consulta")';
Conexion::cerrar_conexion();
//echo $dispositivos_nombre;
//print_r($json);
//print_r($dispositivos_nombre);
$json_string = json_encode($dispositivos_nombre);
//print_r($json_string);
echo $json_string;
}
?>
