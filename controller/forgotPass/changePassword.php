<?php
require_once('../../model/conexion.php');
require_once('../../model/consultasE.php');

$resEmail = $_POST['resEmail'];
$newClave = md5($_POST['rPassUno']);
$confClave = md5($_POST['rPassDos']);

if($newClave == $confClave){
            
    $objetoConsultas = new consultasE();
    $result = $objetoConsultas->changePassByToken($newClave,$resEmail);
    
}else{
    echo "<script> alert('LA NUEVA CONTRASEÑA NO COINCIDE')</script>";
    echo '<script> location.href="verificarToken"</script>';
}

?>