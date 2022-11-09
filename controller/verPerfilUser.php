<?php

    function mostrarPerfilU(){

        $email = $_SESSION['email'];

        $objetoConsultas = new consultasE();

        $result = $objetoConsultas->verPerfilE($email);

        foreach($result as $f){
            echo ' 
            <ul class="icons-Nav-User">
              <li><ion-icon name="notifications-outline"></ion-icon></li>
            </ul>
            <div class="userProfilePic" >                  
              <img src="../'.$f["foto"].'" alt="User Image" onclick="toggleMenu()">
            </div>
            
            <div class="sub-menu-wrap" id="subMenu">
              <div class="sub-menu">
                <div class="user-info">
                  <img src="../'.$f["foto"].'" alt="">
                  <h3>'.$f["nombres"].' '.$f["apellidos"].'</h3>
                </div>
                <hr>

                
                <a href="#" class="sub-menu-link">                  
                  <p>Notificaciones</p>
                  <span><ion-icon name="notifications-outline"></ion-icon></span>
                </a>
                <a href="miPerfil.php?id_user='.$f['identificacion'].'"" class="sub-menu-link">                  
                  <p>Mi Perfil</p>
                  <span><ion-icon name="person-circle-outline"></ion-icon></span>
                </a>
              </div>
            </div>                        
            <script>
              let subMenu = document.getElementById("subMenu");

              function toggleMenu(){
                subMenu.classList.toggle("open-menu");
              }
            </script>
            
            ';
        }
    }

    //Pediente funcion para que muestre los agendamientos que hacen los usuarios
    function agendamientosAsignados(){
      $idUsuario = $_SESSION['id_user'];
      $objetoConsultas = new consultasE();
      $result = $objetoConsultas->mostrarAgendamientosE($idUsuario);
      
      if(!$result){
        echo '';
      }else{
          echo '
          <!-- Content Header (Page header) -->
          <div class="content-header">
            <div class="container-fluid">
              <div class="row mb-2">
                <div class="col-sm-6">
                <div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-check"></i> Alerta!</h5>
                  Tiene nuevos servicios agendados, porfavor atenderlos!
                </div>
                </div><!-- /.col -->
                <div class="col-sm-6">
                  <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Dashboard v1</li>
                  </ol>
                </div><!-- /.col -->
              </div><!-- /.row -->
            </div><!-- /.container-fluid -->
          </div>
          <!-- /.content-header -->          
          <!-- Main content -->
          
        
              <!-- Small boxes (Stat box) -->
          <section class="content">
            <div class="container-fluid">
              <div class="row">';
              foreach($result as $f){                 
              echo '
                <div class="col-lg-3 col-6">
                  <!-- small box -->
                  <div class="small-box bg-success">
                    <div class="inner">
                      <h3>'.$f["localidad"].','.$f["ciudad"].'</h3>
      
                      <p>'.$f["nom_usr"].' '.$f["ape_usr"].'</p>
                      <p>'.$f["fecha_agn"].'</p>
                    </div>
                    <div class="icon">
                      <i class="ion ion-stats-bars"></i>
                    </div>
                    <a href="#" class="small-box-footer">Ver servicio<i class="fas fa-arrow-circle-right"></i></a>
                  </div>
                </div>';
              }
              echo'
                <!-- ./col -->
              </div>
              <!-- /.row -->
            </div>
          </section>
          <!-- /.content -->
          
          
          ';
        
      }

    }

    function profileUsuario(){

      if(isset($_GET['id_user'])){
          $objetoConsultas = new ConsultasAdmin();
          $id_user= $_GET['id_user'];
          $resultado = $objetoConsultas->mostrarUser($id_user);

          foreach($resultado as $f){
              echo '
              <div class="cardProfile">
              <a href="#Edit">Editar Perfil</a>            
              <div class="photoProfile">
                <img src="../'.$f["foto"].'" alt="profileUser">
              </div>
              <div class="infoProfile">
                <div class="row">
                  <div class="col-md-12">
                    <h3>'.$f["nombres"].' '.$f["apellidos"].'</h3>
                  </div>
                  <div class="col-md-12">
                    <p>'.$f["email"].'</p>
                  </div>
                  <div class="col-md-6">
                    <span><ion-icon name="call-outline"></ion-icon>'.$f["telefono"].'</span>
                  </div>
                  <div class="col-md-6">
                    <span><ion-icon name="balloon-outline"></ion-icon>'.$f["fecha_nacimiento"].'</span>
                  </div>
                  <div class="col-md-6">
                    <span><ion-icon name="location-outline"></ion-icon>'.$f["ciudad"].','.$f["localidad"].'</span>
                  </div>
                  <div class="col-md-6">
                    <span><ion-icon name="list-outline"></ion-icon>'.$f["direccion"].'</span>
                  </div>
                </div>
              </div>
            </div>       
              
              ';
          }


      }
  }
?>