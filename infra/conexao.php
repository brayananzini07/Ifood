<?php

$host = "localhost";
$user = "root";
$password = '';
database = "ifood";

$conexao = mysqli_connect($host, $user, $password, $database);

if (!$conexao) {
    die("Erro na conexão: " . mysqli_connect_error());
}

?>