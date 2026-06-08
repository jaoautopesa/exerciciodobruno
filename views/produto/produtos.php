<?php

require_once __DIR__ . '/../../config/Conexao.php';
require_once __DIR__ . '/../../models/ProdutoDAO.php';



$dao = new ProdutoDAO();

$produtos = $dao->obterProdutos();

?>

<h2>Lista de Produtos</h2>

 <a href="index.php?pagina=cadastro_produto" class="btn-novo">
    Novo Produto
    </a>



<br><br>

<table border="1" cellpadding="10">

<tr>
    <th>ID</th>
    <th>Imagem</th>
    <th>Nome</th>
    <th>Descrição</th>
    <th>Preço</th>
    <th>Estoque</th>
    <th>Ações</th>
</tr>

<?php foreach ($produtos as $produto): ?>

<tr>

<td><?= $produto['id'] ?></td>

<td>

    <?php if ($produto['imagem']): ?>

        <img
            src="uploads/<?= $produto['imagem'] ?>"
            width="80"
        >

    <?php endif; ?>

</td>

<td><?= $produto['nome'] ?></td>

<td><?= $produto['descricao'] ?></td>

<td>
    R$ <?= number_format(
        $produto['preco'],
        2,
        ',',
        '.'
    ) ?>
</td>

<td><?= $produto['estoque'] ?></td>

<td>

    <a href="index.php?pagina=editar_produto&id=<?= $produto['id'] ?>">
    Editar
    </a>

    |

    <a href="index.php?pagina=excluir_produto&id=<?= $produto['id'] ?>">
    Excluir
    </a>

</td>

</tr>

<?php endforeach; ?>

</table>
