<?php
include 'bd.php';

$nome = $_POST['login'] ?? '';
$senha = $_POST['senha'] ?? '';

if (!empty($nome) && !empty($senha)) {
    $stmt = $conn->prepare("SELECT * FROM usuarios WHERE NomeUsu = ?");
    $stmt->bind_param("s", $nome);
    $stmt->execute();
    $resultado = $stmt->get_result();

    if ($resultado->num_rows > 0) {
        echo "Usuário já cadastrado.";
    } else {
        $stmt = $conn->prepare("INSERT INTO usuarios (NomeUsu, SenhaUsu) VALUES (?, ?)");
        $stmt->bind_param("ss", $nome, $senha);

        if ($stmt->execute()) {
            header('Location: ../index.php');
        } else {
            echo "Erro ao cadastrar o usuário.";
        }
    }
} else {
    echo "Por favor, preencha todos os campos.";
}

?>