<?php
namespace app\site\controller;

use app\core\Controller;
use app\site\entities\Cliente;
use app\site\model\ClienteModel;

class ClienteController extends Controller {

    private $clienteModel;
    
    public function __construct() {

        $this->clienteModel = new ClienteModel();

    }

    public function index() {

        $this->load('cliente/adicionar');

    }

    public function adicionar() {

        $this->load('cliente/adicionar');

    }

    public function inserir() {

        $cliente = $this->getInput();

        if (!$this->validar($cliente, false)) {

            $this->showMessage(
                'Fomulário inválido',
                'Dados inválidos ou incompletos. O nome deve ter pelo menos 3 caracteres, o e-mail deve ser válido e a senha deve ter pelo menos 6 caracteres e deve incluir pelo menos uma letra maiúscula, um número e um caractere especial.',
                'cliente/adicionar'
            );

            return;

        }

        $result = $this->clienteModel->inserir($cliente);

        if ($result <= 0) {

            $this->showMessage(
                'Erro',
                'Houve um erro ao tentar cadastrar. Tente novamente mais tarde.',
                'cliente/adicionar'
            );

            return;

        }

        redirect(BASE . 'login/main');
        //redirect(BASE . 'dashboard/area');

    }

    private function getInput() {

        $cliente = new Cliente();
        $cliente->setId(filter_input(INPUT_POST, 'txtId', FILTER_SANITIZE_NUMBER_INT));
        $cliente->setNome(filter_input(INPUT_POST, 'txtNome', FILTER_SANITIZE_STRING));
        $cliente->setEmail(filter_input(INPUT_POST, 'txtEmail', FILTER_SANITIZE_EMAIL));
        $cliente->setSenha(filter_input(INPUT_POST, 'txtSenha', FILTER_SANITIZE_STRING));
        $cliente->setConfirmaSenha(filter_input(INPUT_POST, 'txtConfirmaSenha', FILTER_SANITIZE_STRING));
        $cliente->setDataCadastro(getCurrentDate());

        return $cliente;

    }

    public function validar(Cliente $cliente, bool $validateId = true) {

        // if ($validateId && $cliente->getId() <= 0)
        //     return false;

        if (strlen($cliente->getNome()) < 3)
            return false;

        if (strlen($cliente->getEmail()) < 10)
            return false;

        if ((strlen($cliente->getSenha()) < 5) || (strlen($cliente->getConfirmaSenha()) < 5) || ($cliente->getSenha() != $cliente->getConfirmaSenha()))
            return false;

        if (strlen($cliente->getDataCadastro()) < 5)
            return false;

        return true;

    }

}