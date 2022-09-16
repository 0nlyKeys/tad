<?php
    function cargarAgendamientos(){
        $objetoConsultas = new ConsultasAdmin();
        $result = $objetoConsultas -> mostrarAgendamientos();

        if (!isset($result)){
            echo '<h2>ACTUALMENTE NO EXISTEN AGENDAMIENTOS</h2>';
        }else{

            echo '            
                <table id="tableUsers" class="table table-bordered table-striped">
                <thead>
                <tr>
                <th>Nro Agendamiento</th>
                <th>estado</th>
                <th>Ver</th>
                </tr>
                </thead>
                <tbody>            
            ';
            foreach($result as $f){
                echo '                
                <tr class="'.$f['estado_servicio'].'"> 
                <td>'.$f['id_agendamiento'].'</td>
                <td>'.$f['estado_servicio'].'</td>
                <td><a href="editarTecnico.php?id_tecnico='.$f['id_agendamiento'].'" class="btn btn-primary"><i class="bi bi-zoom-in"></i></a></td>
                </tr>
                ';

                 }

                 echo '                 
                </tbody>
                <tfoot>
                <tr>
                <th>Nro Agendamiento</th>
                <th>estado</th>
                <th></th>
                </tr>
                </tfoot>
                </table>
                 
                 ';

        }
    }

    function cargarAgendamiento(){

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