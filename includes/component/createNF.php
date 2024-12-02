<?php
include './CRUDs/bd.php'; 

$queryTr = "SELECT cnpjTr FROM Transportadores";
$resultTr = $conn->query($queryTr);

$queryEmb = "SELECT cnpjEmb FROM Embarcadores";
$resultEmb = $conn->query($queryEmb);
?>

<div class="card-body">
    <p class="login-box-msg textoPreto"><b>Nova Nota Fiscal</b></p>

    <form action="CRUDs/crNota.php" method="POST">
        <div class="input-group mb-3">
            <input type="number" class="form-control" placeholder="Número da Nota Fiscal" name="num" required>
        </div>
        <div class="input-group mb-3">
            <select class="form-control" name="cnpjEmb" required>
                <option value="">Selecione o CNPJ do Embarcador</option>
                <?php
                if ($resultEmb->num_rows > 0) {
                    while ($row = $resultEmb->fetch_assoc()) {
                        echo "<option value='" . htmlspecialchars($row['cnpjEmb']) . "'>" . htmlspecialchars($row['cnpjEmb']) . "</option>";
                    }
                } else {
                    echo "<option value=''>Nenhum embarcador cadastrado</option>";
                }
                ?>
            </select>
        </div>
        <div class="input-group mb-3">
            <select class="form-control" name="cnpjTr" required>
                <option value="">Selecione o CNPJ do Transportador</option>
                <?php
                if ($resultTr->num_rows > 0) {
                    while ($row = $resultTr->fetch_assoc()) {
                        echo "<option value='" . htmlspecialchars($row['cnpjTr']) . "'>" . htmlspecialchars($row['cnpjTr']) . "</option>";
                    }
                } else {
                    echo "<option value=''>Nenhum transportador cadastrado</option>";
                }
                ?>
            </select>
        </div>
        <div class="mb-3">
            <div class="row">
                <div class="col-8">
                </div>
                <!-- /.col -->
                <div class="col-4">
                    <button type="submit" class="btn btn-primary btn-block">Cadastrar</button>
                </div>
                <!-- /.col -->
            </div>
        </div>
    </form>
</div>

<?php
$conn->close(); 
?>