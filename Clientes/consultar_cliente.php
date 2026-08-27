<?php

include "../infra/conexao.php";

$sql = "SELECT * FROM clientes ORDER BY nome";
$resultado = mysqli_query($conexao, $sql);

?>

<h2>Clientes</h2>

<a href="cadastrar_cliente.php">Cadastrar cliente</a>

<br><br>

<table border="1">

<tr>
    <th>ID</th>
    <th>Nome</th>
    <th>Email</th>
    <th>Telefone</th>
    <th>Endereço</th>
    <th>Ações</th>
</tr>

<?php while ($cliente = mysqli_fetch_assoc($resultado)) { ?>

<tr>

    <td><?= $cliente["id_cliente"] ?></td>
    <td><?= $cliente["nome"] ?></td>
    <td><?= $cliente["email"] ?></td>
    <td><?= $cliente["telefone"] ?></td>
    <td><?= $cliente["endereco"] ?></td>

    <td>
        <a href="alterar_cliente.php?id=<?= $cliente["id_cliente"] ?>">Alterar</a>

        <a href="excluir_cliente.php?id=<?= $cliente["id_cliente"] ?>"
           onclick="return confirm('Deseja excluir este cliente?')">
           Excluir
        </a>
    </td>

</tr>

<?php } ?>

</table>

<br>

<a href="../index.php">Voltar</a>