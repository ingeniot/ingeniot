<div id="menu-administrador" class="white box-shadow menu">
  <div class="navbar navbar-toggleable-sm flex-row align-items-center">
    <div class="collapse navbar-collapse" id="collapse">
      <!-- link and dropdown -->
      <ul class="nav h3 navbar-nav mr-auto">
        <span> <a id="nombre-mostrar"> </a> </span>
      </ul>

      <!-- / navbar marca central -->
      <!-- / navbar marca central -->
      <!-- / navbar collapse -->
      <!-- BARRA DE LA DERECHA -->
      <ul class="nav navbar-nav ml-auto flex-row">
        <li class="nav-item">
          <button id = "editar-administrador" class="md-btn md-fab md-mini m-b-sm"
          style="background-color:DodgerBlue;">
          <i class='material-icons md-24'></i> <!--Editar administrador--></button>

        </li>
        <li class="nav-item  pos-stc-xs mg-2">
          <button id="cerrar-menu-administrador" class="md-btn md-fab md-mini m-b-sm deep-orange-500"><!--md-mini achica boton-->
            <i class='material-icons md-20'></i> <!--Agregar administrador-->
          </button>
        </li>
        <li class="nav-item">
          .........
        </li>
      </ul>
      <!-- / navbar right -->
    </div>
  </div>
  <div class=" navbar-toggleable-sm">
    <ul class="nav navbar-nav nav-active-border b-primary">
      <li class="nav-item">
        <a id="mostrar-detalles" class="nav-link" href="" data-toggle="tab" data-target="#tab1" aria-expanded="true">
          <span class="nav-text">Detalles</span>
        </a>
      </li>

    </ul>
  </div>
  <div class="tab-content p-a m-b-md">
            <div class="tab-pane animated fadeIn text-muted active" id="tab1" aria-expanded="true">
              <p class="m-b btn-groups">
                <button id="habilitar-cuenta" class="btn btn-fw dark">Habilitar cuenta</button>
                <button class="btn btn-fw dark">Mostar link activación</button>
                <button class="btn btn-fw dark">Reenviar activación</button>
                <button class="btn btn-fw dark">Ingresar como administrador</button>
                <button class="btn btn-fw dark">Eliminar usuario</button>
                <!--<button class="btn btn-fw white">White </button>
                <button class="btn btn-fw primary">Primary</button>
                <button class="btn btn-fw accent">Accent</button>
                <button class="btn btn-fw warn">Warn</button>
                <button class="btn btn-fw success">Success</button>-->
                <br>
            <!--    <button class="btn btn-fw info">Copiar ID</button>-->

                <!-- <button class="btn btn-fw warning">Warning</button>
                <button class="btn btn-fw danger">Danger</button>
                <button class="btn btn-fw dark">Dark</button>
                <button class="btn btn-fw black">Black</button>
                <button class="btn btn-fw" disabled="disabled">Disabled</button>-->
              </p>
              <?php
              include "detalles_administrador.inc.php";
              ?>
            </div>

        </div>
      </div>
