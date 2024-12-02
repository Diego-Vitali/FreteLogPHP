<?php
class Database {
    private $host = 'localhost';
    private $db_name = 'FreteLog';
    private $username = 'root'; 
    private $password = ''; 
    public $conn;

    public function getConnection() {
        $this->conn = new mysqli($this->host, $this->username, $this->password, $this->db_name);

        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }

        return $this->conn;
    }
}

class Transportador {
    private $conn;
    private $table_name = "NotasFiscais";

    public function __construct($db) {
        $this->conn = $db;
    }

    public function getTransportadorData() {
        $query = "SELECT cnpjTrNF, COUNT(*) as quantidade 
                  FROM " . $this->table_name . " 
                  GROUP BY cnpjTrNF 
                  ORDER BY quantidade DESC";

        $result = $this->conn->query($query);
        $data = [];

        if ($result) {
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
        }

        return $data;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Desempenho de Transportadores</title>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="./adminlte/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="./adminlte/dist/css/adminlte.min.css">
  <!-- CSS Próprio-->
  <link rel="stylesheet" href="./css/ind.css">
  <script src="adminlte/plugins/chart.js/Chart.min.js"></script>
</head>
<body class="hold-transition sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">

<?php include 'includes/component/navbar.php'?>
<?php include 'includes/component/sidebar.php'?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Desempenho de Transportadores</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
    <?php 
        $database = new Database();
        $db = $database->getConnection();

        $transportador = new Transportador($db);
        $dadosTransportador = $transportador->getTransportadorData();

        $labels = [];
        $quantidades = [];
        foreach ($dadosTransportador as $row) {
            $labels[] = $row['cnpjTrNF'];
            $quantidades[] = $row['quantidade'];
        }
    ?>
    <div class="card card-danger">
        <div class="card-header">
            <h3 class="card-title">Desempenho Geral</h3>
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                    <i class="fas fa-times"></i>
                </button>
            </div>
        </div>
        <div class="card-body">
            <div class="chartjs-size-monitor">
 <div class="chartjs-size-monitor-expand">
                <div class=""></div>
            </div>
            <div class="chartjs-size-monitor-shrink">
                <div class=""></div>
            </div>
        </div>
        <canvas id="donutChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%; display: block;" width="486" height="250" class="chartjs-render-monitor"></canvas>
        </div>
    </div>

    </section>
    <!-- /.content -->
  </div>

  <?php include 'includes/component/footer.php' ?> 

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
<!-- AdminLTE for demo purposes -->
<script src="adminlte/dist/js/demo.js"></script>

<script>
    $(function () {
        var donutChartCanvas = $('#donutChart').get(0).getContext('2d');
        var donutData = {
            labels: <?php echo json_encode($labels); ?>,
            datasets: [{
                data: <?php echo json_encode($quantidades); ?>,
                backgroundColor: ['#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de'],
            }]
        };
        var donutOptions = {
            maintainAspectRatio: false,
            responsive: true,
        };
        new Chart(donutChartCanvas, {
            type: 'doughnut',
            data: donutData,
            options: donutOptions
        });
    });
</script>
</body>
</html>