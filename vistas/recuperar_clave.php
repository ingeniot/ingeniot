<?php
$titulo="IngenIoT";
include_once "plantillas/inicio/encabezado_inicio.inc.php";
include_once "./conf/config.inc.php"
?>
<body class=" dark pace-done" ui-class="dark"><div class="pace  pace-inactive"><div class="pace-progress" data-progress-text="100%" data-progress="99" style="transform: translate3d(100%, 0px, 0px);">
  <div class="pace-progress-inner"></div>
</div>
<div class="pace-activity"></div></div>
<div class="app" id="app">

  <!-- ############ LAYOUT START-->
  <div class="center-block w-xxl w-auto-xs p-y-md">

      <div class="p-a-md box-color r box-shadow-z1 text-color m-a">
        <div class="navbar logo">
          <div class="pull-center">
            <a href="inicio" class="navbar-brand">
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 70 60" width="110" height="50">
                <line x1="30" y1="20" x2="90" y2="20" style="stroke:rgb(0,0,0);stroke-width:2" />
                <line x1="50" y1="40" x2="75" y2="40" style="stroke:rgb(0,0,0);stroke-width:2" />
                <line x1="30" y1="20" x2="50" y2="40" style="stroke:rgb(0,0,0);stroke-width:2" />
                <line x1="60" y1="20" x2="50" y2="40" style="stroke:rgb(0,0,0);stroke-width:2" />
                <line x1="60" y1="20" x2="75" y2="40" style="stroke:rgb(0,0,0);stroke-width:2" />
                <line x1="75" y1="40" x2="90" y2="20" style="stroke:rgb(0,0,0);stroke-width:2" />

                <circle cx="30" cy="20" r="5" stroke="black" stroke-width="2" fill="white" />
                <circle cx="60" cy="20" r="5" stroke="black" stroke-width="2" fill="white" />
                <circle cx="90" cy="20" r="5" stroke="black" stroke-width="2" fill="white" />
                <circle cx="50" cy="40" r="5" stroke="black" stroke-width="2" fill="white" />
                <circle cx="75" cy="40" r="5" stroke="black" stroke-width="2" fill="white" />

                <path d="M 50 55 C 50 55 60 40 70 55" style="fill: none; stroke: black; stroke-width: 3px;" />
                <path d="M 54 60 C 54 60 60 50 66 60" style="fill: none; stroke: black; stroke-width: 3px;" />
                <!--<text>IngenIoT</text>>
                Sorry, your browser does not support inline SVG.-->
              </svg><img src="../assets/images/logo.png" alt="." class="hide"> <span class="hidden-folded inline">IngenIoT</span></a>
            </div>
          </div>


        <div class="m-b">
          Olvidó su clave?
          <p class="text-xs m-t">ingrese su dirección de email y se le enviarán las instrucciones para cambiar su clave.</p>
        </div>
        <form role="form" method="post" action="<?=RUTA_GENERAR_TOKEN?>" name="recuperar" >
          <div class="md-form-group">
            <input id="email" type="email" class="md-input" name="email" required autofocus>
            <label for="email">Su email</label>
          </div>
          <button id="recuperar-clave" name="recuperar-clave" type="submit" class="btn primary btn-block p-x-md">Enviar</button>
        </form>
      </div>
      <p id="alerts-container"></p>
      <div class="p-v-lg text-center">Regresar a <a ui-sref="access.signin" href="<?=RUTA_INICIO?>" class="text-primary _600">Ingresar</a></div>
    </div>

    <!-- ############ LAYOUT END-->

  </div>
  <script src="scripts/app.html.js"></script><script src="../libs/jquery/screenfull/dist/screenfull.min.js"></script>


</body></html>
