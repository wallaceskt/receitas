<?php
namespace app\site\controller;

use app\core\Controller;
use app\site\entities\Receita;
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

        $receita = $this->getInput();

        if (!$this->validar($receita, false)) {

            $this->showMessage(
                'Fomulário inválido',
                'Dados inválidos ou incompletos.',
                'artigo/adicionar'
            );

            return;

        }

        // $result = $this->receitaModel->inserir($titulo, $slug);

        // if ($result <= 0) {

        //     $this->showMessage(
        //         'Erro',
        //         'Houve um erro ao tentar cadastrar. Tente novamente mais tarde.',
        //         'receita/adicionar'
        //     );

        //     return;

        // }

        // redirect(BASE . 'receita/editar/' . $result);

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

    private function getInput() {

        $receita = new Receita();
        $receita->setTitulo(filter_input(INPUT_POST, 'txtTitulo', FILTER_SANITIZE_STRING));
        $receita->setSlug(filter_input(INPUT_POST, 'txtSlug', FILTER_SANITIZE_STRING));
        $receita->setLinhaFina(filter_input(INPUT_POST, 'txtLinhaFina', FILTER_SANITIZE_STRING));
        $receita->setDescricao(filter_input(INPUT_POST, 'txtDescricao', FILTER_SANITIZE_SPECIAL_CHARS));
        $receita->setCategoriaId(filter_input(INPUT_POST, 'slCategoria', FILTER_SANITIZE_NUMBER_INT));

        return $receita;

    }

    public function validar(Receita $receita, bool $validateId = true) {

        if ($validateId && $receita->getId() <= 0)
            return false;

        if (strlen($receita->getTitulo()) < 2)
            return false;

        if (strlen($receita->getSlug()) < 3)
            return false;

        if (strlen($receita->getLinhaFina()) < 10)
            return false;

        if (strlen($receita->getDescricao()) < 10)
            return false;

        if ($receita->getCategoriaId() <= 0)
            return false;

        return true;

    }

}