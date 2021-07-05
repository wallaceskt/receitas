<?php
namespace app\site\model;

use app\core\Model;

class LoginModel {
    
    // Atributos
    private $pdo;
    private $usuario;
    private $senha;

    // Métodos acessores e modificadores
    private function setUsuario(string $email) {

        $this->usuario = $email;
        
    }

    private function getUsuario() {

        return $this->usuario;

    }
    
    private function setSenha(string $senha) {
        
        $this->senha = $senha; //Sistema::Criptografia($senha);
        
    }

    private function getSenha() {

        return $this->senha;

    }

    // Método construtor
    public function __construct() {

        $this->pdo = new Model();

    }

    public function getLogin(string $usuario, string $senha) {

        $this->setUsuario($usuario);
        $this->setSenha($senha);

        $sql = 'SELECT id, nome, email, senha, cadastro FROM cliente WHERE email = :e AND senha = :s';
        $params = [
            ':e' => $this->getUsuario(),
            ':s' => $this->getSenha()
        ];
        $dr = $this->pdo->executeQueryOneRow($sql, $params);

        if ($dr > 0) {

            $lista = $this->collection($dr);

            if ($lista->senha === $this->getSenha()) {

                // Se estiver tudo certo, cria a sessão
                $_SESSION['Cliente']['id'] = $lista->id;
                $_SESSION['Cliente']['nome'] = $lista->nome;
                $_SESSION['Cliente']['email'] = $lista->email;
                $_SESSION['Cliente']['usuario'] = $lista->usuario;
                $_SESSION['Cliente']['senha'] = $lista->senha;
                $_SESSION['Cliente']['cadastro'] = $lista->cadastro;
                return true;

            }

        }

        throw new \Exception("[ERRO] Login inválido");

    }

    public function collection($arr) {

        return (object)[
            'id' => $arr['id'] ?? null,
            'nome' => $arr['nome'] ?? null,
            'email' => $arr['email'] ?? null,
            'usuario' => $arr['email'] ?? null,
            'senha' => $arr['senha'] ?? null,
            'cadastro' => $arr['cadastro'] ?? null
        ];

    }

}