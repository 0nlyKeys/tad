<?php
require_once("../../model/conexion.php");
require_once("../../model/validarSesion.php");
require_once("../../model/consultasE.php");
require_once("../../controller/seguridadUser.php");
require_once("../../controller/showAgnUser.php");
require_once("../../controller/verPerfilUser.php");
?>
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Mis Agendamientos | TAD</title>
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
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
  <!-- Vendor CSS Files -->
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
  <link href="../../css/style.css" rel="stylesheet">
</head>

<body>


  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

      <a href="homeUser" class="logo d-flex align-items-center">
        <img src="assets/img/logo.png" alt="">
        <span>TAD</span>
      </a>

      <nav id="navbar" class="navbar">
        <?php
        mostrarPerfilU();
        ?>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->


  <main id="main">
    <!-- ======= Hero Section ======= -->
    <section id="showAgnUser" class="hero d-flex align-items-center">

      <div class="container">
        <div class="row">                 
          <div class="col-lg-6 d-flex flex-column justify-content-center"> 
            <div class="agnVisitResume" >
              <h2 >Tu solicitud</h2>
                <div class="agnVisitBody">
                  <div class="row">
                    <div class="col-md-6">  
                      <h3><i class="fa-solid fa-user"></i>Nombres</h3>       
                    </div>
                    <div class="col-md-6">  
                      <span>Aqui mi nombres y ape</span>       
                    </div>
                    <div class="col-md-6">  
                      <h3><i class="fa-solid fa-calendar-days"></i>Fecha Agendada</h3>        
                    </div>
                    <div class="col-md-6">  
                      <span>Aqui mi fecha</span>        
                    </div>
                    <div class="col-md-6">  
                      <h3><i class="fa-duotone fa-at"></i>Email</h3>        
                    </div>
                    <div class="col-md-6">  
                      <span>Aqui mi Email</span>        
                    </div>
                    <div class="col-md-6">  
                      <h3><i class="fa-solid fa-map-location-dot"></i>Lugar</h3>        
                    </div>
                    <div class="col-md-6">  
                      <span>Aqui Dirección</span>   
                      <span>Aqui Ciudad, localidad</span>       
                    </div>          
                    <div class="col-md-6">  
                      <h3><i class="fa-solid fa-phone"></i>Número Contacto</h3>        
                    </div>
                    <div class="col-md-6">  
                      <span>Aqui mi numero</span>        
                    </div>
                    <div class="col-md-6">  
                      <h3><i class="fa-solid fa-bars"></i>Descripción</h3>        
                    </div>
                    <div class="col-md-6">  
                      <span>Aqui mi descripción</span>        
                    </div>
                </div>
              </div>
            </div>
            <a class="cancelServiceResume" href="#">Cancelar Servicio</a>
          </div>           
          <div class="col-lg-6" data-aos="zoom-out" data-aos-delay="200"> 
            <h1 data-aos="zoom-out">TU TÉCNICO</h1>
            <div id="cardProfileUser" class="cardProfileResume">              
              <div class="row infoProfileResume">   
                <div class="col-md-12 photoProfileResume">
                    <img src="../../img/Veronica_Lopez.jpg" alt="profileUser">
                </div>
                <div class="col-md-12">
                    <h3>Nombres</h3>
                </div>
                <div class="col-md-12">
                    <p><i class="fa-duotone fa-at"></i>Email</p>
                </div>
                <div class="col-md-12">
                  <p><i class="fa-solid fa-phone"></i>Celular</p>
                </div>
                <div class="col-md-12">
                    <span><i class="fa-solid fa-location-dot"></i>Ciudad, Localidad</span>
                </div>
                <div class="col-md-12">
                    <a href=""><i class="fa-regular fa-star"></i>Calificar</a>
                </div>
              </div>
            </div>
          </div>
        </div> 
          <!-- <div class="col-lg-6" data-aos="zoom-out" data-aos-delay="200">
            
          </div> -->
      </div>
    </section>

  </main>
  <!-- ======= Footer ======= -->
  <!-- <footer id="footer" class="footer">

    <div class="footer-newsletter">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-12 text-center">
            <h4>Contacto</h4>
            <p>Suscribete a nuestras noticias mas recientes</p>
          </div>
          <div class="col-lg-6">
            <form action="" method="post">
              <input type="email" name="email"><input type="submit" value="Enviar">
            </form>
          </div>
        </div>
      </div>
    </div>


    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong><span>FlexStart</span></strong>. All Rights Reserved
      </div>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/flexstart-bootstrap-startup-template/ -->
        <!-- Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
      </div>
    </div>
  </footer>End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/purecounter/purecounter.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>
  <script>
    $(function() {
      $('#fechaAgn').datetimepicker({
        format: 'YYYY/MM/DD HH:mm',
        icons: {
          time: 'far fa-clock'
        }
      });
    });
  </script>

</body>

</html>