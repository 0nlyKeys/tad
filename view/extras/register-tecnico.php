<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>TAD | Registro Usuario</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../dashboard-base/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="../dashboard-base/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dashboard-base/dist/css/adminlte.min.css">
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
  <link rel="stylesheet" href="../../css/style.css">

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.2/font/bootstrap-icons.css">
</head>
<body class="hold-transition register-page">

<nav class="navbar fixed-top navbar-light bg-nav-tad">
  <div class="container-fluid">
    <a class="navbar-brand" href="login.php"><i class="bi bi-arrow-left-circle"></i></a>
    <img src="../../img/tad-logo.png" alt="logoTAD" width="65px">
  </div>
</nav>

<div class="container login-container">
    <div class="register-form-tad" data-aos="zoom-in" data-aos-duration="1500">
      <div class="title-form-tad">
        <h1>Registro Técnico</h1>
      <p class="login-box-msg">Todos los campos son obligatorios</p>
      </div>
      <form action="../../controller/insertarTecnico.php" method="post">
        <div class="row form-register-tad">
            <div class="col-md-6 select-form-tad">
              <select name="tipoDoc" required >
                <option>Seleccione su tipo documento</option>
                <option value="CC">CC</option>
                <option value="CE">CE</option>
                <option value="TI">TI</option>
                <option value="OTRO">OTRO</option>
              </select>
            </div>

          <div class="col-md-6 inputBox-form-tad">
            <input type="number" name="identificacion" required>
            <span>Identificación</span>
          </div>   

          <div class="col-md-6 inputBox-form-tad">
            <input type="text" required name="nombres">
            <span>Nombres</span>
          </div>
          <div class="col-md-6 inputBox-form-tad">
            <input type="text" required name="apellidos">
            <span>Apellidos</span>
          </div>

          <div class="col-md-6 inputBox-form-tad">
            <input type="text" required name="fechaNac" data-inputmask-alias="datetime" data-inputmask-inputformat="yyyy/mm/dd" data-mask>
            <span>Fecha de Nacimiento</span>
          </div>
          <div class="col-md-6 inputBox-form-tad">
            <input type="number" required name="telefono">
            <span>Celular</span>
          </div>

          <div class="col-md-6 select-form-tad">
            <select name="ciudad" required>
              <option>Seleccione la Ciudad</option>
              <option value="1">Bogotá</option>
            </select>
          </div>
          <div class="col-md-6 select-form-tad">
            <select name="localidad" required>
              <option>Seleccione la Localidad</option>
              <option value="1">Kennedy</option>
              <option value="2">Usme</option>
              <option value="3">Bosa</option>
            </select>
          </div>

          <div class="col-md-6 inputBox-form-tad">
            <input type="text" required name="direccion">
            <span>Dirección</span>
          </div>          
          <div class="col-md-6 inputBox-form-tad">
            <input type="text" required name="code_postal">
            <span>Código Postal</span>
          </div>

          <div class="col-md-6 inputBox-form-tad">
            <input type="email" required name="email">
            <span>Email</span>
          </div>
          
          <div class="col-md-6 select-form-tad">
            <select name="experiencia" required>
              <option>Seleccione la experiencia laboral</option>
              <option value="basica">Menos de 6 meses</option>
              <option value="intermedia">De 6 meses a 1 un año</option>
              <option value="avanzado">Mas de 1 año </option>
            </select>
          </div>

          <div class="col-md-6 inputBox-form-tad">
            <input id="clave" type="password" required name="clave">
            <span>Clave</span>
          </div>

          <div class="col-md-6 select-form-tad">
            <select name="estudios" required>
              <option>Seleccione su nivel educativo</option>
              <option value="tecnico">Técnico</option>
              <option value="tecnologo">Tecnólogo</option>
              <option value="profesional">Profesional</option>
              <option value="enpirico">Empírico/Autónomo</option>
            </select>
          </div>

          <div class="col-md-6 inputBox-form-tad">
            <input id="claveCheck" type="password" required>
            <span>Confirmar Clave</span>
            <!-- <div class="input-group-append">
              
            </div> -->
          </div>
          <div class="col-md-6">
            <div class="col-md-12">
              <div class="terms-tad">
                <input type="checkbox" required name="chk">
                Acepto los <a href=""><span class="link-tad"> Terminos y condiciones</span></a>
              </div>          
            </div>     
          </div>
          <div class="col-md-6"></div>
          <div class="col-md-6">            
              <div class="btn-form-tad">
                <button type="submit" class="btn-tad btn-primary-tad">Registrarme</button> 
              </div>  
            </div> 
          

          <div class="input-group mb-3">
                <span class="eye" onclick="showClave()" >
                  <i id="hide1" class="fa fa-eye"></i>
                  <i id="hide2" class="fa fa-eye-slash"></i>
                </span>
            <span id='message' class="msg-psw"></span>
          </div> 
        </div>       
      </form>
    </div>
</div>

<!-- jQuery -->
<script src="../dashboard-base/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../dashboard-base/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- InputMask -->
<script src="../dashboard-base/plugins/moment/moment.min.js"></script>
<script src="../dashboard-base/plugins/inputmask/jquery.inputmask.min.js"></script>
<!-- AdminLTE App -->
<script src="../dashboard-base/dist/js/adminlte.min.js"></script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
  AOS.init();
</script>
<script>
  $(function () {
    //Datemask dd/mm/yyyy
    $('#datemask2').inputmask('yyyy/mm/dd')
    $('[data-mask]').inputmask()

    $('#clave, #claveCheck').on('keyup', function () {
   if ($('#clave').val() == $('#claveCheck').val()) {
      $('#message').html('<i class="bi bi-check-square-fill"></i>').css('color', 'green');
    } else 
      $('#message').html('<i class="bi bi-x-octagon-fill"></i>').css('color', 'red');
    });
  })

  function showClave() {
    var x = document.getElementById("clave");
    var v = document.getElementById("claveCheck");
    var y = document.getElementById("hide1");
    var z = document.getElementById("hide2");
    if (x.type === "password" && v.type === "password") {
      x.type = "text";
      v.type = "text";
      y.style.display = "block";
      z.style.display = "none";
    } else {
      x.type = "password";
      v.type = "password";
      y.style.display = "none";
      z.style.display = "block";
    }
  }

    
</script>
</body>
</html>
