<?php 
function showInfoAgn(){
    if(isset($_GET['agndm'])){
        $agndm= $_GET['agndm'];
        $objetoConsultas = new ConsultasE();
        $resultado = $objetoConsultas->mostrarResumeAgendamientos($agndm);

        foreach($resultado as $f){     
            
            if($f['estado_servicio'] == "Pendiente" or $f['estado_servicio'] == "Asignado"){
                echo'
                <div class="agnVisitResume" >
                    <h2 >Tu solicitud</h2>
                    <div class="agnVisitBody">
                        <div class="row">
                        <div class="col-md-6">  
                            <h3><i class="fa-solid fa-user"></i>Nombres</h3>       
                        </div>
                        <div class="col-md-6">  
                            <span>'.$f["nom_usr"].' '.$f["ape_usr"].'</span>       
                        </div>
                        <div class="col-md-6">  
                            <h3><i class="fa-solid fa-calendar-days"></i>Fecha Agendada</h3>        
                        </div>
                        <div class="col-md-6">  
                            <span>'.$f["fecha_agn"].'</span>        
                        </div>
                        <div class="col-md-6">  
                            <h3><i class="fa-duotone fa-at"></i>Email</h3>        
                        </div>
                        <div class="col-md-6">  
                            <span>'.$f["email"].'</span>        
                        </div>
                        <div class="col-md-6">  
                            <h3><i class="fa-solid fa-map-location-dot"></i>Lugar</h3>        
                        </div>
                        <div class="col-md-6">                     
                            <span>'.$f["ciudad"].', '.$f["localidad"].' , '.$f["direccion_servicio"].'</span>      
                        </div>          
                        <div class="col-md-6">  
                            <h3><i class="fa-solid fa-phone"></i>Número Contacto</h3>        
                        </div>
                        <div class="col-md-6">  
                            <span>'.$f["numero_contacto"].'</span>        
                        </div>
                        <div class="col-md-6">  
                            <h3><i class="fa-solid fa-bars"></i>Descripción</h3>        
                        </div>
                        <div class="col-md-6">  
                            <span>'.$f["descripcion"].'</span>        
                        </div>
                        </div>
                    </div>
                </div>
                <a class="cancelServiceResume" href="../../controller/cancelarServicio.php?agndm='.$f["id_agendamiento"].'">Cancelar Servicio</a>
                ';
            }
            if($f['estado_servicio'] == "En-Curso"){
                echo'
                <div class="agnVisitResume" >
                    <h2 >Tu solicitud</h2>
                    <div class="agnVisitBody">
                        <div class="row">
                        <div class="col-md-6">  
                            <h3><i class="fa-solid fa-user"></i>Nombres</h3>       
                        </div>
                        <div class="col-md-6">  
                            <span>'.$f["nom_usr"].' '.$f["ape_usr"].'</span>       
                        </div>
                        <div class="col-md-6">  
                            <h3><i class="fa-solid fa-calendar-days"></i>Fecha Agendada</h3>        
                        </div>
                        <div class="col-md-6">  
                            <span>'.$f["fecha_agn"].'</span>        
                        </div>
                        <div class="col-md-6">  
                            <h3><i class="fa-duotone fa-at"></i>Email</h3>        
                        </div>
                        <div class="col-md-6">  
                            <span>'.$f["email"].'</span>        
                        </div>
                        <div class="col-md-6">  
                            <h3><i class="fa-solid fa-map-location-dot"></i>Lugar</h3>        
                        </div>
                        <div class="col-md-6">                     
                            <span>'.$f["ciudad"].', '.$f["localidad"].' , '.$f["direccion_servicio"].'</span>      
                        </div>          
                        <div class="col-md-6">  
                            <h3><i class="fa-solid fa-phone"></i>Número Contacto</h3>        
                        </div>
                        <div class="col-md-6">  
                            <span>'.$f["numero_contacto"].'</span>        
                        </div>
                        <div class="col-md-6">  
                            <h3><i class="fa-solid fa-bars"></i>Descripción</h3>        
                        </div>
                        <div class="col-md-6">  
                            <span>'.$f["descripcion"].'</span>        
                        </div>
                        </div>
                    </div>
                </div>
                <a class="cancelServiceResume disable" href="showAgnUser.php?agndm='.$f["id_agendamiento"].'" >Su servicio esta en curso...</a>
                ';
            }

            if($f['estado_servicio'] == "Cancelado"){
                echo'
                <div class="agnVisitResume" >
                    <h2 >Tu solicitud</h2>
                    <div class="agnVisitBody">
                        <div class="row">
                        <div class="col-md-6">  
                            <h3><i class="fa-solid fa-user"></i>Nombres</h3>       
                        </div>
                        <div class="col-md-6">  
                            <span>'.$f["nom_usr"].' '.$f["ape_usr"].'</span>       
                        </div>
                        <div class="col-md-6">  
                            <h3><i class="fa-solid fa-calendar-days"></i>Fecha Agendada</h3>        
                        </div>
                        <div class="col-md-6">  
                            <span>'.$f["fecha_agn"].'</span>        
                        </div>
                        <div class="col-md-6">  
                            <h3><i class="fa-duotone fa-at"></i>Email</h3>        
                        </div>
                        <div class="col-md-6">  
                            <span>'.$f["email"].'</span>        
                        </div>
                        <div class="col-md-6">  
                            <h3><i class="fa-solid fa-map-location-dot"></i>Lugar</h3>        
                        </div>
                        <div class="col-md-6">                     
                            <span>'.$f["ciudad"].', '.$f["localidad"].' , '.$f["direccion_servicio"].'</span>      
                        </div>          
                        <div class="col-md-6">  
                            <h3><i class="fa-solid fa-phone"></i>Número Contacto</h3>        
                        </div>
                        <div class="col-md-6">  
                            <span>'.$f["numero_contacto"].'</span>        
                        </div>
                        <div class="col-md-6">  
                            <h3><i class="fa-solid fa-bars"></i>Descripción</h3>        
                        </div>
                        <div class="col-md-6">  
                            <span>'.$f["descripcion"].'</span>        
                        </div>
                        </div>
                    </div>
                </div>
                <a class="newServiceResume" href="homeUser" >Solicitar nuevo servicio</a>
                ';
            }

            if($f['estado_servicio'] == "Finalizado"){
                echo'
                <div class="agnVisitResume" >
                    <h2 >Tu solicitud</h2>
                    <div class="agnVisitBody">
                        <div class="row">
                        <div class="col-md-6">  
                            <h3><i class="fa-solid fa-user"></i>Nombres</h3>       
                        </div>
                        <div class="col-md-6">  
                            <span>'.$f["nom_usr"].' '.$f["ape_usr"].'</span>       
                        </div>
                        <div class="col-md-6">  
                            <h3><i class="fa-solid fa-calendar-days"></i>Fecha Agendada</h3>        
                        </div>
                        <div class="col-md-6">  
                            <span>'.$f["fecha_agn"].'</span>        
                        </div>
                        <div class="col-md-6">  
                            <h3><i class="fa-duotone fa-at"></i>Email</h3>        
                        </div>
                        <div class="col-md-6">  
                            <span>'.$f["email"].'</span>        
                        </div>
                        <div class="col-md-6">  
                            <h3><i class="fa-solid fa-map-location-dot"></i>Lugar</h3>        
                        </div>
                        <div class="col-md-6">                     
                            <span>'.$f["ciudad"].', '.$f["localidad"].' , '.$f["direccion_servicio"].'</span>      
                        </div>          
                        <div class="col-md-6">  
                            <h3><i class="fa-solid fa-phone"></i>Número Contacto</h3>        
                        </div>
                        <div class="col-md-6">  
                            <span>'.$f["numero_contacto"].'</span>        
                        </div>
                        <div class="col-md-6">  
                            <h3><i class="fa-solid fa-bars"></i>Descripción</h3>        
                        </div>
                        <div class="col-md-6">  
                            <span>'.$f["descripcion"].'</span>        
                        </div>
                        </div>
                    </div>
                </div>
                <a class="newServiceResume" href="homeUser" >Solicitar nuevo servicio</a>
                ';
            }
            
        }

    }else{
        echo '<script> location.href="homeUser"</script>';
    }
}

