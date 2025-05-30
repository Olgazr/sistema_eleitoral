<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include '../config/database/database.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['nome'] ?? '';
    $partido = $_POST['partido'] ?? '';

    if (!empty($nome) && !empty($partido)) {
        $stmt = $con->prepare("INSERT INTO candidatos (nome, partido) VALUES (?, ?)");
        $stmt->bind_param("ss", $nome, $partido);

        if ($stmt->execute()) {
            header("Location: index.php"); // Redireciona de volta à lista
            exit;
        } else {
            echo "Erro ao inserir candidato.";
        }
    } else {
        echo "Por favor, preencha todos os campos.";
    }
} else {
    echo "Requisição inválida.";
}
?>
