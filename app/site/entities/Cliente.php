<?php
namespace app\site\entities;

class Cliente {

    // Atributos
    private $id;
    private $nome;
    private $email;
    private $senha;
    private $confirmaSenha;
    private $dataCadastro;

    // Métodos acessores e modificadores
    public function getId() {

        return $this->id;
    
    }

    public function setId($id) {

        $this->id = $id;
    
    }
    
    public function getNome() {

        return $this->nome;
    
    }

    public function setNome($nome) {

        $this->nome = $nome;
    
    }
    
    public function getEmail() {

        return $this->email;
    
    }

    public function setEmail($email) {

        $this->email = $email;
    
    }
    
    public function getSenha() {

        return $this->senha;
    
    }

    public function setSenha($senha) {

        $this->senha = $senha;
    
    }
    
    public function getConfirmaSenha() {

        return $this->confirmaSenha;
    
    }

    public function setConfirmaSenha($senha) {

        $this->confirmaSenha = $senha;
    
    }
    
    public function getDataCadastro() {

        return $this->dataCadastro;
    
    }

    public function setDataCadastro($cadastro) {

        $this->dataCadastro = $cadastro;
    
    }
    
}