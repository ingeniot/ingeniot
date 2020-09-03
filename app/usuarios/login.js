$(document).ready(function(){
  console.log('JQuery 1210 usuarios esta funcionando');
  $("#login").click(function(evento){
    evento.preventDefault();
    console.log("login");
    var usuarioIngresado = {
      login: true,
      email:$("#login-email").val(),
      clave: $("#login-clave").val(),
    };
    console.log(usuarioIngresado);
    $.post("../app/usuarios/Login.inc.php",
    usuarioIngresado,
    function(respuesta,estado){
      console.log("respuesta"+respuesta);
      var validacion = JSON.parse(respuesta);
      console.log(validacion);
      if(validacion.valido){

        switch (validacion.nivel) {
          case "sysadmin":
            window.location.href="/sysadmin";
            break;
          case "admin":
            window.location.href="/administrador";
            break;
          case "usuario":
            window.location.href="/usuario";
            break;
          case "demo":
            window.location.href="/demo";
            break;
          default:
            window.location.href="/inicio";
        }

      }
      else {
        alert(validacion.error);
      }
    });

  });
});
