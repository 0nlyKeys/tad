<?php

    require_once('../model/conexion.php');
    require_once('../model/consultasE.php');
    
    // Aterrizar los valores enviados en los name del form a través del método POST en las diferentes variables
    $identificacion = $_POST['identificacion'];
    $tipoDoc = $_POST['tipoDoc'];
    $nombres = $_POST['nombres'];
    $apellidos = $_POST['apellidos'];
    $email = $_POST['email'];
    $telefono = $_POST['telefono'];
    $clave = $_POST['clave'];
    $rol = "Cliente";
    $estado = "Pendiente";

    // validamos que las variables no estén vacias
    if (strlen($identificacion)>0 && strlen($tipoDoc)>0 && strlen($nombres)>0 && strlen($apellidos)>0 && strlen($email)>0 && strlen($telefono)>0 && strlen($clave)>0) {
        // Encriptamos la clave con la instrucción MD5
        $claveMd = md5($clave);

        $objetoConsultas = new ConsultasE();

        $result = $objetoConsultas->registrarUserE($identificacion, $tipoDoc, $nombres, $apellidos, $email, $telefono, $claveMd, $rol, $estado);

    //Si los campos vienen vacios redireccionamos al formulario 
    }else{
        echo "<script> alert('POR FAVOR COMPLETE LOS CAMPOS PARA REGISTRARSE EN EL SISTEMA') </script>";
        echo '<script> location.href="../view/extras/registro-user.php" </script>';
    }    
?>