$(function(){
  console.log('JQuery 2020 lista usuarios esta funcionando');
  $("#tabla-usuarios").ready(function(){
    console.log("carga tabla usuarios");
    //alert("id del cliente: " + $("#id-cliente").val());
    //var idCliente = $("#id-cliente").val();
    var idCliente = $("#id-cliente").val();                              // Falta lograr pasarle el id del cliente
    console.log("id del cliente:"+idCliente);
    listarUsuarios(idCliente);
  });
/*  $("#menu-usuarios").click(function(evento){
    evento.preventDefault();
    window.location="usuarios";
    console.log("selecciono menu usuarios");g
    listarUsuarios();
});*/

//Funcion ver menu usuario (pasar id-usuario al modal)
  //Tengo que usar esta funcion jQuery que ademas de capturar el click pasa los datos del evento
  $(document).on("click", "#ver-usuario", function (evento) {
    //evento.preventDefault();
    console.log("abrir vista detalles usuario");
    //$('#id-eliminar').val = $(this).data('id-usuario')
    /*var idActual = $(this).data('id-usuario');
    var nombreActual = $(this).data('nombre-usuario');
    var tipoActual = $(this).data('tipo-usuario');
    $("#id-actual").val( idActual );
    $("#nombre-actual").val( nombreActual );
    $("#tipo-actual").val( tipoActual );
    //var nombreMostrar = nombreActual.toString();
    $("#nombre-mostrar").html( nombreActual );
    //$("#nombre-actual").val( nombreActual );
  //  $("#mostrar-tipo").val( tipoActual );
      //$("#mostrar-detalles").class("active");*/
    console.log("menu usuario cargo variables");
    var idUsuario = $(this).data('id-usuario');
        console.log("menu usuario cargo variable");
    leerUsuario(idUsuario);
    abrirMenuUsuario();
    console.log("menu usuario abre detalles");

  });
  //Funcion cerrar menu usuario
  $("#cerrar-menu-usuario").click(function(evento){
    evento.preventDefault();
    console.log("recibio evento cerrar menu usuario");
    cerrarMenuUsuario();
  });
  //Fin ver menu disipositivo

  //Funcion abrir editor usuario (pasar id-usuario al modal)
  //Tengo que usar esta funcion jQuery .on que ademas de capturar el click pasa los datos del evento
  $(document).on("click", "#editar-usuario", function (evento) {
    evento.preventDefault();
    console.log("editar usuario");
    //$('#id-eliminar').val = $(this).data('id-usuario')
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
    console.log("editar usuario cargo variables");
    console.log("editar usuario abre editar");
    abrirEditar();
  });

  //Funcion cerrar formulario editar usuario
  $("#cancelar-editar-usuario").click(function(evento){
    evento.preventDefault();
    cerrarEditar();
    console.log("recibio evento cancelar");
  });

  //Funcion confirmar editar usuario
  $("#confirmar-editar-usuario").click(function(evento){
    evento.preventDefault();
    //console.log("agregar");
    var usuarioEditado = {
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
    console.log(usuarioEditado);
    $.post("../app/usuarios/EditarUsuario.inc.php",
    usuarioEditado,
    function(respuesta,estado){
      console.log(respuesta);
      var validacion = JSON.parse(respuesta);
      console.log(validacion);
      //alert("cambios"+validacion.cambios+"\n valido "+validacion.valido+"\n enombre "+validacion.error_nombre+"\n etipo "+validacion.error_tipo);
      if(validacion.cambios)
        {
          if(validacion.valido){
            //setTimeout(function() { alert("El usuario fue modificado"); }, 1);
            alert("El usuario fue modificado");

            cerrarEditar();
            var idCliente = $("#id-cliente").val();
            listarUsuarios(idCliente);
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
  //Fin funcion editar usuario

//Funcion abrir formulario agregar usuario
$("#agregar-usuario").click(function(evento){
  evento.preventDefault();
  console.log("recibio evento agregar-usuario");
    abrirAgregar();
});



//Funcion agregar usuario
$("#confirmar-agregar-usuario").click(function(evento){
  evento.preventDefault();
  console.log("confirmar agregar usuario");
  var usuarioIngresado = {
    email: $("#email").val(),
    nombre:$("#nombre").val(),
    apellido:$("#apellido").val(),
    descripcion:$("#descripcion").val(),
    id_cliente:$("#id-cliente").val(),
  };
  console.log(usuarioIngresado);
  $.post("../app/usuarios/AgregarUsuario.inc.php",
  usuarioIngresado,
  function(respuesta,estado){
    console.log("respuesta post:   "+ respuesta);
    var validacion = JSON.parse(respuesta);
    console.log(validacion);
    if(validacion.valido){
      cerrarAgregar();
      //alert("El usuario fue agregado");
      datos={
      activar_cuenta:true,
      email: $("#email").val(),
      };
      console.log("datos1->"+datos.activar_cuenta+"datos2->"+datos.email);
      $.post("../app/usuarios_tokens/GenerarTokenActivacion.inc.php",
      datos,
      function(respuesta,estado) {
        alert(respuesta);
        var idCliente = $("#id-cliente").val();
            console.log("id del cliente:"+idCliente);
        listarUsuarios(idCliente);
      });
    }
    else{
      alert(validacion.error_email+ "\n"+validacion.error_nombre+ "\n"+validacion.error_apellido);
      //  alert(validacion.error_tipo);
    }
  });

});
//Funcion cerrar formulario agregar usuario
$("#cancelar-agregar-usuario").click(function(evento){
  evento.preventDefault();
  cerrarAgregar();
  console.log("recibio evento cancelar");
});

  //Funcion buscar usuario
  $('#nombre-buscado').keyup(function(evento){
    console.log('Detecto un caracter');
    let nombreBuscado = $('#nombre-buscado').val();
    console.log(nombreBuscado);
    $.ajax({
      url:'../app/usuarios/BuscarUsuario.inc.php',
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
  //Elimminar usuario
  //Funcion eliminar usuario (pasar id-usuario al modal)
  //Tengo que usar esta funcion jQuery .on que ademas de capturar el click pasa los datos del evento
  $(document).on("click", "#eliminar-usuario", function (evento) {
    //evento.preventDefault();
    console.log("modal eliminar usuario");
    //$('#id-eliminar').val = $(this).data('id-usuario')
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
    var usuarioEliminar = {
      id: $("#id-eliminar").val(),
    };
    console.log("funcion confirmar eliminar paso 2");
    console.log(usuarioEliminar);
    $.post("../app/usuarios/EliminarUsuario.inc.php",
    usuarioEliminar,
    function(respuesta,estado){
      console.log(respuesta);
      var validacion = JSON.parse(respuesta);
            console.log(validacion);
      if(validacion.eliminado == true){
        console.log("eliminar success");
        //cerrarEliminar();
        alert("El usuario fue elliminado");
      }
      else{
        alert("Ha ocurrido un error");
      }
    });
      var idCliente = $("#id-cliente").val();
      listarUsuarios(idCliente);
  });
//fin eliminar usuario
//Funcion login usuario
  //Tengo que usar esta funcion jQuery que ademas de capturar el click pasa los datos del evento
  $(document).on("click", "#login-usuario", function (evento) {
    //evento.preventDefault();
    console.log("login usuario");
    var idUsuario = $(this).data('id-usuario');
    console.log("menu usuario cargo variable");
    var usuario = leerUsuario(idUsuario);
    console.log("login usuario"+usuario.email+usuario.clave);
  });
});

//Inicio funciones JS
function leerUsuario(idUsuario){
  //console.log("funcion leer usuario"+usuario.id);
  $.post("../app/usuarios/LeerUsuario.inc.php",
  {id:idUsuario},
  function(respuesta,estado){
    console.log(respuesta);
    var usuario = JSON.parse(respuesta);
    console.log("usuario respuesta:"+usuario);
    $("#id-actual").val(usuario.id);
    $("#email-actual").val(usuario.email);
    $("#nombre-actual").val(usuario.nombre);
    $("#apellido-actual").val(usuario.apellido);
    $("#descripcion-actual").val(usuario.descripcion);
    $("#nombre-mostrar").html(usuario.nombre);
  });
}

//Funcion para listar ispositivos
function listarUsuarios(idCliente){
      console.log("listar usuarios")
  $.ajax({
    url:'../app/usuarios/ListarUsuarios.inc.php',
    type: 'POST',
    data:{id_cliente:idCliente},
    success: function(respuesta){
      console.log("respuesta \n"+respuesta);
      let usuarios = JSON.parse(respuesta);
      let plantilla = "";
      var i=0;
      usuarios.forEach(usuario=>{
        i++;
        plantilla += "<tr> <td>"+i+"</td> <td>" + usuario.fecha +
        "</td> <td>" + usuario.nombre + "</td> <td>" + usuario.apellido +
        "</td> <td>" + usuario.email+"</td> <td>" +
        /*Boton login usuario*/
        "<button id = 'login-usuario' class='md-btn md-fab md-xmini m-b-sm'"+
        "data-id-usuario='"+usuario.id +
        "'style='background-color:DodgerBlue;'>"+
        "<i class='material-icons md-12'></i> <!--Login usuario--></button>"+

        /*Fin Boton login usuario*/
        /*Boton editar usuario*/
        "</td>  <td> <button id = 'ver-usuario' class='md-btn md-fab md-xmini m-b-sm'"+
        "data-id-usuario='"+usuario.id +
        "'style='background-color:DodgerBlue;'>"+
        "<i class='material-icons md-12'></i> <!--Editar usuario--></button>"+
        /*Fin Boton editar usuario*/
        "</td>  <td>  <button id ='eliminar-usuario' class='md-btn md-fab md-xmini m-b-sm grey'"+
        "data-id-usuario='"+usuario.id +
      /*"'onclick'=seleccionarUsuario("+usuario.id+")"+*/
        "' data-toggle='modal' data-target = '#modal-eliminar-usuario' ui-target='#animate' ui-toggle-class='bounce'>"+
        " <i class='material-icons md-12'></i> <!--Eliminar usuario--></button> </td></tr>"
                /*Boton eliminar usuario*/
      });

      console.log("imprimir respuesta");
      $("#lista-usuarios").html(plantilla);
      console.log("imprimio  respuesta");
    }
  });
}
function abrirMenuUsuario() {
    console.log("funcion ver menu usuario");
    $("#menu-usuario").css({"display":"block"});
}
function cerrarMenuUsuario(){
  $("#menu-usuario").css({"display":"none"});
}
function abrirAgregar() {
$("#formulario-agregar-usuario").css({"display":"block"});
}

function cerrarAgregar(){
$("#formulario-agregar-usuario").css({"display":"none"});
}

function abrirEditar() {
    console.log("funcion abrir editar");
    $("#formulario-editar-usuario").css({"display":"block"});
}
function cerrarEditar(){
  $("#formulario-editar-usuario").css({"display":"none"});
}
/*
//$(selector).load(URL,data,callback);
function listarUsuarios(){
  console.log("listar usuarios");
  $("#lista-usuarios").load(
    './app/usuarios/ListarUsuarios.inc.php',
    function(respuesta){
      console.log(respuesta);
      let usuarios = JSON.parse(respuesta);
      let plantilla = "";
      usuarios.forEach(usuario=>{
        plantilla += "<tr> <td> 1 </td> <td>" + usuario.fecha +
        "</td> <td>" + usuario.nombre + "</td> <td>" + usuario.tipo +"</td> <td>" +

        "<button id = 'editar-usuario' class='md-btn md-fab md-xmini m-b-sm'"+
        "data-id-usuario='"+usuario.id +
        "'data-nombre-usuario='"+usuario.nombre +
        "'data-tipo-usuario='"+usuario.tipo +
        "'style='background-color:DodgerBlue;'>"+
        "<i class='material-icons md-12'></i> <!--Editar usuario--></button>"+

        "</td>  <td>  <button id ='eliminar-usuario' class='md-btn md-fab md-xmini m-b-sm grey'"+
        "data-id-usuario='"+usuario.id +
      /*"'onclick'=seleccionarUsuario("+usuario.id+")"+*/
/*        "' data-toggle='modal' data-target='#modal-eliminar' ui-toggle-class='bounce' ui-target='#animate' data>"+
        " <i class='material-icons md-12'></i> <!--Eliminar usuario--></button> </td></tr>"
      });
      $("#lista-usuarios").html(plantilla);
    });

}*/
