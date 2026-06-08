create table contatos(
	id INT auto_increment PRIMARY KEY,
	nome VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    telefone VARCHAR(14),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    );
    
create table clientes(
	id INT auto_increment PRIMARY KEY,
	cpf VARCHAR(14) UNIQUE NOT NULL,
    nome VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    telefone VARCHAR(14),
    endereco VARCHAR(255),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    );

create table produtos(
	id INT auto_increment PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    descricao TEXT,
    preco DECIMAL(10,2),
    estoque INT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    );
    
    ALTER TABLE clientes
ADD nome VARCHAR(100);
    

    