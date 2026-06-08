<?php

include 'views/cabecalho.php';

$pagina = $_GET['pagina'] ?? 'contatos';

switch ($pagina) {

    case 'contatos':
        require 'views/contato/contatos.php';
        break;

    case 'cadastro_contato':
        require 'views/contato/cadastro_contato.php';
        break;

    case 'editar_contato':
        require 'views/contato/editar_contato.php';
        break;

    case 'excluir_contato':
        require 'views/contato/excluir_contato.php';
        break;

    
    case 'clientes':
        require 'views/cliente/clientes.php';
        break;

    case 'cadastro_cliente':
        require 'views/cliente/cadastro_cliente.php';
        break;

    case 'editar_cliente':
        require 'views/cliente/editar_cliente.php';
        break;

    case 'excluir_cliente':
        require 'views/cliente/excluir_cliente.php';
        break;

    case 'produtos':
        require 'views/produto/produtos.php';
        break;

    case 'cadastro_produto':
        require 'views/produto/cadastro_produto.php';
        break;

    case 'editar_produto':
        require 'views/produto/editar_produto.php';
        break;

    case 'excluir_produto':
        require 'views/produto/excluir_produto.php';
        break;

    default:
        require 'views/contato/cadastro_contato.php';
        break;
}