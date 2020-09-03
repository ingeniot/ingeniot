$(document).ready(function(){
  console.log('JQuery control vistas esta funcionando');
  $("#menu-principal").click(function(evento){
      evento.preventDefault();
    console.log("ver principal");
    estadoVista = "principal";
    cambiarVista(estadoVista);
  });
  $("#menu-dispositivos").click(function(evento){
    evento.preventDefault();
    console.log("ver dispositivos");
    //cambiarContenido("dispositivos");
    estadoVista = "dispositivos";
    cambiarVista(estadoVista);
    //window.location="dispositivos.php";
  });
  $("#menu-tableros").click(function(evento){
      evento.preventDefault();
    console.log("ver tableros");
    //  cambiarContenido("tablero");
    estadoVista = "tableros";
    cambiarVista(estadoVista);
  });

});
function cambiarVista(visible){
  $(".padding").hide();
  $("#"+visible).show();
  console.log("#"+visible);
  };
