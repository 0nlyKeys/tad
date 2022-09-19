<?php
    require_once('../model/conexion.php');
    require_once('../model/validarSesion.php');

    $objetoConsultas = new validarSesion();
    $result=$objetoConsultas->cerrarSesion();
    

?>