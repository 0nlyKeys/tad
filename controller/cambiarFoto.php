<?php
    require_once('../model/conexion.php');
    require_once('../model/consultasE.php');
    
    session_start();
    $identificacion=$_SESSION['id'];


    //DEFINIMOS PESO LIMITE Y OFRMATOS DE IMAGEN PERMITIDOS
    define('LIMITE', 2000);
    define('ARREGLO', serialize(array('image/jpg','image/png','image/jpeg','image/gif')));
    $PERMITIDOS = unserialize(ARREGLO);

    // VALIDAMOS QUE EL ARCHIVO SI HAYA SIDO SELECCIONADO Y NO TENGA NINGUN ERROR

    if ($_FILES['foto']["error"]>0){
        echo "<script> alert('Archivodañado o no encontrado') </script>";
        echo '<script> location.href="../view/client-site/miPerfil.php?id_user='.$identificacion.'"</script>';
    }else{
        // Confirmamos formato de imagne y peso
        if(in_array($_FILES['foto']['type'], $PERMITIDOS) && $_FILES ['foto']['size'] <= LIMITE * 1024) {

            // CAPTURAMOS LOS VALORES A GUARDAR EN LA BASE DE DATOS
            $foto = "../upload/".$_FILES['foto']['name'];

            $result = move_uploaded_file($_FILES['foto']['tmp_name'], $foto);

            if (strlen($foto)>0) {

                $objetoConsultas = new ConsultasE();

                $result = $objetoConsultas->cambiarFotoUser($foto,$identificacion);

        //Si los campos vienen vacios redireccionamos al formulario 
            }else{
                echo "<script> alert('DEBE CARGAR UNA FOTO') </script>";
                echo '<script> location.href="../view/client-site/miPerfil.php?id_user='.$identificacion.'"</script>';
            }  

        
    }else{
            echo "<script> alert('Formato de  imagen no permitido o el peso de la imagen supera el limite permitido') </script>";
            echo '<script> location.href="../view/client-site/miPerfil.php?id_user='.$identificacion.'"</script>';

        }

    } 
?>