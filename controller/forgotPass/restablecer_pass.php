<?php
require_once('../../model/conexion.php');
require_once('../../model/consultasE.php');

$resEmail = $_POST['resEmail'];
$bytes = random_bytes(5);
$token = bin2hex($bytes);

include "mail_reset.php";

if($enviado){
    $objetoConsultas = new consultasE();
    $result = $objetoConsultas->forgotPass($resEmail, $token, $codigo);
}else{    
    echo "<script> alert('Error enviando el mensaje') </script>";
    echo '<script> location.href="../view/extras/login';
}


?>