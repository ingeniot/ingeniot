$(function(){
  console.log('JQuery 2020 lista administradores esta funcionando');
  $("#tabla-administradores").ready(function(){
    console.log("carga tabla administradores");
    //alert("id del grupo: " + $("#id-grupo").val());
    //var idGrupo = $("#id-grupo").val();
    var idGrupo = $("#id-grupo").val();                              // Falta lograr pasarle el id del grupo
    console.log("id del grupo:"+idGrupo);
    listarAdministradores(idGrupo);
  });
/*  $("#menu-administradores").click(function(evento){
    evento.preventDefault();
    window.location="administradores";
    console.log("selecciono menu administradores");g
    listarAdministradores();
});*/

//Funcion ver menu administrador (pasar id-administrador al modal)
  //Tengo que usar esta funcion jQuery que ademas de capturar el click pasa los datos del evento
  $(document).on("click", "#ver-administrador", function (evento) {
    //evento.preventDefault();
    console.log("abrir vista detalles administrador");
    //$('#id-eliminar').val = $(this).data('id-administrador')
    /*var idActual = $(this).data('id-administrador');
    var nombreActual = $(this).data('nombre-administrador');
    var tipoActual = $(this).data('tipo-administrador');
    $("#id-actual").val( idActual );
    $("#nombre-actual").val( nombreActual );
    $("#tipo-actual").val( tipoActual );
    //var nombreMostrar = nombreActual.toString();
    $("#nombre-mostrar").html( nombreActual );
    //$("#nombre-actual").val( nombreActual );
  //  $("#mostrar-tipo").val( tipoActual );
      //$("#mostrar-detalles").class("active");*/
    console.log("menu administrador cargo variables");
    var idUsuario = $(this).data('id-usuario');
        console.log("menu administrador cargo variable");
    leerAdministrador(idUsuario);
    abrirMenuAdministrador();
    console.log("menu administrador abre detalles");

  });
  //Funcion cerrar menu administrador
  $("#cerrar-menu-administrador").click(function(evento){
    evento.preventDefault();
    console.log("recibio evento cerrar menu administrador");
    cerrarMenuAdministrador();
  });
  //Fin ver menu disipositivo

  //Funcion abrir editor administrador (pasar id-administrador al modal)
  //Tengo que usar esta funcion jQuery .on que ademas de capturar el click pasa los datos del evento
  $(document).on("click", "#editar-administrador", function (evento) {
    evento.preventDefault();
    console.log("editar administrador");
    //$('#id-eliminar').val = $(this).data('id-administrador')
    var idActual = $("#id-actual").val();
    var emailActual = $("#email-actual").val();
    var nombreActual = $("#nombre-actual").val();
    var apellidoActual = $("#apellido-actual").val();
    var descripcionActual = $("#descripcion-actual").val();
    var tableroActual = $("#tablero-actual").val();
    $("#id-editar").val( idActual );
    $("#email-original").val( emailActual );
    $("#email-editar").val( emailActual );
    $("#nombre-original").val( nombreActual );
    $("#nombre-editar").val( nombreActual );
    $("#apellido-original").val( apellidoActual );
    $("#apellido-editar").val( apellidoActual );
    $("#descripciom-original").val( descripcionActual );
    $("#descripcion-editar").val( descripcionActual );
    $("#tablero-original").val( tableroActual );
    $("#tablero-editar").val( tableroActual );
    console.log("editar administrador cargo variables");
    console.log("editar administrador abre editar");
    abrirEditar();
  });

  //Funcion cerrar formulario editar administrador
  $("#cancelar-editar-administrador").click(function(evento){
    evento.preventDefault();
    cerrarEditar();
    console.log("recibio evento cancelar");
  });

  //Funcion confirmar editar administrador
  $("#confirmar-editar-administrador").click(function(evento){
    evento.preventDefault();
    //console.log("agregar");
    var administradorEditado = {
      id: $("#id-editar").val(),
      email:$("#email-editar").val(),
      email_original:$("#email-original").val(),
      nombre: $("#nombre-editar").val(),
      nombre_original: $("#nombre-original").val(),
      apellido:$("#apellido-editar").val(),
      apellido_original:$("#apellido-original").val(),
      descripcion:$("#descripcion-editar").val(),
      descripcion_original:$("#descripcion-original").val(),

    };
    console.log(administradorEditado);
    $.post("../app/administradores/EditarAdministrador.inc.php",
    administradorEditado,
    function(respuesta,estado){
      console.log(respuesta);
      var validacion = JSON.parse(respuesta);
      console.log(validacion);
      //alert("cambios"+validacion.cambios+"\n valido "+validacion.valido+"\n enombre "+validacion.error_nombre+"\n etipo "+validacion.error_tipo);
      if(validacion.cambios)
        {
          if(validacion.valido){
            //setTimeout(function() { alert("El administrador fue modificado"); }, 1);
            alert("El administrador fue modificado");

            cerrarEditar();
            var idGrupo = $("#id-grupo").val();
            listarAdministradores(idGrupo);
          }
          else{
            alert(validacion.error_nombre+"\n"+validacion.error_tipo);
          }
        }
      else{
        cerrarEditar();
      }
      //alert(validacion.error_nombre);
    });

  });
  //Fin funcion editar administrador

//Funcion abrir formulario agregar administrador
$("#agregar-administrador").click(function(evento){
  evento.preventDefault();
  console.log("recibio evento agregar-administrador");
    abrirAgregar();
});



//Funcion agregar administrador
$("#confirmar-agregar-administrador").click(function(evento){
  evento.preventDefault();
  console.log("confirmar agregar administrador");
  var administradorIngresado = {
    email: $("#email").val(),
    nombre:$("#nombre").val(),
    apellido:$("#apellido").val(),
    descripcion:$("#descripcion").val(),
    id_grupo:$("#id-grupo").val(),
  };
  console.log(administradorIngresado);
  $.post("../app/administradores/AgregarAdministrador.inc.php",
  administradorIngresado,
  function(respuesta,estado){
    console.log("respuesta post:   "+ respuesta);
    var validacion = JSON.parse(respuesta);
    console.log(validacion);
    if(validacion.valido){
      cerrarAgregar();
      //alert("El administrador fue agregado");
      datos={
      activar_cuenta:true,
      email: $("#email").val(),
      };
      console.log("datos1->"+datos.activar_cuenta+"datos2->"+datos.email);
      $.post("../app/usuarios_tokens/GenerarTokenActivacion.inc.php",
      datos,
      function(respuesta,estado) {
        alert(respuesta);
        var idGrupo = $("#id-grupo").val();
        listarAdministradores(idGrupo);
      });
    }
    else{
      alert(validacion.error_email+ "\n"+validacion.error_nombre+ "\n"+validacion.error_apellido);
      //  alert(validacion.error_tipo);
    }
  });

});
//Funcion cerrar formulario agregar administrador
$("#cancelar-agregar-administrador").click(function(evento){
  evento.preventDefault();
  cerrarAgregar();
  console.log("recibio evento cancelar");
});

  //Funcion buscar administrador
  $('#nombre-buscado').keyup(function(evento){
    console.log('Detecto un caracter');
    let nombreBuscado = $('#nombre-buscado').val();
    console.log(nombreBuscado);
    $.ajax({
      url:'../app/administradores/BuscarAdministrador.inc.php',
      type:'POST',
      data:{nombreBuscado:nombreBuscado},
      success:function(respuesta){
        //console.log(respuesta);
        let datos=JSON.parse(respuesta);
        //console.log(datos);
      },
      error:function(error){
        console.log(error);
      },
      always:function(finalizo){
        console.log(finalizo);
      }
    })
  })
  //Elimminar administrador
  //Funcion eliminar administrador (pasar id-administrador al modal)
  //Tengo que usar esta funcion jQuery .on que ademas de capturar el click pasa los datos del evento
  $(document).on("click", "#eliminar-administrador", function (evento) {
    //evento.preventDefault();
    console.log("modal eliminar administrador");
    //$('#id-eliminar').val = $(this).data('id-administrador')
    var idActual = $(this).data('id-usuario');
    console.log(idActual);
    $("#id-eliminar").val( idActual );
    //$('#modal-eliminar').modal('show');
    var idVer = $("#id-eliminar").val();
    console.log(idVer);
          //  confirm("ESta seguro?");
  });

  $("#confirmar-eliminar").click(function(evento){
    evento.preventDefault();
    console.log("funcion confirmar eliminar paso 1");
    var idEliminar = $("#id-eliminar").val();
    var administradorEliminar = {
      id: $("#id-eliminar").val(),
    };
    console.log("funcion confirmar eliminar paso 2");
    console.log(administradorEliminar);
    $.post("../app/administradores/EliminarAdministrador.inc.php",
    administradorEliminar,
    function(respuesta,estado){
      console.log(respuesta);
      var validacion = JSON.parse(respuesta);
            console.log(validacion);
      if(validacion.eliminado == true){
        console.log("eliminar success");
        //cerrarEliminar();
        alert("El administrador fue elliminado");
      }
      else{
        alert("Ha ocurrido un error");
      }
    });
      var idGrupo = $("#id-grupo").val();
      listarAdministradores(idGrupo);
  });
//fin eliminar administrador
//Funcion login administrador
  //Tengo que usar esta funcion jQuery que ademas de capturar el click pasa los datos del evento
  $(document).on("click", "#login-administrador", function (evento) {
    //evento.preventDefault();
    console.log("login administrador");
    var idUsuario = $(this).data('id-usuario');
    console.log("menu administrador cargo variable");
    var usuario = leerAdministrador(idUsuario);
    console.log("login usuario"+usuario.email+usuario.clave);
  });
});

