<?php
include 'bd.php';

$cnpjEmb = $_POST['cnpjEmb'] ?? '';
$cnpjTr = $_POST['cnpjTr'] ?? '';
$numNF = $_POST['num'] ?? '';

if (!empty($cnpjEmb) && !empty($cnpjTr) && !empty($numNF)) {
    $stmt = $conn->prepare("SELECT * FROM NotasFiscais WHERE NumNF = ?");
    $stmt->bind_param("s", $numNF);
    $stmt->execute();
    $resultado = $stmt->get_result();

    if ($resultado->num_rows > 0) {
        echo "Nota Fiscal já cadastrada.";
    } else {
        $stmt = $conn->prepare("INSERT INTO NotasFiscais VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $numNF, $cnpjEmb, $cnpjTr);
        if ($stmt->execute()) {
            header('Location: ../notasfiscais.php');
            exit;
        } else {
            echo "Erro ao cadastrar Nota.";
        }
    }
} else {
    echo "Por favor, preencha todos os campos.";
}

$stmt->close();
$conn->close();
?>