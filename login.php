<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>SB Admin - Login</title>

  <!-- Custom fonts for this template-->
  <link href="admin/css/all.css" rel="stylesheet" type="text/css">

  <!-- Custom styles for this template-->
  <link href="admin/css/sb-admin.min.css" rel="stylesheet">

</head>

<body class="bg-dark">

  <div class="container">
    <div class="card card-login mx-auto mt-5">
      <div class="card-header">Login</div>
      <div class="card-body">
        <form action="admin/procesos/procesar-usuario.php"  method="POST">
          <div class="form-group">
            <div class="form-label-group">
              <input type="text" name="usuario" class="form-control" id="inputEmail" placeholder="Email address" required="required" autofocus="autofocus">
              <label for="inputEmail">Usuario</label>
            </div>
          </div>
          <div class="form-group">
            <div class="form-label-group">
              <input type="password" class="form-control" id="inputPassword" name="password" placeholder="Password" required="required">
              <label for="inputPassword">Password</label>
            </div>
          </div>
          <div class="form-group">
            <div class="checkbox">
              <label>
                <input type="checkbox" value="remember-me">
                recordar password
              </label>
            </div>
          </div>
          <input type="hidden" name="accion" value="ingresar">
          <input type="submit" class="btn btn-primary btn-block" Value="Login">
        </form>
        <div class="text-center">
          <a class="d-block small" href="forgot-password.html">Olvido su Password?</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="admin/js/jquery.min.js"></script>
  <script src="admin/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="admin/js/jquery.easing.min.js"></script>

</body>

</html>
