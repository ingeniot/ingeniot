$(function(){
  console.log('JQuery 2350 sysconfig esta funcionando');
  $("#configuracion-correo").ready(function(){
    console.log("carga parametros correo");
    leerConfiguracion("correo");
  });
  //Funcion guardar configuracion
  //Tengo que usar esta funcion jQuery .on que ademas de capturar el click pasa los datos del evento
  $(document).on("click", "#guardar-configuracion-correo", function (evento) {
    evento.preventDefault();
    console.log("guardar configuracion");
    //$('#id-eliminar').val = $(this).data('id-grupo')
    var paramCorreo = {
    email:$("#email").val(),
    protocolo:$("#protocolo").val(),
    servidor:$("#servidor").val(),
    puerto:$("#puerto").val(),
    timeout:$("#timeout").val(),
    tls:$("#tls").val(),
    version_tls:$("#version-tls").val(),
    usuario:$("#usuario").val(),
    clave:$("#clave").val()
  };
   var jsonCorreo = JSON.stringify(paramCorreo);
    var configCorreo={
      llave:"correo",
      json:jsonCorreo,
    };
      console.log("json_correo="+jsonCorreo.email);
    console.log("json_protocolo="+jsonCorreo.protocolo);
    console.log("json="+jsonCorreo);
    $.post(
      "../app/sys_config/GuardarConfiguracion.inc.php",
      configCorreo,
      function(respuesta,estado){
      console.log("respuesta post"+respuesta);
      var validacion = JSON.parse(respuesta);
      console.log(validacion);
      //alert("cambios"+validacion.cambios+"\n valido "+validacion.valido+"\n enombre "+validacion.error_nombre+"\n etipo "+validacion.error_tipo);
      if(!(validacion.cambios==""))
        {
          if(validacion.valido){
            //setTimeout(function() { alert("El grupo fue modificado"); }, 1);
            alert("La configuración fue modificada");
          }
          else{
            alert(validacion.error_nombre+"\n"+validacion.error_tipo);
          }
        }
      else{
        alert("No pudo realizar la configuración indicada");;
      }
      //alert(validacion.error_nombre);
    });
  });


  //Funcion guardar configuracion
  //Tengo que usar esta funcion jQuery .on que ademas de capturar el click pasa los datos del evento
  $(document).on("click", "#enviar-email-prueba", function (evento) {
    evento.preventDefault();
    console.log("enviar email prueba");
    //$('#id-eliminar').val = $(this).data('id-grupo')
    var paramCorreo = {
    email:$("#email").val(),
    protocolo:$("#protocolo").val(),
    servidor:$("#servidor").val(),
    puerto:$("#puerto").val(),
    timeout:$("#timeout").val(),
    tls:$("#tls").val(),
    version_tls:$("#version-tls").val(),
    usuario:$("#usuario").val(),
    clave:$("#clave").val()
  };
    $.post(
      "../app/sys_config/EmailTest.inc.php",
      paramCorreo,
      function(respuesta,estado){
      console.log("respuesta post"+respuesta);
      //var validacion = JSON.parse(respuesta);
      //.log(validacion);
      //alert("cambios"+validacion.cambios+"\n valido "+validacion.valido+"\n enombre "+validacion.error_nombre+"\n etipo "+validacion.error_tipo);
      alert(respuesta);
      //alert(validacion.error_nombre);
    });
  });
});
//Inicio funciones JS
function leerConfiguracion(llave){
  $.post(
    "../app/sys_config/LeerConfiguracion.inc.php",
  {llave:llave},
  function(respuesta,estado){
    console.log(respuesta);
    var parametros = JSON.parse(respuesta);
    console.log(parametros);
        console.log(parametros.email);
    $("#email").val(parametros.email);
    $("#protocolo").val(parametros.protocolo);
    $("#servidor").val(parametros.servidor);
    $("#puerto").val(parametros.puerto);
    $("#timeout").val(parametros.timeout);
    $("#tls").val(parametros.tls);
    $("#version_tls").val(parametros.version_tls);
    $("#usuario").val(parametros.usuario);
    $("#clave").html(parametros.clave);
  });
}
