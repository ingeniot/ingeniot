<div id="menu-dispositivo" class="white box-shadow menu">
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
          <button id = "editar-dispositivo" class="md-btn md-fab md-mini m-b-sm"
          style="background-color:DodgerBlue;">
          <i class='material-icons md-24'></i> <!--Editar dispositivo--></button>

        </li>
        <li class="nav-item  pos-stc-xs mg-2">
          <button id="cerrar-menu-dispositivo" class="md-btn md-fab md-mini m-b-sm deep-orange-500"><!--md-mini achica boton-->
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
        <button class="btn btn-fw dark">Asignar cliente</button>
        <button class="btn btn-fw dark">Credenciales</button>
        <!--<button class="btn btn-fw white">White </button>
        <button class="btn btn-fw primary">Primary</button>
        <button class="btn btn-fw accent">Accent</button>
        <button class="btn btn-fw warn">Warn</button>
        <button class="btn btn-fw success">Success</button>-->
        <br>
        <button class="btn btn-fw info">Copiar ID</button>
        <button class="btn btn-fw info">Copiar TOKEN</button>
        <!-- <button class="btn btn-fw warning">Warning</button>
        <button class="btn btn-fw danger">Danger</button>
        <button class="btn btn-fw dark">Dark</button>
        <button class="btn btn-fw black">Black</button>
        <button class="btn btn-fw" disabled="disabled">Disabled</button>-->
      </p>
      <div id="dispositivo-detalles"  class="vista-detalles" >
        <form class=""
        role="form" method="post" target="dispositivos.php" name="form">
        <div class="md-form-group">
          <input id="id-actual" type="hidden"  name="id" readonly="readonly">
          <label for="nombre"><b>Nombre</b></label>
          <input id="nombre-actual" type="text" placeholder="Nombre *" name="nombre" readonly="readonly">
        </div>
        <div class="md-form-group">
          <label for="tipo"><b>Tipo</b></label>
          <input id="tipo-actual" type="text" placeholder="Tipo de dispositivo *" name="tipo" readonly="readonly">
        </div>
      </form>
    </div>

  </div>
  <div class="tab-pane animated fadeIn text-muted" id="tab2" aria-expanded="false">
    <h2>atributos</h2>
  </div>
  <div class="tab-pane animated fadeIn text-muted" id="tab3"aria-expanded="false">
    <h2>telemetria</h2>
  </div>

  <div class="tab-pane animated fadeIn text-muted active" id="tab4" aria-expanded="true">
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
