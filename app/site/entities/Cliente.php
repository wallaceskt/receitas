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

        if ($this->validarSenha($senha))
            $this->senha = $senha;
    
    }
    
    public function getConfirmaSenha() {

        return $this->confirmaSenha;
    
    }

    public function setConfirmaSenha($senha) {

        if ($this->validarSenha($senha))
            $this->confirmaSenha = $senha;
    
    }
    
    public function getDataCadastro() {

        return $this->dataCadastro;
    
    }

    public function setDataCadastro($cadastro) {

        $this->dataCadastro = $cadastro;
    
    }

    public function validarSenha($senha) {

        $valor = false;

        $confere = filter_var(
            $senha, 
            FILTER_VALIDATE_REGEXP,
            array("options" => array( "regexp" => "/^[a-zA-Z0-9\W]{6,20}$/"))
        );
        
        // Valida a força da senha
        // $uppercase = preg_match('@[A-Z]@', $senha);
        // $lowercase = preg_match('@[a-z]@', $senha);
        // $number    = preg_match('@[0-9]@', $senha);
        // $specialChars = preg_match('@[^\w]@', $senha);

        //  if(!$uppercase || !$lowercase || !$number || !$specialChars || strlen($senha) < 8)
        if ($confere)// && (strlen($password) > 5 && strlen($password) <= 13))
            $valor = true;

        return $valor;


    }
    
}