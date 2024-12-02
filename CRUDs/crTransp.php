<?php
include 'bd.php';

$cnpj = $_POST['cnpj'] ?? '';
$nome = $_POST['nome'] ?? '';
$cidade = $_POST['cidade'] ?? '';
$estado = $_POST['estado'] ?? '';
$status = $_POST['opcao'] ?? '';

if (!empty($cnpj) && !empty($nome) && !empty($cidade) && !empty($estado) && !empty($status)) {
    $stmt = $conn->prepare("SELECT * FROM Transportadores WHERE cnpjTr = ?");
    $stmt->bind_param("s", $cnpj);
    $stmt->execute();
    $resultado = $stmt->get_result();

    if ($resultado->num_rows > 0) {
        echo "Transportador já cadastrado.";
    } else {
        $stmt = $conn->prepare("INSERT INTO Transportadores VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("sssss", $cnpj, $nome, $cidade, $estado, $status);
        if ($stmt->execute()) {
            header('Location: ../transportadores.php');
        } else {
            echo "Erro ao cadastrar o Transportador.";
        }
    }
} else {
    echo "Por favor, preencha todos os campos.";
}

?>