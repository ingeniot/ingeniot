
<?php
//Rutas vistas
define ('SERVIDOR','https://ingeniot.tk');
define ('RUTA_INICIO',SERVIDOR.'/inicio/');
define ('RUTA_SYSADMIN',SERVIDOR.'/sysadmin/');
define ('RUTA_ADMINISTRADOR',SERVIDOR.'/administrador/');
define ('RUTA_USUARIO',SERVIDOR.'/usuario/');
//Rutas Usuario
define ('RUTA_DEMO',SERVIDOR.'/demo');
define ('RUTA_REGLAS',SERVIDOR.'/reglas');
define ('RUTA_CLIENTES',SERVIDOR.'/clientes');
define ('RUTA_DOMINIOS',SERVIDOR.'/dominios');
define ('RUTA_DISPOSITIVOS',SERVIDOR.'/dispositivos');
define ('RUTA_ENTIDADES',SERVIDOR.'/entidades');
define ('RUTA_TABLEROS',SERVIDOR.'/tableros');
define ('RUTA_ACCESORIOS',SERVIDOR.'/accesorios');
define ('RUTA_REGISTROS',SERVIDOR.'/registros');
define ("RUTA_PERFIL",SERVIDOR.'/perfil');

//Rutas Administrador
define ('RUTA_USUARIOS',SERVIDOR.'/usuarios');
//define ('RUTA_PRINCIPAL',SERVIDOR.'/principal');
//Rutas sysadmin
define ('RUTA_GRUPOS',SERVIDOR.'/grupos');
define ('RUTA_ADMINISTRADORES',SERVIDOR.'/administradores');
define ('RUTA_RECURSOS',SERVIDOR.'/recursos');
define ('RUTA_CONFIGURACION',SERVIDOR.'/configuracion');
define ('RUTA_CORREO',SERVIDOR.'/correo');
define ('RUTA_SEEGURIDAD',SERVIDOR.'/seguridad');

define ('RUTA_DENEGADO',SERVIDOR.'/denegado');
define ('RUTA_RECUPERAR_CLAVE',SERVIDOR.'/recuperar_clave');
define ('RUTA_GENERAR_TOKEN',SERVIDOR.'/generar_token');
define ('RUTA_RESETEAR_CLAVE',SERVIDOR.'/resetear_clave');
define ('RUTA_CLAVE_ACTUALIZADA',SERVIDOR.'/clave_actualizada');
define ('RUTA_ACTIVAR_CUENTA',SERVIDOR.'/activar_cuenta');
define ('RUTA_PLANTILLAS',SERVIDOR.'/vistas/plantillas');
define ('RUTA_CSS',SERVIDOR.'/css/');
define ('RUTA_JS',SERVIDOR.'/js/');

//Rutas apps
define ('RAIZ','/home/admin/web/ingeniot.tk/public_html/');
define ('RUTA_APP_SQL',RAIZ.'/app/sql/');
define ('RUTA_APP_USUARIOS',RAIZ.'/app/usuarios/');
define ('RUTA_APP_USUARIOS_TOKENS',RAIZ.'/app/usuarios_tokens/');
define ('RUTA_APP_SYS_CONFIG',RAIZ.'/app/sys_config/');
define ('RUTA_APP_EMAIL',RAIZ.'/app/email/');

//define ("DIRECTORIO_RAIZ",realpath(dirname(__FILE__)."/.."));//PHP<5.3
define ("DIRECTORIO_RAIZ",realpath(__DIR__."/.."));//PHP>5.3

//phpinfo();
?>
