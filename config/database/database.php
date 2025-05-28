<?php
$con = new mysqli("127.0.0.1", "root", "", "sistema_eleitoral");

if ($con->connect_error) {
    die("Erro na conexão: " . $con->connect_error);
}
?>
