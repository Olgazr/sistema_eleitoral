<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include '../config/database/database.php';

$nome = $_POST['nome'] ?? '';
$partido = $_POST['partido'] ?? '';
$imagem = $_POST['imagem'] ?? '';

if (!empty($nome) && !empty($partido)) {
    $stmt = $con->prepare("INSERT INTO candidatos (nome, partido, imagem) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $nome, $partido, $imagem);
    $stmt->execute();
    header("Location: index.php");
    exit;
} else {
    echo "Todos os campos são obrigatórios.";
}

