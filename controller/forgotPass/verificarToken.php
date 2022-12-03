<?php
require_once('../../model/conexion.php');

$resEmail = $_POST['resEmail'];
$token = $_POST['token'];
$codigo = $_POST['codigo'];

$objetoConexion = new Conexion();
$conexion = $objetoConexion->get_conexion();

$sql = "SELECT * FROM passwords WHERE email=:email AND token=:token AND codigo=:codigo";

$result = $conexion->prepare($sql);

$result->bindParam(':email', $resEmail);
$result->bindParam(':token', $token);
$result->bindParam(':codigo', $codigo);

$result-> execute();

$correcto=false;
if($resultado = $result->fetch()){
    $fecha=$resultado["fecha"];
    date_default_timezone_set('America/Bogota');
    $fechaActual=date("Y-m-d h:m:s");
    $seconds = strtotime($fechaActual) - strtotime($fecha); 
    $minutos=$seconds/60;
    if($minutos > 10){
        echo "<script> alert('Token Vencido') </script>";
        echo '<script> location.href="../../view/extras/login" </script>';
    }else{
        $correcto=true;
        // echo '<script> location.href="../../view/extras/changePassword" </script>';
    }  
}else{
    $correcto=false;
    echo "<script> alert('Código incorrecto') </script>";
    echo '<script> location.href="../../view/extras/restorePass?resEmail='.$resEmail.'&token='.$token.'" </script>';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>TAD | Cambiar contraseña</title>
  
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Noto+Sans+SC&display=swap" rel="stylesheet">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../view/dashboard-base/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../view/dashboard-base/dist/css/adminlte.min.css">
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
        <h1>Cambiar Contraseña</h1>
      </div>
      <?php if($correcto){ ?>
      <form action="changePassword.php" method="post" >        
          <div class="inputBox-tad">
            <input type="password" name="rPassUno" required>
            <span>Nuevo Password</span>
          </div>
          <div class="inputBox-tad">
            <input type="password" name="rPassDos" required>
            <span>Confirmar Password</span>
          </div>
          <input type="hidden" name="resEmail" value="<?php echo $resEmail; ?>"required>
          <div class="row btn-login">
            <!-- /.col -->
            <div class="col-2"></div>
            <div class="col-8 btn-login-line">
              <button type="submit" class="btn-tad btn-primary-tad">Cambiar</button>
            </div>
            <div class="col-2"></div>
            <!-- /.col -->
          </div>
      </form>
      <?php  }?>

    </div>
  </div>
 
 


<!-- jQuery -->
<script src="../../view/dashboard-base/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../view/dashboard-base/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../../view/dashboard-base/dist/js/adminlte.min.js"></script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
  AOS.init();
</script>
</body>
</html>