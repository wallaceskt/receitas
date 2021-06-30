<?php
namespace app\site\controller;

use app\core\Controller;
use app\site\model\ReceitaModel;
use app\site\model\CategoriaModel;

class ReceitaController extends Controller {

    private $receitaModel;

    public function __construct() {

        $this->receitaModel = new ReceitaModel();

    }

    public function index() {

        $this->load('receita/main', [
            'listaReceita' => $this->receitaModel->lerTodos()
        ]);

    }

    public function adicionar() {

        $this->load('receita/adicionar', [
            'listaCategoria' => (new CategoriaModel())->lerTodos()
        ]);

    }

    public function editar($receitaId = 0) {

        $receitaId = filter_var($receitaId, FILTER_SANITIZE_NUMBER_INT);

        if ($receitaId <= 0) {
            
            $this->showMessage(
                'Fomulário inválido',
                'Dados inválidos ou incompletos.',
                'receita'
            );

            return;
        
        }

        $receita = $this->receitaModel->lerPorId($receitaId);

        if ($receita->titulo == null) {
                
            $this->showMessage(
                'receita não encontrada',
                'Dados inválidos ou incompletos.',
                'receita'
            );

            return;
        
        }

        $this->load('receita/editar', [
            'receita' => $receita,
            'receitaId' => $receitaId
        ]);

    }

    public function insert() {

        $titulo = filter_input(INPUT_POST, 'txtTitulo', FILTER_SANITIZE_STRING);
        $slug = filter_input(INPUT_POST, 'txtSlug', FILTER_SANITIZE_STRING);

        if (strlen($titulo) < 2 || strlen($slug) < 3) {

            $this->showMessage(
                'Fomulário inválido',
                'Dados inválidos ou incompletos.',
                'receita/adicionar'
            );

            return;

        }

        $result = $this->receitaModel->inserir($titulo, $slug);

        if ($result <= 0) {

            $this->showMessage(
                'Erro',
                'Houve um erro ao tentar cadastrar. Tente novamente mais tarde.',
                'receita/adicionar'
            );

            return;

        }

        redirect(BASE . 'receita/editar/' . $result);

    }

    public function alterar($receitaId = 0) {

        $receitaId = filter_var($receitaId, FILTER_SANITIZE_NUMBER_INT);
        $titulo = filter_input(INPUT_POST, 'txtTitulo', FILTER_SANITIZE_STRING);
        $slug = filter_input(INPUT_POST, 'txtSlug', FILTER_SANITIZE_STRING);
        $linhaFina = filter_input(INPUT_POST, 'txtLinhaFina', FILTER_SANITIZE_STRING);
        $descricao = filter_input(INPUT_POST, 'txtDescricao', FILTER_SANITIZE_STRING);
        $caegoriaId = filter_var($categoriaId, FILTER_SANITIZE_NUMBER_INT);

        if ($receitaId <= 0 || strlen($titulo) < 2 || strlen($slug) < 3) {

            $this->showMessage(
                'Fomulário inválido',
                'Dados inválidos ou incompletos.',
                'receita/'
            );

            return;
        
        }

        if (!$this->receitaModel->alterar($receitaId, $titulo, $slug)) {
            
            $this->showMessage(
                'Erro',
                'Houve um erro ao tentar alterar. Tente novamente mais tarde.',
                'receita/editar/' . $receitaId
            );

            return;

        }

        redirect(BASE . 'receita/editar/' . $receitaId);

    }

}