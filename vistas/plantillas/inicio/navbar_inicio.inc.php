<header>
  <nav class="app-header white navbar navbar-toggleable-sm flex-row align-items-center ng-scope">
    <div class="container">
      <a data-toggle="collapse" data-target="#navbar-1" class="navbar-item mr-3 hidden-md-up">
        <i class="material-icons"></i>
      </a>
      <!-- brand -->
      <a class="navbar-brand ng-scope" href="<?=RUTA_INICIO?>">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 70 60" width="50" height="50">
          <line x1="30" y1="20" x2="90" y2="20" style="stroke:rgb(0,0,0);stroke-width:2"></line>
          <line x1="50" y1="40" x2="75" y2="40" style="stroke:rgb(0,0,0);stroke-width:2"></line>
          <line x1="30" y1="20" x2="50" y2="40" style="stroke:rgb(0,0,0);stroke-width:2"></line>
          <line x1="60" y1="20" x2="50" y2="40" style="stroke:rgb(0,0,0);stroke-width:2"></line>
          <line x1="60" y1="20" x2="75" y2="40" style="stroke:rgb(0,0,0);stroke-width:2"></line>
          <line x1="75" y1="40" x2="90" y2="20" style="stroke:rgb(0,0,0);stroke-width:2"></line>
          <circle cx="30" cy="20" r="5" stroke="black" stroke-width="2" fill="white"></circle>
          <circle cx="60" cy="20" r="5" stroke="black" stroke-width="2" fill="white"></circle>
          <circle cx="90" cy="20" r="5" stroke="black" stroke-width="2" fill="white"></circle>
          <circle cx="50" cy="40" r="5" stroke="black" stroke-width="2" fill="white"></circle>
          <circle cx="75" cy="40" r="5" stroke="black" stroke-width="2" fill="white"></circle>
          <path d="M 50 55 C 50 55 60 40 70 55" style="fill: none; stroke: black; stroke-width: 3px;"></path>
          <path d="M 54 60 C 54 60 60 50 66 60" style="fill: none; stroke: black; stroke-width: 3px;"></path>
          <!--<text>IngenIoT</text>>
          Sorry, your browser does not support inline SVG.-->
        </svg>
        <img src="../imagenes/ingeniot_logo_120x120.svg" alt="." class="hide">
        <span class="hidden-folded inline ng-binding">IngenIoT</span>
      </a>
      <!-- / brand -->
      <!-- navbar collapse -->
      <div class="collapse navbar-collapse" id="navbar-1">
        <!-- link and dropdown -->
        <ul class="nav navbar-nav text-primary-hover">
          <li class="nav-item">
            <a class="nav-link" href="">
              <span class="nav-text">Productos </span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="">
              <span class="nav-text">Servicios</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="">
              <span class="nav-text">Soluciones</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="">
              <span class="nav-text">Blog</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="">
              <span class="nav-text">Contacto</span>
            </a>
          </li>
        </ul>
        <!-- / link and dropdown -->
      </div>
      <ul class="nav navbar-nav flex-row pull-right ml-auto">
        <li class="nav-item dropdown">
          <a class="nav-link" href="" data-toggle="dropdown">
            <i class="material-icons"></i>
          </a>
          <div class="dropdown-menu text-color p-a animated fadeInUp pull-right">
            <!-- search form -->
            <form class="form-inline ng-pristine ng-valid ng-scope" role="search">
              <input type="text" class="form-control b-a rounded px-3 form-control-sm" placeholder="Search projects...">
            </form>
            <!-- / search form -->
          </div>
        </li>


        <!-- Boton login -->
        <li class="nav-item dropdown">
          <a class="nav-link" data-toggle="dropdown"  aria-expanded="false">
            <span>Ingresar</span>
          </a>
          <?php  //Formulario login dropdown
          include_once "formulario_login.inc.php";
          ?>
          <!--LOGIN dropdown -->
          <!-- / dropdown -->
        </li>
              <!-- FIN Boton login -->
        <!-- Boton registrarse -->
        <li class="nav-item dropdown">
          <a id="abrir-registro" class="nav-link" data-toggle="dropdown">
            <span class="hidden-xs-down btn btn-sm rounded btn-outline b-danger text-u-c _600">
              Registrarse
            </span>
            <span class="hidden-sm-up ">
              <i class="material-icons"></i>
            </span>
          </a>
          <?php  //Formulario registro dropdown
          include_once "formulario_registro.inc.php";
          ?>

<!-- ############ FIN Formulario registro-->
        </li>
            <!-- FIN Boton registrarse -->
      </ul>



    </div>        <!-- / navbar right -->
  </nav>

</header>
