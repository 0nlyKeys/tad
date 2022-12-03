<?php
if(isset($_GET['resEmail']) && isset($_GET['token'])){
    $resEmail=$_GET['resEmail'];
    $token=$_GET['token'];
}else{
  header("location: ./login.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>TAD | Restablecer Password</title>
  
  <link href="../../img/favicon-tad-logo.png" rel="icon">
  
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
      <a class="navbar-brand" href="../../index"><i class="bi bi-arrow-left-circle"></i></a>
    </div>
  </nav>
  <div class="container login-container">
    <div class="login-card-tad" data-aos="fade-down" data-aos-duration="1000">
      <div class="elipse-login" data-aos="fade-down" data-aos-duration="2000">
        <img src="../../img/tad-logo.png" alt="logoTAD">
      </div>
      <div class="title-form-tad">
        <h1>Restablecer Contraseña</h1>
      </div>
      <form action="../../controller/forgotPass/verificarToken.php" method="post" >        
          <div class="inputBox-tad">
            <input type="number" name="codigo" required>
            <input type="hidden" name="resEmail" value="<?php echo $resEmail ?>" required>
            <input type="hidden" name="token" value="<?php echo $token ?>" required>
            <span>Codigo</span>
          </div>
          <div class="row btn-login">
            <!-- /.col -->
            <div class="col-2"></div>
            <div class="col-8 btn-login-line">
              <button type="submit" class="btn-tad btn-primary-tad">Verificar</button>
            </div>
            <div class="col-2"></div>
            <!-- /.col -->
          </div>
      </form>
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
