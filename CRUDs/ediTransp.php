<?php
include './bd.php'; 

$cnpjTr = $_POST['cnpj'] ?? '';
$nomeTr = $_POST['nome'] ?? '';
$cidadeTr = $_POST['cidade'] ?? '';
$estadoTr = $_POST['estado'] ?? '';
$statusTr = $_POST['opcao'] ?? ''; 

if (!empty($cnpjTr) && !empty($nomeTr) && !empty($cidadeTr) && !empty($estadoTr)) {
    $stmt = $conn->prepare("UPDATE Transportadores SET nomeTr = ?, cidadeTr = ?, estadoTr = ?, statusTr = ? WHERE cnpjTr = ?");
    $stmt->bind_param("sssss", $nomeTr, $cidadeTr, $estadoTr, $statusTr, $cnpjTr);

    if ($stmt->execute()) {
        header('Location: ../transportadores.php?msg=Atualização realizada com sucesso!');
    } else {
        echo "Erro ao atualizar o transportador.";
    }

    $stmt->close();
} else {
    echo "Por favor, preencha todos os campos.";
}

$conn->close();
?>