<?php
include_once "app/sql/Conexion.inc.php";
include_once "app/usuarios/RepositorioUsuario.inc.php";
Conexion::abrir_conexion();
$id=$_SESSION["id_usuario"];
$usuario=RepositorioUsuario::obtener_usuario_por_id(Conexion::obtener_conexion(),$id);
?>
  <div class="app-header white box-shadow">
    <div class="navbar navbar-toggleable-sm flex-row align-items-center">
      <!-- Open side - Naviation on mobile -->
      <a data-toggle="modal" data-target="#aside" class="hidden-lg-up mr-3">
        <i class="material-icons">&#xe5d2;</i>
      </a>
      <!-- / -->

      <!-- Page title - Bind to $state's title -->
      <div class="mb-0 h5 no-wrap" ng-bind="$state.current.data.title" id="pageTitle"></div>
      <!-- navbar collapse -->
      <div class="collapse navbar-collapse" id="collapse">
        <!-- link and dropdown -->
        <ul class="nav navbar-nav mr-auto h2">
        </ul>

        <!-- / navbar marca central -->


        <!-- / navbar marca central -->
        <!-- / navbar collapse -->


        <!-- BARRA DE LA DERECHA -->
        <ul class="nav navbar-nav ml-auto flex-row">
          <li class="nav-item dropdown">
            <a class="nav-link" href="" data-toggle="dropdown">
              <i class="material-icons"></i></a>
              <div class="dropdown-menu text-color w-lg animated fadeInUp pull-right">
                <form class="navbar-form form-inline navbar-item m-l v-m" role="search">
                  <div class="form-group l-h m-a-0">
                    <div class="input-group">
                      <input type="text" class="form-control b-a form-control-sm" placeholder="Search projects...">
                      <span class="input-group-btn">
                        <button type="submit" class="btn btn-sm btn-default b-a no-shadow">
                          <i class="fa fa-search"></i>
                        </button>
                      </span>
                    </div>
                  </div>
                </form>
              </div>
            </li>
            <li class="nav-item dropdown pos-stc-xs">
              <a class="nav-link mr-2" href data-toggle="dropdown">
                <i class="material-icons">&#xe7f5;</i>
                <span class="label label-sm up warn">3</span>
              </a>
              <div ui-include="'../views/blocks/dropdown.notification.html'"></div>
            </li>


            <li class="nav-item dropdown">
              <a class="nav-link p-0 clear" href="" data-toggle="dropdown">
                  <span class="avatar w-32">

                  <?php
                    if(file_exists(DIRECTORIO_RAIZ."/subidas/".$usuario->obtener_id())){
                      ?>
                      <img src="<?=SERVIDOR.'/subidas/'.$usuario->obtener_id()?>" class="img-responsive">
                      <?php
                    }
                    else{
                    ?>
                  <img src="imagenes/usuario.jpg" alt="" class"img-responsive">
                  <?php
                    }
                   ?>

                  <i class="on b-white bottom"></i>
                </span>
                <p class="nav-text "><?php echo ControlSesion::obtener_nombre() ?></p>
                <p class="nav-text "><?php echo ControlSesion::obtener_nivel() ?></p>
              </a>
              <div ui-include="'../vistas/plantillas/sistema/dropdown.usuario.html'"></div>
            <!--  <div ui-include="'dropdown.usuario.html'"></div>-->
         </li>
            <li class="nav-item hidden-md-up">
              <a class="nav-link pl-2" data-toggle="collapse" data-target="#collapse">
                <i class="material-icons">&#xe5d4;</i>
              </a>
            </li>
          </ul>-->
          <!-- / navbar right -->
        </div>
      </div>
    </div>
