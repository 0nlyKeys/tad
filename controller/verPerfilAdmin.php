<?php 
    function mostrarPerfil(){

        $email = $_SESSION['email'];

        $objetoConsultas = new consultasAdmin();

        $result = $objetoConsultas->verPerfil($email);

        foreach($result as $f){
            echo '
            <div class="brand-link">
              <img src="../dashboard-base/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
              <span class="brand-text font-weight-light">'.$f["rol"].' | Panel</span>
            </div>

            <!-- Sidebar -->
            <div class="sidebar">
            <!-- Sidebar user panel (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
              <div class="image">
                <img src="../dashboard-base/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
              </div>
              <div class="info">
                <a href="#" class="d-block">'.$f["nombres"].' '.$f["apellidos"].'</a>
                <a href="#" class="d-block">Ver Perfil</a>
              </div>
            </div>            
            
            ';
        }
    }
?>