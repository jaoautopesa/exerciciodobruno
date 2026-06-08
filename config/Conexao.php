<?php

class Conexao {

    private static $conn = null;

    public static function getConexao() {

        if (self::$conn === null) {

            $dsn = 'mysql:host=localhost;dbname=agenda;charset=utf8mb4';

            self::$conn = new PDO(
                $dsn,
                'root',
                '',
                [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                    PDO::ATTR_EMULATE_PREPARES => false
                ]
            );
        }

        return self::$conn;
    }
}