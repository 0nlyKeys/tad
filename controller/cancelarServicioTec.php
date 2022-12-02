<?php

    require_once('../model/conexion.php');
    require_once('../model/consultasTecnico.php');

    $agendamiento = $_GET['agndm'];
    $estado_serv = "Pendiente";
    $tecnico = '1';

    $objetoConsultas = new consultasTecnico();
    $result = $objetoConsultas->cancelarServicio($agendamiento, $tecnico, $estado_serv);

?>