function showTecAgn(){
    $agndm= $_GET['agndm'];
    $objetoConsultas = new ConsultasE();
    $resultado = $objetoConsultas->mostrarResumeAgendamientos($agndm);

    foreach($resultado as $f){

        if($f['estado_servicio'] == "Asignado" or $f['estado_servicio'] == "En-Curso" or $f['estado_servicio'] == "Finalizado"){
            echo'
            <h1 data-aos="zoom-out">TU TÉCNICO</h1>
                    <div id="cardProfileUser" class="cardProfileResume">              
                    <div class="row infoProfileResume">   
                        <div class="col-md-12 photoProfileResume">
                            <img src="../'.$f["foto"].'" alt="profileUser">
                        </div>
                        <div class="col-md-12">
                            <h3>'.$f["nombre_Tec"].' '.$f["apellido_Tec"].'</h3>
                        </div>
                        <div class="col-md-12">
                            <p>'.$f["email_tec"].'</p>
                        </div>
                        <div class="col-md-12">
                        <p><i class="fa-solid fa-phone"></i>'.$f["tel_tec"].'</p>
                        </div>
                        <div class="col-md-12">
                            <span><i class="fa-solid fa-location-dot"></i>'.$f["ciudad"].','.$f["localidad"].'</span>
                        </div>
                        <div class="col-md-12 starRating">
                            <a onclick="showQualify()"><i class="fa-regular fa-star"></i>Calificar</a>
                        </div>
                        <div class="col-md-12" id="starsService">
                            <a href="#" class="calificarServicio">
                            <i class="fa-regular fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            </a>
                            <a href="#" class="calificarServicio">
                            <i class="fa-regular fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            </a>
                            <a href="#" class="calificarServicio">
                            <i class="fa-regular fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            </a>
                            <a href="#" class="calificarServicio">
                            <i class="fa-regular fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            </a>
                            <a href="#" class="calificarServicio">
                            <i class="fa-regular fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            </a>
                        </div>
                    </div>
                    </div>
            ';
        }
        
        if($f['estado_servicio'] == "Pendiente"){
            echo'
            <div class="waitingCardProfile">
                <h1 data-aos="zoom-out">Esperando a tu técnico</h1>
                <div class="lds-ripple"><div></div><div></div></div>
            </div>
            ';
        }

        if($f['estado_servicio'] == "Cancelado"){
             echo'
            <div class="cancelCardProfile">
                <div class="row">
                    <div class="col-md-12">
                        <h1 data-aos="zoom-out">Este servicio se canceló</h1>
                    </div>
                    <i class="fa-solid fa-face-frown"></i>
                </div>
            </div>
            ';
        }
        
        
        

    }
}

