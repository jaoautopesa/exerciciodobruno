<?php

error_reporting(E_ALL);

ini_set('display_errors', 1);

require_once __DIR__ . '/../../config/Conexao.php';
require_once __DIR__ . '/../../models/ContatoDAO.php';

include __DIR__ . '/../cabecalho.php';

$erro = '';

$dao = new ContatoDAO();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $nome = trim($_POST['nome'] ?? '');

    $email = trim($_POST['email'] ?? '');

    $telefone = trim($_POST['telefone'] ?? '');

    if (!$nome || !$email) {

        $erro = 'Nome e email são obrigatórios';

    } else {

        $dao->cadastrarContato(
            $nome,
            $email,
            $telefone
        );

        header('Location: index.php?pagina=contatos');
        exit;
    }
}
?>

<h2>Novo Contato</h2>

<p><?= $erro ?></p>

<form method="POST">

```
<input
    type="text"
    name="nome"
    placeholder="Nome"
>

<br><br>

<input
    type="email"
    name="email"
    placeholder="Email"
>

<br><br>

<input
    type="text"
    name="telefone"
    placeholder="Telefone"
>

<br><br>

<button type="submit">
    Cadastrar
</button>
```

</form>
