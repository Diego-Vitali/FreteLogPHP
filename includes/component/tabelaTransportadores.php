<?php
include './CRUDs/bd.php';
$sql = "SELECT * FROM Transportadores";
$result = $conn->query($sql);
?>
<div class="card-body table-responsive p-0">
    <table class="table table-hover text-nowrap">
        <thead>
            <tr>
                <th>CNPJ</th>
                <th>Transportadora</th>
                <th>Cidade</th>
                <th>Estado</th>
                <th>Status</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row['cnpjTr'] . "</td>";
                    echo "<td>" . $row['nomeTr'] . "</td>";
                    echo "<td>" . $row['cidadeTr'] . "</td>";
                    echo "<td>" . $row['estadoTr'] . "</td>";
                    echo "<td>" . $row['statusTr'] . "</td>";
                    echo "<td>";
                    echo "<form action='./ediTr.php' method='GET' style='display:inline;'>";
                    echo "<input type='hidden' name='cnpjTr' value='" . $row['cnpjTr'] . "' />";
                    echo "<button type='submit' class='btn btn-warning btn-sm textoPreto'>Editar</button>";
                    echo "</form>";
                    echo "<form action='./CRUDs/excTransp.php' method='POST' style='display:inline;'>";
                    echo "<input type='hidden' name='cnpjTr' value='" . $row['cnpjTr'] . "' />";
                    echo "<button type='submit' class='btn btn-danger btn-sm textoPreto' onclick='return confirm(\"Tem certeza que deseja excluir este transportador?\");'>Excluir</button>";
                    echo "</form>";
                    echo "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='6'>Nenhum transportador encontrado.</td></tr>";
            }
            ?>
        </tbody>
    </table>
</div>