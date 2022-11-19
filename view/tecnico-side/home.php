<?php
require_once("../../model/conexion.php");
require_once("../../model/validarSesion.php");
require_once("../../model/consultasTecnico.php");
require_once("../../controller/seguridadTecnico.php");
require_once("../../controller/verPerfilTecnico.php");
require_once("../../controller/homeTecnico.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../../css/style.css">
    <title>Técnico | Home</title>
</head>
<body id="tecnicoHome">
    
        <?php

        include('menut.php');

        ?>
    <div class="container tecnico-container">
        <div class="titleTecnicoPage">
            <h1>Bienvenido <br> Juan Bejarano</h1>
        </div>        
        <div class="row sectionServices">

            <?php
                servicesTecnico();
            ?>
        <!-- Pantalla 2 sin servicios agendados -->
        <!--
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
            </div> -->
        <!-- Pantalla 2 con servicios agendados -->
        <!-- 
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
            </div> -->
        <!-- Pantalla 1 con servicios agendados-->
        <!--
            <div class="col-md-12 alertServices">
                <h4>¡Tienes servicios agendados por favor atender!</h4>
            </div>
            <div class="col-md-6 zoneServices">
                <div class="titleZoneServices">                            
                    <h5>Nuevos servicios en tu zona</h5> 
                </div>                      
                <div class="row navServices">
                    <div class="col-12">
                        <h2><i class="bi bi-geo-fill" style="color:red"></i>Lugar</h2>
                        <p class="dateServices">Fecha Agendamiento</p>
                        <p>Asunto Agendamiento</p>
                        <div class="showServices">                            
                            <a href="#"><ion-icon name="search-circle-outline"></ion-icon></a>
                        </div>
                    </div>
                </div>
            </div> -->
        <!-- Pantalla 1  sin servicios agendados-->
            <!-- <div class="col-md-6 zoneServices">
                <div class="titleZoneServices">                            
                    <h5>Nuevos servicios en tu zona</h5> 
                </div>                      
                <div class="row navServices">
                    <div class="col-12">
                        <h2><i class="bi bi-geo-fill" style="color:red"></i>Lugar</h2>
                        <p class="dateServices">Fecha Agendamiento</p>
                        <p>Asunto Agendamiento</p>
                        <div class="showServices">                            
                            <a href="#"><ion-icon name="search-circle-outline"></ion-icon></a>
                        </div>
                    </div>
                </div>
            </div> -->
            <div class="col-md-6 menuTecnico">
                <div class="row">
                    <div class="col-12">
                        <a href="#">Mis Servicios</a>
                    </div>
                    <div class="col-12">
                        <a href="#">Historial</a>
                    </div>
                    <div class="col-12">
                        <a href="#">Mi Perfil</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
