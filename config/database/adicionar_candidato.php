<?php
include 'database.php';

$nome = $_POST['nome'];
$partido = $_POST['partido'];

$sql = "INSERT INTO candidatos (nome, partido) VALUES ('$nome', '$partido')";
$con->query($sql);

header('Location: ../../index/index.php');
exit;
?>
