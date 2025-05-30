<?php
$host = 'localhost';
$user = 'root';
$senha = 'root';
$banco = 'sistema_eleitoral'; 

$con = new mysqli($host, $user, $senha, $banco);

if ($con->connect_error) {
    die("Erro na conexão: " . $con->connect_error);
}
?>
