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

    $dao->editarCliente(
        $id,
        $_POST['nome'],
        $_POST['cpf'],
        $_POST['email'],
        $_POST['telefone'],
        $_POST['endereco']
    );

    header('Location: index.php?pagina=clientes');
    exit;
}
?>

<form method="POST">


<input type="text"
name="nome"
value="<?= $cliente['nome'] ?>">

<br><br>

<input type="text"
name="cpf"
value="<?= $cliente['cpf'] ?>">

<br><br>

<input type="email"
name="email"
value="<?= $cliente['email'] ?>">

<br><br>

<input type="text"
name="telefone"
value="<?= $cliente['telefone'] ?>">

<br><br>

<input type="text"
name="endereco"
value="<?= $cliente['endereco'] ?>">

<br><br>

<button type="submit">
    Salvar
</button>
```

</form>
