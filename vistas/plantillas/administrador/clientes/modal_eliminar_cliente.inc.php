<div id="modal-eliminar-cliente" class="modal fade animate in " data-backdrop="true" style="display: none;">
  <div class="modal-dialog bounce" id="animate" ui-class="bounce">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Atención!</h5>
      </div>
      <div class="modal-body text-center p-lg">
        <p>Está seguro que desea eliminar el cliente?</p>
        <form class="form_eliminar" id="form_eliminar" method="post" role="form" action="dispositivos.php" target="dispositivos.php">
          <input id="id-eliminar" type="text" name="id-eliminar" >
          </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn dark-white p-x-md" data-dismiss="modal">No</button>
        <button id="confirmar-eliminar" type="button" class="btn danger p-x-md" name="eliminar-dispositivo" data-dismiss="modal">Si</button>

      </div>
    </div><!-- /.modal-content -->
  </div>
</div>
