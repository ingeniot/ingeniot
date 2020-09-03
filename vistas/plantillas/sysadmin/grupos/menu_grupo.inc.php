<div id="menu-grupo" class="white box-shadow menu">
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
          <button id = "editar-grupo" class="md-btn md-fab md-mini m-b-sm"
          style="background-color:DodgerBlue;">
          <i class='material-icons md-24'></i> <!--Editar dispositivo--></button>

        </li>
        <li class="nav-item  pos-stc-xs mg-2">
          <button id="cerrar-menu-grupo" class="md-btn md-fab md-mini m-b-sm deep-orange-500"><!--md-mini achica boton-->
            <i class='material-icons md-20'></i> <!--Agregar dispositivo-->
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
      <li class="nav-item">
        <a id="mostrar-atributos" class="nav-link" href="" data-toggle="tab" data-target="#tab2" aria-expanded="false">
          <span class="nav-text">Atributos</span>
        </a>
      </li>
      <li class="nav-item">
        <a id="mostrar-telemetria" class="nav-link" href="" data-toggle="tab" data-target="#tab3" aria-expanded="false">
          <span class="nav-text">Telemetría</span>
        </a>
      </li>
      <li class="nav-item">
        <a  id="mostrar-alarmas" class="nav-link" href="" data-toggle="tab" data-target="#tab4" aria-expanded="false">
          <span class="nav-text">Alarmas</span>
        </a>
      </li>
      <li class="nav-item">
        <a  id="mostrar-eventos" class="nav-link" href="" data-toggle="tab" data-target="#tab5" aria-expanded="false">
          <span class="nav-text">Eventos</span>
        </a>
      </li>
      <li class="nav-item">
        <a  id="mostrar-relaciones" class="nav-link" href="" data-toggle="tab" data-target="#tab6" aria-expanded="false">
          <span class="nav-text">Relaciones</span>
        </a>
      </li>
    </ul>
  </div>
  <div class="tab-content p-a m-b-md">
            <div class="tab-pane animated fadeIn text-muted active" id="tab1" aria-expanded="true">
              <p class="m-b btn-groups">
                <span>
                <form class="" role="form" method="post" action="<?=RUTA_ADMINISTRADORES?>" name="form">
                  <input id="id-actual" type="hidden"  name="id-grupo" readonly="readonly">
                 <input id="grupo-actual" type="hidden" name="nombre-grupo" readonly="readonly">
                    <button type="submit" href="" class="btn btn-fw dark">Administradores grupo</button>
              </form>
                            </span>
              <span>
                <button class="btn btn-fw dark">Eliminar grupo</button>
              </span>

                <!--<button class="btn btn-fw white">White </button>
                <button class="btn btn-fw primary">Primary</button>
                <button class="btn btn-fw accent">Accent</button>
                <button class="btn btn-fw warn">Warn</button>
                <button class="btn btn-fw success">Success</button>-->
                <br>
                <button class="btn btn-fw info">Copiar ID</button>

                <!-- <button class="btn btn-fw warning">Warning</button>
                <button class="btn btn-fw danger">Danger</button>
                <button class="btn btn-fw dark">Dark</button>
                <button class="btn btn-fw black">Black</button>
                <button class="btn btn-fw" disabled="disabled">Disabled</button>-->
              </p>
              <?php
              include "detalles_grupo.inc.php";
              ?>
            </div>
            <div class="tab-pane animated fadeIn text-muted" id="tab2" aria-expanded="false">
                <h2>atributos</h2>
            </div>
            <div class="tab-pane animated fadeIn text-muted" id="tab3"aria-expanded="false">
                <h2>telemetria</h2>
            </div>

          <div class="tab-pane animated fadeIn text-muted" id="tab4" aria-expanded="false">
            <h2>eventos</h2>
          </div>
          <div class="tab-pane animated fadeIn text-muted" id="tab5" aria-expanded="false">
              <h2>alarmas</h2>
          </div>
          <div class="tab-pane animated fadeIn text-muted" id="tab6" aria-expanded="false">
              <h2>relaciones</h2>
          </div>
        </div>
      </div>
