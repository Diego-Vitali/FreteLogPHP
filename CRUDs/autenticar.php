<?php
require 'bd.php'; 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['login'] ?? '';
    $senha = $_POST['senha'] ?? '';

    if (!empty($nome) && !empty($senha)) {
        $stmt = $conn->prepare("SELECT SenhaUsu FROM usuarios WHERE NomeUsu = ?");
        $stmt->bind_param("s", $nome);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            $stmt->bind_result($senha_hash);
            $stmt->fetch();

            if ($senha === $senha_hash) {
                echo "Login bem-sucedido!";
                header('Location: ../notasfiscais.php');
                exit;
            } else {
                echo "Senha incorreta.";
            }
        } else {
            echo "Usuário não encontrado.";
        }

        $stmt->close();
    } else {
        echo "Por favor, preencha todos os campos.";
    }
}

$conn->close();
?>
