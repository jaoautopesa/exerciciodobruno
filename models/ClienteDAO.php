<?php

require_once __DIR__ . '/../config/Conexao.php';

class ClienteDAO {

    private $conn;

    public function __construct() {
        $this->conn = Conexao::getConexao();
    }

    public function obterClientes(): array {

        $stmt = $this->conn->query(
            'SELECT * FROM clientes ORDER BY nome'
        );

        return $stmt->fetchAll();
    }

    public function obterClientePorId(int $id) {

        $stmt = $this->conn->prepare(
            'SELECT * FROM clientes WHERE id = ?'
        );

        $stmt->execute([$id]);

        return $stmt->fetch();
    }

    public function cadastrarCliente(
        string $nome,
        string $cpf,
        string $email,
        string $telefone,
        string $endereco
    ) {

        $stmt = $this->conn->prepare(
            'INSERT INTO clientes
            (nome, cpf, email, telefone, endereco)
            VALUES (?, ?, ?, ?, ?)'
        );

        return $stmt->execute([
            $nome,
            $cpf,
            $email,
            $telefone,
            $endereco
        ]);
    }

    public function editarCliente(
        int $id,
        string $nome,
        string $cpf,
        string $email,
        string $telefone,
        string $endereco
    ) {

        $stmt = $this->conn->prepare(
            'UPDATE clientes
             SET nome = ?,
                 cpf = ?,
                 email = ?,
                 telefone = ?,
                 endereco = ?
             WHERE id = ?'
        );

        return $stmt->execute([
            $nome,
            $cpf,
            $email,
            $telefone,
            $endereco,
            $id
        ]);
    }

    public function excluirCliente(int $id) {

        $stmt = $this->conn->prepare(
            'DELETE FROM clientes WHERE id = ?'
        );

        return $stmt->execute([$id]);
    }

    public function validarCPF(string $cpf): bool {

        return preg_match(
            '/^\d{3}\.\d{3}\.\d{3}\-\d{2}$/',
            $cpf
        );
    }
}