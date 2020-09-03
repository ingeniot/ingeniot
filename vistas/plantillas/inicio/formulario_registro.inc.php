<!-- ############ Formulario registro-->
<!-- ############ LAYOUT START-->
<div id="formulario-registro" class="dropdown-menu animated fadeInUp pull-right w-xxl w-auto-xs p-y-md">
<div class="p-a-md box-color r box-shadow-z1 text-color m-a">
  <div class="m-b text-sm">
    Registre su cuenta IngenIoT
  </div>
  <form role="form" method="post" target="registro.php" name="form">
    <div class="md-form-group">
      <input id="nivel" name="nivel" type="hidden" value="demo">
      <label>Nombre</label>
      <input id="nombre" name="nombre" type="text" class="md-input" placeholder="nombre usuario" required autofocus>
    </div>
    <div class="md-form-group">
      <label>Correo</label>
      <input id="email" name="email" type="email" class="md-input" placeholder="a@a" autocomplete="username" required>
    </div>
    <div class="md-form-group">
      <label>Contraseña</label>
      <input id="clave" name="clave" type="password" placeholder="***" class="md-input" autocomplete = "new-password" required>
    </div>
    <div class="md-form-group">
      <label>Repetir contraseña</label>
      <input id="claver" name="claver" type="password" placeholder="***" class="md-input" autocomplete = "new-password" required>
    </div>
    <button id="registrar-usuario" type="submit" class="btn primary btn-block p-x-md" name="enviar">Registro</button>
  </form>
</div>
</div>
