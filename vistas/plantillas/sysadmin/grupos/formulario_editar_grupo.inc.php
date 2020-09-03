<div id="formulario-editar-grupo" class="formulario box">
  <div class="box-header">
    <h2>Editar grupo</h2>
  </div>
  <div class="box-divider m-a-0"></div>
  <div class="box-body">
    <form role="form">
      <div class="form-group row">
        <label for="nombre" class="col-sm-2 form-control-label">Nombre</label>
        <div class="col-sm-10">
          <input id="nombre-original"  type="hidden" readonly="readonly">
          <input id="nombre-editar" autofocus type="text" class="form-control" name="nombre" placeholder="Nombre *">
        </div>
      </div>
      <div class="form-group row">
        <label for="tipo" class="col-sm-2 form-control-label">Tipo</label>
        <div class="col-sm-10">
          <input id="tipo-original"  type="hidden" readonly="readonly">
          <input  id="tipo-editar" type="text" class="form-control" name="tipo" placeholder="Tipo">
        </div>
      </div>
      <div class="form-group row">
        <label for="pais" class="col-sm-2 form-control-label">País</label>

        <div class="col-sm-10">
          <input id="pais-original"  type="hidden" readonly="readonly">
          <input id="pais-editar" type="text" class="form-control" name="pais" placeholder="Pais">
        </div>
      </div>
      <div class="form-group row">
        <label for="estado" class="col-sm-2 form-control-label">Estado</label>
        <div class="col-sm-10">
          <input id="estado-original"  type="hidden" readonly="readonly">

          <input id="estado-editar" type="text" class="form-control" name="estado" placeholder="Estado">
        </div>
      </div>

      <div class="form-group row">
        <label for="ciudad" class="col-sm-2 form-control-label">Ciudad</label>
        <div class="col-sm-10">
          <input id="ciudad-original"  type="hidden" readonly="readonly">
          <input id="ciudad-editar" type="text" class="form-control" name="ciudad" placeholder="Ciudad">
        </div>
      </div>
      <div class="form-group row">
        <label for="direccion" class="col-sm-2 form-control-label">Dirección</label>
        <div class="col-sm-10">
          <input id="direccion-original"  type="hidden" readonly="readonly">
          <input id="direccion-editar" type="text" class="form-control" name="direccion" placeholder="Direccion">
        </div>
      </div>

      <div class="form-group row">
        <label for="teléfono" class="col-sm-2 form-control-label">Teléfono</label>
        <div class="col-sm-10">
          <input id="telefono-original"  type="hidden" readonly="readonly">
          <input id="telefono-editar" type="text" class="form-control" name="telefono" placeholder="Teléfono">
        </div>
      </div>
      <div class="form-group row">
        <label for="email" class="col-sm-2 form-control-label">Email</label>
        <div class="col-sm-10">
          <input id="email-original"  type="hidden" readonly="readonly">
          <input id="email-editar" type="email" class="form-control" name="email" placeholder="Email">
        </div>
      </div>
      <div class="form-group row m-t-md">
        <div class="col-sm-6 col-sm-offset-2 center">
          <button id="cancelar-editar-grupo" type="submit" class="btn cancel btn-block white">Cancelar</button>
        </div>
        <div class="col-sm-6 col-sm-offset-2 center">
          <button id="confirmar-editar-grupo" type="submit" class="btn primary btn-block">Modificar</button>
        </div>
      </div>
    </form>
  </div>
</div>
