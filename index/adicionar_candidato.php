<?php
include 'database.php';

$nome = $_POST['nome'];
$partido = $_POST['partido'];
$imagem = $_POST['imagem'];

$sql = "INSERT INTO candidatos (nome, partido, imagem) VALUES (?, ?, ?)";
$stmt = $con->prepare($sql);
$stmt->bind_param("sss", $nome, $partido, $imagem);
$stmt->execute();

header("Location: ../index/index.php");
exit();
?>
