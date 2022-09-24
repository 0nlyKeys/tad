<?php

    require_once('../model/conexion.php');
    require_once('../model/consultasAdmin.php');
    
    // Aterrizar los valores enviados en los name del form a través del método POST en las diferentes variables
    $idAgnd = $_POST['idAgnd'];
    $nombres = $_POST['nombres'];
    $apellidos = $_POST['apellidos'];
    $email = $_POST['email'];
    $telefono = $_POST['telefono'];
    $ciudad = $_POST['ciudad'];    
    $localidad = $_POST['localidad'];
    $fechaAgenda = $_POST['fechaAgn'];
    $direccion = $_POST['direccion'];
    $descripcion = $_POST['descripcion'];
    $tecnico = $_POST['asigTec'];
    $estado = $_POST['estadoServ'];
    
    if(!$_POST){
        
        echo "<script> alert('POR FAVOR COMPLETE LOS CAMPOS PARA EL AGENDAMIENTO') </script>";
        echo '<script> location.href="../view/admin-side/gesAgendamientos.php" </script>';
       
    }else{         
        
        $objetoConsultas = new ConsultasAdmin();
        $result = $objetoConsultas->asigTecnicoAgnd($idAgnd, $nombres, $apellidos, $email, $telefono, $ciudad, $localidad, $fechaAgenda, $direccion,$descripcion,$tecnico,$estado);

    } 
    // validamos que las variables no estén vacias
    /*
    if (strlen($nombres)>0 && strlen($apellidos)>0 
        && strlen($email)>0 && strlen($telefono)>0
         && strlen($ciudad)>0 && strlen($localidad)>0 
         && strlen($fechaAgenda)>0 && strlen($direccion)>0 
         && strlen($descripcion)>0 && strlen($tecnico)>0 && strlen($estado)>0) {
        // Encriptamos la clave con la instrucción MD5

        $objetoConsultas = new ConsultasAdmin();

        $result = $objetoConsultas->asigTecnicoAgnd($idAgnd,$nombres, $apellidos, $email, $telefono, $ciudad, $localidad, $fechaAgenda, $direccion,$descripcion,$tecnico,$estado);

    //Si los campos vienen vacios redireccionamos al formulario 
    }else{
        //echo "<script> alert('POR FAVOR COMPLETE LOS CAMPOS PARA EL AGENDAMIENTO') </script>";
        //echo '<script> location.href="../view/admin-side/gesAgendamientos.php" </script>';
    }    
     */
?>