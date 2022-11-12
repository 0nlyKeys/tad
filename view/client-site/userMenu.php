<?php
require_once("../../model/conexion.php");
require_once("../../model/validarSesion.php");
require_once("../../model/consultasE.php");
require_once("../../controller/seguridadUser.php");
require_once("../../controller/verPerfilUser.php");
?>
<div class="contentNav" >
  <div class="navUserTad">
      <ul>
        <li class="listNavUser active"  >
          <a href="#home">
            <span class="iconNavUser"><ion-icon name="home-outline"></ion-icon></span>
            <span class="textNavUser">Home</span>
          </a>
        </li>
        <li class="listNavUser">
          <a href="#features">
            <span class="iconNavUser"><ion-icon name="people-outline"></ion-icon></span>
            <span class="textNavUser">Técnicos</span>
          </a>
        </li>
        <li class="listNavUser">
          <a href="#recent-blog-posts">
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

<script src="../../js/maintad.js"></script>


  