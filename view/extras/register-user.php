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
  <link rel="stylesheet" href="../../css/style.css">

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.2/font/bootstrap-icons.css">
</head>
<body class="hold-transition register-page">

<nav class="navbar fixed-top navbar-light bg-nav-tad">
  <div class="container-fluid">
    <a class="navbar-brand" href="login.php"><i class="bi bi-arrow-left-circle"></i></a>
  </div>
</nav>

<div class="register-box">
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <a href="../../index2.html" class="h1"><b>Registro de </b> Usuarios</a>
    </div>
    <div class="card-body">
      <p class="login-box-msg">Complete el formulario para registrarse en el sistema</p>


      <form action="../../controller/insertarUser.php" method="post">
        <div class="input-group mb-3">
          <input type="number" class="form-control" name="identificacion" required  placeholder="Identificación">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-address-card"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <select class="custom-select form-control" required name="tipoDoc" >
            <option>Tipo Documento</option>
            <option value="CC">CC</option>
            <option value="CE">CE</option>
            <option value="TI">TI</option>
            <option value="OTRO">OTRO</option>
          </select>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="text" class="form-control" required name="nombres"  placeholder="Nombres">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-address-card"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="text" class="form-control" required name="apellidos"  placeholder="Apellidos">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
        <input type="text" class="form-control" name="fechaNac" data-inputmask-alias="datetime" data-inputmask-inputformat="yyyy/mm/dd" data-mask>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="far fa-calendar-alt"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="email" class="form-control" required name="email"  placeholder="Email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="number" class="form-control" required name="telefono"  placeholder="Teléfono">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">          
          <select class="custom-select form-control" required name="ciudad" >
            <option>Seleccione la Ciudad</option>
            <option value="1">Bogotá</option>
          </select>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">          
          <select class="custom-select form-control" required name="localidad" >
            <option>Seleccione la Localidad</option>
            <option value="1">Kennedy</option>
            <option value="2">Usme</option>
            <option value="3">Bosa</option>
          </select>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="text" class="form-control" required name="direccion"  placeholder="Dirección">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="text" class="form-control" required name="code_postal"  placeholder="Código postal">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input id="clave" type="password" class="form-control" required name="clave" placeholder="Clave">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input id="claveCheck" type="password" class="form-control" required placeholder="Confirmar Clave">
          <div class="input-group-append">
            <div class="input-group-text">              
              <span class="eye" onclick="showClave()" >
                    <i id="hide1" class="fa fa-eye"></i>
                    <i id="hide2" class="fa fa-eye-slash"></i>
              </span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
            <span id='message'></span>
        </div>
        <div class="row">
          <!-- /.col -->
          <div class="col-12">
            <button type="submit" class="btn btn-primary btn-block">Register</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->
</div>
<!-- /.register-box -->

<!-- jQuery -->
<script src="../dashboard-base/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../dashboard-base/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- InputMask -->
<script src="../dashboard-base/plugins/moment/moment.min.js"></script>
<script src="../dashboard-base/plugins/inputmask/jquery.inputmask.min.js"></script>
<!-- AdminLTE App -->
<script src="../dashboard-base/dist/js/adminlte.min.js"></script>
<script>
  $(function () {
    //Datemask dd/mm/yyyy
    $('#datemask2').inputmask('yyyy/mm/dd', { 'placeholder': 'yyyy/mm/dd' })
    $('[data-mask]').inputmask()

    $('#clave, #claveCheck').on('keyup', function () {
   if ($('#clave').val() == $('#claveCheck').val()) {
      $('#message').html('La contraseña coincide.').css('color', 'green');
    } else 
      $('#message').html('La contraseña no coincide.').css('color', 'red');
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
