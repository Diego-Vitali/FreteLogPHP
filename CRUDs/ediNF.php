<?php
include './bd.php';

$cnpjTr = $_POST['cnpjTr'] ?? '';
$numNF = $_POST['num'] ?? '';

if (!empty($cnpjTr) && !empty($numNF)) { 
    $stmt = $conn->prepare("UPDATE notasfiscais SET cnpjTrNF = ? WHERE numNF = ?");
    $stmt->bind_param("ss", $cnpjTr, $numNF);

    if ($stmt->execute()) {
        header('Location: ../notasfiscais.php?msg=Atualização realizada com sucesso!');
        exit; 
    } else {
        echo "Erro ao atualizar Nota Fiscal.";
    }

    $stmt->close();
} else {
    echo "Por favor, preencha todos os campos.";
}

$conn->close();
?>