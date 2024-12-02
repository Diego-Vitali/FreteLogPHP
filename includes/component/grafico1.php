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
``