<?php
require_once("../../model/conexion.php");
require_once("../../model/validarSesion.php");
require_once("../../model/consultasTecnico.php");
require_once("../../controller/seguridadTecnico.php");
require_once("../../controller/verPerfilTecnico.php");
?>


<nav class="navbar navbar-light bg-light">
    <div class="container navbarTec">
        <a class="navbar-brand" href="home">
            <img src="../../img/tad-logo.png" alt="" width="60" height="44">
        </a>
        <a href="../../controller/cerrarSesion">Salir<i class="bi bi-box-arrow-right"></i></a>
    </div>
</nav>