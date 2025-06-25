<?php
$servidor = "localhost";
$user = "root";
$base = "db_Ponto";
$pass = "";

$con = new mysqli($servidor, $user, $pass, $base);

if (!$con) {
    echo "ERRO DE CONEXÃO!";
}
?>
