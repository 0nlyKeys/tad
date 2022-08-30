<aside class="main-sidebar sidebar-dark-primary elevation-4">
<!-- Brand Logo -->
<a href="homeAdmin.php" class="brand-link">
  <img src="../dashboard-base/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
  <span class="brand-text font-weight-light">Administrador |Panel</span>
</a>

<!-- Sidebar -->
<div class="sidebar">
  <!-- Sidebar user panel (optional) -->
  <div class="user-panel mt-3 pb-3 mb-3 d-flex">
    <div class="image">
      <img src="../dashboard-base/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
    </div>
    <div class="info">
      <a href="#" class="d-block">Alexander Pierce</a>
    </div>
  </div>

  <!-- SidebarSearch Form -->
  <div class="form-inline">
    <div class="input-group" data-widget="sidebar-search">
      <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
      <div class="input-group-append">
        <button class="btn btn-sidebar">
          <i class="fas fa-search fa-fw"></i>
        </button>
      </div>
    </div>
  </div>

  <!-- Sidebar Menu -->
  <nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
      <!-- Clientes crud -->
      <li class="nav-item">
        <a href="#" class="nav-link ">
          <i class="nav-icon fas fa-users"></i>
          
          <p>
            Clientes
            <i class="right fas fa-angle-left"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="registrarUsers.php" class="nav-link ">
              <i class="far fa-edit nav-icon"></i>
              <p>Registrar</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="verUsers.php" class="nav-link">
              <i class="far fa-eye nav-icon"></i>
              <p>Ver</p>
            </a>
          </li>              
        </ul>
      </li>

      <!-- Tecnicos crud -->
      <li class="nav-item">
        <a href="#" class="nav-link ">
          <i class="nav-icon fas fa-users-cog"></i>
          <p>
          <i class="right fas fa-angle-left"></i>
            Técnicos
          </p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="registrarTecnico.php" class="nav-link ">
              <i class="far fa-circle nav-icon"></i>
              <p>Registrar</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="verTecnico.php" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Ver</p>
            </a>
          </li>              
        </ul>
      </li>
      
      <!-- Gestionar -->
      <li class="nav-item">
        <a href="#" class="nav-link">
          <i class="nav-icon fas fa-copy"></i>
          <p>
            Gestionar
            <i class="fas fa-angle-left right"></i>
            <span class="badge badge-info right">4</span>
          </p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="pages/layout/top-nav.html" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Gestionar Clientes</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="pages/layout/top-nav-sidebar.html" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Gestion Agendamientos</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="pages/layout/boxed.html" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Gestionar Inventarios</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="pages/layout/fixed-sidebar.html" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Reportes</p>
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