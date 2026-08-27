<?php

include "../infra/conexao.php";

$id = $_GET["id"];

$resultado = mysqli_query(
    $conexao,
    "SELECT * FROM clientes WHERE id_cliente = $id"
);

$cliente = mysqli_fetch_assoc($resultado);

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $telefone = $_POST["telefone"];
    $endereco = $_POST["endereco"];

    $sql = "UPDATE clientes SET
            nome = '$nome',
            email = '$email',
            telefone = '$telefone',
            endereco = '$endereco'
            WHERE id_cliente = $id";

    mysqli_query($conexao, $sql);

    header("Location: consultar_cliente.php");
    exit;
}
?>

<h2>Alterar Cliente</h2>

<form method="POST">

    Nome:
    <input type="text" name="nome" value="<?= $cliente["nome"] ?>" required><br><br>

    Email:
    <input type="email" name="email" value="<?= $cliente["email"] ?>" required><br><br>

    Telefone:
    <input type="text" name="telefone" value="<?= $cliente["telefone"] ?>" required><br><br>

    Endereço:
    <input type="text" name="endereco" value="<?= $cliente["endereco"] ?>" required><br><br>

    <button type="submit">Salvar</button>

</form>