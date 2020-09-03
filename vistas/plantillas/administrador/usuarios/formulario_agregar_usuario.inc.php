<div id="formulario-agregar-usuario" class="formulario box">
  <div class="box-header">
    <h2>Agregar usuario</h2>
  </div>
  <div class="box-divider m-a-0"></div>
  <div class="box-body">
    <form role="form">
      <input id="id-cliente" type="text" class="form-control" name="id-cliente" value="<?=$id_cliente?>">
      <div class="form-group row">
        <label for="email" class="col-sm-2 form-control-label">Email</label>
        <div class="col-sm-10">
          <input id="email" autofocus type="text" class="form-control" name="email" placeholder="Email *">
        </div>
      </div>
      <div class="form-group row">
        <label for="nombre" class="col-sm-2 form-control-label">Nombre</label>
        <div class="col-sm-10">
          <input  id="nombre" type="text" class="form-control" name="nombre" placeholder="Nombre">
        </div>
      </div>
      <div class="form-group row">
        <label for="apellido" class="col-sm-2 form-control-label">Apellido</label>
        <div class="col-sm-10">
          <input id="apellido" type="text" class="form-control" name="apellido" placeholder="apellido">
        </div>
      </div>
      <div class="form-group row">
        <label for="descripcion" class="col-sm-2 form-control-label">Descripcion</label>
        <div class="col-sm-10">
          <input id="descripcion" type="text" class="form-control" name="descripcion" placeholder="Descripción">
        </div>
      </div>
        <div class="form-group row m-t-md">
        <div class="col-sm-6 col-sm-offset-2 center">
          <button id="cancelar-agregar-usuario" type="submit" class="btn cancel btn-block white">Cancelar</button>
          </div>
          <div class="col-sm-6 col-sm-offset-2 center">
            <button id="confirmar-agregar-usuario" type="submit" class="btn primary btn-block">Agregar</button>
        </div>
        </div>
      </form>
    </div>

  </div>
