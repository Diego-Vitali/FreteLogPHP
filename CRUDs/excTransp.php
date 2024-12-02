<?php
    include 'bd.php';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $cnpjTr = $_POST['cnpjTr'] ?? '';

        if (!empty($cnpjTr)) {
            $stmt = $conn->prepare("DELETE FROM Transportadores WHERE cnpjTr = ?");
            $stmt->bind_param("s", $cnpjTr);

            if ($stmt->execute()) {
                echo "Transportador excluído com sucesso!";
            } else {
                echo "Erro ao excluir o transportador.";
            }

            $stmt->close();
        } else {
            echo "CNPJ não fornecido.";
        }
    }

    $conn->close();

    header('Location: ../transportadores.php'); 
    exit;
?>