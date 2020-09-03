<div class="dropdown-menu w-xl animated fadeInUp pull-right p-0">
  <div class="box-color m-0">
    <div class="box-header b-b p-y-sm">
      <strong>Ingresar</strong>
    </div>
    <div class="box-body">
      <form role="form" class="ng-pristine ng-valid" target="" method="post" name="form">
        <div class="form-group">
          <label>Correo</label>
          <input id="login-email" name="email" type="email" class="form-control" placeholder="Ingresar correo" autocomplete="username">
        </div>
        <div class="form-group">
          <label>Clave</label>
          <input id="login-clave" name"clave"="" type="password" class="form-control" placeholder="Clave" autocomplete="current-password">
        </div>
        <!--      <div class="checkbox">
        <label class="md-check">
        <input type="checkbox"><i></i> Recordarme
      </label>
    </div>-->
    <div class="m-t m-b-xs">
      <a>
      <button id="login" type="submit" name="login" class="btn btn-sm btn-block primary  text-u-c p-x _600">Ingresar
      </a>
    </button>
  </div>
</form>
<div class="p-v-lg text-center">
  <div class="m-b"><a ui-sref="access.forgot-password" href="<?=RUTA_RECUPERAR_CLAVE?>" class="text-primary _600">Olvidó su clave?</a>
  </div>
  <div>No tiene una cuenta? <a ui-sref="access.signup" href="registro.php" class="text-primary _600">Registrarse</a>
  </div>
</div>
</div>
</div>
</div>
