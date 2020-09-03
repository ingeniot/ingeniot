<?php
ControlSesion::cerrar_sesion();
$titulo="IngenIoT";
include_once "plantillas/inicio/encabezado_inicio.inc.php";
//die();
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
      <span class="text-2x font-bold block m-t-lg">Clave actualizada</span>
    </h1>
    <h2 class="h1 m-y-lg text-black"></h2>
    <p class="h5 m-y-lg text-u-c font-bold text-black">Actualizo la clave correctamente!</p>
    <a href="<?php echo RUTA_INICIO?>" class="md-btn amber-700 md-raised p-x-md">
      <span class="text-white">Ir a la página principal</span>
    </a>
  </div>
</div>
<!-- ############ LAYOUT END-->

  </div>
<!-- build:js scripts/app.html.js -->
<!-- jQuery -->

<!-- endbuild -->
</body>
</html>
