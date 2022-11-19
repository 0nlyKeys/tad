<?php
require_once("../../model/conexion.php");
require_once("../../model/validarSesion.php");
require_once("../../model/consultasTecnico.php");
require_once("../../controller/seguridadTecnico.php");
require_once("../../controller/verPerfilTecnico.php");
?>
<aside class="main-sidebar sidebar-dark-primary elevation-4 bg-menu-tecnico">
<!-- Brand Logo -->

<?php
  mostrarPerfil();
?>

  <!-- SidebarSearch Form
  <div class="form-inline">
    <div class="input-group" data-widget="sidebar-search">
      <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
      <div class="input-group-append">
        <button class="btn btn-sidebar">
          <i class="fas fa-search fa-fw"></i>
        </button>
      </div>
    </div>
  </div> -->

  <!-- Sidebar Menu -->
  <nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
      <!-- Clientes crud -->
      <li class="nav-item">
        <a href="#" class="nav-link ">
          <i class="nav-icon fas fa-users"></i>
          
          <p>
            Servicios
            <i class="right fas fa-angle-left"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="#" class="nav-link ">
              <i class="far fa-edit nav-icon"></i>
              <p>Mis servicios</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="far fa-eye nav-icon"></i>
              <p>Reportes</p>
            </a>
          </li>              
        </ul>
      </li>

      <!-- Cerrar Sesion -->
      <li class="nav-item">
        <a href="#" class="nav-link ">
          <i class="nav-icon fas fa-cog fa-pulse"></i>         
          <p>
            Opciones
            <i class="right fas fa-angle-left"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="../../controller/cerrarSesion.php" class="nav-link">
              <i class="fas fa-sign-out-alt nav-icon"></i>
              <p>Cerrar Sesión</p>
            </a>
          </li>              
        </ul>
      </li>
    </ul>
  </nav>
  <!-- /.sidebar-menu -->
</div>
<!-- /.sidebar -->
</aside>
