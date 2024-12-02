<?php
  include './CRUDs/bd.php';
  $sql = "SELECT * FROM Embarcadores";
  $result = $conn->query($sql);
?>
<div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                  <thead>
                    <tr>
                      <th>CNPJ</th>
                      <th>Embarcador</th>
                      <th>Segmento</th>
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
                              echo "<td>" . $row['cnpjEmb'] . "</td>";
                              echo "<td>" . $row['nomeEmb'] . "</td>";
                              echo "<td>" . $row['segmentoEmb'] . "</td>";
                              echo "<td>" . $row['cidadeEmb'] . "</td>";
                              echo "<td>" . $row['estadoEmb'] . "</td>";
                              echo "<td>" . $row['statusEmb'] . "</td>";
                              echo "<td>";
                              echo "<form action='./ediEmb.php' method='GET' style='display:inline;'>";
                              echo "<input type='hidden' name='cnpjEmb' value='" . $row['cnpjEmb'] . "' />";
                              echo "<button type='submit' class='btn btn-warning btn-sm textoPreto'>Editar</button>";
                              echo "</form>";
                              echo "<form action='./CRUDs/excEmbarc.php' method='POST' style='display:inline;'>";
                              echo "<input type='hidden' name='cnpjEmb' value='" . $row['cnpjEmb'] . "' />";
                              echo "<button type='submit' class='btn btn-danger btn-sm textoPreto' onclick='return confirm(\"Tem certeza que deseja excluir este embarcador?\");'>Excluir</button>";
                              echo "</form>";
                              echo "</td>";
                              echo "</tr>";
                          }
                      } else {
                          echo "<tr><td colspan='7'>Nenhum embarcador encontrado.</td></tr>";
                      }
                    ?>
                  </tbody>
                </table>
              </div>