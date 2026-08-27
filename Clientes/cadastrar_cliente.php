<?php

include "../infra/conexao.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $telefone = $_POST["telefone"];
    $endereco = $_POST["endereco"];

    $sql = "INSERT INTO clientes (nome, email, telefone, endereco)
            VALUES ('$nome', '$email', '$telefone', '$endereco')";

    if (mysqli_query($conexao, $sql)) {
        header("Location: consultar_cliente.php");
        exit;
    }
}
?>

<h2>Cadastrar Cliente</h2>

<form method="POST">

    Nome:
    <input type="text" name="nome" required><br><br>

    Email:
    <input type="email" name="email" required><br><br>

    Telefone:
    <input type="text" name="telefone" required><br><br>

    Endereço:
    <input type="text" name="endereco" required><br><br>

    <button type="submit">Cadastrar</button>

</form>

<br>

<a href="../index.php">Voltar</a>