//Inicio funciones JS
function leerAdministrador(idUsuario){
  //console.log("funcion leer administrador"+administrador.id);
  $.post("../app/administradores/LeerAdministrador.inc.php",
  {id:idUsuario},
  function(respuesta,estado){
    console.log(respuesta);
    var administrador = JSON.parse(respuesta);
    console.log("administrador respuesta:"+administrador);
    $("#id-actual").val(administrador.id);
    $("#email-actual").val(administrador.email);
    $("#nombre-actual").val(administrador.nombre);
    $("#apellido-actual").val(administrador.apellido);
    $("#descripcion-actual").val(administrador.descripcion);
    $("#nombre-mostrar").html(administrador.nombre);
  });
  return administrador;
}

//Funcion para listar ispositivos
function listarAdministradores(idGrupo){
      console.log("listar administradores")
  $.ajax({
    url:'../app/administradores/ListarAdministradores.inc.php',
    type: 'POST',
    data:{id_grupo:idGrupo},
    success: function(respuesta){
      console.log("respuesta \n"+respuesta);
      let administradores = JSON.parse(respuesta);
      let plantilla = "";
      var i=0;
      administradores.forEach(administrador=>{
        i++;
        plantilla += "<tr> <td>"+i+"</td> <td>" + administrador.fecha +
        "</td> <td>" + administrador.nombre + "</td> <td>" + administrador.apellido +
        "</td> <td>" + administrador.email+"</td> <td>" +
        /*Boton login administrador*/
        "<button id = 'login-administrador' class='md-btn md-fab md-xmini m-b-sm'"+
        "data-id-usuario='"+administrador.id +
        "'style='background-color:DodgerBlue;'>"+
        "<i class='material-icons md-12'></i> <!--Login administrador--></button>"+

        /*Fin Boton login administrador*/
        /*Boton editar administrador*/
        "</td>  <td> <button id = 'ver-administrador' class='md-btn md-fab md-xmini m-b-sm'"+
        "data-id-usuario='"+administrador.id +
        "'style='background-color:DodgerBlue;'>"+
        "<i class='material-icons md-12'></i> <!--Editar administrador--></button>"+
        /*Fin Boton editar administrador*/
        "</td>  <td>  <button id ='eliminar-administrador' class='md-btn md-fab md-xmini m-b-sm grey'"+
        "data-id-usuario='"+administrador.id +
      /*"'onclick'=seleccionarAdministrador("+administrador.id+")"+*/
        "' data-toggle='modal' data-target = '#modal-eliminar-administrador' ui-target='#animate' ui-toggle-class='bounce'>"+
        " <i class='material-icons md-12'></i> <!--Eliminar administrador--></button> </td></tr>"
                /*Boton eliminar administrador*/
      });

      console.log("imprimir respuesta");
      $("#lista-administradores").html(plantilla);
      console.log("imprimio  respuesta");
    }
  });
}
function abrirMenuAdministrador() {
    console.log("funcion ver menu administrador");
    $("#menu-administrador").css({"display":"block"});
}
function cerrarMenuAdministrador(){
  $("#menu-administrador").css({"display":"none"});
}
function abrirAgregar() {
$("#formulario-agregar-administrador").css({"display":"block"});
}

