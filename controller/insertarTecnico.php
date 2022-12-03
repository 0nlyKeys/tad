<?php

    require_once('../model/conexion.php');
    require_once('../model/consultasE.php');
    
    // Aterrizar los valores enviados en los name del form a través del método POST en las diferentes variables
    $identificacion = $_POST['identificacion'];
    $tipoDoc = $_POST['tipoDoc'];
    $nombres = $_POST['nombres'];
    $apellidos = $_POST['apellidos'];
    $fechaNac = $_POST['fechaNac'];
    $email = $_POST['email'];
    $telefono = $_POST['telefono'];
    $ciudad = $_POST['ciudad'];
    $localidad = $_POST['localidad'];
    $direccion = $_POST['direccion'];
    $postal = $_POST['code_postal'];
    $experiencia =$_POST['experiencia'];
    $estudios =$_POST['estudios'];
    $clave =$_POST['clave'];
    $rol = "Tecnico";
    $estado = "Pendiente";
    $foto = "../upload/user-default.png";

    // validamos que las variables no estén vacias
    if (strlen($identificacion)>0 && strlen($tipoDoc)>0 && 
    strlen($nombres)>0 && strlen($apellidos)>0 && 
    strlen($fechaNac)>0 && strlen($email)>0 && 
    strlen($telefono)>0 && strlen($ciudad)>0 && 
    strlen($localidad)>0 && strlen($direccion)>0 &&
    strlen($experiencia)>0 && strlen($estudios)>0 &&
    strlen($postal)>0 && strlen($clave)>0) {
        // Encriptamos la clave con la instrucción MD5
        $claveMd = md5($clave);

        $objetoConsultas = new ConsultasE();

        $result = $objetoConsultas->registrarTecnicoE($identificacion, $tipoDoc, $nombres, $apellidos, $fechaNac, $email, $telefono, $ciudad, $localidad, $direccion,$experiencia,$estudios, $postal, $claveMd, $rol, $estado,$foto);

    //Si los campos vienen vacios redireccionamos al formulario 
    }else{
        echo "<script> alert('POR FAVOR COMPLETE LOS CAMPOS PARA REGISTRARSE EN EL SISTEMA') </script>";
        echo '<script> location.href="../view/extras/register-tecnico.php" </script>';
    }    
?>