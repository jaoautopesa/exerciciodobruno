<?php

require_once __DIR__ . '/../../config/Conexao.php';
require_once __DIR__ . '/../../models/ClienteDAO.php';



$dao = new ClienteDAO();

$clientes = $dao->obterClientes();

?>

<h2>Lista de Clientes</h2>

<a href="index.php?pagina=cadastro_cliente">
    Novo Cliente
    </a>

<br><br>

<table border="1" cellpadding="10">

<tr>
    <th>ID</th>
    <th>Nome</th>
    <th>CPF</th>
    <th>Email</th>
    <th>Telefone</th>
    <th>Endereço</th>
    <th>Ações</th>
</tr>

<?php foreach ($clientes as $cliente): ?>

<tr>


<td><?= $cliente['id'] ?></td>
<td><?= $cliente['nome'] ?></td>
<td><?= $cliente['cpf'] ?></td>
<td><?= $cliente['email'] ?></td>
<td><?= $cliente['telefone'] ?></td>
<td><?= $cliente['endereco'] ?></td>

<td>

    <a href="index.php?pagina=editar_cliente&id=<?= $cliente['id'] ?>">
    Editar
    </a>

    |

    <a href="index.php?pagina=excluir_cliente&id=<?= $cliente['id'] ?>">
    Excluir
    </a>

</td>


</tr>

<?php endforeach; ?>

</table>
