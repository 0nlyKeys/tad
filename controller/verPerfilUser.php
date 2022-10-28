<?php

    function mostrarPerfilU(){

        $email = $_SESSION['email'];

        $objetoConsultas = new consultasE();

        $result = $objetoConsultas->verPerfilE($email);

        foreach($result as $f){
            echo '
            <img src="../'.$f["foto"].'" class="userProfilePic" alt="User Image" onclick="toggleMenu()">
            
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
                <a href="#" class="sub-menu-link">                  
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
                <form action="../../controller/editProfile.php" method="POST">
                    <div class="form-group row">
                      <label for="inputName" class="col-sm-2 col-form-label">Identificación</label>
                      <div class="col-sm-5">
                        <input type="number" class="form-control" id="inputName" name="identificacion" value="'.$f["identificacion"].'" readonly>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="inputName" class="col-sm-2 col-form-label">Nombres</label>
                      <div class="col-sm-5">
                        <input type="text" class="form-control" id="inputName" name="nombres" value="'.$f["nombres"].'">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="inputEmail" class="col-sm-2 col-form-label">Apellidos</label>
                      <div class="col-sm-5">
                        <input type="text" class="form-control" id="inputEmail" name="apellidos" value="'.$f["apellidos"].'" >
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="inputName2" class="col-sm-2 col-form-label">Email</label>
                      <div class="col-sm-5">
                        <input type="email" class="form-control" id="inputName2" name="email" value="'.$f["email"].'">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="inputName2" class="col-sm-2 col-form-label">Fecha Nacimiento</label> 
                      <div class="col-sm-5">                             
                        <input type="date" class="form-control"  name="fechaNac" value="'.$f["fecha_nacimiento"].'" />
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="inputName2" class="col-sm-2 col-form-label">Teléfono</label>
                      <div class="col-sm-5">
                        <input type="number" class="form-control" id="inputName2" name="telefono" value="'.$f["telefono"].'">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="inputName2" class="col-sm-2 col-form-label">Ciudad</label>
                      <div class="col-sm-5">
                        <select class="form-control" required name="ciudad" value="'.$f["ciudad"].'">
                          <option value="'.$f["ciudad"].'">'.$f["ciudad"].'</option>
                          <option value="1">Bogotá</option>
                        </select>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="inputName2" class="col-sm-2 col-form-label">Localidad</label>
                      <div class="col-sm-5">
                        <select class="form-control" required name="localidad" value="'.$f["localidad"].'">
                          <option value="'.$f["localidad"].'">'.$f["localidad"].'</option>
                          <option value="1">Kennedy</option>
                          <option value="2">Usme</option>
                          <option value="3">Bosa</option>
                        </select>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="inputName2" class="col-sm-2 col-form-label">Direccion</label>
                      <div class="col-sm-5">
                        <input type="text" class="form-control" id="inputName2" name="direccion" value="'.$f["direccion"].'">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="inputName2" class="col-sm-2 col-form-label">Código Postal</label>
                      <div class="col-sm-5">
                        <input type="text" class="form-control" id="inputName2" name="code_postal" value="'.$f["codigo_postal"].'">
                      </div>
                    </div>
                    <div class="form-group row">
                      <div class="offset-sm-2 col-sm-10">
                        <div class="checkbox">
                          <label>
                            <input type="checkbox"> I agree to the <a href="#">terms and conditions</a>
                          </label>
                        </div>
                      </div>
                    </div>
                    <div class="form-group row">
                      <div class="offset-sm-2 col-sm-10">
                        <button type="submit" class="btn btn-danger">Guardar</button>
                      </div>
                    </div>
                </form>             
              
              ';
          }


      }
  }
?>