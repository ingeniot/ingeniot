<?php
if (!ControlSesion::sesion_iniciada())
  {
  //  include "denegado.php";
  //echo "Ingreso no autorizado";
  Redireccion::redirigir("denegado");
//  echo '<meta http-equiv="refresh" content="0; url=denegado">';
}
else{

$titulo="Grupos";
$js="";
$nivel=$_SESSION["nivel_usuario"];
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
    <script type="text/javascript">
    console.log("antes de lateral");
    </script>
    <?php
    include_once "plantillas/sysadmin/lateral.inc.php";
    ?>
    <!-- / -->
    <!-- F|IN BARRA IZQUIERDA -->
  <!-- content -->
    <div id="content" class="app-content box-shadow-z0" role="main">


      <!-- BARRA DE NAVEGACIÓN -->
      <?php
      include_once "plantillas/sistema/navbar.inc.php";
      ?>
      <!-- FIN BARRA DE NAVEGACIÓN -->
      <!-- PIE DE PAGINA -->
      <?php
      include "plantillas/sistema/pie.inc.php";
      ?>
      <!-- FIN PIE DE PAGINA -->
        <!-- SECCION CENTRAL -->
      <div ui-view class="app-body" id="view">

        <div class="padding">

          <?php
          include "plantillas/sysadmin/grupos/grupos.inc.php";
          ?>

        </div>
      </div>
              <!-- fin SECCION CENTRAL -->
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
<script type="text/javascript">
console.log("antes de libreria");
</script>
<!--2027 Libreria JS grupos-->
<script src="../app/grupos/grupos.js"></script>
<script type="text/javascript">
console.log("despues de libreria");
</script>

<!-- endbuild -->
</body>
<!-- FIN FINAL DEL BODY (Incluye librerias js) -->
</html>
<?php
}
?>
