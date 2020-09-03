$(document).ready(function(){
  console.log('JQuery 1550 lista tableros esta funcionando');

  $("#tabla-tableros").ready(function(){
    console.log("carga tabla tableros");
    listarTableros();
  });
/*
  //Listar tableros
  $("#menu-tableros").click(function(evento){
    evento.preventDefault();
    console.log("selecciono menu tableros");
    window.location="tableros";
    listarTableros();
  });
*/
  //Funcion ver menu tablero (pasar id-tablero al modal)
  //Tengo que usar esta funcion jQuery que ademas de capturar el click pasa los datos del evento
  $(document).on("click", "#ver-tablero", function (evento) {
    //evento.preventDefault();
    console.log("abrir vista detalles tablero");
    //$('#id-eliminar').val = $(this).data('id-tablero')
  /*  var idActual = $(this).data('id-tablero');
    var nombreActual = $(this).data('nombre-tablero');
    var tipoActual = $(this).data('tipo-tablero');
    $("#id-actual").val( idActual );
    $("#nombre-actual").val( nombreActual );
    $("#tipo-actual").val( tipoActual );
    //var nombreMostrar = nombreActual.toString();
    $("#nombre-mostrar").html( nombreActual );
    //$("#nombre-actual").val( nombreActual );
    //  $("#mostrar-tipo").val( tipoActual );
    //$("#mostrar-detalles").class("active");*/
    console.log("menu tablero cargo variables");
    var idTablero = $(this).data('id-tablero');
        console.log("id tablero->"+idTablero);
    var tablero = leerTablero(idTablero);
    console.log("tablero:"+tablero);
    abrirMenuTablero();
    console.log("menu tablero abre detalles");
  });
  //Funcion cerrar menu tablero
  $("#cerrar-menu-tablero").click(function(evento){
    evento.preventDefault();
    console.log("recibio evento cerrar menu tablero");
    cerrarMenuTablero();
  });
  //Fin ver menu disipositivo

  //Funcion abrir editor tablero (pasar id-tablero al modal)
  //Tengo que usar esta funcion jQuery .on que ademas de capturar el click pasa los datos del evento
  $(document).on("click", "#editar-tablero", function (evento) {
    evento.preventDefault();
    console.log("editar tablero");
    //$('#id-eliminar').val = $(this).data('id-tablero')
    var idActual = $("#id-actual").val();
    var nombreActual = $("#nombre-actual").val();
    var tipoActual = $("#tipo-actual").val();
    $("#id-editar").val( idActual );
    $("#nombre-original").val( nombreActual );
    $("#nombre-editar").val( nombreActual );
    $("#tipo-original").val( tipoActual );
    $("#tipo-editar").val( tipoActual );
    console.log("editar tablero cargo variables");
    console.log("editar tablero abre editar");
    abrirEditar();
  });

  //Funcion cerrar formulario editar tablero
  $("#cancelar-editar-tablero").click(function(evento){
    evento.preventDefault();
    cerrarEditar();
    console.log("recibio evento cancelar");
  });

  //Funcion confirmar editar tablero
  $("#confirmar-editar-tablero").click(function(evento){
    evento.preventDefault();
    //console.log("agregar");
    var tableroEditado = {
      id: $("#id-editar").val(),
      nombre: $("#nombre-editar").val(),
      nombre_original: $("#nombre-original").val(),
      tipo:$("#tipo-editar").val(),//Se uso tipo en lugar descripcion para usar funciones existentes
      tipo_original:$("#tipo-original").val(),
    };
    console.log(tableroEditado);
    $.post("../app/tableros/EditarTablero.inc.php",
    tableroEditado,
    function(respuesta,estado){
      console.log(respuesta);
      var validacion = JSON.parse(respuesta);
      console.log(validacion);
      //alert("cambios"+validacion.cambios+"\n valido "+validacion.valido+"\n enombre "+validacion.error_nombre+"\n etipo "+validacion.error_tipo);
      if(validacion.cambios)
      {
        if(validacion.valido){
          //setTimeout(function() { alert("El tablero fue modificado"); }, 1);
          alert("El tablero fue modificado");
          leerTablero($("#id-actual").val());
          cerrarEditar();
          listarTableros();
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
  //Fin funcion editar tablero

  //Funcion abrir formulario agregar tablero
  $("#agregar-tablero").click(function(evento){
    evento.preventDefault();
    console.log("recibio evento agregar-tablero");
    abrirAgregar();
  });



  //Funcion agregar tablero
  $("#confirmar-agregar-tablero").click(function(evento){
    evento.preventDefault();
    console.log("confirmar agregar tablero");
    var tableroIngresado = {
      nombre: $("#nombre").val(),
      tipo:$("#tipo").val(),
    };
    console.log("tableroIngresado->"+tableroIngresado.nombre+"  "+tableroIngresado.tipo);
    $.post("../app/tableros/AgregarTablero.inc.php",
    tableroIngresado,
    function(respuesta,estado){
      console.log("respuesta post:   "+ respuesta);
      var validacion = JSON.parse(respuesta);
      console.log(validacion);
      if(validacion.valido){
        cerrarAgregar();
        alert("El tablero fue agregado");

        listarTableros();
      }
      else{
        alert(validacion.error_nombre+ "\n"+validacion.error_tipo);
        //  alert(validacion.error_tipo);
      }
    });

  });
  //Funcion cerrar formulario agregar tablero
  $("#cancelar-agregar-tablero").click(function(evento){
    evento.preventDefault();
    cerrarAgregar();
    console.log("recibio evento cancelar");
  });

  //Funcion buscar tablero
  $('#nombre-buscado').keyup(function(evento){
    console.log('Detecto un caracter');
    let nombreBuscado = $('#nombre-buscado').val();
    console.log(nombreBuscado);
    $.ajax({
      url:'../app/tableros/BuscarTablero.inc.php',
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
  //Elimminar tablero
  //Funcion eliminar tablero (pasar id-tablero al modal)
  //Tengo que usar esta funcion jQuery .on que ademas de capturar el click pasa los datos del evento
  $(document).on("click", "#eliminar-tablero", function (evento) {
    //evento.preventDefault();
    console.log("modal eliminar tablero");
    //$('#id-eliminar').val = $(this).data('id-tablero')
    var idActual = $(this).data('id-tablero');
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
    var tableroEliminar = {
      id: $("#id-eliminar").val(),
    };
    console.log("funcion confirmar eliminar paso 2");
    console.log(tableroEliminar);
    $.post("../app/tableros/EliminarTablero.inc.php",
    tableroEliminar,
    function(respuesta,estado){
      console.log(respuesta);
      var validacion = JSON.parse(respuesta);
      console.log(validacion);
      if(validacion.eliminado == true){
        console.log("eliminar success");
        //cerrarEliminar();
        alert("El tablero fue elliminado");
      }
      else{
        alert("Ha ocurrido un error");
      }
    });
    listarTableros();
  });
  //fin eliminar tablero

  $("#asignar-cliente").click(function(evento){
    evento.preventDefault();
    console.log("recibio evento asignar cliente");
    abrirAsignarCliente();
  });
  //Funcion confirmar asignar tablero tablero
  $("#confirmar-asignar-cliente").click(function(evento){
    evento.preventDefault();
    var vinculo = {
      id_cliente:$("#nombres-clientes").val(),
      id_tablero:$("#id-actual").val(),
    }
    console.log("recibio id cliente->"+vinculo.id_cliente+"id tablero->"+vinculo.id_tablero);
    $.post("../app/tableros/AsignarCliente.inc.php",
    vinculo,
    function(respuesta,estado){
      console.log(respuesta);
      var validacion = JSON.parse(respuesta);
      console.log(validacion);
      if(validacion.asignado == true){
        console.log("asignar exitoso");
        //cerrarEliminar();
        alert("El tablero fue asignado");
      }
      else{
        alert("Ha ocurrido un error");
      }
      cerrarAsignarCliente();
            leerTablero($("#id-actual").val());
    });
    listarTableros();
  });
  //Funcion cerrar formulario agregar tablero
  $("#cancelar-asignar-cliente").click(function(evento){
    evento.preventDefault();
    cerrarAsignarCliente();
    console.log("recibio evento cancelar");
  });

  $("#nombre-cliente").ready(function(){
    console.log("carga nombres clientes");
    listarNombresClientes();
  });

//Fin funciones jquery
});

//Inicio funciones JS
function leerTablero(idTablero){
  //console.log("funcion leer tablero"+tablero.id);
  console.log("id tablero recibido para leer"+idTablero);
  $.post("../app/tableros/LeerTablero.inc.php",
  {id:idTablero},
  function(respuesta,estado){
    console.log("respuesta->"+respuesta);
    var tablero = JSON.parse(respuesta);
    console.log("tablero->"+tablero);
    $("#id-actual").val(tablero.id);
    $("#cliente-actual").val(tablero.cliente);
    $("#nombre-actual").val(tablero.nombre);
    $("#tipo-actual").val(tablero.tipo);
    $("#nombre-mostrar").html(tablero.nombre);
    return tablero;
  });
}

//Funcion para listar ispositivos
function listarTableros(){
  $.ajax({
    url:'../app/tableros/ListarTableros.inc.php',
    type: 'GET',
    success: function(respuesta){
      console.log("respuesta \n"+respuesta);
      let tableros = JSON.parse(respuesta);
      let plantilla = "";
      var i=0;
      console.log("tableros "+tableros);
      if(tableros==""){
      plantilla+="<tr> <td>No hay tableros </td> </tr>"
      console.log("vacio ");
      }
      else{
        tableros.forEach(tablero=>{
          i++;
          plantilla += "<tr> <td>" + i +" </td> <td>" + tablero.fecha +"</td> <td>" + tablero.nombre +
          "</td> <td>" + tablero.tipo + "</td> <td>"  + tablero.cliente +
          "</td> <td>" + "<button id = 'ver-tablero' class='md-btn md-fab md-xmini m-b-sm'"+
          "data-id-tablero='"+tablero.id +
          "'data-nombre-tablero='"+tablero.nombre +
          "'data-tipo-tablero='"+tablero.tipo +
          "'style='background-color:DodgerBlue;'>"+
          "<i class='material-icons md-12'></i> <!--Editar tablero--></button>"+
          /*Boton editar tablero*/
          "</td>  <td>  <button id ='eliminar-tablero' class='md-btn md-fab md-xmini m-b-sm grey'"+
          "data-id-tablero='"+tablero.id +
          /*"'onclick'=seleccionarTablero("+tablero.id+")"+*/
          "' data-toggle='modal' data-target = '#modal-eliminar-tablero' ui-target='#animate' ui-toggle-class='bounce'>"+
          " <i class='material-icons md-12'></i> <!--Eliminar tablero--></button> </td></tr>"
          /*Boton eliminarr tablero*/
        });

    }

      console.log("imprimir respuesta");
      $("#lista-tableros").html(plantilla);
      console.log("imprimio  respuesta");
    }
  });
}

//Funcion para listar nombres clientes
function listarNombresClientes(){
  $.ajax({
    url:'../app/tableros/ListarNombresClientes.inc.php',
    type: 'GET',
    success: function(respuesta){
      console.log("respuesta \n"+respuesta);
      let clientes = JSON.parse(respuesta);
      let plantilla = "";
      var i=0;
      console.log("tableros "+clientes);
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

function abrirMenuTablero() {
  console.log("funcion ver menu tablero");
  $("#menu-tablero").css({"display":"block"});
}
function cerrarMenuTablero(){
  $("#menu-tablero").css({"display":"none"});
}
function abrirAgregar() {
  $("#formulario-agregar-tablero").css({"display":"block"});
}
function cerrarAgregar(){
  $("#formulario-agregar-tablero").css({"display":"none"});
}
function abrirEditar() {
  console.log("funcion abrir editar");
  $("#formulario-editar-tablero").css({"display":"block"});
}
function cerrarEditar(){
  $("#formulario-editar-tablero").css({"display":"none"});
}
function abrirAsignarCliente() {
  $("#formulario-asignar-cliente").css({"display":"block"});
}
function cerrarAsignarCliente(){
  $("#formulario-asignar-cliente").css({"display":"none"});
}
/*
//$(selector).load(URL,data,callback);
function listarTableros(){
console.log("listar tableros");
$("#lista-tableros").load(
'./app/tableros/ListarTableros.inc.php',
function(respuesta){
console.log(respuesta);
let tableros = JSON.parse(respuesta);
let plantilla = "";
tableros.forEach(tablero=>{
plantilla += "<tr> <td> 1 </td> <td>" + tablero.fecha +
"</td> <td>" + tablero.nombre + "</td> <td>" + tablero.tipo +"</td> <td>" +

"<button id = 'editar-tablero' class='md-btn md-fab md-xmini m-b-sm'"+
"data-id-tablero='"+tablero.id +
"'data-nombre-tablero='"+tablero.nombre +
"'data-tipo-tablero='"+tablero.tipo +
"'style='background-color:DodgerBlue;'>"+
"<i class='material-icons md-12'></i> <!--Editar tablero--></button>"+

"</td>  <td>  <button id ='eliminar-tablero' class='md-btn md-fab md-xmini m-b-sm grey'"+
"data-id-tablero='"+tablero.id +
/*"'onclick'=seleccionarTablero("+tablero.id+")"+*/
/*        "' data-toggle='modal' data-target='#modal-eliminar' ui-toggle-class='bounce' ui-target='#animate' data>"+
" <i class='material-icons md-12'></i> <!--Eliminar tablero--></button> </td></tr>"
});
$("#lista-tableros").html(plantilla);
});

}*/
