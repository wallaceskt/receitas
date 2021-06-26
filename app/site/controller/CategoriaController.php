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

    public function editar() {

        $this->load('categoria/editar');

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

}