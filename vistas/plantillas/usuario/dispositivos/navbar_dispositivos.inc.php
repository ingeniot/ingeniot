<div class="row">
<div class="col-sm-9">
  <h2 class="m-b-0 _300 ng-binding"><?php echo $titulo ?></h2>

</div>
<div class="col-sm-1 text-sm-right">
  <button id="agregar-dispositivo" class="md-btn md-fab md-mini m-b-sm green" ><!--md-mini achica boton-->
    <i class="material-icons md-24"></i> <!--Agregar dispositivo-->
  </button>
</div>

<div class="col-sm-1">
<a class="md-btn md-fab md-mini m-b-sm indigo" data-toggle="dropdown" aria-expanded="false">
  <i class="material-icons md-24"></i>
</a>
<div class="dropdown-menu text-color w-lg animated fadeInUp pull-right">
  <form class="navbar-form form-inline navbar-item m-l v-m ng-pristine ng-valid ng-scope ng-submitted" role="search" style="">
    <div class="form-group l-h m-a-0">
      <div class="input-group">
        <input type="text" class="form-control b-a form-control-sm" placeholder="Buscar dispositivo...">
        <span class="input-group-btn">
          <button type="submit" class="btn btn-sm btn-default b-a no-shadow">
            <i class="fa fa-search"><!--Buscar dispositivo-->
            </i>
          </button>
        </span>
      </div>
    </div>
  </form>
</div>
<!--<button class="open-button" onclick="openForm()">Open Form</button>-->
</div>


</div>
