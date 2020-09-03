<script type="text/javascript">
//Prueba jQuery

$(function(){  //Funcion basica de JQUERY que indica que el documento esta listo
  console.log('JQuery esta funcionando');
});
//Funciones agregar dispositivo
$(function(){
  $('div').text("texto dinamico") //accede por tipo de etiqueta
  $('#id').text("texto dinamico"); //accesde por // ID:
  $('.class')    //accede por clase
  $('div.miDiv div p').text("texto dinamico"); // accede seleccionando en forma anidada
  $('#id1,#id2').text("texto dinamico"); //accede a varios id
  console.log('JQuery esta funcionando');
});


</script>
