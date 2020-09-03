<?php
if (!ControlSesion::sesion_iniciada())
  {
  //  include "denegado.php";
  //echo "Ingreso no autorizado";
  Redireccion::redirigir("denegado");
//  echo '<meta http-equiv="refresh" content="0; url=denegado">';
}
else{
$titulo="Clientes";
$nivel=ControlSesion::obtener_nivel();
include_once "plantillas/sistema/encabezado.inc.php";
?>
<body>
   <div class="pace pace-inactive">
     <div class="pace-progress" data-progress-text="100%" data-progress="99" style="transform: translate3d(100%, 0px, 0px);">
   <div class="pace-progress-inner"></div>
  </div>
  <div class="pace-activity"></div>
  </div>
  <div class="app" id="app" >
    <!-- ############ LAYOUT START-->
    <!-- BARRA IZQUIERDA -->
    <!-- aside -->
    <?php

    include_once "plantillas/administrador/lateral.inc.php";
    ?>
    <!-- / -->
    <!-- F|IN BARRA IZQUIERDA -->
  <!-- content -->
    <div id="content" class="app-content box-shadow-z0" role="main">
      <!-- BARRA DE NAVEGACIÓN -->
      <?php

      include "plantillas/sistema/navbar.inc.php";
      ?>
      <!-- FIN BARRA DE NAVEGACIÓN -->
      <!-- PIE DE PAGINA -->
      <?php
      include "plantillas/sistema/pie.inc.php";
      ?>
      <!-- FIN PIE DE PAGINA -->
      <div ui-view class="app-body" id="view">
        <!-- SECCION CENTRAL -->
        <div class="padding">
          <?php
          include "plantillas/administrador/clientes/clientes.inc.php";
          ?>

        </div>
      </div>
      </div>
    <!-- / -->
    <!-- FIN SECCION CENTRAL -->
    <!-- SELECTOR DE TEMAS -->
    <?php
    include "plantillas/sistema/temas.inc.php";
    ?>
    <!-- FIN SELECTOR DE TEMAS -->
<!-- / -->

<!-- ############ LAYOUT END-->

</div>
<!-- FINAL DEL BODY (Incluye librerias js) -->
<?php
include "plantillas/sistema/cierre.inc.php";
?>
<!--vista sistema.php-->
<script type="text/javascript">
</script>
<script src="../app/clientes/clientes.js"></script>
<!-- endbuild -->
</body>
<!-- FIN FINAL DEL BODY (Incluye librerias js) -->
</html>
<?php
}
?>
