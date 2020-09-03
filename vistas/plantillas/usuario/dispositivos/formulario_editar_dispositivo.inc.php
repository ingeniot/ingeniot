<div id="formulario-editar-dispositivo" class="form-popup" >
  <form class="form-container"
  role="form" method="post" target="dispositivos.php" name="form">
  <h3>Editar dispositivo</h3>
  <div class="md-form-group">
    <input id="id-editar" type="hidden" name="id-editar" >
    <label for="nombre"><b>Nombre</b></label>
    <input id="nombre-original"  type="hidden" readonly="readonly">
    <input id="nombre-editar" autofocus type="text" placeholder="Nombre *" name="nombre">
  </div>
  <div class="md-form-group">
    <label for="tipo"><b>Tipo</b></label>
   <input id="tipo-original"  type="hidden" readonly="readonly">
    <input id="tipo-editar" type="text" placeholder="Tipo de dispositivo *" name="tipo">
  </div>
  <button id="confirmar-editar-dispositivo" name="editar-dispositivo" class="btn primary btn-block p-x-md">Modificar</button>
  <button id="cancelar-editar-dispositivo" class="btn cancel" >Cancelar</button>
</form>
</div>
