<?php

    require_once('../model/conexion.php');
    require_once('../model/consultasE.php');
    
    session_start();
    date_default_timezone_set('America/Bogota');

    // Aterrizar los valores enviados en los name del form a través del método POST en las diferentes variables 
    $sessionId = $_SESSION['id'];
    $nombres = $_POST['nombres'];
    $apellidos = $_POST['apellidos'];
    $email = $_POST['email'];
    $telefono = $_POST['telefono'];
    $ciudad = $_POST['ciudad'];    
    $localidad = $_POST['localidad'];
    $fechaAgenda = $_POST['fechaAgn'];
    $direccion = $_POST['direccion'];
    $descripcion = $_POST['descripcion'];
    $fechaActual= date("l, d M Y h:i:s");
    $tecnico = $_POST['id_tecnico'];
    $estado = "Asignado";
    
    // validamos que las variables no estén vacias
    if (strlen($nombres)>0 && strlen($apellidos)>0 
        && strlen($email)>0 && strlen($telefono)>0 
        && strlen($ciudad)>0 && strlen($localidad)>0 
        && strlen($fechaAgenda)>0 && strlen($direccion)>0 
        && strlen($descripcion)>0 && strlen($fechaActual)>0 && strlen($tecnico)>0) {
        // Encriptamos la clave con la instrucción MD5

        $objetoConsultas = new ConsultasE();

        $result = $objetoConsultas->agendarTecnicoE($sessionId,$nombres, $apellidos, $email, $telefono, $ciudad, $localidad, $fechaAgenda, $direccion,$descripcion,$tecnico,$estado,$fechaActual);

    //Si los campos vienen vacios redireccionamos al formulario 
    }else{
        echo "<script> alert('ALGO SALIÓ MAL INGRESANDO LOS CAMPOS') </script>";
        echo '<script> location.href="../view/client-site/homeUser" </script>';
    }    
?>