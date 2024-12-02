<?php
  include './CRUDs/bd.php';
  $sql = "SELECT numNF, cnpjEmbNF, cnpjTrNF FROM NotasFiscais";
  $result = $conn->query($sql);
?>
<div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                  <thead>
                    <tr>
                      <th>Numero NF</th>
                      <th>Embarcador</th>
                      <th>Transportador</th>
                      <th>Ações</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                      if ($result->num_rows > 0) {
                          while ($row = $result->fetch_assoc()) {
                              echo "<tr>";
                              echo "<td>" . $row['numNF'] . "</td>";
                              echo "<td>" . $row['cnpjEmbNF'] . "</td>";
                              echo "<td>" . $row['cnpjTrNF'] . "</td>";
                              echo "<td>";
                              echo "<form action='./ediNF.php' method='GET' style='display:inline;'>";
                              echo "<input type='hidden' name='numNF' value='" . $row['numNF'] . "' />";
                              echo "<button type='submit' class='btn btn-warning btn-sm textoPreto'>Editar</button>";
                              echo "</form>";
                              echo "<form action='./CRUDs/excNF.php' method='POST' style='display:inline;'>";
                              echo "<input type='hidden' name='numNF' value='" . $row['numNF'] . "' />";
                              echo "<button type='submit' class='btn btn-danger btn-sm textoPreto' onclick='return confirm(\"Tem certeza que deseja excluir esta NF?\");'>Excluir</button>";
                              echo "</form>";
                              echo "</td>";
                              echo "</tr>";
                          }
                      } else {
                          echo "<tr><td colspan='4'>Nenhuma nota fiscal encontrada.</td></tr>";
                      }
                    ?>
                  </tbody>
                </table>
              </div>