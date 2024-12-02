<?php
    include 'bd.php';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $numNF = $_POST['numNF'] ?? '';

        if (!empty($numNF)) {
            $stmt = $conn->prepare("DELETE FROM notasfiscais WHERE numNF = ?");
            $stmt->bind_param("i", $numNF);

            if ($stmt->execute()) {
                echo "Nota Fiscal excluída com sucesso!";
            } else {
                echo "Erro ao excluir Nota Fiscal.";
            }

            $stmt->close();
        } else {
            echo "NF não Encontrada.";
        }
    }

    $conn->close();

    header('Location: ../notasfiscais.php'); 
    exit;
?>