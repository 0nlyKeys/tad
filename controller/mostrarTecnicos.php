<?php
    function cargarTecnicos(){
        $objetoConsultas = new ConsultasAdmin();
        $result = $objetoConsultas -> mostrarTecnicos();

        if (!isset($result)){
            echo '<h2>ACTUALMENTE NO EXISTEN USUARIOS</h2>';
        }else{

            echo '            
                <table id="tableUsers" class="table table-bordered table-striped">
                <thead>
                <tr>
                <th>Tipo de documento</th>
                <th>Identificacion</th>
                <th>Nombre</th>
                <th>Apellidos</th>
                <th>Email</th>
                <th>Telefono</th>
                <th>rol</th>
                <th>estado</th>
                <th>Ver/Editar</th>
                <th>Eliminar</th>
                </tr>
                </thead>
                <tbody>            
            ';
            foreach($result as $f){
                echo '                
                <tr class="'.$f['estado'].'"> 
                <td>'.$f['tipodoc'].'</td>
                <td>'.$f['identificacion'].'</td>
                <td>'.$f['nombres'].'</td>
                <td>'.$f['apellidos'].'</td>
                <td>'.$f['email'].'</td>
                <td>'.$f['telefono'].'</td>
                <td>'.$f['rol'].'</td>
                <td>'.$f['estado'].'</td>
                <td><a href="editarTecnico.php?id_tecnico='.$f['identificacion'].'" class="btn btn-primary"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                </svg></a></td>
                <td><a href="../../controller/elimTecnicoAdmin.php?id_tecnico='.$f['identificacion'].'" class="btn btn-danger"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                </svg></a></td>
                </tr>
                ';

                 }

                 echo '                 
                </tbody>
                <tfoot>
                <tr>
                <th>Tipo de documento</th>
                <th>Identificacion</th>
                <th>Nombre</th>
                <th>Apellidos</th>
                <th>Email</th>
                <th>Telefono</th>
                <th>rol</th>
                <th>estado</th>
                <th></th>
                <th></th>
                </tr>
                </tfoot>
                </table>
                 
                 ';

        }
    }

    function cargarTecnico(){

        if(isset($_GET['id_tecnico'])){
            $objetoConsultas = new ConsultasAdmin();
            $id_tecnico= $_GET['id_tecnico'];
            $resultado = $objetoConsultas->mostrarTecnico($id_tecnico);

            foreach($resultado as $f){
                echo '
                <form action="../../controller/modTecnicoAdmin.php" method="POST">
                <div class="card-body">

                  <div class="row">
                    <div class="form-group col-md-6">
                      <label for="tipoDoc">Tipo de Documento:</label>
                      <select id="tipoDoc" name="tipoDoc" class="form-control" required>
                          <option value="'.$f["tipodoc"].'">'.$f["tipodoc"].'</option>
                          <option value="C.C">C.C</option>
                          <option value="C.E">C.E</option>
                          <option value="Pasaporte">Pasaporte</option>
                        </select>
                    </div>

                    <div class="form-group col-md-6">
                      <label for="numDoc">Digite Documento:</label>
                      <input type="number" class="form-control" id="numDoc" readonly="readonly" name="identificacion" placeholder="Ej:12758965" value="'.$f["identificacion"].'" required>
                    </div>

                    <div class="form-group col-md-6">
                      <label for="nombre">Nombre:</label>
                      <input type="text" class="form-control" id="nombre" name="nombres" placeholder="Ej:Daniel" value="'.$f["nombres"].'" required>
                    </div>

                    <div class="form-group col-md-6">
                      <label for="nombre">Apellido:</label>
                      <input type="text" class="form-control" id="nombre" name="apellidos" placeholder="Ej:Rodriguez" value="'.$f["apellidos"].'" required>
                    </div>

                    <div class="form-group col-md-6">
                      <label for="nombre">Email:</label>
                      <input type="text" class="form-control" id="nombre" name="email" placeholder="Ej:Daniel@email.com" value="'.$f["email"].'" required>
                    </div>

                    <div class="form-group col-md-6">
                      <label for="telefono">Telefono:</label>
                      <input type="number" class="form-control" id="telefono" name="telefono" placeholder="3133333333" value="'.$f["telefono"].'" required>
                    </div>

                    <div class="form-group col-md-2">
                    </div>

                    <div class="form-group col-md-4">
                      <label for="estado">Estado:</label>
                      <select id="estado" name="estado" class="form-control" required>
                          <option value="'.$f["estado"].'">'.$f["estado"].'</option>
                          <option value="Activo">Activo</option>
                          <option value="Inactivo">Inactivo</option>
                          <option value="Pendiente">Pendiente</option>
                        </select>
                    </div>

                    <div class="form-group col-md-4">
                      <label for="rol">Rol:</label>
                      <select id="rol" name="rol" class="form-control" required>
                          <option value="'.$f["rol"].'">'.$f["rol"].'</option>
                          <option value="Cliente">Cliente</option>
                          <option value="Tecnico">Tecnico</option>
                          <option value="Administrador">Administrador</option>
                        </select>
                    </div>


                  </div>

                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Modificar</button>
                </div>
              </form>
                
                
                ';
            }


        }
    }

?>