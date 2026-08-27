<?php

include "../infra/conexao.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nome = $_POST["nome"];
    $categoria = $_POST["categoria"];
    $telefone = $_POST["telefone"];
    $endereco = $_POST["endereco"];

    $sql = "INSERT INTO restaurantes
            (nome, categoria, telefone, endereco)
            VALUES ('$nome', '$categoria', '$telefone', '$endereco')";

    mysqli_query($conexao, $sql);

    header("Location: consultar_restaurante.php");
    exit;
}
?>

<h2>Cadastrar Restaurante</h2>

<form method="POST">

    Nome:
    <input type="text" name="nome" required><br><br>

    Categoria:
    <input type="text" name="categoria" required><br><br>

    Telefone:
    <input type="text" name="telefone" required><br><br>

    Endereço:
    <input type="text" name="endereco" required><br><br>

    <button type="submit">Cadastrar</button>

</form>

<br>

<a href="../index.php">Voltar</a>