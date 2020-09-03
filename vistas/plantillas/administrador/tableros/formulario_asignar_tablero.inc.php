<div id="formulario-asignar-cliente" class="form-popup" >
  <form class="form-container"
  role="form" method="post" target="tableros.php" name="form">
  <h3>Asignar tablero a cliente</h3>
  <div class="md-form-group">
      <h5>Por favor, seleccione el cliente al cual le asigna el tablero</h5>
  </div>
  <div id="nombre-cliente" class="form-group">
        <label class="col-sm-2 form-control-label">Cliente</label>
        <div class="col-sm-10">
          <select id="nombres-clientes" class="form-control input-c">
          </select>
        </div>
      </div>
  <button id="confirmar-asignar-cliente" name="agregar-tablero" class="btn primary btn-block p-x-md">Asignar</button>
  <button id="cancelar-asignar-cliente" class="btn cancel" >Cancelar</button>
</form>
</div>
