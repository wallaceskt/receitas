<?php
namespace app\site\model;

use app\core\Model;
use app\site\entities\Receita;

class ReceitaModel {
    
    private $pdo;

    public function __construct() {

        $this->pdo = new Model();

    }

    public function inserir(Receita $receita) {

        $sql = 'INSERT INTO receita (titulo, slug, linha_fina, descricao, categoria_id, data) VALUES (:t, :s, :l, :d, :cid, :dt)';
        $params = [
            ':t' => $receita->getTitulo(),
            ':s' => $receita->getSlug(),
            ':l' => $receita->getLinhaFina(),
            ':d' => $receita->getDescricao(),
            ':cid' => $receita->getCategoriaId(),
            ':dt' => $receita->getData()
        ];

        if (!$this->pdo->executeNonQuery($sql, $params))
            return -1; // Erro

            return $this->pdo->getLastID();

    }

    public function alterar(Receita $receita) {

        $sql = 'UPDATE receita SET titulo = :t, slug = :s, linha_fina = :l, descricao = :d, categoria_id = :cid WHERE id = :id';
        $params = [
            ':id' => $receita->getId(),
            ':t' => $receita->getTitulo(),
            ':s' => $receita->getSlug(),
            ':l' => $receita->getLinhaFina(),
            ':d' => $receita->getDescricao(),
            ':cid' => $receita->getCategoriaId()
        ];

        return $this->pdo->executeNonQuery($sql, $params);

    }

    public function lerPorId(int $receitaId) {

        $sql = 'SELECT r.id, r.titulo, r.slug, r.linha_fina, r.descricao, r.categoria_id, r.data, c.titulo AS categoria FROM receita r INNER JOIN categoria c ON r.categoria_id = c.id WHERE r.id = :id';
        $param = [
            ':id' => $receitaId
        ];
        $dr = $this->pdo->executeQueryOneRow($sql, $param);

        return $this->collection($dr);

    }

    public function lerUltimos($limit = 10) {

        $sql = 'SELECT r.id, r.titulo, r.slug, r.linha_fina, r.descricao, r.categoria_id, r.data, c.titulo AS categoria FROM receita r INNER JOIN categoria c ON c.id = r.categoria_id LIMIT :l';
        $param = [
            ':l' => $limit
        ];
        $dt = $this->pdo->executeQuery($sql, $param);

        $lista = [];

        foreach ($dt as $dr) {

            $lista[] = $this->collection($dr);

        }

        return $lista;

    }

    public function lerTodosPorCategoria(int $categoriaId) {

        $sql = 'SELECT r.id, r.titulo, r.slug, r.linha_fina, r.descricao, r.categoria_id, r.data, c.titulo AS categoria FROM receita r INNER JOIN categoria c ON c.id = r.categoria_id WHERE c.id = :cid';
        $param = [
            ':cid' => $categoriaId
        ];
        $dt = $this->pdo->executeQuery($sql, $param);

        $lista = [];

        foreach ($dt as $dr) {

            $lista[] = $this->collection($dr);

        }

        return $lista;

    }

    public function lerTodos() {

        $sql = 'SELECT r.id, r.titulo, r.slug, r.linha_fina, r.descricao, r.categoria_id, r.data, c.titulo AS categoria FROM receita r INNER JOIN categoria c ON r.categoria_id = c.id ORDER BY r.titulo ASC';
        $dt = $this->pdo->executeQuery($sql);
        $lista = [];

        foreach ($dt as $dr) {
            
            $lista[] = $this->collection($dr);

        }

        return $lista;

    }

    public function collection($arr) {

        $receita = new Receita();
        $receita->setId($arr['id'] ?? null);
        $receita->setTitulo($arr['titulo'] ?? null);
        $receita->setSlug($arr['slug'] ?? null);
        $receita->setLinhaFina($arr['linha_fina'] ?? null);
        $receita->setDescricao($arr['descricao'] ?? null);
        $receita->setCategoriaId($arr['categoria_id'] ?? null);
        $receita->setCategoria($arr['categoria'] ?? null);
        $receita->setData($arr['data'] ?? null);
        
        return $receita;

    }

}