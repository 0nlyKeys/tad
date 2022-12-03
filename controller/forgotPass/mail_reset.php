<?php
ini_set ("SMTP","localhost");
ini_set ("sendmail_from","tecnicosadomicilio@gmail.com");
// Varios destinatarios
$to  = $resEmail; // atención a la coma

// título
$subject = 'Restablecer contraseña';
$codigo=rand(1000,9999);
// mensaje
$message = '
<html>
<head>
  <title>Restablecer contraseña</title>
</head>
<body>
    <h1>Nombre de la empresa</h1>
    <div style="text-align:center; background-color:#CCC">
        <p>Código para restablecer</p>
        <h3>'.$codigo.'</h3>
        <p>Para reestablecer tu contraseña <a href="http://localhost/tad/view/extras/restorePass?resEmail='.$resEmail.'&token='.$token.'">Click Aquí</a></p>
        <p> <small>Si usted no envio este código favor de omitir</small></p>
    </div>
</body>
</html>
';

// Para enviar un correo HTML, debe establecerse la cabecera Content-type
$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type:text/html;charset=UTF-8' . "\r\n";

/*
// headers adicionales
$headers .= 'To: Mary <mary@example.com>, Kelly <kelly@example.com>' . "\r\n";
$headers .= 'From: Recordatorio <cumples@example.com>' . "\r\n";
$headers .= 'Cc: birthdayarchive@example.com' . "\r\n";
$headers .= 'Bcc: birthdaycheck@example.com' . "\r\n";
*/
// Enviarlo
$enviado = false;
if(mail($to, $subject, $message, $headers)){
    $enviado=true;
}

?>