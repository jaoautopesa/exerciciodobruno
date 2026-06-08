<?php

require_once __DIR__ . '/../config/Conexao.php';

class ContatoDAO {

    private $conn;

    public function __construct() {
        $this->conn = Conexao::getConexao();
    }

    public function obterContatos(
        string $busca = '',
        int $pagina = 1,
        int $porPagina = 10
    ): array {

        $offset = ($pagina - 1) * $porPagina;
        $termo = '%' . $busca . '%';

        $stmt = $this->conn->prepare(
            'SELECT * FROM contatos
             WHERE nome LIKE ?
             OR email LIKE ?
             ORDER BY nome
             LIMIT ? OFFSET ?'
        );

        $stmt->bindValue(1, $termo);
        $stmt->bindValue(2, $termo);
        $stmt->bindValue(3, $porPagina, PDO::PARAM_INT);
        $stmt->bindValue(4, $offset, PDO::PARAM_INT);

        $stmt->execute();

        return $stmt->fetchAll();
    }

    public function contarContatos(string $busca = ''): int {

        $termo = '%' . $busca . '%';

        $stmt = $this->conn->prepare(
            'SELECT COUNT(*) total
             FROM contatos
             WHERE nome LIKE ?
             OR email LIKE ?'
        );

        $stmt->execute([$termo, $termo]);

        return $stmt->fetch()['total'];
    }

    public function obterContatoPorId(int $id) {

        $stmt = $this->conn->prepare(
            'SELECT * FROM contatos WHERE id = ?'
        );

        $stmt->execute([$id]);

        return $stmt->fetch();
    }

    public function excluirContato(int $id) {

        $stmt = $this->conn->prepare(
            'DELETE FROM contatos WHERE id = ?'
        );

        return $stmt->execute([$id]);
    }
    public function cadastrarContato(
    string $nome,
    string $email,
    string $telefone
) {

    $stmt = $this->conn->prepare(
        'INSERT INTO contatos
        (nome, email, telefone)
        VALUES (?, ?, ?)'
    );

    return $stmt->execute([
        $nome,
        $email,
        $telefone
    ]);
}
public function editarContato(
    int $id,
    string $nome,
    string $email,
    string $telefone
) {

    $stmt = $this->conn->prepare(
        'UPDATE contatos
         SET nome = ?,
             email = ?,
             telefone = ?
         WHERE id = ?'
    );

    return $stmt->execute([
        $nome,
        $email,
        $telefone,
        $id
    ]);
}
}