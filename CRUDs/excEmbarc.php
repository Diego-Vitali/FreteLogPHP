<?php
    include 'bd.php';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $cnpjEmb = $_POST['cnpjEmb'] ?? '';

        if (!empty($cnpjEmb)) {
            $stmt = $conn->prepare("DELETE FROM Embarcadores WHERE cnpjEmb = ?");
            $stmt->bind_param("s", $cnpjEmb);

            if ($stmt->execute()) {
                echo "Embarcador excluído com sucesso!";
            } else {
                echo "Erro ao excluir o Embarcador.";
            }

            $stmt->close();
        } else {
            echo "CNPJ não fornecido.";
        }
    }

    $conn->close();

    header('Location: ../Embarcadores.php'); 
    exit;
?>