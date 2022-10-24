<?php

    require_once('../model/conexion.php');
    require_once('../model/consultasAdmin.php');
    
    // Aterrizar los valores enviados en los name del form a través del método POST en las diferentes variables
    $identificacion = $_POST['identificacion'];
    $nombres = $_POST['nombres'];
    $apellidos = $_POST['apellidos'];
    $email = $_POST['email'];    
    $fechaNac = $_POST['fechaNac'];
    $telefono = $_POST['telefono'];
    $ciudad = $_POST['ciudad'];
    $localidad = $_POST['localidad'];
    $direccion = $_POST['direccion'];
    $postal = $_POST['code_postal'];

    // validamos que las variables no estén vacias
    if (strlen($identificacion)>0 && strlen($fechaNac)>0 && 
    strlen($nombres)>0 && strlen($apellidos)>0 && 
    strlen($email)>0 && strlen($telefono)>0 && 
    strlen($ciudad)>0 && strlen($localidad)>0 && 
    strlen($direccion)>0 && strlen($postal)>0) {
        // Encriptamos la clave con la instrucción MD5

        $objetoConsultas = new ConsultasAdmin();

        $result = $objetoConsultas->editarPerfil($identificacion, $nombres, $apellidos, $email, $fechaNac,$telefono, $ciudad, $localidad, $direccion, $postal );

    //Si los campos vienen vacios redireccionamos al formulario 
    }else{
        echo "<script> alert('POR FAVOR COMPLETE LOS CAMPOS PARA MODIFICAR UN NUEVO USUARIO EN EL SISTEMA') </script>";
        echo '<script> location.href="../view/admin-side/myProfile.php" </script>';
    }    
?>