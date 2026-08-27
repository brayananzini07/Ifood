<?php

include "../infra/conexao.php";

$id = $_GET["id"];

$pedido_resultado = mysqli_query(
    $conexao,
    "SELECT * FROM pedidos WHERE id_pedido = $id"
);

$pedido = mysqli_fetch_assoc($pedido_resultado);

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

    $sql = "UPDATE pedidos SET
            cliente_id = '$cliente_id',
            restaurante_id = '$restaurante_id',
            valor = '$valor',
            status = '$status'
            WHERE id_pedido = $id";

    mysqli_query($conexao, $sql);

    header("Location: consultar_pedido.php");
    exit;
}
?>

<h2>Alterar Pedido</h2>

<form method="POST">

    Cliente:

    <select name="cliente_id">

        <?php while ($cliente = mysqli_fetch_assoc($clientes)) { ?>

            <option value="<?= $cliente["id_cliente"] ?>"
                <?= $cliente["id_cliente"] == $pedido["cliente_id"] ? "selected" : "" ?>>

                <?= $cliente["nome"] ?>

            </option>

        <?php } ?>

    </select>

    <br><br>

    Restaurante:

    <select name="restaurante_id">

        <?php while ($restaurante = mysqli_fetch_assoc($restaurantes)) { ?>

            <option value="<?= $restaurante["id_restaurante"] ?>"
                <?= $restaurante["id_restaurante"] == $pedido["restaurante_id"] ? "selected" : "" ?>>

                <?= $restaurante["nome"] ?>

            </option>

        <?php } ?>

    </select>

    <br><br>

    Valor:

    <input type="number"
           name="valor"
           step="0.01"
           value="<?= $pedido["valor"] ?>">

    <br><br>

    Status:

    <select name="status">

        <option <?= $pedido["status"] == "Recebido" ? "selected" : "" ?>>
            Recebido
        </option>

        <option <?= $pedido["status"] == "Em preparo" ? "selected" : "" ?>>
            Em preparo
        </option>

        <option <?= $pedido["status"] == "Saiu para entrega" ? "selected" : "" ?>>
            Saiu para entrega
        </option>

        <option <?= $pedido["status"] == "Entregue" ? "selected" : "" ?>>
            Entregue
        </option>

        <option <?= $pedido["status"] == "Cancelado" ? "selected" : "" ?>>
            Cancelado
        </option>

    </select>

    <br><br>

    <button type="submit">Salvar</button>

</form>