$(document).ready(function(){
  console.log('JQuery 1550 lista dominios esta funcionando');

  $("#tabla-dominios").ready(function(){
    console.log("carga tabla dominios");
    listarDominios();
  });
/*
  //Listar dominios
  $("#menu-dominios").click(function(evento){
    evento.preventDefault();
    console.log("selecciono menu dominios");
    window.location="dominios";
    listarDominios();
  });
*/
  //Funcion ver menu dominio (pasar id-dominio al modal)
  //Tengo que usar esta funcion jQuery que ademas de capturar el click pasa los datos del evento
  $(document).on("click", "#ver-dominio", function (evento) {
    //evento.preventDefault();
    console.log("abrir vista detalles dominio");
    //$('#id-eliminar').val = $(this).data('id-dominio')
  /*  var idActual = $(this).data('id-dominio');
    var nombreActual = $(this).data('nombre-dominio');
    var tipoActual = $(this).data('tipo-dominio');
    $("#id-actual").val( idActual );
    $("#nombre-actual").val( nombreActual );
    $("#tipo-actual").val( tipoActual );
    //var nombreMostrar = nombreActual.toString();
    $("#nombre-mostrar").html( nombreActual );
    //$("#nombre-actual").val( nombreActual );
    //  $("#mostrar-tipo").val( tipoActual );
    //$("#mostrar-detalles").class("active");*/
    console.log("menu dominio cargo variables");
    var idDominio = $(this).data('id-dominio');
        console.log("id dominio->"+idDominio);
    var dominio = leerDominio(idDominio);
    console.log("dominio:"+dominio);
    abrirMenuDominio();
    console.log("menu dominio abre detalles");
  });
  //Funcion cerrar menu dominio
  $("#cerrar-menu-dominio").click(function(evento){
    evento.preventDefault();
    console.log("recibio evento cerrar menu dominio");
    cerrarMenuDominio();
  });
  //Fin ver menu disipositivo

  //Funcion abrir editor dominio (pasar id-dominio al modal)
  //Tengo que usar esta funcion jQuery .on que ademas de capturar el click pasa los datos del evento
  $(document).on("click", "#editar-dominio", function (evento) {
    evento.preventDefault();
    console.log("editar dominio");
    //$('#id-eliminar').val = $(this).data('id-dominio')
    var idActual = $("#id-actual").val();
    var nombreActual = $("#nombre-actual").val();
    var tipoActual = $("#tipo-actual").val();
    $("#id-editar").val($("#id-actual").val());
    $("#nombre-original").val($("#nombre-actual").val());
    $("#nombre-editar").val($("#nombre-actual").val());
    $("#tipo-original").val($("#tipo-actual").val());
    $("#tipo-editar").val($("#tipo-actual").val() );
    $("#etiqueta-original").val($("#etiqueta-actual").val());
    $("#etiqueta-editar").val($("#etiqueta-actual").val() );
    $("#descripcion-original").val($("#descripcion-actual").val());
    $("#descripcion-editar").val($("#descripcion-actual").val() );
    console.log("editar dominio cargo variables");
    console.log("editar dominio abre editar");
    abrirEditar();
  });

  //Funcion cerrar formulario editar dominio
  $("#cancelar-editar-dominio").click(function(evento){
    evento.preventDefault();
    cerrarEditar();
    console.log("recibio evento cancelar");
  });

  //Funcion confirmar editar dominio
  $("#confirmar-editar-dominio").click(function(evento){
    evento.preventDefault();
    //console.log("agregar");
    var dominioEditado = {
      id: $("#id-editar").val(),
      nombre: $("#nombre-editar").val(),
      nombre_original: $("#nombre-original").val(),
      tipo:$("#tipo-editar").val(),
      tipo_original:$("#tipo-original").val(),
      etiqueta: $("#etiqueta-editar").val(),
      etiqueta_original: $("#etiqueta-original").val(),
      descripcion:$("#descripcion-editar").val(),
      descripcion_original:$("#descripcion-original").val(),
    };
    console.log(dominioEditado);
    $.post("../app/dominios/EditarDominio.inc.php",
    dominioEditado,
    function(respuesta,estado){
      console.log("Respuesta editar dominio"+respuesta);
      var validacion = JSON.parse(respuesta);
      console.log(validacion);
      //alert("cambios"+validacion.cambios+"\n valido "+validacion.valido+"\n enombre "+validacion.error_nombre+"\n etipo "+validacion.error_tipo);
      if(validacion.cambios)
      {
        if(validacion.valido){
          //setTimeout(function() { alert("El dominio fue modificado"); }, 1);
          alert("El dominio fue modificado");
          leerDominio($("#id-actual").val());
          cerrarEditar();
          listarDominios();
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
  //Fin funcion editar dominio

  //Funcion abrir formulario agregar dominio
  $("#agregar-dominio").click(function(evento){
    evento.preventDefault();
    console.log("recibio evento agregar-dominio");
    abrirAgregar();
  });



  //Funcion agregar dominio
  $("#confirmar-agregar-dominio").click(function(evento){
    evento.preventDefault();
    console.log("confirmar agregar dominio");
    var dominioIngresado = {
      nombre: $("#nombre").val(),
      tipo:$("#tipo").val(),
      etiqueta:$("#etiqueta").val(),
      descripcion:$("#descripcion").val(),
    };
    console.log("dominioIngresado->"+dominioIngresado);
    $.post("../app/dominios/AgregarDominio.inc.php",
    dominioIngresado,
    function(respuesta,estado){
      console.log("respuesta post:   "+ respuesta);
      var validacion = JSON.parse(respuesta);
      console.log(validacion);
      if(validacion.valido){
        cerrarAgregar();
        alert("El dominio fue agregado");

        listarDominios();
      }
      else{
        alert(validacion.error_nombre+ "\n"+validacion.error_tipo);
        //  alert(validacion.error_tipo);
      }
    });

  });
  //Funcion cerrar formulario agregar dominio
  $("#cancelar-agregar-dominio").click(function(evento){
    evento.preventDefault();
    cerrarAgregar();
    console.log("recibio evento cancelar");
  });

  //Funcion buscar dominio
  $('#nombre-buscado').keyup(function(evento){
    console.log('Detecto un caracter');
    let nombreBuscado = $('#nombre-buscado').val();
    console.log(nombreBuscado);
    $.ajax({
      url:'../app/dominios/BuscarDominio.inc.php',
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
  //Elimminar dominio
  //Funcion eliminar dominio (pasar id-dominio al modal)
  //Tengo que usar esta funcion jQuery .on que ademas de capturar el click pasa los datos del evento
  $(document).on("click", "#eliminar-dominio", function (evento) {
    //evento.preventDefault();
    console.log("modal eliminar dominio");
    //$('#id-eliminar').val = $(this).data('id-dominio')
    var idActual = $(this).data('id-dominio');
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
    var dominioEliminar = {
      id: $("#id-eliminar").val(),
    };
    console.log("funcion confirmar eliminar paso 2");
    console.log(dominioEliminar);
    $.post("../app/dominios/EliminarDominio.inc.php",
    dominioEliminar,
    function(respuesta,estado){
      console.log(respuesta);
      var validacion = JSON.parse(respuesta);
      console.log(validacion);
      if(validacion.eliminado == true){
        console.log("eliminar success");
        //cerrarEliminar();
        alert("El dominio fue elliminado");
      }
      else{
        alert("Ha ocurrido un error");
      }
    });
    listarDominios();
  });
  //fin eliminar dominio

  $("#asignar-cliente").click(function(evento){
    evento.preventDefault();
    console.log("recibio evento asignar cliente");
    abrirAsignarCliente();
  });
  //Funcion confirmar asignar dominio dominio
  $("#confirmar-asignar-cliente").click(function(evento){
    evento.preventDefault();
    var vinculo = {
      id_cliente:$("#nombres-clientes").val(),
      id_dominio:$("#id-actual").val(),
    }
    console.log("recibio id cliente->"+vinculo.id_cliente+"id dominio->"+vinculo.id_dominio);
    $.post("../app/dominios/AsignarCliente.inc.php",
    vinculo,
    function(respuesta,estado){
      console.log(respuesta);
      var validacion = JSON.parse(respuesta);
      console.log(validacion);
      if(validacion.asignado == true){
        console.log("asignar exitoso");
        //cerrarEliminar();
        alert("El dominio fue asignado");
      }
      else{
        alert("Ha ocurrido un error");
      }
      cerrarAsignarCliente();
      leerDominio($("#id-actual").val());

    });
    listarDominios();
  });
  //Funcion cerrar formulario agregar dominio
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
function leerDominio(idDominio){
  //console.log("funcion leer dominio"+dominio.id);
  console.log("id dominio recibido para leer"+idDominio);
  $.post("../app/dominios/LeerDominio.inc.php",
  {id:idDominio},
  function(respuesta,estado){
    console.log("respuesta->"+respuesta);
    var dominio = JSON.parse(respuesta);
    console.log("dominio->"+dominio);

    $("#id-actual").val(dominio.id);
    $("#cliente-actual").val(dominio.cliente);
    $("#nombre-actual").val(dominio.nombre);
    $("#tipo-actual").val(dominio.tipo);
    $("#etiqueta-actual").val(dominio.etiqueta);
    $("#descripcion-actual").val(dominio.descripcion);
    $("#nombre-mostrar").html(dominio.nombre);
    return dominio;
  });
}

//Funcion para listar ispositivos
function listarDominios(){
  $.ajax({
    url:'../app/dominios/ListarDominios.inc.php',
    type: 'GET',
    success: function(respuesta){
      console.log("respuesta \n"+respuesta);
      let dominios = JSON.parse(respuesta);
      let plantilla = "";
      var i=0;
      console.log("dominios "+dominios);
      if(dominios==""){
      plantilla+="<tr> <td>No hay dominios </td> </tr>"
      console.log("vacio ");
      }
      else{
        dominios.forEach(dominio=>{
          i++;
          plantilla += "<tr> <td>" + i +" </td> <td>" + dominio.fecha +"</td> <td>" + dominio.nombre +
          "</td> <td>" + dominio.tipo +"</td> <td>" + dominio.etiqueta + "</td> <td>" +dominio.cliente +
          "</td> <td>" + "<button id = 'ver-dominio' class='md-btn md-fab md-xmini m-b-sm'"+
          "data-id-dominio='"+dominio.id +
          "'data-nombre-dominio='"+dominio.nombre +
          "'data-tipo-dominio='"+dominio.tipo +
          "'data-etiqueta-dominio='"+dominio.etiqueta +
          "'data-cliente-dominio='"+dominio.cliente +
          "'style='background-color:DodgerBlue;'>"+
          "<i class='material-icons md-12'></i> <!--Editar dominio--></button>"+
          /*Boton editar dominio*/
          "</td>  <td>  <button id ='eliminar-dominio' class='md-btn md-fab md-xmini m-b-sm grey'"+
          "data-id-dominio='"+dominio.id +
          /*"'onclick'=seleccionarDominio("+dominio.id+")"+*/
          "' data-toggle='modal' data-target = '#modal-eliminar-dominio' ui-target='#animate' ui-toggle-class='bounce'>"+
          " <i class='material-icons md-12'></i> <!--Eliminar dominio--></button> </td></tr>"
          /*Boton eliminarr dominio*/
        });

    }

      console.log("imprimir respuesta");
      $("#lista-dominios").html(plantilla);
      console.log("imprimio  respuesta");
    }
  });
}

//Funcion para listar nombres clientes
function listarNombresClientes(){
  $.ajax({
    url:'../app/dominios/ListarNombresClientes.inc.php',
    type: 'GET',
    success: function(respuesta){
      console.log("respuesta \n"+respuesta);
      let clientes = JSON.parse(respuesta);
      let plantilla = "";
      var i=0;
      console.log("dominios "+clientes);
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

function abrirMenuDominio() {
  console.log("funcion ver menu dominio");
  $("#menu-dominio").css({"display":"block"});
}
function cerrarMenuDominio(){
  $("#menu-dominio").css({"display":"none"});
}
function abrirAgregar() {
  $("#formulario-agregar-dominio").css({"display":"block"});
}
function cerrarAgregar(){
  $("#formulario-agregar-dominio").css({"display":"none"});
}
function abrirEditar() {
  console.log("funcion abrir editar");
  $("#formulario-editar-dominio").css({"display":"block"});
}
function cerrarEditar(){
  $("#formulario-editar-dominio").css({"display":"none"});
}
function abrirAsignarCliente() {
  $("#formulario-asignar-cliente").css({"display":"block"});
}
function cerrarAsignarCliente(){
  $("#formulario-asignar-cliente").css({"display":"none"});
}
/*
//$(selector).load(URL,data,callback);
function listarDominios(){
console.log("listar dominios");
$("#lista-dominios").load(
'./app/dominios/ListarDominios.inc.php',
function(respuesta){
console.log(respuesta);
let dominios = JSON.parse(respuesta);
let plantilla = "";
dominios.forEach(dominio=>{
plantilla += "<tr> <td> 1 </td> <td>" + dominio.fecha +
"</td> <td>" + dominio.nombre + "</td> <td>" + dominio.tipo +"</td> <td>" +

"<button id = 'editar-dominio' class='md-btn md-fab md-xmini m-b-sm'"+
"data-id-dominio='"+dominio.id +
"'data-nombre-dominio='"+dominio.nombre +
"'data-tipo-dominio='"+dominio.tipo +
"'style='background-color:DodgerBlue;'>"+
"<i class='material-icons md-12'></i> <!--Editar dominio--></button>"+

"</td>  <td>  <button id ='eliminar-dominio' class='md-btn md-fab md-xmini m-b-sm grey'"+
"data-id-dominio='"+dominio.id +
/*"'onclick'=seleccionarDominio("+dominio.id+")"+*/
/*        "' data-toggle='modal' data-target='#modal-eliminar' ui-toggle-class='bounce' ui-target='#animate' data>"+
" <i class='material-icons md-12'></i> <!--Eliminar dominio--></button> </td></tr>"
});
$("#lista-dominios").html(plantilla);
});

}*/
