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

        $sql = 'INSERT INTO receita (titulo, slug, linha_fina, descricao, data, imagem, categoria_id, cliente_id) VALUES (:t, :s, :l, :d, :dt, :i, :cid, :lid)';
        $params = [
            ':t' => $receita->getTitulo(),
            //':s' => gerarSlug($receita->getTitulo()),
            ':s' => $receita->getSlug(),
            ':l' => $receita->getLinhaFina(),
            ':d' => $receita->getDescricao(),
            ':dt' => $receita->getData(),
            ':i' => $receita->getImagem(),
            ':cid' => $receita->getCategoriaId(),
            ':lid' => $receita->getClienteId()
        ];

        if (!$this->pdo->executeNonQuery($sql, $params))
            return -1; // Erro

            return $this->pdo->getLastID();

    }

    public function alterar(Receita $receita) {

        $sql = 'UPDATE receita SET titulo = :t, slug = :s, linha_fina = :l, descricao = :d, imagem = :i, categoria_id = :cid, cliente_id = :lid WHERE id = :id';
        $params = [
            ':id' => $receita->getId(),
            ':t' => $receita->getTitulo(),
            ':s' => gerarSlug($receita->getTitulo()),//$receita->getSlug(),
            ':l' => $receita->getLinhaFina(),
            ':d' => $receita->getDescricao(),
            ':i' => $receita->getImagem(),
            ':cid' => $receita->getCategoriaId(),
            ':lid' => $receita->getClienteId()
        ];

        return $this->pdo->executeNonQuery($sql, $params);

    }

    public function lerPorId(int $receitaId) {

        $sql = 'SELECT r.id, r.titulo, r.slug, r.linha_fina, r.descricao, r.data, r.imagem, r.categoria_id, r.cliente_id, c.titulo AS categoria, l.nome, l.email, l.cadastro FROM receita r INNER JOIN categoria c ON r.categoria_id = c.id INNER JOIN cliente l ON l.id = r.cliente_id WHERE r.id = :id';
        $param = [
            ':id' => $receitaId
        ];
        $dr = $this->pdo->executeQueryOneRow($sql, $param);

        return $this->collection($dr);

    }

    public function lerPorSlug(string $slug) {

        $sql = 'SELECT r.id, r.titulo, r.slug, r.linha_fina, r.descricao, r.data, r.imagem, r.categoria_id, r.cliente_id, c.titulo AS categoria, l.nome, l.email, l.cadastro FROM receita r INNER JOIN categoria c ON r.categoria_id = c.id INNER JOIN cliente l ON r.cliente_id = l.id WHERE r.slug = :s';
        $param = [
            ':s' => $slug
        ];
        $dr = $this->pdo->executeQueryOneRow($sql, $param);

        return $this->collection($dr);

    }

    public function lerUltimos($limit = 10) {

        $sql = 'SELECT r.id, r.titulo, r.slug, r.linha_fina, r.descricao, r.data, r.imagem, r.categoria_id, r.cliente_id, c.titulo AS categoria FROM receita r INNER JOIN categoria c ON c.id = r.categoria_id ORDER BY r.data DESC LIMIT :l';
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

    public function lerPorCategoriaLimit(int $categoriaId, int $limit = 4) {

        $sql = 'SELECT r.id, r.titulo, r.slug, r.linha_fina, r.descricao, r.data, r.imagem, r.categoria_id, r.cliente_id, c.titulo AS categoria FROM receita r INNER JOIN categoria c ON c.id = r.categoria_id WHERE r.categoria_id = :cid ORDER BY r.data DESC LIMIT :l';
        $params = [
            ':cid' => $categoriaId,
            ':l' => $limit
        ];
        $dt = $this->pdo->executeQuery($sql, $params);

        $lista = [];

        foreach ($dt as $dr) {

            $lista[] = $this->collection($dr);

        }

        return $lista;

    }

    public function lerTodosPorCategoria(int $categoriaId) {

        $sql = 'SELECT r.id, r.titulo, r.slug, r.linha_fina, r.descricao, r.data, r.imagem, r.categoria_id, r.cliente_id, c.titulo AS categoria FROM receita r INNER JOIN categoria c ON c.id = r.categoria_id WHERE r.categoria_id = :cid ORDER BY r.data DESC';
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

    public function lerTodosPorCliente(int $clienteId) {

        $sql = 'SELECT r.id, r.titulo, r.slug, r.linha_fina, r.descricao, r.data, r.imagem, r.categoria_id, r.cliente_id, c.titulo AS categoria, l.nome, l.email, l.cadastro FROM receita r INNER JOIN categoria c ON c.id = r.categoria_id INNER JOIN cliente l ON l.id = r.cliente_id WHERE r.cliente_id = :lid ORDER BY r.data DESC';
        $param = [
            ':lid' => $clienteId
        ];
        $dt = $this->pdo->executeQuery($sql, $param);

        $lista = [];

        foreach ($dt as $dr) {

            $lista[] = $this->collection($dr);

        }

        return $lista;

    }

    public function pesquisar(string $termo) {

        $sql = 'SELECT r.id, r.titulo, r.slug, r.linha_fina, r.descricao, r.data, r.imagem, r.categoria_id, r.cliente_id, c.titulo AS categoria FROM receita r INNER JOIN categoria c ON c.id = r.categoria_id WHERE UPPER(r.titulo) LIKE :t OR UPPER(r.linha_fina) LIKE :l ORDER BY r.titulo ASC';
        $params = [
            ':t' => strtoupper("%". $termo . "%"), //"%{$termo}%"
            ':l' => strtoupper("%". $termo . "%") //"%{$termo}%"
        ];
        $dt = $this->pdo->executeQuery($sql, $params);

        $lista = [];

        foreach ($dt as $dr) {

            $lista[] = $this->collection($dr);

        }

        return $lista;

    }

    public function lerTodos() {

        $sql = 'SELECT r.id, r.titulo, r.slug, r.linha_fina, r.descricao, r.data, r.imagem, r.categoria_id, r.cliente_id, c.titulo AS categoria FROM receita r INNER JOIN categoria c ON r.categoria_id = c.id ORDER BY r.titulo ASC';
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
        $receita->setDescricao(html_entity_decode($arr['descricao'] ?? null));
        $receita->setData($arr['data'] ?? null);
        $receita->setImagem($arr['imagem'] ?? null);
        $receita->setCategoria($arr['categoria'] ?? null);
        $receita->setCategoriaId($arr['categoria_id'] ?? null);
        $receita->setClienteId($arr['cliente_id'] ?? null);
        $receita->setClienteNome($arr['nome'] ?? null);
        $receita->setClienteEmail($arr['email'] ?? null);
        $receita->setClienteCadastro($arr['cadastro'] ?? null);
        
        return $receita;

    }

}