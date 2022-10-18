<?php
    require_once('../model/conexion.php');
    require_once('../model/consultasAdmin.php');
    
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
    $clave = $_POST['clave'];
    $rol = $_POST['rol'];
    $estado = $_POST['estado'];
    
    //DEFINIMOS PESO LIMITE Y OFRMATOS DE IMAGEN PERMITIDOS
    define('LIMITE', 2000);
    define('ARREGLO', serialize(array('image/jpg','image/png','image/jpeg','image/gif')));
    $PERMITIDOS = unserialize(ARREGLO);

    // VALIDAMOS QUE EL ARCHIVO SI HAYA SIDO SELECCIONADO Y NO TENGA NINGUN ERROR

    if ($_FILES['foto']["error"]>0){
        echo "<script> alert('Archivodañado o no encontrado') </script>";
        echo '<script> location.href="../view/admin-side/registrarUsers.php" </script>';
    }else{
        // Confirmamos formato de imagne y peso
        if(in_array($_FILES['foto']['type'], $PERMITIDOS) && $_FILES ['foto']['size'] <= LIMITE * 1024) {

            // CAPTURAMOS LOS VALORES A GUARDAR EN LA BASE DE DATOS
            $foto = "../upload/".$_FILES['foto']['name'];

            $result = move_uploaded_file($_FILES['foto']['tmp_name'], $foto);

            if (strlen($identificacion)>0 && strlen($tipoDoc)>0 
                && strlen($nombres)>0 && strlen($apellidos)>0 
                && strlen($fechaNac)>0 && strlen($email)>0 
                && strlen($telefono)>0 && strlen($ciudad)>0 
                && strlen($localidad)>0 && strlen($direccion)>0 
                && strlen($postal)>0 && strlen($clave)>0) {
                // Encriptamos la clave con la instrucción MD5
                $claveMd = md5($clave);

                $objetoConsultas = new ConsultasAdmin();

                $result = $objetoConsultas->registrarUserE($identificacion, $tipoDoc, $nombres, $apellidos,$fechaNac, $email, $telefono, $ciudad, $localidad, $direccion, $postal, $claveMd, $rol, $estado,$foto);

        //Si los campos vienen vacios redireccionamos al formulario 
            }else{
                echo "<script> alert('POR FAVOR COMPLETE LOS CAMPOS PARA REGISTRAR UN NUEVO CLIENTE EN EL SISTEMA') </script>";
                echo '<script> location.href="../view/admin-side/registrarUsers.php" </script>';
            }  

        
    }else{
            echo "<script> alert('Formato de  imagen no permitido o el peso de la imagen supera el limite permitido') </script>";
            echo '<script> location.href="../view/admin-side/registrarUsers.php" </script>';

        }

    }

    // validamos que las variables no estén vacias
    

/*
    require_once('../model/conexion.php');
    require_once('../model/consultasAdmin.php');
    
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
    $clave = $_POST['clave'];
    $rol = $_POST['rol'];
    $estado = $_POST['estado'];

    // validamos que las variables no estén vacias
    if (strlen($identificacion)>0 && strlen($tipoDoc)>0 
        && strlen($nombres)>0 && strlen($apellidos)>0 
        && strlen($fechaNac)>0 && strlen($email)>0 
        && strlen($telefono)>0 && strlen($ciudad)>0 
        && strlen($localidad)>0 && strlen($direccion)>0 
        && strlen($postal)>0 && strlen($clave)>0) {
        // Encriptamos la clave con la instrucción MD5
        $claveMd = md5($clave);

        $objetoConsultas = new ConsultasAdmin();

        $result = $objetoConsultas->registrarUserE($identificacion, $tipoDoc, $nombres, $apellidos,$fechaNac, $email, $telefono, $ciudad, $localidad, $direccion, $postal, $claveMd, $rol, $estado);

    //Si los campos vienen vacios redireccionamos al formulario 
    }else{
        echo "<script> alert('POR FAVOR COMPLETE LOS CAMPOS PARA REGISTRAR UN NUEVO CLIENTE EN EL SISTEMA') </script>";
        echo '<script> location.href="../view/admin-side/registrarUsers.php" </script>';
    }  
     */  
?>