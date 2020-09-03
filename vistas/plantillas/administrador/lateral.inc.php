<div id="aside" class="app-aside modal nav-dropdown ng-scope" ng-class="{'folded': app.setting.folded}" style="display: none;" aria-hidden="true">
  <!-- fluid app aside -->
  <div class="left navside dark dk" data-layout="column">
                <!-- INICIO LOGO -->
        <div class="logo">
          <a href="..//index.html">
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
            </svg>
            <img src="../imagenes/ingeniot_logo_120x120.svg" alt="." class="hide">
            <span class="hidden-folded inline ">IngenIoT</span>
          </a>
        </div>
        <!-- FIN LOGO -->


        <div class="nav-border b-primary" data-flex>
          <nav class="scroll nav-light">
            <ul class="nav" ui-nav>
              <li class="nav-header hidden-folded">
                <small class="text-muted">Menú admin</small>
              </li>

              <li>
                <a id = "menu-administrador" href="administrador">
                  <span class="nav-icon">
                    <i class="glyphicon glyphicon-home"></i>
                  </span>
                  <span class="nav-text">Inicio</span>
                </a>
              </li>

              <li>
                <a id = "menu-reglas" href="reglas" >
                  <span class="nav-icon">
                    <i class="glyphicon glyphicon-play"></i>
                  </span>
                  <span class="nav-text">Reglas</span>
                </a>
              </li>

              <li>
                <a id = "menu-clientes" href="clientes" >
                  <span class="nav-icon">
                    <i class="glyphicon glyphicon-user"></i>
                  </span>
                  <span class="nav-text">Clientes</span>
                </a>
              </li>

              <li>
                <a id = "menu-principal" href="gestion_dominios" >
                  <span class="nav-icon">
                    <i  class="glyphicon glyphicon-lock"></i>
                  </span>
                  <span class="nav-text">Dominios</span>
                </a>
              </li>

              <li>
                <a id = "menu-dispositivos" href="gestion_dispositivos">
                  <span class="nav-icon">
                    <i  class="fa fa-lightbulb-o"></i>
                  </span>
                  <span class="nav-text">Dispositivos</span>
                </a>
              </li>
            <li>

                <a id = "menu-enitdades"  href="gestion_entidades" >
                  <span class="nav-icon">
                    <i  class="glyphicon glyphicon-tag"></i>
                  </span>
                  <span class="nav-text">Entidades</span>
                </a>
              </li>

              <li>
                <a id = "menu-recursos" href="gestion_recursos" >
                  <span class="nav-icon">
                    <i class="fa fa-cogs"></i>
                  </span>
                  <span class="nav-text">Recursos</span>
                </a>
              </li>

              <li>
                <a id = "menu-tableros" href="gestion_tableros" >
                  <span class="nav-icon">
                    <i class="glyphicon glyphicon-dashboard"></i>
                  </span>
                  <span class="nav-text">Tableros</span>
                </a>
              </li>
              <li>
                <a id = "menu-registros" href="registros" >
                  <span class="nav-icon">
                    <i class="glyphicon glyphicon-stats"></i>
                  </span>
                  <span class="nav-text">Registros</span>
                </a>
              </li>
        </ul>
          </nav>
        </div>
        <div flex-no-shrink="" class="b-t">
        <div class="nav-fold">
          <a href="profile.html">
            <span class="pull-left">
              <!--  <img src="../assets/images/a0.jpg" alt="..." class="w-40 img-circle">-->
            </span>
            <span class="clear hidden-folded p-x">
              <span class="block _500">Pie menu</span>
              <!--    <small class="block text-muted"><i class="fa fa-circle text-success m-r-sm"></i>online</small>-->
            </span>
          </a>
        </div>
      </div>
    </div>
  </div>
