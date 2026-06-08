# Sistema Agenda / Cadastro (PHP + MySQL)

## Estrutura do Projeto

O projeto foi reorganizado seguindo uma separação por responsabilidades, aproximando-se do padrão MVC.

```text
config/
└── Conexao.php          # Conexão com o banco de dados

models/
├── ClienteDAO.php       # Operações de Cliente
├── ContatoDAO.php       # Operações de Contato
└── ProdutoDAO.php       # Operações de Produto

views/
├── cabecalho.php        # Cabeçalho compartilhado
├── cliente/
│   ├── clientes.php
│   ├── cadastro_cliente.php
│   ├── editar_cliente.php
│   └── excluir_cliente.php
├── contato/
│   ├── contatos.php
│   ├── cadastro_contato.php
│   ├── editar_contato.php
│   └── excluir_contato.php
└── produto/
    ├── produtos.php
    ├── cadastro_produto.php
    ├── editar_produto.php
    └── excluir_produto.php

mysql/
├── script_create-tables.sql
├── script_Inserts.sql
└── script_alteracao.sql

index.php                # Página inicial do sistema
```

## Mudanças Realizadas

- Separação da conexão com o banco em um arquivo próprio (`config/Conexao.php`).
- Centralização das operações de banco de dados em classes DAO.
- Organização das telas dentro da pasta `views`.
- Agrupamento das funcionalidades por entidade (Cliente, Contato e Produto).
- Scripts SQL mantidos em uma pasta específica para facilitar a configuração do banco.

## Como Executar o Projeto

### 1. Criar o banco de dados

Execute os scripts da pasta `mysql`:

1. `script_create-tables.sql`
2. `script_Inserts.sql` (opcional para dados de teste)
3. `script_alteracao.sql` (caso necessário)

### 2. Configurar a conexão

Edite o arquivo:

```php
config/Conexao.php
```

e ajuste:

- Host
- Nome do banco
- Usuário
- Senha

### 3. Executar o sistema

Caso utilize o servidor embutido do PHP:

```bash
php -S localhost:8000
```

Depois acesse:

```text
http://localhost:8000
```

Ou copie o projeto para a pasta do XAMPP/WAMP e acesse pelo navegador.
