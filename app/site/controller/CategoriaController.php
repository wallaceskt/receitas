<?php
namespace app\site\controller;

use app\core\Controller;
use app\site\model\CategoriaModel;

class CategoriaController extends Controller {

    private $categoriaModel;

    public function __construct() {

        $this->categoriaModel = new CategoriaModel();

    }

    public function index() {

        $this->load('categoria/main');

    }

    public function adicionar() {

        $this->load('categoria/adicionar');

    }

    public function editar($categoriaId = 0) {

        $categoriaId = filter_var($categoriaId, FILTER_SANITIZE_NUMBER_INT);

        if ($categoriaId <= 0) {
            
            $this->showMessage(
                'Fomulário inválido',
                'Dados inválidos ou incompletos.',
                'categoria'
            );

            return;
        
        }

        $categoria = $this->categoriaModel->lerPorId($categoriaId);

        if ($categoria->titulo == null) {
                
            $this->showMessage(
                'Categoria não encontrada',
                'Dados inválidos ou incompletos.',
                'categoria'
            );

            return;
        
        }

        $this->load('categoria/editar', [
            'categoria' => $categoria,
            'categoriaId' => $categoriaId
        ]);

    }

    public function insert() {

        $titulo = filter_input(INPUT_POST, 'txtTitulo', FILTER_SANITIZE_STRING);
        $slug = filter_input(INPUT_POST, 'txtSlug', FILTER_SANITIZE_STRING);

        if (strlen($titulo) < 2 || strlen($slug) < 3) {

            $this->showMessage(
                'Fomulário inválido',
                'Dados inválidos ou incompletos.',
                'categoria/adicionar'
            );

            return;

        }

        $result = $this->categoriaModel->inserir($titulo, $slug);

        if ($result <= 0) {

            $this->showMessage(
                'Erro',
                'Houve um erro ao tentar cadastrar. Tente novamente mais tarde.',
                'categoria/adicionar'
            );

            return;

        }

        redirect(BASE . 'categoria/editar/' . $result);

    }

    public function alterar($categoriaId = 0) {

        $categoriaId = filter_var($categoriaId, FILTER_SANITIZE_NUMBER_INT);
        $titulo = filter_input(INPUT_POST, 'txtTitulo', FILTER_SANITIZE_STRING);
        $slug = filter_input(INPUT_POST, 'txtSlug', FILTER_SANITIZE_STRING);

        if ($categoriaId <= 0 || strlen($titulo) < 2 || strlen($slug) < 3) {

            $this->showMessage(
                'Fomulário inválido',
                'Dados inválidos ou incompletos.',
                'categoria/'
            );

            return;
        
        }

        if (!$this->categoriaModel->alterar($categoriaId, $titulo, $slug)) {
            
            $this->showMessage(
                'Erro',
                'Houve um erro ao tentar alterar. Tente novamente mais tarde.',
                'categoria/editar/' . $categoriaId
            );

            return;

        }

        redirect(BASE . 'categoria/editar/' . $categoriaId);

    }

}