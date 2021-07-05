<?php
namespace app\site\controller;

use app\core\Controller;
use app\site\model\ReceitaModel;

class PesquisaController extends Controller {
    
    public function __construct() {

        //echo "Olá, Mundo!";
        
    }

    public function index() {

        //$this->load('home/main');
        echo '[ERRO] Página inexistente!';

    }

    public function p(string $termo) {

        $termo = filter_var($termo, FILTER_SANITIZE_STRING);
        $termo = strip_tags($termo);

        if (strlen(trim($termo)) <= 2) {

            $this->showMessage(
                'Fomulário inválido',
                'Dados inválidos ou incompletos.',
                ''
            );
            
            return;

        }

        $receitas = (new ReceitaModel())->pesquisar($termo);

        $this->load('pesquisa/main', [
            'receitas' => $receitas,
            'termo' => $termo,
            'quantidadeResultado' => count($receitas)
        ]);

    }

}