<?php

include "../infra/conexao.php";

$id = $_GET["id"];

mysqli_query(
    $conexao,
    "DELETE FROM restaurantes WHERE id_restaurante = $id"
);

header("Location: consultar_restaurante.php");
exit;