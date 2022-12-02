<?php

    require_once('../model/conexion.php');
    require_once('../model/consultasTecnico.php');
    session_start();


    $agendamiento = $_GET['agndm'];
    $estado_serv = "Asignado";
    $tecnico = $_SESSION['id_user'];

    $objetoConsultas = new consultasTecnico();
    $result = $objetoConsultas->cancelarServicio($agendamiento, $tecnico, $estado_serv);

?>