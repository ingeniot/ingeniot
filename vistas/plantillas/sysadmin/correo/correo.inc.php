<div  id="correo" class="">
  <?php
  include "navbar_correo.inc.php";
  ?>
  <div class="m-b-lg row">
    <h3>&nbsp;&nbsp;Configuración de servidor de correo saliente</h3>
  </div>
  <div id="configuracion-correo" class="m-b-lg row">
    <div class="col-sm-10 col-sm-offset-2">
      <div class="row row-sm">
        <div class="col-sm-12">
          <div class="md-form-group">
            <input id="email" class="md-input" required="">
            <label>Correo mostrado</label>
          </div>
        </div>
        <div class="col-sm-3">
          <div class="md-form-group">
            <input id="protocolo" class="md-input" list="protocolos" required="">
            <datalist id="protocolos">
              <option value="SMTP">
                <option value="SMTPS">
                </datalist>
                <label>Protocolo SMTP</label>
              </div>
            </div>
            <div class="col-sm-6">
              <div  class="md-form-group">
                <input id="servidor" class="md-input" required="">
                <label>Servidor SMTP</label>
              </div>
            </div>
            <div class="col-sm-3">
              <div class="md-form-group">
                <input id="puerto" class="md-input" required="">
                <label>Puerto SMTP</label>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="md-form-group">
                <input id="timeout" class="md-input" value="10000">
                <label>Timeout</label>
              </div>
            </div>
            <div class="col-sm-3">
              <p>
                <label class="md-check">
                  <input id="tls" type="checkbox">
                  <i class="indigo"></i>
                  Habilitar TLS
                </label>
              </p>
            </div>
            <div class="col-sm-3">
              <div class="md-form-group">
                <input id="version-tls" class="md-input" list="versiones">
                <datalist id="versiones">
                  <option value="TLSv1">
                  <option value="TLSv1.1">
                    <option value="TLSv1.2">
                  <option value="TLSv1.3">
                    </datalist>
                <label>Versión TLS</label>
                <span class="md-input-msg right"></span>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="md-form-group">
                <input id="usuario" class="md-input">
                <label>Usuario</label>
              </div>
            </div>

            <div class="col-sm-6">
              <div class="md-form-group">
                <input id="clave" type="password" class="md-input" >
                <label>Clave</label>
              </div>
            </div>

        </div>
      </div>
              </div>
              <div class="form-group row m-t-lg">
      <div class="col-sm-10 col-sm-offset-2 text-right">
        <button id="enviar-email-prueba" type="submit" class="btn white">Enviar email prueba</button>
        <button id="guardar-configuracion-correo" type="submit" class="btn btn-primary">Guardar cambios</button>
      </div>
    </div>
            </div>
