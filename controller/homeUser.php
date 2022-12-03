<?php 
    /**Este archivo muestra todo el home del usuario dependiendo si tiene o no agendamientos, además
     * muestra tecnicos segun la zona del user si no, enseña 3 tecnicos de la ciudad donde reside
     * @Daniel Rodriguez - 2022
     */
    function userAgnShow(){
        $id_user = $_SESSION['id'];
        $objetoConsultas = new consultasE();
        $result = $objetoConsultas->mostrarAgendamientosE($id_user);
        $dataProfile = $objetoConsultas->dataProfile($id_user);
        
       
        if($result){
             
            foreach ($dataProfile as $f){
                echo'
                    <h1 data-aos="fade-up">¡Hola!, '.$f["nombres"].' :)</h1>
                    <h2 data-aos="fade-up" data-aos-delay="400">Agendamientos recientes</h2>
                ';
            }
                echo '
                <div data-aos="fade-up" data-aos-delay="600"> 
            ';
            $i = 0;
             foreach ($result as $a){
                if(++$i > 3) break;
                echo'
                    <div class="inProcessAgn">
                    <a href="showAgnUser.php?agndm='.$a["id_agendamiento"].'" class="card-agnd-process '.$a["estado_servicio"].'">
                        <span>Agendamiento # '.$a["id_agendamiento"].' </span>
                        <i class="bi bi-arrow-right"></i>
                    </a>
                    <div class="stateAgn">
                        '.$a["estado_servicio"].'
                    </div>
                    </div>
            ';
            }
            echo'    
                </div>';
        }else{
            foreach ($dataProfile as $f){
                echo '
                <h1 data-aos="fade-up">¡Hola!, '.$f["nombres"].' :)</h1>
                <h2 data-aos="fade-up" data-aos-delay="400"> ¿Necesitas un Técnico?</h2>
                <div data-aos="fade-up" data-aos-delay="600">
                </div>
                ';
            }
        }

        


    }

    function userformAgn(){
        $objetoConsultas = new consultasE();
        $ciudades = $objetoConsultas->mostrarCiudades();
        $localidades = $objetoConsultas->mostrarLocalidades();

        echo '
                <form id="sendAgnTecForm" action="../../controller/agendarTecnico" method="POST">
                  <div class="row">
                    <div class="col-md-6">
                      <span for="nombres">Nombres</span>
                      <input type="text" class="" id="nombres" name="nombres" required>
                    </div>

                    <div class="col-md-6">
                      <span for="apellidos">Apellidos</span>
                      <input type="text" class="" id="apellidos" name="apellidos" required>
                    </div>

                    <div class="col-md-6">
                      <span for="email">Email</span>
                      <input type="text" class="" id="email" name="email" required>
                    </div>

                    <div class="col-md-6">
                      <span for="telefono">Número de Contacto</span>
                      <input type="number" class="" id="telefono" name="telefono" required>
                    </div>

                    <div class="col-md-6">
                      <span for="ciudad">Ciudad</span>
                      <select class="" required name="ciudad">                      
                      <option>Seleccione la Ciudad</option>
                    ';
                    foreach($ciudades as $c){
                        echo'                    
                        <option value="'.$c["idCiudad"].'">'.$c["ciudad"].'</option>';
                    }
                    echo'
                      </select>
                    </div>

                    <div class="col-md-6">
                      <span for="localidad">Localidad</span>
                      <select class="" required name="localidad">
                        <option>Seleccione la Localidad</option>';
                    foreach($localidades as $l){
                        echo'                    
                        <option value="'.$l["idLocalidad"].'">'.$l["localidad"].'</option>';
                    }
                    echo'
                      </select>
                    </div>

                    <div class="col-md-6">
                      <span for="fechaAgn">Elegir fecha </span>
                      <input type="datetime-local" name="fechaAgn">
                    </div>

                    <div class="col-md-6">
                      <span for="direccion">Dirección</span>
                      <input type="text" class="" id="direccion" name="direccion" required>
                    </div>

                    <div class="col-md-12">
                      <span for="descripcion">Descripción</span>
                      <textarea class="" rows="10" name="descripcion" placeholder="Describa su solicitud..."></textarea>
                    </div>
                  </div>   
                  <div class="btn-form-agn">                      
                    <button type="submit" class="btnSendAgn">Solicitar</button>
                  </div>               
                </form>
        
        ';

    }

    function userTecnicosZone(){
        $localidad = $_SESSION['localidad'];
        $objetoConsultas = new consultasE();
        $tecnicos = $objetoConsultas->showTecnicos(); 
        $tecbyzona = $objetoConsultas->showTecByZone($localidad);        

        if(!$tecbyzona){
            echo'
                    <header class="section-header">
                    <p>TECNICOS DISPONIBLES</p>
                    <h2>En Bogotá</h2>
                    </header>
                    <div class="row">
            ';
            foreach($tecnicos as $t){            
                echo '
                        <div class="col-lg-4">
                            <div class="post-box">
                            <div class="post-img"><img src="assets/img/blog/blog-1.jpg" class="img-fluid" alt=""></div>
                            <span class="post-date">'.$t["nombres"].' '.$t["apellidos"].'</span>
                            <h3 class="post-title">'.$t["nivel_educativo"].'</h3>
                            <a href="agnTecnicoLocation.php?tecnico='.$t["id_user"].'" class="readmore stretched-link mt-auto"><span>Contactar</span><i class="bi bi-arrow-right"></i></a>
                            </div>
                        </div>     
                ';
            }
            echo'
                    </div>   ';
        }else{
            echo'
            <header class="section-header">
            <p>TECNICOS DISPONIBLES</p>
            <h2>En tu zona</h2>
            </header>
            <div class="row">
                ';
            foreach($tecbyzona as $z){            
                echo '
                        <div class="col-lg-4">
                            <div class="post-box">
                            <div class="post-img"><img src="assets/img/blog/blog-1.jpg" class="img-fluid" alt=""></div>
                            <span class="post-date">'.$z["nombres"].' '.$z["apellidos"].'</span>
                            <h3 class="post-title">'.$z["nivel_educativo"].'</h3>
                            <a href="agnTecnicoLocation.php?tecnico='.$z["id_user"].'" class="readmore stretched-link mt-auto"><span>Contactar</span><i class="bi bi-arrow-right"></i></a>
                            </div>
                        </div>     
                ';
            }
            echo'
                    </div>   ';
                }

    }
?>