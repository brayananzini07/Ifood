<?php

include "../infra/conexao.php";

$id = $_GET["id"];

mysqli_query(
    $conexao,
    "DELETE FROM clientes WHERE id_cliente = $id"
);

header("Location: consultar_cliente.php");
exit;