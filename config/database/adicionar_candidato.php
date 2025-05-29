<?php

include 'database.php';


$nome = $_POST['nome'] ?? '';
$partido = $_POST['partido'] ?? '';


if ($nome != '') {

    $stmt = $con->prepare("INSERT INTO candidatos (nome, partido) VALUES (?, ?)");
    $stmt->bind_param("ss", $nome, $partido);


    if ($stmt->execute()) {
 
        header("Location: index.php");
        exit();
    } else {
        echo "Erro ao salvar o candidato: " . $stmt->error;
    }

    $stmt->close();
} else {
    echo "O campo nome é obrigatório!";
}
?>
