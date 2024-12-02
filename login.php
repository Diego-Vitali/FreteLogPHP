<!DOCTYPE html>
<html lang="pt-br">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Login - FreteLog</title>
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

	<link rel="stylesheet" href="adminlte/plugins/fontawesome-free/css/all.min.css">
	<link rel="stylesheet" href="adminlte/dist/css/adminlte.min.css">
  <link rel="stylesheet" href="css/ind.css">
</head>

<body class="hold-transition content-wrapper login-page">
<div class="login-box content-header">
  <!-- /.login-logo -->
  <div class="card card-outline cardRosa">
    <div class="card-header text-center">
      <a href="index.php" class="h1"><b>Frete</b>Log</a>
    </div>
    <div class="card-body">
      <p class="login-box-msg textoPreto">Faça seu login para acessar a plataforma</p>

      <form action="CRUDs/autenticar.php" method="post">
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Login" name="login">
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Senha" name="senha">
        </div>
        <div class="row">
          <div class="col-8"> 
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Logar</button>
          </div>
          <!-- /.col -->
        </div>
  </form>
      <p class="mb-1">
        <a href="cadastro.php">Fazer cadastro</a>
      </p>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
<!-- /.login-box -->
<!-- jQuery -->
<script src="../adminlte/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../adminlte/dist/js/adminlte.min.js"></script>
</body>
</html>
