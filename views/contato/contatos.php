<?php

require_once __DIR__ . '/../../config/Conexao.php';
require_once __DIR__ . '/../../models/ContatoDAO.php';



$dao = new ContatoDAO();

$busca = trim($_GET['busca'] ?? '');

$paginaAtual = (int) ($_GET['p'] ?? 1);

$porPagina = 10;

$contatos = $dao->obterContatos(
    $busca,
    $paginaAtual,
    $porPagina
);

$totalContatos = $dao->contarContatos($busca);

$totalPaginas = ceil(
    $totalContatos / $porPagina
);

?>

<h2>Lista de Contatos</h2>

<a href="index.php?pagina=cadastro_contato" class="btn-novo">
    Novo Contato
</a>

<br><br>

<form method="GET">

    <input
        type="hidden"
        name="pagina"
        value="contatos"
    >

    <input
        type="text"
        name="busca"
        placeholder="Buscar contato"
        value="<?= $busca ?>"
    >

    <button type="submit">
        Buscar
    </button>

</form>

<br>

<table border="1" cellpadding="10">

<tr>
    <th>ID</th>
    <th>Nome</th>
    <th>Email</th>
    <th>Telefone</th>
    <th>Ações</th>
</tr>

<?php foreach ($contatos as $contato): ?>

<tr>

    <td><?= $contato['id'] ?></td>

    <td><?= $contato['nome'] ?></td>

    <td><?= $contato['email'] ?></td>

    <td><?= $contato['telefone'] ?></td>

    <td>
        

        <a href="index.php?pagina=editar_contato&id=<?= $contato['id'] ?>">
            Editar
        </a>

        |

        <a href="index.php?pagina=excluir_contato&id=<?= $contato['id'] ?>">
            Excluir
        </a>

    </td>

</tr>

<?php endforeach; ?>

</table>

<br>

<?php if ($totalPaginas > 1): ?>

    <?php for ($i = 1; $i <= $totalPaginas; $i++): ?>

        <a href="?pagina=contatos&p=<?= $i ?>&busca=<?= $busca ?>">
            <?= $i ?>
        </a>

    <?php endfor; ?>

<?php endif; ?>