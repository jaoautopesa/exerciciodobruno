<?php

require_once __DIR__ . '/../../config/Conexao.php';
require_once __DIR__ . '/../../models/ClienteDAO.php';



$erro = '';

$dao = new ClienteDAO();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $nome = trim($_POST['nome'] ?? '');
    $cpf = trim($_POST['cpf'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $telefone = trim($_POST['telefone'] ?? '');
    $endereco = trim($_POST['endereco'] ?? '');

    if (!$nome || !$cpf || !$email) {

        $erro = 'Preencha os campos obrigatórios';

    } elseif (!$dao->validarCPF($cpf)) {

        $erro = 'CPF inválido';

    } else {

        $dao->cadastrarCliente(
            $nome,
            $cpf,
            $email,
            $telefone,
            $endereco
        );

        header('Location: index.php?pagina=clientes');
        exit;
    }
}
?>

<h2>Cadastrar Cliente</h2>

<form method="POST">


<input type="text"
name="nome"
placeholder="Nome">
<br><br>

<input type="text"
name="cpf"
placeholder="CPF">
<br><br>

<input type="email"
name="email"
placeholder="Email">
<br><br>

<input type="text"
name="telefone"
placeholder="Telefone">
<br><br>

<input type="text"
name="endereco"
placeholder="Endereço">
<br><br>

<button type="submit">
    Cadastrar
</button>


</form>

<p><?= $erro ?></p>
