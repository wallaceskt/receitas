<?php
namespace app\site\model;

use app\core\Model;

class CategoriaModel {
    
    private $pdo;

    public function __construct() {

        $this->pdo = new Model();

    }

    public function inserir(string $titulo, string $slug) {

        $sql = 'INSERT INTO categoria (titulo, slug) VALUES (:t, :s)';
        $params = [
            ':t' => $titulo,
            ':s' => $slug
        ];

        if (!$this->pdo->executeNonQuery($sql, $params))
            return -1; // Erro

            return $this->pdo->getLastID();

    }

}