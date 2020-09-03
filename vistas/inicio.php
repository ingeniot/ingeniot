<?php
$titulo="IngenIoT";
include_once "plantillas/inicio/encabezado_inicio.inc.php";
?>
<body >
  <div class="pace pace-inactive">
    <div class="pace-progress" data-progress-text="100%" data-progress="99" style="transform: translate3d(100%, 0px, 0px);">
  <div class="pace-progress-inner"></div>
 </div>
 <div class="pace-activity"></div>
 </div>
  <?php  //Barra de navegación
  include_once "plantillas/inicio/navbar_inicio.inc.php";
  ?>
<div id="app" class="app">
  <div id="content" class="app-content box-shadow-z0" role = "main">
  <?php    // Fando de pantalla
  include_once "plantillas/inicio/fondo_inicio.inc.php";
  ?>
            <!-- / Central -->
    <div class="page-content" id="home">
    <div class="h-v white row-col">
      <div class="row-cell v-b">
        <div class="container p-y-lg pos-rlt">
          <h4 class="display-4 _50 l-s-n-3x m-t-lg m-b-md">Es el momento de acceder al mundo
             <span class="text-primary">IOT</span> de manera simple</h4>
            <h5 class="text-muted m-b-lg">Lo conectamos con sus dispositivos  IOT  desde cualquier lugar</h5>
          <a href="#demos" ui-scroll-to="demos" class="btn btn-lg btn-outline b-primary text-primary b-2x">Ver las demostraciones</a>
        </div>
      </div>
    </div>
  </div>
  <?php
// Pie de pagina
  include_once "plantillas/inicio/pie.inc.php";
  include_once "plantillas/inicio/cierre_inicio.inc.php";
  ?>
  <script src="../app/usuarios/login.js"></script>
  <script src="../app/usuarios/registrar.js"></script>
 </div>
</div>
</body>
</html>
