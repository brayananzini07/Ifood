<?php

include "../infra/conexao.php";

$id = $_GET["id"];

mysqli_query(
    $conexao,
    "DELETE FROM pedidos WHERE id_pedido = $id"
);

header("Location: consultar_pedido.php");
exit;