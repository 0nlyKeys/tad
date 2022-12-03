<?php
require_once("../../model/conexion.php");
require_once("../../model/validarSesion.php");
require_once("../../model/consultasAdmin.php");
require_once("../../model/consultasE.php");
require_once("../../controller/seguridadUser.php");
require_once("../../controller/verPerfilUser.php");

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
  <link href="../../img/favicon-tad-logo.png" rel="icon">
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
        <span><i class="fa-solid fa-arrow-left"></i></span>
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
  <section id="home" class="hero d-flex align-items-center">
    <div class="container profile">
      <div class="row">
        <div class="col-lg-12 d-flex flex-column justify-content-center">
            <?php
              profileUsuario();
            ?>       
        </div>
      </div>
    </div>

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content modal-psw-change">
          <div class="modal-psw-header">
            <h5 class="modal-title" id="exampleModalLabel">Cambiar Contraseña</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
        <form action="../../controller/modificarClaveUser.php" method="POST">
          <div class="modal-body">            
            <div class="formEditPassUser row">
              <div class="col-md-12">
                <input type="password" name="claveActual" placeholder="Clave Actual" required>
                </div>
              <div class="col-md-6">            
                <input type="password" name="newClave" placeholder="Clave Nueva" required>
              </div>
              <div class="col-md-6">
                <input type="password"  name="confClave" placeholder="Confirmar Clave" required>
              </div>               
            </div>
          </div> 
          <div class="modal-footer modal-foot-psw">
            <button type="submit" class="btn btn-primary">Cambiar</button>
          </div>                              
        </form>
        </div>
      </div>
    </div>


  </section><!-- End Hero -->
  

</main>
 

  <!-- Vendor JS Files -->
  <script src="assets/vendor/purecounter/purecounter.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>  

<script>
function showEditprofile() {
        document.getElementById('editProfileUser').style.display = "block";
    }

function closeEdit(){
        var element = document.getElementById("editProfileUser");
        element.style.display = "none";
    }

    function previewPhoto() {
      imagePreview.src=URL.createObjectURL(event.target.files[0]);
    }
</script>
</body>
</html>