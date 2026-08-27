<?php

include "../infra/conexao.php";

$sql = "SELECT
            pedidos.id_pedido,
            clientes.nome AS cliente,
            restaurantes.nome AS restaurante,
            pedidos.data_pedido,
            pedidos.valor,
            pedidos.status

        FROM pedidos

        INNER JOIN clientes
        ON pedidos.cliente_id = clientes.id_cliente

        INNER JOIN restaurantes
        ON pedidos.restaurante_id = restaurantes.id_restaurante

        ORDER BY pedidos.id_pedido DESC";

$resultado = mysqli_query($conexao, $sql);
?>

<h2>Pedidos</h2>

<a href="cadastrar_pedido.php">Cadastrar pedido</a>

<br><br>

<table border="1">

<tr>
    <th>Pedido</th>
    <th>Cliente</th>
    <th>Restaurante</th>
    <th>Data</th>
    <th>Valor</th>
    <th>Status</th>
    <th>Ações</th>
</tr>

<?php while ($pedido = mysqli_fetch_assoc($resultado)) { ?>

<tr>

    <td><?= $pedido["id_pedido"] ?></td>

    <td><?= $pedido["cliente"] ?></td>

    <td><?= $pedido["restaurante"] ?></td>

    <td><?= $pedido["data_pedido"] ?></td>

    <td>R$ <?= number_format($pedido["valor"], 2, ",", ".") ?></td>

    <td><?= $pedido["status"] ?></td>

    <td>

        <a href="alterar_pedido.php?id=<?= $pedido["id_pedido"] ?>">
            Alterar
        </a>

        <a href="excluir_pedido.php?id=<?= $pedido["id_pedido"] ?>"
           onclick="return confirm('Deseja excluir este pedido?')">
           Excluir
        </a>

    </td>

</tr>

<?php } ?>

</table>

<br>

<a href="por_cliente.php">Ver pedidos por cliente</a>

<br><br>

<a href="../index.php">Voltar</a>