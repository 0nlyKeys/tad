<?php

    require_once("../model/conexion.php");
    require_once("../model/consultasAdmin.php");
    require_once("../model/validarSesion.php");

    $claveActual = md5($_POST['claveActual']);
    $newClave = md5($_POST['newClave']);
    $confClave = md5($_POST['confClave']);
    session_start();
    $identificacion = $_SESSION['id'];

    if($claveActual==$_SESSION['clave']){

        if($newClave == $confClave){
            
            $objetoConsultas = new ConsultasAdmin();
            $result = $objetoConsultas->modificarClave($newClave,$identificacion);
            
        }else{
            echo "<script> alert('LA NUEVA CONTRASEÑA NO COINCIDE')</script>";

        }

    }else{
        echo "<script> alert('LA CONTRASEÑA ACTUAL NO CONCUERDA CON LA REGISTRADA')</script>";
    }
?>