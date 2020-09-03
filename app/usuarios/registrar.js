$(document).ready(function(){
  console.log('JQuery registrar esta funcionando');
  //Funcion REGISTRAR USUARIO
  $("#registrar-usuario").click(function(evento){
    evento.preventDefault();
    console.log("registrar usuario");
    var usuarioIngresado = {
      registrar: true,
      nombre: $("#nombre").val(),
      email:$("#email").val(),
      clave:$("#clave").val(),
      claver:$("#claver").val(),
      nivel:$("#nivel").val(),
    };
    console.log(usuarioIngresado);
    $.post("../app/usuarios/Registrar.inc.php",usuarioIngresado, function(respuesta,estado){
      console.log(respuesta);
      var validacion = JSON.parse(respuesta);
      console.log(validacion);
      if(validacion.valido){

        alert(usuarioIngresado.nombre+" registrado correctamente"+ "\n"+usuarioIngresado.nivel);
        cerrarRegistrar();
      }
      else{
        alert(validacion.error_nombre+ "\n"+validacion.error_email+ "\n"+validacion.error_clave+ "\n"+validacion.error_claver);
        //  alert(validacion.error_tipo);
      }
    });
  });
    });
    function cerrarRegistrar(){
      $("#formulario-registro").css({"display":"none"});
  //  $("#abrir-registro").attr({ "data-toggle" : ""  });
    //$("#"abrir-registrarse"").css({"display":"none"});
    //element.setAttribute(attribute, value)
    //document.getElementById("abrir-registrarse").data-toggle = false;
  };
