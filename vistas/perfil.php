<?php
//phpinfo();
//die();
//limpiar cache para que renueve la inagen de Perfil
header("Expires: Tue, 01 Jan 2000 00:00:00 GMT");
header("Last-Modifies: ". gmdate("D, d M Y H :i:s")."GMT");
header("Cache-Control: no-store, no-cache, must-revalidate,max-age=0");
header("Cache-control: post-check=0, pre-check=0",false);
header("Pragma: no-cache");
if (!ControlSesion::sesion_iniciada())
  {
  //  include "denegado.php";
  //echo "Ingreso no autorizado";
  Redireccion::redirigir("denegado");
//  echo '<meta http-equiv="refresh" content="0; url=denegado">';
}
else{
include_once "app/sql/Conexion.inc.php";
include_once "app/usuarios/RepositorioUsuario.inc.php";
Conexion::abrir_conexion();
$id=$_SESSION["id_usuario"];
$usuario=RepositorioUsuario::obtener_usuario_por_id(Conexion::obtener_conexion(),$id);
//echo $usuario->obtener_id();
//die();
}
//echo $_POST["guardar-imagen"];
//echo "<br>";
//echo $_FILES["archivo-subido"]["tmp_name"];
if(isset($_POST["guardar-imagen"]) && !empty($_FILES["archivo-subido"]["tmp_name"])){
//if(isset($_POST["guardar-imagen"])){
//  echo "entro al post";
  //die();
  $directorio=DIRECTORIO_RAIZ."/subidas/";
  $carpeta_objetivo=$directorio.basename($_FILES["archivo-subido"]["name"]);
  //echo $carpeta_objetivo;
  //die();
  $subida_correcta=1;
  $tipo_imagen=pathinfo($carpeta_objetivo,PATHINFO_EXTENSION);
  $comprobacion=getimagesize($_FILES["archivo-subido"]["tmp_name"]);
  if($comprobacion!==false){
    $subida_correcta=1;
      }
  else{
    $subida_correcta=0;
  }
  if($_FILES["archivo-subido"]["size"]>500000){
    echo "El archvono puede ocupar mas de 500 Kb";
    $subida_correcta=0;
  }
  if($tipo_imagen!="jpg" && $tipo_imagen!="png" && $tipo_imagen="jpeg" && $tipo_imagen!="gif"){
    echo "Sólo se adminten formatos JPG,JPEG,PNG y GIF";
      $subida_correcta=0;
  }
  if($subida_correcta=0){
    echo "El archivo no pudo subirse";
  }
  else{
    if(move_uploaded_file($_FILES["archivo-subido"]["tmp_name"],DIRECTORIO_RAIZ."/subidas/".$usuario->obtener_id())){
      echo "El archivo".basename($_FILES["archivo-subido"]["name"])." ha subido correctamente";
    }
    else{
      echo "ha ocurrido un error";

    }
  }
}

$titulo = "Perfil de usuario";
$nivel=$_SESSION["nivel_usuario"];
include_once "plantillas/sistema/encabezado.inc.php";

 ?>
<body>
     <div class="pace pace-inactive">
     <div class="pace-progress" data-progress-text="100%" data-progress="99" style="transform: translate3d(100%, 0px, 0px);">
   <div class="pace-progress-inner"></div>
  </div>
  <div class="pace-activity"></div>
  </div>
  <div class="app" id="app" >
    <!-- ############ LAYOUT START-->
    <!-- BARRA IZQUIERDA -->
    <!-- aside -->
    <?php
    include_once "plantillas/usuario/lateral.inc.php";
    ?>
    <!-- / -->
    <!-- F|IN BARRA IZQUIERDA -->
  <!-- content -->
    <div id="content" class="app-content box-shadow-z0" role="main">


      <!-- BARRA DE NAVEGACIÓN -->
      <?php
      include_once "plantillas/sistema/navbar.inc.php";
      ?>
      <!-- FIN BARRA DE NAVEGACIÓN -->
      <!-- PIE DE PAGINA -->
      <?php
      include "plantillas/sistema/pie.inc.php";
      ?>
      <!-- FIN PIE DE PAGINA -->
        <!-- SECCION CENTRAL -->
      <div ui-view class="app-body" id="view">

        <div class="padding">
          <div class="container perfil">
            <div class"row">
            <div class="col-md-4">
              <?php
                if(file_exists(DIRECTORIO_RAIZ."/subidas/".$usuario->obtener_id())){
                  ?>
                  <img src="<?=SERVIDOR.'/subidas/'.$usuario->obtener_id()?>" class="img-responsive">
                  <?php
                }
                else{
                ?>
              <img src="imagenes/usuario.jpg" alt="" class"img-responsive">
              <?php
                }
               ?>

              <br>
              <form class="text-center" action="<?=RUTA_PERFIL?>" method="post" enctype="multipart/form-data">
              <label id="label-archivo" for="archivo-subido">Sube una imagen</label>
              <input id="archivo-subido" type="file" name="archivo-subido" class="boton-subir" value="">
              <br>
              <br>
              <input class="form-control" type="submit" name="guardar-imagen" value="Guardar">
              </form>
            </div>
            <div class="col-md-8">
                          <div class="row m-b">
                            <div class="col-xs-4">
                              <small class="text-muted">Cell Phone</small>
                              <div class="_500">1243 0303 0333</div>
                            </div>
                            <div class="col-xs-4">
                              <small class="text-muted">Family Phone</small>
                              <div class="_500">+32(0) 3003 234 543</div>
                            </div>
                          </div>
                          <div class="row m-b">
                            <div class="col-xs-4">
                              <small class="text-muted">Reporter</small>
                              <div class="_500">Coch Jose</div>
                            </div>
                            <div class="col-xs-4">
                              <small class="text-muted">Manager</small>
                              <div class="_500">James Richo</div>
                            </div>
                          </div>
                          <div>
                            <small class="text-muted">Bio</small>
                            <div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi id neque quam. Aliquam sollicitudin venenatis ipsum ac feugiat. Vestibulum ullamcorper sodales nisi nec condimentum. Mauris convallis mauris at pellentesque volutpat. Phasellus at ultricies neque, quis malesuada augue.</div>
                          </div>

            </div>
          </div>

        </div>
      </div>
              <!-- fin SECCION CENTRAL -->
      </div>
    <!-- / -->
    <!-- FIN SECCION CENTRAL -->
    <!-- SELECTOR DE TEMAS -->
    <?php
    include "plantillas/sistema/temas.inc.php";
    ?>
    <!-- FIN SELECTOR DE TEMAS -->
<!-- / -->

<!-- ############ LAYOUT END-->

</div>
<!-- FINAL DEL BODY (Incluye librerias js) -->
<?php
include "plantillas/sistema/cierre.inc.php";
?>


<!-- endbuild -->
</body>
<!-- FIN FINAL DEL BODY (Incluye librerias js) -->
