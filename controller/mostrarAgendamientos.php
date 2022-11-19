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
                <th>Fecha Agendada</th>
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
                <td>'.$f['fecha_agendada'].'</td>
                <td>'.$f['estado_servicio'].'</td>
                <td><a href="gesAgendamientos.php?id_agendamiento='.$f['id_agendamiento'].'" class="btn btn-primary" ><i class="bi bi-zoom-in"></i></a></td>
                </tr>
                ';

                 }

                 echo '                 
                </tbody>
                <tfoot>
                <tr>
                <th>Nro Agendamiento</th>
                <th>Fecha Agendada</th>
                <th>estado</th>
                <th></th>
                </tr>
                </tfoot>
                </table>
                 
                 ';

        }
    }

    function cargarAgendamiento(){

        if(isset($_GET['id_agendamiento'])){
            $objetoConsultas = new ConsultasAdmin();
            $id_agnd= $_GET['id_agendamiento'];
            $resultado = $objetoConsultas->mostrarAgendamiento($id_agnd);
            $data = $objetoConsultas->obtenerTecnico();
            
            foreach($resultado as $f){
                echo '
              <form action="../../controller/asigTecnicoAgnd.php" method="POST">
                <div class="card">
                  <div class="card-header">
                    <h3 class="card-title">Comprobante Agendamiento</h3>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body">
                    <div class="row">
                    <div class="form-group col-md-12">
                      <input type="hidden" class="form-control" id="idAgnd" name="idAgnd" value="'.$f["id_agendamiento"].'" required>
                    </div>

                    <div class="form-group col-md-6">
                      <label for="nombres">Nombres:</label>
                      <input type="text" class="form-control" id="nombres" name="nombres" value="'.$f["nombres"].'" required>
                    </div>

                    <div class="form-group col-md-6">
                      <label for="apellidos">Apellidos:</label>
                      <input type="text" class="form-control" id="apellidos" name="apellidos" value="'.$f["apellidos"].'" required>
                    </div>

                    <div class="form-group col-md-6">
                      <label for="email">Email:</label>
                      <input type="text" class="form-control" id="email" name="email" value="'.$f["email"].'" required>
                    </div>

                    <div class="form-group col-md-6">
                      <label for="telefono">Número de Contacto:</label>
                      <input type="number" class="form-control" id="telefono" name="telefono" value="'.$f["numero_contacto"].'" required>
                    </div>
              
                    <div class="form-group col-md-6">
                      <label for="ciudad">Ciudad:</label>
                      <select class="form-control" required name="ciudad"  >
                      <option value="'.$f["id_ciudad"].'">'.$f["ciudad"].'</option>
                      </select>
                    </div>

                    <div class="form-group col-md-6">
                      <label for="localidad">Localidad:</label>
                      <select class="form-control" required name="localidad" >
                        <option value="'.$f["id_localidad"].'">'.$f["localidad"].'</option>
                      </select>
                    </div>

                    <div class="form-group col-md-6">
                      <label for="fechaAgn">Fecha Agendada: </label>
                      <div class="input-group date" id="fechaAgn" data-target-input="nearest">
                        <input type="text" class="form-control datetimepicker-input" data-target="#fechaAgn" value="'.$f["fecha_agendada"].'" name="fechaAgn" onkeydown="return false"/>
                        <div class="input-group-append" data-target="#fechaAgn" data-toggle="datetimepicker">
                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div>
                      </div>
                    </div>

                    <div class="form-group col-md-6">
                      <label for="nombre">Dirección:</label>
                      <input type="text" class="form-control" id="direccion" name="direccion" value="'.$f["direccion_servicio"].'" required>
                    </div>

                    <div class="form-group col-md-6">
                      <label for="descripcion">Descripción:</label>
                      <textarea class="form-control" rows="6" name="descripcion" value="'.$f["descripcion"].'"></textarea>
                    </div>
                    <div class="form-group col-md-6">
                      <div class="row">
                        <div class="form-group col-md-12">
                          <label for="asigTec">Técnico:</label>
                          <select class="form-control" required name="asigTec" > 
                            <option value="'.$f["id_user"].'">'.$f["nombre_Tec"].' '.$f["apellido_Tec"].'</option>
                            ';
                            foreach($data as $t){
                            echo '<option value="'.$t["id_user"].'">'.$t["nombres"].' '.$t["apellidos"].'</option>';  
                            }
                            echo ' 
                          </select>
                        </div>
                      </div>
                    </div>
                  </div>
                    <!-- /.card-body -->
                  </div> 
                  <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Agendar</button>
                  </div>
                </div>
              </form>
                
                
                ';
            }


        }
    }

?>