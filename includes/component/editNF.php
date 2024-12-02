
<?php 
    $resultTr = $conn->query("SELECT cnpjTr FROM transportadores");
?>
<div class="card-body">
    <p class="login-box-msg textoPreto"><b>Editar Nota Fiscal</b></p>

    <form action="CRUDs/ediNF.php" method="POST">
        <div class="input-group mb-3">
            <input type="number" class="form-control" placeholder="Número da Nota Fiscal" name="num" value="<?= htmlspecialchars($row['numNF']); ?>" readonly required>
        </div>
        <div class="input-group mb-3">
            <select class="form-control" name="cnpjEmb" readonly required>
                <option value="<?= htmlspecialchars($row['cnpjEmbNF']); ?>"><?= htmlspecialchars($row['cnpjEmbNF']); ?></option>
            </select>
        </div>
        <div class="input-group mb-3">
            <select class="form-control" name="cnpjTr" required>
                <option value="">Selecione o CNPJ do Transportador</option>
                <?php
                if ($resultTr->num_rows > 0) {
                    echo "<option value='" . htmlspecialchars($row['cnpjTrNF']) . "' selected>" . htmlspecialchars($row['cnpjTrNF']) . "</option>";
                    while ($rowTr = $resultTr->fetch_assoc()) {
                        if ($rowTr['cnpjTr'] !== $row['cnpjTrNF']) {
                            echo "<option value='" . htmlspecialchars($rowTr['cnpjTr']) . "'>" . htmlspecialchars($rowTr['cnpjTr']) . "</option>";
                        }
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
                    <button type="submit" class="btn btn-primary btn-block">Salvar</button> <!-- Alterado para "Salvar" -->
                </div>
                <!-- /.col -->
            </div>
        </div>
    </form>
</div>