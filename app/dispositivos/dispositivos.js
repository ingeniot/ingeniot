$(document).ready(function(){
  console.log('JQuery 1550 lista dispositivos esta funcionando');

  $("#tabla-dispositivos").ready(function(){
    console.log("carga tabla dispositivos");
    listarDispositivos();
  });
/*
  //Listar dispositivos
  $("#menu-dispositivos").click(function(evento){
    evento.preventDefault();
    console.log("selecciono menu dispositivos");
    window.location="dispositivos";
    listarDispositivos();
  });
*/
  //Funcion ver menu dispositivo (pasar id-dispositivo al modal)
  //Tengo que usar esta funcion jQuery que ademas de capturar el click pasa los datos del evento
  $(document).on("click", "#ver-dispositivo", function (evento) {
    //evento.preventDefault();
    console.log("abrir vista detalles dispositivo");
    //$('#id-eliminar').val = $(this).data('id-dispositivo')
  /*  var idActual = $(this).data('id-dispositivo');
    var nombreActual = $(this).data('nombre-dispositivo');
    var tipoActual = $(this).data('tipo-dispositivo');
    $("#id-actual").val( idActual );
    $("#nombre-actual").val( nombreActual );
    $("#tipo-actual").val( tipoActual );
    //var nombreMostrar = nombreActual.toString();
    $("#nombre-mostrar").html( nombreActual );
    //$("#nombre-actual").val( nombreActual );
    //  $("#mostrar-tipo").val( tipoActual );
    //$("#mostrar-detalles").class("active");*/
    console.log("menu dispositivo cargo variables");
    var idDispositivo = $(this).data('id-dispositivo');
        console.log("id dispositivo->"+idDispositivo);
    var dispositivo = leerDispositivo(idDispositivo);
    console.log("dispositivo:"+dispositivo);
    abrirMenuDispositivo();
    console.log("menu dispositivo abre detalles");
  });
  //Funcion cerrar menu dispositivo
  $("#cerrar-menu-dispositivo").click(function(evento){
    evento.preventDefault();
    console.log("recibio evento cerrar menu dispositivo");
    cerrarMenuDispositivo();
  });
  //Fin ver menu disipositivo

  //Funcion abrir editor dispositivo (pasar id-dispositivo al modal)
  //Tengo que usar esta funcion jQuery .on que ademas de capturar el click pasa los datos del evento
  $(document).on("click", "#editar-dispositivo", function (evento) {
    evento.preventDefault();
    console.log("editar dispositivo");
    //$('#id-eliminar').val = $(this).data('id-dispositivo')
    $("#id-editar").val($("#id-actual").val());
    $("#nombre-original").val($("#nombre-actual").val() );
    $("#nombre-editar").val( $("#nombre-actual").val());
    $("#tipo-original").val($("#tipo-actual").val());
    $("#tipo-editar").val($("#tipo-actual").val());
    $("#etiqueta-original").val( $("#etiqueta-actual").val() );
    $("#etiqueta-editar").val( $("#etiqueta-actual").val() );
    $("#descripcion-original").val( $("#descripcion-actual").val() );
    $("#descripcion-editar").val( $("#descripcion-actual").val() );
    console.log("editar dispositivo cargo variables");
    console.log("editar dispositivo abre editar");
    abrirEditar();
  });

  //Funcion cerrar formulario editar dispositivo
  $("#cancelar-editar-dispositivo").click(function(evento){
    evento.preventDefault();
    cerrarEditar();
    console.log("recibio evento cancelar");
  });

  //Funcion confirmar editar dispositivo
  $("#confirmar-editar-dispositivo").click(function(evento){
    evento.preventDefault();
    //console.log("agregar");
    var dispositivoEditado = {
      id: $("#id-editar").val(),
      nombre: $("#nombre-editar").val(),
      nombre_original: $("#nombre-original").val(),
      tipo:$("#tipo-editar").val(),
      tipo_original:$("#tipo-original").val(),
      etiqueta:$("#etiqueta-editar").val(),
      etiqueta_original:$("#etiqueta-original").val(),
      descripcion:$("#descripcion-editar").val(),
      descripcion_original:$("#descripcion-original").val(),
    };
    console.log(dispositivoEditado);
    $.post("../app/dispositivos/EditarDispositivo.inc.php",
    dispositivoEditado,
    function(respuesta,estado){
      console.log(respuesta);
      var validacion = JSON.parse(respuesta);
      console.log(validacion);
      //alert("cambios"+validacion.cambios+"\n valido "+validacion.valido+"\n enombre "+validacion.error_nombre+"\n etipo "+validacion.error_tipo);
      if(validacion.cambios)
      {
        if(validacion.valido){
          //setTimeout(function() { alert("El dispositivo fue modificado"); }, 1);
          alert("El dispositivo fue modificado");
          leerDispositivo($("#id-actual").val());
          cerrarEditar();

          listarDispositivos();
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
  //Fin funcion editar dispositivo

  //Funcion abrir formulario agregar dispositivo
  $("#agregar-dispositivo").click(function(evento){
    evento.preventDefault();
    console.log("recibio evento agregar-dispositivo");
    abrirAgregar();
  });



  //Funcion agregar dispositivo
  $("#confirmar-agregar-dispositivo").click(function(evento){
    evento.preventDefault();
    console.log("confirmar agregar dispositivo");
    var dispositivoIngresado = {
      nombre: $("#nombre").val(),
      tipo:$("#tipo").val(),
      etiqueta:$('#etiqueta').val(),
      descripcion:$('#descripcion').val(),
    };
    console.log(dispositivoIngresado);
    $.post("../app/dispositivos/AgregarDispositivo.inc.php",
    dispositivoIngresado,
    function(respuesta,estado){
      console.log("respuesta post:   "+ respuesta);
      var validacion = JSON.parse(respuesta);
      console.log(validacion);
      if(validacion.valido){
        cerrarAgregar();
        alert("El dispositivo fue agregado");

        listarDispositivos();
      }
      else{
        alert(validacion.error_nombre+ "\n"+validacion.error_tipo);
        //  alert(validacion.error_tipo);
      }
    });

  });
  //Funcion cerrar formulario agregar dispositivo
  $("#cancelar-agregar-dispositivo").click(function(evento){
    evento.preventDefault();
    cerrarAgregar();
    console.log("recibio evento cancelar");
  });

  //Funcion buscar dispositivo
  $('#nombre-buscado').keyup(function(evento){
    console.log('Detecto un caracter');
    let nombreBuscado = $('#nombre-buscado').val();
    console.log(nombreBuscado);
    $.ajax({
      url:'../app/dispositivos/BuscarDispositivo.inc.php',
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
  //Elimminar dispositivo
  //Funcion eliminar dispositivo (pasar id-dispositivo al modal)
  //Tengo que usar esta funcion jQuery .on que ademas de capturar el click pasa los datos del evento
  $(document).on("click", "#eliminar-dispositivo", function (evento) {
    //evento.preventDefault();
    console.log("modal eliminar dispositivo");
    //$('#id-eliminar').val = $(this).data('id-dispositivo')
    var idActual = $(this).data('id-dispositivo');
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
    var dispositivoEliminar = {
      id: $("#id-eliminar").val(),
    };
    console.log("funcion confirmar eliminar paso 2");
    console.log(dispositivoEliminar);
    $.post("../app/dispositivos/EliminarDispositivo.inc.php",
    dispositivoEliminar,
    function(respuesta,estado){
      console.log(respuesta);
      var validacion = JSON.parse(respuesta);
      console.log(validacion);
      if(validacion.eliminado == true){
        console.log("eliminar success");
        //cerrarEliminar();
        alert("El dispositivo fue elliminado");
      }
      else{
        alert("Ha ocurrido un error");
      }
    });
    listarDispositivos();
  });
  //fin eliminar dispositivo

  $("#asignar-cliente").click(function(evento){
    evento.preventDefault();
    console.log("recibio evento asignar cliente");
    abrirAsignarCliente();
  });
  //Funcion confirmar asignar dispositivo dispositivo
  $("#confirmar-asignar-cliente").click(function(evento){
    evento.preventDefault();
    var vinculo = {
      id_cliente:$("#nombres-clientes").val(),
      id_dispositivo:$("#id-actual").val(),
    }
    console.log("recibio id cliente->"+vinculo.id_cliente+"id dispositivo->"+vinculo.id_dispositivo);
    $.post("../app/dispositivos/AsignarCliente.inc.php",
    vinculo,
    function(respuesta,estado){
      console.log(respuesta);
      var validacion = JSON.parse(respuesta);
      console.log(validacion);
      if(validacion.asignado == true){
        console.log("asignar exitoso");
        //cerrarEliminar();
        alert("El dispositivo fue asignado");

      }
      else{
        alert("Ha ocurrido un error");
      }
      cerrarAsignarCliente();
      leerDispositivo($("#id-actual").val());
    });
    listarDispositivos();
  });
  //Funcion cerrar formulario agregar dispositivo
  $("#cancelar-asignar-cliente").click(function(evento){
    evento.preventDefault();
    cerrarAsignarCliente();
    console.log("recibio evento cerrar asignar cliente");
  });

  $("#nombre-cliente").ready(function(){
    console.log("carga nombres clientes");
    listarNombresClientes();
  });

//Fin funciones jquery
});

//Inicio funciones JS
function leerDispositivo(idDispositivo){
  //console.log("funcion leer dispositivo"+dispositivo.id);
  console.log("id dispositivo recibido para leer"+idDispositivo);
  $.post("../app/dispositivos/LeerDispositivo.inc.php",
  {id:idDispositivo},
  function(respuesta,estado){
    console.log("respuesta->"+respuesta);
    var dispositivo = JSON.parse(respuesta);
    console.log("dispositivo->"+dispositivo);

    $("#id-actual").val(dispositivo.id);
    $("#cliente-actual").val(dispositivo.cliente);
    $("#nombre-actual").val(dispositivo.nombre);
    $("#tipo-actual").val(dispositivo.tipo);
    $("#etiqueta-actual").val(dispositivo.etiqueta);
    $("#descripcion-actual").val(dispositivo.descripcion);
    $("#nombre-mostrar").html(dispositivo.nombre);
    return dispositivo;
  });
}

//Funcion para listar ispositivos
function listarDispositivos(){
  $.ajax({
    url:'../app/dispositivos/ListarDispositivos.inc.php',
    type: 'GET',
    success: function(respuesta){
      console.log("respuesta \n"+respuesta);
      let dispositivos = JSON.parse(respuesta);
      let plantilla = "";
      var i=0;
      console.log("dispositivos "+dispositivos);
      if(dispositivos==""){
      plantilla+="<tr> <td>No hay dispositivos </td> </tr>"
      console.log("vacio ");
      }
      else{
        dispositivos.forEach(dispositivo=>{
          i++;
          plantilla += "<tr> <td>" + i +" </td> <td>" + dispositivo.fecha +"</td> <td>" + dispositivo.nombre +
          "</td> <td>" + dispositivo.tipo +"</td> <td>" + dispositivo.etiqueta + "</td> <td>" +dispositivo.cliente +
          "</td> <td>" + "<button id = 'ver-dispositivo' class='md-btn md-fab md-xmini m-b-sm'"+
          "data-id-dispositivo='"+dispositivo.id +
          "'data-nombre-dispositivo='"+dispositivo.nombre +
          "'data-tipo-dispositivo='"+dispositivo.tipo +
          "'data-etiqueta-dispositivo='"+dispositivo.etiqueta +
          "'data-cliente-dispositivo='"+dispositivo.cliente +
          "'style='background-color:DodgerBlue;'>"+
          "<i class='material-icons md-12'></i> <!--Editar dispositivo--></button>"+
          /*Boton editar dispositivo*/
          "</td>  <td>  <button id ='eliminar-dispositivo' class='md-btn md-fab md-xmini m-b-sm grey'"+
          "data-id-dispositivo='"+dispositivo.id +
          /*"'onclick'=seleccionarDispositivo("+dispositivo.id+")"+*/
          "' data-toggle='modal' data-target = '#modal-eliminar-dispositivo' ui-target='#animate' ui-toggle-class='bounce'>"+
          " <i class='material-icons md-12'></i> <!--Eliminar dispositivo--></button> </td></tr>"
          /*Boton eliminarr dispositivo*/
        });

    }

      console.log("imprimir respuesta");
      $("#lista-dispositivos").html(plantilla);
      console.log("imprimio  respuesta");
    }
  });
}

//Funcion para listar nombres clientes
function listarNombresClientes(){
  $.ajax({
    url:'../app/dispositivos/ListarNombresClientes.inc.php',
    type: 'GET',
    success: function(respuesta){
      console.log("respuesta \n"+respuesta);
      let clientes = JSON.parse(respuesta);
      let plantilla = "";
      var i=0;
      console.log("dispositivos "+clientes);
      if(clientes==""){
      plantilla+="<option value='No hay clientes'>'"
      console.log("vacio ");
      }
      else{
        clientes.forEach(cliente=>{
          plantilla += "<option value='" + cliente.id +"'>" + cliente.nombre + "</option>"
          /*Lista de opciones de clientes*/
        });
      }
      $("#nombres-clientes").html(plantilla);
    }
  });
}
//Fin Funcion para listar nombres clientes

function abrirMenuDispositivo() {
  console.log("funcion ver menu dispositivo");
  $("#menu-dispositivo").css({"display":"block"});
}
function cerrarMenuDispositivo(){
  $("#menu-dispositivo").css({"display":"none"});
}
function abrirAgregar() {
  $("#formulario-agregar-dispositivo").css({"display":"block"});
}
function cerrarAgregar(){
  $("#formulario-agregar-dispositivo").css({"display":"none"});
}
function abrirEditar() {
  console.log("funcion abrir editar");
  $("#formulario-editar-dispositivo").css({"display":"block"});
}
function cerrarEditar(){
  $("#formulario-editar-dispositivo").css({"display":"none"});
}
function abrirAsignarCliente() {
  $("#formulario-asignar-cliente").css({"display":"block"});
}
function cerrarAsignarCliente(){
  $("#formulario-asignar-cliente").css({"display":"none"});
}
/*
//$(selector).load(URL,data,callback);
function listarDispositivos(){
console.log("listar dispositivos");
$("#lista-dispositivos").load(
'./app/dispositivos/ListarDispositivos.inc.php',
function(respuesta){
console.log(respuesta);
let dispositivos = JSON.parse(respuesta);
let plantilla = "";
dispositivos.forEach(dispositivo=>{
plantilla += "<tr> <td> 1 </td> <td>" + dispositivo.fecha +
"</td> <td>" + dispositivo.nombre + "</td> <td>" + dispositivo.tipo +"</td> <td>" +

"<button id = 'editar-dispositivo' class='md-btn md-fab md-xmini m-b-sm'"+
"data-id-dispositivo='"+dispositivo.id +
"'data-nombre-dispositivo='"+dispositivo.nombre +
"'data-tipo-dispositivo='"+dispositivo.tipo +
"'style='background-color:DodgerBlue;'>"+
"<i class='material-icons md-12'></i> <!--Editar dispositivo--></button>"+

"</td>  <td>  <button id ='eliminar-dispositivo' class='md-btn md-fab md-xmini m-b-sm grey'"+
"data-id-dispositivo='"+dispositivo.id +
/*"'onclick'=seleccionarDispositivo("+dispositivo.id+")"+*/
/*        "' data-toggle='modal' data-target='#modal-eliminar' ui-toggle-class='bounce' ui-target='#animate' data>"+
" <i class='material-icons md-12'></i> <!--Eliminar dispositivo--></button> </td></tr>"
});
$("#lista-dispositivos").html(plantilla);
});

}*/
