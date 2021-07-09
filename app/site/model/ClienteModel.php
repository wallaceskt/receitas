<?php
namespace app\site\model;

use app\core\Model;
use app\site\entities\Cliente;

class ClienteModel {
    
    private $pdo;

    public function __construct() {

        $this->pdo = new Model();

    }

    public function inserir(Cliente $cliente) {

        $sql = 'INSERT INTO cliente (nome, email, senha, cadastro) VALUES (:n, :e, :s, :c)';
        $params = [
            ':n' => $cliente->getNome(),
            ':e' => $cliente->getEmail(),
            ':s' => $cliente->getSenha(),
            ':c' => $cliente->getDataCadastro()
        ];

        if (!$this->pdo->executeNonQuery($sql, $params))
            return -1; // Erro

            return $this->pdo->getLastID();

    }

    public function alterar(Cliente $cliente) {

        $sql = 'UPDATE cliente SET nome = :n, email = :e, senha = :s, cadastro = :c WHERE id = :id';
        $params = [
            ':id' => $cliente->getId(),
            ':n' => $cliente->getNome(),
            ':e' => $cliente->getEmail(),
            ':s' => $cliente->getSenha(),
            ':c' => $cliente->getDataCadastro()
        ];

        return $this->pdo->executeNonQuery($sql, $params);

    }

    public function excluir(Cliente $cliente) {

        $sql = 'DELETE FROM cliente WHERE id = :id';
        $param = [
            ':id' => $cliente->getId()
        ];

        return $this->pdo->executeNonQuery($sql, $param);

    }

    public function lerPorId(int $clienteId) {

        $sql = 'SELECT id, nome, email, senha, cadastro FROM cliente WHERE id = :id';
        $param = [
            ':id' => $clienteId
        ];
        $dr = $this->pdo->executeQueryOneRow($sql, $param);

        return $this->collection($dr);

    }

    public function collection($arr) {

        $cliente = new Cliente();
        $cliente->setId($arr['id'] ?? null);
        $cliente->setNome($arr['nome'] ?? null);
        $cliente->setEmail($arr['email'] ?? null);
        $cliente->setSenha($arr['senha'] ?? null);
        $cliente->setDataCadastro($arr['cadastro'] ?? null);
        
        return $cliente;

    }

}