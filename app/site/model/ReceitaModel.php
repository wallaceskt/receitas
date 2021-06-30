<?php
namespace app\site\model;

use app\core\Model;

class ReceitaModel {
    
    private $pdo;

    public function __construct() {

        $this->pdo = new Model();

    }

    public function inserir(string $titulo, string $slug, string $linhaFina, string $descricao, int $categoriaId) {

        $sql = 'INSERT INTO receita (titulo, slug, linha_fina, descricao, categoria_id) VALUES (:t, :s, :l, :d, :cid)';
        $params = [
            ':t' => $titulo,
            ':s' => $slug,
            ':l' => $linhaFina,
            ':d' => $descricao,
            ':cid' => $categoriaId
        ];

        if (!$this->pdo->executeNonQuery($sql, $params))
            return -1; // Erro

            return $this->pdo->getLastID();

    }

    public function alterar(int $id, string $titulo, string $slug, string $linhaFina, string $descricao, int $categoriaId) {

        $sql = 'UPDATE receita SET titulo = :t, slug = :s, linha_fina = :l, descricao = :d, categoria_id = :cid WHERE id = :id';
        $params = [
            ':id' => $id,
            ':t' => $titulo,
            ':s' => $slug,
            ':l' => $linhaFina,
            ':d' => $descricao,
            ':cid' => $categoriaId
        ];

        return $this->pdo->executeNonQuery($sql, $params);

    }

    public function lerPorId(int $receitaId) {

        $sql = 'SELECT r.id, r.titulo, r.slug, r.linha_fina, r.descricao, r.categoria_id, c.titulo AS categoria FROM receita r INNER JOIN categoria c ON r.categoria_id = c.id WHERE r.id = :id';
        $param = [
            ':id' => $receitaId
        ];
        $dr = $this->pdo->executeQueryOneRow($sql, $param);

        return $this->collection($dr);

    }

    public function lerTodos() {

        $sql = 'SELECT r.id, r.titulo, r.slug, r.linha_fina, r.descricao, r.categoria_id, c.titulo AS categoria FROM receita r INNER JOIN categoria c ON r.categoria_id = c.id ORDER BY r.titulo ASC';
        $dt = $this->pdo->executeQuery($sql);
        $lista = [];

        foreach ($dt as $dr) {
            
            $lista[] = $this->collection($dr);

        }

        return $lista;

    }

    public function collection($arr) {

        return (object)[
            'id' => $arr['id'] ?? null,
            'titulo' => $arr['titulo'] ?? null,
            'slug' => $arr['slug'] ?? null,
            'linhaFina' => $arr['linha_fina'] ?? null,
            'descricao' => $arr['descricao'] ?? null,
            'categoriaId' => $arr['categoria_id'] ?? null,
            'categoria' => $arr['categoria'] ?? null
        ];

    }

}