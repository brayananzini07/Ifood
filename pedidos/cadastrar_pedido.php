<?php

include "../infra/conexao.php";

$clientes = mysqli_query(
    $conexao,
    "SELECT * FROM clientes ORDER BY nome"
);

$restaurantes = mysqli_query(
    $conexao,
    "SELECT * FROM restaurantes ORDER BY nome"
);

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $cliente_id = $_POST["cliente_id"];
    $restaurante_id = $_POST["restaurante_id"];
    $valor = $_POST["valor"];
    $status = $_POST["status"];

    $sql = "INSERT INTO pedidos
            (cliente_id, restaurante_id, valor, status)
            VALUES
            ('$cliente_id', '$restaurante_id', '$valor', '$status')";

    mysqli_query($conexao, $sql);

    header("Location: consultar_pedido.php");
    exit;
}
?>

<h2>Cadastrar Pedido</h2>

<form method="POST">

    Cliente:

    <select name="cliente_id" required>

        <option value="">Selecione</option>

        <?php while ($cliente = mysqli_fetch_assoc($clientes)) { ?>

            <option value="<?= $cliente["id_cliente"] ?>">
                <?= $cliente["nome"] ?>
            </option>

        <?php } ?>

    </select>

    <br><br>

    Restaurante:

    <select name="restaurante_id" required>

        <option value="">Selecione</option>

        <?php while ($restaurante = mysqli_fetch_assoc($restaurantes)) { ?>

            <option value="<?= $restaurante["id_restaurante"] ?>">
                <?= $restaurante["nome"] ?>
            </option>

        <?php } ?>

    </select>

    <br><br>

    Valor:
    <input type="number" name="valor" step="0.01" required>

    <br><br>

    Status:

    <select name="status" required>
        <option value="Recebido">Recebido</option>
        <option value="Em preparo">Em preparo</option>
        <option value="Saiu para entrega">Saiu para entrega</option>
        <option value="Entregue">Entregue</option>
        <option value="Cancelado">Cancelado</option>
    </select>

    <br><br>

    <button type="submit">Cadastrar pedido</button>

</form>

<br>

<a href="../index.php">Voltar</a>