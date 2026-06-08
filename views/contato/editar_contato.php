<?php

error_reporting(E_ALL);

ini_set('display_errors', 1);

require_once __DIR__ . '/../../config/Conexao.php';
require_once __DIR__ . '/../../models/ContatoDAO.php';


$dao = new ContatoDAO();

$id = $_GET['id'] ?? 0;

$contato = $dao->obterContatoPorId($id);

if (!$contato) {

    die('Contato não encontrado');
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $nome = trim($_POST['nome'] ?? '');

    $email = trim($_POST['email'] ?? '');

    $telefone = trim($_POST['telefone'] ?? '');

    $dao->editarContato(
        $id,
        $nome,
        $email,
        $telefone
    );

     header('Location: index.php?pagina=contatos');
     exit;
}
?>

<h2>Editar Contato</h2>

<form method="POST">


<input
    type="text"
    name="nome"
    value="<?= $contato['nome'] ?>"
>

<br><br>

<input
    type="email"
    name="email"
    value="<?= $contato['email'] ?>"
>

<br><br>

<input
    type="text"
    name="telefone"
    value="<?= $contato['telefone'] ?>"
>

<br><br>

<button type="submit">
    Salvar
</button>


</form>
