<?php
require_once("../../model/conexion.php");
require_once("../../model/validarSesion.php");
require_once("../../model/consultasTecnico.php");
require_once("../../controller/seguridadTecnico.php");
require_once("../../controller/verPerfilTecnico.php");
require_once("../../controller/homeTecnico.php");
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Profile | TAD</title>
  <meta content="" name="description">

  <meta content="" name="keywords">
  
 <!-- Google Font: Source Sans Pro -->
 <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../dashboard-base/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="../dashboard-base/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="../dashboard-base/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="../dashboard-base/plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dashboard-base/dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="../dashboard-base/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="../dashboard-base/plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="../dashboard-base/plugins/summernote/summernote-bs4.min.css">
  
  <!-- Favicons -->
  <link href="../client-site/assets/img/favicon.png" rel="icon">
  <link href="../client-site/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">

  <!-- Vendor CSS Files -->
  <link href="../client-site/assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="../client-site/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../client-site/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="../client-site/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="../client-site/assets/vendor/remixicon/remixicon.css" rel="stylesheet">

  <!-- AOS -->
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="../client-site/assets/css/style.css" rel="stylesheet">
  <link href="../../css/style.css" rel="stylesheet">
</head>
<body id="tecnicoHome">
    
        <?php

        include('menut.php');

        ?>
    <div class="container tecnico-container">
        
            <?php
                servicesTecnico();
            ?> 
        </div>
    </div>



<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
  AOS.init({once: true});
</script>
</body>
</html>
