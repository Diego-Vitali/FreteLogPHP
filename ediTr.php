<?php
include 'CRUDs/bd.php';

$cnpjTr = $_GET['cnpjTr'] ?? '';

if (!empty($cnpjTr)) {
    $stmt = $conn->prepare("SELECT * FROM Transportadores WHERE cnpjTr = ?");
    $stmt->bind_param("s", $cnpjTr);
    $stmt->execute();
    $resultado = $stmt->get_result();

    if ($resultado->num_rows > 0) {
        $row = $resultado->fetch_assoc();
    } else {
        echo "Transportador não encontrado.";
        exit;
    }
} else {
    echo "CNPJ não fornecido.";
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Listagem de Transportadores</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="adminlte/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="adminlte/dist/css/adminlte.min.css">
  <!-- CSS Próprio-->
  <link rel="stylesheet" href="css\ind.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script>
      function mascaraCNPJ(cnpj) {
          cnpj = cnpj.replace(/\D/g, ""); 
          cnpj = cnpj.replace(/^(\d{2})(\d)/, "$1.$2");
          cnpj = cnpj.replace(/^(\d{2})\.(\d{3})(\d)/, "$1.$2.$3");
          cnpj = cnpj.replace(/\.(\d{3})(\d)/, ".$1/$2");
          cnpj = cnpj.replace(/(\d{4})(\d)/, "$1-$2");
          return cnpj;
      }

      $(document).ready(function() {
          $("#cnpj").on("input", function() {
              this.value = mascaraCNPJ(this.value);
          });
      });
  </script>
</head>
<body class="hold-transition sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">

<?php include 'includes\component\navbar.php'?>
<?php include 'includes\component\sidebar.php'?>


  <div class="content-wrapper">

    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Editar Transportador</h1>
          </div>
          <a href="transportadores.php" style="margin-left:140vh" class="btn">Retornar a Listagem</a>
        </div>
      </div>
    </section>

    <!-- Main content -->
    <section class="content">
 <?php include 'includes\component\editTransp.php' ?>

    </section>
    <!-- /.content -->
  </div>

  <?php include 'includes\component\footer.php' ?> 

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="adminlte/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="adminlte/dist/js/adminlte.min.js"></script>

</body>
</html>


