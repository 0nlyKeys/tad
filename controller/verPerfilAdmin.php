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

    function profileAdmin(){

      if(isset($_GET['id_user'])){
          $objetoConsultas = new ConsultasAdmin();
          $id_user= $_GET['id_user'];
          $resultado = $objetoConsultas->mostrarUser($id_user);

          foreach($resultado as $f){
              echo '
              <div class="row">  
              <div class="col-md-8">
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
                        <button type="submit" class="btn btn-danger">Submit</button>
                      </div>
                    </div>
                </form>                         
              </div>               
              <div class="col-md-4">
                <form action="../../controller/editarPerfil.php" method="POST" enctype="multipart/form-data">
                  <div class="form-group row">
                      <label for="inputName" class="col-sm-2 col-form-label">Name</label>
                      <div class="col-sm-10">
                        <input type="email" class="form-control" id="inputName" placeholder="Name">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                      <div class="col-sm-10">
                        <input type="email" class="form-control" id="inputEmail" placeholder="Email">
                      </div>
                    </div>
                  </div>                        
                </form>
              </div>
            </div>
              
              
              ';
          }


      }
  }
?>