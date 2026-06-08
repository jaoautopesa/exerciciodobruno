<?php

require_once __DIR__ . '/../../config/Conexao.php';
require_once __DIR__ . '/../../models/ClienteDAO.php';



$dao = new ClienteDAO();

$id = $_GET['id'] ?? 0;

$cliente = $dao->obterClientePorId($id);

if (!$cliente) {
    die('Cliente não encontrado');
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $dao->excluirCliente($id);

    header('Location: index.php?pagina=clientes');
    exit;
}
?>

<h2>Deseja excluir?</h2>

<p><?= $cliente['nome'] ?></p>

<form method="POST">

```
<button type="submit">
    Confirmar Exclusão
</button>
```

</form>
