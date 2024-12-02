<?php
include 'bd.php';

$cnpj = $_POST['cnpj'] ?? '';
$nome = $_POST['nome'] ?? '';
$segmento = $_POST['segmento'] ?? '';
$cidade = $_POST['cidade'] ?? '';
$estado = $_POST['estado'] ?? '';
$status = $_POST['opcao'] ?? '';

if (!empty($cnpj) && !empty($nome) && !empty($segmento) && !empty($cidade) && !empty($estado) && !empty($status)) {
    $stmt = $conn->prepare("SELECT * FROM Embarcadores WHERE cnpjEmb = ?");
    $stmt->bind_param("s", $cnpj);
    $stmt->execute();
    $resultado = $stmt->get_result();

    if ($resultado->num_rows > 0) {
        echo "Embarcador já cadastrado.";
    } else {
        $stmt = $conn->prepare("INSERT INTO Embarcadores VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssss", $cnpj, $nome, $segmento, $cidade, $estado, $status);
        if ($stmt->execute()) {
            header('Location: ../embarcadores.php');
        } else {
            echo "Erro ao cadastrar o Embarcador.";
        }
    }
} else {
    echo "Por favor, preencha todos os campos.";
}

?>