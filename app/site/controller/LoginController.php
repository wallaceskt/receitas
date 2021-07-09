<?php
namespace app\site\controller;

use app\core\Controller;
use app\site\model\LoginModel;

class LoginController extends Controller {

    private $loginModel;
    
    public function __construct() {

        $this->loginModel = new LoginModel();
        
    }

    public function index() {

        $this->load('login/main');

    }

    public function logar() {

        $usuario = filter_input(INPUT_POST, 'txtUsuario', FILTER_SANITIZE_EMAIL);
        $senha = filter_input(INPUT_POST, 'txtSenha', FILTER_SANITIZE_STRING);

        if (strlen($usuario) < 3 || strlen($senha) < 5) {

            $this->showMessage(
                'Fomulário inválido',
                'Dados inválidos ou incompletos.',
                'login/main'
            );

            return;
            
        }

        $result = $this->loginModel->getLogin($usuario, $senha);

        if ($result <= 0) {

            $this->showMessage(
                'Erro',
                'Houve um erro ao tentar logar. Tente novamente mais tarde.',
                'login/main'
            );

            return;

        }

        redirect(BASE . 'dashboard/area');

    }
    
    public function logout() {

        unset($_SESSION['Cliente']);
        session_destroy();

        redirect(BASE . 'login/main');

    }

}