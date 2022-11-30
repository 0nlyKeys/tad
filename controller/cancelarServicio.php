<?php

    require_once('../model/conexion.php');
    require_once('../model/consultasE.php');

    $agendamiento = $_GET['agndm'];
    $estado_serv = "Cancelado";

    $objetoConsultas = new consultasE();
    $result = $objetoConsultas->cancelarServicio($agendamiento, $estado_serv);

?>