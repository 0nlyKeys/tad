<?php

    require_once('../model/conexion.php');
    require_once('../model/consultasE.php');
    
    // Aterrizar los valores enviados en los name del form a través del método POST en las diferentes variables
    $nombres = $_POST['nombres'];
    $apellidos = $_POST['apellidos'];
    $email = $_POST['email'];
    $telefono = $_POST['telefono'];
    $ciudad = $_POST['ciudad'];    
    $localidad = $_POST['localidad'];
    $fechaAgenda = $_POST['fechaAgn'];
    $direccion = $_POST['direccion'];
    $descripcion = $_POST['descripcion'];
    $tecnico = '1';
    $estado = "Pendiente";

    // validamos que las variables no estén vacias
    if (strlen($nombres)>0 && strlen($apellidos)>0 && strlen($email)>0 && strlen($telefono)>0 && strlen($ciudad)>0 && strlen($localidad)>0 && strlen($fechaAgenda)>0 && strlen($direccion)>0 && strlen($descripcion)>0) {
        // Encriptamos la clave con la instrucción MD5

        $objetoConsultas = new ConsultasE();

        $result = $objetoConsultas->agendarTecnicoE($nombres, $apellidos, $email, $telefono, $ciudad, $localidad, $fechaAgenda, $direccion,$descripcion,$tecnico,$estado);

    //Si los campos vienen vacios redireccionamos al formulario 
    }else{
        echo "<script> alert('POR FAVOR COMPLETE LOS CAMPOS PARA EL AGENDAMIENTO') </script>";
        echo '<script> location.href="../view/client-site/newAgendamiento.php" </script>';
    }    
?>