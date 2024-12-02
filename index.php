<!DOCTYPE html>
<html lang="pt-br">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Login</title>
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

	<link rel="stylesheet" href="adminlte/plugins/fontawesome-free/css/all.min.css">
	<link rel="stylesheet" href="adminlte/dist/css/adminlte.min.css">
  <link rel="stylesheet" href="css/ind.css">
  
  
</head>

<body class="layout-top-nav control-sidebar-slide-open layout-navbar-fixed" style="height: auto;">
<div class="wrapper">

<?php include 'includes\component\navbarindex.php' ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" style="min-height: 1145.31px;">
    <div class="content-header2 content-header">
      <div class="texto-ini" id="fretelog">
        <h1 class="m-0"> Frete Log <small>- Sistema de Gerenciamento de Transporte</small></h1>
      </div>
      <div class="texto-ini">
        <h2>Otimize seu frete, maximize seu lucro.</h2>
        <h2>Na Frete Log, entendemos que a logística eficiente é a espinha dorsal de qualquer operação bem-sucedida. Com uma equipe experiente e apaixonada por soluções logísticas, estamos aqui para transformar a forma como você gerencia o frete e os transportes da sua empresa.</h2>
      </div>
      <?php include 'includes/component/carroselindex.php' ?>
      <div class="texto-ini">
        <ul class="navbar-nav ml-auto">
          <a href="contato.php" class="btn btn-block btn-info btn-contato">Fale Conosco!<a>
        </ul>
      </div>
    </div>
  </div>





<?php include 'includes\component\footer.php' ?> 
<!-- ./wrapper -->
</body>
<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="adminlte/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="adminlte/dist/js/adminlte.min.js"></script>



</body>

</html>