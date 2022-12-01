<?php
    function servicesTecnico(){
        $tecnicoId= $_SESSION['id'];
        $idTecnico = $_SESSION['id_user'];
        $postal_code = $_SESSION['postal_code'];
        $objetoConsultas = new consultasTecnico();
        $result = $objetoConsultas->mostrarAgendamientos($idTecnico);
        $postal = $objetoConsultas->showAgndByPostal($postal_code);
        $tecnico = $objetoConsultas->mostrarTecnico($tecnicoId);
        // var_dump($postal);
        // die();
        echo'      
            <div class="row sectionServices">';
        foreach($tecnico as $n){
         echo'
            <div class="titleTecnicoPage" data-aos="fade-down" data-aos-duration="1000">
                <h1>Bienvenido <br> '.$n["nombres"].' '.$n["apellidos"].'</h1>
                <img src="../'.$n["foto"].'" alt="imgTecnico">
            </div>  
            ';
        }
        //Si el Tecnico NO tiene agendamientos 
        if(!$result){            
            //Si el Tecnico NO tiene servicios cerca 
            if(!$postal){                
                echo'
                    <div class="col-md-6 zoneServices" data-aos="zoom-in" data-aos-duration="2000">
                        <div class="titleZoneServices">                            
                            <h5>No hay servicios en tu zona actualmente</h5> 
                        </div>                      
                        <div class="row searchServices">
                            <p>Pero tambien puedes...</p>
                            <a href="#">
                                <div class="col-12">
                                    <h4>Buscar servicios en todo Bogotá</h4>
                                    <ion-icon name="search-circle-outline" style="font-size:20px;color:#FFF;"></ion-icon>
                                </div>
                            </a>
                        </div>
                    </div>     
                ';
            }else{
                //Si el tecnico no tiene agendamientos pero tiene servicios cerca
                
                echo '
                    <div class="col-md-6 zoneServices" data-aos="zoom-in" data-aos-duration="2000">
                    <div class="titleZoneServices">                            
                        <h5>Nuevos servicios en tu zona</h5> 
                    </div>                      
                    <div class="row navServices">';
                    $i = 0;
                    foreach($postal as $pos){
                        if(++$i > 3) break;
                echo'
                        <div class="col-12">
                            <h2><i class="bi bi-geo-fill" style="color:red"></i>'.$pos["localidad"].'</h2>
                            <p class="dateServices">'.$pos["fecha_agn"].'</p>
                            <p>Asunto Agendamiento</p>
                            <div class="showServices">                            
                                <a href="../../controller/verAgndzonal.php?id_agn='.$pos["id_agendamiento"].'"><ion-icon name="search-circle-outline"></ion-icon></a>
                            </div>
                        </div>';
                    }
                echo'
                    </div>
                    </div>
                ';
            
            }
        }else{
            if($postal){
                //Si el Tecnico tiene agendamientos y si tiene servicios
                echo '
                <div class="col-md-12 alertServices">
                    <h4>¡Tienes servicios agendados por favor atender!</h4>
                </div>
                <div class="col-md-6 zoneServices">
                    <div class="titleZoneServices">                            
                        <h5>Nuevos servicios en tu zona</h5> 
                    </div>                      
                    <div class="row navServices">';
                    $i = 0;
                        foreach($postal as $pos){
                            if(++$i > 3) break;
                echo'
                        <div class="col-12">
                            <h2><i class="bi bi-geo-fill" style="color:red"></i>'.$pos["localidad"].'</h2>
                            <p class="dateServices">'.$pos["fecha_agn"].'</p>
                            <p>Asunto Agendamiento</p>
                            <div class="showServices">                            
                                <a href="../../controller/verAgndzonal.php?id_agn='.$pos["id_agendamiento"].'"><ion-icon name="search-circle-outline"></ion-icon></a>
                            </div>
                        </div>';
                    }
                echo'
                    </div>
                </div>
                ';
            }else{
                //Si el Tecnico tiene agendamientos y no tiene servicios
                echo '
                <div class="col-md-12 alertServices">
                <h4>¡Tienes servicios agendados por favor atender!</h4>
                </div>
                <div class="col-md-6 zoneServices">
                    <div class="titleZoneServices">                            
                        <h5>No hay servicios en tu zona actualmente</h5> 
                    </div>                      
                    <div class="row searchServices">
                        <p>Pero tambien puedes...</p>
                        <a href="#">
                            <div class="col-12">
                                <h4>Buscar servicios en todo Bogotá</h4>
                                <ion-icon name="search-circle-outline" style="font-size:20px;color:#FFF;"></ion-icon>
                            </div>
                        </a>
                    </div>
                </div> 
                ';
            }
        }
        echo'                                 
            <div class="col-md-6 menuTecnico" data-aos="zoom-in-left" data-aos-duration="3000">
                <div class="row">
                    <div class="col-12">
                        <a href="#"><ion-icon name="calendar-outline"></ion-icon> Mis Servicios</a>
                    </div>
                    <div class="col-12">
                        <a href="#"><ion-icon name="archive-outline"></ion-icon> Historial</a>
                    </div>
                    <div class="col-12">
                        <a href="miPerfil?id_user='.$n["identificacion"].'"><ion-icon name="person-outline"></ion-icon>Mi Perfil</a>
                    </div>
                </div>
            </div>               
        </div> 
        ';
    }
?>