<?php

    function mostrarPerfil(){

        $email = $_SESSION['email'];

        $objetoConsultas = new consultasTecnico();

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
                   <img src="../'.$f["foto"].'" class="img-circle elevation-2" alt="User Image">
               </div>
              <div class="info">
                <a href="#" class="d-block">'.$f["nombres"].' '.$f["apellidos"].'</a>
                <a href="myProfile.php?id_user='.$f['identificacion'].'"" class="d-block">Ver Perfil</a>
              </div>
            </div>            
            
            ';
        }
    }

    function agendamientosAsignados(){
      $idTecnico = $_SESSION['id_user'];
      $objetoConsultas = new consultasTecnico();
      $result = $objetoConsultas->mostrarAgendamientos($idTecnico);
      
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
                    <a href="verServicio.php?id_agn='.$f["id_agendamiento"].'" class="small-box-footer">Ver servicio<i class="fas fa-arrow-circle-right"></i></a>
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

    function profileTecnico(){

      if(isset($_GET['id_user'])){
          $objetoConsultas = new consultasTecnico();
          $id_user= $_GET['id_user'];
          $resultado = $objetoConsultas->mostrarTecnico($id_user);
          $ciudades = $objetoConsultas->mostrarCiudades();
          $localidades = $objetoConsultas->mostrarLocalidades();

          foreach($resultado as $f){
            echo '
            <div id="cardProfileUser" class="cardProfile">            
              <div class="photoProfileTec">
                <img src="../'.$f["foto"].'" alt="profileUser">
              </div>
                <div class="infoProfile">
                  <div class="row">
                    <div class="col-md-12">
                      <a id="btn-photo" class="btn-photo" href="#Edit" data-bs-toggle="modal" data-bs-target="#changePhoto"><i class="fa-regular fa-pen-to-square"></i></a>
                    </div>
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
                    <div class="col-md-12">
                      <span><ion-icon name="location-outline"></ion-icon>'.$f["nombre_ciu"].','.$f["nombre_loc"].'</span>
                    </div>
                    <div class="col-md-6 btn-cardfoot">                            
                    <a id="btn-edit" class="btn-edit" href="#Edit" onclick="showEditprofile()" >Editar Perfil</a>
                    <a id="btn-history" href="#Edit">Historial</a>
                    </div>
                  </div>
              </div>
            </div> 
            <div id="editProfileUser" class="cardEdit">
              <div class="headerEditProfile">
                <h3>Editar Perfil</h3>
                <span id="btn-close" class="closeCardEdit" onclick="closeEdit()"><ion-icon name="close-outline"></ion-icon></span>
              </div>
                <form action="../../controller/editProfileTec.php" method="POST">
                <div class="card-body">
                  <div class="row formEditProfileUser">
                    <input type="hidden" value="'.$f["identificacion"].'" name="identificacion">
                    <div class="col-md-6">
                      <span>Nombres:</span>
                      <input type="text" value="'.$f["nombres"].'" name="nombres">
                    </div>
                    <div class="col-md-6">
                      <span>Apellidos:</span>
                      <input type="text" value="'.$f["apellidos"].'" name="apellidos" >
                    </div>
                    <div class="col-md-6">
                      <span>Ciudad:</span>
                      <select class="" required name="ciudad">                      
                        <option value="'.$f["ciudad"].'">'.$f["nombre_ciu"].'</option>';
                          foreach($ciudades as $c){
                              echo'                    
                              <option value="'.$c["idCiudad"].'">'.$c["ciudad"].'</option>';
                          }
                          echo'
                        </select>
                    </div>
                    <div class="col-md-6">
                      <span>Localidad:</span>
                      <select class="" required name="localidad">
                        <option value="'.$f["localidad"].'">'.$f["nombre_loc"].'</option>';
                          foreach($localidades as $l){
                              echo'                    
                              <option value="'.$l["idLocalidad"].'">'.$l["localidad"].'</option>';
                          }
                          echo'
                      </select>
                    </div>
                    <div class="col-md-6">
                      <span>Celular:</span>
                      <input type="text" value="'.$f["telefono"].'" name="telefono" >
                    </div>
                    <div class="col-md-6">
                      <span>Dirección:</span>
                      <input type="text" value="'.$f["direccion"].'" name="direccion">
                    </div>
                    <div class="col-md-12">
                      <span class="fchspn">Fecha Nacimiento:</span>
                      <input type="date" value="'.$f["fecha_nacimiento"].'" name="fechaNac">
                    </div>
                    <div class="col-md-12">
                      <span>Correo:</span>
                      <input type="email" value="'.$f["email"].'" name="email">
                    </div>
                    <div class="col-md-12">
                      <a href="#ChangePassword" data-bs-toggle="modal" data-bs-target="#exampleModal" >Cambiar Contraseña</a>
                    </div>
                    <div class="col-md-12">
                      <button type="submit">Actualizar</button>
                    </div>
                  </div>
                </div>
                </form>
            </div>  
            <div id="historyProfileUser" class="cardEdit">
              <div class="headerEditProfile">
                <h3>Mis Solicitudes</h3>
                <span id="btn-close2" class="closeCardEdit" onclick="closeEdit()" ><ion-icon name="close-outline"></ion-icon></span>
              </div>
              

            </div> 
            <div class="modal fade" id="changePhoto" tabindex="-1" aria-labelledby="changePhotoLabel" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                  <div class="modal-header">
                    <h1 class="modal-title fs-5" id="changePhotoLabel">Cambiar Foto</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <form action="../../controller/cambiarFotoTec.php" method="POST" enctype="multipart/form-data">
                    <div class="modal-body">
                      <img src="../'.$f["foto"].'" class="img-fluid" id="imagePreview" alt="photoProfile">
                      <input type="file" accept=".png, .jpg, .jpeg, .gif" class="form-control" onchange="previewPhoto()" name="foto" required>
                    </div>
                    <div class="btn-change-photo">
                      <input type="submit" value="Guardar"></input>
                    </div>
                  </form>
                </div>
              </div>
            </div>
      ';
          }
      }else{
          echo '<script> location.href="home"</script>';
      }
    }
?>