<?php

require_once __DIR__ . '/../config/Conexao.php';

class ProdutoDAO {

    private $conn;

    public function __construct() {
        $this->conn = Conexao::getConexao();
    }

    public function obterProdutos(): array {

        $stmt = $this->conn->query(
            'SELECT * FROM produtos ORDER BY nome'
        );

        return $stmt->fetchAll();
    }

    public function obterProdutoPorId(int $id) {

        $stmt = $this->conn->prepare(
            'SELECT * FROM produtos WHERE id = ?'
        );

        $stmt->execute([$id]);

        return $stmt->fetch();
    }

    public function cadastrarProduto(
        string $nome,
        string $descricao,
        float $preco,
        int $estoque,
        ?string $imagem
    ) {

        $stmt = $this->conn->prepare(
            'INSERT INTO produtos
            (nome, descricao, preco, estoque, imagem)
            VALUES (?, ?, ?, ?, ?)'
        );

        return $stmt->execute([
            $nome,
            $descricao,
            $preco,
            $estoque,
            $imagem
        ]);
    }

    public function editarProduto(
        int $id,
        string $nome,
        string $descricao,
        float $preco,
        int $estoque,
        ?string $imagem
    ) {

        $stmt = $this->conn->prepare(
            'UPDATE produtos
             SET nome = ?,
                 descricao = ?,
                 preco = ?,
                 estoque = ?,
                 imagem = ?
             WHERE id = ?'
        );

        return $stmt->execute([
            $nome,
            $descricao,
            $preco,
            $estoque,
            $imagem,
            $id
        ]);
    }

    public function excluirProduto(int $id) {

        $stmt = $this->conn->prepare(
            'DELETE FROM produtos WHERE id = ?'
        );

        return $stmt->execute([$id]);
    }
}