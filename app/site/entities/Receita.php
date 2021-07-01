<?php
namespace app\site\entities;

class Receita {

    // Atributos
    private $id;
    private $titulo;
    private $slug;
    private $linhaFina;
    private $descricao;
    private $categoriaId;
    private $categoria;
    private $data;

    // Métodos acessores e modificadores
    public function getId() {

        return $this->id;
    
    }

    public function setId($id) {

        $this->id = $id;
    
    }

    public function getTitulo() {

        return $this->titulo;
    
    }

    public function setTitulo($titulo) {

        $this->titulo = $titulo;
    
    }

    public function getSlug() {

        return $this->slug;
    
    }

    public function setSlug($slug) {

        $this->slug = $slug;
    
    }

    public function getLinhaFina() {

        return $this->linhaFina;
    
    }

    public function setLinhaFina($linhaFina) {

        $this->linhaFina = $linhaFina;
    
    }

    public function getDescricao() {

        return $this->descricao;
    
    }

    public function setDescricao($descricao) {

        $this->descricao = $descricao;
    
    }

    public function getCategoriaId() {

        return $this->categoriaId;
    
    }

    public function setCategoriaId($id) {

        $this->categoriaId = $id;
    
    }

    public function getCategoria() {

        return $this->categoria;
    
    }

    public function setCategoria($categoria) {

        $this->categoria = $categoria;
    
    }

    public function getData() {

        return $this->data;
    
    }

    public function setData($data) {

        $this->data = $data;
    
    }

    // Método construtor
    // public function __construct($id = '', $titulo = '', $slug = '', $linhaFina = '', $descricao = '', $categoria = '') {

    //     $this->setId($id);
    //     $this->setTitulo($titulo);
    //     $this->setSlug($slug);
    //     $this->setLinhaFina($linhaFina);
    //     $this->setDescricao($descricao);
    //     $this->setCategoria($categoria);

    // }

}
