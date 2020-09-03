<?php
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
      <span class="text-2x font-bold block m-t-lg">404</span>
    </h1>
    <h2 class="h1 m-y-lg text-black">OOPS!</h2>
    <p class="h5 m-y-lg text-u-c font-bold text-black">La página que esta buscando no existe!</p>
    <a href="<?php echo RUTA_INICIO?>" class="md-btn amber-700 md-raised p-x-md">
      <span class="text-white">Ir a la página principal</span>
    </a>
  </div>
</div>

<!-- ############ LAYOUT END-->

  </div>

<!-- endbuild -->
</body>
</html>
