<?php
namespace app\site\controller;

use app\core\Controller;

class PesquisaController extends Controller {
    
    public function __construct() {

        //echo "Olá, Mundo!";
        
    }

    public function index() {

        //$this->load('home/main');
        echo '[ERRO] Página inexistente!';

    }

    public function p(string $termo) {

        //$this->load('home/main');
        echo $termo;

    }

}