function cerrarAgregar(){
$("#formulario-agregar-administrador").css({"display":"none"});
}

function abrirEditar() {
    console.log("funcion abrir editar");
    $("#formulario-editar-administrador").css({"display":"block"});
}
function cerrarEditar(){
  $("#formulario-editar-administrador").css({"display":"none"});
}
/*
//$(selector).load(URL,data,callback);
function listarAdministradores(){
  console.log("listar administradores");
  $("#lista-administradores").load(
    './app/administradores/ListarAdministradores.inc.php',
    function(respuesta){
      console.log(respuesta);
      let administradores = JSON.parse(respuesta);
      let plantilla = "";
      administradores.forEach(administrador=>{
        plantilla += "<tr> <td> 1 </td> <td>" + administrador.fecha +
        "</td> <td>" + administrador.nombre + "</td> <td>" + administrador.tipo +"</td> <td>" +

        "<button id = 'editar-administrador' class='md-btn md-fab md-xmini m-b-sm'"+
        "data-id-administrador='"+administrador.id +
        "'data-nombre-administrador='"+administrador.nombre +
        "'data-tipo-administrador='"+administrador.tipo +
        "'style='background-color:DodgerBlue;'>"+
        "<i class='material-icons md-12'></i> <!--Editar administrador--></button>"+

        "</td>  <td>  <button id ='eliminar-administrador' class='md-btn md-fab md-xmini m-b-sm grey'"+
        "data-id-administrador='"+administrador.id +
      /*"'onclick'=seleccionarAdministrador("+administrador.id+")"+*/
/*        "' data-toggle='modal' data-target='#modal-eliminar' ui-toggle-class='bounce' ui-target='#animate' data>"+
        " <i class='material-icons md-12'></i> <!--Eliminar administrador--></button> </td></tr>"
      });
      $("#lista-administradores").html(plantilla);
    });

}*/
