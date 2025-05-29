<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

echo "Caminho atual: " . __DIR__ . "<br>";
echo "Tentando incluir: " . __DIR__ . '/../database.php' . "<br>";

include __DIR__ . '/../database.php';

echo "Incluído com sucesso!";
