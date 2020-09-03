$("#grupos").ready(function(){
  console.log('JQuery 0000 lista grupos esta funcionando');
  $("#tabla-grupos").ready(function(){
    console.log("carga tabla grupos");
    listarGrupos();
  });
/*  $("#menu-grupos").click(function(evento){
    evento.preventDefault();
    window.location="grupos";
    console.log("selecciono menu grupos");g
    listarGrupos();
});*/

//Funcion ver menu grupo (pasar id-grupo al modal)
  //Tengo que usar esta funcion jQuery que ademas de capturar el click pasa los datos del evento
  $(document).on("click", "#ver-grupo", function (evento) {
    //evento.preventDefault();
    console.log("abrir vista detalles grupo");
    //$('#id-eliminar').val = $(this).data('id-grupo')
    /*var idActual = $(this).data('id-grupo');
    var nombreActual = $(this).data('nombre-grupo');
    var tipoActual = $(this).data('tipo-grupo');
    $("#id-actual").val( idActual );
    $("#nombre-actual").val( nombreActual );
    $("#tipo-actual").val( tipoActual );
    //var nombreMostrar = nombreActual.toString();
    $("#nombre-mostrar").html( nombreActual );
    //$("#nombre-actual").val( nombreActual );
  //  $("#mostrar-tipo").val( tipoActual );
      //$("#mostrar-detalles").class("active");*/
    console.log("menu grupo cargo variables");
    var idGrupo = $(this).data('id-grupo');
    leerGrupo(idGrupo);
    abrirMenuGrupo();
    console.log("menu grupo abre detalles");

  });
  //Funcion cerrar menu grupo
  $("#cerrar-menu-grupo").click(function(evento){
    evento.preventDefault();
    console.log("recibio evento cerrar menu grupo");
    cerrarMenuGrupo();
  });
  //Fin ver menu disipositivo

  //Funcion abrir editor grupo (pasar id-grupo al modal)
  //Tengo que usar esta funcion jQuery .on que ademas de capturar el click pasa los datos del evento
  $(document).on("click", "#editar-grupo", function (evento) {
    evento.preventDefault();
    console.log("editar grupo");
    //$('#id-eliminar').val = $(this).data('id-grupo')
    var idActual = $("#id-actual").val();
    var nombreActual = $("#nombre-actual").val();
    var tipoActual = $("#tipo-actual").val();
    $("#id-editar").val( idActual );
    $("#nombre-original").val( nombreActual );
    $("#nombre-editar").val( nombreActual );
    $("#tipo-original").val( tipoActual );
    $("#tipo-editar").val( tipoActual );
    console.log("editar grupo cargo variables");
    console.log("editar grupo abre editar");
    abrirEditar();
  });

  //Funcion cerrar formulario editar grupo
  $("#cancelar-editar-grupo").click(function(evento){
    evento.preventDefault();
    cerrarEditar();
    console.log("recibio evento cancelar");
  });

  //Funcion confirmar editar grupo
  $("#confirmar-editar-grupo").click(function(evento){
    evento.preventDefault();
    //console.log("agregar");
    var grupoEditado = {
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
    console.log(grupoEditado);
    $.post("../app/grupos/EditarGrupo.inc.php",grupoEditado, function(respuesta,estado){
      console.log(respuesta);
      var validacion = JSON.parse(respuesta);
      console.log(validacion);
      //alert("cambios"+validacion.cambios+"\n valido "+validacion.valido+"\n enombre "+validacion.error_nombre+"\n etipo "+validacion.error_tipo);
      if(validacion.cambios)
        {
          if(validacion.valido){
            //setTimeout(function() { alert("El grupo fue modificado"); }, 1);
            alert("El grupo fue modificado");

            cerrarEditar();
            listarGrupos();
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
  //Fin funcion editar grupo

//Funcion abrir formulario agregar grupo
$("#agregar-grupo").click(function(evento){
  evento.preventDefault();
  console.log("recibio evento agregar-grupo");
    abrirAgregar();
});



//Funcion agregar grupo
$("#confirmar-agregar-grupo").click(function(evento){
  evento.preventDefault();
  console.log("confirmar agregar grupo");
  var grupoIngresado = {
    nombre: $("#nombre").val(),
    tipo:$("#tipo").val(),
    pais:$("#pais").val(),
    estado:$("#estado").val(),
    ciudad:$("#ciudad").val(),
    direccion:$("#direccion").val(),
    telefono:$("#telefono").val(),
    email:$("#email").val()
  };
  console.log(grupoIngresado);
  $.post("../app/grupos/AgregarGrupo.inc.php",grupoIngresado, function(respuesta,estado){
    console.log("respuesta post:   "+ respuesta);
    var validacion = JSON.parse(respuesta);
    console.log(validacion);
    if(validacion.valido){
        cerrarAgregar();
      alert("El grupo fue agregado");

      listarGrupos();
    }
    else{
      alert(validacion.error_nombre+ "\n"+validacion.error_tipo);
      //  alert(validacion.error_tipo);
    }
  });

});
//Funcion cerrar formulario agregar grupo
$("#cancelar-agregar-grupo").click(function(evento){
  evento.preventDefault();
  cerrarAgregar();
  console.log("recibio evento cancelar");
});

  //Funcion buscar grupo
  $('#nombre-buscado').keyup(function(evento){
    console.log('Detecto un caracter');
    let nombreBuscado = $('#nombre-buscado').val();
    console.log(nombreBuscado);
    $.ajax({
      url:'../app/grupos/BuscarGrupo.inc.php',
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
  //Elimminar grupo
  //Funcion eliminar grupo (pasar id-grupo al modal)
  //Tengo que usar esta funcion jQuery .on que ademas de capturar el click pasa los datos del evento
  $(document).on("click", "#eliminar-grupo", function (evento) {
    //evento.preventDefault();
    console.log("modal eliminar grupo");
    //$('#id-eliminar').val = $(this).data('id-grupo')
    var idActual = $(this).data('id-grupo');
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
    var grupoEliminar = {
      id: $("#id-eliminar").val(),
    };
    console.log("funcion confirmar eliminar paso 2");
    console.log(grupoEliminar);
    $.post("../app/grupos/EliminarGrupo.inc.php",grupoEliminar, function(respuesta,estado){
      console.log(respuesta);
      var validacion = JSON.parse(respuesta);
            console.log(validacion);
      if(validacion.eliminado == true){
        console.log("eliminar success");
        //cerrarEliminar();
        alert("El grupo fue elliminado");
      }
      else{
        alert("Ha ocurrido un error");
      }
    });
      listarGrupos();
  });
//fin eliminar grupo

});
//Inicio funciones JS
function leerGrupo(idGrupo){
  //console.log("funcion leer grupo"+grupo.id);
  $.post("../app/grupos/LeerGrupo.inc.php",
  {id:idGrupo},
  function(respuesta,estado){
    console.log(respuesta);
    var grupo = JSON.parse(respuesta);
    console.log(grupo);
    $("#id-actual").val(grupo.id);
    $("#grupo-actual").val(grupo.nombre);
    $("#nombre-actual").val(grupo.nombre);
    $("#tipo-actual").val(grupo.tipo);
    $("#pais-actual").val(grupo.pais);
    $("#estado-actual").val(grupo.estado);
    $("#ciudad-actual").val(grupo.ciudad);
    $("#direccion-actual").val(grupo.direccion);
    $("#telefono-actual").val(grupo.telefono);
    $("#email-actual").val(grupo.email);
    $("#nombre-mostrar").html(grupo.nombre);
    //return grupo;
  });
}

//Funcion para listar ispositivos
function listarGrupos(){
  $.ajax({
    url:'../app/grupos/ListarGrupos.inc.php',
    type: 'GET',
    success: function(respuesta){
      console.log("respuesta \n"+respuesta);
      let grupos = JSON.parse(respuesta);
      let plantilla = "";
      var i=0;
      grupos.forEach(grupo=>{
        i++;
        plantilla += "<tr> <td>"+i+"</td> <td>" + grupo.fecha +
        "</td> <td>" + grupo.nombre + "</td> <td>" + grupo.tipo +"</td> <td>" +

        "<button id = 'ver-grupo' class='md-btn md-fab md-xmini m-b-sm'"+
        "data-id-grupo='"+grupo.id +
        "'data-nombre-grupo='"+grupo.nombre +
        "'data-tipo-grupo='"+grupo.tipo +
        "'style='background-color:DodgerBlue;'>"+
        "<i class='material-icons md-12'></i> <!--Editar grupo--></button>"+
        /*Boton editar grupo*/
        "</td>  <td>  <button id ='eliminar-grupo' class='md-btn md-fab md-xmini m-b-sm grey'"+
        "data-id-grupo='"+grupo.id +
      /*"'onclick'=seleccionarGrupo("+grupo.id+")"+*/
        "' data-toggle='modal' data-target = '#modal-eliminar-grupo' ui-target='#animate' ui-toggle-class='bounce'>"+
        " <i class='material-icons md-12'></i> <!--Eliminar grupo--></button> </td></tr>"
                /*Boton eliminar grupo*/
      });

      console.log("imprimir respuesta");
      $("#lista-grupos").html(plantilla);
      console.log("imprimio  respuesta");
    }
  });
}
function abrirMenuGrupo() {
    console.log("funcion ver menu grupo");
    $("#menu-grupo").css({"display":"block"});
}
function cerrarMenuGrupo(){
  $("#menu-grupo").css({"display":"none"});
}
function abrirAgregar() {
$("#formulario-agregar-grupo").css({"display":"block"});
}

function cerrarAgregar(){
$("#formulario-agregar-grupo").css({"display":"none"});
}

function abrirEditar() {
    console.log("funcion abrir editar");
    $("#formulario-editar-grupo").css({"display":"block"});
}
function cerrarEditar(){
  $("#formulario-editar-grupo").css({"display":"none"});
}
/*
//$(selector).load(URL,data,callback);
function listarGrupos(){
  console.log("listar grupos");
  $("#lista-grupos").load(
    './app/grupos/ListarGrupos.inc.php',
    function(respuesta){
      console.log(respuesta);
      let grupos = JSON.parse(respuesta);
      let plantilla = "";
      grupos.forEach(grupo=>{
        plantilla += "<tr> <td> 1 </td> <td>" + grupo.fecha +
        "</td> <td>" + grupo.nombre + "</td> <td>" + grupo.tipo +"</td> <td>" +

        "<button id = 'editar-grupo' class='md-btn md-fab md-xmini m-b-sm'"+
        "data-id-grupo='"+grupo.id +
        "'data-nombre-grupo='"+grupo.nombre +
        "'data-tipo-grupo='"+grupo.tipo +
        "'style='background-color:DodgerBlue;'>"+
        "<i class='material-icons md-12'></i> <!--Editar grupo--></button>"+

        "</td>  <td>  <button id ='eliminar-grupo' class='md-btn md-fab md-xmini m-b-sm grey'"+
        "data-id-grupo='"+grupo.id +
      /*"'onclick'=seleccionarGrupo("+grupo.id+")"+*/
/*        "' data-toggle='modal' data-target='#modal-eliminar' ui-toggle-class='bounce' ui-target='#animate' data>"+
        " <i class='material-icons md-12'></i> <!--Eliminar grupo--></button> </td></tr>"
      });
      $("#lista-grupos").html(plantilla);
    });

}*/
