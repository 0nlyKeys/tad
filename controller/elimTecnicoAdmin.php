<?php

    require_once('../model/conexion.php');
    require_once('../model/consultasAdmin.php');

    $id_tecnico = $_GET['id_tecnico'];

    $objetoConsultas = new consultasAdmin();
    $result = $objetoConsultas->eliminarTecnico($id_tecnico);

?>