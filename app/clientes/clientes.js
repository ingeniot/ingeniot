$("#clientes").ready(function(){
  console.log('JQuery 0000 lista clientes esta funcionando');
  $("#tabla-clientes").ready(function(){
    console.log("carga tabla clientes");
    listarClientes();
  });
/*  $("#menu-clientes").click(function(evento){
    evento.preventDefault();
    window.location="clientes";
    console.log("selecciono menu clientes");g
    listarClientes();
});*/

//Funcion ver menu cliente (pasar id-cliente al modal)
  //Tengo que usar esta funcion jQuery que ademas de capturar el click pasa los datos del evento
  $(document).on("click", "#ver-cliente", function (evento) {
    //evento.preventDefault();
    console.log("abrir vista detalles cliente");
    //$('#id-eliminar').val = $(this).data('id-cliente')
    /*var idActual = $(this).data('id-cliente');
    var nombreActual = $(this).data('nombre-cliente');
    var tipoActual = $(this).data('tipo-cliente');
    $("#id-actual").val( idActual );
    $("#nombre-actual").val( nombreActual );
    $("#tipo-actual").val( tipoActual );
    //var nombreMostrar = nombreActual.toString();
    $("#nombre-mostrar").html( nombreActual );
    //$("#nombre-actual").val( nombreActual );
  //  $("#mostrar-tipo").val( tipoActual );
      //$("#mostrar-detalles").class("active");*/
    console.log("menu cliente cargo variables");
    var idCliente = $(this).data('id-cliente');
    leerCliente(idCliente);
    abrirMenuCliente();
    console.log("menu cliente abre detalles");

  });
  //Funcion cerrar menu cliente
  $("#cerrar-menu-cliente").click(function(evento){
    evento.preventDefault();
    console.log("recibio evento cerrar menu cliente");
    cerrarMenuCliente();
  });
  //Fin ver menu disipositivo

  //Funcion abrir editor cliente (pasar id-cliente al modal)
  //Tengo que usar esta funcion jQuery .on que ademas de capturar el click pasa los datos del evento
  $(document).on("click", "#editar-cliente", function (evento) {
    evento.preventDefault();
    console.log("editar cliente");
    //$('#id-eliminar').val = $(this).data('id-cliente')
    var idActual = $("#id-actual").val();
    var nombreActual = $("#nombre-actual").val();
    var tipoActual = $("#tipo-actual").val();
    $("#id-editar").val( idActual );
    $("#nombre-original").val( nombreActual );
    $("#nombre-editar").val( nombreActual );
    $("#tipo-original").val( tipoActual );
    $("#tipo-editar").val( tipoActual );
    console.log("editar cliente cargo variables");
    console.log("editar cliente abre editar");
    abrirEditar();
  });

  //Funcion cerrar formulario editar cliente
  $("#cancelar-editar-cliente").click(function(evento){
    evento.preventDefault();
    cerrarEditar();
    console.log("recibio evento cancelar");
  });

  //Funcion confirmar editar cliente
  $("#confirmar-editar-cliente").click(function(evento){
    evento.preventDefault();
    //console.log("agregar");
    var clienteEditado = {
      id: $("#id-actual").val(),
      nombre: $("#nombre-editar").val(),
      nombre_original: $("#nombre-original").val(),
      tipo:$("#tipo-editar").val(),
      tipo_original:$("#tipo-original").val(),
      tipo:$("#pais-editar").val(),
      tipo_original:$("#pais-original").val(),
      tipo:$("#estado-editar").val(),
      tipo_original:$("#estado-original").val(),
      tipo:$("#ciudad-editar").val(),
      tipo_original:$("#ciudad-original").val(),
      tipo:$("#direccion-editar").val(),
      tipo_original:$("#direccion-original").val(),
      tipo:$("#tipo-editar").val(),
      tipo_original:$("#tipo-original").val(),
    };
    console.log(clienteEditado);
    $.post("../app/clientes/EditarCliente.inc.php",clienteEditado, function(respuesta,estado){
      console.log(respuesta);
      var validacion = JSON.parse(respuesta);
      console.log(validacion);
      //alert("cambios"+validacion.cambios+"\n valido "+validacion.valido+"\n enombre "+validacion.error_nombre+"\n etipo "+validacion.error_tipo);
      if(validacion.cambios)
        {
          if(validacion.valido){
            //setTimeout(function() { alert("El cliente fue modificado"); }, 1);
            alert("El cliente fue modificado");

            cerrarEditar();
            listarClientes();
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
  //Fin funcion editar cliente

//Funcion abrir formulario agregar cliente
$("#agregar-cliente").click(function(evento){
  evento.preventDefault();
  console.log("recibio evento agregar-cliente");
    abrirAgregar();
});



//Funcion agregar cliente
$("#confirmar-agregar-cliente").click(function(evento){
  evento.preventDefault();
  console.log("confirmar agregar cliente");
  var clienteIngresado = {
    nombre: $("#nombre").val(),
    tipo:$("#tipo").val(),
    pais:$("#pais").val(),
    estado:$("#estado").val(),
    ciudad:$("#ciudad").val(),
    direccion:$("#direccion").val(),
    telefono:$("#telefono").val(),
    email:$("#email").val()
  };
  console.log(clienteIngresado);
  $.post("../app/clientes/AgregarCliente.inc.php",clienteIngresado, function(respuesta,estado){
    console.log("respuesta post:   "+ respuesta);
    var validacion = JSON.parse(respuesta);
    console.log(validacion);
    if(validacion.valido){
        cerrarAgregar();
      alert("El cliente fue agregado");

      listarClientes();
    }
    else{
      alert(validacion.error_nombre+ "\n"+validacion.error_tipo);
      //  alert(validacion.error_tipo);
    }
  });

});
//Funcion cerrar formulario agregar cliente
$("#cancelar-agregar-cliente").click(function(evento){
  evento.preventDefault();
  cerrarAgregar();
  console.log("recibio evento cancelar");
});

  //Funcion buscar cliente
  $('#nombre-buscado').keyup(function(evento){
    console.log('Detecto un caracter');
    let nombreBuscado = $('#nombre-buscado').val();
    console.log(nombreBuscado);
    $.ajax({
      url:'../app/clientes/BuscarCliente.inc.php',
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
  //Elimminar cliente
  //Funcion eliminar cliente (pasar id-cliente al modal)
  //Tengo que usar esta funcion jQuery .on que ademas de capturar el click pasa los datos del evento
  $(document).on("click", "#eliminar-cliente", function (evento) {
    //evento.preventDefault();
    console.log("modal eliminar cliente");
    //$('#id-eliminar').val = $(this).data('id-cliente')
    var idActual = $(this).data('id-cliente');
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
    var clienteEliminar = {
      id: $("#id-eliminar").val(),
    };
    console.log("funcion confirmar eliminar paso 2");
    console.log(clienteEliminar);
    $.post("../app/clientes/EliminarCliente.inc.php",clienteEliminar, function(respuesta,estado){
      console.log(respuesta);
      var validacion = JSON.parse(respuesta);
            console.log(validacion);
      if(validacion.eliminado == true){
        console.log("eliminar success");
        //cerrarEliminar();
        alert("El cliente fue elliminado");
      }
      else{
        alert("Ha ocurrido un error");
      }
    });
      listarClientes();
  });
//fin eliminar cliente

});
//Inicio funciones JS
function leerCliente(idCliente){
  //console.log("funcion leer cliente"+cliente.id);
  $.post("../app/clientes/LeerCliente.inc.php",
  {id:idCliente},
  function(respuesta,estado){
    console.log(respuesta);
    var cliente = JSON.parse(respuesta);
    console.log(cliente);
    $("#id-actual").val(cliente.id);
    $("#cliente-actual").val(cliente.nombre);
    $("#nombre-actual").val(cliente.nombre);
    $("#tipo-actual").val(cliente.tipo);
    $("#pais-actual").val(cliente.pais);
    $("#estado-actual").val(cliente.estado);
    $("#ciudad-actual").val(cliente.ciudad);
    $("#direccion-actual").val(cliente.direccion);
    $("#telefono-actual").val(cliente.telefono);
    $("#email-actual").val(cliente.email);
    $("#nombre-mostrar").html(cliente.nombre);
    //return cliente;
  });
}

//Funcion para listar ispositivos
function listarClientes(){
  $.ajax({
    url:'../app/clientes/ListarClientes.inc.php',
    type: 'GET',
    success: function(respuesta){
      console.log("respuesta \n"+respuesta);
      let clientes = JSON.parse(respuesta);
      let plantilla = "";
      var i=0;
      clientes.forEach(cliente=>{
        i++;
        plantilla += "<tr> <td>"+i+"</td> <td>" + cliente.fecha +
        "</td> <td>" + cliente.nombre + "</td> <td>" + cliente.tipo +"</td> <td>" +

        "<button id = 'ver-cliente' class='md-btn md-fab md-xmini m-b-sm'"+
        "data-id-cliente='"+cliente.id +
        "'data-nombre-cliente='"+cliente.nombre +
        "'data-tipo-cliente='"+cliente.tipo +
        "'style='background-color:DodgerBlue;'>"+
        "<i class='material-icons md-12'></i> <!--Editar cliente--></button>"+
        /*Boton editar cliente*/
        "</td>  <td>  <button id ='eliminar-cliente' class='md-btn md-fab md-xmini m-b-sm grey'"+
        "data-id-cliente='"+cliente.id +
      /*"'onclick'=seleccionarCliente("+cliente.id+")"+*/
        "' data-toggle='modal' data-target = '#modal-eliminar-cliente' ui-target='#animate' ui-toggle-class='bounce'>"+
        " <i class='material-icons md-12'></i> <!--Eliminar cliente--></button> </td></tr>"
                /*Boton eliminar cliente*/
      });

      console.log("imprimir respuesta");
      $("#lista-clientes").html(plantilla);
      console.log("imprimio  respuesta");
    }
  });
}
function abrirMenuCliente() {
    console.log("funcion ver menu cliente");
    $("#menu-cliente").css({"display":"block"});
}
function cerrarMenuCliente(){
  $("#menu-cliente").css({"display":"none"});
}
function abrirAgregar() {
$("#formulario-agregar-cliente").css({"display":"block"});
}

function cerrarAgregar(){
$("#formulario-agregar-cliente").css({"display":"none"});
}

function abrirEditar() {
    console.log("funcion abrir editar");
    $("#formulario-editar-cliente").css({"display":"block"});
}
function cerrarEditar(){
  $("#formulario-editar-cliente").css({"display":"none"});
}
/*
//$(selector).load(URL,data,callback);
function listarClientes(){
  console.log("listar clientes");
  $("#lista-clientes").load(
    './app/clientes/ListarClientes.inc.php',
    function(respuesta){
      console.log(respuesta);
      let clientes = JSON.parse(respuesta);
      let plantilla = "";
      clientes.forEach(cliente=>{
        plantilla += "<tr> <td> 1 </td> <td>" + cliente.fecha +
        "</td> <td>" + cliente.nombre + "</td> <td>" + cliente.tipo +"</td> <td>" +

        "<button id = 'editar-cliente' class='md-btn md-fab md-xmini m-b-sm'"+
        "data-id-cliente='"+cliente.id +
        "'data-nombre-cliente='"+cliente.nombre +
        "'data-tipo-cliente='"+cliente.tipo +
        "'style='background-color:DodgerBlue;'>"+
        "<i class='material-icons md-12'></i> <!--Editar cliente--></button>"+

        "</td>  <td>  <button id ='eliminar-cliente' class='md-btn md-fab md-xmini m-b-sm grey'"+
        "data-id-cliente='"+cliente.id +
      /*"'onclick'=seleccionarCliente("+cliente.id+")"+*/
/*        "' data-toggle='modal' data-target='#modal-eliminar' ui-toggle-class='bounce' ui-target='#animate' data>"+
        " <i class='material-icons md-12'></i> <!--Eliminar cliente--></button> </td></tr>"
      });
      $("#lista-clientes").html(plantilla);
    });

}*/
