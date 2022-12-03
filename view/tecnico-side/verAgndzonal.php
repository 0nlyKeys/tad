<?php
require_once("../../model/conexion.php");
require_once("../../model/validarSesion.php");
require_once("../../model/consultasTecnico.php");
require_once("../../controller/seguridadTecnico.php");
require_once("../../controller/verPerfilTecnico.php");
require_once("../../controller/showAgnTecnico.php");
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Agendamiento | TAD</title>
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

<nav class="navbar navbar-light bg-light">
    <div class="container navbarTec">
        <a class="navbar-brand" href="home">
            <i class="fa-solid fa-arrow-left" width="60" height="44"></i>
        </a>
        <a href="../../controller/cerrarSesion">Salir<i class="bi bi-box-arrow-right"></i></a>
    </div>
</nav>


<main id="main">
  <!-- ======= Hero Section ======= -->
  <section id="showAgnUser" class="profileTec d-flex align-items-center">
    <div class="container profile">
      <div class="row"> 
          <div class="col-lg-3" data-aos="zoom-out" data-aos-delay="200"> 
             
          </div>                
          <div class="col-lg-6 d-flex flex-column justify-content-center" data-aos="zoom-out" data-aos-delay="200"> 
              <?php 
                showInfoAgn();
              ?>
          </div>           
          <div class="col-lg-3" data-aos="zoom-out" data-aos-delay="200"> 
             
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
        <form action="../../controller/modificarClaveTec.php" method="POST">
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
  <script src="../client-site/assets/vendor/purecounter/purecounter.js"></script>
  <script src="../client-site/assets/vendor/aos/aos.js"></script>
  <script src="../client-site/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../client-site/assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="../client-site/assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="../client-site/assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="../client-site/assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="../client-site/assets/js/main.js"></script>
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>  
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


<script>
  AOS.init({once: true});

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

<script type="text/javascript">
  $('.cancelServiceTec').on('click', function(e){
    e.preventDefault();
    const href = $(this).attr('href')

    Swal.fire({
      title: '¿Estás seguro?',
      text: "Tendrás que volver a tomar un nuevo servicio.",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#2939A4',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Sí, cancelar!'
    }).then((result) => {
      if (result.value) {
          if (result.isConfirmed) {
          Swal.fire(
            'Cancelado!',
            'Ya no eres técnico de este servicio.',
            'success'
          )
        }
        document.location.href= href;
      }
    })
  });

  $('.getServiceTec').on('click', function(e){
    e.preventDefault();
    const href = $(this).attr('href')

    Swal.fire({
      icon: 'success',
      title: '¡Servicio Agendado!',
      showConfirmButton: false,
      timer: 2000,
    }).then((result) => {
        document.location.href= href;
     
    })
  });
</script>
</body>
</html>
