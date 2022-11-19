<?php
    function servicesTecnico(){
        $idTecnico = $_SESSION['id_user'];
        $postal_code = $_SESSION['postal_code'];
        $objetoConsultas = new consultasTecnico();
        $result = $objetoConsultas->mostrarAgendamientos($idTecnico);
        $postal = $objetoConsultas->showAgndByPostal($postal_code);
        // var_dump($postal);
        // die();
        
        //Si el Tecnico NO tiene agendamientos 
        if(!$result){            
            //Si el Tecnico NO tiene servicios cerca 
            if(!$postal){                
                echo'
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
            }else{
                //Si el tecnico no tiene agendamientos pero tiene servicios cerca
                
                echo '
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
    }
?>