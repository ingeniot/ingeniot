<div  id="formulario-editar-dispositivo" class="formulario box">
  <div class="box-header">
    <h3>Editar dispositivo</h3>
  </div>
  <div class="box-divider m-a-0"></div>
  <div class="box-body">
    <form role="form">
        <input id="id-editar" type="hidden" name="id-editar" >
      <div class="form-group row">

        <label for="nombre"  class="col-sm-3 form-control-label"><b>Nombre</b></label>
        <div class="col-sm-9">
          <input id="nombre-original"  type="hidden" readonly="readonly">
          <input id="nombre-editar" autofocus type="text" class="form-control" placeholder="Nombre *" name="nombre" required="required">
        </div>
      </div>
      <div class="md-form-group row">
        <label for="tipo"  class="col-sm-3 form-control-label"><b>Tipo</b></label>
        <div class="col-sm-9">
          <input id="tipo-original"  type="hidden" readonly="readonly">
          <input id="tipo-editar" type="text" class="form-control" placeholder="Tipo de dispositivo *" name="tipo" required="required">
        </div>
      </div>
      <div class="form-group row">
        <label for="etiqueta"  class="col-sm-3 form-control-label"><b>Etiqueta</b></label>
        <div class="col-sm-9">
          <input id="etiqueta-original"  type="hidden" readonly="readonly">
          <input id="etiqueta-editar" type="text" class="form-control" placeholder="Etiqueta *" name="etiqueta" required="required">
        </div>
      </div>
      <div class="md-form-group row">
        <label for="descripcion"  class="col-sm-3 form-control-label"><b>Descripción</b></label>
        <div class="col-sm-9">
          <input id="descripcion-original"  type="hidden" readonly="readonly">
          <input id="descripcion-editar" type="text" class="form-control" placeholder="Descripción" name="descripcion" >
        </div>
      </div>
      <div class="form-group row m-t-md">
        <div class="col-sm-6 col-sm-offset-2 center">
          <button id="cancelar-editar-dispositivo" class="btn cancel btn-block white" >Cancelar</button>
        </div>
        <div class="col-sm-6 col-sm-offset-2 center">
          <button id="confirmar-editar-dispositivo" name="editar-dispositivo" class="btn primary btn-block p-x-md">Modificar</button>
        </div>

      </div>
    </form>
  </div>
</div>
