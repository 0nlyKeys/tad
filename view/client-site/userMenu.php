<?php
require_once("../../model/conexion.php");
require_once("../../model/validarSesion.php");
require_once("../../model/consultasE.php");
require_once("../../controller/seguridadUser.php");
require_once("../../controller/verPerfilUser.php");
?>
<div class="contentNav" >
  <div class="navUserTad" data-aos="fade-down" data-aos-duration="1000">
      <ul>
        <li class="listNavUser active"  >
          <a href="homeUser">
            <span class="iconNavUser"><ion-icon name="home-outline"></ion-icon></span>
            <span class="textNavUser">Home</span>
          </a>
        </li>
        <li class="listNavUser ">
          <a href="#">
            <span class="iconNavUser"><ion-icon name="chatbox-ellipses-outline"></ion-icon></ion-icon></span>
            <span class="textNavUser">Chat</span>
          </a>
        </li>
        <li class="listNavUser">
          <a href="#Agendar" data-bs-toggle="modal" data-bs-target="#agendarModal">
            <span class="iconNavUser"><ion-icon name="calendar-outline"></ion-icon></span>
            <span class="textNavUser">Agendar</span>
          </a>
        </li> 
        <li class="listNavUser">
          <a href="#">
            <span class="iconNavUser"><ion-icon name="archive-outline"></ion-icon></span>
            <span class="textNavUser">Historial</span>
          </a>
        </li>
        <li class="listNavUser">
          <a href="../../controller/cerrarSesion.php">
            <span class="iconNavUser"><ion-icon name="exit-outline"></ion-icon></span>
            <span class="textNavUser">Salir</span>
          </a>
        </li>
        <div class="indicatorNavUser"></div>
      </ul>
    </div>
  </div>

<div class="modal fade" id="agendarModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="agendarModalLabel">Solicitar Técnico</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>      
      <form action="../../controller/agendarTecnico.php" method="POST">
        <div class="modal-body">
                  <div class="row">
                    <div class="form-group col-md-6">
                      <label for="nombres">Nombres:</label>
                      <input type="text" class="form-control" id="nombres" name="nombres"  required>
                    </div>

                    <div class="form-group col-md-6">
                      <label for="apellidos">Apellidos:</label>
                      <input type="text" class="form-control" id="apellidos" name="apellidos"  required>
                    </div>

                    <div class="form-group col-md-6">
                      <label for="email">Email:</label>
                      <input type="text" class="form-control" id="email" name="email"  required>
                    </div>

                    <div class="form-group col-md-6">
                      <label for="telefono">Número de Contacto:</label>
                      <input type="number" class="form-control" id="telefono" name="telefono" required>
                    </div>

                    <div class="form-group col-md-6">
                      <label for="ciudad">Ciudad:</label>
                      <select class="form-control" required name="ciudad" >
                        <option>Seleccione la Ciudad</option>
                        <option value="1">Bogotá</option>
                      </select>
                    </div>

                    <div class="form-group col-md-6">
                      <label for="localidad">Localidad:</label>
                      <select class="form-control" required name="localidad" >
                        <option>Seleccione la Localidad</option>
                        <option value="1">Kennedy</option>
                        <option value="2">Usme</option>
                        <option value="3">Bosa</option>
                      </select>
                    </div>

                    <div class="form-group col-md-6">
                      <label for="fechaAgn">Elegir fecha: </label>
                      <div class="input-group date" id="fechaAgn" data-target-input="nearest">
                        <input type="text" class="form-control datetimepicker-input" data-target="#fechaAgn" name="fechaAgn" onkeydown="return false"/>
                        <div class="input-group-append" data-target="#fechaAgn" data-toggle="datetimepicker">
                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div>
                      </div>
                    </div>

                    <div class="form-group col-md-6">
                      <label for="nombre">Dirección:</label>
                      <input type="text" class="form-control" id="direccion" name="direccion"  required>
                    </div>

                    <div class="form-group col-md-3">
                    </div>
                    <div class="form-group col-md-6">
                      <label for="descripcion">Descripción:</label>
                      <textarea class="form-control" rows="6" name="descripcion" placeholder="Describa su solicitud..."></textarea>
                    </div>
                  </div>
              </div>            
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Solicitar</button>
      </div>
            </form>
    </div>
  </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
<!-- Bootstrap 4 -->
<script src="../dashboard-base/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="../dashboard-base/plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="../dashboard-base/plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="../dashboard-base/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="../dashboard-base/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="../dashboard-base/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="../dashboard-base/plugins/moment/moment.min.js"></script>
<script src="../dashboard-base/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="../dashboard-base/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="../dashboard-base/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="../dashboard-base/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>

<script>
  $(document).ready(function(){
    $('li').on('click', function(){
      $(this).siblings().removeClass('active');
      $(this).addClass('active');
    })
  });

  $(function () {
    $('#fechaAgn').datetimepicker({ 
      format: 'YYYY/MM/DD HH:mm',
      icons: { time: 'far fa-clock' } });
  });
</script>

  <!-- <script>

    
    const list = document.querySelectorAll('ul li a').
    forEach(link => {
      if(link.href.includes(`${activePage}`)){
        link.classList.add('active');
      }
    })
  </script> -->
       
  <!-- <script>
    const list = document.querySelectorAll('.listNavUser');
    function activeLink(){
      list.forEach((item) =>
      item.classList.remove('active'));
      this.classList.add('active');
    }
    list.forEach((item) =>
    item.addEventListener('click',activeLink));
  </script> -->

  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>