/* Función para mostrar y agendar el técnico que se selecciona desde el home */
function tecnicoAgnForm(){
    if(isset($_GET['tecnico'])){
        $tecnico= $_GET['tecnico'];
        $objetoConsultas = new ConsultasE();
        $resultado = $objetoConsultas->mostrarTecnico($tecnico);
        $ciudades = $objetoConsultas->mostrarCiudades();
        $localidades = $objetoConsultas->mostrarLocalidades();

        foreach($resultado as $t){
            echo' 
            <form id="sendAgnTecForm" action="../../controller/agendarTecLocation" method="POST">           
                <div class="row">                
                    <div class="col-lg-6 d-flex flex-column justify-content-center">            
                            <div class="agnVisitForm">
                                <h1 data-aos="zoom-out">Solicitar Técnico</h1>
                                <div class="agnVisitBody">
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
                                </div>
                            </div>
                    </div>
                    <div class="col-lg-6" data-aos="zoom-out" data-aos-delay="200">
                        <input type="hidden" name="id_tecnico" value="'.$t["id_user"].'">
                        <div id="cardProfileUser" class="cardProfileResume">              
                                <div class="row infoProfileResume">   
                                    <div class="col-md-12 photoProfileResume">
                                        <img src="../'.$t["foto"].'" alt="profileUser">
                                    </div>
                                    <div class="col-md-12">
                                        <h3>'.$t["nombres"].' '.$t["apellidos"].'</h3>
                                    </div>
                                    <div class="col-md-12">
                                        <p>'.$t["email"].'</p>
                                    </div>
                                    <div class="col-md-12">
                                        <p><i class="fa-solid fa-phone"></i>'.$t["telefono"].'</p>
                                    </div>
                                    <div class="col-md-12">
                                        <span><i class="fa-solid fa-location-dot"></i>'.$t["nombre_ciu"].','.$t["nombre_loc"].'</span>
                                    </div>
                                </div>
                        </div>                          
                        <div class="btn-form-AgnTec">                      
                            <button type="submit" class="btnSendAgn">Agendar técnico</button>
                        </div>
                    </div>
                </div> 
            </form>  
            ';

        }


    }
}
?>