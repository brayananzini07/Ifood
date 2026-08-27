<?php

include "../infra/conexao.php";

$id = $_GET["id"];

$resultado = mysqli_query(
    $conexao,
    "SELECT * FROM restaurantes WHERE id_restaurante = $id"
);

$restaurante = mysqli_fetch_assoc($resultado);

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nome = $_POST["nome"];
    $categoria = $_POST["categoria"];
    $telefone = $_POST["telefone"];
    $endereco = $_POST["endereco"];

    $sql = "UPDATE restaurantes SET
            nome = '$nome',
            categoria = '$categoria',
            telefone = '$telefone',
            endereco = '$endereco'
            WHERE id_restaurante = $id";

    mysqli_query($conexao, $sql);

    header("Location: consultar_restaurante.php");
    exit;
}
?>

<h2>Alterar Restaurante</h2>

<form method="POST">

    Nome:
    <input type="text" name="nome" value="<?= $restaurante["nome"] ?>" required><br><br>

    Categoria:
    <input type="text" name="categoria" value="<?= $restaurante["categoria"] ?>" required><br><br>

    Telefone:
    <input type="text" name="telefone" value="<?= $restaurante["telefone"] ?>" required><br><br>

    Endereço:
    <input type="text" name="endereco" value="<?= $restaurante["endereco"] ?>" required><br><br>

    <button type="submit">Salvar</button>

</form>