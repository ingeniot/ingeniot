<div id="menu-tablero" class="white box-shadow menu">
      <!--navbar-->
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
          <button id = "editar-tablero" class="md-btn md-fab md-mini m-b-sm"
          style="background-color:DodgerBlue;">
          <i class='material-icons md-24'></i> <!--Editar tablero--></button>

        </li>
        <li class="nav-item  pos-stc-xs mg-2">
          <button id="cerrar-menu-tablero"  class="md-btn md-fab md-mini m-b-sm deep-orange-500"><!--md-mini achica boton-->
            <i class='material-icons md-20'></i> <!--Agregar tablero-->
          </button>
        </li>
        <li class="nav-item">
          .........
        </li>
      </ul>
      <!-- / navbar right -->
    </div>
  </div>
      <!--fin navbar-->
            <!--menu-->
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
  <!--fin menu-->
        <!--opciones menu-->
  <div class="tab-content p-a m-b-md">
                  <!--detalles-->
    <div class="tab-pane animated fadeIn text-muted active" id="tab1" aria-expanded="true">
        <!--botones-->
      <p class="m-b btn-groups">
        <button id="asignar-cliente" class="btn btn-fw dark">Asignar cliente</button>
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
        <!--fin botones-->
                      <!--detalles-atributos-->
      <div id="tablero-detalles"  class="vista-detalles" >
        <form class="" name="form">
          <input id="id-actual" class="md-input"  type="hidden" name="id" readonly="readonly">
            <div class="row">
              <div class="col-sm-6">
                  <div class="md-form-group">
                  <label>Asignado a cliente</label>
                  <input id="cliente-actual" class="md-input"  type="text" name="cliente" readonly="readonly">
                </div>
              </div>    
          <div class="col-sm-12">
          <div class="md-form-group">
            <label>Nombre</label>
            <input id="nombre-actual" class="md-input"  type="text" name="nombre" readonly="readonly">
          </div>
        </div>
        <div class="col-sm-12">
        <div class="md-form-group">
          <label>Descripción</label>
          <input  id="tipo-actual" class="md-input" type="text" placeholder="" name="tipo" readonly="readonly">
        </div>
      </div>
        </div>
      </form>
    </div>
    <!--fin detalles-atributos-->
  </div>
                <!--fin detalles-->
  <div class="tab-pane animated fadeIn text-muted" id="tab2" aria-expanded="false">
    <h2>atributos</h2>
  </div>
  <div class="tab-pane animated fadeIn text-muted" id="tab3"aria-expanded="false">
    <h2>telemetria</h2>
  </div>
  <div class="tab-pane animated fadeIn text-muted " id="tab4" aria-expanded="false">
    <h2>eventos</h2>
  </div>
  <div class="tab-pane animated fadeIn text-muted" id="tab5" aria-expanded="false">
    <h2>alarmas</h2>
  </div>
  <div class="tab-pane animated fadeIn text-muted" id="tab6" aria-expanded="false">
    <h2>relaciones</h2>
  </div>
</div>
              <!--fin opciones menu-->
</div>
