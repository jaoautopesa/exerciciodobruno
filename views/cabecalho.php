<!DOCTYPE html>
<html lang="pt-BR">

<head>

    <meta charset="UTF-8">

    <title>Sistema Agenda</title>

    <style>

        <style>
*{
    margin:0;
    padding:0;
    box-sizing:border-box;
}

body{
    font-family:Arial, sans-serif;
    background:#f4f6f9;
    padding:30px;
    color:#333;
}

h1,h2{
    margin-bottom:20px;
    color:#222;
}

nav{
    margin-bottom:25px;
}

nav a{
    text-decoration:none;
    color:white;
    background:#007bff;
    padding:10px 15px;
    border-radius:6px;
    margin-right:10px;
    font-weight:bold;
    transition:.3s;
}

nav a:hover{
    background:#0056b3;
}

.btn-novo{
    display:inline-block;
    background:#007bff;
    color:white;
    text-decoration:none;
    padding:10px 18px;
    border-radius:6px;
    margin-bottom:20px;
    font-weight:bold;
    transition:.3s;
}

.btn-novo:hover{
    background:#0056b3;
}

table{
    width:100%;
    border-collapse:collapse;
    background:white;
    border-radius:10px;
    overflow:hidden;
    box-shadow:0 2px 10px rgba(0,0,0,.1);
}

th{
    background:#007bff;
    color:white;
    padding:12px;
    text-align:left;
}

td{
    padding:12px;
    border-bottom:1px solid #ddd;
}

tr:hover{
    background:#f8f9fa;
}

.btn-editar{
    text-decoration:none;
    background:#28a745;
    color:white;
    padding:6px 10px;
    border-radius:4px;
    margin-right:5px;
}

.btn-editar:hover{
    background:#218838;
}

.btn-excluir{
    text-decoration:none;
    background:#dc3545;
    color:white;
    padding:6px 10px;
    border-radius:4px;
}

.btn-excluir:hover{
    background:#c82333;
}

form{
    background:white;
    max-width:700px;
    padding:25px;
    border-radius:10px;
    box-shadow:0 2px 10px rgba(0,0,0,.1);
}

label{
    display:block;
    margin-top:15px;
    margin-bottom:5px;
    font-weight:bold;
}

input,
select,
textarea{
    width:100%;
    padding:10px;
    border:1px solid #ccc;
    border-radius:5px;
}

button{
    margin-top:20px;
    background:#007bff;
    color:white;
    border:none;
    padding:10px 18px;
    border-radius:6px;
    cursor:pointer;
    font-weight:bold;
}

button:hover{
    background:#0056b3;
}

.container{
    background:white;
    padding:25px;
    border-radius:10px;
    box-shadow:0 2px 10px rgba(0,0,0,.1);
}
</style>

</head>

<body>

<nav>

    <a href="index.php?pagina=contatos">Contatos</a>

    <a href="index.php?pagina=clientes">Clientes</a>

    <a href="index.php?pagina=produtos">Produtos</a>

</nav>