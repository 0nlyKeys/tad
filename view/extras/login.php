<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>TAD | Inicio Sesion</title>
  
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Noto+Sans+SC&display=swap" rel="stylesheet">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../dashboard-base/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dashboard-base/dist/css/adminlte.min.css">
  <link rel="stylesheet" href="../../css/style.css">

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.2/font/bootstrap-icons.css">
</head>
<body id="form-login">  

  <nav class="navbar fixed-top navbar-light bg-nav-tad">
    <div class="container-fluid">
      <a class="navbar-brand" href="../../index.html"><i class="bi bi-arrow-left-circle"></i></a>
    </div>
  </nav>
  <div class="container login-container">
    <div class="login-card-tad" data-aos="fade-down" data-aos-duration="1000">
      <div class="elipse-login" data-aos="fade-down" data-aos-duration="2000">
        <img src="../../img/tad-logo.png" alt="logoTAD">
      </div>
      <div class="title-form-tad">
        <h1>Bienvenido</h1>
      </div>
      <form action="../../controller/iniciarSesion.php" method="post" >        
          <div class="inputBox-tad">
            <input type="email" name="email"  required>
            <span>Email</span>
          </div>

          <div class="inputBox-tad">
            <input type="password" name="clave" required>
            <span>Contraseña</span>
          </div>

          <div class="link-tad-login">
            <a href=""><span>Olvide mi contraseña.</span></a>
          </div>
          <div class="row btn-login">
            <!-- /.col -->
            <div class="col-2"></div>
            <div class="col-8 btn-login-line">
              <button type="submit" class="btn-tad btn-primary-tad">Iniciar Sesión</button>
            </div>
            <div class="col-2"></div>
            <!-- /.col -->
          </div>
          <div class="login-foot-tad">
            ¿No tienes cuenta? <a href="#exampleModal" data-toggle="modal" data-target="#exampleModal"><span class="link-tad">Registrate Aquí</span></a>
          </div>
      </form>
    </div>
  </div>
  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content modal-login">
              <div class="modal-header" style="border:none;">
                <h5 class="modal-title" id="exampleModalLabel">¿Como quiere registrarse?</h5>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close" style="border: none;"><i class="bi bi-x-lg"></i></button>
              </div>
              <div class="modal-body">
                <div class="row options-modal-form">
                  <div class="col-md-5 options-modal-btn">
                    <a href="./register-user.php">Usuario</a>
                  </div>
                  <div class="col-md-2 options-modal-btn">
                    o
                  </div>
                  <div class="col-md-5 options-modal-btn">
                    <a href="./register-tecnico.php">Técnico</a>
                  </div>
                </div>
              </div>
          </div>
      </div>
  </div>
  


<!-- jQuery -->
<script src="../dashboard-base/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../dashboard-base/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../dashboard-base/dist/js/adminlte.min.js"></script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
  AOS.init();
</script>
</body>
</html>
