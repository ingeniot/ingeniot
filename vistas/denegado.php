<?php

$titulo="IngenIoT";
include_once "plantillas/inicio/encabezado_inicio.inc.php";
//die();
  ControlSesion::cerrar_sesion();
?>
<body>
  <div class="app" id="app">

<!-- ############ LAYOUT START-->
<div class="app-footer white">
  <div ui-include="'../views/blocks/footer.html'"></div>
</div>
<div class="app-body amber bg-auto w-full">
  <div class="text-center pos-rlt p-y-md">
    <h1 class="text-shadow m-0 text-white text-4x">
      <span class="text-2x font-bold block m-t-lg">Denegado</span>
    </h1>
    <h2 class="h1 m-y-lg text-black">OOPS!</h2>
    <p class="h5 m-y-lg text-u-c font-bold text-black">No puede acceder a la página solicitada!</p>
    <a href="<?php echo RUTA_INICIO?>" class="md-btn amber-700 md-raised p-x-md">
      <span class="text-white">Ir a la página principal</span>
    </a>
  </div>
</div>

<!-- ############ LAYOUT END-->

  </div>
<!-- build:js scripts/app.html.js -->
<!-- jQuery -->
  <script src="../libs/jquery/jquery/dist/jquery.js"></script>
<!-- Bootstrap -->
  <script src="../libs/jquery/tether/dist/js/tether.min.js"></script>
  <script src="../libs/jquery/bootstrap/dist/js/bootstrap.js"></script>
<!-- core -->
  <script src="../libs/jquery/underscore/underscore-min.js"></script>
  <script src="../libs/jquery/jQuery-Storage-API/jquery.storageapi.min.js"></script>
  <script src="../libs/jquery/PACE/pace.min.js"></script>

  <script src="scripts/config.lazyload.js"></script>

  <script src="scripts/palette.js"></script>
  <script src="scripts/ui-load.js"></script>
  <script src="scripts/ui-jp.js"></script>
  <script src="scripts/ui-include.js"></script>
  <script src="scripts/ui-device.js"></script>
  <script src="scripts/ui-form.js"></script>
  <script src="scripts/ui-nav.js"></script>
  <script src="scripts/ui-screenfull.js"></script>
  <script src="scripts/ui-scroll-to.js"></script>
  <script src="scripts/ui-toggle-class.js"></script>

  <script src="scripts/app.js"></script>

  <!-- ajax -->
  <script src="../libs/jquery/jquery-pjax/jquery.pjax.js"></script>
  <script src="scripts/ajax.js"></script>
<!-- endbuild -->
</body>
</html>
