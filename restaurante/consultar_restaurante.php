<?php

include "../infra/conexao.php";

$resultado = mysqli_query(
    $conexao,
    "SELECT * FROM restaurantes ORDER BY nome"
);
?>

<h2>Restaurantes</h2>

<a href="cadastrar_restaurante.php">Cadastrar restaurante</a>

<br><br>

<table border="1">

<tr>
    <th>ID</th>
    <th>Nome</th>
    <th>Categoria</th>
    <th>Telefone</th>
    <th>Endereço</th>
    <th>Ações</th>
</tr>

<?php while ($restaurante = mysqli_fetch_assoc($resultado)) { ?>

<tr>

    <td><?= $restaurante["id_restaurante"] ?></td>
    <td><?= $restaurante["nome"] ?></td>
    <td><?= $restaurante["categoria"] ?></td>
    <td><?= $restaurante["telefone"] ?></td>
    <td><?= $restaurante["endereco"] ?></td>

    <td>
        <a href="alterar_restaurante.php?id=<?= $restaurante["id_restaurante"] ?>">
            Alterar
        </a>

        <a href="excluir_restaurante.php?id=<?= $restaurante["id_restaurante"] ?>"
           onclick="return confirm('Deseja excluir este restaurante?')">
           Excluir
        </a>
    </td>

</tr>

<?php } ?>

</table>

<br>

<a href="../index.php">Voltar</a>