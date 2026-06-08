<?php

require_once __DIR__ . '/../../config/Conexao.php';
require_once __DIR__ . '/../../models/ProdutoDAO.php';

include __DIR__ . '/../cabecalho.php';

$dao = new ProdutoDAO();

$id = $_GET['id'] ?? 0;

$produto = $dao->obterProdutoPorId($id);

if (!$produto) {

    die('Produto não encontrado');
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $dao->excluirProduto($id);

    header('Location: produtos.php');
    exit;
}
?>

<h2>Deseja excluir?</h2>

<p><?= $produto['nome'] ?></p>

<form method="POST">

```
<button type="submit">
    Confirmar Exclusão
</button>
```

</form>
