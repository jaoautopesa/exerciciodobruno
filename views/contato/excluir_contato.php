<?php

error_reporting(E_ALL);

ini_set('display_errors', 1);

require_once __DIR__ . '/../../config/Conexao.php';
require_once __DIR__ . '/../../models/ContatoDAO.php';

include __DIR__ . '/../cabecalho.php';

$dao = new ContatoDAO();

$id = $_GET['id'] ?? 0;

$contato = $dao->obterContatoPorId($id);

if (!$contato) {

    die('Contato não encontrado');
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $dao->excluirContato($id);

    header('Location: index.php?pagina=contatos');
    exit;
}
?>

<h2>Deseja excluir este contato?</h2>

<p>

```
<?= $contato['nome'] ?>
```

</p>

<form method="POST">

```
<button type="submit">
    Confirmar Exclusão
</button>
```

</form>
