<?php
namespace app\site\controller;

use app\core\Controller;

class HomeController extends Controller {
    
    public function __construct() {

        //echo "Olá, Mundo!";
        
    }

    public function index() {

        $this->load('home/main');

    }

}