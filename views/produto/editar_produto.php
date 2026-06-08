<?php

require_once __DIR__ . '/../../config/Conexao.php';
require_once __DIR__ . '/../../models/ProdutoDAO.php';


$dao = new ProdutoDAO();

$id = $_GET['id'] ?? 0;

$produto = $dao->obterProdutoPorId($id);

if (!$produto) {

    die('Produto não encontrado');
}

$erro = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $nome = trim($_POST['nome'] ?? '');
    $descricao = trim($_POST['descricao'] ?? '');
    $preco = (float) ($_POST['preco'] ?? 0);
    $estoque = (int) ($_POST['estoque'] ?? 0);

    $imagem = $produto['imagem'];

    if (!empty($_FILES['imagem']['name'])) {

        $extensao = pathinfo(
            $_FILES['imagem']['name'],
            PATHINFO_EXTENSION
        );

        $nomeArquivo =
        uniqid('prod_') . '.' . $extensao;

        move_uploaded_file(
            $_FILES['imagem']['tmp_name'],
            'uploads/' . $nomeArquivo
        );

        $imagem = $nomeArquivo;
    }

    $dao->editarProduto(
        $id,
        $nome,
        $descricao,
        $preco,
        $estoque,
        $imagem
    );

    header('Location: index.php?pagina=produtos');
    exit;
}
?>

<h2>Editar Produto</h2>

<form
    method="POST"
    enctype="multipart/form-data"
>


<input
    type="text"
    name="nome"
    value="<?= $produto['nome'] ?>"
>

<br><br>

<textarea
    name="descricao"
><?= $produto['descricao'] ?></textarea>

<br><br>

<input
    type="number"
    step="0.01"
    name="preco"
    value="<?= $produto['preco'] ?>"
>

<br><br>

<input
    type="number"
    name="estoque"
    value="<?= $produto['estoque'] ?>"
>

<br><br>

<input
    type="file"
    name="imagem"
>

<br><br>

<button type="submit">
    Salvar
</button>


</form>
