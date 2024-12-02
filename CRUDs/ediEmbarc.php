<?php
include './bd.php';

$cnpjEmb = $_POST['cnpj'] ?? '';
$nomeEmb = $_POST['nome'] ?? '';
$segmentoEmb = $_POST['segmento'] ?? '';
$cidadeEmb = $_POST['cidade'] ?? '';
$estadoEmb = $_POST['estado'] ?? '';
$statusEmb = $_POST['opcao'] ?? ''; 

if (!empty($cnpjEmb) && !empty($nomeEmb)&& !empty($segmentoEmb) && !empty($cidadeEmb) && !empty($estadoEmb)) {
    $stmt = $conn->prepare("UPDATE Embarcadores SET nomeEmb = ?, segmentoEmb = ?, cidadeEmb = ?, estadoEmb = ?, statusEmb = ? WHERE cnpjEmb = ?");
    $stmt->bind_param("ssssss", $nomeEmb, $segmentoEmb, $cidadeEmb, $estadoEmb, $statusEmb, $cnpjEmb);

    if ($stmt->execute()) {
        header('Location: ../Embarcadores.php?msg=Atualização realizada com sucesso!');
    } else {
        echo "Erro ao atualizar o Embarcador.";
    }

    $stmt->close();
} else {
    echo "Por favor, preencha todos os campos.";
}

$conn->close();
?>