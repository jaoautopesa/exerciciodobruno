<?php

require_once __DIR__ . '/../../config/Conexao.php';
require_once __DIR__ . '/../../models/ProdutoDAO.php';

include __DIR__ . '/../cabecalho.php';

$dao = new ProdutoDAO();

$erro = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $nome = trim($_POST['nome'] ?? '');
    $descricao = trim($_POST['descricao'] ?? '');
    $preco = (float) ($_POST['preco'] ?? 0);
    $estoque = (int) ($_POST['estoque'] ?? 0);

    $nomeArquivo = null;

    if ($preco <= 0) {

        $erro = 'Preço inválido';

    } elseif ($estoque < 0) {

        $erro = 'Estoque inválido';
    }

    if (!$erro && !empty($_FILES['imagem']['name'])) {

        $extensao = pathinfo(
            $_FILES['imagem']['name'],
            PATHINFO_EXTENSION
        );

        $permitidos = [
            'jpg',
            'jpeg',
            'png',
            'webp'
        ];

        if (!in_array(
            strtolower($extensao),
            $permitidos
        )) {

            $erro = 'Tipo de imagem inválido';

        } else {

            $nomeArquivo =
            uniqid('prod_') . '.' . $extensao;

            move_uploaded_file(
                $_FILES['imagem']['tmp_name'],
                'uploads/' . $nomeArquivo
            );
        }
    }

    if (!$erro) {

        $dao->cadastrarProduto(
            $nome,
            $descricao,
            $preco,
            $estoque,
            $nomeArquivo
        );

        header('Location: produtos.php');
        exit;
    }
}
?>

<h2>Cadastrar Produto</h2>

<p><?= $erro ?></p>

<form
    method="POST"
    enctype="multipart/form-data"
>

```
<input
    type="text"
    name="nome"
    placeholder="Nome"
>

<br><br>

<textarea
    name="descricao"
    placeholder="Descrição"
></textarea>

<br><br>

<input
    type="number"
    step="0.01"
    name="preco"
    placeholder="Preço"
>

<br><br>

<input
    type="number"
    name="estoque"
    placeholder="Estoque"
>

<br><br>

<input
    type="file"
    name="imagem"
>

<br><br>

<button type="submit">
    Cadastrar
</button>
```

</form>
