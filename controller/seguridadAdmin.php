<?php

    session_start();
    if(!isset($_SESSION['autenticado'])){        
        echo "<script>alert('ACCIÓN NO PERMITIDA')</script>";
        echo "<script>location.href=('../extras/login.php')</script>";
    }

    if($_SESSION['rol']!="Administrador"){
        echo "<script>alert('NO CUENTA CON LOS PERMISOS PARA ACCEDER')</script>";
        echo "<script>location.href=('../extras/login.php')</script>";
    }
?>