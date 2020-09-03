<div id="formulario-editar-usuario" class="formulario box">
  <div class="box-header">
    <h2>Editar usuario</h2>
  </div>
  <div class="box-divider m-a-0"></div>
  <div class="box-body">
    <form role="form">
      <input id="id-editar" type="text" name="id-editar" >
      <div class="form-group row">
        <label for="email" class="col-sm-2 form-control-label">Email</label>
        <div class="col-sm-10">
          <input id="email-original"  type="hidden" readonly="readonly">
          <input id="email-editar" autofocus type="text" class="form-control" name="email" placeholder="Email *">
        </div>
      </div>
      <div class="form-group row">
        <label for="nombre" class="col-sm-2 form-control-label">Nombre</label>
        <div class="col-sm-10">
          <input id="nombre-original"  type="hidden" readonly="readonly">
          <input  id="nombre-editar" type="text" class="form-control" name="nombre" placeholder="Nombre">
        </div>
      </div>
      <div class="form-group row">
        <label for="apellido" class="col-sm-2 form-control-label">Apellido</label>

        <div class="col-sm-10">
          <input id="apellido-original"  type="hidden" readonly="readonly">
          <input id="apellido-editar" type="text" class="form-control" name="apellido" placeholder="Apellido">
        </div>
      </div>
      <div class="form-group row">
        <label for="descripcion" class="col-sm-2 form-control-label">Descripcion</label>
        <div class="col-sm-10">
          <input id="descripcion-original"  type="hidden" readonly="readonly">

          <input id="descripcion-editar" type="text" class="form-control" name="descripcion" placeholder="Descripcion">
        </div>
      </div>
      <div class="form-group row m-t-md">
        <div class="col-sm-6 col-sm-offset-2 center">
          <button id="cancelar-editar-usuario" type="submit" class="btn cancel btn-block white">Cancelar</button>
        </div>
        <div class="col-sm-6 col-sm-offset-2 center">
          <button id="confirmar-editar-usuario" type="submit" class="btn primary btn-block">Modificar</button>
        </div>
      </div>
    </form>
  </div>
</div>
